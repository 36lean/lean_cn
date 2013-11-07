<?php

class M_checkout extends CI_Model
{
	public function add_checkout()
	{
		if( $this->input->post('add') )
		{
			$checkout = array();
			$checkout['title'] = trim( $this->input->post('title'));
			$checkout['question'] = trim( strip_tags( $this->input->post('question')));

			$checkout['item_1'] = trim( $this->input->post('item_1'));
			$checkout['item_2'] = trim( $this->input->post('item_2'));
			$checkout['item_3'] = trim( $this->input->post('item_3'));
			$checkout['item_4'] = trim( $this->input->post('item_4'));

			preg_match('/(\d)/', $this->input->post('answer') , $a);

			$checkout['answer'] = isset( $a[0])? $a[0] : 0;

			$exist = $this->db->select('id')->from('addon_checkout')->where( array( 'title'=> $checkout['title']) )->get();

			if( $exist->num_rows() )
			{	
				$exist = $exist->row_array();

				$id = $exist['id'];

				$this->db->where( array('id'=>$id) )->update('addon_checkout' , $checkout);

			}else if( $this->input->post('id'))
			{
				$this->db->where( array('id'=> $this->input->post('id') ) )->update('addon_checkout' , $checkout);
			}
			else
			{
				$this->db->insert( 'addon_checkout' , $checkout );
			}

			form_post_refresh();

		}
	}

	public function add_bucket()
	{
		if( $this->input->get_post('title'))
		{
			$bucket = array(
				'title' => trim( $this->input->post('title')) , 
				'limittime' => intval( $this->input->post('limittime')) , 
				'description' => trim( $this->input->post('description')) , 
				'createdtime' => time() , 
			);

			unset( $_POST['title']);unset( $_POST['limittime']);unset( $_POST['description']);
			if( $this->input->post('id'))
			{
				$id =  $this->input->post('id');
				unset( $_POST['id']);
			}

			$ids = array_keys( $_POST);

			$bucket ['checkout_list'] = json_encode( $ids);

			if( isset( $id) )
			{
				$this->db->where( array('id'=>$id))->update('addon_bucket' , $bucket);
			}else
			{
				$this->db->insert('addon_bucket' , $bucket);
			}

			form_post_refresh();
		}
	}

	public function list_test( $page , $offset )
	{
		return $this->db->select('*')
						->from('addon_checkout')
						->limit( $offset , ($page - 1) * $offset )
						->order_by('id','desc')
						->get()->result_array();
	}

	public function list_bucket()
	{
		return $this->db->select('*')
						->from('addon_bucket')
						->order_by( 'id' , 'desc')
						->get()->result_array();
	}

	public function get_question_by_id( $id)
	{
		return $this->db->select('*')
						->from('addon_checkout')
						->where( array('id'=>$id))
						->get()->row_array();
	}

	public function get_bucket_by_id( $id)
	{
		return $this->db->select('*')
						->from('addon_bucket')
						->where( array('id'=>$id))
						->get()->row_array();		
	}

	public function get_checklist_by_array( $array)
	{

		if( !$array)
			return array();

		$retun = array();

		foreach ($array as $item_id) {
			$return[$item_id] = $this->db->select('id,title')->where( array('id'=>$item_id))->from( 'addon_checkout')->get()->row_array();
		}
		return $return;
	}
}