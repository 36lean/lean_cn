<div ng-controller="Company" ng-app>
<div class="page-header">
	<h3> <?php echo $company['name'];?> </h3>
</div>


<div class="row">
<div class="span6">
<h4>企业资料</h4>
<table class="table well">
	<tr>
		<td>公司名字</td>
		<td><input type="text" name="name" value="<?php echo $company['name'];?>" ng-model="name" /></td>
	</tr>
	<tr>
		<td>行业</td>
		<td><input type="text" name="industry" value="<?php echo $company['industry'];?>" ng-model="industry" /></td>
	</tr>
	<tr>
		<td>公司传真</td>
		<td><input type="text" name="fax" value="<?php echo $company['fax'];?>" ng-model="fax" /></td>
	</tr>
	<tr>
		<td>公司电话</td>
		<td><input type="text" name="phone" value="<?php echo $company['phone'];?>" ng-model="phone" /></td>
	</tr>
	<tr>
		<td>营业额</td>
		<td><input type="text" name="turnover" value="<?php echo $company['turnover'];?>" ng-model="turnover" /></td>
	</tr>
	<tr>
		<td>员工数</td>
		<td><input type="text" name="employee" value="<?php echo $company['employee'];?>" ng-model="employee" /></td>
	</tr>	
	<tr>
		<td>官方网站</td>
		<td><a href="<?php if( preg_match('/^(http:\/\/)/', $company['weburl'])) echo $company['weburl'];else echo 'http://'.$company['weburl'];?>" target="blank"><?php echo $company['weburl'] ? $company['weburl'] : '<span class="label label-info">未填</span>'?></a></td>
	</tr>
	<tr>
		<td>公司地址</td>
		<td><input type="text" name="address" value="<?php echo $company['address'];?>" ng-model="address" /></td>
	</tr>
	<tr>
		<td>邮编</td>
		<td><input type="text" name="postid" value="<?php echo $company['postid'];?>" ng-model="postid" /></td>
	</tr>
	<tr>
		<td>创建日期</td>
		<td><?php echo date('Y-m-d h:i' , $company['timecreated']);?></td>
	</tr>
	<tr>
		<td>更新日期</td>
		<td><?php echo date('Y-m-d h:i' , $company['timeupdated']);?></td>
	</tr>
	<tr>
		<td>本公司的备注信息</td>
		<td>
			<textarea name="more" ng-model="more"></textarea>
		</td>
	</tr>
</table>
<div class="{{update_info['class']}}">
	{{update_info['info']}}
</div>

<button class="btn btn-primary" ng-click="update_company()">更新公司信息</button>
</div>

<div class="span6">
	
	<h4>销售机会列表 <small><a class="btn btn-primary" href="<?php echo site_url('sale/add_opportunity/'.$company['id']);?>">添加销售机会</a></small></h4>

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
				<a href="<?php echo site_url('sale/view_opportunity/'.$p['id']);?>"><?php echo $p['opportunity'];?></a>
			</td>

			<td><?php echo $p['master'];?></td>

			<td><?php echo $p['money'];?></td>

			<td><?php echo $p['timestart'];?></td>

			<td><?php echo $p['timeend'];?></td>

		<?php endforeach ?>
		
	</table>

</div>

</div>

<hr/>

<h4>添加联系人为本公司员工</h4>

<div class="input-append">
	<input name="contacts" type="text" ng-model="contact" />
	<button class="btn btn-primary" ng-click="find_contact()">查找联系人</button>
	 <label>提示 : 关键字为姓名 例如输入 : 吴</label>
</div>

<div class="{{add_info['class']}}">
	{{add_info['info']}}
</div>

<table class="table table-condensed table-striped">
<tr>
	<td class="span1">ID</td>
	<td class="span2">名字</td>
	<td class="span4">邮箱</td>
	<td class="span2">工作</td>
	<td class="span2">负责人</td>
	<td class="span1">操作</td>
</tr>

<tr ng-repeat="c in query_list">
	<td>{{c.id}}</td>
	<td><a href="<?php echo site_url('sale/contact/{{c.id}}');?>" target="blank">{{c.name}}</a></td>
	<td>{{c.email}}</td>
	<td>{{c.job}}</td>
	<td>{{c.master}}</td>
	<td><a href="javascript:void(0);" ng-click="bind( c.id , <?php echo $company['id'];?>)">设为员工</a></td>
</tr>

</table>



<h4>当前员工列表</h4>
<table class="table table-bordered table-condensed table-striped">

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
		<td><a href="<?php echo site_url('sale/contact/'.$contact['id']);?>"><?php echo $contact['name'];?></a></td>
		<td><?php echo $contact['job'];?></td>
		<td><?php echo $contact['email'];?></td>
		<td><?php echo $contact['office_phone'];?></td>
		<td><?php echo $contact['office_fax'];?></td>
	</tr>
	<?php endforeach ?>

</table>
</div>

<script>
function Company( $scope , $http)
{	
	$scope.id = "<?php echo $company['id'];?>"
	$scope.name = "<?php echo $company['name'];?>";
	$scope.industry = "<?php echo $company['industry'];?>";
	$scope.fax = "<?php echo $company['fax'];?>";
	$scope.phone = "<?php echo $company['phone'];?>";
	$scope.turnover = "<?php echo $company['turnover'];?>";
	$scope.employee = "<?php echo $company['employee'];?>";
	$scope.address = "<?php echo $company['address'];?>";
	$scope.postid = "<?php echo $company['postid'];?>";
	$scope.more = "<?php echo $company['more'];?>";


	$scope.update_company = function() 
	{
		company = {
			'id' : $scope.id , 
			'name' : $scope.name , 
			'industry' : $scope.industry , 
			'fax' : $scope.fax , 
			'phone' : $scope.phone , 
			'turnover' : $scope.turnover , 
			'employee' : $scope.employee , 
			'address' : $scope.address , 
			'postid' : $scope.postid , 
			'more' : $scope.more , 
		};

		$http({
			url : "<?php echo site_url('api/query/update_company');?>" , 
			method : "POST" , 
			data : $.param( company ) ,
			headers: {
   				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  			},
		}).success(function(data , status){

			if( data['response'] === 'Successed')
			{
				$scope.update_info = { 'info' : '更新成功' , 'class' : 'alert alert-success' } ;
			}

		});
	}

	$scope.find_contact = function()
	{
		$http({
			url : "<?php echo site_url('api/query/find_contact.json');?>" , 
			data : $.param( {'keyword' : $scope.contact} ) , 
			method : "POST" , 
			headers: {
   				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  			}			
		}).success( function( data , status ){
			$scope.query_list = data;
		});
	}

	$scope.bind = function( contact_id , company_id)
	{
		$http({
			url : "<?php echo site_url('api/query/bind_contact_company');?>" , 
			data : $.param( { 'contact_id': contact_id , 'company_id' : company_id } ) , 
			method : "POST" , 
			headers: {
   				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  			}				
		}).success(function( data , status){
			if( data['response'] === 'Successed')
			{
				$scope.add_info = { 'info' : '添加成功' , 'class' : 'alert alert-success' } ;
			}			
		});
	}

}	
</script>