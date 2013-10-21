<ul class="nav nav-tabs">
	<?php foreach ($path as $p) : ?>

		<?php if( $user['resource'][$p['route']] === 'allow'){ ?>

		<li <?php if( $this->uri->segment(1) === $p['route']) {?>class="<?php echo $p['status'];?>" <?php }?>>
			<a href="<?php echo site_url($p['route'].'/index');?>"><?php echo $p['alias'];?></a>
		</li>

		<?php }?>

	<?php endforeach ;?>
</ul>