<?php
error_reporting(E_ALL);
include_once( './source/class/class_core.php');
session_start();
include_once( './source/function/function_member.php');
include_once( './source/function/function_admincp.php');
include_once( './source/function/function_cache.php');
include_once( './weibo/config.php' );
include_once( './weibo/saetv2.ex.class.php' );

$discuz = C::app();
$discuz->init();

if( $_G['uid'] > 0)
{

	require template('weibo/already_signin');

	exit;
}

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$ms  = $c->home_timeline(1,99); // done
$uid_get = $c->get_uid();
$weibo_id = $uid_get['uid'];

$mod = trim( $_GET['mod']) ? trim( $_GET['mod']) : 'index';

//检查围脖是否登录
if( !$weibo_id) {
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
		
	header( 'Location: '.$code_url);
	//require template('weibo/login');
	exit;
}
else {
	$user = $c->show_user_by_id( $weibo_id);
	$mod = 'bind';
}



/******************************************************************************/

//围脖登录成功 检测是否绑定网站uid
$website_uid = C::t('attach_weibo')->get_uid_by_weiboid( $weibo_id);


//如果绑定 网站自动登录
if( $website_uid) {
	$unused = false;
	/*
	if( $website_uid['uid'] != $_G['uid']) {
		clearcookies();
	}
	*/
	$auth = C::t('attach_weibo')->get_logininfo_by_uid( $website_uid['uid']);
	setloginstatus( $auth , 2592000);

	header('Location: lesson.php');

}else {
	//若没有 后面进入绑定账号的页面
	$unused = true;
}

/*******************************************************************************/
//绑定已经存在的网站账号
if( isset( $_POST['login_with_siteaccont'])) {

	$username = trim( $_POST['username'] );

	$username = preg_replace('/[^0-9A-Za-z\_]+/', '', $username);


	//DB::fetch_first('select * from '..' where username = ');

	$result =  userlogin( $username , trim( $_POST['password']));

	if( ! $result['member'])
	{
		require template('weibo/password_wrong');
		exit;
	}
		

	setloginstatus( $result['member'] , 2592000);

	if( is_array( $result['member']) && $result['status'] > 0) {

		$status = C::t('attach_weibo')->bind( $_G['uid'] , $weibo_id);

	}

	header('Location: lesson.php');

	//require template('weibo/online');

	exit;
}else if( isset( $_POST['register_with_weiboid'])) {
//用微博注册网站账号
	require template('common/header');
	$newusername = trim($_POST['username']);
	$newpassword = trim($_POST['password']);
	$newemail = strtolower(trim($_POST['email']));
	$_GET['newgroupid'] = 8;
	$_GET['emailnotify'] = true;



	if(C::t('common_member')->fetch_uid_by_username($newusername) || C::t('common_member_archive')->fetch_uid_by_username($newusername)) {
		echo '<div class="alert alert-error"><i class="icon-info-sign"></i> 用户名已经存在</div><div><a class="btn btn-primary" href="weibo.php">返回</a></div>';
		require template('common/footer');
		exit;
	}

		loaducenter();

		$uid = uc_user_register(addslashes($newusername), $newpassword, $newemail);
		if($uid <= 0) {
			if($uid == -1) {
				cpmsg('members_add_illegal', '', 'error');
				require template('common/footer');
				exit;
			} elseif($uid == -2) {
				cpmsg('members_username_protect', '', 'error');
				require template('common/footer');
				exit;
			} elseif($uid == -3) {
				if(empty($_GET['confirmed'])) {
					cpmsg('members_add_username_activation', 'action=members&operation=add&addsubmit=yes&newgroupid='.$_GET['newgroupid'].'&newusername='.rawurlencode($newusername), 'form');
				} else {
					list($uid,, $newemail) = uc_get_user(addslashes($newusername));
				}
				require template('common/footer');
				exit;
			} elseif($uid == -4) {
				echo '<div class="alert alert-error"><i class="icnon-info-sign"></i> 非法的邮件地址</div><div><a class="btn btn-primary" href="weibo.php">返回</a></div>';
				require template('common/footer');
				exit;

			} elseif($uid == -5) {
				echo '<div class="alert alert-error"><i class="icnon-info-sign"></i> 非法邮件后缀</div><div><a class="btn btn-primary" href="weibo.php">返回</a></div>';
				require template('common/footer');
				exit;
			} elseif($uid == -6) {
				echo '<div class="alert alert-error"><i class="icon-info-sign"></i> 邮箱已经被注册</div><div><a class="btn btn-primary" href="weibo.php">返回</a></div>';
				require template('common/footer');
				exit;
			}
		}

		$group = C::t('common_usergroup')->fetch($_GET['newgroupid']);

		$profile = $verifyarr = array();
		loadcache('fields_register');
		$init_arr = explode(',', $_G['setting']['initcredits']);
		$password = md5(random(10));
		C::t('common_member')->insert($uid, $newusername, $password, $newemail, 'Manual Acting', $_GET['newgroupid'], $init_arr, $newadminid);

		if($_GET['emailnotify']) {
			if(!function_exists('sendmail')) {
				include libfile('function/mail');
			}
			$add_member_subject = lang('email', 'add_member_subject');
			$add_member_message = lang('email', 'add_member_message', array(
				'newusername' => $newusername,
				'bbname' => $_G['setting']['bbname'],
				'adminusername' => $_G['member']['username'],
				'siteurl' => $_G['siteurl'],
				'newpassword' => $newpassword,
			));
			if(!sendmail("$newusername <$newemail>", $add_member_subject, $add_member_message)) {
				runlog('sendmail', "$newemail sendmail failed.");
			}
		}

		updatecache('setting');

		//有问题这里
		
		C::t('attach_weibo')->bind( $_G['uid'] , $weibo_id);

		echo '<div class="alert alert-info"><i class="icon-info-sign"></i> '.$newusername.'已经注册成功</div><div><a class="btn btn-primary" href="weibo.php">返回</a></div>';
		require template('common/footer');
		exit;
}

/********************************************************************************/

if( 'bind' === $mod) {
	require template('weibo/index');
	exit;
}

/********************************************************************************/



?>
