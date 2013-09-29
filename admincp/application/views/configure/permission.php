<div class="span3">
	<div class="page-header"><h4>添加权限</h4></div>
	<div class="well">
	<form action="" method="post">

		<div class="control-group">
			<div class="controls">
				<label><strong>分组名称</strong></label>
				<input name="name" type="text" />
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<label><strong>排列序号</strong></label>
				<input name="sortid" type="text" />
			</div>
		</div>

		<?php foreach ($modules as $mod) :?>
		<div class="control-group">
			<div class="controls">
				<label><strong><?php echo $mod['alias'];?></strong></label>
				<select name="<?php echo $mod['route'];?>">
					<option value="deny">禁止访问</option>
					<option value="allow">允许访问/修改</option>
					<option value="read">只能访问</option>
				</select>
			</div>
		</div>
		<?php endforeach ?>

		<button name="create_group" value="1" class="btn btn-primary">创建分组</button>

	</form>
	</div>

	<div class="page-header"><h4>删除权限</h4></div>

		<div class="well">

		<select name="<?php echo $user['id'];?>">

			<?php foreach ($groups as $group) :?>

				<option value="<?php echo $group['id'];?>"><?php echo $group['name'];?></option>

			<?php endforeach ?>

		</select>

		<button name="drop_group" value="1" class="btn btn-primary">删除分组</button>

		</div>

</div>


<div class="span6">
	
	<div class="page-header"><h4>管理权限</h4></div>

	<table class="table table-bordered table-consedens">
	
	<tr>
		<td>GroupName</td>
		<?php foreach ($modules as $mod) :?>
			<td><?php echo $mod['alias'];?></td>
		<?php endforeach ?>
	</tr>


	<?php foreach ($groups as $g) :?>
		<tr>
			<td><?php echo $g['name'];?></td>
			<?php foreach ($g['rule'] as $rule) :?>

			<td>
				<?php if( 'allow' === $rule){?>
				<span class="label label-success"><?php echo ucwords( $rule);?></span>
				<?php }else if( 'deny' === $rule) {?>
				<span class="label"><?php echo ucwords( $rule);?></span>
				<?php }else {?>
				<span class="label label-info"><?php echo ucwords( $rule);?></span>
				<?php }?>
			</td>
			<?php endforeach ?>
		</tr>

	<?php endforeach ?>
	</table>

	<div class="page-header"><h4>管理成员</h4></div>
	<form action="" method="post">
	<table class="table table-condensed">

		<?php foreach ($users as $user) :?>
			
			<tr>
				<td><?php echo $user['id'];?></td>
				<td><?php echo $user['username'];?></td>
				<td><?php echo $user['email'];?></td>
				<td>
					<select name="<?php echo $user['id'];?>">

						<?php foreach ($groups as $group) :?>

							<option <?php if( $group['id'] === $user['group_id']) {?>selected="selected"<?php }?>value="<?php echo $group['id'];?>"><?php echo $group['name'];?></option>

						<?php endforeach ?>

					</select>
				</td>
				<td><span class="label label-info"><?php echo $user['group_name'];?></span></td>
			</tr>

		<?php endforeach ?>

	</table>

	<button class="btn btn-primary" name="update_user_group" type="submit" value="1">保存设置</button>
	</form>
</div>

<div class="span3">

	<div class="page-header"><h4>添加后台登陆成员</h4></div>

	<div class="well">

		<ul>
			<li>从论坛账户添加</li>
		</ul>

		<form action="" method="post">

		<div class="control-group">
			<div class="controls">
				<label>
					<select name="key">
						<option value="uid">UID</option>
						<option value="email">E-mail</option>
						<option value="username">Username</option>
					</select>
				</label>
				<input name="value" type="text" />
			</div>
		</div>
		
		<button class="btn btn-primary" name="add_to_group" value="1">搜索并且添加</button>

		</form>

		<hr/>

		<ul>
			<li>创建一个新的ID</li>
		</ul>

		<form action="" method="post">

		<div class="control-group">
			<div class="controls">
				<label>
					账户
				</label>
				<input name="username" type="text" />
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<label>
					密码
				</label>
				<input name="password" type="text" />
			</div>
		</div>

		<button class="btn btn-primary" name="add_login_user" value="1">创建登陆账户</button>

		</form>

	</div>

</div>