<?php if(isset( $info)){ echo $info;}else{?>


<h4>分批导入</h4>

<table class="table">
<tr>
	<td>FIleName</td><td>Action</td>
</tr>
<?php foreach ($file_list as $file) :?>

<tr>
	<td><?php echo $file;?></td><td><a href="<?php echo site_url('client/import_json_cache/'.$file);?>" target="blank">导入数据库</a></td>
</tr>

<?php endforeach ?>

<?php }?>