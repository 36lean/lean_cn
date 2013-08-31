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

class table_fb_opinion extends discuz_table {

	public function __construct() {

		$this->_table = 'fb_opinion';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function getMessage() {
		return DB::fetch_all('select id,uid,name,message,dateline from '.DB::table( $this->_table).' where status = 0 order by id desc limit 30 ');
	}
}