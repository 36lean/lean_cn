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
		$this->load->model('client/client_get' , 'client_get');
		$this->load->model('program/m_program' , 'program');
	}

	public function navigation() {
		return array(
			array( 'route' => 'index'			, 'alias' => '我的客户列表' , 'status' => 'active' ) ,
			array( 'route' => 'corporation' 	, 'alias' => '企业列表' 	, 'status' => 'active' ) ,
			array( 'route' => 'web' 			, 'alias' => '网站会员' 	, 'status' => 'active') ,
			array( 'route' => 'center' 			, 'alias' => '消息中心' 	, 'status' => 'active') ,
			array( 'route' => 'create' 			, 'alias' => '新建档案' 	, 'status' => 'active') ,
			//array( 'route' => 'website_member'	, 'alias' => '网站会员'  	, 'status' => 'active' ) ,
			//array( 'route' => 'mail' 			, 'alias' => '邮件工具' 	, 'status' => 'active') ,
		);
	}

	public function index( $page = 1 , $offset = 60) {

		

		$condition = $this->_program();





		if( is_array( $condition))
		{
			$client = $condition;

			$sum = count( $client);
		}
		else
		{
			$uid = $this->_G['uid'];
		
			$client = $this->marketing->get_clients( $page , $offset , $uid , $condition);
		
			$sum = $this->marketing->sum_of_clients( $uid);
		}

		$this->template->build('marketing/index' , array( 'client' 		=> $client , 
													   'page' 			=> $page , 
													   'offset' 		=> $offset ,
													   'sum'    		=> $sum ,
													 )
		);
	}

	public function corporation( $page = 1 , $offset = 20) 
	{

		$corporations = $this->marketing->get_corporations( $page , $offset);

		$sum = $this->marketing->sum_of_company();

		$this->template->build('marketing/corporation' , array('corporations'=>$corporations,'offset'=>$offset,'sum'=>$sum));
	}

	public function view_corporation( $id)
	{
		$id = intval( $id);

		$contacts = $this->marketing->get_contacts_by_companyid( $id);

		$company = $this->define_data->get_data_by_id('admin_company' , $id , 'id');

		$opportunities = $this->marketing->get_opportunities_by_companyid( $id);

		$this->template->build('marketing/view_corporation' , array('company'=>$company[0],
																 'contacts'=>$contacts,
																 'opportunities' => $opportunities ,
																) 
						   );
	}

	public function edit_corporation( $id)
	{

		$this->_program();

		$id = intval( $id);

		$profile = $this->marketing->get_corporation_by_id( $id);

		$this->template->build('marketing/edit_corporation' , array('company'=>$profile));
	}

	public function add_opportunity ( $id)
	{

		$this->_program();

		$id = intval( $id);

		$company = $this->marketing->get_company_name_by_id( $id);

		$this->template->build('marketing/add_opportunity' , array('company'=>$company));
	}

	public function view_opportunity( $id)
	{

		$this->_program();

		$id = intval( $id);

		$opportunity = $this->marketing->get_opportunity_by_id( $id);

		$this->template->build('marketing/view_opportunity' , array('op'=>$opportunity));
	}

	public function add_worker( $company_id)
	{

		$this->_program();

		$company_id = intval( $company_id);

		$tags = $this->client_get->get_contact_tags();

		$uncategories = $this->client_member->get_uncategory_contacts();

		$this->template->build('marketing/add_worker' , array('company_id'=>$company_id , 'tags'=>$tags , 'uncategories'=>$uncategories));
	}

	public function connect( $id) 
	{

		$status = $this->_program();

		$id = intval( $id) ;

		$tag = $this->define_data->get_selection_key_value( 'admin_clienttags' , 'id' , 'name');

		$connect = $this->define_data->get_data_by_id( 'admin_client_connect' , $id , 'client_id');

		$profile = $this->client_member->get_contact_by_id( $id);

		$web_profile = $this->client_member->get_profile_by_contact_id( $id);

		$this->template->build('client/edit_contact' , array('profile' =>  $profile, 
														     'tag' 	=> $tag ,
														     'connect' => $connect ,
														     'status'  => isset( $status) ? $status : '',
														     'web_profile' => $web_profile , 
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

		$this->template->build('client/edit_connect_record' , array('connect'=> isset( $connect[0]) ? $connect[0] : array() ));
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

	/**
	*@消息中心
	**/
	public function center( $page = 1 , $offset = 30 )
	{

		$data = $this->marketing->get_contact_details( $page , $offset , $this->_G['uid']);

		$sum = $this->marketing->get_message_sum( $this->_G['uid']);

		$this->template->build('marketing/center' , array( 'data'=>$data , 'offset'=>$offset , 'sum' => $sum));
	}

	public function remove_message($id)
	{	
		$this->marketing->remove_message ( $id , $this->_G['uid']);
		redirect( site_url('marketing/center'));
	}

	public function create()
	{

		$this->_program();

		$this->template->build('marketing/create',array(
							   'contact_column'=> $this->config->config['map']['contacts'] , 
							   'company_column'=> $this->config->config['map']['company'],
		));
	}

	public function web( $page = 1 , $offset = 30 )
	{

		$uid = $this->_G['groupid'] === 1 ? 0 : $this->_G['uid'] ;

		$contacts = $this->marketing->get_web_members( $uid , $page , $offset );

		$sum = $this->marketing->get_web_members_sum( $this->_G['uid']);

		$this->template->build('marketing/web' , array( 'contacts'=>$contacts , 'sum' => $sum , 'offset' => $offset ));
	}

	public function web_members( $uid)
	{
		$uid = intval( $uid);

		if( $this->_G['groupid'] != 1)
		{
			if( 0 === $this->marketing->check_member_vaild( $uid , $this->_G['uid']))
				$status = false;
			else 
				$status = true;
		}

		$this->client_member->create_contact_by_webuser( $uid);
		
	}

	public function send_invitation( $id) {

		$id = intval( $id);

		$this->template->build('marketing/send_invitation');
	}

	public function create_client() {

		if( isset( $_POST['create_client'])) {
			$status = $this->marketing->connect();
		}else {
			$status = Status::NO_ACTION;
		}

		$column = $this->client_config->get_client_mapping();
		$this->template->build('marketing/create_client' , array('column' => $column , 'status' => $status));
	}

	public function profile_del( $id) {

		$id = intval( $id);
		
		$this->marketing->profile_del( $id);
		
		redirect( base_url().'index.php/marketing/index');
		
	}

	public function mailto( $id = 0) {

		$id = intval( $id);

		if( isset( $_POST['send_save'])) {

			$this->marketing->send_save_email();

			redirect( base_url() . 'index.php/marketing/send/');

		}else if( isset( $_POST['save_only'])) {

			$this->marketing->only_send_email();

			redirect( base_url() . 'index.php/marketing/receive/'.$id);
		}

		$client = $this->marketing->get_email_by_id( $id);
		
		if( empty( $client))
		{
			$client = array(
				'id'	=> 0 ,
				'email' => '' ,
				'name'	=> '' ,
			);
		}

		$this->template->build('marketing/mailto' , array( 'client' => $client,));

	}

	public function view_email( $id) {
		$id = intval( $id);
		$mail = $this->marketing->get_email_by_salesmanid( $id , $this->_G['uid']);

		$this->template->build('marketing/view_email' , array( 'mail' => $mail ));
	}

	public function mail_template() {
		
		$this->template->build('marketing/mail_template');

	}

	public function status( $message)
	{
		$this->template->build('marketing/status' , array('message' => $message));
	}


	public function set_start_time()
	{

		echo $this->program->update_start_time(  $this->_G['uid']);
	}

	public function set_end_time()
	{
		echo $this->program->update_end_time(  $this->_G['uid']); 
	}

	public function set_give_up()
	{

		echo $this->program->give_up( $this->_G['uid']);
	}

	private function _program()
	{

		if( $this->input->post('change_contacts_company'))
		{
			$this->marketing->change_contacts_company();
		}

		//从企业创建销售机会
		if( $this->input->post('create_contact_by_company'))
		{
			unset( $_POST['create_contact_by_company']);

			$this->marketing->create_contact_by_company();
		}

		//更新销售机会
		if( $this->input->post('update_opportunity'))
		{
			unset( $_POST['update_opportunity']);
			$this->marketing->update_opportunity();
		}

		//创建销售机会
		if( $this->input->post('create_opportunity'))
		{
			unset( $_POST['create_opportunity']);
			$id = $this->marketing->insert_opportunity();
			redirect( site_url('marketing/view_corporation/'.$id));
			exit;
		}

		//更新企业资料
		if( $this->input->post('update_company'))
		{
			unset( $_POST['update_company']);
			$id = $this->marketing->save_company();
			redirect( site_url('marketing/view_corporation/'.$id));
			exit;
		}

		//新建档案
		if( $this->input->post('create_profile'))
		{
			unset( $_POST['create_profile']);

			if( 1 == $this->marketing->build_profile( $this->_G['uid']))
			{
				redirect('marketing/status/ok');
			}else
			{
				redirect('marketing/status/fail');
			}
		}

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
			unset( $_POST['submit']);
			$id = $this->input->post('contact_id');
			$this->marketing->add_clock_for_contact();
			redirect( site_url('marketing/connect/'.$id));
		}

		if( isset( $_POST['search'])) {
			unset( $_POST['search']);
			return $this->marketing->get_search();
			
		}else {
			return '';
		}

	}
	
	public function __toString() {
		return strtolower( __CLASS__);
	}

}