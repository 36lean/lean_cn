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

			if( $this->input->post('id'))
			{
				$this->db->where( array('id'=>intval( $this->input->post('id'))))->update( 'attach_category' , $category);
			}
			else if( $this->db->select('id')->where( array('category_title' => $category['category_title']))->from('attach_category')->get()->num_rows())
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

			$title_link = preg_replace('/[^a-zA-Z0-9-]/', '-', $this->input->post('post_titlelink')) ;

			$article = array(
				'post_banner'		=> trim( $this->input->post('post_banner')) ,
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

				echo $id = $this->db->insert_id();

				echo $this->db->where( array('post_id'=>0))
						 ->update('attach_property' , array('post_id'=>$id));
			}


			form_post_refresh();

		}
	}

	public function get_articles( $page , $offset , $remove = 0)
	{
		return $this->db->select('p.post_title , p.post_author , p.id , p.post_modified , p.post_status , p.post_titlelink , p.post_type , c.category_title')
						->from('attach_posts p')
						->join('attach_category c' , 'c.id = p.category' , 'left')
						->order_by('id' , 'desc')
						->limit( $offset , ( $page - 1) * $offset )
						->where( array('remove' => $remove))
						->get()
						->result_array();
	}

	public function get_sum_of_articles( $remove = 0)
	{
		return $this->db->select('id')
						->from('attach_posts')
						->where( array('remove' => $remove))
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

	public function add_center_article()
	{
		if( 'home_center' === $this->input->post('position'))
		{
			$center = $this->db->select('id')
					 		   ->from('attach_seo')
					 		   ->where( array('position' => $this->input->post('position')))
					 		   ->get();
			if( $center->num_rows())
			{

				$center = $center->row_array();

				$this->db->where( array('id'=>$center['id']))->update( 'attach_seo' , array(
													   'article_id' => intval( $this->input->post('center_article_id') ), 
													   'position'   => trim( $this->input->post('position') ) , 
													   'banner'		=> trim( $this->input->post('banner') ) ,
													   'seo_text'	=> trim( $this->input->post('center_article_hidden') ) ,
													   'timeupdated'=> time() , 
				));
			}
			else
			{
				$this->db->insert('attach_seo' , array('article_id' => intval( $this->input->post('center_article_id') ), 
													   'position'   => trim( $this->input->post('position') ) , 
													   'banner'		=> trim( $this->input->post('banner') ) ,
													   'seo_text'	=> trim( $this->input->post('center_article_hidden') ) ,
													   'timeupdated'=> time() , 
				));
			}
		}
	}

	public function add_left_article()
	{
		if( 'home_left' === $this->input->post('position'))
		{
			$center = $this->db->select('id')
					 		   ->from('attach_seo')
					 		   ->where( array('position' => $this->input->post('position')))
					 		   ->get();

				$this->db->insert('attach_seo' , array('article_id' => intval( $this->input->post('center_article_id') ), 
													   'position'   => trim( $this->input->post('position') ) , 
													   'banner'		=> trim( $this->input->post('banner') ) ,
													   'seo_text'	=> trim( $this->input->post('center_article_hidden') ) ,
													   'timeupdated'=> time() ,
								));
		}
	}

	public function get_home_articles()
	{
		return $this->db->select(' p.id , p.post_title , p.category , p.post_status , p.remove , p.click , s.* , c.category_title')
						->from('attach_seo s')
						->join('attach_posts p' , 'p.id = s.article_id' , 'left')
						->join('attach_category c' , 'c.id = p.category' , 'left')
						->order_by('s.id','desc')
						->get()
						->result_array();
	}
	



	public function batch_change()
	{
		$article = array( 'category' => $this->input->post('category') , 'post_status' => $this->input->post('status'));

		unset( $_POST['category']);
		unset( $_POST['status']);

		foreach ($_POST as $key => $value) {
			
			$this->db->where( array('id'=>$key))
					 ->update( 'attach_posts' , $article);

		}

		form_post_refresh();
	}

	public function add_tag()
	{
		if( $this->input->post('add_tag'))
		{
			if( $this->db->where( array('tagname' => trim( $this->input->post('tag')) ))->from('attach_tags')->get()->num_rows() === 0 )
				$this->db->insert('attach_tags' , array( 'tagname' => trim( $this->input->post('tag')) ) );

				form_post_refresh();
		}
	}

	public function get_all_tags()
	{
		return $this->db->get('attach_tags')->result_array();
	}

	public function add_tags_use()
	{
		
	}

	public function category_remove( $id)
	{
		if( $this->db->select('id')->from('attach_category')->where( array('id'=>$id))->get()->num_rows())
		{
			$this->db->where( array('category'=>$id))->update('attach_posts' , array('category'=>0));

			$this->db->delete('attach_category' , array('id'=>$id));
		}

		form_post_refresh();
	}

	public function remove_articles()
	{
		foreach ($_POST as $key => $value) {
			$this->db->where(array('id'=>$key))->update('attach_posts' , array('remove'=>1));
		}

		form_post_refresh();
	}

	public function clean_articles()
	{
		foreach ($_POST as $key => $value) {
			$this->db->delete('attach_posts' , array('id'=>$key));
		}

		form_post_refresh();
	}

	public function reback_articles()
	{
		foreach ($_POST as $key => $value) {
			$this->db->where(array('id'=>$key))->update('attach_posts' , array('remove'=>0));
		}

		form_post_refresh();		
	}

	public function get_category_by_id( $id)
	{
		return $this->db->where( array('id'=>$id))
						->get('attach_category')
						->row_array();
	}

	public function get_seo_by_id( $id )
	{
		return $this->db->where( array('id' => $id))->get('attach_seo')->row_array();
	}

	public function remove_seo( $id )
	{
		$this->db->delete('attach_seo' , array('id'=>$id));
	}

	public function handle_tag_for_article( $tag_id , $post_id)
	{
		if( false === ($tag_id) )
			return 0;

		$property = $this->db->select('id')->from('attach_property')->where( array( 'tag_id' => $tag_id , 'post_id' => $post_id ))->get();

		if( $property->num_rows())
		{	
			$property = $property->row_array();

			$this->db->delete( 'attach_property' , array('id'=>$property['id']) );

			return 2;

		}else
		{
			return $this->db->insert('attach_property' , array('tag_id'=>$tag_id , 'post_id'=>$post_id));

			return 1;
		}

	}

	public function get_tags_by_postid( $post_id )
	{
		$list = $this->db->select('tag_id')->from('attach_property')->where( array('post_id' => $post_id) )->get()->result_array();

		$return = array();

		foreach ($list as $key => $value) {
			$return [] = $value['tag_id'];
		}	

		return $return;

	}

	public function add_new_tag( $tagname)
	{
		if( $this->db->where( array('tagname'=>$tagname))->from('attach_tags')->get()->num_rows() === 0)
			return $this->db->insert( 'attach_tags' , array('tagname'=>$tagname));
		else 
			return 2;
	}

	public function add_keywords()
	{
		if( $this->input->post('save'))
		{
			$group = explode(' ', $_POST['word_list']);

			$done = array();

			$flag = 0;

			foreach ($group as $single) {
					
				if( preg_match('/[a-zA-Z0-9\x{4e00}-\x{9fa5}]{2,}/u', $single))
					if( !in_array($single, $done)){

						if( 0 === $this->db->select('id')->from('attach_words')->where( array('value'=>$single))->get()->num_rows() )
						{
							$this->db->insert('attach_words' , array('value'=>$single));
							$flag ++ ;
						}

						$done[] = $single;
					}
			}

			return $flag;
		}

		return 0;
	}

	public function get_keywords_disabled()
	{
		return $this->db->select('id,value')
						->from('attach_words')
						->where( array('active' => 0))
						->get()->result_array();
	}

	public function get_keywords_active()
	{
		return $this->db->select('id,value')
						->from('attach_words')
						->where( array('active' => 1))
						->get()->result_array();		
	}

	public function change_keyword_status( $id , $value)
	{
		$data = $this->db->where( array('id'=>$id , 'value'=>$value))->from('attach_words')->get()->row_array();

		if( $data)
		{
			if( $data['active'] == 0)
			{
				$this->db->where( array('id'=>$id))->update('attach_words' , array('active'=>1));
				return 1;
			}else
			{
				$this->db->where( array('id'=>$id))->update('attach_words' , array('active'=>0));
				return 0;
			}
		}
	}
}