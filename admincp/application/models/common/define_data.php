<?php

class Define_data extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_selection_key_value( $table , $key , $value)
	{
		return $this->db->select( $key . ' as value ,' . $value . ' as name')
						->from( $table)
						->get()
						->result_array();
	}

	public function get_data_by_id( $table , $id , $key_name , $field = '*')
	{

		if( is_array( $field))
		{	
			$field = implode(',', $field);
		}

		return $this->db->select( $field)
						->from( $table)
						->where( array($key_name => $id))
						->get()
						->result_array();
	}
}