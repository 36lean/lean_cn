<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: portal_index.php 19235 2010-12-23 03:18:23Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

list($navtitle, $metadescription, $metakeywords) = get_seosetting('portal');
if(!$navtitle) {
	$navtitle = $_G['setting']['navs'][1]['navname'];
	$nobbname = false;
} else {
	$nobbname = true;
}
if(!$metakeywords) {
	$metakeywords = $_G['setting']['navs'][1]['navname'];
}
if(!$metadescription) {
	$metadescription = $_G['setting']['navs'][1]['navname'];
}

/*
if( 1 !== intval($_G['uid'])){
	require template('portal/construction');
	exit;
}
*/

/*
*@here code fixed by mot 
*/
if( !file_exists( 'cache/portal_index.html')) {
	$allcourse = C::t('b_course')->get_all_course();
	ob_start();
	include_once template('diy:portal/index');
	$content = ob_get_contents();
	ob_end_clean();
	file_put_contents('cache/portal_index.html', $content);
}
/*
*@make page static without mysql read.
*/
include_once template('common/header');
include_once 'cache/portal_index.html';
?>