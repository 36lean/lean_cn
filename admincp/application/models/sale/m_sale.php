<?php

class M_sale extends CI_Model
{
	public function get_sale_contacts( $page , $offset , $sale_id )
	{
		return $this->db->select('contacts.id , contacts.name , contacts.company_id , contacts.email , contacts.display_color , contacts.user_id , contacts.job , company.name as companyname , contacts.office_phone , contacts.mobile , clienttags.tag , clienttags.name as tagname , appointment.datereminded , appointment.event , uploads.filename , client_connect.response ')
						->from('admin_contacts contacts')
						->join('admin_client_appointment appointment' , 'appointment.client_id = contacts.id' , 'left')
						->join('admin_clienttags clienttags' , 'clienttags.id = contacts.tag' , 'left')
						->join('admin_company company' , 'company.id = contacts.company_id')
						->join('admin_uploads uploads' , 'uploads.id = contacts.from_file_id' , 'left')
						->join('admin_client_connect client_connect' , 'client_connect.client_id = contacts.id' , 'left')
						->where( array('contacts.assign_to' => $sale_id))
						->group_by('contacts.id')
						->limit( $offset , ($page - 1) * $offset )
						->get()
						->result_array();
	}

	public function get_contact_tags()
	{
		return $this->db->select('id,tag,name')
						->from('admin_clienttags')
						->get()->result_array();
	}

	public function get_contact_sum( $sale_id)
	{
		return $this->db->select('id')
						->from('admin_contacts')
						->where( array( 'assign_to' => $sale_id ) )
						->get()
						->num_rows();
	}

	/**
	*
	* 修改客户标签状态 C1 C2 C3 A F
	* @access public
	* @return string | string-json
	*
	**/

	public function update_tag(  $id , $tag_id , $sale_id )
	{

		$contact = $this->db->select('id,name')->from('admin_contacts')->where( array('id' => $id , 'assign_to' => $sale_id))->get();

		if( $contact->num_rows() )
		{
			$this->db->where( array( 'id' => $id , 'assign_to' => $sale_id ))->update( 'admin_contacts' , array('tag' => $tag_id));

			echo json_encode( $contact->row_array());
		
		}
		else
		{
			echo 911;
		}
	}

	/**
	*
	* 添加沟通记录
	* @access public
	* @return string | string-json
	*
	**/
	public function add_contact( $contact_id , $text , $sale_id)
	{
		$contact = $this->db->select('id,name')->from('admin_contacts')->where( array('id'=>$contact_id , 'assign_to' => $sale_id))->get();
		if(  $contact->num_rows())
		{
			$this->db->insert('admin_client_connect' , array('client_id'=>$contact_id , 'response' => $text , 'date' => time() ));
			echo json_encode( $contact->row_array() );
		}else
		{
			echo 911;
		}
	}
}