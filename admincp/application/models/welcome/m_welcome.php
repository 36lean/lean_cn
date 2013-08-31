<?php

class M_welcome extends CI_Model {

	//@注册用户总量
	public function num_all_users() {
		$num = $this->db->select('count(uid)')
				 		->from('ucenter_members')
				 		->get()->result_array();

		return intval( $num[0]['count(uid)']);
	}

	public function num_today_users() {
		
		$date =  strtotime( date( 'Y-m-d' , strtotime('-1 day')));
		$num = $this->db->select('count(uid)')
						->from('ucenter_members')
						->where( 'regdate >', $date)
						->get()->result_array();
		return intval( $num[0]['count(uid)']);
	}

	public function update_login_log( $uid) {
		$this->db->where( 'user_id = '.$uid)
				 ->update('admin_acl' , array('updated_date' => time()));

		//var_dump( $this->db->last_query());
	}

	public function get_administrator( $uid){

		$user = $this->db->select('updated_date')
						 ->from('admin_acl')
						 ->where( array('user_id' => $uid))
						 ->limit(1)
						 ->get()->result_array();
		return $user[0];
	}

	public function get_suggestion($page=1,$offset=30) {
		return $this->db->select('admin_client_suggestion.*,ucenter_members.username ,ucenter_members.uid')
						->join('ucenter_members' , 'admin_client_suggestion.uid = ucenter_members.uid' , 'left')
						->limit($offset , ($page-1)*$offset)
						->order_by('admin_client_suggestion.id' , 'desc')
						->get('admin_client_suggestion')
						->result_array();
	}

	public function get_message_by_id( $id){
		return $this->db->where( 'id = '.$id)
						->get('admin_client_suggestion')
						->result_array();
	}

}