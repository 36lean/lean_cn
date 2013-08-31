<?php
class Client_corporation extends CI_Model {

	private $_table;

	public function __construct() {
		parent::__construct();

		$this->_table = 'admin_client_corporation';
	}

	public function fetch_all( $page = 1 , $offset = 30) {
		return $this->db->select('*')
						->from( $this->_table)
						->limit($offset , ($page-1) * $offset)
						->order_by('id','desc')
						->get()
						->result_array();

		//return $this->db->last_query();
	}

	//取得所有总公司/非子公司
	public function fetch_final_corp() {
		return $this->db->select('id,corp_name')
				 		->from( $this->_table)
				 		->where( array('belongto' => '0'))
				 		->get()->result_array();
	}

	public function fetch_by_id( $id) {
		return $this->db->select('*')
				 		->from( $this->_table)
				 		->where('id' , $id)
				 		->get()
				 		->result_array();
	}

	public function insert_info() {
			$info = array(
				'corp_name'			=> $this->input->post('corp_name' , true),
				'corp_description' 	=> $this->input->post('corp_description' , true),
				'corp_area'			=> $this->input->post('corp_area' , true),
				'corp_master'		=> $this->input->post('corp_master' , true),
				'corp_contractor' 	=> $this->input->post('corp_contractor' , true),
				'corp_address'		=> $this->input->post('corp_address' , true),
				'corp_phone'		=> $this->input->post('corp_phone' , true),
				'corp_website'		=> $this->input->post('corp_website' , true),
				'etc'				=> $this->input->post('etc' , true),
				'generate_date'		=> $this->input->post('generate_date' , true),
			);

			if( 'on' === $this->input->post('is_sub')) {
				$info['belongto'] = $this->input->post('belongto');
			}else {
				$info['belongto'] = '';
			}

			if( $this->db->select('corp_name')->from( $this->_table)->where( 'corp_name' , $info['corp_name'])->get()->num_rows()){
				return 'duplicate';
			}
			
			return $this->db->insert( $this->_table , $info);
	}
}