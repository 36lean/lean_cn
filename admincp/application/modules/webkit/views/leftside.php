<ul class="nav nav-tabs">
    <?php foreach ($path as $p) : ?>
        
        <li <?php if( $this->uri->segment(2) === $p['route']) {?>class="active" <?php }?>>
            <?php if( $p['status'] === 'disabled') {?>

            <a href="#"><?php echo $p['alias'];?></a>

			<?php } else {?>
			
			<a href="<?php echo site_url( $this->uri->segment(1) . '/' . $p['route']);?>"><?php echo $p['alias'];?></a>

			<?php }?>
            
        </li>

    <?php endforeach ;?>
</ul>