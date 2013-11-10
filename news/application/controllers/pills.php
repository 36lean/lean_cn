<?php

class Pills extends CI_Controller
{

	private $user;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('article_model');

		$this->load->library('session');

		foreach ($_COOKIE as $key => $value) {
  		
  		if(preg_match('/sid/', $key))
    		$sessionid = $_COOKIE[$key];
		}

		if( isset( $sessionid))
		{
  			$this->user = $this->db->select('username')->from('common_session')->where( array('sid'=>$sessionid))->get()->row_array();

		}else
		{
			$this->user = array();
		}

	}

	public function index()
	{
		$this->template->set('keywords' , '精益培训,精益视频,精益博客,精益生产,改善项目,精益5s,生产管理,现场管理,六西格玛,精益创业,精益生产,5S现场,7大浪费,看板系统,改善之路,实践问题解决,标准作业,及时制生产,价值流分析,快速切换,方针管理')
					   ->set('description' , '全球首家中文一站式在线精益学习平台,改善在线学院主要业务是精益培训')
					   ->title('精企网资讯')
					   ->build('pills/index');
	}

	public function article_list( $category_id = 1 , $page = 1 , $offset = 20 )
	{

		if( preg_match('/^\d+$/', $category_id))
		{
			$category = $this->article_model->get_category_by_id( $category_id);

		}else if( preg_match('/^[a-zA-Z0-9\-\_]+$/' , $category_id) )
		{
			$category = $this->article_model->get_category_by_title( $category_id);

			$category_id = $category['id'];

		}else{

			redirect('pills/sorry_404');

		}

		$list = $this->article_model->get_by_category( $category_id , $page , $offset );

		$sum = $this->article_model->get_sum_by_category( $category_id);

		$this->template->set_layout('list')
					   ->title( $category['category_title'])
					   ->set('keywords' , $category['keywords'])
					   ->set('description' , $category['description'])
					   ->set('summary' , $category['summary'])
					   ->build('pills/article_list' , array ( 'list' 		=> $list , 
															  'category' 	=> $category ,
															  'offset' 	 	=> $offset , 
															  'page'		=> $page , 
															  'sum'			=> $sum ,
														 	)
		);
	}


	public function thelist( $category_id = 1 , $page = 1 , $offset = 500 )
	{

		if( preg_match('/^\d+$/', $category_id))
		{
			$category = $this->article_model->get_category_by_id( $category_id);

		}else if( preg_match('/^[a-zA-Z0-9\-\_]+$/' , $category_id) )
		{
			$category = $this->article_model->get_category_by_title( $category_id);

			$category_id = $category['id'];

		}else{

			redirect('pills/sorry_404');

		}

		$list = $this->article_model->get_by_category( $category_id , $page , $offset );

		$sum = $this->article_model->get_sum_by_category( $category_id);

		$this->template->set_layout('list')
					   ->title( $category['category_title'])
					   ->set('keywords' , $category['keywords'])
					   ->set('description' , $category['description'])
					   ->set('summary' , $category['summary'])
					   ->build('pills/list' , array ( 'list' 		=> $list , 
															  'category' 	=> $category ,
															  'offset' 	 	=> $offset , 
															  'page'		=> $page , 
															  'sum'			=> $sum ,
														 	)
		);
	}

	public function n($title)
	{	

		if(  empty( $this->user['username']) )
		{
			
			$template = 'anonymous';
			//redirect( site_url('pills/anonymous/'.$title) );
		}

		else

		{
			$template = 'n';
		}

		$title = trim( $title);

		if( preg_match('/^\d+$/', $title) )
		{
			$article = $this->article_model->get_article_by_id( $title);

		}else if( preg_match('/^[a-zA-Z0-9\-]+$/', $title))
		{
			$article = $this->article_model->get_article_by_title( $title);
		}

		if( $article)
		{
			$this->article_model->add_click_by_id( $article['id']);
		}

		if( $article['post_status'] != 1)
			$article['post_title'] = '文章未找到';

		$meta = json_decode( $article['post_meta'] , true);

		$this->template->set_layout('context')
					   ->title( strip_tags( $article['post_title'] ) )
					   ->set(  'keywords' , $meta['keywords'])
					   ->set(  'description' ,$meta['description'])
					   ->build('pills/'.$template , array('article'=>$article));

	}

	public function anonymous($title)
	{	

		$title = trim( $title);

		if( preg_match('/^\d+$/', $title) )
		{
			$article = $this->article_model->get_article_by_id( $title);

		}else if( preg_match('/^[a-zA-Z0-9\-]+$/', $title))
		{
			$article = $this->article_model->get_article_by_title( $title);
		}

		if( $article)
		{
			$this->article_model->add_click_by_id( $article['id']);
		}

		if( $article['post_status'] != 1)
			$article['post_title'] = '文章未找到';

		$meta = json_decode( $article['post_meta'] , true);

		$this->template->set_layout('context')
					   ->title( strip_tags( $article['post_title'] ) )
					   ->set(  'keywords' , $meta['keywords'])
					   ->set(  'description' ,$meta['description'])
					   ->build('pills/anonymous' , array('article'=>$article));

	}	

	public function tag( $tag_word , $page = 1 , $offset = 20)
	{

		$tag_word = urldecode( $tag_word);

		preg_match('/[a-zA-Z0-9\_\x{4e00}-\x{9fa5}]+$/u', $tag_word , $match);

		if( isset( $match[0])){

			$tag = $this->article_model->get_tag_by_title( $match[0]);
		}
		else
		{
			redirect('pills/sorry_404');
		}

		if( $tag)
		{
			$articles = $this->article_model->get_article_by_tag( $tag['id'] , $page , $offset );

			$sum  = $this->article_model->get_sum_by_tag( $tag['id']);
		}else
		{
			$articles = array();

			$sum = 0;
		}

		$this->template->set_layout('tag')
					   ->build('pills/tag' , array('tag_word' => $tag_word , 
					   							   'articles' => $articles , 
					   							   'sum'     => $sum , 
					   							   'offset'   => $offset , 
					   							   'page'    => $page , 
		));
	}

	public function sorry_404()
	{
		echo 'sorry 404';
	}
}