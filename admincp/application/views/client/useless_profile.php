<table class="table table-striped table-condensed">
	<tr>
		<td class="span1"></td>
		<td class="span2">用户名</td>
		<td class="span5">邮箱</td>
		<td class="span1">注册日期</td>
		<td class="span1">最后登陆</td>
	</tr>
	<?php foreach ($profiles as $p) {?>
	<tr>
		<td><input name="<?php echo $p['uid'];?>" type="checkbox" /></td>
		<td><?php echo $p['username'];?></td>
		<td><?php echo $p['email'];?></td>
		<td><?php echo date('Y-m-d h:i' , $p['regdate']);?></td>
		<td>
			<?php if( $p['lastlogintime']) {?>
			<?php echo date('Y-m-d h:i' , $p['lastlogintime']);?>
			<?php }else {?>
			<span class="label">从未登陆</span>
			<?php }?>
		</td>
	</tr>	
	<?php }?>


</table>


<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>