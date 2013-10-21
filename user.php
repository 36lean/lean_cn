<?php
define('CURSCRIPT', 'user');
require './source/class/class_core.php';

$discuz = C::app();
$discuz->init();

$ac = $_GET['ac'] ? trim( $_GET['ac']) : 'home' ; 

if( !$_G['uid'] && 'sub_plan' !== $ac){
	require template('user/guest');
	exit;
}

include_once libfile('class/vip');

//$app_list = array( 'home' , 'learn' , 'note' , 'favorite' , 'question' , 'kit' , 'account');



//sub_vip
if( 'sub_vip' === $ac) {

	$vip_time = C::t('b_vip')->get_vip_by_uid( $_G['uid']);
	$vip = $vip ? $vip : new vip();
	if(!$vip->on) showmessage('undefined_action');
	$is_vip = $vip->is_vip();
	$vip_credit_name=$_G['setting']['extcredits'][$vip->vars['creditid']]['title'];
	$vip_credit='extcredits'.$vip->vars['creditid'];
	$query=DB::fetch($vip->query("SELECT {$vip_credit} FROM pre_common_member_count WHERE uid='{$_G[uid]}'"));
	$my_credit=$query[$vip_credit];

	$today = time();
}

if( 'sub_newsfeed' === $ac) {
	if( isset( $_GET['pad_delete'])){
		$id = intval( $_GET['pad_delete']);
		C::t('b_userpad')->delete_pad( $id , $_G['uid']);
		header('Location: user.php?ac=sub_newsfeed');
	}
	$news = C::t('b_userpad')->get_latest_pad();
}

//sub_plan
if( 'sub_plan' === $ac) {
	$free_course = C::t('b_course')->get_free_course_by_page(1,5);
}

//sub_note
if( 'sub_note' === $ac) {
	if( $id = intval( $_GET['edit'])) {
		$edit = C::t('b_usernote')->get_user_note_by_id( $id , $_G['uid']);
	}
	$notes = C::t('b_usernote')->get_notes_by_uid( $_G['uid']);
}

if( 'sub_repository' === $ac) {
	$dict_list = C::t('knowledge_repository')->get_dict_by_uid( $_G['uid']);
}

if( 'sub_schedule' === $ac) {
	$event = C::t('b_userevent')->get_event_by_uid( $_G['uid']);

	$future = array();
	$today = array();
	$outofdate = array();

	foreach ($event as $_event) {

		if( time() - $_event['start'] > 86400)
			$outofdate[] = $_event;
		else if( date('Y/m/d' , $_event['start']) === date('Y/m/d'))
			$today[] = $_event;
		else 
			$future[] = $_event; 
 	}
}

if( 'home' === $ac){
	$event = C::t('b_userevent')->get_event_by_uid( $_G['uid']);
	$last = C::t('b_userlast')->get_last( $_G['uid']);

	if( isset( $_POST['add_pad'])) {
		C::t('b_userpad')->insert_pad( array(	'uid' => $_G['uid'],
												'padtext' => dhtmlspecialchars( $_POST['text']),
												'createddate' => time(),
		));

		$successed = TRUE;
	}
}

if( 'sub_changepassword' === $ac)
{
	if( $_G['formhash'] === $_POST['formhash'])
	{

		$filter = array();

		unset( $_POST['submit_change']);
		unset( $_POST['formhash']);
		unset( $_POST['referer']);
		foreach ($_POST as $key => $value) {
			$filter[$key] = trim( $value );
		}

		$user = C::t('b_userevent')->get_user_by_uid( $_G['uid']);

		if( $_G['username'] !== $user['username'])
		{

			$status = 1;

		}else if( $filter['new1'] !== $filter['new2'])
		{
			$status = 2;
		
		}else if( $user['password'] !==  md5( md5( $filter['old']).$user['salt']) )
		{
			$status = 3;
		
		}else {
			
			$salt = cutstr( md5( date() ) , 6 , '');
			
			$password = md5( md5( $filter['new1'] ) . $salt );

			C::t('b_userevent')->update_password( $_G['uid'] , $password , $salt);

			$status = 4;
		}


	}
}

$message = C::t('b_call')->count_newmessage( $_G['uid']);

require template('user/'.$ac);