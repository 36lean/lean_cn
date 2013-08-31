<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Marketing extends Base_Controller{
	
	public function __construct() {
		parent::__construct();

		$this->load->model('marketing/m_marketing' , 'marketing');
		$this->load->model('client/client_config');
		$this->load->model('mailer/m_mailer' , 'mailer');
	}

	public function navigation() {
		return array(
			'index',
			'corporation',
			'create_client',
			'website_member',
			'mail_template',
		);
	}

	public function index( $page=1 , $offset=50) {

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

	public function corporation() {

		$this->layout->view('marketing/corporation');

	}

	public function connect( $id) {
		$user_id = intval( $id);
		//$this->session->unset_userdata('cookie');

		if( isset( $_POST['pin'])) {
			$this->marketing->pin_date( array('client_id' 		=> $user_id , 
											  'salesman_id' 	=> $this->_G['uid'] , 
											  'datereminded' 	=> strtotime( trim($_POST['date'])),
											  'event'			=> trim( $_POST['event'])
											  )
			);
			redirect( base_url() . 'index.php/marketing/connect/'.$user_id);
		}

		if( isset( $_POST['response'])) {
			$this->marketing->add_response_log();
			redirect( base_url().'index.php/marketing/connect/'.$id);
		}

		if( isset( $_POST['add_reminder'])) {
			$this->marketing->add_reminder();
			redirect( base_url().'index.php/marketing/connect/'.$id);
		}

		$profile = $this->marketing->get_client_profile( $id);
		$column = $this->client_config->get_client_mapping();

		

		if( is_array( $data = $this->session->userdata('cookie')) ) {
			if( !in_array( array('id' => $profile[0]['id'] , 'name' => $profile[0]['name']) ,  $data)) {

				$data [] = array('id' => $profile[0]['id'] , 'name' => $profile[0]['name']);
				
			}
			if( count( $data) > 20)
				$data = array_slice( $data, 1);

			$this->session->set_userdata('cookie' , $data);
		}else {
			$data = array();
			$this->session->set_userdata('cookie' , $data);
		}

		$apponintment = $this->marketing->get_appointment( $id , $this->_G['uid']);

		$connect_log = $this->marketing->get_connect_log( $user_id , 5);

		$send_mails = $this->marketing->get_email_to_client( $user_id , $this->_G['uid'] , 15);

		$reminders = $this->marketing->get_reminder( $user_id , $this->_G['uid'] , 10);

		$this->layout->view('marketing/connect' , array('profile' => $profile[0] , 
														'column' => $column,
														'connect_log' => $connect_log,
														'send_mails' => $send_mails,
														'reminders' => $reminders,
														'apponintment' => $apponintment,
														'tags'		=>  $this->marketing->get_all_tags()
														)
		);
	}

	/*
	*@删除沟通记录
	*/
	public function linkup_remove( $id) {
		$id = intval( $id);
		$connect_id = $this->marketing->linkup_remove( $id);

		redirect( base_url() .'index.php/marketing/connect/'.$connect_id);
	}

	public function edit_client( $id) {

		$id = intval( $id);
		
		if( isset( $_POST['save'])) {
			if( $this->marketing->edit_client()) {
				$status = Status::UPDATE_SUCCESS;
			}else {
				$status = Status::UPDATE_FAIL;
			}
		}else {
			$status = Status::NOTHING;
		}
		
		$return = $this->marketing->is_client_belongto(  $id,$this->_G['uid'] , $this->_G['adminid']);
		$config = $this->client_config->get_client_mapping();
		unset( $config['cname']);unset( $config['cdescription']);unset( $config['caddress']);

		$this->layout->view('marketing/edit_client' , array( 'client_id' => $id, 'status' => $status, 'return' => $return , 'config' => $config));
	}

	public function send() {

		$this->layout->view('marketing/send');
	}

	public function message_center() {

		$apponintments = $this->marketing->get_appointments( $this->_G['uid']);


		$this->layout->view('marketing/message_center' , array('apponintments' => $apponintments));

	}

	public function linkup() {

		$this->layout->view('marketing/linkup');
	}

	public function reminder() {

		$this->layout->view('marketing/reminder');
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

	public function client_tags() {

		if( isset( $_GET['add'])) {
			$this->marketing->add_tags();
			redirect( base_url().'index.php/marketing/client_tags');
		}

		$this->layout->view('marketing/client_tags' , array('tags' => $this->marketing->get_all_tags()));
	}

	public function set_tag( $client_id , $tagid ) {
			
		$this->marketing->set_tag( $client_id , $tagid , $this->_G['uid']);
		redirect( base_url().'index.php/marketing/connect/'.$client_id);
	}

	public function website_member() {

	}

	public function mail_template() {

		
		$this->layout->view('marketing/mail_template');

	}

	
	public function __toString() {
		return strtolower( __CLASS__);
	}

}