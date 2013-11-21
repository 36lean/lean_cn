
<table class="table">
	
	<tr>
		<td>ID</td>
		<td>公司</td>
		<td>职工人数</td>
		<td>网站</td>
		<td>地址</td>
		<td>创建日期</td>
	</tr>
	
	<?php foreach ($corporations as $c) : ?>
	<tr>
		<td><span class="label label-success"><?php echo $c['id'];?></span></td>
		<td><a href="<?php echo site_url('sale/view_corporation/'.$c['id']);?>"> <i class="icon-link"></i> <?php echo $c['name'];?></a></td>
		<td><span class="badge badge-info"><?php echo $c['workers'];?></span></td>
		<td><?php echo $c['weburl'];?></td>
		<td><?php echo $c['address'];?></td>
		<td><?php echo date( 'Y/m/d' , $c['timecreated']);?></td>
	</tr>
	<?php endforeach ?>


</table> 

<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>