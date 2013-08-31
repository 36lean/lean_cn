<?php

class M_user extends CI_Model {

	private $_table;
	private $_common_member;

	public function __construct() {
		$this->_table = 'ucenter_members';
		$this->_common_member = 'common_member';
	}

	public function login() {

		if( strlen ( $this->input->post('hash')) === 16) {

			$username = trim( $this->input->post('username'));

			$password = trim( $this->input->post('password'));

			$u = $this->db->select('uid,username,password,salt')
					 	  ->from( $this->_table)
					 	  ->where( array('username' => $username))
					      ->limit(1)
					      ->get()->result_array();

			if( isset( $u[0]['uid'])) {

				$hash_password = md5(md5($password).$u[0]['salt']);
				if( $hash_password === $u[0]['password'] ){

					$profile = $this->db->select( $this->_common_member.'.adminid,'.$this->_common_member.'.groupid,admin_acl_resource.name acl_name,admin_acl_resource.resource')
							 			->from( $this->_common_member)
							 			->join( 'admin_acl' , 'admin_acl.user_id = '.$this->_common_member.'.uid')
							 			->join( 'admin_acl_resource' , 'admin_acl_resource.id = admin_acl.resource_id')
							 			->where( array( $this->_common_member.'.uid' => $u[0]['uid'] , $this->_common_member.'.username' => $u[0]['username']))
							 			->get()->result_array();
					//here create sessions data



					if( !isset( $profile[0]['resource']))
						redirect( base_url().'index.php/user/login');

					$this->session->set_userdata( 'user' ,array(  'user' 	=> $u[0]['username'],
														 		  'uid'  	=> $u[0]['uid'],
												  		          'hash' 	=> $u[0]['salt'],
												  		          'pstring' => $password,
												  		          'pcode' 	=> $u[0]['password'],
												  		          'adminid' => intval( $profile[0]['adminid']),
												  		          'groupid' => intval($profile[0]['groupid']),
												  		          'resource' => json_decode( $profile[0]['resource']),
												  		          'group'   =>  $profile[0]['acl_name'],
												  		          'auth_date' => time(),
												                )
					);
					redirect( base_url());
			    }else {

				//404 密码错误
				return 404;

				}

		    }else {

			}
		}else {
			//500 表单错误
			return 500;
		}


	}

}