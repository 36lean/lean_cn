<table class="table table-hover table-bordered">
<tr>
	<td class="span4">话费余额查询</td> 
	<td class="span4"></td>
	<td class="span4"><a id="data_dial_balance" href="javascript:void(0);">点击查询</a></td>
</tr>
</table>

<table class="table table-hover table-bordered table-condensed">
<tr>
	<td class="span3">课程视频是否正常验证</td> 
	<td class="span2"></td>
	<td class="span2"></td>
	<td class="span2"></td>
	<td class="span2"></td>
	<td class="span1"><a href="">验证</a></td>
</tr>

<?php foreach ($video as $v) { ?>
<tr>
	<td><?php echo $v['title'];?></td>	
	<td><?php echo $v['v_file'];?></td>
	<td><?php echo $v['image_file'];?></td>
	<td><?php echo $v['label_cn'];?></td>
	<td><?php echo $v['label_tw'];?></td>
	<td><?php echo $v['v_time'];?></td>
</tr>
<?php }?>

</table>



<script>
$(function(){

	$('#data_dial_balance').on('click',function(){

		$obj = $(this).parent().prev();

		$.ajax({
			url : "<?php echo site_url('module/webkit/devkit/query_balance');?>" , 
			type : "GET" , 
			success: function(data){

				$obj.text('');
				if( data === '')
					$obj.append( 'retry')
				else
					$obj.append( '<span class="label label-success">'+data+'</span>');

			},
		});
	});

});
</script>