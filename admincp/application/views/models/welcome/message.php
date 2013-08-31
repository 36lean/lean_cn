<?php

/*
*  @表名 attached_message
*  @字段 id uid message date
*	
*
*
*/
class Message_model extends CI_Model{

	private $_table;

	public function __construct() {

		$this->_table = 'attached_message';

		parent::__construct();
	}

	public function get_message_by_id( $id) {
		$this->db->select('id,uid,message,generate_date')
				 ->from( $this->_table)
				 ->where('id='.$id)
				 ->get()
				 ->result_array();
	}
}

