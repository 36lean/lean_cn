<?php

class Webkit_menu_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/define_data' , 'common');
	}

	public function top()
	{

		$menu_list = $this->common->get_modules();

		$user = $this->session->userdata('user');

		$this->load->view('menu' , array('path'=>$menu_list , 'user'=>$user));
	}

	public function get_2th_side()
	{
		$ci = & get_instance();

		$current = $this->uri->segment(2);

		$list = $ci->navigation_3th();

		if( isset( $list [$current]['father'] ) )
			$father = $list[$current]['father'] ;
		else
			$father = '';

		$this->load->view('navibar_2' , array('path' => $ci->navigation() , 'father' => $father) );
	}

	public function get_3th_side()
	{
		$ci = & get_instance();

		$current = $this->uri->segment(2);

		$list = $ci->navigation_3th();

		if( isset( $list [$current]['father'] ) )
			$father = $list[$current]['father'] ;
		else
			$father = '';
		

		$this->load->view('navibar_3' , array('path' => $ci->navigation_3th() , 'father'=>$father) );
	}

}