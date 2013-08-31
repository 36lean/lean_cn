<div class="row">
	<?php foreach ($apponintments as $ap) {
	?>
		
		<div class="span3">
		<ul class="nav nav-list">
			<li><a href=""><i class="icon-apple"></i> 客户 <?php echo $ap['name'];?></a></li>
			<li><a href=""><i class="icon-time"></i> <?php echo date(' Y / m / d ' , $ap['datereminded']);?></a></li>
			<li><a href=""><i class="icon-tasks"></i> <?php echo $ap['event'] ? $ap['event'] : '再次联系';?></a></li>
			<li>
				<a href="#"> <i class="icon-info-sign"></i> 
				<?php 
					if( $ap['datereminded'] > time()) { 
						echo '<span class="label label-success">还有'.floor( ( $ap['datereminded'] - time() ) / 86400).'天</span>'; 
					} 
					else if( date('Y/m/d') === date( 'Y/m/d' , $ap['datereminded'])) {
						echo '<span class="label label-important">今天</span>';
					}
					else {
						echo '<span class="label">已经过去' . floor( (time() - $ap['datereminded']) / 86400).'天</span>';
					} 
				?>

				</a>
			</li>

			<li><a href=""><i class="icon-remove"></i> 移除</a></li>
		</ul>
		</div>
		
	<?php
	}?>
</div>