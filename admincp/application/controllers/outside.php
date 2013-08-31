<?php

class Outside extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}
	
	public function referer(){
		$file = $_GET['file'];
		header('Content-type: image/png');
		echo file_get_contents( $file);
		$x = json_encode($_SERVER);
		$this->db->insert('admin_dev_log', array('log'=>$x , 'date'=>time()));
	}

	public function display() {
		$data = $this->db->get('admin_dev_log')->result_array();
		
		foreach ($data as $user) {
			echo 'log date:'.date('h:i:s',$user['date']);
			$u = json_decode( $user['log'],true);
			echo 'HTTP_USER_AGENT => ' . $u['HTTP_USER_AGENT'].'<br>';
			echo 'REMOTE_ADDR => ' . $u['REMOTE_ADDR'];
			echo '<br>';
		}
	}
}

