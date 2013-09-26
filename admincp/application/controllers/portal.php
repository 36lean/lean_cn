<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';
require_once FCPATH.'/vendor/phpquery/phpquery.php';

class Portal extends Base_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('portal/m_portal' , 'portal');
	}

	private function _program()
	{
		if( $this->input->post('post_rule'))
		{
			unset( $_POST['post_rule']);
			$this->portal->save_rule();
		}else if( $this->input->post('post_source'))
		{
			unset( $_POST['post_source']);
			$this->portal->save_source();
		}
	}

	public function navigation() {
		return array(
			array( 	'route' =>'index' 			, 'alias' => '添加新内容' , 'status' => 'active' ) ,
			array(  'route'=>'category'			, 'alias' => '分类/主题/模块' , 'status' => 'active' ) , 
			array(  'route'=>'seo'				, 'alias' => 'SEO管理' , 'status' => 'active') ,
			array(  'route'=>'commit'			, 'alias' => '评论列表' , 'status' => 'active' ) ,
			array(  'route'=>'config' 			, 'alias' => '其它设置' , 'status' => 'active' ) , 
			array(  'route'=>'spider' 			, 'alias' => '采集器' , 'status' => 'active' ) , 
		);
	}

	public function index()
	{

		$this->template->build('portal/index');
	}

	public function category()
	{
		$this->_program();

		$this->template->build('portal/category');
	}

	public function spider()
	{
		$this->_program();

		//规则列表
		$rules = $this->portal->get_file_ergodic( FCPATH.'/data/spider');

		$sources = $this->portal->get_file_ergodic( FCPATH.'/data/spider_source');

		$portals = $this->db->order_by('id','desc')->get('attach_posts')->result_array();

		$this->template->build('portal/spider' , array('rules' => $rules , 'sources' => $sources , 'portals' => $portals));
	}

	public function view( $id)
	{
		
		$id = intval( $id);

		$post = $this->db->where( array('id'=>$id))->get('attach_posts')->row_array();

		$this->template->build('portal/view' , array('post'=>$post));
	}

	public function spider_test( $filename)
	{	

		$info = json_decode( file_get_contents( FCPATH.'data/spider_source/'.$filename) , true );

		$rule = json_decode( file_get_contents( FCPATH.'data/spider/'.$info['rule_name']) , true );

		$this->portal->get_test_data( $rule , $info );

		$this->template->build('portal/spider_test');
	}
}