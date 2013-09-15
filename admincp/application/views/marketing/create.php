<div class="row-fluid">

	<div class="span6 well">
		<div class="page-header">
			<h4>添加客户档案</h4>
		</div>
		<div>

		<form name="" action="" method="post">
		<input type="hidden" name="form_type" value="contacts" />

		<?php foreach ($contact_column as $key=>$contact) :?>
			<div class="control-group">
			<label><strong><?php echo $contact;?></strong></label>
			<div class="controls">
				
				<?php if( $key === 'gender'){?>
					
					<label class="radio inline">
					<input type="radio" name="gender" value="1" />男
					</label>
					<label class="radio inline">
					<input type="radio" name="gender" value="0" />女
					</label>
				<?php }else{?>
				<input type="text" name="<?php echo $key;?>">
				<?php }?>
			</div>
			</div>
		<?php endforeach ?>

		<button class="btn btn-primary" name="create_profile" value="1">新增</button>
		</form>
		</div>
	</div>


	<div class="span6 well">
		<div class="page-header">
			<h4>添加企业档案</h4>
		</div>

		<form name="" action="" method="post">
		<input type="hidden" name="form_type" value="company" />
		<?php foreach ($company_column as $key=>$company) :?>
			<div class="control-group">
			<label><strong><?php echo $company;?></strong></label>
			<div class="controls">

				<input type="text" name="<?php echo $key;?>">

			</div>
			</div>
		<?php endforeach ?>
		<button class="btn btn-primary" name="create_profile" value="1">新增</button>
		</form>
	</div>
</div>