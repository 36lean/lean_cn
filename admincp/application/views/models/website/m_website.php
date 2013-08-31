<?php

class M_website extends CI_Model {

	private $_table;

	public function __construct() {
		$this->_table = 'admin_website_static';
	}

	public function create_page() {

		$pagepath = trim( $this->input->post('pagepath'));

		$page_info = array( 'pagename' => trim( $this->input->post('pagename')),
							'path'     => $pagepath,
							'timeup'   => strtotime( $this->input->post('timeup')),
		);

		$any = $this->db->select('id')
				 		->from($this->_table)
				 		->where( array('path' => $pagepath))
				 		->get()->num_rows();

		if( 0 === $any) {
			//不存在记录

			$this->db->insert( $this->_table , $page_info);

			$htmls = $this->input->post('htmlcode');
			file_put_contents( '../pages/'.$pagepath.'.html',  $htmls);
			return Status::INSERT_SUCCESS;
		}else {
			return Status::RECORD_EXIST;
		}
	}

	public function get_static_pages() {
		return $this->db->select('*')
						->from( $this->_table)
						->get()->result_array();
	}

	public function edit_page() {

		$path = trim( $this->input->post('path'));
		file_put_contents('../pages/'.$path.'.html', $this->input->post('html'));

		$this->db->update( $this->_table , 
						   array('pagename' => trim( $this->input->post('pagename')),
												 'timeup'   => strtotime( $this->input->post('timeup')),
								), 
						   array('id' => $this->input->post('id'))
		);
	}

	public function del_page( $id) {

		$page = $this->db->select('*')
					 	 ->from( $this->_table)
				         ->where( array('id' => $id))
				         ->get()->result_array();

		if( isset( $page[0]['id'])) {
			if( file_exists( '../pages/'.$page[0]['path'].'.html'))
				unlink ( '../pages/'.$page[0]['path'].'.html');
			$this->db->delete( $this->_table , array('id' => $id));
		}

	}

	public function get_static_page( $id) {
		return $this->db->select('*')
						->from( $this->_table)
						->where( array('id' => $id))
						->get()->result_array();
	}
}