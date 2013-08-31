<?php
define('APPTYPEID' , 0);
define('CURSCRIPT', 'routing');

require './source/class/class_core.php';
$discuz = & C::app();
$discuz->init();

if( !$_G['uid']) {
	header('Location: member.php?mod=logging&action=login');
}else {
	$course = DB::fetch_all('select id from '.DB::table('b_course').' where is_free = 1 and is_hidden = 0 limit 1');

	if( isset( $course[0]['id'])) {
		header('Location: lesson.php?pages_list=' . $course[0]['id']);
	}else {
		header('Location: lesson.php');
	}
}