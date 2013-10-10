<?php

class Ajax extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('mailer/m_mailer' , 'mailer');
		$this->load->model('course/course_course' , 'course');
	}

	public function index() {}

	//获得中文或者英文视频数量
	/*
	* 参数 @$id $lang
	* 类型 $_post
	*/
	public function get_lang_sum_by_course_id() {
		
		$this->load->model('course/course_page' ,'page');
		echo $this->page->get_sum_by_cid_lang();
	}

	//邮件跟踪
	/*
	*mail_spy
	*/
	public function mailer_spy( $task_id = 0) {

		$this->db->insert('admin_dev_log' , array('task_id' => intval( $task_id) , 'date' => time()));
		$im = imagecreatetruecolor( 1, 1);
		header('Content-Type:image/png');
		imagepng($im);
		imagedestroy($im);
	}

	public function mail_sender() {

		$smtp = $this->mailer->get_mail_config();

		$max_smtp = $this->mailer->get_config_nums();
		
		$id = mt_rand(1,$max_smtp) - 1;
		
		$smtp = $smtp[$id];

		//preg_match_all('/[+]??\S+[@]\S+[.]\S+[+]??/', $_POST['_email'], $client);

		$client = preg_split('/[\+|\s|\/|+\/]/', $_POST['_email']);

		array_pop($client);

		$mail = array();
		foreach ($client as $c) {
			if( !preg_match('/^([0-9a-zA-Z\-\_\.]+)[@](([0-9a-zA-Z\-\_]+)[\.])+[a-zA-Z0-9\-\.\_]{1,10}[0-9a-zA-Z]$/i', $c))
				continue;
			$mail[$c] = '高级客户';
		}

		$template = $this->mailer->get_template_by_id( $this->input->post('_template'));

		
		$last = count( $mail);
		$array = array();
		$f = 1;
		foreach ($mail as $key => $value) {
			

			if( $f%20 === 0){
				$package = array ( 
					'task_id'       => $_POST['_task_id'],
					'to_list' 		=> $array,
					'mail_smtp'     => $smtp['smtp'],
					'mail_port'		=> $smtp['smtp_port'],
					'mail_username' => $smtp['smtp_username'],
					'mail_password' => $smtp['smtp_password'],
					'mail_myname' 	=>  $smtp['mail_myname'],
					'sign'          => $smtp['mail_sign'],
					'title'		 	=> $template[0]['mail_title'],
					'content'	 	=> $template[0]['mail_template'],
					);
				$array = array();
				echo $this->mailer->send_mail( $package);
			}
			$f++;
			$array[$key] = $value;
			
		}

		$array['446146366@qq.com'] = 'mot';
 
		$package = array ( 
					'task_id'       => $_POST['_task_id'],
					'to_list' 		=> $array,
					'mail_smtp'     => $smtp['smtp'],
					'mail_port'		=> $smtp['smtp_port'],
					'mail_username' => $smtp['smtp_username'],
					'mail_password' => $smtp['smtp_password'],
					'mail_myname' 	=>  $smtp['mail_myname'],
					'sign'          => $smtp['mail_sign'],
					'title'		 	=> $template[0]['mail_title'],
					'content'	 	=> $template[0]['mail_template'],
					);
		echo $this->mailer->send_mail( $package);	
		
		
		/*
		exit;


		$template = $this->mailer->get_template_by_id( $this->input->post('_template'));

		$package = array ( 
			'task_id'       => $_POST['_task_id'],
			'to_list' 		=> $mail,
			'mail_smtp'     => $smtp['smtp'],
			'mail_port'		=> $smtp['smtp_port'],
			'mail_username' => $smtp['smtp_username'],
			'mail_password' => $smtp['smtp_password'],
			'mail_myname' 	=>  $smtp['mail_myname'],
			'sign'          => $smtp['mail_sign'],
			'title'		 	=> $template[0]['mail_title'],
			'content'	 	=> $template[0]['mail_template'],
		);

		echo $this->mailer->send_mail( $package);
		*/
	}

	public function get_email_template() {
		$this->load->model('mailer/m_mailer' , 'mailer');
		$re = $this->mailer->get_template_by_id( $this->input->post('id'));
		if( isset( $re[0]['id']))
		echo $re[0]['mail_template'];
	}

	public function get_products_list_template() {
		$detail = $this->course->list_course_detail();
		print_r( $detail);
	}
}