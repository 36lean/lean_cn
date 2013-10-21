<?php if( $article['post_status'] != 1){?>

<script>
	window.location.href="<?php site_url();?>";
</script>

<?php } else {?>


<div id="<?php echo $article['post_title'];?>" class="hidden"></div>


<div class="context-body">
	<?php echo $article['post_content'];?>
</div>
<?php }?>
