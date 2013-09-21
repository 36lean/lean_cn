<?php

class Client_member extends CI_Model {


	public function get_website_members($page,$offset) {
		return $this->db->select('m.uid,m.email,m.username,m.regdate,p.position,p.telephone,p.mobile,p.company,p.qq')
		->from('ucenter_members m')
		->join('common_member_profile p' , 'p.uid = m.uid' , 'left')
		->order_by('uid','desc')
		->limit($offset , ($page-1)*$offset)
		->get()->result_array();
	}

	public function get_all_clients() {
		return $this->db->select(' c.id,c.name,c.position, c.email ,a.username , cmp.id as cid,cmp.name as cname')
				        ->from('admin_client c')
				        ->join('admin_acl a' , 'a.user_id = c.salesman_id')
				        ->join('admin_client_corporation cmp' , 'cmp.id = c.company_id')
				        ->order_by('id' , 'asc')
				        ->get()->result_array();
	}

	public function get_sum_of_members() {
		return $this->db->get('ucenter_members')->num_rows();
	}

	public function throw_profile( $id) {
		$profile = $this->db->select('*')
							->from('admin_client')
							->where( array('id' => $id))
							->get()->result_array();
		if( isset( $profile[0]['id'])) {
			$profile = $profile[0];
			unset( $profile['id']);
			if( $this->db->insert( 'admin_client_useless' , $profile)) {
				$this->db->where( array('id' => $id))
						 ->delete('admin_client' , array('id' => $id));
				return Status::FINISH;
			}
		}

		return Status::FAIL;
	}

	public function get_contact_by_id( $id)
	{

		return $this->db->select('c.* , t.tag as tag_code , t.name as tag_name , cp.name as companyname , cp.address , cp.postid , cp.weburl , a.username as salesman  , u.filename')
						->from('admin_contacts c')
						->join('admin_clienttags t' , 't.id = c.tag' , 'left')
						->join('admin_company cp' , 'cp.id = c.company_id' , 'left')
						->join('admin_acl a' , 'a.user_id = c.assign_to' , 'left')
						->join('admin_uploads u' , 'u.id = c.from_file_id' , 'left')
						->where( array('c.id'=>$id))
						->get()->row_array();
	}

	public function get_member_by_uid( $uid)
	{
		return $this->db->select('m.uid,m.email,m.username,m.regdate,p.position,p.telephone,p.mobile,p.company,p.qq')
		->from('ucenter_members m')
		->join('common_member_profile p' , 'p.uid = m.uid' , 'left')
		->where( 'm.uid = '.$uid)
		->order_by('uid','desc')
		->get()->row_array();
	}
}