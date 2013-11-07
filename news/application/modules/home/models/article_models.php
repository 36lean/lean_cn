<?php

class Home_article_models extends CI_Model
{
	public function get_today_list( $number = 20)
	{
		return $this->db->select('id , post_title , post_modified , post_content , post_banner')
						->from('attach_posts')
						->where( array('remove' => 0 , 'post_status' => 1))
						->order_by('id'  ,  'desc')
						->limit($number)
						->get()->result_array();
	}

	public function get_center_focus()
	{
		return $this->db->select('p.* , s.banner , s.seo_text')
						->from('attach_seo s')
						->join('attach_posts p' , 'p.id = s.article_id ')
						->where( array('position' => 'home_center'))
						->where( array('remove' => 0 , 'post_status' => 1))
						->get()->row_array();
	}

	public function get_left_focus()
	{
		return $this->db->select(' p.id , p.post_title , p.post_content , p.category , s.banner , s.seo_text')
						->from('attach_seo s')
						->join('attach_posts p' , 'p.id = s.article_id ')
						->where( array('position' => 'home_left'))
						->where( array('p.remove' => 0 , 'p.post_status' => 1))
						->get()->result_array();		
	}

	public function get_relation_article( $category , $sum)
	{
		return $this->db->select('id , post_title , post_modified , post_titlelink')
						->from( 'attach_posts')
						->where( array('category'=>$category))
						->where( array('remove' => 0 , 'post_status' => 1))
						->order_by('id' , 'desc')
						->limit( $sum)
						->get()->result_array();
	}

	public function get_all_categories()
	{
		return $this->db->select(' id , category_title , category_link ')
						->from('attach_category')
						->get()->result_array();
	}

	public function get_timeline_articles( $timeline , $sum)
	{
		$last = 0;
		foreach ($timeline as $key => $value) {
			
			if( $last === 0)
			{
				$last = $key;
				continue;
			}

			$timeline[$last] = $this->get_article_between_time(  $key , $last , $sum);

			if( !$timeline[$last])
				unset( $timeline[$last]);
			
			$last = $key;
		}

		array_pop( $timeline);

		return $timeline;
	}

	public function get_article_between_time( $start_time , $end_time , $sum)
	{	

		return $this->db->select(' p.id , p.post_title , p.post_modified , p.category , c.category_title')
						->from( 'attach_posts p')
						->where('post_modified > '.$start_time)
						->where('post_modified < '.$end_time)
						->where( array('p.remove' => 0 , 'p.post_status' => 1))
						->join('attach_category c' , 'p.category = c.id' , 'left')
						->limit( $sum)
						->get()
						->result_array();
	}

	public function get_tags( $num)
	{
		return $this->db->limit( $num)->get('attach_tags')->result_array();
	}

	public function get_high_click( $top_number = 40)
	{
		return $this->db->select('id,post_title,click')
						->from('attach_posts')
						->where( array('remove' => 0 , 'post_status' => 1))
						->limit( $top_number)
						->order_by('click' , 'desc')
						->get()
						->result_array();
	}
}