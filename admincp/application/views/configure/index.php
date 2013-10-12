<table class="table table-bordered table-condensed">

	<?php foreach ($x as $z) { ?>

	<?php if(!$z) continue;?>
	<tr>
		<td><?php echo $z['uid'];?></td>

		<td><?php echo $z['email'];?></td>

		<td><?php echo $z['username'];?></td>

		<td><?php echo $z['realname'];?></td>

		<td><?php echo $z['gender'];?></td>

		<td><?php echo $z['mobile'];?></td>

		<td><?php echo $z['telephone'];?></td>
	</tr>

	<?php }?>


</table>