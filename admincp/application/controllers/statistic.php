<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Statistic extends Base_Controller {


	public function Statistic() {
		parent::__construct();
	}

	public function index() {
		$this->template->build('statistic/index');
	}
	
	public function __toString() {
		return strtolower( __CLASS__);
	}
}