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

		/*
		$mapping = array(
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'position' => $this->input->post('position'),
			'company' => $this->input->post('company'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'fax' => $this->input->post('fax'),
			'address' => $this->input->post('address'),
			'postid' => $this->input->post('postid'),
			'website' => $this->input->post('website'),
 		);
 		*/

 		$mapping = array();
 		foreach ($config as $key => $value) {
 			$mapping["$key"] = $this->input->post("$key");
 		}

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
			     		->where( array( 'id' => $id))
			     		->get()->result_array();
	}

}