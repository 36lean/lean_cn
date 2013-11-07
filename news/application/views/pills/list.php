<?php foreach ($list as $article) { ?>

		<h4><a href="<?php echo site_url('pills/n/'.$article['id']);?>"><?php echo $article['post_title'];?></a></h4>
		<?php if( count( $article['tags'])){ ?>
		<p class="mot-author-sign">
			
			

			标签 : 

			<?php foreach ($article['tags'] as $tag){ ?>

			<a class="label label-info" href="<?php echo site_url('pills/tag/'.$tag['tagname']);?>"><?php echo $tag['tagname'];?></a>
			</p>
			<?php }
			}
			?>
		
		<hr/>
<?php }?>

<?php echo $this->load->module('webkit/pagination/show' , array($offset , $sum , $page ));?>