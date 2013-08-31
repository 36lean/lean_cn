<table class="table">
	<tr>
		<td>ID</td>
		<td>Title</td>
		<td>浏览</td>
		<td>评论</td>
		<td>创建日期</td>
		<td>preview</td>
	</tr>
	<?php foreach ($list as $l) {?>
	<tr>
		<td><?php echo $l['id'];?></td>
		<td><a href="<?php echo site_url('review/edit/'.$l['id']);?>"><i class="icon-edit"></i> <?php echo $l['contenttitle'];?></a></td>
		<td><?php echo $l['view'];?></td>
		<td><?php echo $l['comment'];?></td>
		<td><?php echo date( 'Y/m/d' , $l['timecreated']);?></td>
		<td><a href="<?php echo str_replace('admincp/', 'reader.php/article/'.$l['id'], base_url());?>"><i class="icon-eye-open"></i></a></td>
	</tr>
	<?php }?>

</table>

<?php 
	
	$this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'total'=>$total));

?>

