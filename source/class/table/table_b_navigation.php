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

class table_b_navigation extends discuz_table {

	public function __construct () {
		$this->_table = 'b_navigation';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function fetch_all() {
		return DB::fetch_all('select * from %t where 1' , array($this->_table));
	}
}