<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Review extends Base_Controller {


	public function Review() {
		parent::__construct();
		$this->load->model('review/m_review' , 'review');
	}

	public function navigation() {
		return array(
			'index',
			'news' ,
			'weibo' , 
			'comment' , 
			'question' ,
			'repository',
			'fetch',
		);
	}

	public function index( $page = 1, $offset = 30) {

		$total = $this->review->get_total_of_news();

		$list = $this->review->get_news_list( $page , $offset);

		$this->template->build('review/index' , array( 'total' => $total , 
													'offset' => $offset , 
													'list'  => $list , 
		));
	}

	public function edit( $id = 1)
	{
		$id = intval( $id);

		echo $id;
	}
	
	public function news() {

		if( isset( $_POST['post'])) {
			$news_success = $this->review->add_news();
		}else if( isset( $_POST['create'])) {
			$item_success = $this->review->add_item();
		}

		$category = $this->review->get_news_categories();

		$this->template->build('review/news' , array('category' 		=> $category , 
												  'news_success' 	=> isset( $news_success) ? $news_success : null , 
												  'item_success'    => isset( $item_success) ? $item_success : null ,
		));
	}

	public function fetch() {

		if( isset( $_REQUEST['url_read'])) {
			$content = $this->review->fetch( trim( $_REQUEST['url']));
		}else {
			$content = '';
		}

		$this->template->build('review/fetch' , array( 'content' => $content));
	}

	public function __toString() {
		return strtolower( __CLASS__);
	}

	
}