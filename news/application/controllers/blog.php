<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->template->set_layout('blog');
	}

	public function index()
	{
		$this->template->build('blog/index');
	}
}