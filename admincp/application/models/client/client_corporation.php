<?php
class Client_corporation extends CI_Model {

	private $_table;

	public function __construct() {
		parent::__construct();

		$this->_table = 'admin_company';
	}

	public function fetch_all( $page , $offset ) {

		return $this->db->select('*')
						->from( $this->_table)
						->limit($offset , ($page-1) * $offset)
						->order_by('id','desc')
						->get()
						->result_array();

		//return $this->db->last_query();
	}

	public function fetch_by_id( $id) {
		return $this->db->select('*')
				 		->from( $this->_table)
				 		->where('id' , $id)
				 		->get()
				 		->result_array();
	}
}