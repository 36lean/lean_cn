<h4><small>已经导入的记录</small></h4>

<table class="table table-bordered">
	<tr><td width="10%">操作</td> <td width="20%">文件名</td> <td width="15%">导入日期</td> <td width="55%">描述( 主要字段 )</td></tr>
<?php foreach ($record as $row) {
?>
<tr>
	<td> <a href="<?php echo base_url();?>index.php/client/manage_excel/<?php echo $row['id']?>">管理</a></td>
	<td><?php echo $row['file_name'];?></td>
	<td><?php echo date('Y/m/d h:i' , $row['update_date'])?></td> 
	<td>
		<?php 
			$column = json_decode( $row['row']);
			foreach ($column as $col) {
				echo ' <strong>'.$col.'<strong> ';
			}
		?>
	</td>
</tr>
<?php
}?>
	<tr></tr>
</table>
