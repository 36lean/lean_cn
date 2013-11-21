<div ng-controller="Register_Contact" ng-app>
<div class="container-fluid">
<div class="row-fluid">

<div class="span9">

<form class="form-horizontal" name="" action="" method="post" ng-submit="submit()">

	<input name="company_id" type="hidden" ng-model="_id" />

	<div class="page-header">
		<h4>企业档案</h4>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	<p>公司名</p>
	<div class="input-append">
		<input class="input-large" id="company_name" name="company_name" type="text" ng-model="_name" />
		<button class="btn btn-primary" type="button" ng-click="check(_name)">检查</button>
	</div>
	</div>
	</div>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>邮箱 Email</p>
	<input name="email" type="text" ng-model="_email" />
	</div>
	
	<div class="span4">
	<p>电话 Phone</p>
	<input name="phone" type="text" ng-model="_phone" />
	</div>

	<div class="span4">
	<p>传真 Fax</p>
	<input name="fax" type="text" ng-model="_fax" />
	</div>

	</div>
	</div>
	</div>



	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>所属行业 Industry</p>
	<input name="industry" type="text" ng-model="_industry" />
	</div>
	
	<div class="span4">
	<p>地址 Adddress</p>
	<input name="address" type="text" ng-model="_address" />
	</div>

	<div class="span4">
	<p>邮编 PostId</p>
	<input name="postid" type="text" ng-model="_postid" />
	</div>

	</div>
	</div>
	</div>


	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>营业额 Turnover</p>
	<input name="turnover" type="text" ng-model="_turnover" />
	</div>
	
	<div class="span4">
	<p>雇员数 Employee</p>
	<input name="employee" type="text" ng-model="_employee" />
	</div>

	<div class="span4">
	<p>网址 WebURL</p>
	<div class="input-append">
	<input name="weburl" type="text" ng-model="_weburl" />
	</div>
	</div>

	</div>
	</div>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">

	<p>备注信息 Description</p>
	<textarea name="more" ng-model="_more" ></textarea>

	</div></div></div>	


	<div class="page-header">
		<h4>客户个人档案</h4>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>客户名字</p>

	<input name="_name" type="text" ng-model="name" />

	</div>
	
	<div class="span4">
	<p>Email</p>
	<input name="_email" type="text" ng-model="email" />
	</div>

	<div class="span2">
	<p>年龄</p>
	<select class="span8" name="_age" ng-model="age">
		<option value="0">选择年龄</option>
		<?php for( $i = 1 ; $i < 150 ; $i++ ) {?>
		<option value="<?php echo $i;?>"><?php echo $i;?></option>
		<?php }?>
	</select>
	</div>

	<div class="span2">
	<p>性别</p>
	<select class="span8" name="_gender" ng-model="gender">
		<option value="0">选择性别</option>
		<option value="1">男</option>
		<option value="2">女</option>

	</select>
	</div>

	</div>
	</div>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>工作</p>
	<input name="_job" type="text" ng-model="job" />
	</div>
	
	<div class="span4">
	<p>办公电话</p>
	<input name="_office_phone" type="text" ng-model="office_phone" />
	</div>

	<div class="span4">
	<p>办公传真</p>
	<div class="input-append">
	<input name="_office_fax" type="text" ng-model="office_fax" />
	</div>
	</div>

	</div>
	</div>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>QQ号码</p>
	<input name="_qq" type="text" ng-model="qq" />
	</div>
	
	<div class="span4">
	<p>私人手机号</p>
	<input name="_mobile" type="text" ng-model="mobile" />
	</div>

	<div class="span4">
	<p>私人固定电话</p>
	<input name="_private_phone" type="text" ng-model="private_phone" />
	</div>
	</div>

	</div>
	</div>



	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span12">
	<p>个人描述</p>
	<textarea class="span12" name="_description" ng-model="description"></textarea>
	</div>
	</div>
	</div>
	</div>


	<div class="well" ng-repeat="status in info">
		<div class="alert alert-info">档案创建成功</div>
		<a href="<?php echo site_url('sale/contact');?>/{{status.contact_id}}" target="blank">查看联系人资料</a>
		<a href="<?php echo site_url('sale/view_corporation');?>/{{status.company_id}}" target="blank">查看公司资料</a>			
	</div>


	<div class="control-group">
	<div class="controls">
		<input class="btn btn-primary" name="create_profile" type="submit" value="Submit" />
	</div>
	</div>

</form>
</div>

<div class="span3">
<p>反馈信息 : </p>
<ul class="nav">
	<li ng-repeat="c in data">
		<a href="javascript:void(0);" ng-click="setTarget(c.id)">{{c.name}}</a>
	</li>
</ul>
</div>

</div>
</div>
</div>



<script>
function Register_Contact( $scope , $http)
{

	$scope.age = 0;
	$scope.gender = 0;

	$scope.check = function( name)
	{

 		$http( { method : 'GET' , url : '<?php echo site_url('api/query/company_exist');?>' , params : { 'company_name' : name} } ).success(function( data ,status ){


 			$scope.data = data['response'];

 		});
	}

	$scope.setTarget = function( id)
	{
		$http( { method : 'GET' , url : '<?php echo site_url('api/query/company_information.json');?>' , params : { 'id' : id } } ).success(function( data , status ){

			if( status == '200')
			{
				
				$scope._id = id;
				$scope._name = data.name;
				$scope._email = data.email;
				$scope._industry = data.industry;
				$scope._phone = data.phone;
				$scope._fax = data.fax;
				$scope._address = data.address;
				$scope._turnover = data.turnover;
				$scope._employee = data.employee;
				$scope._weburl = data.weburl;
				$scope._more = data.more;

			}

		});
	}

	$scope.submit = function(){


		data = {
				'_id'   : $scope._id ,
				'_name' : $scope._name , 
				'_email' : $scope._email , 
				'_phone' : $scope._phone , 
				'_fax'   : $scope._fax , 
				'_industry' : $scope._industry , 
				'_address' : $scope._address , 
				'_postid' : $scope._postid , 
				'_turnover' : $scope._turnover , 
				'_employee' : $scope._employee , 
				'_weburl' : $scope._weburl , 

				'name' : $scope.name , 
				'email' : $scope.email , 
				'age' : $scope.age , 
				'gender' : $scope.gender , 
				'job' : $scope.job , 
				'office_phone' : $scope.office_phone , 
				'office_fax' : $scope.office_fax , 
				'qq' : $scope.qq , 
				'mobile' : $scope.mobile , 
				'private_phone' : $scope.private_phone , 
				'description' : $scope.description , 
			}

		$http( { method : 'POST' , url : '<?php echo site_url('api/query/register_contact.json');?>' , 
			data : $.param( data ) , 
		  	headers: {
   				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  			}
		}).success( function( data ,status ){

			if( status == '200')
			{	
					
				$scope.info = data;

			}else
			{

			}


		});

	}
}
</script>