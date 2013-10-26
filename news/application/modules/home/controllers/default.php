<?php

class Home_Default_module extends CI_Module{

	public function __construct()
	{
		parent::__construct();

		$this->load->model( 'article_models');
	}

	public function today_news()
	{
		$article_list = $this->article_models->get_today_list();

		$this->load->view('home/today_news' , array('article_list'=>$article_list));
	}

	public function center_focus()
	{
		$article = $this->article_models->get_center_focus();

		$article_list = $this->article_models->get_today_list(10);

		$relations = $this->article_models->get_relation_article( $article['category'] , 16);

		$this->load->view('home/center_focus' , array('article'=>$article , 'relations'=>$relations , 'article_list' => $article_list));
	}

	public function left_focus()
	{
		$articles = $this->article_models->get_left_focus();

		foreach ($articles as $key => $value) {
			$articles[$key]['relations'] =  $this->article_models->get_relation_article( $value['category'] , 4);
		}

		$this->load->view('home/left_focus' , array('articles'=>$articles ));
	}

	public function all_category()
	{
		$category = $this->article_models->get_all_categories();

		foreach ($category as $key => $value) {
			$category[$key]['articles'] = $this->article_models->get_relation_article( $value['id'] , 6);
		}

		$this->load->view('home/allstars' , array('category'=>$category));
	}

	public function categories()
	{
		$categories = $this->article_models->get_all_categories();

		$this->load->view('home/categories' , array('categories' => $categories));
	}

	public function get_relation_article( $category)
	{

		$list = $this->article_models->get_relation_article( $category , 18);

		$this->load->view('home/get_relation_article' , array('list' => $list));
	}

	public function timeline()
	{

		$timeline = array();

		$time = strtotime( date('Y-m-d')) - 1;

		$timeline[$time] = 1;



		for ($days = 1 ; $days < 5 ; $days ++) {
			
			$time = strtotime('-'.$days.' day');

			$time = strtotime( date('Y-m-d' , $time)) - 1;

			$timeline[$time] = 1;			
		}
		
		$list = $this->article_models->get_timeline_articles( $timeline , 8);


		$this->load->view('home/timeline' ,  array( 'list' => $list) );

	}

	public function get_tags()
	{	

		$tags = $this->article_models->get_tags( 30);

		$this->load->view('home/get_tags' , array( 'tags' => $tags));
	}

	public function high_click()
	{
		$articles = $this->article_models->get_high_click();

		$this->load->view('home/high_click' , array('articles' => $articles));
	}
}