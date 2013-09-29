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

			$username = trim( strtolower( $this->input->post('username')));

			$password = trim( $this->input->post('password'));

			$u = $this->db->select('uid,username,password,salt')
					 	  ->from( $this->_table)
					 	  ->where( array('username' => $username))
					      ->limit(1)
					      ->get()->row_array();

			if( isset( $u['uid'])) {

				$hash_password = md5(md5($password).$u['salt']);
				if( $hash_password === $u['password'] ){

					
					$profile = $this->db->select('u.* , g.name as groupname , g.rule')
										->from('admin_users u')
										->join('admin_groups g' , 'g.id = u.group_id' , 'left')
										->where( array('u.uid'=>$u['uid']))
										->get()->row_array();
					//here create sessions data
					$this->db->where( array('uid'=>$u['uid']))->update('admin_users' , array('timeupdated'=>time()));




			
					if( !isset( $profile['rule']))
						redirect( site_url('user/login'));
					
					$cookie = array(  'user' 	=> $u['username'],
									  'uid'  	=> $u['uid'],
									  'hash' 	=> $u['salt'],
									  'pstring' => $password,
									  'pcode' 	=> $u['password'],
									  'adminid' => intval( $profile['group_id']),
							          'groupid' => intval($profile['group_id']),
									  'resource' => unserialize( $profile['rule']),
									  'group'   =>  $profile['groupname'],
									  'auth_date' => time(),
									);
					
					$this->session->set_userdata( 'user' , $cookie);
					redirect( site_url('welcome/index'));
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