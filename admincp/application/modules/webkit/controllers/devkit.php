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
		$url = $this->program->get_vsay_signature('831lean2013online','2435325uifslkfjalTalk')
							 ->register('mot01' , '13247162352');
	}
}