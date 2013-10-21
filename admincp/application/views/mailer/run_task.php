	<div class="page-header">
		<h2>
			发送列表
		</h2>
	</div>

	<p><button class="btn btn-primary" id="send">发送到勾选的邮箱</button></p>

	<table class="table table-bordered table-striped table-condensed">

			<tr>
			<th>选择</th>
			<th>Email</th>
			<th>状态</th>
			<th>发送对象</th>
			<th>发送次数</th>
			<th>邮件查看次数</th>
			<th>Retry</th>
			</tr>
				<?php 
				foreach ($list as $mail) {
				?>
				<tr>
					<td class="span1">
						<?php if( $mail['send'] == 0){?>
							<input name="<?php echo $mail['id'];?>" <?php if( $mail['send'] == 0){?>checked="checked"<?php }?> type="checkbox" />
						<?php }else{?>
							<span class="label">已发送过</span>
						<?php }?>
					</td>
					<td class="span4">
						<a href="#"><?php echo $mail['email'];?></a>
					</td>
					<td class="span1" id="<?php echo $mail['id'];?>">
							<span class="label">准备发送</span>
					</td>

					<td>
						<?php echo ($mail['contact_id'] != 0) ? '客户联系人' : '网站会员';?>
					</td>

					<td class="span2">
						<span class="badge badge-info"><?php echo $mail['send'];?></span>
					</td>

					<td class="span2">
						<span class="badge badge-info"><?php echo $mail['view'];?></span>
					</td>

					<td>
						<a href="<?php echo site_url('sale/send_along/'.$mail['id']);?>">单个发送</a>
					</td>
				</tr>
				<?php 
				}?>

		</table>

<script>
$( function () {
	$('#send').on('click' , function(){
		$checked = $('input:checked');
		$.each( $checked , function( $one){

			var id = $(this).attr('name');

			$.ajax({ 
				url : "<?php echo site_url('sale/ajax_send');?>" ,
				type : 'POST' , 
				data : { 'id' : id} ,
				success : function (data){

					if( data == '1')
						$('td#'+id).text('');
						$('td#'+id).append('<span class="label label-success">发送完成</span>');

				} , 
				beforeSend : function(xhr) {
					$('td#'+id).text('');
					$('td#'+id).append('<span class="label label-info">开始发送</span>');
				} ,
				complete : function(xhr , ts) {
					
				} ,

			});
		});
	});
});	
</script>
<p></p>