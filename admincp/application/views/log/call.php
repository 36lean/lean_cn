<table class="table table-striped">
	<tr>
		<td>ID</td>
		<td>号码</td>
		<td>拨号结果</td>
		<td>客户姓名</td>
		<td>客户邮箱</td>
		<td>负责人人员</td>
		<td>拨号时间</td>
	</tr>


	<?php foreach ($data as $item) { ?>
		<tr>
			<td><?php echo $item['id'];?></td>
			<td><?php echo $item['phone'];?></td>
			<td><?php echo $item['response'];?></td>
			<td><?php echo $item['name'];?></td>
			<td><?php echo $item['email'];?></td>
			<td><?php echo $item['username'];?></td>
			<td><?php echo date('Y-m-d h:i' , $item['timedial']);?></td>
		</tr>
	<?php }?>

</table>


<?php $this->load->module('webkit/pagination/show' , array( $offset , $sum ));?>