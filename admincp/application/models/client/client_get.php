<?php

class Client_get extends CI_Model{

	public function get_clients_by_batch( $batch = 1 , $sum = 200) {
		return $this->db->select('id,email,name')
						->from('admin_client')
						->where( 'email <> \'\' ')
						->limit( $sum , ($batch-1)*$sum)
						->get()->result_array();
	}

	public function get_sum_of_clients() {
		return $this->db->select('id')->from('admin_client')->get()->num_rows();
	}

	
}