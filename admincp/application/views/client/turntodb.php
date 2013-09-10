<?php
$map = $this->config->config['map'];
?>

<form action="" method="post">

<input type="hidden" name="file_id" value="<?php echo $file_id;?>" />
<input type="hidden" name="file" value="<?php echo $file;?>" />

<p>客户资料数量: <?php echo $sum;?></p>

<table class="table table-striped table-condensed">
	<tr><th>Excel字段</th><th>Demo数据</th><th>数据库字段</th></tr>
	<?php foreach ($column as $column_id=>$col) : ?>
	
	<tr>
		<td><?php echo $col;?></td>

		<td><?php echo $demo[$column_id];?></td>

		<td>
			<select name="<?php echo $column_id?>">

				<option value="">===选择对应的字段===</option>
				
				<?php foreach ($map['contacts'] as $key => $value) :?>
					<option value="<?php echo $key;?>"><?php echo $value;?></option>
				<?php endforeach ?>

				<option value="">-------------</option>

				<?php foreach ($map['company'] as $key => $value) :?>
					<option value="<?php echo $key;?>"><?php echo $value;?></option>
				<?php endforeach ?>				

			</select>
		</td>
	</tr>
	<?php endforeach ?>
</table>

<div class="control-group">
	<label><h4>分成多少批导入<small>数据比较多的情况 默认为1不分批</small></h4></label>
	<div class="controls">
		<input type="text" name="batch" value="1" placeholder="输入数字" />
	</div>
</div>
<button class="btn btn-primary" type="submit" name="map_to_database" value="1">映射</button>

</form>
