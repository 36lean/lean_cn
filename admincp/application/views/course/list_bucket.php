<p>
<div class="btn-group">
    <a href="<?php echo site_url('course/test');?>" class="btn btn-primary">添加试题</a>
    <a href="<?php echo site_url('course/bucket');?>" class="btn btn-primary">添加试卷</a>
    <a href="<?php echo site_url('course/list_bucket');?>" class="btn btn-primary active">试卷列表</a>
    <a href="<?php echo site_url('course/list_test');?>" class="btn btn-primary">试题列表</a>
</div>
</p>

<table class="table table-striped">
<?php foreach( $list as $item) {

$checkout = json_decode( $item['checkout_list'] , true) ;

?>

<tr>
		
	<td><?php echo $item['title'];?></td>
	<td><?php echo $item['description'];?></td>
	<td><?php echo $item['limittime'];?></td>
	<td><?php echo implode( $checkout , ' | ');?></td>
	<td><a class="label label-info" href="<?php echo site_url( 'course/bucket/'.$item['id']);?>">编辑</a></td>
	<td><a class="label label-info" href="<?php echo site_url( 'course/remove_bucket/'.$item['id']);?>">删除</a></td>
</tr>

<?php }?>
</table>