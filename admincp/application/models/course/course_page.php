<?php

class Course_page extends CI_Model {

	private $lesson_pages;
	private $lesson_video;

	public function __construct() {
		parent::__construct();
		$this->lesson_pages = 'b_lesson_pages';
		$this->lesson_video = 'b_video';
	}

	public function get_pages_by_lessonid( $id) {
		$this->db->select( $this->lesson_pages.'.id pid,'.$this->lesson_video.'.*');
		$this->db->from( $this->lesson_pages);
		$this->db->join( $this->lesson_video , $this->lesson_pages.'.film_id = '.$this->lesson_video.'.id');
		$this->db->where( array( 'lessonid' => $id));
		$this->db->order_by('sort_id' , 'asc');
		$this->db->order_by('id' , 'asc');
		return $this->db->get()->result_array();
	}

	public function get_page_by_id( $id) {
		$r = $this->db->select($this->lesson_pages.'.id pid,'.$this->lesson_pages.'.timecreated,'.$this->lesson_pages.'.title,'.$this->lesson_pages.'.contents ,'.$this->lesson_pages.'.lessonid,'.$this->lesson_video.'.*')
						->from( $this->lesson_pages)
						->join( $this->lesson_video , $this->lesson_pages.'.film_id = '.$this->lesson_video.'.id' , 'left')
						->where( array( $this->lesson_pages.'.id' => $id))
						->get()
						->result_array();

		return $r;
	}

	public function insert_page( $course_id ) {


		$this->db->insert( $this->lesson_video , array(
			'v_name' => trim( $this->input->post('title')) , 
			'v_file' => trim( $this->input->post('v_file')),
			'v_path' => trim( $this->input->post('v_path')),
			'label_cn' => trim( $this->input->post('label_cn')),
			'label_tw' => trim( $this->input->post('label_tw')),
			'label_en' => trim( $this->input->post('label_en')),
			'v_voice' => intval( $this->input->post('v_voice')) , 
			'v_time' => trim( $this->input->post('v_time')) , 
		));

		$film_id = $this->db->insert_id();

		$this->db->insert( $this->lesson_pages , array(
			'title' => trim( $this->input->post('title') ),
			'film_id' => $film_id,
			'timecreated' => time(),
			'lessonid' => $course_id,
		));

		$page_id = $this->db->insert_id();

		if( isset( $_FILES['image_file']) ) {

			$image = save_photo( $_FILES['image_file']['tmp_name'] , $_FILES['image_file']['name'] , $page_id , 'page');
			
			$this->db->update( $this->lesson_video , array('image_file' => $image) , array('id' => $film_id));
		}
	}

	public function save_page_info( $page) {
		return $this->db->update( $this->lesson_pages , $page , array('id' => $page['id']));
	}

	public function save_video_info( $video) {
		return $this->db->update( $this->lesson_video , $video , array( 'id' => $video['id']));
	}

	public function get_sum_by_cid_lang() {
		$id = $_POST['id'];
		$lang = $_POST['lang'];
		$lang = (($lang == 'cn') ? 0 : 1);

		return $this->db->select($this->lesson_video.'.id')
					    ->from( $this->lesson_video)
				 	    ->join( $this->lesson_pages , $this->lesson_pages.'.film_id='.$this->lesson_video.'.id')
				 	    ->where( array( $this->lesson_pages.'.lessonid' 		=> $id , 
				 	    				$this->lesson_video.'.v_voice' 	=> $lang))
				 	    ->get()->num_rows();
	}

	public function delete_by_id( $id) {
		$video = $this->db->select( 'film_id,lessonid')
				 		  ->from( $this->lesson_pages)
				 	      ->where( array( 'id' => $id))
				          ->get()->result_array();

		$this->db->delete( $this->lesson_pages , array('id' => $id));
		$this->db->delete( $this->lesson_video , array('id' => $video[0]['film_id']));
		return $video[0]['lessonid'];
	}

	public function update_page()
	{
		
		if( $this->db->select('id')->where( array('id'=>intval( $this->input->post('id')) ))->from('b_video')->get()->num_rows() )
		{
			$id = intval( $this->input->post('id'));
			unset( $_POST['id']);

			foreach ($_POST as $key => $value) {
				$_POST[$key] = trim( $this->input->post($key));
			}

			return $this->db->where( array('id'=>$id))->update('b_video' , $_POST);
		}

	}
 }