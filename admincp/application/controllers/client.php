<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Client extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function Client() {
		parent::__construct();
		$this->load->helper('excel_helper');
		$this->load->helper('get_excel');
		//load language package
		//$this->lang->load('client', 'zh_cn');
		$this->load->model('client/client_excel');
		$this->load->model('client/admin_mapping_log' , 'log');
		$this->load->model('client/client_corporation');
		$this->load->model('marketing/m_marketing' , 'marketing');
		$this->load->model('permission/m_permission' , 'permission');
		$this->load->model('client/client_member' , 'client_member');
		$this->load->model('client/client_file' , 'client_file');
		$this->load->model('client/client_get' , 'client_get');
		$this->load->model('common/define_data');
	}

	public function navigation() {
		return array(
			array( 'route' 	=> 'index' 					, 'alias' => '[ 上传 ]' 	, 'status' => 'active') ,
			array( 'route' => 'contact' 				, 'alias' => '[ 联系人 ]'	, 'status' => 'active') ,
			//array( 'route' 	=> 'export' 			, 'alias' => '导出数据' 	, 'status' => 'active') ,
			array( 'route' 	=> 'client_list'			, 'alias' => '[ 客户列表 ]' , 'status' => 'active') ,
			array( 'route' 	=> 'view_all_corporation'	, 'alias' => '[ 企业列表 ]' , 'status' => 'active') ,
			array( 'route'  => 'webmember'				, 'alias' => '[ 网站会员 ]' , 'status' => 'active') ,
			array( 'route' 	=> 'useless_profile'		, 'alias' => '[ 废纸篓 ]' 		, 'status' => 'active') ,
			array( 'route'  => 'edit_contact' 			, 'alias' => '编辑客户' 	, 'status' => 'disabled') ,
			array( 'route'  => 'turntodb' 				, 'alias' => '编辑导入' 	, 'status' => 'disabled') ,
		);
	}

	public function index()
	{	
		$this->_program();

		$list = $this->client_file->get_file_list();

		$this->template->build('client/index' , array('list'=>$list));
	}

	public function turntodb( $md5)
	{

		$json_cache = opendir('data/excel/');

		while( $f = readdir( $json_cache))
		{
			if( preg_match('/^[.]+/', $f))
				continue;
			unlink('data/excel/'.$f);
		}
		if( file_exists( 'data/cache/config.conf'))
			unlink('data/cache/config.conf');

		$this->_program();

		$md5 = trim( $md5);

		$file = $this->db->where( array('md5'=>$md5))->get('admin_uploads')->row_array();

		$data = readexcel( 'uploads/excel/' . $file['file']);
		
		function fil( $tmp){
			$t = array_unique( $tmp);
			if( count( $t)===1 && !$t[0])
				return false;
			return true;
		}

		$result = array_filter( $data , 'fil');

		file_put_contents( 'data/cache/'.$md5.'.tmp', json_encode( $result) );

		$column = $result[0];

		$column = array_filter( $column);

		$this->template->build( 'client/turntodb' , array( 'column'=>$column , 
														'md5'=>$md5 , 
														'demo' => $result[1] , 
														'sum'=>count( $result) , 
														'file_id' => $file['id'] ,
														'file' =>$file['file'],
														)
							);
	}

	public function importdata()
	{
		if( file_exists( 'data/cache/config.conf'))
		{


			$d = opendir('data/excel/');

			$file_list = array();

			while( $name = readdir( $d))
			{
				if( preg_match('/^[.]+/', $name))
					continue;
				$file_list[] = $name; 
			}

			$this->template->build('client/importdata' , array('file_list'=>$file_list));

		}
		else
		{
			$this->template->build('client/importdata' , array('info'=>'没有设置映射文件'));
		}
	}

	public function import_json_cache( $file)
	{
		if( $this->_program())
		{
			unlink( 'data/excel/'.$file);

			redirect('client/importdata');
		}

		$data = json_decode( file_get_contents( 'data/excel/'.$file) , true);

		$config = json_decode( file_get_contents( 'data/cache/config.conf') , true);

		$master = $this->permission->get_admin_lists();

		$tags = $this->client_get->get_contact_tags();

		$this->template->build('client/import_json_cache' , array('data'=>$data,'config'=>$config,'file'=>$file,'master'=>$master,'tags'=>$tags));
	}

	public function contact( $page = 1 , $offset = 30)
	{

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
		
		$clients = $this->marketing->get_clients( $page , $offset , $uid , $condition);
		
		$sum = $this->marketing->sum_of_clients();
 	
		$this->template->build('client/contact' , array( 'client' => $clients , 
													   	 'page' 	=> $page , 
													     'offset' => $offset,
													     'sum'    => $sum,
													    )
		);		

		
	}

	public function edit_contact( $id)
	{

		$status = $this->_program();

		$id = intval( $id) ;

		$tag = $this->define_data->get_selection_key_value( 'admin_clienttags' , 'id' , 'tag');

		$connect = $this->define_data->get_data_by_id( 'admin_client_connect' , $id , 'client_id');

		$this->template->build('client/edit_contact' , array('profile' => $this->client_member->get_contact_by_id( $id) , 
														     'tag' 	   => $tag ,
														     'connect' => $connect ,
														     'status'  => isset( $status) ? $status : '',
														    )
		);
	}

	/*
	public function export()
	{

		$title = array( 'email');
		$data = $this->client_excel->get_export_data();
		$path = download( $title , $data);

		$this->layout->view('client/export' , array('file' => $path));
	}
	*/

	public function dispatch(  $page = 1 , $offset = 20) {


		$admins = $this->permission->get_admin_lists();

		if( isset( $_POST['dispatch'])) {
			$this->marketing->update_salesmanid();
		}

		$clients = $this->marketing->get_clients_by_row( $page, $offset*10);
		$this->template->build('client/dispatch' , array('client' 	=> $clients , 
													  'page' 	=> $page , 
													  'offset' 	=> $offset , 
													  'admins' 	=> $admins)
		);
	}

	public function webmember( $page = 1 , $offset = 50 ) {
		
		$members = $this->client_member->get_website_members($page,$offset);

		$sum = $this->client_member->get_sum_of_members();

		$this->template->build('client/webmember', array(		'members' 	=> $members , 
															 'sum' 		=> $sum ,
															 'page'     => $page,
															 'offset'   => $offset,
															 'current'  => count( $members),
															 ));
	}

	public function edit_webmember( $uid)
	{
		$uid = intval( $uid);

		$profile = $this->client_member->get_member_by_uid( $uid);

		$this->template->build('client/edit_webmember' , array('profile'=>$profile));
	}

	public function corporation() {

		$this->template->build('client/corporation');
	}

	public function find_corporation() {
		$this->layout->view('client/find_corporation');
	}

	public function add_corporation() {
		$this->load->model('client/client_corporation');
		if( $this->input->post('build')) {	
			$flag = $this->client_corporation->insert_info();
		}

		$final = $this->client_corporation->fetch_final_corp();

		$this->template->build('client/add_corporation' , array('final' => $final));
	}

	public function view_all_corporation( $page = 1 , $offset = 30 ) {
		$this->template->build('client/view_all_corporation' , array(	'list'  => $this->client_corporation->fetch_all( $page , $offset),
																		'today' => date('Y/m/d' ,time()),
		));
	}

	public function corp_information ( $id) {
		$id = intval( $id);
		$info = $this->client_corporation->fetch_by_id( $id);
		$this->template->build('client/corp_information' , array('info' => $info[0]));
	}

	public function client_list( $page=1 , $offset=50) {
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
 	
		$this->template->build('client/contact' , array( 'client' => $client , 
													     'page'   => $page , 
													   	 'offset' => $offset,
													   	 'sum'    => $sum,
													    )
		);
	}

	public function throw_profile( $id) {
		
		$id = intval( $id);

		$user_id = intval( $this->_G['uid']);

		$status = $this->client_member->throw_profile( $id , $user_id);

		$this->template->build('client/throw_profile' , array('status' => $status));

	}

	public function useless_profile() {
		$this->template->build('client/useless_profile');
	}

	public function edit_connect_record( $id)
	{
		$from_id = $this->_program();
		if( $from_id)
		{
			redirect( site_url('client/edit_contact/'.$from_id));
			exit;
		}

		$id = intval( $id);

		$connect = 	$this->define_data->get_data_by_id('admin_client_connect' , $id , 'id');

		$this->template->build('client/edit_connect_record' , array('connect'=> isset( $connect[0]) ? $connect[0] : array() ));
	}

	private function _program()
	{

		//添加沟通记录
		if( $this->input->post('add_connect'))
		{
			unset( $_POST['add_connect']);
			if( $this->client_excel->add_connect())
			{
				redirect( site_url('client/edit_contact/'.$this->input->post('client_id')));
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

		//上传
		if( $this->input->post('upload_file'))
		{
			$this->client_file->save_file();
		}

		//修改
		if( $this->input->post('map_to_database'))
		{
			unset( $_POST['map_to_database']);
			$this->client_file->map_to_database();

			redirect( 'client/importdata');
		}

		//真正的导入
		if( $this->input->post('to_database'))
		{
			unset( $_POST['to_database']);
			$this->client_file->to_database();

			return true;
		}
	}

	public function __toString() {
		return strtolower( __CLASS__);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */