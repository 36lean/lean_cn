<?php

class M_configure extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_groups()
	{
		$groups = $this->db->order_by('sortid')->get('admin_groups')->result_array();

		foreach ($groups as $key => $value) {
			$groups [$key]['rule'] = unserialize( $value['rule']);
		}

		return $groups;
	}

	public function add_group_rule()
	{

		$new = array();

		$new['name'] = trim( strtolower( $this->input->post('name')));
		$new['sortid'] = intval( $this->input->post('sortid'));
		unset( $_POST['name']);
		unset( $_POST['sortid']);
		$new['rule'] = serialize( $_POST);

		$this->db->insert('admin_groups' , $new);

	}

	public function add_user_to_group()
	{
		$key = $this->input->post('key');
		$value = $this->input->post('value');

		$user = $this->db->select('uid ,username,password,email,salt')
				 		 ->from('ucenter_members')
				         ->where( array($key=>$value))
				         ->get()->row_array();
		if( $user && ( 0 === $this->db->where( array($key=>$value))->from('admin_users')->get()->num_rows()) )
		{

			$user['timeupdated'] = time();

			$this->db->insert( 'admin_users' , $user);
		}
	}

	public function update_user_group()
	{
		foreach ($_POST as $key => $value) {
			$this->db->where( array('id'=>$key))->update('admin_users' , array('group_id'=>$value));
		}
	}

	public function get_users()
	{
		return $this->db->select('u.* , g.name as group_name')
						->from('admin_users u')
						->join('admin_groups g' , 'u.group_id = g.id' , 'left')
						->get()->result_array();
	}
}