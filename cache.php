<?php

define('APPTYPEID' , 0);
define('CURSCRIPT', 'cache');

require './source/class/class_core.php';

$discuz = & discuz_core::instance();
$discuz->init();


if( !file_exists('./cache/common/header.html'))
{

	ob_start();
	include_once template('common/header');
	$cache = ob_get_contents();
	ob_end_clean();

	file_put_contents('./cache/common/header.html', $cache);
}

if( !file_exists('./cache/common/footer.html'))
{
	ob_start();
	include_once template('common/footer');
	$cache = ob_get_contents();
	ob_end_clean();

	file_put_contents('./cache/common/footer.html', $cache);
}
