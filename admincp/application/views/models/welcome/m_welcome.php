<?php

class M_welcome extends CI_Model {

	//@注册用户总量
	public function num_all_users() {
		$num = $this->db->select('count(uid)')
				 		->from('common_member')
				 		->get()->result_array();

		return intval( $num[0]['count(uid)']);
	}

	public function num_today_users() {
		
		$date =  strtotime( date( 'Y-m-d' , strtotime('-1 day')));
		$num = $this->db->select('count(uid)')
						->from('common_member')
						->where( 'regdate >', $date)
						->get()->result_array();
		return intval( $num[0]['count(uid)']);
	}

	public function get_administrator( $uid){

		$user = $this->db->select('lastloginip,lastlogintime')
						 ->from('ucenter_members')
						 ->where( array('uid' => $uid))
						 ->limit(1)
						 ->get()->result_array();
		return $user[0];
	}

}