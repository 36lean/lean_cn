<?php

class Course_category extends CI_Model {

	private $category;


	public function __construct() {
		parent::__construct();
		$this->category = 'b_category';
	}

	public function get_categories() {
		 $tmp = $this->db->get( $this->category)->result_array();

		 $cat = array();
		 foreach ($tmp as $key => $value) {
		 	$cat[ $value['id']] = $value['category'];
		 }

		 return $cat;
	}

	public function add_category() {
		$cate = $this->db->where( array('category' => trim( $_POST['category'])))
				 		 ->get('b_category');

		if( !$cate->num_rows())
			$this->db->insert( 'b_category' , array('category'=> trim( $_POST['category'])));

	}

	public function save_category() {
		foreach ($_POST as $key => $value) {
			$this->db->where( array('id' => $key))->update('b_category' , array('category' => $value));
		}
	}

	public function del_category( $id) {
		$this->db->delete('b_category' , array('id' => $id));
	}
}