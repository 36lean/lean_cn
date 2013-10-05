<?php

class Client_member extends CI_Model {


	public function get_website_members($page,$offset) {
		return $this->db->select('m.uid,m.email,m.username,m.regdate,p.position,p.telephone,p.mobile,p.company,p.qq , u.username as salesman')
		->from('ucenter_members m')
		->join('common_member_profile p' , 'p.uid = m.uid' , 'left')
		->join('admin_contacts_tmp tmp' , 'tmp.user_id = m.uid' , 'left')
		->join('admin_users u','u.uid = tmp.assign_to' , 'left')
		->not_like('m.regip ','412')
		->order_by('uid','desc')
		->limit($offset , ($page-1)*$offset)
		->get()->result_array();
	}

	public function get_all_clients() {
		return $this->db->select(' c.id,c.name,c.position, c.email ,a.username , cmp.id as cid,cmp.name as cname')
				        ->from('admin_client c')
				        ->join('admin_acl a' , 'a.user_id = c.salesman_id' , 'left')
				        ->join('admin_client_corporation cmp' , 'cmp.id = c.company_id' , 'left')
				        ->order_by('id' , 'asc')
				        ->get()->result_array();
	}

	public function get_sum_of_members() {
		return $this->db->get('ucenter_members')->num_rows();
	}

	public function throw_profile( $id , $uid ) {
		$exist 	= $this->db->select('id')
						   ->from('admin_contacts')
						   ->where( array('id' => $id , 'assign_to' => $uid ))
						   ->get()->num_rows();
		if( 1 === $exist)
		{
			$this->db->where( array('id'=>$id))->update('admin_contacts' , array('close'=>1));

			return Status::FINISH;

		}

		return Status::FAIL;
	}

	public function get_contact_by_id( $id)
	{

		return $this->db->select('c.* , t.tag as tag_code , t.name as tag_name , cp.name as companyname , cp.address , cp.postid , cp.weburl , a.username as salesman  , u.filename')
						->from('admin_contacts c')
						->join('admin_clienttags t' , 't.id = c.tag' , 'left')
						->join('admin_company cp' , 'cp.id = c.company_id' , 'left')
						->join('admin_users a' , 'a.uid = c.assign_to' , 'left')
						->join('admin_uploads u' , 'u.id = c.from_file_id' , 'left')
						->where( array('c.id'=>$id))
						->get()->row_array();
	}

	public function get_member_by_uid( $uid)
	{
		return $this->db->select('v.*,m.uid,m.email,m.username,m.regdate,p.*')
		->from('ucenter_members m')
		->join('common_member_profile p' , 'p.uid = m.uid' , 'left')
		->join('dsu_vip v' , 'v.uid = m.uid' , 'left')
		->where( 'm.uid = '.$uid)
		->get()->row_array();
	}

	public function get_uncategory_contacts()
	{
		return $this->db->select('id,name,job')
						->where( array('company_id' => 0))
						->from('admin_contacts')
						->get()
						->result_array();
	}

	public function filter()
	{
		if( $this->input->post('filter'))
		{
			$preg_str = $this->input->post('preg_str');

			$column = trim( $this->input->post('column'));

			return $this->db->query('select m.uid,m.email,m.username,m.regdate,p.position,p.telephone,p.mobile,p.company,p.qq,m.username as salesman from pre_ucenter_members m left join pre_common_member_profile p on p.uid = m.uid where m.regip not like \'412\' and m.'.$column.' REGEXP \''.$preg_str.'\'')	
					 	  ->result_array();
		}
	}

	public function arrange()
	{
		if( $this->input->post('arrange'))
		{
			unset( $_POST['arrange']);
			$assign_to = $this->input->post('assign_to');
			unset( $_POST['assign_to']);
			foreach ($_POST as $key => $value) {
				$data = array( 'user_id' 		=> $key , 
							   'assign_to'		=> $assign_to , 
				);

				if( $this->db->where( array( 'user_id' => $key , 'assign_to' => $assign_to ))->from( 'admin_contacts_tmp')->get()->num_rows() )
					continue;
				$this->db->insert( 'admin_contacts_tmp' , $data);
			}
		}
	}

	public function black_name_list()
	{
		if( $this->input->post('clear'))
		{
			unset( $_POST['clear']);
			unset( $_POST['assign_to']);
			foreach ($_POST as $key => $value) {
				$this->db->where( array( 'uid' => $key))->update('ucenter_members' , array( 'regip' => '412'));
			}

			form_post_refresh();
		}
	}

	public function create_contact_by_webuser( $uid)
	{
		echo '<pre>';

		$user = $this->db->where( array('user_id'=>$uid))
				 		 ->from('admin_contacts_tmp')
				 		 ->get()
				 		->row_array();

		var_dump( $user);

		if( $user['contact_id'] !== '0'){

			redirect( site_url('marketing/connect/'.$user['contact_id']));

			exit;
		}

		$data = $this->db->from('common_member_profile p')
						 ->join('ucenter_members m' , 'm.uid = p.uid')
						 ->where( array('m.uid'=>$user['user_id']))
						 ->get()
						 ->row_array();
		
		if( !$data)
			return ;
		
		//var_dump( $data);

		$contact = array(
			'assign_to'		=>	$user['assign_to']	,
			'user_id'		=> 	$user['user_id']	,
			'username'		=> 	$data['username'] 	,
			'name'			=> 	$data['realname']	,
			'email'			=> 	$data['email']		,
			'job'			=>  $data['position']	,
			'qq'			=> 	$data['qq']			,
			'gender'		=> 	$data['gender']		,
			'office_phone'	=>$data['telephone']	,
			'mobile'		=> 	$data['mobile']		,
			'description'	=> 	$data['company']	,
			'modified_date'	=>	time() 				,	
		);

		$this->db->insert( 'admin_contacts'	, $contact);

		$this->db->where( array('user_id'=>$uid))->update( 'admin_contacts_tmp' , array('contact_id'=>$this->db->insert_id()));

		redirect( current_url());
	} 

	public function get_profile_by_contact_id( $id)
	{
		return $this->db->select('t.* , m.username')
						->from('admin_contacts_tmp t')
						->join('ucenter_members m' , 'm.uid = t.user_id')
						->where( array('contact_id'=>$id))
						->get()
						->row_array();
	}
}