<?php if( $article['post_status'] != 1){?>

<script>
	window.location.href="<?php site_url();?>";
</script>

<?php } else {?>

<?php if( isset( $article['banner'] ) ){?>
<p class="text-center">
	<img src="<?php echo $article['banner'];?>"> />
</p>
<?php }?>

<div id="<?php echo  trim( strip_tags( $article['post_title']) );?>" class="hidden"></div>


<div class="context-body">
	<?php echo $article['post_content'];?>
</div>
<?php }?>