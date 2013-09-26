<a href="<?php echo base_url();?>index.php/client/add_corporation"><span class="label label-success">添加企业信息</span></a>
<table class="table table-bordered table-striped table-condensed">
	<tr>
		<th>序号</th> <th>企业名称</th> <th>地址</th> <th>网址</th> <th>创建</th> <th>更新</th>
	</tr>
	<?php
	foreach ($list as $info) {
	?>
	<tr>
		<td><?php echo $info['id'];?></td>
		
		<td><?php echo $info['name'];?></td>
		
		<td><?php echo $info['address'];?></td>
		
		<td><?=$info['weburl'];?></td>

		<td><?=$info['timecreated'];?></td>

		<td><?php echo date( 'Y/m/d h:i' , $info['timeupdated']);?></td>
		
	</tr>
	<?php }?>
</table>