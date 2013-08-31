<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_admincp_cmenu.php 27806 2012-02-15 03:20:46Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_b_userlast extends discuz_table {

	private $_jointable;

	public function __construct () {
		$this->_table = 'b_userlast';
		$this->_jointable = 'b_lesson_pages';

		$this->_pk    = 'id';

		parent::__construct();
	}

	public function set_last( $uid , $pageid) {
		
		$pid = DB::fetch_first('select lastpageid from '.DB::table( $this->_table).' where uid = '.$uid);
		if( $pid) {
			DB::query('update '.DB::table( $this->_table).' set lastpageid = '.$pageid.' where uid = '.$uid);
		}else {
			DB::query('insert into '.DB::table( $this->_table).'( uid, lastpageid) values('.$uid.' , '.$pageid.')');
		}
	}

	public function get_last( $uid) {
		$last =  DB::fetch_first('select lastpageid , p.title, p.contents from '.DB::table( $this->_table).' as last left join '.DB::table( $this->_jointable).' as p on last.lastpageid = p.id  where uid = '.$uid);
		return $last;
	}
}