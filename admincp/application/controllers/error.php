<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function no_permission() {
		$this->layout->view('error/no_permission');
	}

	public function navigation() {
		return array();
	}

	public function deny() {
		$this->layout->view('error/deny');
	}
}