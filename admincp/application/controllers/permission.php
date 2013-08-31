<?php
require 'Base_Controller.php';

class Permission extends Base_Controller  {

	public function __construct() {
		parent::__construct();
		$user =  $this->_G;

		if( 1 !== $user['adminid']) {
			redirect( base_url() . 'index.php/error/deny');
			exit;
		}

		$this->load->model('permission/m_permission' , 'permission');	
	}

	public function navigation() {
		return array(
			'index',
			'per_category',
			'per_user',
		);
	}

	public function index() {

		$user = $this->permission->get_admin_lists();


		$this->layout->view('permission/index' , array('user' => $user));
	}

	public function per_category() {
		
		global $modules;

		if( 'del' === $this->uri->segment(3)) {
			$this->permission->del_group( intval( $this->uri->segment(4)));
		}

		if( isset( $_POST['add_group'])) {
			$this->permission->add_group();
		}

		$group = $this->permission->get_all_group();
		$this->layout->view('permission/per_category' , array('controller' 	=> 		$this->get_controller(),
															  'modules'     =>  	$modules,
			                                                  'group'		=> 		$group
		));
	}

	public function per_user() {

		if( isset( $_POST['save'])) {
			$this->permission->updated_user();
		}

		if( isset( $_POST['add_to_list'])) {
			$this->permission->add_to_list();
		}

		$user_list = $this->permission->get_admin_lists();

		$resource_list =  $this->permission->get_resource_lists();


		$this->layout->view('permission/per_user' , array('lists' => $user_list , 'resource' => $resource_list));
	}

	public function del_user( $id) {
		$id = intval( $id);
		$this->permission->del_user( $id);
		redirect( base_url() . 'index.php/permission/per_user');
	}

	public function sql() {
		$this->layout->view('permission/sql');
	}
	
	public function __toString() {
		return strtolower( __CLASS__);
	}
}