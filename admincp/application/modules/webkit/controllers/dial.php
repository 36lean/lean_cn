<?php

class Webkit_dial_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('program/m_program','program');

	}

	public function dail_phone( $user_id , $number)
	{

		$user_id = 'contact'.$user_id;
		$url = $this->program->get_vsay_signature('831lean2013online','2435325uifslkfjalTalk')
							 ->register( 'd'.$number , $number);

		echo '<a href="'.$url.'">'.$number.'</a>';
	}

	
}