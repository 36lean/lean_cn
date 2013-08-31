<?php

if( isset( $result)){
?>
<strong>导入<?php echo count( $result);?>条客户数据 (只显示前7个数据 .. ) 成功</strong>
<table class="table table-condensed table-hover" style="font-size:11px;">
<?php
	foreach ($result as $text) {
?>
<tr>
	<td><?=$text[0]?></td>
	<td><?=$text[1]?></td>
	<td><?=$text[2]?></td>
	<td><?=$text[3]?></td>
	<td><?=$text[4]?></td>
	<td><?=$text[5]?></td>
	<td><?=$text[6]?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
else
{
?>
<h4><small>上传Excel格式并导入</small></h4>
<form class="form-inline" name="uploads_excel_file" action="" method="post" enctype="multipart/form-data" >
	<input name="excel" type="file" />
	<input class="btn" type="submit" name="upload" value="upload" />
</form>

<h4><small>已经导入的记录</small></h4>

<table class="table table-bordered">
	<tr><td width="10%">操作</td> <td width="20%">上传文件名</td> <td width="15%">导入日期</td> <td width="55%">描述( 主要字段 )</td></tr>
<?php foreach ($record as $row) {
?>
<tr>
	<td> <a href="manage_excel/<?php echo $row['id']?>">管理</a></td>
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

<?php
}
?>

