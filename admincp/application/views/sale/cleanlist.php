<table class="table table-striped">
<tr>
	<td>客户姓名</td>
	<td>职位</td>
	<td>邮箱</td>

	<td>电话</td>
	<td>手机</td>
	<td>修改日期</td>
	<td></td>
</tr>
<?php foreach ($list as $contact) { ?>
<tr>
	
	<td><?php echo $contact['name'];?></td>
	<td><?php echo $contact['job'];?></td>
	<td><?php echo $contact['email'];?></td>
	
	<td><?php echo $contact['office_phone'];?></td>
	<td><?php echo $contact['mobile'];?></td>
	<td><?php if( $contact['modified_date'] ){ echo date( 'Y-m-d' ,$contact['modified_date']);}?></td>
	<td><a class="label label-info" href="<?php echo site_url('sale/return_contact/'.$contact['id']);?>">恢复</a></td>

</tr>
<?php }?>
</table>