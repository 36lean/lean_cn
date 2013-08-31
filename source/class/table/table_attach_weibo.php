<?php

class table_attach_weibo extends discuz_table {


	public function __construct() {
		$this->_table = 'attach_weibo';
		$this->_pk = 'uid';
	}

	public function get_uid_by_weiboid( $weibo_id) {
		return DB::fetch_first('select uid from '.DB::table( $this->_table).' where weibo_id = '.$weibo_id);
	}

	public function get_weiboid_by_uid( $uid) {
		return DB::fetch_first(' select weibo_id from '.DB::table( $this->_table).' where uid = '.$uid);
	}

	public function user_exists( $user , $weibo_id) {
		
		loaducenter();
		$login = uc_user_login(  $user['username'] , $user['password']);

		if( intval( $login[0]) < 1)
			return $login[0];




		print_r( $login);
		/*
		if( $info) {

			$salt_password = md5( md5( $user['password']) . $info['salt'] );

			if( $info['password'] === $salt_password;

		}else {
			return 0;
		}
		*/
	}

	public function insert_attach_data( $data) {
		DB::query('insert into '.DB::table('attach_weibo').'(uid , weibo_id, timecreated) value('.$data['uid'].', '.$data['weibo_id'].')');
	}

	public function get_logininfo_by_uid( $uid) {
		return DB::fetch_first('select uid , username , password , groupid from ' .DB::table( 'common_member'). ' where uid = '.$uid);
	}

	public function bind( $uid , $weibo_id) {

		$user = DB::fetch_first('select * from '.DB::table( $this->_table).' where uid = '.$uid .' or weibo_id = '.$weibo_id);
		
		if( !isset( $user['uid'])){
			return $this->insert( array( 'uid' 			=> $uid ,
										 'weibo_id' 	=> $weibo_id,
										 'timecreated' 	=> time(),
			));
		}else {
			return 0;
		}
		
	}

}