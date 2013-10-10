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
		return $this->db->select('id')->from('admin_contacts')->get()->num_rows();
	}

	public function get_contact_tags()
	{
		return $this->db->get('admin_clienttags')->result_array();
	}

	public function get_sum_of_webmembers()
	{
		return $this->db->select('uid')
						->from('ucenter_members')
						->get()
						->num_rows();
	}
	
}