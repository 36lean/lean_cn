<div class="row-fluid box">

<div class="box-content">
<form class="form-inline" action="" method="post">
<input name="info_id" type="hidden" value="<?php echo $info_id;?>" />
<table class="table table-condensed" >

<tr><td><span class="label label-info">映射到客户信息</span></td><td></td></tr>

<?php foreach ( $client_mapping as $id => $mapping) {

	if( 'cdescription' === $id) {
?>
<tr>
	<th><?php echo $mapping?></th>
	<td>
		<?php foreach ($row as $key => $column) {
		?>
		<label class="checkbox"><input name="d_<?php echo $key;?>" type="checkbox"><?php echo $column?></label> &nbsp;&nbsp;&nbsp;
		<?php
		}?>
	</td>
</tr>

<?php
		continue;
	}
?>
<tr>
	<th><?php echo $mapping?></th>
	<td>
		<select name="<?php echo $id;?>">
		<option value=99>未设置</option>
		<?php foreach ($row as $key => $column) {
		?>
		<option value=<?php echo $key;?>><?php echo $column?></option>
		<?php
		}?>
		</select>
	</td>
</tr>

<?php
}?>
</table>
<button name="map" class="btn btn-success" type="submit">开始映射</button>

</form>
</div>
</div>


<div class="row-fluid box">
<span class="label label-info">客户信息导入数据库</span>

<div class="box-content">
<div class="span8">
<?php
if( isset( $rule[0])){

$date = $rule[0]['update_date'];
$rule = json_decode( $rule[0]['map_rule'] , true);

echo '<div class="alert alert-success">客户资料</div>';
foreach ($rule as $rule_key => $rule_value){
	if( $rule_value == 99){

		echo '<p><span class="label label-success">'.$client_mapping[$rule_key] . '</span>________________________<span class="label">未设置</span></p>';
	}
	else if( 'corporation' === $rule_key) {
		echo '<div class="alert alert-success">企业信息</div>';
		echo '<p><span class="label label-success">企业名字</span>________________________<span class="label">'.$row[$rule_value['name']].'</p>';
		echo '<p><span class="label label-success">企业信息资料</span>________________________';
		foreach ($rule['corporation']['description'] as $id) {
			echo '<span class="label">'.$row[$id].'</span> ';
		}
		echo '';
	}
	else{
		echo '<p><span class="label label-success">'.$client_mapping[$rule_key] . '</span>________________________<span class="label label-info">' . $row[$rule_value] .'</span></p>';
	}
}
}
?>

</div>

<div class="span4">
<form name="__import_" action="" method="post">
<dl class="dl-horizontal">
	<dt>客户资料数量</dt>
	<dd><?php echo $client_sum;?></dd>
	
	<dt>给客户分组</dt>
	<dd>
		<select name="tags">
			<option value=0 selected>暂不添加</option>
			<?php 
			foreach ($tags as $key=>$t) {
			?>
				<option value=<?php echo $key;?>><?php echo $t;?></option>
			<?php
			}?>
		</select>
	</dd>

	<dt>分配给销售人员</dt>
	<dd>
		<select name="dispatch">
			<option value=0 selected>暂不分配</option>
			<?php foreach ($group_members as $member) {
			?>
			<option value=<?php echo $member['user_id'];?>><?php echo $member['username'];?> - <?php echo $member['role_name'];?></option>
			<?php
			}?>
			
		</select>
	</dd>
</dl>

	
	<input name="import_client" class="btn btn-primary" type="submit" value="导入客户信息" />
	</form>
</div>
</div></div>



<span class="label label-info">原始数据预览 ( 最多只显示10个结果 )</span>
<table class="table table-bordered">
<tr>
	<?php 
	foreach ($row as $key => $title) {
		echo '<td>'.$title.'</td>';
		if( $key === 7) {
			break;
		}
	}
	?>
	<td></td>
</tr>

<?php 
foreach ($infos as $info) {
?>
<tr>

<?php
	$data = json_decode( $info['row_content']);
	foreach ($data as $key => $d) {
		if( $key === 8)
			break;
?>
<td><?php echo $d;?></td>
<?php
	}
?>
</tr>
<?php
}
?>
</table>

