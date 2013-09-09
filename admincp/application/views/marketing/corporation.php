<pre>
<?php
var_dump( $corporations);
?>

<table class="table">
	
	<tr>
		<td>ID</td>
		<td>公司</td>
		<td>创建日期</td>
		<td>备注</td>
	</tr>
	
	<?php foreach ($corporations as $c) : ?>
	<tr>
		<td><?php echo $c['id'];?></td>
		<td><?php echo $c['name'];?></td>
		<td><?php echo date( 'Y/m/d h:i' , $c['generate_date']);?></td>
		<td><?php echo $c['etc'];?></td>
	</tr>
	<?php endforeach ?>


</table> 