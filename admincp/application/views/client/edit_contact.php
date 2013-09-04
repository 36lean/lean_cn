<pre>
<?php var_dump( $profile);?>
</pre>



<form class="form-horizontal">

<div class="span3">
	<div class="control-group">
		<label class="control-label">客户名字</label>
		<div class="controls">
			<input type="text" name="name" value="<?php echo $profile['name'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">年龄</label>
		<div class="controls">
			<input type="text" name="age" value="<?php echo $profile['age'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">年龄</label>
		<div class="controls">
			<input type="text" name="gender" value="<?php echo $profile['gender'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">职位</label>
		<div class="controls">
			<input type="text" name="position" value="<?php echo $profile['position'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<input type="text" name="email" value="<?php echo $profile['email'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">手机</label>
		<div class="controls">
			<input type="text" name="mobile" value="<?php echo $profile['mobile'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">电话</label>
		<div class="controls">
			<input type="text" name="phone" value="<?php echo $profile['phone'];?>" />
		</div>
	</div>
</div>

<div class="span3">
	<div class="control-group">
		<label class="control-label">传真</label>
		<div class="controls">
			<input type="text" name="fax" value="<?php echo $profile['fax'];?>" />
		</div>
	</div>
</div>


<div class="span3">
	<div class="control-group">
		<label class="control-label">QQ</label>
		<div class="controls">
			<input type="text" name="qq" value="<?php echo $profile['qq'];?>" />
		</div>
	</div>
</div>
</form>

