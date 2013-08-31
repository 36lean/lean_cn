<?php echo anchor('mailer/del_task/'.$info['id'] , '删除本任务');?>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h3>
				收件人列表
			</h3>
		</div>
		<div class="box-content">
		<table class="table">
			<tr>
			<?php 
			$mail_list = $info['clientid_list'];
			//$mail_list = explode('+', $info['mail_list']);
			$mail_list = preg_split('/[,]/', $mail_list);
			foreach ($mail_list as $key => $mail) {?>
			<td><?php echo $mail;?></td> 
			<?php 
			if( ($key+1) % 10 === 0)
				echo '</tr><tr>';
			}?>
			</tr>
		</table>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h3>
				反馈
			</h3>
		</div>
		<div class="box-content">
			<dl>
				<dt>
					邮件查看情况 ( 以下时刻有人查看过邮件 )
				</dt>
				<dd>
					<?php foreach ($spy as $time) {
					?>
					[ <i class="icon-time"></i> <?php echo date('Y/m/d h:i:s' , $time['date']);?> ]
					<?php
					}?>
					
				</dd>
			</dl>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-font">
				</i>
				Preview
			</h2>
		</div>
		<div class="box-content">
			<div class="page-header">
				<h1>
					邮件内容预览
					<small>
						Stay Hungry,Stay Foolish
					</small>
				</h1>
			</div>
			<div class="row-fluid ">
				<div class="span12">
					<h3>
						Start
					</h3>
					<iframe width="100%" height="600px" frameborder=0 src="<?php echo base_url();?>index.php/mailer/template_view/<?php echo $info['tid'];?>">
					</frame>
				</div>
			</div>
			<!--/row -->
		</div>
	</div>
</div>
<!--/span-->