<?php foreach ($list as $key => $articles) {?>

<?php if( !is_array($article)) continue;?>

<div class="row-fluid">

	<div class="span3">
		<h3 class="text-center"><a href="<?php echo site_url('pills/t/'.$key);?>"><?php echo date('Y-m-d' , $key);?></a></h3>
	</div>

	<div class="span9">

		<blockquote>

			<?php foreach ($articles as $article) { ?>
				
				<a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?> <small class="text-right"> - <?php echo $article['category_title'] ? $article['category_title'] : '未分类';?> </small></a>

			<?php }?>

		</blockquote>


	</div>

</div>


<?php }?>
