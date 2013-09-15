<?php
if('ok' === $message){

	echo '<span class="label label-success">添加成功</span>';

}else if('fail' === $message){
	echo '<span class="label">添加失败</span>';
}
?>