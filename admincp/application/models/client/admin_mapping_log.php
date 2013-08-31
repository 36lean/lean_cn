<?php

class Admin_mapping_log extends CI_Model {

	private $_table = 'admin_mapping_log';

	public function __construct() {
		parent::__construct();
	}

	public function new_log() {

		$check = $this->db->select('id')
				 		  ->from( $this->_table)
				 		  ->where( array('info_id' => $this->input->post('info_id')))
				 		  ->get()->result_array();
		$ci = &get_instance();
		$ci->load->model('client/client_config');
		$config = $ci->client_config->get_client_mapping();

		$corporation = array('name' => $this->input->post('cname'));

		//筛选公司信息 d_开头的key
		foreach ($_POST as $key => $value) {
			if( preg_match('/^d_/', $key)) {
				preg_match_all('/\d/', $key, $match);
				$corporation['description'][] = $match[0][0];
				unset( $_POST["$key"]);
			}
		}

 		$mapping = array();
 		foreach ($config as $key => $value) {
 			$mapping["$key"] = $this->input->post("$key");
 		}

 		unset( $mapping['cname']);
		unset( $mapping['cdescription']);

 		$mapping['corporation'] = $corporation;

		if( isset( $check[0]['id']))
		{
			$this->db->where('id' , $check[0]['id'])
					 ->update( $this->_table , array( 'map_rule' 	=> json_encode( $mapping) ,
					 								  'update_date' => time(),
			));
			//echo $this->db->last_query();
			return $check[0]['id'];
		}

		$log = array(
			'info_id' 	=>  $this->input->post('info_id'),
			'map_rule' 	=>  json_encode( $mapping),
			'created_date' => time(),
		);

		$this->db->insert( $this->_table , $log);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	}

	public function get_log_by_infoid( $id) {
		return $this->db->select(' info_id , map_rule , update_date')
			     		->from( $this->_table)
			     		->where( array( 'info_id' => $id))
			     		->get()->result_array();
	}

}