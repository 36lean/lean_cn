<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Lesson extends REST_Controller {


	public function course_get( $type = 0)
	{

		$data = $this->db->select('*')->from('b_course')->get()->result_array();

		$this->response( $data, 200);

	}

	public function lesson_post()
	{

		if( !isset( $_POST['id']))	
			$id = 1;
		else
			$id = intval( $_GET['id']);

		$data = $this->db->select('*')->from('b_lesson_pages')->where( array('id'=>$id))->get()->row_array();

		echo json_encode( $data);

	}

}