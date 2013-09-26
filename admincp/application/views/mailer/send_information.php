<?php echo anchor('mailer/del_task/'.$info['id'] , '删除本任务' , 'class="btn btn-primary pull-right"');?>
<div class="row-fluid">
		<div class="page-header">
			<h4>
				反馈
			</h4>
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
<div class="row-fluid">
		<div class="page-header">
			<h3>
				收件人ID列表
			</h3>
		</div>
		<div class="">

			<tr>
			<?php 
			$mail_list = $info['clientid_list'];
			//$mail_list = explode('+', $info['mail_list']);
			$mail_list = preg_split('/[,]/', $mail_list);
			foreach ($mail_list as $key => $contact_id) {?>
				<a href="<?php echo site_url('marketing/connect/'.$contact_id);?>"><span class="badge badge-success"><?php echo $contact_id;?></span></a>
			<?php 
			if( ($key+1) % 10 === 0)
				echo '';
			}?>
			</tr>

		</div>
</div>
<div class="row-fluid">
		<div class="page-header">
			<h4>
				邮件内容预览
				<small>
					Stay Hungry,Stay Foolish
				</small>
			</h4>
		</div>
		<div class="box-content">
			<div class="row-fluid ">
				<div class="span12">
					<iframe width="100%" height="600px" frameborder=0 src="<?php echo base_url();?>index.php/mailer/template_view/<?php echo $info['tid'];?>">
					</frame>
				</div>
			</div>
			<!--/row -->
		</div>
</div>
<!--/span-->
<?php

var_dump( $mail_list);

?>
