<?php

class Pills extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('article_model');

		$this->load->library('session');

	}

	public function index()
	{
		$this->template->build('pills/index');
	}

	public function article_list( $category = 1 , $page = 1 , $offset = 20 )
	{


		$list = $this->article_model->get_by_category( $category , $page , $offset );

		$sum = $this->article_model->get_sum_by_category( $category);

		$category = $this->article_model->get_category_by_id( $category);

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

	public function n($title)
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

		$meta = json_decode( $article['post_meta'] , true);

		$this->template->set_layout('context')
					   ->title($article['post_title'])
					   ->set(  'keywords' , $meta['keywords'])
					   ->set(  'description' ,$meta['description'])
					   ->build('pills/n' , array('article'=>$article));

	}
}