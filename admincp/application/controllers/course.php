<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Course extends Base_Controller {


	public function Course() {
		parent::__construct();

		$this->load->helper('photo');
		$this->load->model('course/course_course' , 'course');
		$this->load->model('course/course_category' , 'category');
		$this->load->model('course/course_page' , 'page');
	}

	public function navigation() {
		return array(
			array( 'route' =>'index' , 'alias' => '课程清单' , 'status' => 'active' ) ,
			array(  'route'=>'add_course', 'alias' => '添加课程' , 'status' => 'active' ) , 
			array(  'route'=> 'add_category', 'alias' => '添加分类' , 'status' => 'active') ,
			array(  'route'=> 'edit_category','alias' => '编辑分类' , 'status' => 'active' ) ,
			array(  'route'=>'server_config' ,'alias' => '设置' , 'status' => 'active' ) , 
		);
	}

	public function index() {
		$list = $this->course->list_course();
		$this->template->build('course/index' , array('list' => $list));
	}

	public function list_mode() {

		if( isset( $_POST['save'])) {

			unset ( $_POST['DataTables_Table_0_length']);

			unset ( $_POST['save']);

			$this->course->update_course_sortid();

			$this->cache_update();
		}
		
		$list = $this->course->list_course_detail();

		$category = $this->category->get_categories();

		$this->template->build('course/list_mode' , array('list' => $list , 'category' => $category));	
	}

	public function add_course() {

		$category = $this->course->get_category();

		if( isset( $_POST['build'])) {

			$this->course->build_new_course();

		}

		$this->template->build('course/add_course' , array('category' => $category));
	}

	public function edit_course( $id = 1) {

		$id = intval( $id);
		
		if( preg_match('/generate/', $this->uri->uri_string())) {
			$data = file_get_contents( 'uploads/generate.tmp');
			$data = json_decode( $data , true);

			$this->course->generate_from_cache( $data , $id);
			//$this->layout->view( 'course/generate_course' , array('data' => $data));
			$this->update_cache();
			redirect( base_url().'index.php/course/edit_course/'.$id);
			return ;
		}
		
		if( isset( $_POST['done'])) {

			$this->course->update_course();

		}else if( isset( $_POST['add_page'])) {

			$this->page->insert_page( $id);
		}

		if( isset( $_POST['preview'])) {
			$data = $this->course->course_generate();
			file_put_contents( 'uploads/generate.tmp', json_encode( $data));
			$this->template->build('course/generate_cache' , array( 'data' => $data ,'course_id' => $id));
			return ;
		}

		$course = $this->course->get_course_by_id( $id);
		$category = $this->course->get_category();
		$pages = $this->page->get_pages_by_lessonid( $id);
		$config = include_once('../player.config.php');

		$this->template->build('course/edit_course' , array('course'=> $course , 'category'=> $category , 'pages' => $pages , 'config' => $config));
	}

	public function add_category() {

		if( $this->input->post('add_category')){

			$this->category->add_category();

		}

		$this->template->build('course/add_category');
	}

	public function del_category( $id) {
		$id = intval( $id);
		$this->category->del_category( $id);
		redirect( base_url().'index.php/course/edit_category');
	}


	public function edit_category() {

		
		if( $this->input->post('save')) {
			unset( $_POST['save']);
			$this->category->save_category();
		}
		$this->load->model('course/course_category');
		$categories_list = $this->course_category->get_categories();
		$this->template->build('course/edit_category' , array('list' => $categories_list));
	}

	public function edit_page( $id) {
		$this->load->model('course/course_page');
		$this->load->model('course/course_course');

		if( file_exists( '../cache/pages_list/'.$id.'.cache'))
			unlink( '../cache/pages_list/'.$id.'.cache');

		if( isset( $_POST['save'])){
			global $constant;

			$info_ok = $this->course_page->save_page_info( array(
				'id' => $_POST['page_id'],
				'contents' => $_POST['contents'],
				'title' => $_POST['title'],
			));

			if( isset( $_FILES['image_file']) && $_FILES['image_file']['size'] > 0) {
				$type = explode('.', $_FILES['image_file']['name']);
				move_uploaded_file( $_FILES['image_file']['tmp_name'], $constant['uploads_path'].'/page/'.$_POST['page_id'].'.'.$type[1]);
			}

			$video_ok = $this->course_page->save_video_info( array(
				'id' => $_POST['video_id'],
				'v_file' => $_POST['v_file'],
				'v_name' => $_POST['v_name'],
				'v_path' => $_POST['v_path'],
				'label_cn' => $_POST['label_cn'],
				'label_tw' => $_POST['label_tw'],
				'label_en' => $_POST['label_en'],
				'v_voice' => $_POST['v_voice'],
				'v_time' => $_POST['v_time'],
				'cn_intro' => $_POST['cn_intro'],
				'en_intro' => $_POST['en_intro'],
			));

			$status = $info_ok + $video_ok;
		}

		$status = ( isset( $status) ? $status : null);
		$id = intval( $id);

		$page_info = $this->course_page->get_page_by_id( $id);
		$course_info = $this->course_course->get_course_info_by_id( $page_info[0]['lessonid']);
		$config = include_once('../player.config.php');

		$this->template->build('course/edit_page' , array('page' => $page_info[0] , 
													   'course' => $course_info[0] , 
													   'status' => $status , 
													   'config' => $config,
													   )
		);
	}

	public function delete_page( $id) {
		$id = intval( $id);
		$this->load->model('course/course_page' , 'page');
		$course_id = $this->page->delete_by_id( $id);
		redirect( base_url() . 'index.php/course/edit_course/'.$course_id);
	}

	public function update_cache() {
		 //chmod( '../cache/' , 0777);
		 $d = opendir( '../cache/lesson_index/');
		 while( $file = readdir( $d)){
		 	if( is_file( '../cache/lesson_index/'.$file))
		 		unlink( '../cache/lesson_index/'.$file);
		 }

		 $d = opendir( '../cache/pages_list/');
		 while( $file = readdir( $d)){
		 	if( is_file( '../cache/pages_list/'.$file))
		 		unlink( '../cache/pages_list/'.$file);
		 }

		 $d = opendir( '../cache/page_content/');
		 while( $file = readdir( $d)){
		 	if( is_file( '../cache/page_content/'.$file))
		 		unlink( '../cache/page_content/'.$file);
		 }

		 redirect( base_url().'index.php/course/index');
	}
	
	public function server_config() {
		$config = include('../player.config.php');
		$this->template->build('course/server_config' , array( 'config' => $config));
	}

	public function del_course( $id) {

		$id = intval( $id);

		$info = $this->course->get_course_by_id( $id);

		if( isset( $_POST['sure']) &&  $id === intval( $_POST['id'])){
			$this->course->del_course( $id);
			redirect( base_url() . 'index.php/course/index');
		}

		$this->template->build( 'course/del_course' , array( 'info' => $info));
	}

	public function cache_update() {

		$dir = opendir( '.././cache/lesson_index');

		while ($file = readdir( $dir) ) {

			if( preg_match('/(.cache)$/', $file))
				
				unlink( '.././cache/lesson_index/'.$file);
		}
	}

	public function __toString() {
		return strtolower( __CLASS__);
	}
}