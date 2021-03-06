<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';
require_once FCPATH.'/vendor/phpquery/phpquery.php';

class Portal extends Base_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->template->set_layout('portal_layout');

		$this->load->model('portal/m_portal' , 'portal');

		$this->load->model('portal/m_article' , 'article');
	}

	private function _program()
	{
		if( $this->input->post('post_rule'))
		{
			unset( $_POST['post_rule']);
			$this->portal->save_rule();
		}
		else if( $this->input->post('post_source'))
		{
			unset( $_POST['post_source']);
			$this->portal->save_source();
		}

		if( $this->input->post('operation'))
		{
			unset( $_POST['operation']);

			$this->article->batch_change();
		}

		if( $this->input->post('delete'))
		{
			unset( $_POST['delete']);
			unset( $_POST['category']);
			unset( $_POST['status']);

			$this->article->remove_articles();
		}

		if( $this->input->post('clean'))
		{
			unset( $_POST['clean']);
			unset( $_POST['category']);
			unset( $_POST['status']);

			$this->article->clean_articles();			
		}

		if( $this->input->post('reback'))
		{
			unset( $_POST['reback']);
			unset( $_POST['category']);
			unset( $_POST['status']);

			$this->article->reback_articles();					
		}

		if( $this->input->post('test'))
		{
			$this->portal->eg_filter();
		}
	}

	public function navigation() {
		return array(
			array( 	'route' =>'index' 			, 'alias' => '添加新内容' , 'status' => 'active' ) ,
			array(  'route'=>'category'			, 'alias' => '内容列表' , 'status' => 'active' ) , 
			array(  'route'=>'trash'            , 'alias' => '内容回收站' , 'status' => 'active') ,
			array(  'route'=>'seo'				, 'alias' => 'SEO管理' , 'status' => 'active') ,
			array(  'route'=>'commit'			, 'alias' => '评论列表' , 'status' => 'active' ) ,
			array(  'route'=>'config' 			, 'alias' => '其它设置' , 'status' => 'active' ) , 
			array(  'route'=>'spider' 			, 'alias' => '采集器' , 'status' => 'active' ) , 
		);
	}

	public function index( $action = '' , $category_id = 0)
	{

		$this->article->add_category();

		$this->article->add_article();

		$categories = $this->article->get_categories();

		if( $action === 'category' )
		{
			$old_category = $this->article->get_category_by_id( $category_id);

			
		}else
		{
			$old_category = array();
		}

		$tags = $this->article->get_all_tags();

		$current_tag = $this->article->get_tags_by_postid( 0 );

		$this->template->build('portal/index' , array('categories'=>$categories , 'old_category'=>$old_category , 'tags'=>$tags , 'current_tag'=>$current_tag));

	}

	public function category_remove( $id)
	{
		$id = intval( $id);

		$this->article->category_remove( $id);

	}

	public function category( $page = 1 , $offset = 50)
	{
		$this->_program();

		$articles = $this->article->get_articles( $page , $offset);

		$sum = $this->article->get_sum_of_articles();

		$categories = $this->article->get_categories();

		$this->template->build('portal/category' , array('articles' => $articles ,
														 'categories'=> $categories ,
														 'offset'	=> $offset , 
														 'sum'		=> $sum , 
		));
	}

	public function trash( $page = 1 , $offset = 50)
	{
		$this->_program();

		$articles = $this->article->get_articles( $page , $offset , 1 );

		$sum = $this->article->get_sum_of_articles(1);

		$categories = $this->article->get_categories();

		$this->template->build('portal/trash' , array('articles' => $articles ,
														 'categories'=> $categories ,
														 'offset'	=> $offset , 
														 'sum'		=> $sum , 
		));
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

		$data = $this->portal->get_test_data( $rule , $info , TRUE );

		$this->template->build('portal/spider_test' , array('data' => $data));
	}

	public function spider_generate( $filename)
	{	

		$info = json_decode( file_get_contents( FCPATH.'data/spider_source/'.$filename) , true );

		$rule = json_decode( file_get_contents( FCPATH.'data/spider/'.$info['rule_name']) , true );

		$this->portal->get_test_data( $rule , $info , FALSE );

	}

	public function edit_article( $id)
	{
		$id = intval( $id);

		$this->article->add_article();

		$article = $this->article->get_article_by_id( $id);

		$categories = $this->article->get_categories();

		$current_tag = $this->article->get_tags_by_postid( $id );

		$tags = $this->article->get_all_tags();

		$this->template->build('portal/edit_article' , array('article'=>$article , 'categories'=>$categories , 'tags' => $tags , 'current_tag' => $current_tag));
	}

	public function seo()
	{	
		$this->article->add_center_article();

		$this->article->add_left_article();

		$articles = $this->article->get_home_articles();

		$this->template->build( 'portal/seo' , array('articles'=>$articles));
	}

	public function config()
	{

		$save_words = $this->article->add_keywords();

		$this->article->add_tag();

		$tags = $this->article->get_all_tags();

		$this->template->build('portal/config' , array('tags' => $tags , 'save_words'=>$save_words));
	}

	public function word_manage()
	{

		$word = $this->article->get_keywords_disabled();

		$this->template->build('portal/word_manage' , array('word' => $word));
	}

	public function word_active()
	{
		$word = $this->article->get_keywords_active();

		$this->template->build('portal/word_active' , array('word' => $word));		
	}

	public function edit_seo( $id)
	{

		$this->portal->seo_updates();

		$id = intval( $id);

		$data = $this->article->get_seo_by_id( $id);

		$this->template->build('portal/edit_seo' , array('data' => $data));
	}

	public function remove_seo( $id)
	{
		$id = intval( $id);

		$this->article->remove_seo( $id );

		redirect( site_url('portal/seo'));
	}

	public function refresh()
	{
		$d = opendir('../news/db_cache/');
		while( $f = readdir( $d))
		{

			if( preg_match('/(\.)|(\.\.)/', $f))
				continue;

			if( is_dir( '../news/db_cache/'.$f))
			{
				$d1 = opendir('../news/db_cache/'.$f);

				while( $f1 = readdir($d1))
				{
					if( is_file( '../news/db_cache/'.$f.'/'.$f1))
						unlink( '../news/db_cache/'.$f.'/'.$f1);
				}
			}
			redirect('portal/seo');
		}
	}

	public function get_title_by_id()
	{
		$id = intval( $this->input->post('id'));

		$posts = $this->db->select('post_title,post_content,post_summary')->from('attach_posts')->where( array('id'=>$id))->get()->row_array();

		echo json_encode( $posts);
	}

	/**
	* ajax add/remove tag for article
	* @access public
	* @return integer
	* @author mot
	*
	**/
	public function add_tag_for_article()
	{
		
		$tag_id = intval( $this->input->post('tag_id') );
		$article_id = intval( $this->input->post('article_id') );

		echo $this->article->handle_tag_for_article( $tag_id , $article_id );
 	}

 	/**
	* add more tag for tags library
	* @access public
	* @return integer
	* @author mot
	*
 	**/
 	public function add_tag_for_library()
 	{
 		$tag_name = trim( strip_tags( $this->input->post('tag_name') ) );

 		echo $this->article->add_new_tag( $tag_name );
 	}

 	/**
	*
	*
	*
 	**/
 	public function change_keyword_status()
 	{
 		$id = intval( $this->input->post('id'));
 		$value = trim( strip_tags( $this->input->post('value') ) );

 		echo $this->article->change_keyword_status( $id , $value);
 	}

}