<script>$( function(){ $('#template_id').hide();})</script>
<div id="template_id"><?php echo $task['template_id']?></div>
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2>
			发送列表
		</h2>

	</div>
	<div class="box-content">
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>
						Email
					</th>
					<th>
						状态
					</th>
					<th>
						Retry
					</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$list = preg_split('/[\+]/', $task['mail_list']);
				foreach ($list as $key => $mail) {
				?>
				<tr>
					<td>
						<span class="email" id="email_<?php echo $key;?>"><?php echo $mail;?></span>
					</td>
					<td class="center">
						<span class="status"></span>
					</td>
					<td class="center">
						<a href="">
						<span class="label label-info">
							再发送
						</span>
						</a>
					</td>
				</tr>
				<?php 
				}?>
			</tbody>
		</table>
	</div>
</div>

<div id="test"></div>
<script>
$( function () {
	var template = $('#template_id').text();
	var email = '';
	$('.email').each( function(i) {email +=   $(this).text() + ' ';});
	$.post("<?php echo base_url();?>index.php/ajax/mail_sender", { _email: email , _template: template , _task_id : <?php echo $task['id'];?> },
   		function(data){
   			if( data == '')
   				$('span.status').append('<span class="label label-success">发送成功</span>');
   		});

});
</script>
