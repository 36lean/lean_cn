<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Marketing extends Base_Controller{
	
	public function __construct() {
		parent::__construct();

		$this->load->model('marketing/m_marketing' , 'marketing');
		$this->load->model('client/client_config');
		$this->load->model('mailer/m_mailer' , 'mailer');
		$this->load->model('client/client_excel');
		$this->load->model('client/client_member' , 'client_member');
		$this->load->model('common/define_data');
	}

	private function _program()
	{

		//添加沟通记录
		if( $this->input->post('add_connect'))
		{
			unset( $_POST['add_connect']);
			if( $this->client_excel->add_connect())
			{
				redirect( site_url('marketing/connect/'.$this->input->post('client_id')));
				exit;
			}
		}

		//更新资料
		if( $this->input->post('save_profile'))
		{
			unset( $_POST['save_profile']);
			if( $this->client_excel->update_contact_profile())
				return 1;
			else
				return -1;
		}

		//沟通记录更新
		if( $this->input->post('save_edit'))
		{
			return $this->client_excel->update_contact_connect();
		}else if( $this->input->post('del_connect'))
		{
			return $this->client_excel->remove_contact_connect();
		}

		//添加约定时间
		if( $this->input->post('submit'))
		{
			//var_dump( $_POST);
		}

	}

	public function navigation() {
		return array(
			array( 'route' => 'index'			, 'alias' => '我的客户列表' , 'status' => 'active' ) ,
			array( 'route' => 'corporation' 	, 'alias' => '企业列表' 	, 'status' => 'active' ) ,
			array( 'route' => 'create_client' 	, 'alias' => '新建联系人' 	, 'status' => 'active') ,
			array( 'route' => 'website_member'	, 'alias' => '网站会员'  	, 'status' => 'active' ) ,
			array( 'route' => 'mail' 			, 'alias' => '邮件工具' 	, 'status' => 'active') ,
		);
	}

	public function index( $page = 1 , $offset = 60) {

		if( isset( $_GET['search'])) {

			if( trim( $_GET['key'])) {

				$condition = $this->marketing->get_search();

			}else {
				$condition = '';
			}
			
		}else {
			$condition = '';
		}

		$uid = $this->_G['adminid'] ?  0 : $this->_G['uid'];
		
		$client = $this->marketing->get_clients( $page , $offset , $uid , $condition);
		
		$sum = $this->marketing->sum_of_clients();

		$this->layout->view('marketing/index' , array( 'client' => $client , 
													   'page' 	=> $page , 
													   'offset' => $offset,
													   'sum'    => $sum,
													 )
		);
	}

	public function corporation( $page = 1 , $offset = 20) 
	{

		$corporations = $this->marketing->get_corporations( $page , $offset);

		$sum = $this->marketing->sum_of_company();

		$this->layout->view('marketing/corporation' , array('corporations'=>$corporations,'offset'=>$offset,'sum'=>$sum));
	}

	public function view_corporation( $id)
	{
		$id = intval( $id);

		$contacts = $this->marketing->get_contacts_by_companyid( $id);

		$company = $this->define_data->get_data_by_id('admin_company' , $id , 'id');



		$this->layout->view('marketing/view_corporation' , array('company'=>$company[0],
																 'contacts'=>$contacts,
																) 
						   );
	}

	public function connect( $id) 
	{

		$status = $this->_program();

		$id = intval( $id) ;

		$tag = $this->define_data->get_selection_key_value( 'admin_clienttags' , 'id' , 'name');

		$connect = $this->define_data->get_data_by_id( 'admin_client_connect' , $id , 'client_id');

		$this->layout->view('client/edit_contact' , array('profile' => $this->client_member->get_contact_by_id( $id) , 
														  'tag' 	=> $tag ,
														  'connect' => $connect ,
														  'status'  => isset( $status) ? $status : '',
														  )
		);
	}
	
	public function edit_connect_record( $id)
	{
		$from_id = $this->_program();
		if( $from_id)
		{
			redirect( site_url('marketing/connect/'.$from_id));
			exit;
		}

		$id = intval( $id);

		$connect = 	$this->define_data->get_data_by_id('admin_client_connect' , $id , 'id');

		$this->layout->view('client/edit_connect_record' , array('connect'=> isset( $connect[0]) ? $connect[0] : array() ));
	}

	/*
	*@删除沟通记录
	*/
	public function linkup_remove( $id) 
	{
		$id = intval( $id);
		$connect_id = $this->marketing->linkup_remove( $id);

		redirect( base_url() .'index.php/marketing/connect/'.$connect_id);
	}

	public function send() {

		$this->layout->view('marketing/send');
	}

	public function send_invitation( $id) {
		$id = intval( $id);
		$this->layout->view('marketing/send_invitation');
	}

	public function create_client() {

		if( isset( $_POST['create_client'])) {
			$status = $this->marketing->connect();
		}else {
			$status = Status::NO_ACTION;
		}

		$column = $this->client_config->get_client_mapping();
		$this->layout->view('marketing/create_client' , array('column' => $column , 'status' => $status));
	}

	public function profile_del( $id) {
		$id = intval( $id);
		$this->marketing->profile_del( $id);
		redirect( base_url().'index.php/marketing/index');
	}

	public function mailto( $id) {

		$id = intval( $id);

		$client = $this->marketing->get_email_by_id( $id);

		if( isset( $_POST['send_save'])) {

			$this->marketing->send_save_email();

			redirect( base_url() . 'index.php/marketing/send/'.$id);

		}else if( isset( $_POST['save_only'])) {

			$this->marketing->only_send_email();

			redirect( base_url() . 'index.php/marketing/receive/'.$id);
		}

		$this->layout->view('marketing/mailto' , array( 'client' => $client[0],));

	}

	public function view_email( $id) {
		$id = intval( $id);
		$mail = $this->marketing->get_email_by_salesmanid( $id , $this->_G['uid']);

		$this->layout->view('marketing/view_email' , array( 'mail' => $mail ));
	}

	public function mail_template() {
		
		$this->layout->view('marketing/mail_template');

	}

	
	public function __toString() {
		return strtolower( __CLASS__);
	}

}