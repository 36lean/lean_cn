<?php

class M_permission extends CI_Model {

	private $_user = 'ucenter_members';

	public function add_group() {
		$group_name = trim( $this->input->post('group_name'));
			
		$if = $this->db->select('id')
				 	   ->from('admin_acl_resource')
				       ->where( array('name' => $group_name))
				       ->get()->num_rows();

		if( $if != 0)
			return 0;

		unset( $_POST['group_name']);
		unset( $_POST['add_group']);
		foreach ($_POST as $key => $value) {
			$resource [] = $key;
		}


		return $this->db->insert( 'admin_acl_resource' , array('name' => $group_name , 'resource' => json_encode( $resource)));
	}

	public function get_all_group() {
		return $this->db->select('*')
						->from('admin_acl_resource')
						->get()->result_array();
	}

	public function del_group( $id) {
		if( $id === 1)
			return ;
		$this->db->delete('admin_acl_resource' , array('id' => $id));
	}

	public function add_to_list() {
		$username = trim( $this->input->post('username'));
		preg_match('/^\S+[@]\S+[.]\S+$/' , $username , $match);
		if( isset( $match[0])) {
			$condition = array('email' => $match[0]);
		}else {
			$condition = array('username' => $username);
		}
		$user = $this->db->select('uid,username,email')->from( $this->_user)->where( $condition)->get()->result_array();
			
		if( !$user[0]['uid'])
			return Status::USER_NOT_FOUND;

		$exist = $this->db->select('user_id')->from( 'admin_acl')->where( array('user_id' => $user[0]['uid']))->get()->num_rows();

		if( 0 === $exist) {
			if( isset( $user[0]['uid'])) {
				$this->db->insert( 'admin_acl', array( 'user_id' => $user[0]['uid'],
												   	   'username' => $user[0]['username'],
												   	   'email' => $user[0]['email'],
												   	   'resource_id' => 0,
												   	   'updated_date' => time(),
				));
				return Status::USER_INSERT_SUCCESS;
			}else {
				return Status::USER_NOT_FOUND;
			}	
		}
	}

	public function updated_user() {
		$user_id = $this->input->post('user_id');
		$resource_id = $this->input->post('resource_id');

		$this->db->update('admin_acl' , array('resource_id' => $resource_id) , array('user_id' => $user_id));
	}

	public function del_user( $id) {
		$this->db->delete('admin_acl' , array('user_id' => $id));
	}

	public function get_admin_lists() {
		return $this->db->select(' admin_acl.* , admin_acl_resource.name role_name')
						->join('admin_acl_resource' , 'admin_acl.resource_id = admin_acl_resource.id' , 'left')
						->from('admin_acl')
						->order_by('updated_date','desc')
						->get()->result_array();
	}

	public function get_resource_lists() {
		return $this->db->select( 'id,name')
						->from( 'admin_acl_resource')
						->get()->result_array();
	}

}