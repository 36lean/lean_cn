<div class="row-fluid">
<div class="box">
<div class="box-content">
	<h2>创建新闻</h2>
	<?php if( isset( $news_success)) {?>
		<div class="alert alert-info"><i class="icon-info-sign"></i> 新闻添加成功</div>
	<?php }?>
	<form class="form-horizontal" actio="" method="post">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="focusedInput">
					新闻标题
				</label>
				<div class="controls">
					<input name="contenttitle" class="span10 focused" id="focusedInput" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">
					关键字
				</label>
				<div class="controls">
					<input name="keyword" class="span10 focused" id="focusedInput" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">
					作者/转载者
				</label>
				<div class="controls">
					<input name="author" class="span10 focused" id="focusedInput" type="text" value="" placeholder="36lean_editor">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="focusedInput">
					推荐
				</label>
				<div class="controls">
					<select name="level">
						<option value="0">无</option>
						<option value="1">热门新闻</option>
						<option value="2">头条新闻</option>
						<option value="3">用户推荐</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="textarea2">正文</label>
				<div class="controls">
					<textarea name="contentbody" class="cleditor" id="textarea2" rows="5"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="textarea2">类型</label>
				<div class="controls">
					<label class="radio"><input name="form" type="radio" checked value=1 /> 原创</label>
					<label class="radio"><input name="form" type="radio" value=2 /> 转载</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="textarea2">分组</label>
				<div class="controls">
					<select name="category">
					<?php foreach ($category as $c) {
					?>
						<option value=<?php echo $c['id'];?>><?php echo $c['title'];?></option>
					<?php
					}?>
						
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="textarea2">封面图片</label>
				<div class="controls">
					<input name="banner" class="span10 focused" id="focusedInput" type="text" value="" placeholder="http://www.texindex.com.cn/upload/file/2006314173315151.jpg">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="textarea2">发布内容</label>
				<div class="controls">
					<button name="post" type="submit" class="btn btn-primary">发布</button>
				</div>
			</div>

		</fieldset>
	</form>
</div>
</div>
</div>

<div class="row-fluid">
<div class="box">
<div class="box-content">
	<h2>创建栏目</h2>
	<?php if( isset( $item_success)) {?>
		<div class="alert alert-info"><i class="icon-info-sign"></i> 栏目添加成功</div>
	<?php }?>
	<form class="form-horizontal" actio="" method="post">
			<div class="control-group">
				<label class="control-label" for="focusedInput">
					栏目序号
				</label>
				<div class="controls">
					<input name="sortid" class="span10 focused" id="focusedInput" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">
					栏目标题
				</label>
				<div class="controls">
					<input name="title" class="span10 focused" id="focusedInput" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="textarea2">栏目信息</label>
				<div class="controls">
					<textarea name="information" class="cleditor" id="textarea2" rows="5"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="textarea2">发布内容</label>
				<div class="controls">
					<button name="create" type="submit" class="btn btn-primary">创建</button>
				</div>
			</div>
	</form>

</div>
</div>
</div>