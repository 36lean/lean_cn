<?php

class M_sale extends CI_Model
{
	public function get_sale_contacts( $page , $offset , $sale_id , $condition = '' , $extrawhere = '')
	{

		if( is_array( $condition))
		{
			$where = $condition;

			$order = 'contacts.id';
			
			$sort = 'asc';

		}else if( 'id' === $condition)
		{
			
			$order = 'contacts.id';
			
			$sort = 'desc';

		}else if( 'modified_date' === $condition)
		{
			$order = 'contacts.modified_date';

			$sort = 'desc';

		}else {

			$order = 'contacts.id';
			
			$sort = 'asc';	
		}

		if( !isset( $where) )

			$where = 'contacts.id > 0';

		if( trim( $extrawhere )){

			$where .= ' and ('.$extrawhere .')';

			$offset = 2000;
		}

		if( $sale_id > 1)
			$where_sale = 'contacts.assign_to = '.$sale_id;
		else
			$where_sale = 'contacts.assign_to >= 0';

		$rs = $this->db->select('contacts.id , contacts.name , contacts.company_id , contacts.email , contacts.gender , contacts.display_color , contacts.user_id , contacts.job , company.name as companyname , contacts.office_phone , contacts.mobile , clienttags.id as tag_id , clienttags.tag , clienttags.name as tagname , appointment.datereminded , appointment.event , uploads.filename , uc.username ')
						->from('admin_contacts contacts')
						->join('admin_client_appointment appointment' , 'appointment.client_id = contacts.id' , 'left')
						->join('admin_clienttags clienttags' , 'clienttags.id = contacts.tag' , 'left')
						->join('admin_company company' , 'company.id = contacts.company_id' , 'left')
						->join('admin_uploads uploads' , 'uploads.id = contacts.from_file_id' , 'left')
						->join('ucenter_members uc' , 'uc.uid = contacts.user_id' , 'left')
						->where( array( 'contacts.close' => '0'))
						->where( $where_sale)
						->where( $where)
						->group_by('contacts.id')
						->order_by( $order , $sort)
						->limit( $offset , ($page - 1) * $offset )
						->get()
						->result_array();
		return $rs;
	}

	public function get_connect_log( $client_id )
	{
		return $this->db->select('id,')->from('admin_client_connect')->where( array(
		));
	}

	public function get_contact_tags()
	{
		return $this->db->select('id,tag,name')
						->from('admin_clienttags')
						->get()->result_array();
	}

	public function get_contact_sum( $sale_id)
	{
		if( $sale_id > 1)
			$sale = 'assign_to = '.$sale_id ;
		else if( $sale_id == 1)
			$sale = 'assign_to > 0';

		return $this->db->select('id')
						->from('admin_contacts')
						->where( array( 'close' => '0' ) )
						->where( $sale)
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

	public function get_contact_details( $page , $offset , $salemanid , $last = '' , $next = '')
	{

		if( $last && $next)
		{
	
			$where = 'datereminded > '.$last .' and datereminded < '.$next;

		}else
		{
			$where = 'datereminded > 0';
		}

		return $this->db->select(' a.id as event_id , a.client_id as id , uploads.filename , c.display_color ,  c.name , c.email , c.office_phone , c.office_fax , c.mobile , c.company_id , a.event , a.datereminded , cp.name as companyname')
						->from('admin_client_appointment a')
						->join('admin_contacts c' , 'c.id = a.client_id' , 'left')
						->join('admin_company cp' , 'cp.id = c.company_id' , ' left')
						->join('admin_uploads uploads' , 'uploads.id = c.from_file_id' , 'left')
						->where( array('salesman_id'=>$salemanid))
						->where( $where)
						->order_by('a.datereminded' , 'desc')
						->limit( $offset , ($page-1)*$offset )
						->get()->result_array();		
	}
	
	public function remove_remind( $id , $uid)
	{
		$num = $this->db->where( array('id'=>$id , 'salesman_id'=>$uid))
				 		->get('admin_client_appointment')
				 		->num_rows();

		if( 1 === $num)
		{
			return $this->db->delete('admin_client_appointment' , array('id'=>$id));
		}
		else
		{
			return 0;
		}
	}

	public function get_message_sum($uid)
	{
		return $this->db->select('id')
						->from('admin_client_appointment')
						->where( array('salesman_id'=>$uid))
						->get()->num_rows();
	}

	public function get_today_remind( $sale_id)
	{
		$today = strtotime( date('Y-m-d') );

		$last = $today - 1;

		$next = $today+86399;

		return $this->db->select('id')->from('admin_client_appointment')
									  ->where( 'datereminded > '.$last)
									  ->where( 'datereminded < '.$next)
									  ->where( array('salesman_id'=>$sale_id))
									  ->get()
									  ->num_rows();
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

	public function get_profile_by_contact_id( $id)
	{
		return $this->db->select('t.* , m.username')
						->from('admin_contacts_tmp t')
						->join('ucenter_members m' , 'm.uid = t.user_id')
						->where( array('contact_id'=>$id))
						->get()
						->row_array();
	}

	public function add_connect()
	{
		$target = 
		array(
			'client_id' => intval( $this->input->post('client_id')) , 
			'response'  => $this->input->post('connect_text') , //strip_tags( $this->input->post('connect_text') , '<img>') , 
			'date'		=> time(), 
		);

		return $this->db->insert('admin_client_connect' , $target);
	}

	public function update_contact_connect()
	{

		$this->db->where(array('id'=>intval( $this->input->post('id'))))
				 ->update('admin_client_connect' , array('date'=>time() , 'response'=> $this->input->post('response') ));

		return $this->input->post('client_id');
	}

	public function remove_contact_connect()
	{

		$this->db->delete( 'admin_client_connect' , array('id'=> intval( $this->input->post('id'))));

		return $this->input->post('client_id');
	}

	public function update_contact_profile()
	{	
		$id = intval( $this->input->post('id'));
		unset( $_POST['id']);

		$filter = array();
		foreach ($_POST as $key => $value) {
			$filter[$key] = trim( $this->input->post($key));
		}

		return $this->db->where( array( 'id' => $id))
				 		->update('admin_contacts' , $filter);
	}

	public function add_clock_for_contact()
	{

		$ci = & get_instance();

		$new_one = array(
			  'client_id' 		=> $this->input->post('contact_id') , 
			  'salesman_id'		=> $ci->_G['uid'] ,
			  'datereminded' 	=> strtotime( $this->input->post('time')) , 
			  'event'			=> trim( $this->input->post('message')) ,

		);

		if( $this->db->insert('admin_client_appointment' , $new_one) )
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function add_remind( $sale_id )
	{
		$data = array( 
			'salesman_id' => $sale_id , 
			'client_id' => intval( $this->input->post('contact_id')) , 
			'datereminded' => strtotime( trim( $this->input->post('date'))) ,
			'event'	=> '回访提醒' , 
		);

		if( $this->db->where( $data)->from('admin_client_appointment')->get()->num_rows )
			return 0;

		return $this->db->insert( 'admin_client_appointment' , $data );
	}

	public function get_contacts_log( $id)
	{
		return $this->db->select('id,response,date')
						->from('admin_client_connect')
						->where( array( 'client_id' => $id ))
						->order_by('id','desc')
						->get()
						->result_array();
	}

	public function get_searches(  $page , $offset , $sale_id , $condition  )
	{
		if( $this->input->post('contact_search') )
		{	
			$str = trim( $this->input->post('key'));

			if( preg_match('/^\w\d$/', $str)) {
				
				$where = 'clienttags.tag = \''.$str.'\'';
			}
			else if( preg_match('/^\d{11}$/', $str) || preg_match('/^[0-9\-]+$/', $str))
			{
					
				$where = 'contacts.mobile = ' . $str . ' or contacts.office_phone like\''.$str.'\'';

			}else if( preg_match('/^[\x{4e00}-\x{9fa5}a-zA-Z]+$/u', $str)) {

				$where = 'contacts.name like \'%'.$str.'%\' or company.name like \'%'.$str.'%\'';

			}else if( preg_match('/^[a-zA-Z\.\-\_0-9]+\@[a-zA-Z\.\-\_0-9]+\.[a-zA-Z\.\-\_0-9]+$/', $str)) {
				
				$where = 'contacts.email = \''. $str . '\'' ;

			}else {

				$where = 'companyname =\''.$str.'\'';

			}

			return $this->get_sale_contacts(  $page , $offset , $sale_id , $condition , $where );
		}
	}

	public function get_web_members( $uid , $page , $offset)
	{
		if( $uid === 0)
			$where = array();
		else
			$where = array('t.assign_to'=>$uid);

		return $this->db->select('t.id,m.uid,m.username,m.email,m.regdate,p.mobile,p.telephone,p.company,p.position')
						->from('admin_contacts_tmp t')
						->join('ucenter_members m' , 'm.uid = t.user_id' , 'left')
						->join('common_member_profile p' , 'p.uid = t.user_id' , 'left')
						->where( $where)
						->limit( $offset , ($page-1)*$offset)
						->order_by('uid' , 'desc')
						->get()
						->result_array();
	}

	public function get_web_members_sum( $uid)
	{


		if( $uid === 0)
			$where = array();
		else
			$where = array('assign_to'=>$uid);

		return $this->db->select('id')
						->from('admin_contacts_tmp')
						->where( $where )
						->get()
						->num_rows();
	}
	
	public function check_member_vaild( $uid , $salesman)
	{
		return $this->db->select('id')
				 	 	->where( array('user_id' => $uid , 'assign_to' => $salesman) )
				 		->get('admin_contacts_tmp')
				 		->num_rows();
	}

	public function create_contact_by_webuser( $uid)
	{


		$user = $this->db->where( array('user_id'=>$uid))
				 		 ->from('admin_contacts_tmp')
				 		 ->get()
				 		 ->row_array();


		if( isset( $user['contact_id']) && $user['contact_id'] > 0 ){

			redirect( site_url('sale/contact/'.$user['contact_id']));

			exit;
		}

		$data = $this->db->from('common_member_profile p')
						 ->join('ucenter_members m' , 'm.uid = p.uid')
						 ->where( array('m.uid'=>$uid))
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

	public function remove_arraged_webmember( $id , $uid)
	{
		return $this->db->delete('admin_contacts_tmp' , array('id'=>$id , 'assign_to'=>$uid));
	}

	public function get_expense_members( $page , $offset )
	{
		return $this->db->select('m.uid,m.username,m.email,v.jointime,v.exptime')
						->from('dsu_vip v')
						->join('common_member m' , 'm.uid = v.uid')
						->order_by('uid' , 'desc')
						->get()->result_array();
	}
	
	public function get_extension_sum()
	{
		return $this->db->select('m.uid')
						->from('dsu_vip v')
						->join('common_member m' , 'm.uid = v.uid')
						->get()->num_rows();
	}

	public function get_cleaned_contacts()
	{
		return $this->db->select('*')
						->from('admin_contacts')
						->where( array('close' => 1))
						->get()->result_array();
	}

	public function is_contact_from_website( $contact_id)
	{
		return $this->db->select('id')
						->from('admin_contacts_tmp')
						->where( array('contact_id'=> $contact_id))
						->get()->num_rows();
	}

	public function get_contacts_by_contactlog( $page , $offset )
	{
		return $this->db->query('select  client_connect.response , client_connect.date , contacts.* , uploads.filename from ( select * from pre_admin_client_connect order by id desc ) as client_connect left join pre_admin_contacts contacts on client_connect.client_id = contacts.id left join pre_admin_uploads uploads on uploads.id = contacts.from_file_id group by client_id order by client_connect.id desc limit '.($page-1)*$offset.','.$offset)
						->result_array();
	}

	public function get_sum_by_contactlog() 
	{
		return $this->db->select('id')
						->from('admin_client_connect')
						->group_by('client_id')
						->get()->num_rows();
	}

}