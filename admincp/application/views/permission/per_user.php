<div class="box-header well" data-original-title>
	<h2>
		<i class="icon-edit">
		</i>
		添加可以登陆后台的用户
	</h2>

</div>
<div class="box-content">
	<form class="form-horizontal" action="" method="post">
		<fieldset>
			<legend>
				把用户添加到后台管理名单
			</legend>
			<div class="control-group">
				<label class="control-label" for="typeahead">
					用户名或者邮箱
				</label>
				<div class="controls">
					<input name="username" type="text" class="span6" id="username">
					<p class="help-block">
						输入要添加的用户信息
					</p>
				</div>
			</div>
			<div class="form-actions">
				<button name="add_to_list" type="submit" class="btn btn-primary">
					添加到登陆列表
				</button>
				<button type="reset" class="btn">
					Cancel
				</button>
			</div>
		</fieldset>
	</form>
</div>


<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-user">
				</i>
				后台用户列表
			</h2>
		</div>
		<div class="box-content">

		
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>
							Username
						</th>						
						<th>
							Email
						</th>
						<th>
							Updated Date
						</th>
						<th>
							Role
						</th>
						<th>
							Set
						</th>
						<th>
							Actions
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($lists as $user) {?>

					<tr>
						<td>
							<?php echo $user['username'];?>
						</td>						
						<td>
							<?php echo $user['email'];?>
						</td>
						<td class="center">
							<?php echo date('Y/m/d' , $user['updated_date']);?>
						</td>
						<td class="center">
							<span class="label label-success">
								<?php echo $user['resource_id'] ? $user['role_name'] : 'Empty';?>
							</span>
						</td>
						<form action="" method="post">
						<input type="hidden" name="user_id" value="<?php echo $user['user_id']?>">
						<td class="center">
							<select name="resource_id">
								<option value=0>不分配</option>
								<?php foreach ($resource as $re) {
								?>
								<option value=<?php echo $re['id']?>><?php echo $re['name']?></option>
								<?php
								}?>
								
							</select>
						</td>
						<td class="center">
							<button name="save" class="btn btn-success" type="submit">
								<i class="icon-zoom-in icon-white">
								</i>
								保存
							</button>
							</form>
							<a class="btn btn-danger" href="<?php echo base_url();?>index.php/permission/del_user/<?php echo $user['user_id']?>">
								<i class="icon-trash icon-white">
								</i>
								踢除
							</a>
						</td>
					</tr>
				
				<?php }?>

				</tbody>
			</table>
			
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->