<?php
//configure all pre_controller information here


class Base_Controller extends CI_Controller {
	
	public $_G;
	//session检查
	public function __construct() {
		parent::__construct();

		//加载缓存
		$this->load->driver('cache');

		$this->_G = $this->session->userdata('user');	
		if( false === $this->_G) {
			redirect( base_url() . 'index.php/user/login');
		}else if( $this->_G['pcode'] !== md5( md5( $this->_G['pstring']) . $this->_G['hash'])) {
			redirect( base_url() . 'index.php/user/login');
		}

		if( intval( $this->_G['adminid']) === 1) {


			$user = $this->session->userdata('user');
			$user['resource'] = $this->get_controller();
			$this->session->set_userdata('user' , $user);
			$this->_G = $this->session->userdata('user');
		}

		$this->auth();
	}
	//@layout -- top navigation before main-content
	public function navigation() {
		return array();
	}
	//@layout -- left side menu list
	public function get_controller() {
		return array(
			'client',
			'course',
			'mailer',
			//'bugtrack',
			'marketing',
			'permission',
			'review',
			'statistic',
			'website',
			'welcome',
		);
	}
	//@user_permission 
	public function auth() {
		
		$module = $this->__toString();
		//第一级权限检查
		if( false === in_array( 'c_'.$module , $this->_G['resource']) && 1 !== intval( $this->_G['adminid'])) {
			$module = $this->uri->segment(2);
			//若是还没有子目录 则跳转到无权限页面
			if( false === in_array( 'm_'.$module, $this->_G['resource']) && 1 !== intval( $this->_G['adminid'])){
				redirect( base_url() . 'index.php/error/deny');
				exit;
			}
		}
	}
	//@__toString
	public function __toString() {
		return strtolower( __CLASS__);
	}

}