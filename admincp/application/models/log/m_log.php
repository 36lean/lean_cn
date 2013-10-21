<?php

class M_log extends CI_Model
{

	public function get_call_log( $page , $offset )
	{
		return $this->db->select('dial.* , users.username , contacts.name , contacts.email')
						->from('admin_dial dial')
						->join('admin_users users' , 'users.uid = dial.caller_id' , 'left')
						->join('admin_contacts contacts' , 'contacts.id = dial.contact_id' , 'left')
						->order_by('id' , 'desc')
						->limit( $offset , ($page - 1) * $offset )
						->get()
						->result_array();
	}

	public function get_sum_of_call()
	{
		return $this->db->select('count(id) as sum')
						->from('admin_dial')
						->get()->row_array();
	}
}
