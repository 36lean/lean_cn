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
	}

	public function navigation() {
		return array(
			'index',
			'excel',
			'export',
			'dispatch',
			'dispatch_member',
			'client_list',
			'view_all_corporation',
			'useless_profile'
		);
	}

	public function index()
	{	
		//echo $this->lang->line('client_title');
		$row_record = $this->client_excel->fetch_excel_rows();
		$this->layout->view('client/index' , array( 'record' => $row_record));
	}

	public function excel() {
		if( $this->input->post('upload')){
			
			if( isset( $_FILES['excel'])){
				preg_match('/[.].+$/', $_FILES['excel']['name'], $match);
				if( '.xls' === $match[0]){

				move_uploaded_file( $_FILES['excel']['tmp_name'], FCPATH.'uploads/temp.xls');

				$result = readexcel( FCPATH.'uploads/temp.xls');

				//使用 client_excel model
				$this->load->model('client/client_excel');
				
				//插入字段信息
				$row_id = $this->client_excel->insert_row_info(  $_FILES['excel']['name'], json_encode( $result[0]));


				unset( $result[0]);
				//插入用户数据
				foreach ($result as $re) {
					$this->client_excel->insert_row_data( $row_id , json_encode( $re));
				}
				header('Location: '.base_url().'index.php/client/excel');
				//$this->layout->view('client/excel'  , array( 'result' => $result));
				}else {
					echo '<div class="container alert alert-info"><strong><i class="icon-info-sign"></i> 文件类型不对 请上传xls后缀名</strong><button type="button" class="close" data-dismiss="alert">&times;</button></div>';
				}
				//header('Location: '.base_url().'index.php/client/excel');
			}
		}else{
			$row_record = $this->client_excel->fetch_excel_rows();
			$this->layout->view('client/excel' , array( 'record' => $row_record));
		}
	}

	public function export()
	{

		$title = array( 'email');
		$data = $this->client_excel->get_export_data();
		$path = download( $title , $data);

		$this->layout->view('client/export' , array('file' => $path));
	}

	/*
	public function csv() {
		header('Content-type:text/html;charset:UTF-16');
		if( $this->input->post('upload')) {
			if( isset( $_FILES['csv'])){

				preg_match('/[.].+$/', $_FILES['csv']['name'], $match);
				if( '.csv' === $match[0]){
					move_uploaded_file( $_FILES['csv']['tmp_name'], FCPATH.'uploads/temp.csv');
					readcsv( FCPATH.'uploads/temp.csv');
					exit;
				}else {
					echo '<div class="container alert alert-info"><strong><i class="icon-info-sign"></i> 文件类型不对  请上传csv后缀名</strong><button type="button" class="close" data-dismiss="alert">&times;</button></div>';
				}
			}

		}
		$this->layout->view('client/csv');
	}
	*/

	public function manage_excel( $id) {
		$id = intval( $id);


		if( isset($_POST['map'])) {
			$this->log->new_log();
		}

		$row = $this->client_excel->fetch_excel_row_by_id( $id);
		$data = $this->client_excel->fetch_excel_row_info( $id);
		$this->load->model('client/client_config' , 'mapping');

		$client_mapping = $this->mapping->get_client_mapping();
		$rule = $this->log->get_log_by_infoid( $row[0]['id']);

		if( isset( $_POST['import_client'])) {

			$map = $rule[0];

			//excel中的字段 用来描述公司信息
			$corporation_column = json_decode( $row[0]['row']);

			$import_file_info = $row[0];

			$this->client_excel->import_client( $map , $import_file_info , $corporation_column);
		}

		
		$this->layout->view('client/manage_excel' , array( 	'row' 				=> json_decode( $row[0]['row']) , 
															'infos' 			=> $data , 
															'id' 				=> $id , 
															'client_mapping' 	=> $client_mapping ,
															'info_id' 			=> $row[0]['id'] ,
															'rule' 				=> $rule,
															'client_sum'		=> $this->client_excel->number_of_import_data( $id),
															'tags'				=> $this->marketing->get_all_tags(),
															'group_members'     => $this->permission->get_admin_lists(),
														  ));
	}

	public function dispatch(  $page = 1 , $offset = 20) {


		$admins = $this->permission->get_admin_lists();

		if( isset( $_POST['dispatch'])) {
			$this->marketing->update_salesmanid();
		}

		$clients = $this->marketing->get_clients_by_row( $page, $offset*10);
		$this->layout->view('client/dispatch' , array('client' 	=> $clients , 
													  'page' 	=> $page , 
													  'offset' 	=> $offset , 
													  'admins' 	=> $admins)
		);
	}

	public function dispatch_member($page=1,$offset=50) {

		$members = $this->client_member->get_website_members($page,$offset);

		$sum = $this->client_member->get_sum_of_members();

		$this->layout->view('client/dispatch_member' , array('members' 	=> $members , 
															 'sum' 		=> $sum ,
															 'page'     => $page,
															 'offset'   => $offset,
															 'current'  => count( $members),
															 )
		);
	}

	public function view_members( $id) {
		
	}

	public function corporation() {

		$this->layout->view('client/corporation');
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

		$this->layout->view('client/add_corporation' , array('final' => $final));
	}

	public function view_all_corporation() {
		$this->layout->view('client/view_all_corporation' , array(	'list' => $this->client_corporation->fetch_all(),
																	'today' => date('Y/m/d' ,time()),
		));
	}

	public function corp_information ( $id) {
		$id = intval( $id);
		$info = $this->client_corporation->fetch_by_id( $id);
		$this->layout->view('client/corp_information' , array('info' => $info[0]));
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
 	
		$this->layout->view('client/client_list' , array( 'client' => $client , 
													   'page' 	=> $page , 
													   'offset' => $offset,
													   'sum'    => $sum,
													 )
		);
	}

	public function throw_profile( $id) {
		$id = intval( $id);

		$status = $this->client_member->throw_profile( $id);

		$this->layout->view('client/throw_profile' , array('status' => $status));

	}

	public function useless_profile() {
		$this->layout->view('client/useless_profile');
	}

	public function __toString() {
		return strtolower( __CLASS__);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */