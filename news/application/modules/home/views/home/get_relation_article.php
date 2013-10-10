<div class="page-header">
	<h3>相关新闻</h3>
</div>

<div class="row-fluid">
<div class="span4">
	<ul class="relation">

	<?php foreach ($list as $key => $article) {?>

		<li><a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?> <small><?php echo date( 'Y-m-d' , $article['post_modified']);?></small></a></li>

		<?php if( $key === 5 || $key === 11){?>
	</ul>
</div>
<div class="span4">
	<ul class="relation">
		<?php }?>
	<?php }?>
	</ul>
</div>
</div>