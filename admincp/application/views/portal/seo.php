
<div class="span8">
<div class="page-header">
	<h4>首页中间焦点新闻设置<small>home_center</small></h4>
</div>

<form class="form-inline" action="" method="post">
	<input type="hidden" name="position" value="home_center">
	<div class="control-group">
		<label><strong>输入新闻ID</strong></label> 
		<div class="controls">
			<input name="center_article_id" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>新闻Banner配图</strong></label> 
		<div class="controls">
			<input name="banner" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>隐藏SEO文字（在页面上不显示 帮助SEO）</strong></label> 
		<div class="controls">
			<textarea class="shorttext" name="center_article_hidden"></textarea>
		</div>
	</div>

	<div class="control-group">

		<div class="controls">
			<button class="btn btn-primary" name="add_center_article" value="1">Add</button>
		</div>
	</div>
</form>


<hr />



<div class="page-header">
	<h4>首页左侧焦点新闻设置 <small>home_left</small></h4>
</div>

<form class="form-inline" action="" method="post">
	<input type="hidden" name="position" value="home_left">
	<div class="control-group">
		<label><strong>输入新闻ID</strong></label> 
		<div class="controls">
			<input name="article_id" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>新闻Banner配图</strong></label> 
		<div class="controls">
			<input name="banner" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>隐藏SEO文字（在页面上不显示 帮助SEO）</strong></label> 
		<div class="controls">
			<textarea class="shorttext" name="article_hidden"></textarea>
		</div>
	</div>

	<div class="control-group">

		<div class="controls">
			<button class="btn btn-primary" name="add_left_article" value="1">Add</button>
		</div>
	</div>

</form>


</div>









<div class="span4">
	<h3>当前设置</h3>
	<?php foreach ($articles as $article) { ?>


		<div class="alert alert-info text-center">
			<p>位置 : [ <strong><?php echo $article['position'];?></strong> ]</p>
			<p>标题 : <?php echo cutstr( $article['post_title'] , 40);?></p>
			<p>分类 : <?php echo $article['category_title'];?></p>
			<p>浏览量 : <?php echo $article['click'];?></p>
			<p><img src="<?php echo $article['banner'];?>" width="200px" /></p>
			<p>设置时间 : <?php echo date( 'Y-m-d h:i' , $article['timeupdated']);?></p>
			<p>操作: <a href="">编辑</a> <a href="#">删除</a> </p>
		</div>


	<?php }?>
</div>