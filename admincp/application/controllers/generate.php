<?php

class Generate extends CI_Controller
{

	private $db2;

	public function __construct()
	{
		parent::__construct();

		$this->db2 = $this->load->database('extra' , TRUE);
	}
	public function index()
	{

		echo '<pre>';

		$x = $this->db2->select('id  , login , email , user_type , timestamp')
				 	  ->from('users u')
				 	  ->join('logs l' , 'l.')
				 	  ->get()->result_array();

		echo '<p>'.count( $x).'</p>';
		foreach ($x as $key => $value) {
			echo ' user ' . $value['login'] . ' timestamp : ' . date('Y-m-d h:i:s' , $value['timestamp']) . '<br/>';
		}

		echo '</pre>';
	}
}