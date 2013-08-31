<?php
$ci = & get_instance();
?>

<table class="table">
	<?php foreach ($list as $l) {?>
	<tr>
		<td><?php echo $l['id'];?></td>
		<td><?php echo $l['contenttitle'];?></td>
		<td><?php echo $l['view'];?></td>
		<td><?php echo $l['comment'];?></td>
		<td><?php echo date( 'Y/m/d' , $l['timecreated']);?></td>
	</tr>
	<?php }?>

</table>

<?php echo $ci->pagination->create_links();?>