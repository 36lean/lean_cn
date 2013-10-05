<table class="table table-bordered table-condensed">
<tr>
	<td class="span1">UID</td>
	<td class="span1">用户名</td>
	<td class="span2">邮件</td>
	<td class="span1">手机</td>
	<td class="span1">电话</td>
	<td class="span2">公司</td>
	<td class="span1">职位</td>
	<td class="span1">注册日期</td>
</tr>


<?php foreach ($contacts as $contact) {?>

	<tr>
		<td><?php echo $contact['uid'];?></td>
		<td><a href="<?php echo site_url('marketing/web_members/'.$contact['uid']);?>"><?php echo $contact['username'];?></td>
		<td><?php echo $contact['email'];?></td>
		<td><?php echo $contact['mobile'];?></td>
		<td><?php echo $contact['telephone'];?></td>
		<td><?php echo $contact['company'];?></td>
		<td><?php echo $contact['position'];?></td>
		<td><?php echo $contact['regdate'];?></td>
	</tr>

<?php }?>

</table>

<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>