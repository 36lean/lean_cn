
<div class="row-fluid">
	<div class="span6">
	<form class="form-inline" action="<?php echo site_url('marketing' , 'search');?>" method="get">
		<input name="key" type="text" />
		<select name="field">
			<option value="name">客户名字</option>
			<option value="c_name">公司</option>
			<option value="tag">标签</option>
			<option value="email">电子邮件</option>
			<option value="phone">电话</option>
			<option value="mobile">手机号</option>
		</select>
		<button name="search" class="btn btn-primary" name="submit" type="submit" value=1>搜索</button>
	</form>
	</div>
	
	<div class="span6">
		<?php $this->load->module('webkit/reminder/get_contact_remind');?>
	</div>
</div>


<div class="row-fluid">
	<div class="box span12">


		<div class="box-content">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th class="span1">标签</th>
						<th class="span2">客户</th>
						<th class="span3">公司</th>
						<th class="span1">电邮</th>
						<th class="span1">电话</th>
						<th class="span1">手机号</th>

						<th class="span1">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$current = count( $client);

					foreach ($client as $c) {
					?>
					<tr>

						<td class="center"><span class="label label-success"><?php echo $c['tag'];?></span></td>
						
						<td class="center"><a href="<?php echo base_url();?>index.php/marketing/connect/<?php echo $c['id'];?>" target="blank"><i class="icon-user"></i> <?php echo $c['name'];?></a></td>

						<td class="center"><a href="<?php echo site_url('marketing/view_corporation/'.$c['company_id']);?>"><?php echo $c['company_name'];?></a></td>

						<td class="center">
							<a href="<?php echo base_url();?>index.php/marketing/mailto/<?php echo $c['id'];?>"><i class="icon-envelope"></i> <?php echo $c['email'];?></a>
						</td>

						<td class="center">
							<?php if( $c['office_phone']){?><a href="#myModal" role="button" class="btn btn-mini" data-toggle="modal" rel="<?php echo $c['office_phone'];?>" idn="<?php echo $c['id'];?>">
								<i class="icon-phone"></i> <?php echo $c['office_phone'];?></a>
							<?php }?>
						</td>

						<td class="center">
							<?php if( $c['mobile']){?><a href="#myModal" role="button" class="btn btn-mini" data-toggle="modal" rel="<?php echo $c['mobile'];?>" idn="<?php echo $c['id'];?>">
								<i class="icon-phone"></i> <?php echo $c['mobile'];?></a><?php }?>
						</td>

						<td class="center">
							<a href="<?php echo base_url();?>index.php/client/throw_profile/<?php echo $c['id'];?>" target="blank">
								<i class="icon-remove icon-white">
								</i> 
								废弃
							</a>
						</td>
					</tr>
					<?php
					}?>
				</tbody>
			</table>
		</div>
	</div>

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

	<!--/span-->

	<!--
	<div class="box span2">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-user">
				</i>
				最近联系
			</h2>
		</div>
		<div class="box-content">
		<ul>
		<?php

		$client = $this->session->userdata('cookie');
		
		if( false != $client) {
			$client = array_reverse( $client);

		foreach ($client as $value) {
			if( !is_array($value))
				continue;
		?>
		<li><h6><a href="<?php echo base_url();?>index.php/marketing/connect/<?php echo $value['id'];?>"><i class="icon-user"></i> <?php echo $value['name'];?></a></h6></li>
		<?php
		}}
		?>
		</ul>
		</div>
	</div>
	-->
</div>
<!--/row-->

<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>