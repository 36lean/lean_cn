<?php

/*
*$tmp_name为临时文件名
*$new_name为封面图片新名字
*$path为目录名字 课程封面存在ROOT/uploads/course
*               章节封面存在ROOT/uploads/page
*/
function save_photo( $tmp_name , $old_name , $new_name , $path = 'page') {
	global $constant;
	//move_uploaded_file( $tmp_name, );
	preg_match('/[.].+$/' , $old_name , $match);
	$new_name .= $match[0];
	$path = $constant['uploads_path'].'/'.$path.'/'.$new_name;
	chmod( $constant['uploads_path'],0777);
	move_uploaded_file( $tmp_name, $path);
	return $new_name;
}