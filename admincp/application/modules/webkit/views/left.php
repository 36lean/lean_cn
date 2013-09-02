<ul class="nav nav-tabs">
    <?php foreach ($path as $p) : ?>
        
        <li <?php if( $this->uri->segment(2) === $p['route']) {?>class="active" <?php }?>>
            <a href="<?php echo site_url( $this->uri->segment(1) . '/' . $p['route']);?>"><?php echo $p['alias'];?></a>
        </li>

    <?php endforeach ;?>
</ul>