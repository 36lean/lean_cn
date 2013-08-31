<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$ac = $_GET['ac'] ? $_GET['ac'] : 'basic';

/*
*@insert , update
*/
if( isset( $_POST['update_director'])) {
	$c_id = trim( $_POST['id']);
	$c_key = trim( $_POST['c_key']);
	$c_value = trim( $_POST['c_value']);
	C::t('basic_config')->update_director( array(
		'id' => $c_id,
		'c_key' => $c_key,
		'c_value' => $c_value,
	));
	$director = C::t('basic_config')->get_director();
	savecache('director' , $director);
}else if( isset( $_POST['update_homephoto'])) {
	$ac = 'bigphoto';

	if( isset( $_POST['id'])){
		$data = C::t('basic_config')->get_bigphoto_by_id( $_POST['id']);
	}

	if( isset( $_FILES['c_key'])){
		if( $_FILES['c_key']['error'] == 0 && $_FILES['c_key']['size']){
			if( isset( $data['c_key']))
				unlink( DISCUZ_ROOT . 'uploads/home/' .$data['c_key']);

			$fname = mt_rand(999,9999).'.'.array_pop( explode('.', $_FILES['c_key']['name']));
			move_uploaded_file( $_FILES['c_key']['tmp_name'], DISCUZ_ROOT . 'uploads/home/'.$fname);
		}
		
	}

	if( !$fname)
		$fname = $data['c_key'];

	if( isset( $data)){

		C::t('basic_config')->update_bigphoto( array(
			'id'    	=> $_POST['id'],
			'config' 	=> $_POST['config'],
			'c_value' 	=> $_POST['c_value'],
			'c_key'		=> $fname,
		));

	}else{

		$id = C::t('basic_config')->insert_bigphoto( array(
		'config' 	=> trim( $_POST['config']),
		'c_value' 	=> trim( $_POST['c_value']),
		'c_key'		=> $fname,
		'type'		=> 'bigphoto',
		));	
	}
	loadcache('bigphoto');
}else if( isset( $_POST['add_hotcourse'])){
	C::t('basic_config')->add_hotcourse( array('config' => intval( $_POST['cid']) , 'type' => 'hotcourse'));
	$ac = 'direct';
}
/*
*@delete
*/

if( isset( $_GET['delete_bigphoto'])) { 
	$id = intval( $_GET['delete_bigphoto']);

	$photo = C::t('basic_config')->get_bigphoto_by_id( $id);
	if( $photo['c_key'])
		unlink( DISCUZ_ROOT . 'uploads/home/'.$photo['c_key']);
	C::t('basic_config')->delete_bigphoto( $id);
	loadcache('bigphoto');
}

/*
*@update
*/
if( $ac === 'bigphoto' && isset( $_GET['reload'])) {
	$bp = C::t('basic_config')->get_bigphoto();
	savecache('bigphoto' , $bp);
}

if( isset( $_GET['edit_bigphoto'])) {
	$id = intval( $_GET['edit_bigphoto']);
	$bp = C::t('basic_config')->get_bigphoto_by_id( $id);
}

/*
*@view
*/
if( $ac === 'basic')
	$director = C::t('basic_config')->get_director();
elseif( $ac === 'bigphoto')
	$bigphoto = C::t('basic_config')->get_bigphoto();
elseif( $ac === 'direct'){
	if( isset( $_GET['remove'])) {
		$id = intval( $_GET['remove']);
		C::t('basic_config')->rm_hotcourse( $id);
	}

	$hotcourse = C::t('b_course')->get_all_course();
	$selected = C::t('basic_config')->get_hotcourse();
}
	



require template('portal/home/'.$ac);