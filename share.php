<?php
session_start();
define('APPTYPEID' , 0);
define('CURSCRIPT', 'routing');

require_once './vendor/weibo-phpsdk/config.php';
require_once './vendor/weibo-phpsdk/saetv2.ex.class.php';
require './source/class/class_core.php';
$discuz = & C::app();
$discuz->init();



$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );

require template('common/header');
?>

<a class="btn" href="<?php echo $code_url;?>">登陆</a>



