<form name="" action="" method="post">
<input name="id" type="hidden" value="<?php echo $page['id']?>">
<input name="path" type="hidden" value="<?php echo $page['path']?>">
	<div class="control-group">
		<label class="control-label" for="date01">
			页面名字
		</label>
		<div class="controls">
		<input name="pagename" type="text" value="<?php echo $page['pagename'];?>">
		</div>
	</div>


	<div class="control-group">
		<label class="control-label" for="date01">
			HTML内容
		</label>
		<div class="controls">

		<textarea name="html" class="kindeditor" rows=10><?php echo file_get_contents( '../pages/'.$page[ 'path']. '.html'); ?></textarea>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="date01">
			有效期到
		</label>
		<div class="controls">
			<input name="timeup" type="text" class="input-xlarge datepicker" id="date01"
			value="<?php echo date('m/d/Y' , $page['timeup']);?>">
			<p class="help-block">
				Pages are cleaned when time's up!
			</p>
		</div>
	</div>
	<div class="form-actions">
		<button name="save" type="submit" class="btn btn-primary">Save</button>
		<button name="reset" type="reset" class="btn">Cancel</button>
	</div>
</form>