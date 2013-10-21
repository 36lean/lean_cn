<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: portal.php 28297 2012-02-27 08:35:59Z monkey $
 */

define('APPTYPEID', 4);
define('CURSCRIPT', 'portal');
require './source/class/class_core.php';
$discuz = C::app();

$cachelist = array('userapp', 'portalcategory', 'diytemplatenameportal');
$discuz->cachelist = $cachelist;

$discuz->init();

require DISCUZ_ROOT.'./source/function/function_home.php';
require DISCUZ_ROOT.'./source/function/function_portal.php';

//==============================mot added==============================
require DISCUZ_ROOT.'./source/function/cache/cache_lesson.php';


/*
loadcache('latest_course');
if( !isset( $_G['cache']['latest_course'])) {
	cache_course_info();
	loadcache('latest_course');
}
loadcache('hot_keyword');
if( !isset( $_G['cache']['hot_keyword'])) {
	get_hot_keyword();
	loadcache('hot_keyword');
}
loadcache('director');
if( !isset( $_G['cache']['director'])) {
	$director = C::t('basic_config')->get_director();
	savecache('director' , $director);
}
loadcache('bigphoto');
if( !isset( $_G['cache']['bigphoto'])) {
	$bigphoto = C::t('basic_config')->get_bigphoto();
	savecache('bigphoto' , $bigphoto);
}
loadcache('freep');
if( !isset( $_G['cache']['freep'])) {
	cache_free_pages(8);
	loadcache('freep');
}
loadcache('hot_course');
if( !isset( $_G['cache']['hot_course'])) {
	$hot_course = C::t('basic_config')->get_hotcourse();
	savecache('hot_course' , $hot_course);
	loadcache('hot_course');
}


$c_top = C::t('b_course')->get_top_course();

$hidden = C::t('b_course')->get_hidden_course();
$aboutus = C::t('basic_config')->get_aboutus();

*/
//==============================mot added==============================


if(empty($_GET['mod']) || !in_array($_GET['mod'], array('list', 'home','lesson', 'view', 'comment', 'portalcp', 'topic', 'attachment', 'rss', 'block'))) $_GET['mod'] = 'index';


define('CURMODULE', $_GET['mod']);
runhooks();

$navtitle = str_replace('{bbname}', $_G['setting']['bbname'], $_G['setting']['seotitle']['portal']);
$_G['disabledwidthauto'] = 1;

require_once libfile('portal/'.$_GET['mod'], 'module');

?>