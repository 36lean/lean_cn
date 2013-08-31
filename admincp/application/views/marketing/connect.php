<div class="row-fluid">
<div class="box span5">
	<div class="box-header well" data-original-title>
		<h2>
			用户资料
		</h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round">
				<i class="icon-chevron-up">
				</i>
			</a>
			<a href="#" class="btn btn-close btn-round">
				<i class="icon-remove">
				</i>
			</a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th width="20%">
						<i class="icon-circle-blank"></i> key
					</th>
					<th  width="80%">
						<i class="icon-circle-blank"></i> value
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>标签</td>
					<td><i class="icon-star"></i> <?php if( $profile['tags']) echo $tags[$profile['tags']];?></td>
				</tr>
				<?php 

				foreach ($column as $key => $value) {
					if( $key === 'cdescription')
						continue;
				?>
				<tr>
					<td>
						<?php echo $value;?>
					</td>
					<td class="center">
						<?php echo $profile["$key"]?>
					</td>
				</tr>
				<?php
				}?>
				<tr>
					<td>企业详情</td>
					<td><a href="<?php echo base_url();?>index.php/client/corp_information/<?php echo $profile['company_id'];?>">访问企业详细资料</a></td>
				</tr>				
				<tr>
					<td>创建时间</td>
					<td><?php echo date('Y/m/d h:i:s' , $profile['created_date']);?></td>
				</tr>
				<tr>
					<td>附加信息</td>
					<td><?php echo $profile['etc'];?></td>
				</tr>
			</tbody>
		</table>
		<div>
			<ul class="nav nav-tabs nav-stacked">
				<li><a href="<?php echo base_url();?>index.php/marketing/edit_client/<?php echo $profile['id'];?>"><i class="icon-edit"></i> 修改客户资料信息</a></li>
				<li><a href="<?php echo base_url();?>index.php/marketing/mailto/<?php echo $profile['id'];?>"><i class="icon-envelope"></i> 发送邮件</a></li>
				<li><a href="<?php echo base_url();?>index.php/marketing/join_website/<?php echo $profile['id'];?>"><i class="icon-check"></i> 转为网站会员&邮箱通知</a></li>
				<li><a href="<?php echo base_url();?>index.php/marketing/send_invitation/<?php echo $profile['id'];?>"><i class="icon-envelope-alt"></i> 发送网站邀请邮件</a></li>

			</ul>
			
			<form action="" method="post">
				<input name="client_id" type="hidden" value="<?php echo $profile['id'];?>">
				<input name="uid" type="hidden" value="<?php echo $this->_G['uid'];?>">
				<p><textarea name="reminder" class="span12" name="etc" rows="2"></textarea></p>
				<p><button name="add_reminder" class="btn btn-block">添加备忘记录</button></p>
			</form>
		</div>
	</div>
</div>
<!--/span-->

<div class="box span7">
	<div class="box-header well" data-original-title>
		<h2>
			记录
		</h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round">
				<i class="icon-chevron-up">
				</i>
			</a>
			<a href="#" class="btn btn-close btn-round">
				<i class="icon-remove">
				</i>
			</a>
		</div>
	</div>
	<div class="box-content">
	<form name="__response_" action="" method="post">
	<input name="client_id" type="hidden" value="<?php echo $profile['id'];?>">
		<fieldset>
			<h4><i class="icon-coffee"></i> 添加沟通记录</h4>
			<div class="control-group">
				<div class="controls">
					<textarea name="client_response" class="span12" rows=10 id="textarea2"></textarea>
				</div>
			</div>

			<div class="form-actions">
				<button name="response" type="submit" class="btn btn-primary">
					Save
				</button>
				<button type="reset" class="btn">
					Cancel
				</button>
			</div>

			<h4><i class="icon-bell"></i> 设置下次跟踪时间</h4>

			<ul>
				<li>当前设定</li>
				<?php foreach ($apponintment as $date) {
				?>
				<li><?php echo date('Y / m / d' , $date['datereminded']);?> - <?php echo $date['event'];?></li>
				<?php
				}?>
			</ul>

			<form name="set_bell" action="" method="post">
				<div class="control-group">
					<label class="control-label" for="date01">跟踪时间</label>
						<div class="controls">
							<input type="text" class="input-xlarge datepicker" name="date" id="date01" value="<?php echo date('m/d/Y');?>">
						</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="date01">提醒事项</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="event" id="text02" value="再次联系">
						</div>
				</div>

				<button class="btn btn-primary" name="pin">设定</button>
			</form>
			
		</fieldset>
	</form>
</div>
<!--/span-->


 	</div>
</div>
<!--span-->
</div>
<!--/row-->



<div class="row-fluid">

<div class="box span6">
	<div class="box-header well" data-original-title>
		<h2>
			<i class="icon-envelope-alt "></i> 邮件列表
		</h2>
		<div class="pull-right">
		</div>
	</div>
	<div class="box-content">
		<table class="table table-condensed">
			<thead>
				<tr>
					<td>发送日期</td>
					<td>标题</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($send_mails as $mail) {
			?>
			<tr>
				<td><?php echo date('Y/m/d h:i:s' , $mail['date']);?></td>
				<td><a href="<?php echo base_url();?>index.php/marketing/view_email/<?php echo $mail['id']?>"><?php echo $mail['title'];?></a></td>
			</tr>
			<?php
			}?>
			</tbody>
		</table>

	</div>
</div>

<div class="box span6">
	<div class="box-header well" data-original-title>
		<h2>
			<i class="icon-comments-alt"></i> 沟通记录
		</h2>
	</div>
	<div class="box-content">
	<?php foreach ($connect_log as $log) {
	?>
	<dl class="inline box">
		<dt>&nbsp;&nbsp;<?php echo date('Y/m/d h:i ', $log['date']);?> &nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/marketing/linkup_remove/<?php echo $log['id'];?>"><i class="icon-remove"></i> 删除</a></dt>
		<dd> <?php echo htmlspecialchars( $log['response']);?></dd>
	</dl>
	<?php
	}?>
	</div>
</div>
</div>

<div class=" row-fluid">
<div class="box span6">
	<div class="box-header well">
		<h2>
			备忘记录
		</h2>
		<div class="box-icon">
		</div>
	</div>
	<div class="box-content">
		<?php foreach ($reminders as $remind) {
		?>
		<dl class="inline">
			<dt><?php echo date('Y/m/d' , $remind['date']);?></dt>
			<dl><?php echo $remind['reminder'];?></dl>
		</dl>
		<?php
		}?>
	</div>
</div>

<div class="box span6">
	<div class="box-header well">
		<h2>
			客户标签
		</h2>
		<div class="pull-right">
			<h5><a href="<?php echo base_url();?>index.php/marketing/client_tags">查看全部</a></h5>
		</div>
	</div>
	<div class="box-content">
		<div class="alert alert-info"><i class="icon-star-empty"></i> 为客户打上标签</div>
	
		<?php foreach ($tags as $key=>$tag) {
		?>
			<a href="<?php echo base_url();?>index.php/marketing/set_tag/<?php echo $profile['id'];?>/<?php echo $key;?>"><span class="label label-info"><?php echo $tag;?></span></a>
		<?php
		}?>


	</div>
</div>
</div>