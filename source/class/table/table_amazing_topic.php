<?php

/**
 *      [mot!] (C)2001-2099 36lean Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_amazing_topic extends discuz_table {

	public function __construct() {
		$this->_table = 'amazing_topic';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function get_topic() {
		return DB::fetch_all( 'select * from '.DB::table( $this->_table).' where 1');
	}

	public function get_topic_by_id( $id = 1) {
		return DB::fetch_first( 'select * from ' .DB::table( $this->_table). ' where id = '.$id);
	}
}