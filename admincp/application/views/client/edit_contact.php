<?php if( isset( $status)){

	if( $status === -1)
	{
		$this->load->module('webkit/information/show_information' , array('客户资料更新失败'));
	}
	else if( $status === 1)
	{
		$this->load->module('webkit/information/show_information' , array('客户资料更新成功'));
	}
}?>


<?php


if( $profile ){
?>
<div class="row-fluid">

<div class="span8">
<div class="alert alert-info"><i class="icon-comment-alt"></i> 沟通记录</div>
<table class="table table-striped">
<?php foreach ($connect as $conn) : ?>
<tr>
	<td class="span3"><a href="<?php echo site_url('marketing/edit_connect_record/'.$conn['id']);?>"><i class="icon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('m-d h:s' , $conn['date']) ;?></td>
	<td class="span9">
	<?php echo $conn['response'];?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<form action="" method="post">
<input name="client_id" type="hidden" value="<?php echo $profile['id'];?>" />
<div class="control-group">
<div class="controls">
<textarea class="span12" name="connect_text" rows=5></textarea>
</div>
</div>

<div class="control-group">
<div class="controls">
<button class="btn btn-success" name="add_connect" value="1">添加记录</button>
</div>
</div>
</form>

</div>

<div class="span4">
	<form action="" method="post">
	<input name="contact_id" type="hidden" value="<?php echo $profile['id'];?>" />
	<div class="alert alert-info"><i class="icon-time"></i> 约定提醒</div>
	<div class="control-group">
		<div class="controls">
		<label><strong>选择提醒时间</strong></label>
    	<div class="input-append date datetimepicker" data-date="<?php echo date('Y-m-d h:i');?>" data-date-format="yyyy-mm-dd hh:ii">
    	<input name="time" class="span12" size="16" type="text" value="<?php echo date('Y-m-d h:i');?>">
    	<span class="add-on"><i class="icon-th"></i></span>
    	</div> 
    </div>

    <div class="control-group">
    	<div class="controls">
    	<label><strong>备注信息</strong></label>
    	<div><input name="message" type="text" /></div>
    	</div>
    </div>

    <div class="control-group">
    	<div class="controls">
    	<div><button name="submit" type="submit" class="btn btn-primary" value="1" ><i class="icon-time"></i> 添加</button></div>
    	</div>
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

		<!--
		<div class="btn-group collection">
			<h5>通话时间统计 : </h5>
  
    		<button id="set_start_time" class="btn btn-primary disabled" data-toggle="button">通话开始</button>
    		<button id="set_give_up" class="btn disabled" data-toggle="button">放弃通话</button>
    		<button id="set_give_up" class="btn btn-primary disabled" data-toggle="button">通话结束</button>
    	</div>
		-->

	</div>

	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
	</div>
</div>
</div>

<div class="row-fluid">
<div class="span6">
<div class="alert alert-info"><i class="icon-edit"></i> 预览</div>
<?php
$extra = array('tag','compname','salesman','file_name');
$finish = 0; 
foreach ($profile as $key => $value) {
	if( in_array($key, $extra))
		continue;
	if( trim( $value))
		$finish++;
}

$percent = $finish * 100 / count($profile);
?>
<p class="text-info">当前资料完整度: <?php echo sprintf("%d" , $percent) , '%';?></p>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo $percent;?>%;"></div>
</div>


<table class="table table-bordered" style="font-size:15px;">
<tr>
	<td class="span3">联系人名字</td><td class="span9"><strong><?php echo $profile['name'];?></strong></td>
</tr>
<tr>
	<td>年龄</td><td><?php echo $profile['age'] ? $profile['age'] : '';?></td>
</tr>
<tr>
	<td>性别</td><td><?php echo ($profile['gender']==1 ? '男' : '女' );?></td>
</tr>
<tr>
	<td>分类</td>
	<td>
		<?php if( $profile['tag_name']) {?>
		<span class="label label-success"><?php echo $profile['tag_code'].' - '.$profile['tag_name'];?></span>
		<?php }else {?>
		<span class="label label-info">该客户未分类</span>
		<?php }?>
	</td>
</tr>
<tr>
	<td>
		<a href="">所在企业</a>
	</td>
	<td>
		<?php if( $profile['company_id']){?>
		<a href="<?php echo site_url('marketing/view_corporation/'.$profile['company_id']);?>"><?php echo $profile['companyname'],' - ',$profile['company_id'];?>
		<?php }else {?>
		<span class="label label-info">待分配</span>
		<?php }?>
	</td>
</tr>
<tr>
	<td>职务</td><td><?php echo $profile['job'];?></td>
</tr>
<tr>
	<td>邮箱</td><td><?php echo $profile['email'];?></td>
</tr>
<tr>
	<td>联系电话</td><td><?php echo $profile['office_phone'];?></td>
</tr>
<tr>
	<td>联系手机</td><td><?php echo $profile['mobile'];?></td>
</tr>
<tr>
	<td>传真</td><td><?php echo $profile['office_fax'];?></td>
</tr>
<tr>
	<td>QQ</td><td><?php echo $profile['qq'] ? $profile['qq'] : '';?></td>
</tr>
<tr>
	<td>地址</td><td><?php echo $profile['address'];?></td>
</tr>
<tr>
	<td>邮编</td><td><?php echo $profile['postid'];?></td>
</tr>
<tr>
	<td>网站</td><td><?php echo $profile['weburl'];?> <a href="<?php if( preg_match('/^(http:\/\/)/', $profile['weburl'])) echo $profile['weburl']; else echo 'http://'.$profile['weburl'];?>" target="blank">点击访问</a></td>
</tr>
<tr>
	<td>创建日期</td><td><strong><?php echo date('Y年m月d日 h:i' , $profile['modified_date']);?></strong></td>
</tr>
<tr>
	<td>备注信息</td><td><?php echo $profile['description'];?></td>
</tr>
<tr>
	<td>来源</td> <td><?php if( $profile['filename']){?>文件导入 : <strong><?php echo $profile['filename'];?></strong><?php }else{?>人工录入<?php }?></td>
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

</div>

<div class="span6">
<div class="alert alert-info"><i class="icon-edit"></i> 编辑</div>
<form class="form-horizontal well" action="" method="post">
<input type="hidden" name="id" value="<?php echo $profile['id'];?>">

	<div class="control-group">
		<label class="control-label">客户类型</label>
		<div class="controls">
			<select name="tag">
				<option value="">待分类</option>
			<?php foreach ($tag as $t) : ?>
				<option <?php if( $t['value'] === $profile['tag']){?>selected="selected"<?php }?> value="<?php echo $t['value'];?>"><?php echo $t['name'];?></option>
			<?php endforeach ;?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">客户名字</label>
		<div class="controls">
			<input  type="text" name="name" value="<?php echo $profile['name'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">年龄</label>
		<div class="controls">
			<input type="text" name="age" value="<?php echo $profile['age'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">性别</label>
		<div class="controls">
			<select name="gender">
				<option value="0">空</option>
				<option <?php if( $profile['gender'] == 1) echo 'selected="selected"';?> value="1">男</option>
				<option <?php if( $profile['gender'] == 2) echo 'selected="selected"';?> value="2">女</option>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">职位</label>
		<div class="controls">
			<input type="text" name="job" value="<?php echo $profile['job'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<input  type="text" name="email" value="<?php echo $profile['email'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">手机</label>
		<div class="controls">
			<input  type="text" name="mobile" value="<?php echo $profile['mobile'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">电话</label>
		<div class="controls">
			<input  type="text" name="office_phone" value="<?php echo $profile['office_phone'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">传真</label>
		<div class="controls">
			<input  type="text" name="office_fax" value="<?php echo $profile['office_fax'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">QQ</label>
		<div class="controls">
			<input  type="text" name="qq" value="<?php echo $profile['qq'];?>" />
		</div>
	</div>


	<div class="control-group">
		<label class="control-label">备注信息</label>
		<div class="controls">
			<textarea class="shorttext" name="description"><?php echo $profile['description'];?></textarea>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary" name="save_profile" value="1"><i class="icon-save"></i> Save</button>
		</div>
	</div>
</form>
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