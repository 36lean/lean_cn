<?php

class M_article extends CI_Model
{

	public function add_category()
	{
		if( $this->input->post('create_category'))
		{
			$category = array(
				'category_title'	=> trim( $this->input->post('category_title') ) ,
				'summary'			=> trim( $this->input->post('summary') )	    ,
				'category_link'		=> trim( $this->input->post('category_link') )  ,
				'keywords'			=> trim( $this->input->post('keywords') )		, 
				'description'		=> trim( $this->input->post('description') )	,
			);

			if( $this->db->select('id')->where( array('category_title' => $category['category_title']))->from('attach_category')->get()->num_rows())
			{
				$this->db->where( array('category_title' => $category['category_title']))
						 ->update('attach_category' , $category);
			}else
			{
				$this->db->insert( 'attach_category' , $category);
			}

			form_post_refresh();
		}
	}

	public function get_categories()
	{
		return $this->db->select('id,category_title')
						->from( 'attach_category')
						->get()
						->result_array();
	}

	public function add_article()
	{
		if( $this->input->post('create_news') ){


			$meta = array(
				'keywords' => trim( $this->input->post('keywords')) ,
				'description' => trim( $this->input->post('description')) ,
			);

			$title_link = preg_replace('/[^a-zA-Z0-1-]/', '-', $this->input->post('post_titlelink')) ;

			$article = array(
				'post_title'		=> trim( $this->input->post('post_title')) ,
				'post_summary'		=> trim( $this->input->post('post_summary')) ,
				'post_from'			=> trim( $this->input->post('post_from')) ,
				'post_author'		=> trim( $this->input->post('post_author')) ,
				'post_content'		=> trim( $this->input->post('post_content')) ,
				'post_titlelink'	=> trim( $title_link) ,
				'category'			=> intval( $this->input->post('category')) ,
				'post_status'		=> intval( $this->input->post('post_status')) ,
				'post_meta'			=> json_encode( $meta) ,
				'post_modified'		=> time() ,
			);

			if( $this->input->post('id'))
			{
				$this->db->where( array('id'=>$this->input->post('id')))->update('attach_posts' , $article);

				form_post_refresh();

				exit;
			}

			if( $this->db->select('id')->where( array('post_title' => $article['post_title']))->from('attach_posts')->get()->num_rows())
			{
				$this->db->where( array('post_title'))->update('attach_posts' , $article);


				
			}else
			{
				$this->db->insert('attach_posts' , $article);
			}

			form_post_refresh();

		}
	}

	public function get_articles( $page , $offset )
	{
		return $this->db->select('p.post_title , p.post_author , p.id , p.post_modified , c.category_title')
						->from('attach_posts p')
						->join('attach_category c' , 'c.id = p.category' , 'left')
						->order_by('id' , 'desc')
						->limit( $offset , ( $page - 1) * $offset )
						->get()
						->result_array();
	}

	public function get_sum_of_articles()
	{
		return $this->db->select('id')
						->from('attach_posts')
						->get()
						->num_rows();
	}

	public function get_article_by_id( $id)
	{
		return $this->db->select('*')
						->from('attach_posts')
						->where( array('id'=>$id))
						->get()->row_array();
	}
}