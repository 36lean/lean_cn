<p>
<div class="btn-group">
    <a href="<?php echo site_url('course/test');?>" class="btn btn-primary">添加试题</a>
    <a href="<?php echo site_url('course/bucket');?>" class="btn btn-primary">添加试卷</a>
    <a href="<?php echo site_url('course/list_bucket');?>" class="btn btn-primary">试卷列表</a>
    <a href="<?php echo site_url('course/list_test');?>" class="btn btn-primary active">试题列表</a>
</div>
</p>

<table class="table table-striped table-condensed">
<?php foreach ($list as $test) { ?>

	<tr>
		<td><?php echo $test['id'];?></td>
		<td><?php echo $test['title'];?></td>
		<td><a class="label label-info" href="<?php echo site_url( 'course/test/'.$test['id']);?>">编辑</a></td>
		<td><a class="label label-info" href="<?php echo site_url( 'course/remove_test/'.$test['id']);?>">删除</a></td>
	</tr>

<?php }?>

</table>