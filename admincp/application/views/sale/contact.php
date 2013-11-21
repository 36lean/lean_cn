<?php if( isset( $status)){
	if( $status === -1)
	{$this->load->module('webkit/information/show_information' , array('客户资料更新失败'));}
	else if( $status === 1)
	{$this->load->module('webkit/information/show_information' , array('客户资料更新成功'));}
}?>
<?php
if( $profile ){
?>
<div class="row-fluid">
<div class="span6">
<div class="alert alert-info"><i class="icon-comment-alt"></i> 沟通记录</div>
<table class="table table-striped">
<?php foreach ($connect as $conn) : ?>
<tr>
	<td class="span1"><a href="<?php echo site_url('sale/edit_connect_record/'.$conn['id']);?>">Edit</a>
	</td>
	<td class="span4">
		[ <?php if( 'am' === date('a')) {

			$h = date('h' , $conn['date']);

		}else if( 'pm' === date('a'))
		{
			$h = date('h'  , $conn['date'])+12;
		}	

		?>
		<strong><?php echo date("Y-m-d ".$h.":i" , $conn['date']) ;?></strong> ]
	</td>
	
	<td class="span8">
		<?php echo $conn['response'];?>
	</td>
</tr>
<?php endforeach; ?>
</table>

</div>

<div class="span6">

<form action="" method="post" ng-submit="formSubmit()">
<input name="client_id" type="hidden" value="<?php echo $profile['id'];?>" />
<div class="control-group">
<div class="controls">
<textarea class="kindeditor" name="connect_text" rows=5></textarea>
</div>
</div>

<div class="control-group">
<div class="controls">
<script>
	$( function() {
		$('#datetimepicker').datetimepicker();
	});
</script>

<label>提醒时间 ( 若不填写 则是沟通记录 )</label>
<div class="input-append date" id="datetimepicker" data-date="" data-date-format="yyyy-mm-dd hh:ii">
    <input size="16" name="time" type="text" value="">
    <span class="add-on"><i class="icon-th"></i></span>
 </div>
</div></div>

<div class="control-group">
<div class="controls">
<button class="btn btn-success" type="submit" name="add_connect" value="1">添加沟通记录</button>
</div>
</div>
</form>



	<hr />
	<div class="page-header">
		<h4>拨打办公电话</h4>
	</div>

	<table class="table table-condensed">
	<tr>
		<td>办公电话</td>
		<td>
			<?php if( $profile['office_phone']){?><a href="#myModal" role="button" class="btn" data-toggle="modal" rel="<?php echo $profile['office_phone'];?>" idn="<?php echo $profile['id'];?>">
				<i class="icon-phone"></i> <?php echo $profile['office_phone'];?></a>
			<?php }?>			
		</td>
	</tr>

	<tr>
		<td>拨打手机</td>
		<td>
			<?php if( $profile['mobile']){?><a href="#myModal" role="button" class="btn" data-toggle="modal" rel="<?php echo $profile['mobile'];?>" idn="<?php echo $profile['id'];?>">
				<i class="icon-phone"></i> <?php echo $profile['mobile'];?></a>
			<?php }?>
		</td>
	</tr>
	</table>

<script>
$( function() {

	$('a[data-toggle="modal"]').on('click' , function(){
		
		$('.collection > button').addClass('disabled');

		$('div#log').text("");

		var number = $(this).attr('rel');
		$('#number').text("").append( "<h5>"+number+"</h5>");
		$('#dial').text("").attr({'value':number});
		$('#user_id_save').attr({'value':$(this).attr('idn')});
	});

	$('button#docall').on('click',function(){

		$('div#log').text("");

		var number = $('input#dial').val();

		var user_id = $('#user_id_save').val();
		
		request = $.ajax({
			type:"POST",
			url: "<?php echo site_url('module/webkit/devkit/pull_dial_request/');?>"+"/"+user_id+"/"+number+"/"+<?php echo $this->_G['uid']?> ,
		});

		request.done(function(msg) {

			if( "呼叫成功" === msg)
			{
				//$('.collection > button').removeClass('disabled');
				$('div#log').append('<h4>拨号中</h4>');
				x = 1 ; 
				setInterval( function() {

					x ++ ;
					if( x > 15)
						return ;

					$('div#log').append('.');

				} ,  1000 );

			}

			$('div#log').append('<strong>返回提示: '+msg+'</strong>');
		});

		$('.collection > button').removeClass('disabled');

		$('.collection > button').on('click' , function() {

			var request = $(this).attr('id');

			request = $.ajax({
				type:"GET",
				url: "<?php echo site_url('marketing/');?>"+"/"+request ,
			});

		});

	});
});
</script>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">拨打电话</h3>
	</div>
	<div class="modal-body form-inline">

		<div class="control-group">
		<div class="controls">
		
		<strong>请确认号码: </strong>

		<span id="number"></span>

		<input id="user_id_save" type="hidden" value="" />

		<input id="dial" class="input-medium" type="text" value="" />

		<button class="btn btn-primary" id="docall" name="call"> 拨打</button>
		
		</div>
		</div>

		<div id="log"></div>
	</div>

	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
	</div>
</div>
</div>
</div>


<div ng-app>
<div ng-controller="Contact_profile">

<div class="container-fluid">
<div class="row-fluid">

<div class="span6">
<div class="alert alert-info"><i class="icon-edit"></i> 网站会员信息</div>
<form class="form-horizontal" action="" method="post">
<input type="hidden" name="uid" ng-model="_uid" />

	<div class="{{bind_info['class']}}">{{bind_info['text']}}</div>
	<div class="group-control">
	<div class="input-append">
	
	<input type="text" name="username" ng-model="username" />
	<button class="btn btn-primary" type="button" ng-click="connect()">关联会员</button>
	</div>
	</div>
	<br/>
	<table class="table table-striped" >

	<tr ng-repeat="user in result_list">
		<td>{{user.uid}}</td> <td>{{user['username']}}</td> <td>{{user['email']}}</td><td><a href="javascript:void(0);" ng-click="user_bind( user.uid , _id)">关联</td>
	</tr>

	</table>


	<table class="table table-bordered table-condensed">

		<tr>
			<td>用户名</td>
			<td>{{username}}</td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" ng-model="email"></td>
		</tr>

		<tr>
			<td>真实姓名</td>
			<td><input type="text" ng-model="realname"></td>
		</tr>

		<tr>
			<td>固定电话</td>
			<td><input type="text" ng-model="telephone"></td>
		</tr>

		<tr>
			<td>手机</td>
			<td><input type="text" ng-model="mobile"></td>
		</tr>

		<tr>
			<td>公司</td>
			<td><input type="text" ng-model="company"></td>
		</tr>

		<tr>
			<td>职位</td>
			<td><input type="text" ng-model="occupation"></td>
		</tr>

		<tr>
			<td>QQ</td>
			<td><input type="text" ng-model="qq"></td>
		</tr>

		<tr>
			<td>网址 / 微博 / 博客</td>
			<td><input type="text" ng-model="site"></td>
		</tr>

		<tr>
			<td>注册日期</td>
			<td>{{regdate}}</td>
		</tr>

		<tr>
			<td>最后登录</td>
			<td>{{lastlogintime}}</td>
		</tr>

		<tr>
			<td>VIP会员信息</td>
			<td></td>
		</tr>

		<tr>
			<td>开通时间</td>
			<td><input class="time" name="jointime" type="text" ng-model="jointime" value="{{jointime}}" /> <span>例如: <?php echo date('Y-m-d');?></span></td>

		</tr>

		<tr>
			<td>到期时间</td>
			<td><input class="time" name="exptime" type="text" ng-model="exptime" value="{{exptime}}" /> <span>例如: <?php echo date('Y-m-d' , time() + 86400 * 30 );?></span></td>
		</tr>

		<tr>
			<td>剩余时间 ( /天 )</td>
			<td>{{alltime}}</td>
		</tr>

	</table>
	<div class="{{member_update['class']}}">{{member_update['text']}}</div>
	<button class="btn btn-primary" ng-click="update()">更新资料</button>


</form>
</div>
























<div class="span6">
<div class="alert alert-info"><i class="icon-edit"></i> 客户资料</div>


<form name="" action="" method="post">
<input type="hidden" name="id" value="" ng-model="_id">

<table class="table table-bordered">
<tr>
	<td class="span3">联系人名字</td>
	<td class="span9">
	
	<input type="text" name="name" value="<?php echo $profile['name'];?>" ng-model="_name"/>

	</td>
</tr>
<tr>
	<td>年龄</td>
	<td>
		<select ng-model="_age">
			<option value="0">设置年龄</option>
			<?php for( $i = 1 ; $i < 150 ; $i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
		</select>
	</td>
</tr>
<tr>
	<td>性别</td>
	<td>
		<div class="controls">
			<select name="gender" ng-model="_gender">
				<option value="0">设置性别</option>
				<option <?php if( $profile['gender'] == 1) echo 'selected="selected"';?> value="1">男</option>
				<option <?php if( $profile['gender'] == 2) echo 'selected="selected"';?> value="2">女</option>
			</select>
		</div>
	</td>
</tr>
<tr>
	<td>分类</td>
	<td>
		<div class="controls">
			<select name="tag" ng-model="_tag">
				<option value="">待分类</option>
			<?php foreach ($tag as $t) : ?>
				<option <?php if( $t['value'] === $profile['tag']){?>selected="selected"<?php }?> value="<?php echo $t['value'];?>"><?php echo $t['name'];?></option>
			<?php endforeach ;?>
			</select>
		</div>
	</td>
</tr>

<tr>
	<td>
		<a href="">所在企业</a>
	</td>
	<td>
		<?php if( $profile['company_id']){?>
		<a href="<?php echo site_url('marketing/view_corporation/'.$profile['company_id']);?>"><?php echo $profile['companyname'],' - ',$profile['company_id'];?></a>
		<?php }else {?>
		<span class="label label-info">待分配</span>
		<?php }?>
	</td>
</tr>
<tr>
	<td>职务</td><td><input type="text" name="job" value="<?php echo $profile['job'];?>"  ng-model="_job" /></td>
</tr>
<tr>
	<td>邮箱</td><td><input type="text" name="email" value="<?php echo $profile['email'];?>"  ng-model="_email" /></td>
</tr>
<tr>
	<td>办公电话</td><td><input type="text" name="office_phone" value="<?php echo $profile['office_phone'];?>"  ng-model="_office_phone" /></td>
</tr>
<tr>
	<td>联系手机</td><td><input type="text" name="mobile" value="<?php echo $profile['mobile'];?>" ng-model="_mobile" /></td>
</tr>
<tr>
	<td>私人电话</td><td><input type="text" name="private_phone" value="<?php echo $profile['private_phone'];?>" ng-model="_private_phone" /></td>
</tr>
<tr>
	<td>办公传真</td><td><input type="text" name="office_fax" value="<?php echo $profile['office_fax'];?>" ng-model="_office_fax" /></td>
</tr>
<tr>
	<td>QQ</td><td><input type="text" name="qq" value="<?php echo $profile['qq'] ? $profile['qq'] : '';?>" ng-model="_qq" /></td>
</tr>

<tr>
	<td>创建日期</td><td><strong><?php echo date('Y年m月d日 h:i' , $profile['modified_date']);?></strong></td>
</tr>
<tr>
	<td>备注信息</td><td><?php echo $profile['description'];?></td>
</tr>
<tr>
	<td>来源</td> <td><?php if( $is_contact_from_website) { echo '网站会员'; }  else if( $profile['filename']){?>文件导入 : <strong><?php echo $profile['filename'];?></strong><?php }else{?>人工录入<?php }?></td>
</tr>
<tr>
	<td>负责人</td>
	<td><?php echo $profile['salesman'];?></td>
</tr>

<?php if( $web_profile){?>

<tr>
	<td>网站会员ID</td>
	<td><?php echo $web_profile['username'];?></td>
</tr>	

<?php }?>
</table>

<div class="{{status['class']}}">
	{{status['info']}}
</div>

<button type="submit" class="btn btn-primary" name="enter" value="1" ng-click="change()">保存修改</button>
</form>
</div>

</div>
</div>





</div>
</div>
<?php
if( $this->_G['groupid'] !== 1 && ( $profile['assign_to'] != $this->_G['uid']))
{
?>
<script>
$(function(){
	$('input').attr({'disabled' : 'disabled'});
	$('button').attr({'disabled' : 'disabled'});
	$('textarea').attr({'disabled' : 'disabled'});
	$('select').attr({'disabled' : 'disabled'});
	$('.alert').first().append(' ( 没有权限修改，因为你不是管理员或者被未分配 ) ');
})
</script>



<?php

}
//如果找不到客户资料
}
else{
?>

<div class="alert alert-error">
	<i class="icon-info-sign"></i> 对不起 你要找的客户资料目前不存在 请先检查是否导入
</div>

<?php
}

?>


<script>
function Contact_profile($scope , $http)
{
	$scope._uid = "<?php echo $profile['user_id'];?>";
	$scope._id = "<?php echo $profile['id'];?>";
	$scope._name = "<?php echo $profile['name'];?>";
	$scope._gender = "<?php echo $profile['gender'];?>";
	$scope._tag = "<?php echo $profile['tag'];?>";
	$scope._age = "<?php echo $profile['age'] ? $profile['age'] : 0;?>";
	$scope._job = "<?php echo $profile['job'];?>";
	$scope._office_phone = "<?php echo $profile['office_phone'];?>";
	$scope._email = "<?php echo $profile['email'];?>";
	$scope._mobile = "<?php echo $profile['mobile'];?>";
	$scope._office_fax = "<?php echo $profile['office_fax'];?>";
	$scope._private_phone = "<?php echo $profile['private_phone'];?>"
	$scope._qq = "<?php echo $profile['qq'];?>";

	$http({
		url : "<?php echo site_url('api/query/get_member_profile');?>" , 
		data :  $.param( { 'uid' : $scope._uid } ), 
		method : "POST" , 
		headers: {
   				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  		} ,

	}).success(function( data , status ){
			

		$scope.email = data['email'];
		$scope.realname = data['realname'];
		$scope.telephone = data['telephone'];
		$scope.mobile = data['mobile'];
		$scope.company = data['company'];
		$scope.occupation = data['occupation'];
		$scope.qq = data['qq'];
		$scope.site = data['site'];
		$scope.username = data['username'];
		$scope.regdate = getLocalTime( ( data['regdate'] ? data['regdate'] : 0) );
		$scope.lastlogintime = getLocalTime( ( data['lastlogintime'] ? data['lastlogintime'] : 0) );
		$scope.jointime = getLocalTime( ( data['jointime'] ? data['jointime'] : 0) );
		$scope.exptime = getLocalTime( ( data['exptime'] ? data['exptime'] : 0) );

		var le = parseInt( ( data['exptime'] - data['today'] ) / 86400 );

		$scope.alltime =  le > 0 ? le : '已经到期/未开通';


	});

	$scope.change = function() 
	{
		contact = {
			'_id'			: $scope._id , 
			'_name' 		: $scope._name , 
			'_gender' 		: $scope._gender , 
			'_tag' 			: $scope._tag , 
			'_age' 			: $scope._age , 
			'_job' 			: $scope._job , 
			'_office_phone' : $scope._office_phone , 
			'_email' 		: $scope._email , 
			'_mobile' 		: $scope._mobile , 
			'_office_fax' 	: $scope._office_fax , 
			'_qq' 			: $scope._qq , 
			'_private_phone': $scope._private_phone , 
		};

		$http({
			url : '<?php echo site_url('api/query/update_user.json');?>' ,
			method:  'POST' , 
			data : $.param( contact ) ,
		  	headers: {
   				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  			}
		}).success( function( data , status){
			if( data['response'] === 'Successed' )
			{
				$scope.status = {'info' : '修改成功' , 'class' : 'alert alert-success' };
			}else if( data['response'] === 'Failed')
			{
				$scope.status = {'info' : '修改失败' , 'class' : 'alert alert-important' };
			}
		});
	}

	$scope.connect = function()
	{

		
		if( $scope.username == '' || $scope.username == undefined)
		{
			alert( '请输入用户名关键字');
			return ;
		}

		$http({
			url : "<?php echo site_url('api/query/query_ucenter_member');?>",
			method : 'POST' , 
			data : $.param( { 'username' : $scope.username} ) , 
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},
		}).success(function( data , status){
			$scope.result_list = data;
		});

	}

	$scope.user_bind = function( user_id , contact_id) 
	{
			
		$http({
			url : "<?php echo site_url('api/query/user_bind');?>" ,
			method : "POST" ,
			data : $.param( { 'user_id' : user_id , 'contact_id' : contact_id } ) , 
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},
		}).success(function( data , status){

			if( data['response'] === 'Successed')
			{
				$scope.bind_info = { 'text' : '关联成功 - 请刷新生效' , 'class' : 'alert alert-success'};
			}
			
		});

	}

	$scope.update = function() 
	{
		data = {
			'uid' : $scope._uid , 
			'email' : $scope.email ,
			'realname' : $scope.realname ,
			'telephone' : $scope.telephone ,
		 	'mobile' : $scope.mobile ,
			'company' : $scope.company ,
			'occupation' : $scope.occupation ,
			'qq' : $scope.qq ,
			'site' : $scope.site ,
			'jointime' : $scope.jointime , 
			'exptime': $scope.exptime 
		}

		$http({
			url : "<?php echo site_url('api/query/update_ucenter_member');?>" ,
			data : $.param( data ) ,  
			method : "POST" , 
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},			
		}).success( function( data , status){

			if( data['response'] === 'Successed')
				$scope.member_update = { 'text' : '更新成功' ,  'class' :'alert alert-success' };
			else
				$scope.member_update = { 'text' : '更新失败' ,  'class' :'alert alert-error' };
		});
	}	

	//时间转换函数
	function getLocalTime(nS) {

		if( 0 == nS)

			return ;

   		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, "").replace(/\s.+/g ,'');    
	}

	$scope.formSubmit = function()
	{
		return true;
	}

}
</script>