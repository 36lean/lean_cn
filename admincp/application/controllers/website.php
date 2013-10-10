<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'Base_Controller.php';
require_once FCPATH.'vendor/spyc/spyc.php';

class Website extends Base_Controller {


	public function Website() {
		parent::__construct();
	}

	public function navigation() {
		return array(
			array( 'route' => 'index' 				, 'alias'=>'新建页面'	, 'status' => 'active' ),
			array( 'route' => 'static_page_manage' 	, 'alias'=>'管理页面' 	, 'status' => 'active' ),
			array( 'route' => 'page_cache'			, 'alias'=>'页面缓存'	, 'status' => 'active' ),
			array( 'route' => 'website_config'		, 'alias'=>'设置'		, 'status' => 'avtive' ),

		);
	}

	public function index() {
		$this->load->model('website/m_website','website');

		if( isset( $_POST['create'])) 
		{

			$status = $this->website->create_page();
		
		}else 
		{

			$status = Status::NOTHING;
			
		}

		$this->template->build('website/index' , array('status' => $status));
	}

	public function page_cache() {

		$cache =  array();

		$cache_folder = preg_replace('/admincp/', '', getcwd()).'cache/' ;

		$file = opendir( $cache_folder);
		while( $f = readdir( $file))
		{
			if( preg_match('/.html/', $f)) {
				$cache[] = $f;
			}
		}

		$this->template->build('website/page_cache' , array('cache_file' => $cache));
	}

	public function cache_clean() {

		$cache_folder = preg_replace('/admincp/', '', getcwd()).'cache/' ;

		$file = opendir( $cache_folder);
		while( $f = readdir( $file))
		{
			if( preg_match('/.html/', $f)) {
				unlink( $cache_folder . $f);
			}
		}


		redirect( base_url() . 'index.php/website/page_cache');
	}

	public function static_page_manage() {

		$this->load->model('website/m_website' , 'website');
		$pages = $this->website->get_static_pages();
		$this->template->build('website/static_page_manage' , array('pages' => $pages));
	}

	public function static_page_edit( $id = 1) {
		$this->load->model('website/m_website' , 'website');

		if( isset( $_POST['save'])) {
			$this->website->edit_page();
		}

		$page = $this->website->get_static_page( intval( $id));
		$this->template->build('website/static_page_edit' , array('page' => $page[0]));
	}

	public function static_page_del( $id) {
		$this->load->model('website/m_website' , 'website');
		$this->website->del_page( $id);

		redirect( base_url().'index.php/website/static_page_manage');
	}

	public function website_config() {
		$array = array();

		$array['name'] = 'wujiayao';
		$array['age'] = '21';


		$yaml = Spyc::YAMLDump($array,4,60);

		print_r( $yaml);
	}
	
	public function __toString() {
		return strtolower( __CLASS__);
	}
}