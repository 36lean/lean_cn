<?php

/**
 *      [mot!] (C)2001-2099 36lean Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_amazing_news extends discuz_table {

	public function __construct() {
		$this->_table = 'amazing_news';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function insert_news( $data) {
		return $this->insert( $data);
	}

	public function get_news() {
		return DB::fetch_all('select id,timecreated,contentinfo,contenttitle,category,banner from ' .DB::table($this->_table). ' where 1 order by id desc');
	}

	public function get_a_news( $id) {
		return DB::fetch_first(' select n.*,t.title as topic_title,t.id as topic_id from '.DB::table( $this->_table).' n left join '.DB::table('amazing_topic').' t on n.category = t.id where n.id = '.$id);
	}

	public function get_list_by_category( $id) {
		return DB::fetch_all('select id , contenttitle , contentinfo , keyword , author , banner , view ,comment , timecreated from '.DB::table( $this->_table).' where category = '.$id . ' order by id desc');
	}

	public function view_autoincrement( $id) {
		DB::query('update '.DB::table( $this->_table).' set view = view + 1 where id = ' .$id);
	}

	public function get_common_news() {
		return DB::fetch_all('select contenttitle,contentinfo,timecreated,banner,view,comment from '.DB::table($this->_table). ' where 1 order by id,view desc limit 8');
	}

	public function get_hightest_click_news() {
		return DB::fetch_all('select contenttitle,contentinfo,timecreated,banner,view,comment from '.DB::table($this->_table). ' where 1 order by view desc limit 8');
	}

}