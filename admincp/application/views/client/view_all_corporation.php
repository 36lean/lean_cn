<strong>今天日期<?php echo $today;?></strong>
<a href="<?php echo base_url();?>index.php/client/add_corporation"><span class="label label-success">添加企业信息</span></a>
<table class="table table-bordered table-hover table-condensed">
	<tr>
		<th>序号</th> <th>企业名称</th> <th>详细</th>
	</tr>
	<?php
	foreach ($list as $key => $info) {
	?>
	<tr <?php if( $today === date( 'Y/m/d',$info['generate_date'])){?>class="success"<?php }?>>
		<td><?=$key+1?></td>
		<td><?=$info['name']?></td>
		<td><a href="<?=base_url()?>index.php/client/corp_information/<?=$info['id']?>">更多信息</a></td>
	</tr>
	<?php
	}
	?>

</table>