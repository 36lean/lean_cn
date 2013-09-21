<?php $collection = array();?>

<table class="table">
	<?php foreach ($data as $key => $value) :?>
	<?php 
		$sort = explode('-', $value['Numbers']) ;


		$collection[0][$sort[0].' ']++;
		$collection[1][$sort[1].' ']++;
		$collection[2][$sort[2].' ']++;
		$collection[3][$sort[3].' ']++;
		$collection[4][$sort[4].' ']++;
		$collection[5][$sort[5].' ']++;
		$collection[6][$sort[6].' ']++;
	?>
	<tr>
		<td>
			<span class="badge badge-success"><?php echo $sort[0];?></span>
			<span class="badge badge-success"><?php echo $sort[1];?></span>
			<span class="badge badge-success"><?php echo $sort[2];?></span>
			<span class="badge badge-success"><?php echo $sort[3];?></span>
			<span class="badge badge-success"><?php echo $sort[4];?></span>
			<span class="badge badge-success"><?php echo $sort[5];?></span>
			<span class="badge badge-info"><?php echo $sort[6];?></span>
		</td>
		<td><?php echo $value['Time'];?></td>
		<td><?php echo $value['Sales'];?></td>
	</tr>	

	<?php endforeach ?>

</table>



<table class="table table-consedens">
<?php foreach ($collection as $k => $value) :?>
<tr>
	<td><?php echo $k;?></td>

	<?php foreach ($value as $key=>$v) : ?>
		
	<td><?php echo $key;?> => <?php echo $v;?></td>

	<?php endforeach ?>
</tr>
<?php endforeach ?>
</table>