<?php
require_once FCPATH.'vendor/Snoopy/Snoopy.class.php';

class M_review extends CI_Model {

	private $snoopy;

	public function __construct() {
		$this->snoopy = new Snoopy;
		parent::__construct();
	}

	public function fetch( $url) {
		$fetch = array();

		$this->snoopy->fetchtext( $url);
		$fetch['contenttext'] = $this->snoopy->results;

		$this->snoopy->fetchlinks( $url);

		$fetch['link'] = $this->snoopy->results;

		return $fetch;
	}

	public function get_news_categories() {
		return $this->db->select('id,title')
						->from('amazing_topic')
						->get()->result_array();
	}

	public function add_news() {

		$form = intval( $_POST['form']);

		$content = strip_tags( $this->input->post('contentbody'));
		$content = str_replace('&nbsp;', '', $content);

		$content = array(
			'contenttitle' => trim( $this->input->post('contenttitle')) ,
			'keyword'      => trim( $this->input->post('keyword')),
			'author'	   => trim( $this->input->post('author')),
			'level'		   => intval( $this->input->post('level')),
			'banner'       => trim( $this->input->post('banner')),
			'contentinfo'  => cutstr( $content , 360),
			'contentbody'  => trim( $this->input->post('contentbody')),
			'category'     => intval( $this->input->post('category')),
			'form'         => $form,
			'timecreated'  => time(),
		);
		return $this->db->insert('amazing_news' , $content);
	}

	public function add_item() {

		$item = array(
			'sortid' => intval( $this->input->post('sortid')) ,
			'title'  => trim( $this->input->post('title')),
			'information' => trim( $this->input->post('information')),
		);

		if( $this->db->select('id')->from('amazing_topic')->where( array( 'title' => $item['title']))->get()->num_rows() === 0)
			return $this->db->insert('amazing_topic' , $item);
		else 
			return ;
	}

	public function get_total_of_news()
	{
		return $this->db->select('id')->from('amazing_news')->get()->num_rows();
	}

	public function get_news_list( $page , $offset )
	{
		return $this->db->select('amazing_news.id,amazing_news.contenttitle,amazing_news.view,amazing_news.comment,amazing_news.timecreated,amazing_topic.title category')
						->join('amazing_topic' , 'amazing_news.category = amazing_topic.id' , 'left')
						->from('amazing_news')
						->limit( $offset , ($page-1)*$offset)
						->order_by( 'id' , 'desc')
						->get()
						->result_array();

	}
}