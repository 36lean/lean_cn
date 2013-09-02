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
			'client_module' => array( 'route' => 'client' , 'alias'=> '客户管理') , 
			'marketing_module' =>array('route' => 'marketing' , 'alias' => '市场销售')  , 
			'product_module' => array( 'route' => 'product' , 'alias' => '产品管理') ,
			'web_module' => array('route' => 'website' , 'alias' => '网站内容管理') , 
			'sales_module' => array('route' => 'sales' , 'alias' => '销售机会/订单') , 
			'finanace_module' => array('route' => 'finance' , 'alias' => '财务管理')  , 
			'configure_module' => array('route' => 'configure', 'alias'=> '后台设置' ) , 
		);

		$this->load->view('menu' , array('path'=>$menu_list));
	}
}