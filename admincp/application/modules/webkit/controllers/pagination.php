<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webkit_pagination_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();
	}

	public function show( $offset, $total) 
	{

		$config['base_url'] = site_url() . '/' . $this->uri->segment(1) . '/' . ( $this->uri->segment(2)?$this->uri->segment(2):'index') .'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $offset;
		$this->pagination->initialize($config);

		$this->load->view('show'  , array('pagination' => $this->pagination->create_links() , 'sum' => $total , 'offset' => $offset ));
	}
}