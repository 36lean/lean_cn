<div ng-controller="Register_Contact">

<div class="container-fluid">
<div class="row-fluid">

<div class="span9">
<form class="form-horizontal" name="" action="" method="post">
{{addon}}
	<div class="page-header">
		<h4>企业档案</h4>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	<p>公司名</p>
	<div class="input-append">
		<input id="company_name" name="company_name" type="text" ng-model="name" />
		<button class="btn btn-primary" type="button" ng-click="check(name)">检查</button>
		{{data}}
	</div>
	</div>
	</div>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>邮箱</p>
	<input name=" 	email" type="text" />
	</div>
	
	<div class="span4">
	<p>电话</p>
	<input name="phone" type="text" />
	</div>

	<div class="span4">
	<p>传真</p>
	<input name="fax" type="text" />
	</div>

	</div>
	</div>
	</div>



	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>所属行业</p>
	<input name="industry" type="text" />
	</div>
	
	<div class="span4">
	<p>地址</p>
	<input name="address" type="text" />
	</div>

	<div class="span4">
	<p>邮编</p>
	<input name="postid" type="text" />
	</div>

	</div>
	</div>
	</div>


	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>营业额</p>
	<input name="turnover" type="text" />
	</div>
	
	<div class="span4">
	<p>雇员数</p>
	<input name="employee" type="text" />
	</div>

	<div class="span4">
	<p>网址</p>
	<div class="input-append">
	<input name="weburl" type="text" />
	<a href="" class="btn btn-primar">访问</a>
	</div>
	</div>

	</div>
	</div>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">

	<p>备注信息</p>
	<textarea name="more"></textarea>

	</div></div></div>	


	<div class="page-header">
		<h4>客户个人档案</h4>
	</div>

	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>客户名字</p>
	<input name="_name" type="text" />
	</div>
	
	<div class="span4">
	<p>Email</p>
	<input name="email" type="text" />
	</div>

	<div class="span2">
	<p>年龄</p>
	<select class="span8" name="age">
		<?php for( $i = 0 ; $i < 150 ; $i++ ) {?>
		<option value="<?php echo $i;?>"><?php echo $i;?></option>
		<?php }?>
	</select>
	</div>

	<div class="span2">
	<p>性别</p>
	<select class="span8" name="gender">

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
	<input name="job" type="text" />
	</div>
	
	<div class="span4">
	<p>办公电话</p>
	<input name="office_phone" type="text" />
	</div>

	<div class="span4">
	<p>办公传真</p>
	<div class="input-append">
	<input name="office_fax" type="text" />
	</div>
	</div>

	</div>
	</div>
	</div>


	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>工作</p>
	<input name="job" type="text" />
	</div>
	
	<div class="span4">
	<p>办公电话</p>
	<input name="office_phone" type="text" />
	</div>

	<div class="span4">
	<p>办公传真</p>
	<div class="input-append">
	<input name="office_fax" type="text" />
	</div>
	</div>

	</div>
	</div>
	</div>


	<div class="control-group">
	<div class="container-fluid">
	<div class="row-fluid">
	
	<div class="span4">
	<p>私人手机号</p>
	<input name=" 	mobile" type="text" />
	</div>
	
	<div class="span4">
	<p>私人电话</p>
	<input name="private_phone" type="text" />
	</div>

	<div class="span4">
	<p>个人描述</p>
	<div class="input-append">
	<textarea name="description"></textarea>
	</div>
	</div>

	</div>
	</div>
	</div>




	<div class="control-group">
	<div class="controls">
		
		<button class="btn btn-primary" name="create_profile" value="1" >新增</button>
	
	</div>
	</div>

</form>
</div>

<div class="span3">
<p class="lead">反馈信息 : </p>
<ul class="nav">
	<li ng-repeat="c in data">
		<a href="{{c.id}}">{{c.name}}</a>
	</li>
</ul>
</div>

</div>
</div>
</div>



<script>
function Register_Contact( $scope , $http)
{
	$scope.check = function( name)
	{

 		$http( { method : 'GET' , url : '<?php echo site_url('api/query/company_exist');?>' , params : { 'company_name' : name} } ).success(function( data ,status ){


 			$scope.data = data['response'];

 		});
	}

}

</script>