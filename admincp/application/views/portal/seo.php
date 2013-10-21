<a href="<?php echo site_url('portal/refresh');?>">刷新首页缓存</a>

<div class="container-fluid">
<div class="row-fluid">

<div class="span6">
<div class="page-header">
	<h4>首页中间焦点新闻设置<small>home_center</small></h4>
</div>

<form class="form-inline" action="" method="post">
	
	<div class="control-group">
		<label><strong>摆放位置</strong></label>
		<div class="controls">
		<select name="position">
			<option value="home_center">正中间</option>
			<option value="home_left">左中间</option>
		</select>
		</div>
	</div>

	<div class="control-group">
		<label><strong>输入新闻ID</strong></label> 
		<div class="controls">
			<input class="span12" id="article_id" name="center_article_id" type="text" />
			<a href="javascript:void(0);" class="popover-btn" data-toggle="popover" data-placement="bottom" data-content="" title="查看详细信息" style="display:none;">查看详细信息</a>
		</div>
	</div>

	<div class="control-group">
		<label><strong>新闻标题</strong></label> 
		<div class="controls">
			<input class="span12" id="article_title" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>新闻Banner配图</strong></label> 
		<div class="controls">
			<input class="span12" name="banner" type="text" />
		</div>
	</div>

	<div class="control-group">
		<label><strong>隐藏SEO文字（在页面上不显示 帮助SEO）</strong></label> 
		<div class="controls">
			<textarea class="span12" name="center_article_hidden"></textarea>
		</div>
	</div>

	<div class="control-group">

		<div class="controls">
			<button class="btn btn-primary" name="add_center_article" value="1">Add</button>
		</div>
	</div>
</form>
</div>

<div class="span6">
	<?php $this->load->module('webkit/photo_uploads/uploads');?>
</div>

</div>
</div>



<h3>当前设置</h3>
<div class="container-fluid">
<div class="row-fluid">
	<?php foreach ($articles as $key=>$article) { ?>
	<div class="span3">
		<ul style="border:1px solid #999;padding:20px;">
			<li>位置 : [ <strong><?php echo $article['position'];?></strong> ]</li>
			<li>标题 : <?php echo cutstr( $article['post_title'] , 25);?></li>
			<li>分类 : <?php echo $article['category_title'];?></li>
			<li>浏览量 : <?php echo $article['click'];?></li>
			<li><img src="<?php echo $article['banner'];?>" height="100px" /></li>
			<li>设置时间 : <?php echo date( 'Y-m-d h:i' , $article['timeupdated']);?></li>
			<li>操作: 
					<a href="<?php echo site_url('portal/edit_seo/'.$article['id']);?>">编辑</a> 
					<a href="<?php echo site_url('portal/remove_seo/'.$article['id']);?>">删除</a> 
			</li>
		</ul>
	</div>

	<?php if( ($key+1) % 4 === 0) {?>

	</div></div>
	<div class="container-fluid"><div class="row-fluid">

	<?php }?>

	<?php }?>
</div>
</div>

<script>
$( function () {

	$('.popover-btn').popover({'html' : true });

	$('#article_id').on('keyup' , function () {

		
		var id = $(this).val();

		$.ajax({
			url : '<?php echo site_url("portal/get_title_by_id");?>' , 
			type : 'POST' , 
			data : { 'id' : id } ,
			success : function( data ) {

				data = eval('('+data+')');

				$('#article_title').attr({'value' : data.post_title})

				$('.popover-btn').attr({'data-content' : '<p><span class="badge badge-info">标题</span> '+data.post_title+'</p><p><span class="badge badge-info">内容</span> '+ data.post_content +'</span></p><p><span class="badge badge-info">概括</span> '+data.post_summary+'</p>'});

				$('.popover-btn').css({'display' : 'block'});

			} ,

		});

	});

});
</script>