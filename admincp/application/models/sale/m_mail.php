<?php
//load swiftmailer
require_once FCPATH.'vendor/SwiftMailer/swift_required.php';

class M_mail extends CI_Model
{

	private static $mailer;
	private static $message;

	public function __construct()
	{
		
		parent::__construct();

		if( !isset( $this->mailer))
		{
			
			$smtp = $this->db->get('admin_mailconfig')->row_array();

			$transport = Swift_SmtpTransport::newInstance( $smtp['smtp'], $smtp['smtp_port']);
			 
			$transport->setUsername( $smtp['smtp_username']);

 			$transport->setPassword( $smtp['smtp_password']);

 			$this->mailer = Swift_Mailer::newInstance( $transport);

 			$this->message = Swift_Message::newInstance();

 			$this->message->setFrom( array( $smtp['smtp_username'] => $smtp['mail_myname']));

		}
	}

	public function send_mail_contact( $email , $template_id , $log_id = 0 , $taskid = 0 , $contactid = 0 , $uid = 0 )
	{	

		//通过两个参数 来修改发送消息

		if( $log_id === 0)
		{
			$this->db->insert('admin_maillog' , array('email'=>$email , 'template_id'=>$template_id , 'task_id'=>$taskid , 'contact_id'=>$contactid , 'uid'=>$uid , 'view'=>0 , 'send'=>0 ));

			$log_id = $this->db->insert_id();
		}

		

		$header = file_get_contents('./data/mail/header.html');
		
		$footer = file_get_contents('./data/mail/footer.html');

		$template = $this->get_template_by_id( $template_id);

 		$this->message->setTo( array( $email => $email ));

 		$this->message->setSubject( $template['mail_title'] );

 		$spy = '<img src="'.site_url('ajax/mailer_spy/'.$log_id).'" />';

 		$this->message->setBody( $header.$template['mail_template'].$spy.$footer, 'text/html', 'utf-8');

 		try{

 	 		$id = $this->mailer->send( $this->message);

 	 		if( $id == 1)
 	 		{
 	 			$this->db->query('update pre_admin_maillog set send = send + 1 where id = '.$log_id);
 	 		}

 	 		return $id;

 		}catch (Swift_ConnectionException $e){
  			
  			echo 'There was a problem communicating with SMTP: ' . $e->getMessage();
 		}	
	}

	public function send_test()
	{
		if( $this->input->post('send_test'))
		{

			$list = trim( $this->input->post('email'));

			$emails = explode(',', $list);

			foreach ($emails as $e) {
				if( preg_match('/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/', $e) )
				{
					$this->send_mail_contact( $e , trim( $this->input->post('template_id')) );
				}
			}
		}

		return true;
		
	}

	public function get_template_by_id( $id)
	{
		return $this->db->where( array('id' => $id))
						->get('admin_mailtemplate')
						->row_array();
	}

	public function build_task()
	{
		if( $this->input->post('add'))
		{
			$task = array(
				'status' => 1 , 
				'task_title' => trim( $this->input->post('task_title')) , 
				'page' 		 => intval( $this->input->post('page')) , 
				'offset' 	 => intval( $this->input->post('offset')) , 
				'type'  	 => trim( $this->input->post('type')) , 
				'template_id' => intval( $this->input->post('template_id')) , 
				'send_times' => 0 ,
				'created_date ' => time() , 
			);

			$this->db->insert('admin_mailtask' , $task);

			$task_id = $this->db->insert_id();
			
			if( $task['type'] === 'contact')
			{
				$list = $this->db->select('id contact_id , email')
						 		 ->from('admin_contacts')
						         ->limit( $task['offset'] - $task['page'] + 1 , $task['page'] )
						         ->order_by('id' , 'asc')
						         ->get()->result_array();

			}else
			{
				$list = $this->db->select('uid , email') 
								 ->from('ucenter_members')
								 ->limit(  $task['offset'] - $task['page'] + 1 , $task['page']  )
								 ->order_by('uid' , 'asc')
								 ->get()->result_array();
			}

			foreach ($list as $u) {
						
				if( !$u['email'])
					continue;

				$log = array(
					'email' 		=> $u['email'] ,
					'template_id' 	=> $task['template_id'] , 
					'task_id'		=> $task_id , 
					'contact_id'    => isset( $u['contact_id']) ? $u['contact_id'] : 0 ,
					'uid'			=> isset( $u['uid']) ? $u['uid'] : 0 , 
					'view'			=> 0 , 
					'send'			=> 0 ,
				);

				$this->db->insert( 'admin_maillog' , $log);
			}

			return $task_id;
		}
	}

	public function get_maillog_by_id( $id)
	{
		return $this->db->select('email,template_id,task_id')
						->from('admin_maillog')
						->where( array('id'=>$id))
						->get()
						->row_array();
	}

}