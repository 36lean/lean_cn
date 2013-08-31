<?php

class M_marketing extends CI_Model {

	public function __construct() {
		parent::__construct();
		$ci = & get_instance();
		$ci->load->model('client/client_excel' , 'client');
	}

	public function get_clients( $page , $offset , $salesman_id , $condition) {

		if( $salesman_id === 0)
			$where = 'salesman_id >= 0';
		else
			$where = 'salesman_id = '.$salesman_id;

		if( $condition !== '') {

			$where .= $condition;

		}

		$page = $page - 1;
		return $this->db->select('cl.id,cl.name,cl.email,cl.phone,cl.mobile,cl.created_date,co.name as comp_name , t.tag as tag ,r.file_name , u.username')
						->from('admin_client cl')
						->join('admin_client_corporation co' , 'cl.company_id = co.id' , 'left')
						->join('admin_clienttags t' , 'cl.tags = t.id' , 'left')
						->join('admin_client_row r' , 'cl.file_id = r.id')
						->join('admin_acl u' , 'u.user_id = cl.salesman_id')
						->where( $where )
						->limit( $offset , $offset*$page)
						->order_by('id,phone' , 'desc')
						->get()->result_array();
	}

	public function sum_of_clients() {
		return $this->db->get('admin_client')->num_rows();
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
						->from('admin_client')
						->where(array( 'id' => $id))
						->limit(1)
						->get()->result_array();
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

		//print_r( $_GET);

		$_GET['key'] = trim( $_GET['key']);
		
		if(  'name' === $_GET['field']) {

			return ' and cl.name like \'%'.$_GET['key'].'%\'';

		}else if( 'corporation_name' === $_GET['field']) {

			return ' and co.name like \'%'.$_GET['key'].'%\'';

		}else if( 'tag' === $_GET['field']) {

			return ' and t.tag like \'%'.$_GET['key'].'%\'';

		}else if( 'email' === $_GET['field']) {

			return ' and cl.email like \'%'.$_GET['key'].'%\'';

		}else if( 'mobile' === $_GET['field']) {

			return ' and cl.mobile ='.$_GET['key'];

		}else if( 'phone' === $_GET['field']) {

			return ' and cl.phone like \'%'.$_GET['field'].'%\'';

		}

		return '';

	}

}