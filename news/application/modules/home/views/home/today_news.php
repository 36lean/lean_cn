<div class="col-md-6">
<ul class="list-group">
<?php foreach ($article_list as $key => $article) { ?>
	

	<li class="list-group-item"><a href="<?php echo site_url('pills/n/'.$article['id']);?>" title="<?php echo $article['post_title'];?>"><?php echo cutstr( $article['post_title'] , 32 , '<small class="pull-right">'.date('Y-m-d' , $article['post_modified']).'</small>' );?></a></li>

	<?php if( $key === 8){?>	
	</ul></div>
	<div class="col-md-6">
	<ul class="list-group">
	<?php }?>
	
<?php }?>
</ul>
</div>

<p class="text-right"><a href="">更多</a></p>
