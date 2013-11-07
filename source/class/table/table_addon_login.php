<?php

/**
 *      [mot!] (C)2001-2099 36lean Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_addon_login extends discuz_table {

	public function __construct() {
		$this->_table = 'addon_login';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function user_login( $uid , $session_id , $ip)
	{
		if( $uid === 0)
			return ;

		$session = DB::fetch_first('select * from '.DB::table($this->_table).' where uid = '.$uid);

		$token = md5( $session_id);

		if( !$session)
		{
			DB::query('insert into '.DB::table( $this->_table).' (uid , token , ip , time) values('.$uid.',\''.$token.'\' ,ip = \''.$ip.' \' , time = '.time().')');

		}else if( $token !== $session['token'])
		{

			DB::query('insert into '.DB::table('addon_log').' (uid,prev_ip,last_ip,prev_time,last_time) values('.$uid.',\''.$session['ip'].'\',\''.$ip.'\','.$session['time'].','.time().')');

			DB::query('update '.DB::table( $this->_table).' set token = \''.$token.'\' , ip=\''.$ip.'\' , time = '.time().'  where uid = '.$uid);
		}
	}

	public function auth_login( $uid , $session_id , $ip )
	{
		if( $uid === 0)
			return ;

		$session = DB::fetch_first('select * from '.DB::table($this->_table).' where uid = '.$uid);

		$token = md5( $session_id);

		if( !$session)
		{
			DB::query('insert into '.DB::table( $this->_table).' (uid , token , ip , time) values('.$uid.',\''.$token.'\ ,ip = \''.$ip.' \' , time = '.time().')');

			return TRUE;

		}else if( $token === $session['token'])
		{
			return TRUE;

		}else{

			return FALSE;

		}
	}
}
