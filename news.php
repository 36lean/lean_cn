<?php

define('APPTYPEID' , 0);
define('CURSCRIPT', 'news');
require './source/class/class_core.php';

include_once( './weibo/config.php' );
include_once( './weibo/saetv2.ex.class.php' );

$discuz = C::app();

$discuz->init();

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$uid_get = $c->get_uid();
$weibo_id = $uid_get['uid'];




$mod = trim( $_GET['mod']) ? trim( $_GET['mod']) : 'default';

$topic = C::t('amazing_topic')->get_topic();

require libfile('news/'.$mod,'module');
require template('common/footer');

?>