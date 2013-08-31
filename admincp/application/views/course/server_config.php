<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> 一些配置信息</h2>
		</div>

<div class="box-content">
	<form class="form-horizontal">
		<fieldset>
		  <div class="control-group">
			<label class="control-label" for="videourl">PC版视频服务器地址</label>
			<div class="controls">
			  <div class="input-prepend">
				<span class="add-on"><i class="icon-desktop"></i></span>
				<input id="videourl" name="videourl" value="<?php echo $config['videourl'];?>" type="text">
			  </div>
			  <p class="help-block">Here's some help text</p>
			</div>
		  </div>


		  <div class="control-group">
			<label class="control-label" for="mobileurl">移动视频服务器地址</label>
			<div class="controls">
			  <div class="input-prepend">
				<span class="add-on"><i class="icon-mobile-phone"></i></span>
				<input id="mobileurl" name="mobileurl" value="<?php echo $config['mobileurl'];?>" type="text">
			  </div>
			  <p class="help-block">Here's some help text</p>
			</div>
		  </div>

		  <div class="control-group">
		  	<div class="controls">
				<button class="btn btn-primary btn-large" type="submit"><i class="icon-save"></i> 保存修改</button>
		  	</div>
		  </div>

		</fieldset>

	</form>
</div>
</div></div>