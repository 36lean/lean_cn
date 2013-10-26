<a href="<?php echo site_url('pills/n/'.$article['id']);?>">
	<h3 class="text-center"><?php echo $article['post_title'];?></h3>
</a>

<a href="<?php echo site_url('pills/n/'.$article['id']);?>" class="thumbnail">
	<img src="<?php echo $article['banner'];?>" />
</a>
<div style="display:none;">
	<?php echo $article['seo_text'];?>
</div>

<br/>

<div class="alert alert-info">
关注精企网微信公众账号 ( go36lean ),获取精选文章推送. 
</div>

<hr/>

<?php foreach ($article_list as $art) { ?>
	<div class="row-fluid">
	<div class="span12">
	<h4><a href="<?php echo site_url('pills/n/'.$art['id']);?>"><?php echo $art['post_title'];?></a></h4>
	<div class="mot-info">
		<img class="span3 link_photo" src="<?php echo $art['post_banner'] ? $art['post_banner'] : base_url('public/mot/no_photo.png') ;?>">
		<p><?php echo cutstr( strip_tags( $art['post_content'] ) , 500 , ' ... ' );?></p>
		<p class="text-right"><a href="<?php echo site_url('pills/n/'.$art['id']);?>">继续阅读 »</a></p>
	</div>
	</div>
	</div>
<?php }?>


<?php if( false){?>
<div class="row-fluid">
<div class="span6">
	<ul class="relation">
	<?php foreach ($relations as $key=>$re) {?>
		<li><a href="<?php echo site_url('pills/n/'.$re['id']);?>" title="<?php echo strip_tags( $re['post_title'] );?>"><?php echo strip_tags( $re['post_title'] );?></a> <small class="text-right"><?php echo date('Y-m-d' , $re['post_modified'])?></small></li>
		<?php if( $key === 7){?>
	</ul>
	</div>
	<div class="span6">
	<ul class="relation">
		<?php }?>

	<?php }?>
	</ul>

</div>
</div>
<?php }?>