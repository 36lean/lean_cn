<?php foreach ($articles as $article) { ?>

<div class="container-fluid mot-info">
<div class="row-fluid">
	<div class="span2">
		<a class="thumbnail" href="<?php echo site_url('pills/n/'.$article['id']);?>">
		<img src="<?php echo $article['post_banner'] ? $article['post_banner'] : base_url('public/mot/no_photo.png') ;?>">
		</a>
	</div>

	<div class="span10">

		<h3><a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?></a></h3>

		<small><?php echo trim( cutstr( strip_tags( $article['post_content']) , 350 , ' ... ' ));?>
		</small>

		<p class="mot-author-sign">
			<?php 
			if( count( $article['tags'])){ ?>

			标签 : 

			<?php foreach ($article['tags'] as $tag){ ?>

			<a class="label label-info" href="<?php echo site_url('pills/tag/'.$tag['tagname']);?>"><?php echo $tag['tagname'];?></a>

			<?php }
			}
			?>
		</p>

		<p class="text-right mot-author-sign"><span class="label label-info"><?php echo $article['post_author'] ? $article['post_author'] : '精企网';?></span> <small><strong>发布于 <?php echo strlen( $article['post_modified']) === 10 ? date( 'Y-m-d' , $article['post_modified']) : '最近几天';?></strong></small></p>
	</div>
</div>
</div>
<?php }?>

<?php echo $this->load->module('webkit/pagination/show' , array($offset , $sum , $page ));?>