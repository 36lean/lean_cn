<div class="page-header">
	<h3> <?php echo $company['name'];?> </h3>
</div>


<div class="row">

<div class="span6">
<h4>企业资料 <small><?php if( $this->_G['groupid']===1){?><a href="">编辑</a><?php }?></small></h4>
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
	
	<h4>项目列表</h4>

</div>

</div>

<h4>企业职工</h4>
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