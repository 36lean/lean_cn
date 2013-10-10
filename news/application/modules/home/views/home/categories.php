<div class="list-group">
 	<?php foreach ($categories as $category) {?>
		<a href="<?php echo site_url('pills/article_list/'.$category['id']);?>" class="list-group-item"><?php echo $category['category_title'];?></a>
 	 <?php }?>
</div>