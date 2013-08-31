<?php 
if( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'Base_Controller.php';

class Bugtrack extends Base_Controller {


	public function Bugtrack() {
		parent::__construct();
	}

	public function index() {
		$this->layout->view('bugtrack/index');
	}
	
	public function __toString() {
		return strtolower( __CLASS__);
	}
}