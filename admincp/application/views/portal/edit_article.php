<div class="page-header">
	<h4>新闻编辑</h4>
</div>
<?php

$final = trim( htmlspecialchars( $article['post_summary']));

$article['post_summary'] = trim( preg_replace( '/(<input(.+)<\/script>)/is' , '' , $article['post_summary']) );

$meta = json_decode( $article['post_meta'] , true);

?>
<div class="row">
<div class="span6"></div>
<div class="span6">
<?php $this->load->module('webkit/photo_uploads/uploads');?>
</div>
</div>

<form action="" method="post">

	<input type="hidden" name="id" value="<?php echo $article['id'];?>">

	<div class="control-group">
		<div class="controls">
		
		<div class="row">
		<div class="span6">
			

	<div class="control-group">
		<div class="controls">
		<div class="row">
		<div class="span2">
			<label><strong>标题</strong></label>
		</div>
		<div class="span10">
			<input class="span6" name="post_title" value="<?php echo trim( strip_tags( $article['post_title'] ) );?>" type="text" />
		</div>
		</div>
		</div>
	</div>


	<div class="control-group">
		<div class="controls">
		<div class="row">
		<div class="span2">
			<label><strong>大纲/预览</strong></label>
		</div>
		<div class="span10">
			<textarea class="span6" name="post_summary" rows=3><?php echo $article['post_summary'];?></textarea>
		</div>
		</div>
		</div>
	</div>

	</div>

	<div class="span6">
			<div class="well">
			<label><strong>文字配图 (图片链接)</strong></label>
				<input class="span5" id="post_banner" type="text" name="post_banner" value="<?php echo $article['post_banner'];?>">
				<p><img src="<?php echo $article['post_banner'] ? $article['post_banner'] : base_url('public/mot/no_photo.png');?>" width="150px" /></p>
			</div>
		</div>

		</div>
	</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<div class="row">
				<div class="span6">
					<label><strong>正文</strong></label>
					<textarea class="kindeditor" name="post_content"><?php echo $article['post_content'];?></textarea>
				</div>

				<div class="span6">
					<label><strong>参考</strong></label>
					<textarea class="kindeditor"><?php echo $article['post_content'];?></textarea>
				</div>
			</div>
		</div>
	</div>


	<div class="control-group">
		<div class="controls">
		<div class="row">
		<div class="span1">
			<label><strong>标签</strong></label>
		</div>
		<div class="span11">
			<div class="well">
				<label>新增标签</label>
    				<div class="input-append">
    					<input class="span2" id="tag_name" type="text">
    					<button class="btn" id="add_tag" type="button">添加到标签库</button>
   	 				</div>

   	 			<label>给当前新闻增加标签</label>
   	 			<?php foreach ($tags as $tag) { ?>
   	 			<a class="tag_link" href="javascript:void(0);" id="<?php echo $tag['id'];?>">
   	 			<span class="label <?php if( in_array($tag['id'], $current_tag)){?>label-info<?php }?>">
   	 				<?php echo $tag['tagname'];?>
   	 			</span>
   	 			</a>
   	 			<?php }?>

			</div>
		</div>
		</div>
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<label><strong>英文长链接 (允许使用字母数字跟下划线)</strong></label>
		</div>
		<div class="span6">
			<input class="span6" name="post_titlelink" value="<?php echo $article['post_titlelink'];?>" type="text"  />
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<label><strong>Meta头关键字</strong></label>
		</div>

		<div class="span6">
			<input class="span6" name="keywords" value="<?php echo $meta['keywords'];?>" type="text" />
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<label><strong>Meta头描述</strong></label>
		</div>
		<div class="span6">
			<input class="span6" name="description" value="<?php echo $meta['description'];?>" type="text" />
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<label><strong>类别</strong></label>
		</div>

		<div class="span6">
			<select name="category">
				<?php foreach ($categories as $c) { ?>
				<option <?php if( $article['category'] == $c['id']){?>selected="selected"<?php }?> value="<?php echo $c['id'];?>"><?php echo $c['category_title'];?></option>
				<?php }?>
			</select>
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<label><strong>状态</strong></label>
		</div>
		<div class="span6">
			<select name="post_status">
				<option <?php if( $article['post_status'] == 1){?>selected="selected"<?php }?> value="1">发布</option>
				<option <?php if( $article['post_status'] == 2){?>selected="selected"<?php }?> value="2">关闭</option>
			</select>
		</div>

	</div>
	<div class="row">
		<div class="span6">
			<label><strong>转载自 (url链接)</strong></label>
		</div>
		<div class="span6">
			<input class="span6" name="post_from" value="<?php echo $article['post_from'];?>" type="text" />
		</div>
	</div>
 	

	<div class="row">
		<div class="span6">
			<label><strong>作者</strong></label>
		</div>
		<div class="span6">
			<input class="span6" name="post_author" value="<?php echo $article['post_author'] ? $article['post_author'] : '精企网';?>" type="text" />
		</div>
	</div>

	<button class="btn btn-primary" type="submit" name="create_news" value="1">更新新闻</button>

</form>



<script>
	$( function(){
		$('#post_banner').on('change' , function(){var val = $(this).val();$('img').attr({'src' : val});});

		$('a.tag_link').on('click' , function(){

			var id = $(this).attr('id');

			var article_id = <?php echo $article['id'];?>;

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