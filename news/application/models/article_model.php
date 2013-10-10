<?php

class Article_model extends CI_Model
{
	public function get_article_by_id( $id)
	{
		return $this->db->select('p.* , c.category_title')
						->from( 'attach_posts p')
						->where( array('p.id'=>$id))
						->join( 'attach_category c' , 'c.id = p.category' , 'left')
						->get()->row_array();
	}

	public function get_article_by_title( $title)
	{
		return $this->db->select('p.* , c.category_title')
						->from( 'attach_posts p')
						->like( array('post_titlelink' => $title))
						->join( 'attach_category c' , 'c.id = p.category' , 'left')
						->order_by('click' , 'desc')
						->get()->row_array();
	}

	public function get_by_category( $id , $page , $offset )
	{
		return $this->db->select(' id , post_title , post_banner , post_author , post_modified , post_content')
						->from( 'attach_posts')
						->where( array('category'=>$id , 'post_status' => 1))
						->limit( $offset , ( $page - 1) * $offset )
						->order_by('id' , 'desc')
						->get()
						->result_array();
	}

	public function get_category_by_id( $id)
	{
		return $this->db->where( array('id'=>$id))
						->from('attach_category')
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
}