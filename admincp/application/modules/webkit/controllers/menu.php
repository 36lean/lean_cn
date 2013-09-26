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

		$this->load->view('menu' , array('path'=>$menu_list));
	}
}