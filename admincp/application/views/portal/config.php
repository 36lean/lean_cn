<?php if( $save_words > 0){?>
	<div class="alert alert-info">收录了 <?php echo $save_words;?> 个关键字</div>
<?php }?>

<div class="page-header">
	<h4>文章/新闻标签</h4>
</div>
<form class="form-inline" action="" method="post">

	<input name="tag" type="text" />
	<button class="btn btn-primary" name="add_tag" value="1">Add Tag</button>

</form>

<hr/>

<?php foreach ($tags as $tag) {?>

	<span class="label label-info"><?php echo $tag['tagname'];?></span>

<?php }?>

<div class="page-header">
	<h4>keywords收录 <small>多个词条空格隔开</small></h4>
</div>

<a href="http://tools.dedecms.com/word_segment.html">在线长句分词</a>

<a href="<?php echo site_url('portal/word_manage');?>">关键字管理</a>

<form action="" method="post">

	<textarea name="word_list" class="span12" rows=4></textarea>

	<button class="btn btn-primary" name="save" value="1">保存</button>
</form>