<?php

class Webkit_devkit_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('program/m_program','program');

	}

	public function index()
	{
		

		echo $this->program->get_vsay_signature('831lean2013online','2435325uifslkfjalTalk')->get_vsay_url('queryBalance' , array('toUser'=>'831lean2013online'));
	}
}