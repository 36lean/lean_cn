<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-edit">
				</i>
				手动添加一个客户资料
			</h2>
		</div>
		<div class="box-content">
			<?php if( Status::INSERT_SUCCESS === $status) {?>
			<div class="alert alert-info"><i class="icon-info-sign"></i><button type="button" class="close" data-dismiss="alert">&times;</button> 添加成功</div>
			<?php }else if( Status::INSERT_FAIL === $status){?>
			<div class="alert alert-important"><i class="icon-info-sign"></i><button type="button" class="close" data-dismiss="alert">&times;</button> 添加失败</div>
			<?php }?>
			<form class="form-horizontal" action="" method="post">
				<fieldset>
					<?php foreach ($column as $key=>
						$description) { ?>

						<div class="control-group">
							<label class="control-label" for="focusedInput">
								<?php echo $description?>
							</label>
							<div class="controls">
								<?php if( 'gender' === $key) {?>
								<select name="gender">
									<option value="男">男</option>
									<option value="女">女</option>
								</select>
								<?php }else{?>
								<input name="<?php echo $key;?>" class="input-xlarge :required" id="focusedInput"
								type="text">
								<?php }?>
							</div>
						</div>
						<?php }?>
							<div class="form-actions">
								<button name="create_client" type="submit" class="btn btn-primary">
									创建
								</button>
								<button class="btn">
									Cancel
								</button>
							</div>
				</fieldset>
			</form>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->