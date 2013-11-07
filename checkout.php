<?php
define('APPTYPEID' , 0);
define('CURSCRIPT', 'lesson');

require './source/class/class_core.php';
//设备检测class
//require './source/class/class_mobiledetect.php';

session_start();
$discuz = & discuz_core::instance();
$discuz->init();


if( isset( $_GET['signup']))
{

	$id = intval( $_GET['signup']);

	if( $_POST['done'])
	{
		unset( $_POST['done']);

		if( $_POST['formhash'] !== $_G['formhash'])
			redirect('checkout.php');

		$result = array();

		foreach ($_POST as $key => $value) {
			if( preg_match('/\d/', $key))
			{
				$result[$key] = $value;
			}
		}

		DB::query('update '.DB::table('addon_signup').' set result = \''.json_encode( $result).'\' where id = '.$_POST['id']);

		header('Location: checkout.php?finish=1');

		exit;
	}

	$signup = DB::fetch_first('select s.* , b.checkout_list  from '.DB::table('addon_signup').' s left join '.DB::table('addon_bucket').' b on s.bucket_id = b.id where bucket_id = '.$id.' and uid = '.$_G['uid']);

	if( $signup)
	{

		$signup['checkout_list'] = json_decode( $signup['checkout_list'] , true);

		foreach ($signup['checkout_list'] as $checkout_id) {

				$checkout[] = DB::fetch_first('select * from '.DB::table('addon_checkout').' where id = '.$checkout_id);
		}

		$finish_part = json_decode( $signup['result'] , true );

		require_once template('checkout/figureout');

		exit;
	}



	if( isset( $_POST['join']))
	{

		if( $_POST['formhash'] !== $_G['formhash'])
			redirect('checkout.php');

		unset( $_POST['join']);

		$_POST['time'] = strtotime( $_POST['time']);

		DB::query('insert into '.DB::table('addon_signup').'(bucket_id,uid,title,username,time) values('.$_POST['bucket_id'].','.$_POST['uid'].',\''.$_POST['title'].'\',\''.$_POST['username'].'\','.$_POST['time'].')');

		header('Location: checkout.php?join='.$id);

		exit;
	}

	$result = DB::fetch_first('select * from ' .DB::table('addon_bucket'). ' where id = '.$id);

	if( ! $result)
	{
		$news = DB::fetch_all('select id , post_title from '.DB::table('attach_posts').' where 1 order by id desc limit 10');
	}

	require_once template('checkout/signup');
	exit;
}

if( isset( $_GET['finish']))
{

	require_once template('checkout/finish');

	exit;
}


$buckets = DB::fetch_all('select * from ' .DB::table('addon_bucket'). ' where 1 order by id desc');

require_once template('checkout/index');