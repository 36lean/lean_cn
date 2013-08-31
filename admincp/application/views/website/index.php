<div class="box-content">
	<?php
	if( Status::RECORD_EXIST === $status) {
	?>
	<div class="alert alert-error"><i class="icon-remove"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>静态页面的路径已经存在 添加失败!</div>
	<?php
	}else if ( Status::INSERT_SUCCESS === $status) {
	?>
	<div class="alert alert-success"><i class="icon-ok"></i> <button type="button" class="close" data-dismiss="alert">&times;</button> 静态页面添加成功!</div>
	<?php
	}
	?>
	<form class="form-horizontal" action="" method="post">
		<fieldset>
			<legend>
				创建一个静态页面 ( 关于我们,联系我们,广告合作等页面 )
			</legend>
			<div class="control-group">
				<label class="control-label" for="typeahead">
					页面名字
				</label>
				<div class="controls">
					<input name="pagename" type="text" class="span6 typeahead" id="typeahead"
					data-provide="typeahead" data-items="4" data-source='["联系我们","合作","广告","商机","关于我们","招聘","开发","外包","等等","未分类","mot"]'>
					<p class="help-block">
						Start typing to activate auto complete!
					</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="typeahead">
					路径
				</label>
				<div class="controls">
					<input name="pagepath" type="text" class="span6" id="typeahead">
					<p class="help-block">
						访客访问路径 例如填入"cooperation" 则通过 http://host/read.php?title=cooperation 访问
					</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="date01">
					有效期到
				</label>
				<div class="controls">
					<input name="timeup" type="text" class="input-xlarge datepicker" id="date01"
					value="07/02/22">
					<p class="help-block">
						Pages are cleaned when time's up!
					</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="textarea2">
					设计好的HTML代码
				</label>
				<div class="controls">
					<textarea name="htmlcode" class="span12" id="textarea2" rows=7 cols=20>
					</textarea>
				</div>
			</div>
			<div class="form-actions">
				<button name="create" type="submit" class="btn btn-primary">
					创建页面
				</button>
				<button name="reset" type="reset" class="btn">
					Cancel
				</button>
			</div>
		</fieldset>
	</form>
</div>