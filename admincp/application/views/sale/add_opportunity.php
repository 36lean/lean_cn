<div class="page-header">
	<h4>为 <?php echo $company['name'];?> 添加销售机会</h4>
</div>
<form action="" method="post">
<table class="table table-bordered table-condensed">

	<tr>
		<td>销售机会名称</td>
		<td><input name="opportunity" type="text" /></td>
		<td>产品类型</td>
		<td>
			<select name="product_type">
				<option value="1">精益课程</option>
			</select>
		</td>
	</tr>

	<tr>
		<td>公司名称</td>
		<td><?php echo $company['name'];?> <input type="hidden" name="company_id" value="<?php echo $company['id'];?>" /></td>
		<td>描述</td>
		<td>
			<textarea name="description"></textarea>
		</td>
	</tr>

	<tr>
		<td>负责人</td>
		<td><input name="master" type="text" value="<?php echo $this->_G['user'];?>" readonly="readonly"></td>
		<td>销售阶段</td>
		<td>
			<select name="stage">
								<option value="1">P1 - 开荒阶段</option>
								<option value="2">P2 - 需求收集阶段</option>
								<option value="3">P3 - 需求判断阶段</option>
								<option value="4">P4 - 需求确认阶段</option>
								<option value="5">P5 - 需求细化阶段</option>
								<option value="6">P6 - 技术认同阶段</option>
								<option value="7">P7 - 商务谈判阶段</option>
								<option value="8">P8 - 合同阶段</option>
								<option value="9">P9 - 项目执行阶段</option>
								<option value="10">P10 - 项目总结阶段</option>
			</select>		
		</td>
	</tr>

	<tr>
		<td>销售金额</td>
		<td><input type="text" name="money" value="" /></td>
		<td>状态</td>
		<td>
			<select name="stage">
				<option value="1">正常</option>
				<option value="0">锁定</option>
			</select>
		</td>
	</tr>

	<tr>
		<td>开始日期</td>
		<td>
			<input class="datetimepicker" type="text" name="timestart" value="" />
		</td>
		
		<td>结束日期</td>
		<td>
			<input class="datetimepicker" type="text" name="timeend" value="" />
		</td>
	</tr>	

</table>


<button class="btn btn-primary" name="create_opportunity" value="1">创建</button>
</form>