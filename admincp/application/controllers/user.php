<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('login_layout');

		$user = $this->session->userdata('status');

		if( isset( $user['username']))
			redirect( base_url());
	}

	public function index() {
		$this->layout->view('user/index');

	}

	public function login() {
		
		$this->load->model('user/m_user','user');

		if( isset( $_POST['login'])) {
			$code = $this->user->login();
		}else {
			$code = Status::NO_ACTION;
		}

		$this->layout->view('user/login' , array('code' =>  $code));
	}

	public function logout() {

		$this->session->unset_userdata('user');

		redirect( base_url() . 'index.php/user/login');
		
	}

}