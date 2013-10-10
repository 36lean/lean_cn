<?php foreach ($articles as $article) { ?>

<?php if( !$article) continue;?>
<div class="left_module">
	<h4><a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?></a></h4>
	<div class="">
		<a class="span4 link_photo" href="<?php echo site_url('pills/n/'.$article['id']);?>"><img src="<?php echo $article['banner'];?>" /></a>
		<?php echo trim( cutstr( strip_tags( $article['post_content']) , 400 , ' .. '));?>
	</div>
	<hr/>
	<h5>相关新闻</h5>
	<ul class="relation">
		<?php foreach ($article['relations'] as $relation) { ?>
			<li><a href="<?php echo site_url('pills/n/'.$relation['id']);?>"><?php echo $relation['post_title'];?></a></li>
		<?php }?>
		
	</ul>
</div>
<?php }?>