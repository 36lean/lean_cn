<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Log extends Base_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model( 'log/m_log' , 'log');

	}

	public function navigation()
	{
		return array(
			'index_module' 	=> array('route' => 'index' , 'alias' => '日志首页'  , 'status' => 'active') ,
			'call_module' 	=> array('route' => 'call' 	, 'alias' => '拨号记录'  , 'status' => 'active') ,
		);
	}

	public function index()
	{
		$this->template->build('log/index');
	}



	public function call( $page = 1 , $offset = 50 )
	{

		$data = $this->log->get_call_log( $page , $offset );

		$sum = $this->log->get_sum_of_call();

		$sum = $sum['sum'];

		$this->template->build('log/call' , array( 'data' 	=> $data , 
												   'offset' => $offset , 
												   'sum'   	=> $sum , 
							  				) 
		);
	}
}