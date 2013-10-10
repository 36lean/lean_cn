
<div class="row-fluid">
<?php foreach ($category as $key=>$c ){ ?>

	<div class="span4">

		<div class="page-header">
			<h3><?php echo $c['category_title'];?> <small>更多</small></h3>
		</div>

		<ul class="relation strong">

			<?php foreach ($c['articles'] as $article) { ?>

				<li>
					
				<?php if( $article['post_titlelink']){?>
					<a href="<?php echo site_url('pills/n/'.$article['post_titlelink']);?>"><?php echo $article['post_title'];?></a>
				<?php }else {?>
					<a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?></a>
				<?php }?>
				 - <small><?php echo date('Y-m-d' , $article['post_modified']);?></small></li>
			
			<?php }?>
			

		</ul>

	</div>

	<?php if( ($key+1)%3 === 0 && $key !== 0){?>

	</div>
	<div class="row-fluid">
	<?php }?>


<?php }?>
</div>
