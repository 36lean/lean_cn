<ol>
<?php foreach ($articles as $id=>$article) { ?>
	
	<li class="mot-click-link"><a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo strip_tags( $article['post_title'] );?></a></li>

<?php }?>
</ol>