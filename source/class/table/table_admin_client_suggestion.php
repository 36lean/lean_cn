<?php

/**
 *      [mot!] (C)2001-2099 36lean Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_admin_client_suggestion extends discuz_table {

	public function __construct() {
		$this->_table = 'admin_client_suggestion';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function new_message( $message) {
		return $this->insert( $message);
	}
}
