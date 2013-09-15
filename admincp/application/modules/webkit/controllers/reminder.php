<?php

class Webkit_reminder_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();
	}


	public function get_contact_remind()
	{
		
		$ci = & get_instance();

		$this->load->model('marketing/m_marketing' , 'marketing');

		$data = $this->marketing->get_contact_remind( $ci->_G['uid']);

		$this->load->view('reminder' , array( 'data'=>$data));
	}

	public function get_timeout_remind()
	{

		$ci = & get_instance();

		$num = $this->db->select('id')
						->from( 'admin_client_appointment')
						->where( array( 'datereminded'=>'>'.time() , 'salesman_id'=>$ci->_G['uid']))
						->get()->num_rows();

		echo $num;
	}

}