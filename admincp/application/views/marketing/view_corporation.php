<div class="page-header">
	<h3> <?php echo $company['name'];?> </h3>
</div>


<div class="row">
<div class="span6">
<h4>企业资料 <small><a class="btn btn-primary" href="<?php echo site_url('marketing/edit_corporation/'.$company['id']);?>">编辑</a></small></h4>
<table class="table well">
	<tr>
		<td>公司名字</td>
		<td><?php echo $company['name'];?></td>
	</tr>
	<tr>
		<td>行业</td>
		<td><?php echo $company['industry'] ? $company['industry'] : '<span class="label label-info">未填</span>'?></td>
	</tr>
	<tr>
		<td>公司传真</td>
		<td><?php echo $company['fax'] ? $company['fax'] : '<span class="label label-info">未填</span>'?></td>
	</tr>
	<tr>
		<td>公司电话</td>
		<td><?php echo $company['phone'] ? $company['phone'] : '<span class="label label-info">未填</span>'?></td>
	</tr>
	<tr>
		<td>营业额</td>
		<td><?php echo $company['turnover'] ? $company['turnover'] : '<span class="label label-info">未填</span>'?></td>
	</tr>
	<tr>
		<td>员工数</td>
		<td><?php echo $company['employee'] ? $company['employee'] : '<span class="label label-info">未填</span>'?></td>
	</tr>	
	<tr>
		<td>官方网站</td>
		<td><a href="<?php if( preg_match('/^(http:\/\/)/', $company['weburl'])) echo $company['weburl'];else echo 'http://'.$company['weburl'];?>" target="blank"><?php echo $company['weburl'] ? $company['weburl'] : '<span class="label label-info">未填</span>'?></a></td>
	</tr>
	<tr>
		<td>公司地址</td>
		<td><?php echo $company['address'] ? $company['address'] : '<span class="label label-info">未填</span>'?></td>
	</tr>
	<tr>
		<td>邮编</td>
		<td><?php echo $company['postid'] ? $company['postid'] : '<span class="label label-info">未填</span>'?></td>
	</tr>
	<tr>
		<td>创建日期</td>
		<td><?php echo date('Y-m-d h:i' , $company['timecreated']);?> </td>
	</tr>
	<tr>
		<td>更新日期</td>
		<td><?php echo  $company['timeupdated'] ? date('Y-m-d h:i' , $company['timeupdated']) : '<span class="label label-info">从未更新</span>';?> </td>
	</tr>
</table>

</div>

<div class="span6">
	
	<h4>销售机会列表 <small><a class="btn btn-primary" href="<?php echo site_url('marketing/add_opportunity/'.$company['id']);?>">添加销售机会</a></small></h4>

	<table class="table table-bordered table-condensed">
		<tr>
			<td>销售机会</td>
			<td>负责人</td>
			<td>金额</td>
			<td>开始</td>
			<td>结束</td>
		</tr>
		<?php foreach ($opportunities as $p) :?>
		<tr>
			<td>
				<a href="<?php echo site_url('marketing/view_opportunity/'.$p['id']);?>"><?php echo $p['opportunity'];?></a>
			</td>

			<td><?php echo $p['master'];?></td>

			<td><?php echo $p['money'];?></td>

			<td><?php echo $p['timestart'];?></td>

			<td><?php echo $p['timeend'];?></td>

		<?php endforeach ?>
		
	</table>

</div>

</div>

<h4>企业职工 <small><a class="btn btn-primary" href="<?php echo site_url( 'marketing/add_worker/'.$company['id']);?>">为当前企业添加职工</a></small></h4>
<table class="table table-bordered">

	<tr>
		<td>ID</td>
		<td>名字</td>
		<td>职务</td>
		<td>Email</td>
		<td>办公室电话</td>
		<td>办公室传真</td>
	</tr>

	<?php foreach ($contacts as $contact) :?>
	<tr>
		<td><?php echo $contact['id'];?></td>
		<td><a href="<?php echo site_url('marketing/connect/'.$contact['id']);?>"><?php echo $contact['name'];?></td>
		<td><?php echo $contact['job'];?></td>
		<td><?php echo $contact['email'];?></td>
		<td><?php echo $contact['office_phone'];?></td>
		<td><?php echo $contact['office_fax'];?></td>
	</tr>
	<?php endforeach ?>

</table>