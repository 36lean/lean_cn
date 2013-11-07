<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Configure extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('common/define_data' , 'common');

		$this->load->model('configure/m_configure' , 'configure');
		
	}

	public function navigation()
	{
		return array(
			'index_module' => array( 'route' => 'index' , 'alias' => '常规设置' , 'status' => 'active') , 
			'option_module' => array( 'route' => 'option' , 'alias' => '选项设置' , 'status' => 'active') , 
			'permission_module' => array( 'route' => 'permission' , 'alias' => '权限设置' , 'status' => 'active') , 
			'testing_module' => array( 'route' => 'testing' , 'alias' => '状态检测' , 'status' => 'active') , 
		);
	}

	public function index()
	{

		$txt = file_get_contents('./uploads/out.txt');

		$array = json_decode( $txt , true);

		$x = array();
		foreach ($array as $e) {
			$e = trim( $e);
			if( !$e)
				continue;

			$x [] = $this->db->select(' uc.uid , uc.email , uc.username , p.realname , p.gender ,  p.mobile , p.telephone ')
					 ->from( 'ucenter_members uc')
					 ->join( 'common_member_profile as p' , 'p.uid = uc.uid' , 'left')
					 ->like( array('uc.email' => $e) )
					 ->get()->row_array();
		}
		
		$this->template->build('configure/index' , array('x'=>$x));
	}

	public function permission()
	{

		$this->_program();

		$modules = $this->common->get_modules();

		$groups = $this->configure->get_groups();

		$users = $this->configure->get_users();

		$this->template->build('configure/permission' , array( 'modules' => $modules ,  
															   'groups'	 => $groups , 
															   'users'	 => $users , 
															 )
		);
	}

	public function testing()
	{

		$video = $this->configure->get_all_video();


		$this->template->build('configure/testing' , array(
			'video' => $video
		));
	}

	private function _program()
	{
		if( $this->input->post('create_group'))
		{
			unset( $_POST['create_group']);
			
			$this->configure->add_group_rule();

			redirect( site_url('configure/permission'));

			exit;
		}


		if( $this->input->post('add_to_group'))
		{
			$this->configure->add_user_to_group();
			redirect( site_url('configure/permission'));

			exit;
		}

		if( $this->input->post('update_user_group'))
		{
			unset( $_POST['update_user_group']);
			$this->configure->update_user_group();
			redirect( site_url('configure/permission'));

			exit;
		}

	}
}