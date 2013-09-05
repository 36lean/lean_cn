<?php

class Webkit_information_module extends CI_Module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function show_information( $message = '')
	{
		$this->load->view('information' , array('message'=>$message));
	}
}