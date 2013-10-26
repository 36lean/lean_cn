<table class="table table-consensed table-striped">

<tr>
	<td>UID</td>
	<td>用户名</td>
	<td>邮箱</td>
	<td>开通日期</td>
	<td>到期</td>
	<td>剩余天数</td>
</tr>

<?php foreach ($list as $vip) { ?>
<tr>
	<td><?php echo $vip['uid'];?></td>
	<td><a href="<?php echo site_url('sale/web_members/'.$vip['uid']);?>"><?php echo $vip['username'];?></td>
	<td><?php echo $vip['email'];?></td>
	
	<td>

		<?php 
		$h = date('a' , $vip['jointime']) === 'am' ? date('h' , $vip['jointime']) : 12 + date('h' , $vip['jointime']);
		echo date('Y-m-d '.$h.'-i' , $vip['jointime']);
		?>
	
	</td>

	<td>

		<?php 
		$h2 = date('a' , $vip['exptime']) === 'am' ? date('h' , $vip['exptime']) : 12 + date('h' , $vip['exptime']);
		echo date('Y-m-d '.$h2.'-i' , $vip['exptime']);
		?>

	</td>

	<?php $day = ($vip['exptime'] - time() )/86400;?>
	<td><?php echo $day > 0 ? intval($day) : '已经到期' ;?></td>
</tr>
<?php }?>
</table>

<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>
