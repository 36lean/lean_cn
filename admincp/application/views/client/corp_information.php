<h5>当前 : <?php echo $info['name']?> <small><a href="#">编辑</a></small></h5>

<h6>企业相关信息</h6>
<dl class="dl-horizontal">	
	<dt>企业名字</dt><dd><?php echo $info['name'];?></dd>
	
	<dt>添加日期</dt><dd><?php echo date('Y/m/d' , $info['generate_date']);?></dd>
	
	<dt>附加信息</dt><dd><?=$info['etc'];?></dd>

	<dt>企业描述</dt>
	<dd>
	<?php $description = json_decode( $info['description'] , true);
	foreach ($description as $key => $value) {
	?>
	<p><?php echo $key;?> : <?php echo $value;?></p>
	<?php
	}
	?>
	</dd>

</dl>


<h6>企业成员列表 - 邮件列表通知</h6>