<h5><i class="icon-refresh icon-spin"></i> 向数据库中添加新的企业资料</h5>

<?php if( isset( $flag)) {?>
<div class="alert alert-info">添加成功 <?php echo $flag;?></div>
<?php }?>
<form action="" method="post">
<input type="hidden" name="generate_date" value=<?php echo time();?> />

<table class="table table-condensed table-bordered">
	<tr>
		<th>项目</th> <th>值</th> <th>额外项目</th>
	</tr>
	<tr>
		<th>企业名字</th>
		<td><input class="span12" name="corp_name" type="text" /></td>
		<td></td>
	</tr>

	<tr>
		<th>企业描述</th>
		<td><textarea class="span12" rows="6" name="corp_description"></textarea></td>
		<td></td>
	</tr>

	<tr>
		<th>是否为子公司</th>
		<td><input name="is_sub" type="checkbox" /></td>
		<td>
			<div class="input-prepend">
				<span class="add-on">属于</span>
				<select name="belongto">
					<?php foreach ($final as $fa) {
						echo '<option value='.$fa['id'].'>'.$fa['corp_name'].'</option>';
					}?>
				</select>
			</div>
		</td>
	</tr>

	<tr>
		<th>其它信息</th>
		<td><input class="span12" name="etc" type="text" /></td>
		<td></td>

	</tr>
</table>
<input class="span4 btn btn-success" name="build" type="submit" value="添加到资料库" />
</form>


