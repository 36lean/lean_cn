<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'Base_Controller.php';

class Sale extends Base_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('sale/m_sale' , 'sale');
	}

	public function navigation()
	{
		return array(
			array('route' => 'index' , 'alias' => '客户列表' , 'status' => 'active') ,
		);
	}

	public function index( $page = 1 , $offset = 16)
	{
		$sale_id = $this->_G['uid'];

		$contacts = $this->sale->get_sale_contacts( $page , $offset , $sale_id );

		$sum = $this->sale->get_contact_sum( $sale_id);

		$tags = $this->sale->get_contact_tags();

		$this->template->build('sale/index' , array ( 'contacts' => $contacts ,
													  'tags'	 => $tags , 
													  'sum' 	 => $sum , 
													  'offset'   => $offset ,  
													) 
							  );
	}
































	public function update_tag( $id , $tag_id)
	{
		$this->sale->update_tag( $id , $tag_id , $this->_G['uid']); 
	}

	public function add_contact()
	{
		$id = intval( $this->input->post('id'));
		$text = trim( $this->input->post('text'));
		$this->sale->add_contact( $id , $text , $this->_G['uid']);
	}

}