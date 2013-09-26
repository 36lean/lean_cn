<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';

class Sales extends Base_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->build('sales/index');
	}
}