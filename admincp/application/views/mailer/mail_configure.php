<?php if( Status::INSERT_SUCCESS === $status) {?>
<div class="alert alert-success">
	<i class="icon-info-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>添加成功 
</div>
<?php }else if( Status::RECORD_EXIST === $status) {?>
<div class="alert alert-error">
	<i class="icon-info-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>邮箱账户存在 添加失败 
</div>
<?php }else if( isset( $ok)) {?>
<div class="alert alert-error">
	<i class="icon-info-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button> 修改完成
</div>
<?php }?>
<div class="row-fluid">
	<div class="page-header">
		<h4><i class="icon-info-sign"></i> 邮件服务器设置</h4>
	</div>

<div class="box-content">
<form class="form-horizontal" action="" method="post">
<input type="hidden" name="id" value="<?php echo isset($conf['id']) ? $conf['id'] : '';?>">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="focusedInput">SMTP服务器</label>
			<div class="controls">
				<input name="smtp" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($conf['smtp']) ? $conf['smtp'] : '';?>" />
			</div>
		</div>		

		<div class="control-group">
			<label class="control-label" for="focusedInput">SMTP端口</label>
			<div class="controls">
				<input name="mail_port" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($conf['smtp_port']) ? $conf['smtp_port'] : '';?>" />
			</div>
		</div>	

		<div class="control-group">
			<label class="control-label" for="focusedInput">SMTP账户邮箱</label>
			<div class="controls">
				<input name="mail_username" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($conf['smtp_username']) ? $conf['smtp_username'] : '';?>" />
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="focusedInput">SMTP账户密码</label>
			<div class="controls">
				<input name="mail_password" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($conf['smtp_password']) ? $conf['smtp_password'] : '';?>" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="focusedInput">发件人称呼</label>
			<div class="controls">
				<input name="mail_myname" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($conf['mail_myname']) ? $conf['mail_myname'] : '';?>" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="focusedInput">邮件落款签名</label>
			<div class="controls">
				<textarea name="mail_sign" class="input-xlarge focused"><?php echo isset($conf['mail_sign']) ? $conf['mail_sign'] : '';?></textarea>
			</div>
		</div>		

		<div class="form-actions">
		<?php if( isset( $conf)) {?>
			<button name="save" type="submit" class="btn btn-primary">保存修改</button>
		<?php }else {?>
			<button name="add" type="submit" class="btn btn-primary">添加</button>
		<?php }?>
			<button class="btn">Cancel</button>
		</div>
	</fieldset>
</form>
	<div class="clearfix"></div>
</div>
</div>

<div class="box span12">
					<div class="page-header" data-original-title>
						<h4>smtp列表</h4>

					</div>
					<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
									  <th>smtp服务器</th>
									  <th>端口</th>
									  <th>邮箱账户</th>
									  <th>发件人称呼</th>
									  <th>操作</th>                                       
								  </tr>
							  </thead>   
							  <tbody>
							  	<?php foreach ($list as $mail) {
							  	?>
								<tr>
									<td><?php echo $mail['smtp'];?></td>
									<td class="center"><?php echo $mail['smtp_port'];?></td>
									<td class="center"><?php echo $mail['smtp_username'];?></td>
									<td class="center"><?php echo $mail['mail_myname'];?></td>
									<td class="center">
										<a href="<?php echo base_url();?>index.php/mailer/edit_config/<?php echo $mail['id'];?>">编辑</a>
										<a href="<?php echo base_url();?>index.php/mailer/del_config/<?php echo $mail['id'];?>">删除</a>
									</td>                   	                    
								</tr>       
								<?php }
								?>             
							  </tbody>
						 </table>     
					</div>
				</div><!--/span-->

