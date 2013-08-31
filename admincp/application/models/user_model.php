<?php

class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function read_user() {
		return $this->db->get('ucenter_members' , 100 , 0)->result_array();
	}
}