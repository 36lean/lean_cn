<?php

class Ooxx extends CI_Controller
{
	public function index()
	{
		$content = $this->db->select(' a.title as post_title , a.username as post_author , a.summary post_summary , a.dateline post_modified , c.content as post_content')
				 			->from('portal_article_title a')
				 			->join('portal_article_content c' , 'c.aid = a.aid')
				 			->get()
				 			->result_array();


		foreach ($content as $a) {
			$this->db->insert('attach_posts' , $a);
		}
	}
}