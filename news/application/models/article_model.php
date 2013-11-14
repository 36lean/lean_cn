<?php

class Article_model extends CI_Model
{
	public function get_article_by_id( $id)
	{
		return $this->db->select('p.* , c.category_title')
						->from( 'attach_posts p')
						->where( array('p.id'=>$id))
						->where( array('p.remove' => 0 , 'p.post_status' => 1))
						->join( 'attach_category c' , 'c.id = p.category' , 'left')
						->get()->row_array();
	}

	public function get_article_by_title( $title)
	{
		return $this->db->select('p.* , c.category_title')
						->from( 'attach_posts p')
						->like( array('post_titlelink' => $title))
						->join( 'attach_category c' , 'c.id = p.category' , 'left')
						->where( array('p.remove' => 0 , 'p.post_status' => 1))
						->order_by('click' , 'desc')
						->get()->row_array();
	}

	public function get_by_category( $id , $page , $offset )
	{
		$articles = $this->db->select(' id , post_title , post_banner , post_author , post_modified , post_content')
							 ->from( 'attach_posts')
							 ->where( array('category'=>$id , 'post_status' => 1))
							 ->limit( $offset , ( $page - 1) * $offset )
							 ->order_by('id' , 'desc')
							 ->where( array('remove'=>0 , 'post_status'=>1))
							 ->get()
							 ->result_array();

		foreach ($articles as $key=>$article) {
			$tags = $this->db->select('t.id , t.tagname')
							 ->from('attach_property p')
							 ->join('attach_tags t' , 't.id = p.tag_id')
							 ->where( array('post_id' => $article['id']))
							 ->get()->result_array();
			$articles[$key]['tags'] = $tags;

		}

		return $articles;
	}

	public function get_category_by_id( $id)
	{
		return $this->db->where( array('id'=>$id))
						->from('attach_category')
						->where( array('visible' => 1))
						->get()
						->row_array();
	}

	public function get_category_by_title( $title)
	{
		$title = trim( $title );

		return $this->db->like( array('category_link' => $title))
				 		->from('attach_category')
				 		->where( array('visible' => 1))
				 		->get()
				 		->row_array();
	}	

	public function add_click_by_id( $id)
	{
		$data = $this->session->userdata('click');
		if( isset( $data))
		{
			if( !isset( $data[$id]) )
			{
				$data[$id] = 1;
				$this->session->set_userdata('click' , $data);

				$table = $this->db->protect_identifiers( 'attach_posts', TRUE);

				$this->db->query( 'update ' .$table. ' set  click = click + 1 where id = '.$id);

			}
		}else
		{
			$data[$id] = 1;
			$this->session->set_userdata('click' , $data);
		}
	}

	public function get_sum_by_category( $category)
	{
		return $this->db->select('id')
						->from('attach_posts')
						->where( array('category' => $category , 'post_status' => 1))
						->get()
						->num_rows();
	}

	public function get_tag_by_title($tagname)
	{
		return $this->db->select('id')
						->from('attach_tags')
						->where( array( 'tagname' => $tagname))
						->get()->row_array();
	}

	public function get_sum_by_tag( $tag_id)
	{
		return $this->db->select('po.id')
						->from('attach_property p')
						->join('attach_posts po' , 'po.id = p.post_id' , 'right')
						->where( array('p.tag_id' => $tag_id))
						->get()->num_rows();		
	}

	public function get_article_by_tag( $tag_id , $page , $offset )
	{
		$articles = $this->db->select('po.id , po.post_title , po.post_summary , po.post_banner , po.post_author , po.post_content , post_modified')
						->from('attach_property p')
						->join('attach_posts po' , 'po.id = p.post_id' , 'right')
						->where( array('p.tag_id' => $tag_id))
						->get()->result_array();

		foreach ($articles as $key=>$article) {
			$tags = $this->db->select('t.id , t.tagname')
							 ->from('attach_property p')
							 ->join('attach_tags t' , 't.id = p.tag_id')
							 ->where( array('post_id' => $article['id']))
							 ->get()->result_array();
			$articles[$key]['tags'] = $tags;

		}

		return $articles;
	}
}