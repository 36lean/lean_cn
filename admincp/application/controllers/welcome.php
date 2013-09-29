<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

define('TYPE_PRODIUCT' ,1);
define('TYPE_BUG' , 2);
define('TYPE_CHANGE' , 3);
define('TYPE_OTHER' , 4);


class Welcome extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function Welcome() {
		parent::__construct();
		$this->load->model('welcome/m_welcome' , 'welcome');
	}

	public function index()
	{

		$type = array(
				TYPE_PRODIUCT => '产品咨询',
				TYPE_BUG      => '问题反馈',
				TYPE_CHANGE   => '改进意见',
				TYPE_OTHER    => '其它问题',
		);

		$all_users = $this->welcome->num_all_users();
		$today_users = $this->welcome->num_today_users();
		$login_log = $this->welcome->get_administrator( $this->_G['uid']);

		if( $this->_G['adminid'] === 1) {
			
			$suggestion_list = $this->welcome->get_suggestion();




		}else {
			$suggestion_list = array();
		}

		$this->welcome->update_login_log( $this->_G['uid']);

		$this->template->build('welcome_message' , array( 
													  'user' => $this->_G,
													  'login' => $login_log ,
													  'all'   => $all_users ,
												   	  'today' => $today_users, 
												   	  'suggestion_list' => $suggestion_list,
												   	  'type' => $type,
		));
	}

	public function view_suggestion( $id) {

		$id = intval( $id);

		$message = $this->welcome->get_message_by_id( $id);

		$this->template->build('welcome/suggestion' , array('message' => $message));

	}

	public function test() {
		$this->template->build('welcome/test');
	}
	
	public function __toString() {
		return strtolower( __CLASS__);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */