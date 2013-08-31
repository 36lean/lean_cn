<?php
define('APPTYPEID' , 0);
define('CURSCRIPT', 'reader');

define('TYPE_LEVEL' , 3);
define('ID_LEVEL' , 4);

require './source/class/class_core.php';

$discuz = & discuz_core::instance();
$discuz->init();

$dispatch = array_filter( preg_split('/[\/]/', $_SERVER['REQUEST_URI']));

$tmp_category = DB::fetch_all('select id,title from '.DB::table('amazing_topic').' where 1 order by sortid');



if( $dispatch[TYPE_LEVEL] === 'article')
{
	$id = intval( $dispatch[ID_LEVEL]);
	DB::query('update '.DB::table('amazing_news').' set view = view + 1 where id = '.$id);

	if( !file_exists('./cache/article/'.$id.'.cache'))
	{
		$art = DB::fetch_first('select * from '.DB::table( 'amazing_news').' where id = '.$id );

		$art['contentinfo'] = str_replace("\n", "" , $art['contentinfo']);
		$art['contentinfo'] = str_replace("\r", "" , $art['contentinfo']);
		ob_start();
		require template('reader/article');
		$tmp = ob_get_contents();
		ob_end_clean();
		file_put_contents('./cache/article/'.$id.'.cache', $tmp);
	}
	require template('common/header');
	require './cache/article/'.$id.'.cache';
	require template('common/footer');
	exit;
}

if( $dispatch[TYPE_LEVEL] === 'category')
{

	$id = intval( $dispatch[4]);

	$page =  $dispatch[ID_LEVEL] ? intval($dispatch[4]) : 1;

	$offset = 20;

	$category_info = DB::fetch_first('select id , title , information from '.DB::table('amazing_topic').' where id = '.$id);

	$list = DB::fetch_all('select id , banner , contenttitle , contentinfo ,  timecreated , view , comment from '.DB::table( 'amazing_news').' where category = '.$id.' order by id desc limit '.($page-1)*$offset.','.$offset);

	$total = count( $list);

	require template('reader/category');

	exit;
}

$list = DB::fetch_all('select id,contenttitle,view,banner,timecreated from '.DB::table( 'amazing_news').' where 1 order by id desc limit 20 ');

$categpry = array();
foreach ($tmp_category as $c) {
	$c['article'] = DB::fetch_all('select id , contenttitle , timecreated from '.DB::table('amazing_news').' where category = '.$c['id'].' order by id desc limit 8');

	$category[] = $c;
}


require template('reader/home');
