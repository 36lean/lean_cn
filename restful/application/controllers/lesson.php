<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Lesson extends REST_Controller {


	public function course_get( $type = 0)
	{

		$data = $this->db->select('*')->from('b_course')->get()->result_array();

		$this->response( $data, 200);

	}

}