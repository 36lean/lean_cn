<?php foreach ($list as $article) { ?>
<div class="row-fluid article-line">
	<div class="span2">
		<a class="thumbnail" href="<?php echo site_url('pills/n/'.$article['id']);?>">
		<img src="<?php echo $article['post_banner'] ? $article['post_banner'] : base_url('public/mot/no_photo.png') ;?>">
		</a>
	</div>

	<div class="span10">
		
		<h3><a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?></a></h3>

		<small><?php echo cutstr( trim( strip_tags( $article['post_content'] )) , 200 );?>
		</small>

		<p class="text-right"><?php echo $article['post_author'] ? $article['post_author'] : '匿名';?> 发布于 <?php echo date( 'Y-m-d' , $article['post_modified']);?></p>

	</div>
</div>
<?php }?>

<?php echo $this->load->module('webkit/pagination/show' , array($offset , $sum , $page ));?>

<script>
	jQuery(function() {
		jQuery('.article-line').on('mouseover' , function (){
			jQuery(this).addClass('article-line-hover');
		});

		jQuery('.article-line').on('mouseout' , function() {
			jQuery(this).removeClass('article-line-hover');
		});
	});
</script>