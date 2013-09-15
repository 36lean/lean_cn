<?php

class Webkit_menu_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();
	}

	public function top()
	{
		$menu_list = array(
			'client_module' => array( 'route' => 'client' , 'alias'=> '客户管理' , 'status' => 'active') , 
			'marketing_module' =>array('route' => 'marketing' , 'alias' => '市场销售' , 'status' => 'active')  , 
			'product_module' => array( 'route' => 'course' , 'alias' => '产品管理' , 'status' => 'active') ,
			'web_module' => array('route' => 'website' , 'alias' => '网站内容管理' , 'status' => 'active') , 
			'sales_module' => array('route' => 'sales' , 'alias' => '销售机会/订单' , 'status' => 'active') , 
			'finanace_module' => array('route' => 'finance' , 'alias' => '财务管理' , 'status' => 'active')  , 
			'configure_module' => array('route' => 'configure', 'alias'=> '后台设置' , 'status' => 'active') , 
		);

		$this->load->view('menu' , array('path'=>$menu_list));
	}
}