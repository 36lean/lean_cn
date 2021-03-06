<?php

class M_marketing extends CI_Model {

	public function __construct() {
		parent::__construct();
		$ci = & get_instance();
		$ci->load->model('client/client_excel' , 'client');
	}

	public function get_clients( $page , $offset , $salesman_id , $condition) {

		if( $salesman_id === 0)
		{
			$where = 'assign_to > 0';
		}
		else
		{
			$where = array('assign_to' => $salesman_id);
		}

		$page = $page - 1;


		return $this->db->select(' u.* , c.name as company_name , t.tag , salesman.username salesman , file.filename')
						->from('admin_contacts u')
						->join('admin_company c' , 'c.id = u.company_id' , 'left')
						->join('admin_clienttags t' , 'u.tag = t.id' , 'left')
						->join('admin_users salesman' , 'salesman.uid = u.assign_to' , 'left')
						->join('admin_uploads file' , 'file.id = u.from_file_id' , 'left')
						->limit( $offset , $page * $offset)
						->where( $where)
						->get()->result_array();
	}

	public function sum_of_clients( $uid) {
		if( $uid == 0)
			$where = array();
		else
			$where = array('assign_to'=>$uid);
		return $this->db->where( $where)->get('admin_contacts')->num_rows();
	}

	public function get_client_profile( $id) {
		return $this->db->select('admin_client.* , admin_client_corporation.id company_id,admin_client_corporation.name as cname')
						->from('admin_client')
						->join('admin_client_corporation' , 'admin_client.company_id = admin_client_corporation.id' , 'left')
						->where( array('admin_client.id' => $id))
						->get()->result_array();
	}

	public function get_clients_by_row( $page , $offset) {

		return $this->db->select('id , name')
						->from('admin_client')
						->where( array('salesman_id' => 0))
						->limit( $offset , $offset*($page-1))
						->order_by('id' , 'desc')
						->get()->result_array();

	}

	public function connect() {
		$ci = & get_instance();

		$company_id = $ci->client->insert_company( array('name' => trim( $_POST['cname']) , 'description' => json_encode( array('name' => $_POST['cdescription']))));

		unset( $_POST['create_client']);unset( $_POST['cname']);unset( $_POST['caddress']);unset( $_POST['cdescription']);



		$profile = array();
		$profile['salesman_id'] = $ci->_G['uid'];

		foreach ($_POST as $key => $value) {
			$profile["$key"] = trim( $value);
		}

		$profile['created_date'] = time();
		$profile['company_id'] = $company_id;

		if( $this->db->insert('admin_client' , $profile)) {
			return Status::INSERT_SUCCESS;
		}else {
			return Status::INSERT_FAIL;
		}
	}

	public function add_response_log() {
		$this->db->insert( 'admin_client_connect',
					array('client_id' => $this->input->post('client_id') ,
						  'response' => $this->input->post('client_response'),
						  'date' => time(),
					)
		);
	}

	public function get_connect_log( $id , $number = 5) {
		return $this->db->select('id,response,date')
						->from('admin_client_connect')
						->where( array('client_id' => $id))
						->order_by('id' , 'desc')
						->limit( $number)
						->get()->result_array();
	}

	public function get_email_to_client( $client_id , $uid , $number = 20) {
		return $this->db->select('*')
						->from('admin_sendmail')
						->where( array( 'client_id' => $client_id , 'uid' => $uid))
						->order_by('id' ,'desc')
						->limit( $number)
						->get()->result_array();
	}

	public function get_email_by_salesmanid( $id , $salesman_id) {
		return $this->db->select('*')
						->from('admin_sendmail')
						->where( array('id' => $id , 'uid' => $salesman_id))
						->get()->result_array();
	}

	public function profile_del( $id) {
		if( $this->db->delete('admin_client' , array('id' => $id))) {
			return Status::DELETE_SUCCESS;
		}else {
			return Status::DELETE_FAIL;
		}
	}

	public function get_email_by_id( $id) {
		return $this->db->select('id,email,name')
						->from('admin_contacts')
						->where(array( 'id' => $id))
						->limit(1)
						->get()->row_array();
	}

	public function send_save_email() {
		$this->load->model('mailer/m_mailer' , 'mailer');
		
		$email = $this->only_save_email( 1);

		$config = $this->mailer->get_mail_config() ;

		$package = array(
			'mail_myname' => $config[0]['mail_myname'] ,
			'mail_username' => $config[0]['smtp_username'] ,
			'mail_password' => $config[0]['smtp_password'] ,
			'mail_smtp' => $config[0]['smtp'],
			'mail_port' => $config[0]['smtp_port'],
			'to_list' => array( $email['to_email'] => '尊敬的客户'),
			'title' => $email['to_email'],
			'content' => $email['content'],
		);

		$this->mailer->send_mail( $package);
	}

	public function only_save_email( $done = 0) {
		$email = array(
			'uid' 		=> $this->input->post('uid') ,
			'client_id' => $this->input->post('client_id'),
			'to_email'	=> trim( $this->input->post('to_email')),
			'title' 	=> trim( $this->input->post('email_title')),
			'content' 	=> trim( $this->input->post('email_content')),
			'date' 		=> time() ,
			'done'      => intval( $done),
		);

		$this->db->insert('admin_sendmail' , $email);

		return $email;
	}

	public function linkup_remove( $id) {
		$re = $this->db->select('client_id')->from('admin_client_connect')->where( array('id' => $id))->get()->result_array();

		if( isset( $re[0]['client_id'])) {
			$this->db->delete('admin_client_connect' , array('id' => $id));
			return $re[0]['client_id'];
		}else {
			return 0;
		}
	}

	public function add_reminder() {
		$remind = array(
			'client_id' => $this->input->post('client_id'),
			'uid' => $this->input->post('uid'),
			'reminder' => $this->input->post('reminder'),
			'date' => time(),
		);

		if( $this->db->insert('admin_reminder' , $remind))
			return Status::INSERT_SUCCESS;
		else
			return Status::INSERT_FAIL;
	}

	public function get_reminder( $client_id , $uid , $number = 10) {
		return $this->db->select('id,reminder,date')
						->from('admin_reminder')
						->where( array('client_id' => $client_id , 'uid' => $uid))
						->order_by('id' , 'desc')
						->limit($number)
						->get()->result_array();
	}

	public function update_salesmanid() {
		$salesman_id = intval( $_POST['salesman']);
		unset( $_POST['salesman']);
		unset( $_POST['dispatch']);
		
		$ids =  array_keys( $_POST);

		$ids = '('.implode(',', $ids).')';

		return $this->db->where( 'id in '.$ids)
				 	  	->update('admin_client' , array('salesman_id' => $salesman_id));

	}

	public function is_client_belongto( $client_id , $salesman_id , $adminid) {

		if( $adminid == 1)
			$client = $this->db->select('*')->from('admin_client')->where( array( 'id' => $client_id ))->get();
		else 
			$client = $this->db->select('*')->from('admin_client')->where( array( 'id' => $client_id , 'salesman_id' => $salesman_id ))->get();
		if( 0 === $client->num_rows()) {
			return Status::RECORD_NOT_EXIST;
		}else {
			return $client->result_array();
		}
	}

	public function add_tags() {
		$tag = $this->db->select('id')
						->from('admin_clienttags')
						->where(array('tag' => trim( $_GET['tag'])))
						->get();

		if( 0 === $tag->num_rows()){
			$this->db->insert('admin_clienttags' , array('tag' => trim( $_GET['tag'])));
			return Status::RECORD_NOT_EXIST;
		}else {
			return Status::RECORD_EXIST;
		}
	}

	public function get_all_tags() {
		$client = $this->db->select('id,tag')
						   ->from('admin_clienttags')
						   ->limit(1000)
						   ->order_by('id','desc')
						   ->get()->result_array();
		$result = array();
		foreach ($client as $c) {
			$result[$c['id']] = $c['tag'];
		}
		return $result;
	}

	public function set_tag( $client_id , $tagid , $salesman_id) {
	 	$this->db->where( array( 'id' => $client_id , 'salesman_id' => $salesman_id))
				 		->update('admin_client' , array('tags' => $tagid));
	}

	public function edit_client() {
		unset( $_POST['save']);
		return $this->db->where( array('id' => intval( $_POST['id'])))
				 		->update('admin_client' , $_POST);
	}

	public function pin_date( $data) {
		$this->db->insert('admin_client_appointment' , $data);
	}

	public function get_appointment( $user_id , $salesman_id) {
		return $this->db->select('datereminded,event')
						->from('admin_client_appointment')
						->where( array('client_id' => $user_id , 'salesman_id' => $salesman_id))
						->order_by('datereminded', 'desc')
						->get()->result_array();
	}

	public function get_appointments( $salesman_id) {
		return $this->db->select(' a.client_id , a.event  , a.datereminded , c.name')
						->from('admin_client_appointment a')
						->join('admin_client c' , 'c.id = a.client_id' , 'right')
						->where( array( 'a.salesman_id' => $salesman_id))
						->get()->result_array();
	}

	public function get_search() {

		$key = trim( $this->input->post('key'));

		$field = trim( $this->input->post('field'));

		if( preg_match( '/^(c_)/', $field))
		{
			$field = preg_replace('/^(c_)/', '', $field);
			return $this->db->select(' u.* , c.name as company_name , t.tag , admin.username as salesman , up.filename')
					 		->from('admin_company c')
					 		->join('admin_contacts u' , 'c.id = u.company_id' , 'left')
							->join('admin_clienttags t' , 'u.tag = t.id' , 'left')
							->join('admin_users admin' , 'admin.id = u.assign_to ' , 'left')
							->join('admin_uploads up' , 'up.id = u.from_file_id' , 'left')
					 		->like( 'c.'.$field , $key , 'both')
					 		->get()->result_array();
		}else if( $field === 'tag')
		{
			return $this->db->select( ' u.* , c.name as company_name , t.tag , admin.username as salesman , uploads.filename ')
							->from('admin_contacts u')
							->join('admin_clienttags t' , 't.id = u.tag ' , 'right')
							->join('admin_company c' , 'c.id = u.company_id' , 'left')
							->join('admin_uploads uploads' , 'uploads.id = u.from_file_id' , 'left')
							->join('admin_users admin' , 'admin.id = u.assign_to ' , 'left')
							->join('admin_uploads up' , 'up.id = u.from_file_id' , 'left')
							->where( array('t.tag' => $key))
							->get()
							->result_array();

		}
		else{
			return $this->db->select(' u.* , c.name as company_name , t.tag , admin.username as salesman , up.filename')
							->from('admin_contacts u')
					 		->join('admin_company c' , 'c.id = u.company_id' , 'left')
							->join('admin_clienttags t' , 'u.tag = t.id' , 'left')
							->join('admin_users admin' , 'admin.id = u.assign_to ' , 'left')
							->join('admin_uploads up' , 'up.id = u.from_file_id' , 'left')
					 		->like( 'u.'.$field , $key , 'both')
					 		->get()->result_array();
		}

	}

	public function get_corporations( $page =  1 , $offset = 30)
	{
		return $this->db->select('c.* , count( t.id) as workers')
						->from('admin_company c')
						->join('admin_contacts t' , 't.company_id = c.id' , 'left' )
						->limit( $offset , ($page-1)*$offset)
						->group_by('c.id')
						->order_by('id','desc')
						->get()->result_array();
	}

	public function sum_of_company()
	{
		return $this->db->select('id')
						->from('admin_company')
						->get()
						->num_rows();
	}

	public function get_contacts_by_companyid( $id)
	{
		return $this->db->select('*')
						->from('admin_contacts')
						->where( array('company_id'=>$id))
						->get()
						->result_array();
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

	public function get_contact_remind( $salemanid)
	{
		return $this->db->select('c.name')
						->from('admin_client_appointment a')
						->join('admin_contacts c' , 'c.id = a.client_id')
						->where( array('salesman_id'=>$salemanid))
						->order_by('a.id' , 'desc')
						->get()->result_array();		
	}

	public function get_contact_details( $page , $offset , $salemanid)
	{
		return $this->db->select(' a.id , a.client_id , c.name , c.email , c.office_phone , c.office_fax , c.mobile , c.company_id , a.event , a.datereminded , cp.name as companyname')
						->from('admin_client_appointment a')
						->join('admin_contacts c' , 'c.id = a.client_id' , 'left')
						->join('admin_company cp' , 'cp.id = c.company_id' , ' left')
						->where( array('salesman_id'=>$salemanid))
						->order_by('a.id' , 'desc')
						->limit( $offset , ($page-1)*$offset )
						->get()->result_array();		
	}

	public function get_message_sum($uid)
	{
		return $this->db->select('id')
						->from('admin_client_appointment')
						->where( array('salesman_id'=>$uid))
						->get()->num_rows();
	}

	public function remove_message( $id , $uid)
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

	public function build_profile( $user_id)
	{

		if( 'contacts' === $this->input->post('form_type'))
		{
			if( trim( $this->input->post('name')))
			{
				$newer = array();
				unset( $_POST['form_type']);
				foreach ($_POST as $key => $value) {
					$newer[$key] = trim( $value);
				}

				$newer['assign_to'] = $user_id;
				$newer['modified_date'] = time();
				$newer['from_file_id'] = 0;


				return $this->db->insert( 'admin_contacts' , $newer);

			}
		}
		else if( 'company' == $this->input->post('form_type'))
		{

			unset( $_POST['form_type']);

			$newer = array();
			foreach ($_POST as $key => $value) {
				$newer[ preg_replace('/^(c_)/', '' , $key)] = trim( $value);
			}

			if( trim( $newer['name']))
			{

				$newer['timecreated'] = time();
				$newer['created_userid '] = $user_id;

				return $this->db->insert( 'admin_company' , $newer);
			}
		}

		return 0;
	}

	public function get_corporation_by_id( $id)
	{
		return $this->db->select('*')
						->from('admin_company')
						->where( array('id'=>$id))
						->get()
						->row_array();
	}

	public function save_company()
	{
		$id = intval( $this->input->post('id'));
		unset( $_POST['id']);

		$data = array();

		foreach ($_POST as $key => $value) {
			$data [$key] = trim( $this->input->post($key));
		}

		$data['timeupdated'] = time();

		$this->db->where( array('id'=>$id))
				 ->update( 'admin_company' , $data );
		return $id;
	}

	public function get_company_name_by_id( $id)
	{
		return $this->db->select('id,name')
						->from('admin_company')
						->where( array('id'=>$id))
						->get()->row_array();
	}

	public function get_opportunities_by_companyid( $id)
	{
		return $this->db->select('*')
						->from('admin_opportunity')
						->where( array('company_id'=>$id))
						->order_by('id' , 'desc')
						->get()->result_array();
	}

	public function insert_opportunity()
	{

		$data = array();

		foreach ($_POST as $key => $value) {
			$data[$key] = trim( $this->input->post($key));
		}

		$data['timecreated'] = time();

		$this->db->insert('admin_opportunity' , $data);

		return $data['company_id'];

	}

	public function get_opportunity_by_id( $id)
	{
		return $this->db->select('o.* , c.name as company')
						->from('admin_opportunity o')
						->join('admin_company c' , 'c.id = o.company_id' , 'left')
						->where( array('o.id'=>$id))
						->get()->row_array();
	}

	public function update_opportunity()
	{
		$id = intval( $this->input->post('id'));
		unset( $_POST['id']);

		$update = array();

		foreach ($_POST as $key => $value) {
			$update[$key] = trim( $this->input->post($key));
		}

		$this->db->where( array('id'=>$id))->update('admin_opportunity' , $update);

	}

	public function create_contact_by_company()
	{

		$save = array();

		foreach ($_POST as $key => $value) {
			$save[$key] = trim( $this->input->post($key));
		}

		$this->db->insert('admin_contacts' , $_POST);
	}

	public function change_contacts_company()
	{	
		$keywords = trim( $this->input->post('keyword'));
		if( isset( $keywords))
		{
			if( preg_match( '/^\d+$/', $keywords))
			{
				$condition = array('id'=>$id);
			}else if( preg_match('/^[A-Za-z0-9_\-]+[@][A-Za-z0-9_\-]+\.[A-Za-z0-9_\-]+$/', $keywords))
			{
				$condition = array('email'=>$keywords);
			}else
			{
				$condition = array('name'=>$keywords);
			}
		}else
		{
			$condition = array( 'company_id' => $this->input->post('contact_id'));
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
						->order_by('id' , 'desc')
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
}