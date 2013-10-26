<ul class="nav nav-tabs">
   	<li <?php if( !$old_category){?>class="active"<?php }?>><a href="#tab1" data-toggle="tab">创建新闻</a></li>
    <li <?php if( $old_category){?>class="active"<?php }?>><a href="#tab2" data-toggle="tab">创建分类</a></li>
</ul>



<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
<div class="tab-pane  <?php if( !$old_category){?>active<?php }?> container" id="tab1">
	<div class="page-header">
		<h4>添加新闻</h4>
	</div>

	<form action="" method="post">

	<div class="row">
		<div class="span2">
			<label class="control-label"><strong>标题</strong></label>
		</div>

		<div class="span10">
			<input class="span6" name="post_title" type="text" />
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>大纲/预览</strong></label>
		</div>

		<div class="span10">
			<textarea class="span6" name="post_summary"></textarea>
		</div>
	</div>

	<div class="control-group">
		<label><strong>正文</strong></label>
		<div class="controls">
			<textarea class="kindeditor" name="post_content"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>文字配图 (图片链接)</strong></label>
		</div>
		<div class="span10">
			<input class="span6" type="text" name="post_banner"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>TitleLink</strong></label>
		</div>

		<div class="span10">
			<input class="span6" name="post_titlelink" type="text" placeholder="This-is-a-post-about-money => http://host/post/This-is-a-post-about-money" />
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>Meta Keywords</strong></label>
		</div>
		<div class="span10">
			<input class="span6" name="keywords" type="text" />
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>Meta Description</strong></label>
		</div>
		<div class="span10">
			<input class="span6" name="description" type="text" />
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>类别</strong></label>
		</div>
		<div class="span10">
			<select name="category">
				<?php foreach ($categories as $c) { ?>
				<option value="<?php echo $c['id'];?>"><?php echo $c['category_title'];?></option>
				<?php }?>
			</select>
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label><strong>状态</strong></label>
		</div>

		<div class="span10">
			<select name="post_status">
				<option value="1">发布</option>
				<option value="2">关闭</option>
			</select>
		</div>

	</div>

	<div class="row">
		
		<div class="span2">
			<label><strong>标签</strong></label>
		</div>

		<div class="span10">
			<div class="hero-unit">
				
				<label>新增标签</label>
    			<div class="input-append">
    				<input class="span2" id="tag_name" type="text">
    				<button class="btn" id="add_tag" type="button">添加到标签库</button>
   	 			</div>

   	 			<label>给当前创建的新闻增加标签</label>
				<?php foreach ($tags as $t) { ?>
					<a class="tag_link" href="javascript:void(0);"  id="<?php echo $t['id'];?>">
					<span class="label <?php if( in_array($t['id'], $current_tag)){?>label-info<?php }?>"><?php echo $t['tagname'];?></span>
					</a>
				<?php }?>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="span2">
			<label><strong>转载自 (url链接)</strong></label>
		</div>
		
		<div class="span10">
			<input class="span6" name="post_from" type="text" />
		</div>
	</div>
 	
	<div class="row">
		<div class="span2">
			<label><strong>作者</strong></label>
		</div>
		<div class="span10">
			<input class="span6" name="post_author" value="精企网" type="text" />
		</div>
	</div>
	<button class="btn btn-primary" type="submit" name="create_news" value="1">创建新闻</button>

	</form>                  
</div>
<script>
$( function(){

		$('a.tag_link').on('click' , function(){

			var id = $(this).attr('id');

			var article_id = 0;

			$object = $(this).children('span');

			$.ajax( {

				url : "<?php echo site_url('portal/add_tag_for_article');?>" , 
				data : { 'tag_id' : id , 'article_id' : article_id } ,
				type : 'POST' ,
				success : function( data ){
					if( '1' === data)
					{
						$object.addClass('label-info');
					}else if( '2' === data)
					{
						$object.removeClass('label-info');
					}
				} ,
			});
		});


		$('#add_tag').on('click' , function() {

			$('#tips').remove();

			$button = $(this);

			var tag_str = $('#tag_name').val();

			$.ajax( {
				url : "<?php echo site_url('portal/add_tag_for_library');?>" , 
				data : { 'tag_name' : tag_str } , 
				type : 'POST' , 
				success : function( data ){
					if( '1' === data){
						$('span.label').last().after('<span class="label">'+tag_str+'</label>')
					}else  if( '2' === data )
					{
						$button.after('<p id="tips"><span class="label label-success">标签存在</span></p>');
					}
				},

			} );

		});
				
});
</script>



<div class="tab-pane <?php if( $old_category){?>active<?php }?> container" id="tab2">
	<div class="page-header">
		<h4>管理分类</h4>
	</div>

	<table class="table table-bordered table-condensed">


		<?php foreach ($categories as $category) { ?>
		<tr>
			<td><a href="#"><?php echo $category['category_title'];?></a></td>
			<td><a href="<?php echo site_url('portal/index/category/'.$category['id'])?>">修改</a></td>
			<td><a href="<?php echo site_url('portal/category_remove/'.$category['id'])?>">删除</a></td>
		</tr>
		<?php }?>
	
	</table>

	<?php if( isset( $old_category['id'])) {?>
	<div class="page-header">
		<h4>修改分类</h4>
	</div>
	<?php }else{?>
	<div class="page-header">
		<h4>添加分类</h4>
	</div>
	<?php }?>


	<form action="" method="post">

	<?php if( isset( $old_category['id'])) {?>
	<input type="hidden" name="id" value="<?php echo $old_category['id'];?>" />
	<?php }?>
	<div class="row">
		<div class="span2">
		<label>分类</label>
		</div>
		<div class="span10">
			<input class="span5" name="category_title" type="text" value="<?php if( isset( $old_category['category_title'])) { echo $old_category['category_title']; }?>" />
		</div>
	</div>

	<div class="control-group">
			<label>分类介绍性内容</label>

		<div class="controls">
			<textarea class="kindeditor" name="summary" rows=5><?php if( isset( $old_category['summary'])) { echo $old_category['summary']; }?></textarea>
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label>TitleLink</label>
		</div>
		<div class="span10">
			<input class="span5" name="category_link" type="text" value="<?php if( isset( $old_category['category_link'])) { echo $old_category['category_link']; }?>" />
		</div>
	</div>

	<div class="row">
		<div class="span2">
			<label>分类列表Keywords</label>
		</div>
		<div class="span10">
			<textarea class="span5" name="keywords" rows=5><?php if( isset( $old_category['keywords'])) { echo $old_category['keywords']; }?></textarea>
		</div>
	</div>


	<div class="row">
		<div class="span2">
			<label>分类列表Description</label>
		</div>
		<div class="span10">
			<textarea class="span5" name="description" rows=5><?php if( isset( $old_category['description'])) { echo $old_category['description']; }?></textarea>
		</div>
	</div>

	<?php if( isset( $old_category['category_title'])) {?>
	<button class="btn btn-primary" name="create_category" value="1">更新分类列表页</button>
	<?php } else {?>
	<button class="btn btn-primary" name="create_category" value="1">创建分类列表页</button>
	<?php }?>

	</form>

	</div>


</div>
