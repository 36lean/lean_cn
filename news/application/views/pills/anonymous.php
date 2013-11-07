<?php if( isset( $user_info)){

	var_dump( $user_info);
}?>


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

<div class="hero-unit">
<div class="context-body">
	<?php echo cutstr( strip_tags( $article['post_content'] ) , 200 , ' .. ' );?>
</div>
<br/>

<div class="alert alert-success">

	<h4>游客您好 : </h4>

	要阅读更多内容 请先<a href="./../member.php?mod=logging&action=login">登录或者注册</a>

</div>

</div>
<?php }?>