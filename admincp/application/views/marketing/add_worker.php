<?php
$ci = & get_instance();
?>

<div class="row-fluid">

<div class="span6 well">

	<div class="page-header"><h4>创建一个新的客户档案</h4></div>

	<form action="" method="post">
	<input type="hidden" name="assign_to" value="<?php echo $ci->_G['uid'];?>" />
	<input type="hidden" name="company_id" value="<?php echo $company_id;?>" />

	<div class="control-group">
		<label>类型</label>
		<div class="controls">
			<select name="tag">
				<?php foreach ($tags as $tag) : ?>
					<option value="<?php echo $tag['id'];?>"><?php echo $tag['tag'].' - '.$tag['name'];?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 名字</label>
		<div class="controls">
			<input name="name" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - Email</label>
		<div class="controls">
			<input name="email" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 工作/职位</label>
		<div class="controls">
			<input name="job" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 年龄</label>
		<div class="controls">
			<input name="age" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 性别</label>
		<div class="controls">
			<label class="radio inline">
					<input type="radio" name="gender" value="1" />男
			</label>
			<label class="radio inline">
					<input type="radio" name="gender" value="0" />女
			</label>
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 办公电话</label>
		<div class="controls">
			<input name="office_phone" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 办公传真</label>
		<div class="controls">
			<input name="office_fax" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 私人电话</label>
		<div class="controls">
			<input name="private_phone" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 手机号</label>
		<div class="controls">
			<input name="mobile" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - QQ号</label>
		<div class="controls">
			<input name="qq" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		<label>个人 - 描述/备注</label>
		<div class="controls">
			<input name="description" value="" type="text">
		</div>
	</div>

	<div class="control-group">
		
		<div class="controls">
			<button class="btn btn-primary" name="create_contact_by_company" value="1">创建资料</button>
		</div>
	</div>
</form>
</div>




<div class="span6 well">
	<div class="page-header"><h4>从数据库中选择已有的客户</h4></div>

</div>





</div>