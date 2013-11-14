<?php

class Course_course extends CI_Model {

	private $_course;
	private $_category;
	private $_page;

	public function __construct() {
		parent::__construct();
		$this->load->helper('excel');
		$this->_course = 'b_course';
		$this->_category = 'b_category';
		$this->_page = 'b_lesson_pages';
	}

	public function list_course( $column , $value ) {
		$this->db->select( $this->_course.'.* , '.$this->_category.'.category');
		$this->db->join('b_category', $this->_course.'.category_id = '.$this->_category.'.id' , 'left');
		$this->db->from( $this->_course);
		if( $column != '' && $value != '')
		{
			$this->db->where( array($column => $value));
		}

		$this->db->order_by('sortid','asc');
		return $this->db->get()->result_array();
	}

	public function list_course_detail() {
		$course = $this->db->select( $this->_course.'.* , '.$this->_category.'.category')
							->join('b_category', $this->_course.'.category_id = '.$this->_category.'.id' , 'left')
							->from( $this->_course)
							->order_by('sortid','asc')
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

	public function course_generate() {
			
		$extend_name = array_pop( preg_split( '/[.]/', $_FILES['info']['name']));

		if( preg_match('/[xls]|[xlsx]/', $extend_name)) {
			move_uploaded_file( $_FILES['info']['tmp_name'], 'uploads/course.'.$extend_name);

			$result = readexcel( 'uploads/course.'.$extend_name);

			return $result;
		}
		
	}

	public function generate_from_cache( $data , $id) {
		unset( $data[0]);



		foreach ($data as $page) {
			$video_info = array( 'v_name' => $page[1],
								 'v_file' => $page[9],
								 'v_path' => $page[8],
								 'label_cn' => $page[5],
								 'label_tw' => $page[6],
								 'label_en' => $page[7],
								 'cn_intro' => $page[2],
								 'en_intro' => '',
								 'v_time' => $page[3],
								 'v_voice' => $page[4] === '英文' ? 1 : 0,
								 'image_file' => $page[10],
								 'updated_date' => time(),
			);

			$this->db->insert('b_video' , $video_info);

			$film_id = $this->db->insert_id();

			$page_info = array( 'film_id' => $film_id,
								'lessonid' => $id,
								'timecreated' => time(),
								'title' => $page[0].' '.$page[1],
								'contents' => $page[2]
			);

			$this->db->insert('b_lesson_pages' , $page_info);
		}
	}

	public function del_course( $id) {
		$list = $this->db->select('film_id')
					 	 ->from('b_lesson_pages')
				 		 ->where( array('lessonid' => $id))
				 		 ->get()->result_array();

		foreach ($list as $page) {
			$this->db->delete('b_video' , array( 'id' => $page['film_id']));
		}

		$this->db->delete('b_lesson_pages' , array( 'lessonid' => $id));

		$this->db->delete('b_course' , array('id' => $id));
	}

	public function update_course_sortid() {
		foreach ($_POST as $key => $value) {
			$this->db->where( array('id' => intval( $key)))->update('b_course' , array('sortid' => intval( $value)));
		}
	}

	public function update_category()
	{
		$id = intval( $this->input->post('id'));

		$category = intval( $this->input->post('category'));

		if( $this->db->select('id')->from('b_course')->where( array('id'=>$id))->get()->row_array() )
		{
			$this->db->where( array('id'=>$id))->update('b_course' , array('category_id'=>$category));

			$c = $this->db->select('category')->from('b_category')->where( array('id'=>$category))->get()->row_array();

			echo $c['category'];
		}
	}

	public function update_status()
	{
		
		$id = intval( $this->input->post('id'));

		$is_free = intval( $this->input->post('is_free'));

		if( $this->db->select('id')->from('b_course')->where( array('id'=>$id))->get()->num_rows() )
		{
			$this->db->where( array('id'=>$id))->update('b_course' , array('is_free'=>$is_free));

			echo $is_free ? '免费' : '收费' ;
		}
	}

	public function update_visible()
	{
		$id = intval( $this->input->post('id'));

		$is_hidden = intval( $this->input->post('is_hidden'));
		
		if( $this->db->select('id')->from('b_course')->where( array('id'=>$id))->get()->num_rows() )
		{
			$this->db->where( array('id'=>$id))->update('b_course' , array('is_hidden'=>$is_hidden));

			echo $is_hidden ? '隐藏' : '可见' ;
		}
	}

	public function update_all()
	{


		if( $this->input->post('update_all')){

		foreach ($_POST as $key => $value) {	

			
				
			if( !preg_match('/\d{1,}_check/', $key))
				continue;

			

			preg_match('/(\d{1,})/', $key , $match);

			$id = $match[0];

			if( $this->input->post($id.'_check') !== 'on')
				continue;

			unset( $_POST[$id.'_check'] );

			$data = array(
				'sort_id' => intval( $this->input->post($id.'_sortid')) , 
				'v_name' => trim( $this->input->post($id.'_title')) ,
				'v_file' => trim( $this->input->post($id.'_file')) , 
				'v_path' => trim( $this->input->post($id.'_path')) , 
				'label_cn' => trim( $this->input->post($id.'_cn')) , 
				'label_tw' => trim( $this->input->post($id.'_tw')) , 
				'label_en' => trim( $this->input->post($id.'_en')) , 
				'v_voice' => intval( $this->input->post($id.'_voice')) ,
				'v_time' => trim( $this->input->post($id.'_time')) , 
				'updated_date' => time() , 
			);

			$this->db->where( array('id'=>$id))->update( 'b_video' , $data );
			unset( $_POST[$id.'_title']);
			unset( $_POST[$id.'_file']);
			unset( $_POST[$id.'_path']);
			unset( $_POST[$id.'_cn']);
			unset( $_POST[$id.'_tw']);
			unset( $_POST[$id.'_en']);
		}
		}
	}

	public function update_sortid()
	{
		if( $this->input->post('update_sortid'))
		{
			unset( $_POST['update_sortid']);

			foreach ($_POST as $key => $value) {
				$id = intval( $key);
				$this->db->where( array('id'=>$id))->update('b_course' , array('sortid' => intval( $value)));
			}
		}
	}
}