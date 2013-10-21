<p>

<span class="label label-success">今天</span>
<span class="label label-info">将来</span>
<span class="label">过去</span>

</p>
<table class="table table-condensed table-striped">
	<tr>
		<th>客户称呼</th>
		<th>客户邮箱</th>
		<th>办公电话</th>
		<th>手机号</th>
		<th>留言/备注</th>
		<th>截止时间</th>
		<th>清除</th>
	</tr>
	<?php foreach ($data as $d) :?>
	<tr>
		<td class="span2"><a class="tooltips" href="<?php echo site_url('sale/contact/'.$d['client_id']);?>" data-toggle="tooltip" title="<?php echo $d['companyname'];?>"><?php echo $d['name'];?></a></td>
		<td class="span2"><?php echo $d['email'];?></td>
		<td class="span1"><?php echo $d['office_fax'];?></td>
		<td class="span1"><?php echo $d['mobile']?></td>
		<td class="span3"><strong><?php echo $d['event'];?></strong></td>
		
		<td class="span2">
			<?php if( $d['datereminded'] > $last && $d['datereminded'] < $next) {?>
				
				<span class="label label-success"><?php echo date('Y-m-d h:i' , $d['datereminded'] );?></label>
			
			<?php }else if( $d['datereminded'] < $last){ ?>
				
				<span class="label"><?php echo date('Y-m-d h:i' , $d['datereminded'] );?></label>

			<?php }else {?>

				<span class="label label-info"><?php echo date('Y-m-d h:i' , $d['datereminded'] );?></label>

			<?php }?>
		</td>

		<td class="span1"><a href="<?php echo site_url('sale/remove_remind/'.$d['id']);?>"><i class="icon-remove"></i></a></td>
	</tr>
	<?php endforeach ?>
</table>

<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>

<script>
$( function(){
	$('.tooltips').tooltip();
});
</script>