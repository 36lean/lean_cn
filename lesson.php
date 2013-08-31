<?php
define('APPTYPEID' , 0);
define('CURSCRIPT', 'lesson');

require './source/class/class_core.php';
//设备检测class
require './source/class/class_mobiledetect.php';

session_start();
$discuz = & discuz_core::instance();
$discuz->init();
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$contenttypefilter = $_G['siteurl'] . 'urlfilter.php?url=';

$lang = array('CH/' , 'TW/' , 'EN/');
$srclang = array('zh' , 'tw' , 'en');
$labellang = array('简体中文','繁体中文','其它');
$voicelang = array('英文' , '中文' , '其它');

$config = require( DISCUZ_ROOT.'player.config.php');

//get vip data
if( $_G['uid']){
	$vip = C::t('b_vip')->get_vip_by_uid( intval( $_G['uid']));
}

//get bookmark and faviorte
if( $_G['uid']) {
	$favorite = C::t('b_favorite')->get_favorite_by_uid( $_G['uid']);
	$mark = C::t('b_mark')->get_mark_by_uid( $_G['uid']);
}

/*
//get video json data by page_id
if( isset( $_GET['dataajax'])){

	$id = intval( $_POST['pageid']);

	$cinfo = C::t('b_course')->get_free_by_pageid( $id);

	if( $vip['uid'] || $cinfo['is_free']){
		$c = C::t('b_video')->get_video_by_pageid( $id);
		$c['label_a_file'] = $contenttypefilter . $p['subtitle'] . $c['v_path'] . $lang[$c['label_a']] . $c['label_a_file'];
		$c['label_b_file'] = $contenttypefilter . $p['subtitle'] . $c['v_path'] . $lang[$c['label_b']] . $c['label_b_file'];
		echo json_encode( $c);
		exit;
	}	
}
*/
//new player
if( isset( $_GET['dataajax'])){

	$id = intval( $_POST['pageid']);

	$cinfo = C::t('b_course')->get_free_by_pageid( $id);

	if( $vip['uid'] || $cinfo['is_free']){

		$c = C::t('b_video')->get_video_by_pageid( $id);

		$tile = '?response-content-type=video/mp4';

		$c['video_pc'] = $config['videourl'] . $c['v_path'] . '/' . $c['v_file'].$tile;
		$c['video_mb'] = $config['mobileurl'] . $c['v_path'] . '/' . $c['v_file'].$tile;
		echo json_encode( $c);
		exit;
	}	
}

if( isset( $_GET['click_collection'])) {
	C::t('b_count')->autoincrement_course( intval( $_GET['id']), trim( $_GET['type']));
	echo 'ok';
	exit;
}

/*
if( 'phone1' === $deviceType){

	if( isset( $_GET['addmark'])){
		if( isset( $_G['uid'])){
			$id = intval( $_GET['addmark']);
			$m = C::t('b_mark')->get_mark_by_uid( $_G['uid']);
		if( $m){
			if( $m['id'] != $id)
				C::t('b_mark')->update( array('mark_id' => $id) , $_G['uid']);
			}else{
				C::t('b_mark')->insert( array('mark_id' => $id) , $_G['uid']);
			}
		}
		header('Location: lesson.php?enter_page='.$id);
	}


	if( isset( $_GET['favorite'])) {
		if( isset( $_GET['add'])){
			$id = intval( $_GET['add']);
			$exists = C::t('b_favorite')->get_favorite_by_id( $id , $_G['uid']);
			if( empty( $exists)){
				C::t('b_favorite')->insert( array('id' => $id) , $_G['uid']);
			}
		}else if( isset( $_GET['cancel'])) {
			$id = intval( $_GET['cancel']);
			C::t('b_favorite')->delete( array('id' => $id) , $_G['uid']);
		}
		require template('lesson/mobile/favorite');
		exit;
	}

	if( isset( $_GET['login'])) {
		if( !$_G['uid']) {
			require template('lesson/mobile/login');
			exit;
		}
	}

	if( isset( $_GET['enter_course'])) {
		$id = intval( $_GET['enter_course']);
		$pages = C::t('b_lesson_pages')->get_same_course_pages( $id);
		$course = C::t('b_course')->get_title_by_id( $id);
		require template('lesson/mobile/index');
		exit;
	}else if( isset( $_GET['enter_page'])){

		$id = intval( $_GET['enter_page']);
		$content = C::t('b_lesson_pages')->get_page_by_id( $id);
		//print_r( $page);

		require template('lesson/mobile/index');
		exit;
	}else if( isset( $_GET['play'])) {
		$filmid = intval( $_GET['play']);
		require template('lesson/mobile/play');
		exit;
	}

	$m_course = C::t('b_course')->get_all_course();
	require template('lesson/mobile/index');
	exit;
}
*/


//get all category here
$category = C::t('b_category')->get_all_category();

if( isset( $_GET['add_favorite'])){
	$courseid = intval( $_GET['add_favorite']);

	$exists = C::t('b_favorite')->get_favorite_by_id( $courseid , $_G['uid']);

	if( empty( $exists)){
		C::t('b_favorite')->insert( array('id' => $courseid) , $_G['uid']);
	}
	header('Location: lesson.php?pages_list='.$courseid);
	exit;
}else if( isset( $_GET['cancel_favorite'])){
	$courseid = intval( $_GET['cancel_favorite']);
	C::t('b_favorite')->delete( array('id' => $courseid) , $_G['uid']);
	header('Location: lesson.php?pages_list='.$courseid);
	exit;
}

if( !$_G['uid']&&$_GET['sign']) {

	if( 'signin' === trim( $_GET['sign'])) {
		require template('lesson/new_login');
	}elseif('signup' === trim( $_GET['sign'])) {
		require template('lesson/register');
	}
	exit;
}


if( isset( $_GET['pages_list'])){
	define('CURMODULE', 'pages_list');

	//记录到最后学习的页面位置
	$id = intval( $_GET['pages_list']);
	$_SESSION['current_course'] = $id;

	//关联的考试
	//$exam_bucket = C::t('b_exam_bucket')->get_bucket_by_course( $id);

	if( !file_exists( 'cache/pages_list/'.$id.'.cache')) {
		$lesson =  C::t('b_course')->get_course_by_id( $id);
		
		if( empty( $lesson)) {
			require template('lesson/notfound');
			return ;
		}

		$pages = C::t('b_lesson_pages')->get_pages_info_by_id( $id);



		ob_start();
		require template('lesson/new_pages_list');
		$cache = ob_get_contents();
		file_put_contents('cache/pages_list/'.$id.'.cache', $cache);
		ob_get_clean();
	}
	include_once template('common/header');
	include_once 'cache/pages_list/'.$id.'.cache';
	include_once template('common/footer');
	exit;
}

if( isset( $_GET['page_content'])){

	if( submitcheck('applysubmit')){
		DB::insert('fb_opinion', 
			array('name' => $_G['gp_name'], 
				  'username' => $_POST['name'], 
				  'email' => $_POST['email'], 
				  'phone' => $_POST['phone'], 
				  'uid' => $_G['uid'], 
				  'dateline' => time(), 
				  'updatetime' => time(), 
				  'status' => '0', 
				  'resideprovince' => $_G['gp_resideprovince'], 
				  'residecity' => $_G['gp_residecity'], 
				  'residedist' => $_G['gp_residedist'], 
				  'residecommunity' => $_G['gp_residecommunity'], 
				  'message' => $_G['gp_message']));
		$success = true;
	}

	$profile = DB::fetch_first('select realname, mobile from '.DB::table('common_member_profile').' where uid = '.$_G['uid']);

	$id = intval( $_GET['page_content']);

	$content = C::t('b_lesson_pages')->get_page_by_id( $id);

	if( !$content) {
		header('Location: lesson.php');
	}

	$course_info = C::t('b_course')->get_course_by_id( $content['lessonid']);

	$navigation = C::t('b_lesson_pages')->get_same_course_pages( $content['lessonid']);

	if( !$vip['uid']){
		if( empty( $_SESSION['current_course']))
			$_SESSION['current_course'] = 1;

		$free = C::t('b_course')->get_free_by_id( $content['lessonid']);

		if( $free['is_free'] && $_G['uid'])
			$vip['uid'] = 10086;
		else
			unset( $vip['uid']);
	}

	C::t('b_userlast')->set_last( $_G['uid'], $id);

	$video = C::t('b_video')->get_video_info_by_id( $id);

	require template('common/header');
	require template('lesson/new_content_front');

	if( $course_info['is_hidden']) {

		require template('lesson/new_content_hidden');

	} else if( ( $vip['uid'] === $_G['uid'] || ( $_G['uid'] && $course_info['is_free'])) ) {

		if( !file_exists( 'cache/page_content/'.$id.'.cache')) {
			ob_start();
			require template('lesson/new_content');
			$html = ob_get_contents();
			ob_get_clean();

			file_put_contents( 'cache/page_content/'.$id.'.cache' , $html);
		}
		require 'cache/page_content/'.$id.'.cache';

	} else if( $_G['uid']) {

		require template('lesson/new_content_notvip');

	} else {
		require template('lesson/new_content_login');
	}

	require template('common/footer');
	exit;
}

if( isset( $_GET['mark'])){

	if( isset( $_G['uid'])){
		$id = intval( $_GET['mark']);
		$m = C::t('b_mark')->get_mark_by_uid( $_G['uid']);
		if( $m){
			if( $m['id'] != $id)
				C::t('b_mark')->update( array('mark_id' => $id) , $_G['uid']);
			}else{
				C::t('b_mark')->insert( array('mark_id' => $id) , $_G['uid']);
			}
	}
	header('Location: lesson.php?page_content='.$id);
	exit;
}

define('BASE_NUMBER' , 21);

$sum = C::t('b_course')->count_of_course();

$all_pages = ceil( $sum['sum'] / BASE_NUMBER);



if( $all_pages < intval( $_GET['page'])) {
	header('Location: lesson.php');
	exit;
}

if( isset( $_GET['page']) && $_GET['page'] > 0) { $page = intval( $_GET['page']); }
else{ $page = 1; }



//get all course here , base number is BASE_NUMBER;
if( isset( $_GET['category'])){
	$c = C::t('b_course')->get_course_by_page( $page , BASE_NUMBER , intval( $_GET['category']));
}else{
	$c = C::t('b_course')->get_course_by_page( $page , BASE_NUMBER);
}

foreach ($category as $value) {
	$cat[$value['id']] = $value['category'];
}

if( !file_exists( 'cache/lesson_index/'.$page.'.cache')) {
	ob_start();
	require template('lesson/user_interface');
	$html = ob_get_contents();
	ob_end_clean();
	file_put_contents( 'cache/lesson_index/'.$page.'.cache', $html);
}

include_once template('common/header');
include_once 'cache/lesson_index/'.$page.'.cache';
include_once template('common/footer');
//function to detect subtitles' encoding
