<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Sale extends Base_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('sale/m_sale' , 'sale');
		$this->load->model('common/define_data');
		$this->load->model('marketing/m_marketing' , 'marketing');
		$this->load->model('sale/m_mail' , 'mail');
	}

	public function navigation()
	{
		return array(
			array('route' => 'index' 		, 'alias' => '客户列表' , 'status' => 'active') ,
			array('route' => 'web' 			, 'alias' => '网站会员' , 'status' => 'active') ,
			array('route' => 'expense' 		, 'alias' => '付费会员' , 'status' => 'active') ,
			array( 'route' => 'recent' 		, 'alias' => '最近联系人' , 'status' => 'active') ,
			array('route' => 'remind' 		, 'alias' => '今日提醒' , 'status' => 'active') ,
			array('route' => 'allremind' 	, 'alias' => '所有提醒' , 'status' => 'active') ,
			array('route' => 'cleanlist' 	, 'alias' => '清理列表' , 'status' => 'active') ,
			array( 'route' => 'create' 		, 'alias' => '新建档案' , 'status' => 'active') ,
		);
	}

	public function index( $page = 1 , $offset = 16 )
	{

		$sale_id = $this->_G['uid'];
		//FILTER
		$search = $this->session->userdata('search');

		if( is_array( $search))
		if( 'time' === key( $search))
		{

			if( $search['time'] === 'timecreated' )
			{	

				$condition = 'modified_date';
			}
			else if( $search['time'] === 'userid')
			{
				$condition = 'id';				
			}else 
			{
				$condition = '';
			}
		}

		else if( 'tag' === key( $search))
		
		{
			$condition = array( 'contacts.tag' => $search['tag']);
		}

		else 
		
		{
			$condition = '';
		}

		if( !isset( $condition))
			$condition = '';
		//SEARCH
		$contacts = $this->sale->get_searches( $page , $offset , $sale_id , $condition );


		if( !isset( $contacts) ) {

			$contacts = $this->sale->get_sale_contacts( $page , $offset , $sale_id , $condition);

		}	


		$sum = $this->sale->get_contact_sum( $sale_id);

		$tags = $this->sale->get_contact_tags();

		$remind_num = $this->sale->get_today_remind( $sale_id);
		
		$this->template->build('sale/index' , array ( 'contacts' 	=> $contacts ,
													  'tags'	 	=> $tags , 
													  'remind_num'	=> $remind_num , 
													  'sum' 	 	=> $sum , 
													  'offset'   	=> $offset ,  
													) 
		);
	}

	public function expense( $page = 1 , $offset = 30)
	{


		$list = $this->sale->get_expense_members( $page , $offset );

		$sum = $this->sale->get_extension_sum();

		$this->template->build('sale/expense' , array('list'=>$list , 'offset' => $offset , 'sum' => $sum));

	}

	public function remind( $page = 1 , $offset = 30 )
	{

		$sale_id = $this->_G['uid'];

		$today = strtotime( date('Y-m-d') );

		$last = intval( $today - 1 ) ;

		$next = ( $today+86399 );

		$data = $this->sale->get_contact_details( $page , $offset , $sale_id , $last , $next);

		$sum = $this->sale->get_message_sum( $this->_G['uid']);

		$this->template->build('sale/remind' , array( 'contacts'	=>	$data , 
													  'offset'	=>	$offset , 
													  'sum' 	=> 	$sum ,
													  'last'    =>  $last , 
													  'next'    =>  $next ,
													)
		);

	}

	public function allremind( $page = 1 , $offset = 30 )
	{

		$sale_id = $this->_G['uid'];

		$today = strtotime( date('Y-m-d') );

		$last = intval( $today - 1 ) ;

		$next = ( $today+86399 );

		$data = $this->sale->get_contact_details( $page , $offset , $sale_id);

		$sum = $this->sale->get_message_sum( $this->_G['uid']);

		$this->template->build('sale/allremind' , array( 'contacts'	=>	$data , 
													  	 'offset'	=>	$offset , 
													  	 'sum' 	=> 	$sum ,
													  	 'last'    =>  $last , 
													  	 'next'    =>  $next ,
													)
		);

	}

	public function edit_connect_record( $id)
	{
		$from_id = $this->_program();

		if( $from_id)
		{
			redirect( site_url('sale/contact/'.$from_id));
			exit;
		}

		$id = intval( $id);

		$connect = 	$this->define_data->get_data_by_id('admin_client_connect' , $id , 'id');

		$this->template->build('sale/edit_connect_record' , array('connect'=> isset( $connect[0]) ? $connect[0] : array() ));
	}

	public function contact( $id)
	{
		$status = $this->_program();

		$id = intval( $id) ;

		$tag = $this->define_data->get_selection_key_value( 'admin_clienttags' , 'id' , 'name');

		$connect = $this->define_data->get_data_by_id( 'admin_client_connect' , $id , 'client_id');

		$profile = $this->sale->get_contact_by_id( $id);

		$web_profile = $this->sale->get_profile_by_contact_id( $id);

		$from_website = $this->sale->is_contact_from_website( $id);

		$this->template->build('sale/contact' , array(       'profile' =>  $profile, 
														     'tag' 	=> $tag ,
														     'connect' => $connect ,
														     'status'  => isset( $status) ? $status : '',
														     'web_profile' => $web_profile , 
														     'is_contact_from_website' => $from_website , 
														  )
							);

	}


	public function web( $page = 1 , $offset = 30 )
	{

		$uid = $this->_G['groupid'] === 1 ? 0 : $this->_G['uid'] ;

		$contacts = $this->sale->get_web_members( $uid , $page , $offset );

		$sum = $this->sale->get_web_members_sum( $this->_G['uid']);

		$this->template->build('sale/web' , array( 'contacts'=>$contacts , 'sum' => $sum , 'offset' => $offset ));
	}

	public function recent( $page = 1 , $offset = 30)
	{

		$contacts = $this->sale->get_contacts_by_contactlog( $page , $offset ); 

		$sum = $this->sale->get_sum_by_contactlog(); 

		$this->template->build('sale/recent' , array( 'contacts'=>$contacts , 
													  'sum' => $sum , 
													  'offset' => $offset 
													)
		);
	}

	public function add_remind()
	{

		$sale_id = $this->_G['uid'];

		echo $this->sale->add_remind( $sale_id );

	}

	public function remove_remind( $id)
	{
		
		$sale_id = $this->_G['uid'];

		$this->sale->remove_remind ( $id , $sale_id );

		redirect( 'sale/remind');

	}

	public function set_condition( $condition)
	{

		$condition = trim( $condition);

		if( preg_match( '/^\d+$/', $condition) )
		{
			$this->session->set_userdata('search' , array( 'tag' => $condition) );
		}
		else
		{
			$this->session->set_userdata('search' , array( 'time' => $condition));
		}

		redirect( site_url('sale/index'));
	}

	public function get_contacts_log()
	{
		$contact_id = intval( $this->input->post('id'));

		$array = $this->sale->get_contacts_log( $contact_id );

		foreach ($array as $key => $value) {

			if( 'am' === date('a' , $value['date']) )
				$h = date('h' , $value['date']);
			else if ( 'pm' === date('a' , $value['date']) ) {
				$h = date('h' , $value['date']) + 12;
			}

			$array[$key]['date'] = date('Y-m-d '.$h.':i' , $value['date']);

			$array[$key]['id'] = $key+1;
		}

		if( $array)
			echo json_encode( $array);
		else
			echo 911;
	}

	public function update_tag( $id , $tag_id)
	{
		$this->sale->update_tag( $id , $tag_id , $this->_G['uid']); 
	}

	public function add_contact()
	{
		$id = intval( $this->input->post('id'));
		$text = trim( $this->input->post('text'));
		$this->sale->add_contact( $id , $text , $this->_G['uid']);
	}

	public function clean_contact()
	{
		
		echo $this->db->update('admin_contacts' , array('close' => '1') , array( 'id' => $this->input->post('id')));

	}

	public function change_color()
	{
		echo $this->db->update( 'admin_contacts' , 
							array('display_color' => intval( $this->input->post('color')) ) ,
							array('id' => $this->input->post('id'))
						 );
	}

	public function remove_arraged_webmember( $id)
	{
		$id = intval ( $id);

		$uid = $this->_G['uid'];

		$this->sale->remove_arraged_webmember( $id , $uid);

		redirect( site_url('sale/web'));
	}
	
	public function status( $message)
	{
		$this->template->build('marketing/status' , array('message' => $message));
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
				redirect('sale/status/ok');
			}else
			{
				redirect('sale/status/fail');
			}
		}

		//添加沟通记录
		if( $this->input->post('add_connect'))
		{
			unset( $_POST['add_connect']);

			if( $this->sale->add_connect())
			{
				redirect( site_url('sale/contact/'.$this->input->post('client_id')));
				exit;
			}
		}

		//更新资料
		if( $this->input->post('save_profile'))
		{
			unset( $_POST['save_profile']);

			if( $this->sale->update_contact_profile())
				
				return 1;
			
			else
				
				return -1;
		}

		//沟通记录更新
		if( $this->input->post('save_edit'))
		{
			return $this->sale->update_contact_connect();

		}
		else if( $this->input->post('del_connect'))
		{
			return $this->sale->remove_contact_connect();
		}

		//添加约定时间
		if( $this->input->post('submit'))
		{
			unset( $_POST['submit']);

			$id = $this->input->post('contact_id');

			$this->sale->add_clock_for_contact();

			redirect( site_url('sale/contact/'.$id));
		}

		if( isset( $_POST['search'])) {
			unset( $_POST['search']);
			return $this->marketing->get_search();
			
		}else {
			
			return '';

		}

	}

	public function ajax_send()
	{
		$log_id = intval( $this->input->post('id'));

		$info = $this->mail->get_maillog_by_id( $log_id);

		echo $this->mail->send_mail_contact( $info['email'] , $info['template_id'] , $log_id );
	}

	public function send_along( $log_id)
	{
		$log_id = intval( $log_id);

		$info = $this->mail->get_maillog_by_id( $log_id);

		$this->mail->send_mail_contact( $info['email'] , $info['template_id'] , $log_id );

		redirect( site_url('mailer/run_task/'.$info['task_id']));
	}

	public function create()
	{

		$this->_program();

		$this->template->build('marketing/create',array(
							   'contact_column'=> $this->config->config['map']['contacts'] , 
							   'company_column'=> $this->config->config['map']['company'],
		));
	}

	public function web_members( $uid)
	{
		$uid = intval( $uid);

		if( $this->_G['groupid'] != 1)
		{
			if( 0 === $this->sale->check_member_vaild( $uid , $this->_G['uid']))
				$status = false;
			else 
				$status = true;
		}

		$this->sale->create_contact_by_webuser( $uid);
		
	}

	public function cleanlist()
	{
		$list = $this->sale->get_cleaned_contacts();

		$this->template->build('sale/cleanlist' , array('list'=>$list));
	}

	public function return_contact( $id)
	{
		$id = intval( $id);

		$this->db->where( array('id'=>$id))->update( 'admin_contacts' , array('close' => 0));

		redirect( 'sale/cleanlist');
	}

}