<div class="page-header">

	<h3>修改企业资料</h3>

</div>


<form action="" method="post">
<div class="span3 well">

<input name="id" type="hidden" value="<?php echo $company['id'];?>" />

<div class="control-group">
	<label>企业名</label>
	<div class="controls">
		<input type="text" value="<?php echo $company['name'];?>" readonly="readonly" />
	</div>
</div>

<div class="control-group">
	<label>行业/领域</label>
	<div class="controls">
		<input type="text" name="industry" value="<?php echo $company['industry'];?>" />
	</div>
</div>

<div class="control-group">
	<label>电话</label>
	<div class="controls">
		<input type="text" name="phone" value="<?php echo $company['phone']?>" />
	</div>
</div>

<div class="control-group">
	<label>传真</label>
	<div class="controls">
		<input type="text" name="fax" value="<?php echo $company['fax']?>" />
	</div>
</div>

<div class="control-group">
	<label>E-mail</label>
	<div class="controls">
		<input type="text" name="email" value="<?php echo $company['email']?>" />
	</div>
</div>

<div class="control-group">
	<label>地址</label>
	<div class="controls">
		<input type="text" name="address" value="<?php echo $company['address']?>" />
	</div>
</div>

<div class="control-group">
	<label>邮编</label>
	<div class="controls">
		<input type="text" name="postid" value="<?php echo $company['postid']?>" />
	</div>
</div>

<div class="control-group">
	<label>营业额</label>
	<div class="controls">
		<input type="text" name="turnover" value="<?php echo $company['turnover']?>" />
	</div>
</div>

<div class="control-group">
	<label>雇员数量</label>
	<div class="controls">
		<input type="text" name="employee" value="<?php echo $company['employee']?>" />
	</div>
</div>

<div class="control-group">
	<label>官方网站</label>
	<div class="controls">
		<input type="text" name="weburl" value="<?php echo $company['weburl']?>" />
	</div>
</div>

<div class="control-group">
	<label>备注</label>
	<div class="controls">
		<textarea name="more"><?php echo $company['more']?></textarea>
	</div>
</div>

<div class="control-group">
	<div class="controls">
		<button class="btn btn-primary" name="update_company" type="submit
		" value="1">更新</button>
	</div>
</div>
</div>
</form>
