<div class="container">
	<div class="page-header">
		<h3>
			<i class="icon-info-sign">
			</i>
			给客户
			<?php echo $client[ 'name'];?>
				写邮件
		</h3>
	</div>

	<div class="box-content">
		<form class="form-horizontal" action="" method="post">
		<input name="uid" type="hidden" value="<?php echo $this->_G['uid'];?>">
		<input name="client_id" type="hidden" value="<?php echo $client['id'];?>">
			<fieldset>
				<p>今天日期: <?php echo date( 'Y/m/d');?></p>
				
				<div class="control-group">
					<label class="control-label" for="to_email">
						收件人邮箱
					</label>
					<div class="controls">
						<input name="to_email" value="<?php echo $client['email'];?>" type="text" class="span6" id="to_email">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="title">
						邮件标题
					</label>
					<div class="controls">
						<input name="email_title" value="给 <?php echo $client['name']?> 先生/女士" type="text" class="span6" id="title">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="textarea2">
						邮件内容
					</label>
					<div class="controls">
						<textarea name="email_content" class="span10" id="textarea2" rows="8"></textarea>
					</div>
				</div>
				<div class="form-actions">
					<button name="send_save" type="submit" class="btn btn-large btn-primary">
						<i class="icon-angle-right icon-white">
						</i>
						直接发送
					</button>
					<button name="save_only" type="submit" class="btn btn-large">
						<i class="icon-save">
						</i>
						存为草稿
					</button>
				</div>
			</fieldset>
		</form>
		<div class="clearfix">
		</div>
	</div>
</div>