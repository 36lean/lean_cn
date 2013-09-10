<?php
$map = $this->config->config['map'];
?>

<form name="" action="" method="post">

<table class="table table-striped table-condensed">

<tr>
	<?php foreach ($config['contact'] as $key => $value) :?>
	<td>
		<?php echo $map['contacts'][$key];?>
	</td>
	<?php endforeach ?>

	<?php foreach ($config['company'] as $key => $value) :?>
	<td>
		<?php echo $map['company']['c_'.$key];?>
	</td>
	<?php endforeach ?>
</tr>

<?php foreach ($data as $input_id=>$contact) :?>

<tr>
	<?php foreach ($config['contact'] as $key => $value) :?>
	<td>
		<input class="span2" type="text" name="<?php echo $key;?>_<?php echo $input_id;?>" value="<?php echo $contact[$value]?>" />
	</td>
	<?php endforeach ?>

	<?php foreach ($config['company'] as $key => $value) :?>
	<td>
		<input class="span2" type="text" name="c_<?php echo $key;?>_<?php echo $input_id;?>" value="<?php echo $contact[$value]?>" />
	</td>
	<?php endforeach ?>

</tr>

<?php endforeach ?>
</table>


<div class="control-group">
<div class="controls">
<label><strong>分配给</strong></label>
<select name="assign_to">
		<option value="0">选择负责人</option>
	<?php foreach ($master as $u) :?>
		<option value="<?php echo $u['user_id'];?>"><?php echo $u['username'];?> - <?php echo $u['role_name'];?></option>
	<?php endforeach ?>
</select>
</div>
</div>


<div class="control-group">
<div class="controls">
<label><strong>客户分类</strong></label>
<select name="tag">
		<option value="0">选择客户类型</option>
	<?php foreach ($tags as $t) :?>
		<option value="<?php echo $t['id'];?>"><?php echo $t['tag'];?> - <?php echo $t['name'];?></option>
	<?php endforeach ?>
</select>
</div>
</div>

<div class="control-group">	
	<div class="controls">
		<button class="btn btn-primary" name="to_database" value="1">OK 添加到数据库</button>
	</div>
</div>
</form>