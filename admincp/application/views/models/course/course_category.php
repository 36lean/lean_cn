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
}