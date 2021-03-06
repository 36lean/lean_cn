<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'Base_Controller.php';


class Mailer extends Base_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('mailer/m_mailer' , 'mailer');
		$this->load->model('client/client_get' , 'client_get');
		$this->load->model('sale/m_mail' , 'm_mail');
		
		if( !$this->cache->file->get('smtp')) {
			$smtp = $this->mailer->get_mail_config();
			$this->cache->file->save('smtp', $smtp , 86400);
		}

		$this->load->model('client/client_get');

	}

	public function navigation() {
		return array(
			array( 'route' => 'index' , 'alias' => '创建模板' , 'status' => 'active' ) ,
			array( 'route' => 'mail_template' , 'alias' => '模板' , 'status' => 'active' ),
			array( 'route' => 'mail_sender', 'alias' => '创建任务' , 'status' => 'active' ) ,
			array( 'route' => 'mail_program', 'alias' => '执行' , 'status' => 'active' ) ,
			array( 'route' => 'mail_configure' , 'alias' => '设置' , 'status' => 'active' ) ,
		);
	}

	public function index() {
		if( isset( $_POST['add'])) {
			
			$status = $this->mailer->create_template();

		}else {

			$status = Status::NO_ACTION;
		}

		$this->template->build('mailer/index' , array('status' => $status));
	}

	public function mail_sender() {

		if( $id = $this->m_mail->build_task() )
		{
			redirect( site_url('mailer/mail_program'));
		}

		$sum = $this->client_get->get_sum_of_clients();

		$sum_members = $this->client_get->get_sum_of_webmembers();

		$templates = $this->mailer->get_active_templates_list();

		$this->template->build('mailer/mail_sender' , array('templates' 	=> $templates ,
														 	'sum'      		=> $sum , 
														 	'sum_members'	=> $sum_members ,
														   )
		);
	}

	public function mail_template() {

		$status = $this->m_mail->send_test() ? 1 : 0;

		$template_list = $this->mailer->get_templates_list();

		$this->template->build('mailer/mail_template' , array('list' => $template_list , 'status' => $status));
	}

	public function mail_program( $page = 1, $offset = 15) {

		$tasks = $this->mailer->list_task( $page , $offset );

		$sum = $this->mailer->get_task_sum();

		$this->template->build('mailer/mail_program' , array( 'tasks' => $tasks , 'sum' => $sum , 'offset' => $offset));
	}

	public function run_task( $id) {

		$id = intval( $id);

		$list = $this->mailer->get_list_by_taskid( $id);

		$this->template->build( 'mailer/run_task' , array( 'list' => $list));
		
	}

	public function del_task( $id)
	{
		$id = intval( $id);

		$this->db->where( array('task_id' => $id))
				 ->update('admin_maillog' , array('task_id'=>0));

		$this->db->delete('admin_mailtask' , array('id'=>$id));

		redirect( site_url('mailer/mail_program'));
	}

	public function mail_configure() {
		
		//更新缓存的 smtp信息
		$smtp = $this->mailer->get_mail_config();
		$this->cache->file->save('smtp', $smtp , 8640000);
		
		if( isset( $_POST['add'])) {
			$status = $this->mailer->add_mail_stmp();
		}
		else 
		{
			$status = Status::NOTHING;
		}

		$list = $this->mailer->get_smtp_list();

		$this->template->build('mailer/mail_configure' , array( 'status' => $status , 'list' => $list));
	}

	public function edit_config( $id) {

		$id = intval( $id);

		if( isset( $_POST['save'])) {
			$ok = $this->mailer->save_config();
		}else {
			$ok = null;
		}

		$conf = $this->mailer->get_conf( $id);

		$status = Status::NOTHING;

		$list = $this->mailer->get_smtp_list();

		$this->template->build('mailer/mail_configure' , array( 'ok' => $ok,'conf' => $conf[0] , 'status' => $status , 'list' => $list));
	}

	public function del_config( $id) {
		$id = intval( $id);

		$this->mailer->del_config( $id);

		redirect( base_url(). 'index.php/mailer/mail_configure');
	}

	public function template_view( $id) {

		$id = intval( $id);
		
		$template = $this->mailer->get_template_by_id( $id);
		
		require_once 'data/mail/header.html';
		
		echo $template['mail_template'];
		
		require_once 'data/mail/footer.html';
	}

	public function template_edit( $id = 1) {

		$id = intval( $id);

		if( isset( $_POST['update'])) {

			$this->mailer->template_edit();
			
			$id = intval( $this->input->post('id'));
			
		}

		$template = $this->mailer->get_template_by_id( $id);

		

		$this->template->build('mailer/template_edit' , array('templates' => $template));
	}

	public function send_information( $id) {

		$id = intval( $id);

		$info = $this->mailer->get_send_task_information( $id);

		$list = $this->mailer->get_list_by_taskid( $id);

		//$spy = $this->mailer->get_spy_data( $id);

		$this->template->build('mailer/send_information' , array('info' => $info , 'list'=>$list));
	}

	public function template_del( $id) {

		$this->mailer->template_del( $id);
		
		redirect( base_url(). 'index.php/mailer/mail_template');
		
	}

	public function __toString() {
		return strtolower( __CLASS__);
	}

}