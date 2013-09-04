<?php

class Webkit_leftside_module extends CI_Module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_left_side()
	{
		$ci = & get_instance();

		$this->load->view('leftside' , array('path' => $ci->navigation()) );
	}
}