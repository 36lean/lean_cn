<div class="row">
<div class="span6">

	<div class="page-header">
		<h4>添加新闻</h4>
	</div>

	<form action="" method="post">

	<div class="control-group">
		<label><strong>标题</strong></label>
		<div class="controls">
			<input class="span6" name="post_title" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>大纲/预览</strong></label>
		<div class="controls">
			<textarea class="shorttext" name="post_summary"></textarea>
		</div>
	</div>

	<div class="control-group">
		<label><strong>转载自 (url链接)</strong></label>
		<div class="controls">
			<input class="span6" name="post_from" type="text" />
		</div>
	</div>
 	

	<div class="control-group">
		<label><strong>作者</strong></label>
		<div class="controls">
			<input class="span6" name="post_author" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>正文</strong></label>
		<div class="controls">
			<textarea class="longtext" name="post_content"></textarea>
		</div>
	</div>

	<div class="control-group">
		<label><strong>TitleLink</strong></label>
		<div class="controls">
			<input class="span6" name="post_titlelink" type="text" placeholder="This-is-a-post-about-money => http://host/post/This-is-a-post-about-money" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>Meta Keywords</strong></label>
		<div class="controls">
			<input class="span6" name="keywords" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>Meta Description</strong></label>
		<div class="controls">
			<input class="span6" name="description" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>类别</strong></label>
		<div class="controls">
			<select name="category">
				<?php foreach ($categories as $c) { ?>
				<option value="<?php echo $c['id'];?>"><?php echo $c['category_title'];?></option>
				<?php }?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label><strong>状态</strong></label>
		<div class="controls">
			<select name="post_status">
				<option value="1">发布</option>
				<option value="2">关闭</option>
			</select>
		</div>

	</div>

	<button class="btn btn-primary" type="submit" name="create_news" value="1">创建新闻</button>

	</form>

</div>


<div class="span6">

	<div class="page-header">
		<h4>添加分类</h4>
	</div>

	<div class="well">
	<form action="" method="post">
	<div class="control-group">
		<label>分类</label>
		<div class="controls">
			<input class="span5" name="category_title" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label>分类介绍性内容</label>
		<div class="controls">
			<textarea class="shorttext" name="summary" rows=5></textarea>
		</div>
	</div>

	<div class="control-group">
		<label>TitleLink</label>
		<div class="controls">
			<input class="span5" name="category_link" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label>分类列表Keywords</label>
		<div class="controls">
			<textarea class="span5" name="keywords" rows=5></textarea>
		</div>
	</div>


	<div class="control-group">
		<label>分类列表Description</label>
		<div class="controls">
			<textarea class="span5" name="description" rows=5></textarea>
		</div>
	</div>

	<button class="btn btn-primary" name="create_category" value="1">创建分类列表页</button>

	</form>

</div>

</div>