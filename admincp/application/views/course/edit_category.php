
<table class="table table-bordered">
<?php foreach ( $list as $key => $category) {?>
<tr>
<form action="" method="post">
	<td><input type="text" name="<?php echo $key;?>" value="<?php echo $category?>"></td>
	<td><input class="btn" name="save" type="submit" value="保存" /></td>
	<td><a class="btn" href="<?php echo base_url();?>index.php/course/del_category/<?php echo $key;?>">删除</a> </td>
</form>
</tr>
</dd>
</dl>
<?php }?>
</table>

