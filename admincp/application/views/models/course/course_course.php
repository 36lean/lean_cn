<?php

class Course_course extends CI_Model {

	private $_course;
	private $_category;
	private $_page;

	public function __construct() {
		parent::__construct();
		$this->_course = 'b_course';
		$this->_category = 'b_category';
		$this->_page = 'b_lesson_pages';
	}

	public function list_course() {
		$this->db->select( $this->_course.'.* , '.$this->_category.'.category');
		$this->db->join('b_category', $this->_course.'.category_id = '.$this->_category.'.id' , 'left');
		$this->db->from( $this->_course);
		$this->db->order_by('id,category_id','desc');
		return $this->db->get()->result_array();
	}

	public function list_course_detail() {
		$course = $this->db->select( $this->_course.'.* , '.$this->_category.'.category')
							->join('b_category', $this->_course.'.category_id = '.$this->_category.'.id' , 'left')
							->from( $this->_course)
							->order_by('sortid','desc')
							->get()->result_array();

		
		foreach ($course as  $key => $each) {
			$pages = $this->db->select('count(id) count')
					 		  ->from( $this->_page)
					 		  ->where('lessonid' , $each['id'])
					 		  ->get()->result_array();
			$course[$key]['count'] = $pages[0]['count'];
		}
		

		return $course;
	}

	public function build_new_course() {

		$is_existed = $this->db->select('id')
						  ->from( $this->_course)
				 		  ->where(array( 'fullname' => $this->input->post('fullname')))
				 		  ->get()->num_rows();

		if( 0 === $is_existed) {

			$this->db->insert( $this->_course , array(
				'fullname' 		=> 	$this->input->post('fullname'),
				'shortname'		=>  $this->input->post('shortname'),
				'summary'		=>  $this->input->post('summary'),
				'category_id'	=>  $this->input->post('category_id'),
				'is_free'		=>  $this->input->post('is_free'),
				'is_hidden'		=>  $this->input->post('is_hidden'),
			));

		$id = $this->db->insert_id();
		
		if( isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
			 	$logo = save_photo( $_FILES['logo']['tmp_name'] , $_FILES['logo']['name'] , $id , 'course');

			 	$this->db->update( $this->_course , array('logo' => $logo) , array('id' => $id));

			 	return $id;
			}

		}else {

			return $id;

		}

	}

	public function get_course_by_id( $id) {
		$this->db->select( '*');
		$this->db->from( $this->_course);
		$this->db->where( array('id' => $id));
		return $this->db->get()->result_array();
	}

	public function get_course_info_by_id( $id) {
		return $this->db->select('id,fullname')
						->from( $this->_course)
						->where( array('id' => $id))
						->get()
						->result_array();
	}

	public function get_category() {
		$this->db->select('*');
		$this->db->from('b_category');
		return $this->db->get()->result_array();
	}

	public function update_course() {

		if( isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
				$logo = save_photo( $_FILES['photo']['tmp_name'] ,  $_FILES['photo']['name'], $_POST['course_id'] , 'course');
		}else {
				$logo = $_POST['old_logo'];
		}

		$course = array( 							'id' => $_POST['course_id'],
													'fullname'=> $_POST['fullname'],
													'summary' => $_POST['summary'],
													'is_free' => $_POST['is_free'],
													'is_hidden' => $_POST['is_hidden'],
													'logo' => $logo,
													'category_id' => $_POST['category_id'],
						);

		return $this->db->where('id' , $course['id'])->update( $this->_course , $course);
	}
}