<?php

/**
 *      [mot!] (C)2001-2099 36lean Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_amazing_news_comment extends discuz_table {

	public function __construct() {
		$this->_table = 'amazing_news_comment';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function add_comment( $comment) {
		return $this->insert( $comment);
	}

	public function get_comments_by_article_id( $article_id) {

		DB::query('update '.DB::table('amazing_news').' set view = view + 1 where id = '.$article_id);

		return DB::fetch_all('select c.comment,c.timecreated,m.uid,m.username from '.DB::table( $this->_table).' c left join '.DB::table( 'ucenter_members').' m on c.uid = m.uid where c.article_id = '.$article_id . ' order by id desc');
	}
}