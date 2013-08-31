<?php

/**
 *      [mot!] (C)2001-2099 36lean Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_b_request extends discuz_table {



	public function __construct () {
		$this->_pk    = 'id';
		parent::__construct();
	}

	public function did_username_exist( $username) {
		return DB::fetch_first('select count(uid) as count from '.DB::table('ucenter_members').' where username = \''.$username.'\'');
	}
	
	public function did_email_exist( $email) {
		return DB::fetch_first('select count(uid) as count from '.DB::table('ucenter_members').' where email = \''.$email.'\'');
	}	

	public function did_phone_exist( $phone) {
		return DB::fetch_first('select count(mobile) as count from '.DB::table('common_member_profile').' where mobile = \''.$phone.'\'');
	}
}