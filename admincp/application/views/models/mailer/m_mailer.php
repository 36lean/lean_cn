<?php
require_once 'SwiftMailer/swift_required.php';

class M_mailer extends CI_Model {

	public function get_templates_list() {
		return $this->db->select('id,mail_title,mail_spy,created_date')
						->from( 'admin_mailtemplate')
						->get()->result_array();
	}

	/*
	*@send mail
	*@package 邮件信息
	*
	*@package['mail_myname']
	*@package['mail_username']
	*@package['mail_password']
	*@package['mail_smtp']
	*@pagkage['mail_port']
	*@package['to_list'] => array( $email => $name ,  $email2 => $name2);
	*@package['title']
	*@package['content']
	*/
	public function send_mail( $package) {
		$header = file_get_contents('./public/mail/header.html');
		$footer = file_get_contents('./public/mail/footer.html');

		$transport = Swift_SmtpTransport::newInstance( $package['mail_smtp'], $package['mail_port']);
 		$transport->setUsername( $package['mail_username']);
 		$transport->setPassword( $package['mail_password']);
 
 		$mailer = Swift_Mailer::newInstance( $transport);
 
 		$message = Swift_Message::newInstance();
 		$message->setFrom(array( $package['mail_username'] => $package['mail_myname']));
 		$message->setTo( $package['to_list']);
 		$message->setSubject( $package['title'] . ' ' . date('m/d h:i:s'));
 		$message->setBody( $header.$package['content'].$footer, 'text/html', 'utf-8');
 		//$message->attach( Swift_Attachment::fromPath('pic.jpg', 'image/jpeg')->setFilename('rename_pic.jpg'));
 		try{
  			$mailer->send($message);
 		}catch (Swift_ConnectionException $e){
  			echo 'There was a problem communicating with SMTP: ' . $e->getMessage();
 		}
	}

	public function create_template() {

		$result = array(
			'mail_title' => $this->input->post('mail_title'),
			'mail_template' => $this->input->post('mail_template'),
			'mail_spy' => $this->input->post('mail_spy') === 'on' ? 1 : 0,
			'created_date' => time(),
		);

		$ok = $this->db->insert('admin_mailtemplate' , $result);

		if( $ok)
			return Status::INSERT_SUCCESS;
		else
			return Status::INSERT_FAIL;
	}

	public function create_task() {
		$task = array( 	'task_title' 	=> trim( $this->input->post('task_title')),
						'mail_list'  	=> trim( $this->input->post('mail_list')),
						'template_id' 	=> $this->input->post('template_id'),
						'created_date'  => time(),
		);
		$status = $this->db->insert( 'admin_mailtask', $task);

		if( $status)
			return Status::INSERT_SUCCESS;
		else
			return Status::INSERT_FAIL;
	}

	public function list_task() {
		return $this->db->select('admin_mailtask.id,admin_mailtask.status,admin_mailtask.task_title,admin_mailtask.created_date,admin_mailtemplate.mail_title')
						->from( 'admin_mailtask')
						->join( 'admin_mailtemplate' , 'admin_mailtemplate.id = admin_mailtask.template_id')
						->get()->result_array();
	}

	public function run_task( $id) {

		$task = $this->db->select('admin_mailtask.id,admin_mailtask.mail_list,admin_mailtask.template_id,')
						 ->from('admin_mailtask')
						 ->join('admin_mailtemplate' , 'admin_mailtemplate.id = admin_mailtask.template_id')
						 ->where( array('admin_mailtask.id' => $id))
						 ->get()->result_array();
		return $task[0];
	}

	public function get_template_by_id( $id) {
		return $this->db->select('*')
						->from('admin_mailtemplate')
						->where( array('id' => $id))
						->get()->result_array();
	}

	public function template_edit() {
		$status = $this->db->where( array('id' => $this->input->post('id')))
						   ->update('admin_mailtemplate' , array(
									'id' => $this->input->post('id'),
									'mail_title'=> $this->input->post('mail_title'),
									'mail_template' => $this->input->post('mail_template'),
									'mail_spy' => $this->input->post('mail_spy') === 'on' ? 1 : 0,
		));

		if( $status)
			return Status::INSERT_SUCCESS;
		else
			return Status::INSERT_FAIL;
	}

	public function del_config( $id) {
		$this->db->delete( 'admin_mailconfig' , array('id' => $id));
	}

	public function get_mail_config() {
		return $this->db->select('*')->from('admin_mailconfig')->get()->result_array();
	}

	public function get_config_nums() {
		return $this->db->select('id')->from('admin_mailconfig')->get()->num_rows();
	}

	public function add_mail_stmp() {
		$mail =array(
			'smtp' => trim( $this->input->post('smtp')),
			'smtp_port' => intval( $this->input->post('mail_port')),			
			'smtp_username' => trim( $this->input->post('mail_username')),
			'smtp_password' => trim( $this->input->post('mail_password')),
			'mail_myname' => trim( $this->input->post('mail_myname')),
		);

		if( $this->db->select('id')->from( 'admin_mailconfig')->where( array('smtp_username' => $mail['smtp_username']))->get()->num_rows())
		{
			return Status::RECORD_EXIST;
		}
		else
		{
			$this->db->insert( 'admin_mailconfig' , $mail);
			return Status::INSERT_SUCCESS;
		}
			
	}

	public function get_smtp_list() {
		return $this->db->select( 'id,smtp,smtp_port,smtp_username,mail_myname')->from( 'admin_mailconfig')->get()->result_array();
	}

}