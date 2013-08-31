<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: misc.php 24842 2011-10-12 09:51:37Z zhengqingpeng $
 */

define('APPTYPEID', 0);
define('CURSCRIPT', 'messagebox');
define('TYPE_PRODIUCT' ,1);
define('TYPE_BUG' , 2);
define('TYPE_CHANGE' , 3);
define('TYPE_OTHER' , 4);

require './source/class/class_core.php';

$discuz = C::app();
$discuz->init();

$discuz->reject_robot();
//print_r( $_G);

if( isset( $_POST['post'])) {
	if( $_POST['formhash'] === $_G['formhash']) {

		if( isset( $_POST[TYPE_PRODIUCT])) {
			$type = TYPE_PRODIUCT ;
		}else if( isset( $_POST[TYPE_BUG])) {
			$type = TYPE_BUG ;
		}else if( isset( $_POST[TYPE_CHANGE])) {
			$type = TYPE_CHANGE;
		}else if( isset( $_POST[TYPE_OTHER])) {
			$type = TYPE_OTHER;
		}else {
			$type = 0;
		}


		$status = C::t('admin_client_suggestion')->new_message( array(
							'name' => trim( $_POST['name']),
							'email' => trim( $_POST['email']),
							'message' => trim( strip_tags( $_POST['message'])),
							'type' => $type,
							'timecreated' => time(),
							'uid' => $_G['uid'] ,
		));
		
	}else {
		$status = -1;
	}
}


include template( 'messagebox/index');