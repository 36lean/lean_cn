<?php 

$labels = array();

$data = array();

foreach ($list as $u) {
	$labels[] = $u['id'];

	$data[] = $u['view'];
}

$labels = implode( ',' , $labels);

$data = implode(',', $data);

?>

<div class="pag-header">
	<h4><?php echo $info['task_title'];?></h4>
	<h4><small>类型 : <?php echo $info['type'] === 'contact' ? '客户列表' : '网站会员';?> | 创建日期 : <?php echo date( 'Y-m-d h-i a' ,$info['created_date']);?></small></h4>
</div>

<div class="container">
	<canvas id="canvas" height="200" width="1024"></canvas>
</div>


<table class="table table-condensed">
	<tr>
		<td>ID</td>
		<td>邮箱地址</td>
		<td>查看次数</td>
		<td>发送次数</td>
		<td>客户信息</td>
	</tr>

	<?php foreach ($list as $email) { ?>
	<tr>
		<td><?php echo $email['id'];?></td>
		<td><?php echo $email['email'];?></td>
		<td><?php echo $email['view'];?></td>
		<td><?php echo $email['send'];?></td>
		<td><?php echo $email['contact_id'] ? '<a href="'.site_url('sale/contact/'.$email['contact_id']).'">'.$email['name'].'</a>' : '网站会员';?></td>
	</tr>
	<?php }?>

</table>


	<script>

		var barChartData = {
			labels : 

			[<?php echo $labels;?>],

			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					data : [<?php echo $data;?>]
				}
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
	</script>
