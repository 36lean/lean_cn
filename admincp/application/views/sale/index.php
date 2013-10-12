<?php
$color = array(
	0 => '' ,
	1 => 'success' ,
	2 => 'error'   ,
	3 => 'warning' , 
	4 => 'info'    ,
);
?>

<script>
$( function () {
		$('.popover-btn').popover();
});
</script>
<div class="page-header">



    <div class="btn-group">
    	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    	客户类型
    	<span class="caret"></span>
    	</a>
    	<ul class="dropdown-menu">
    		<li><a href="<?php echo site_url('sale/index');?>">所有客户</a></li>
    		<?php foreach ($tags as $tag) { ?>
    			<li><a href=""><?php echo $tag['tag'];?> - <?php echo $tag['name'];?></a></li>
    		<?php }?>
    		
    	</ul>
    </div>

    <div class="btn-group">
    	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    	排列
    	<span class="caret"></span>
    	</a>
    	<ul class="dropdown-menu">
    		<li><a href="<?php echo site_url('sale/index');?>">默认</a></li>
    		<li><a href="<?php echo site_url('sale/index');?>">添加时间</a></li>
    		<li><a href="<?php echo site_url('sale/index');?>">沟通时间</a></li>
    		<li><a href="<?php echo site_url('sale/index');?>">修改时间</a></li>
    	</ul>
    </div>
	
	<div class="btn-group">
    	<a class="btn btn-primary">全部联系人 [ <?php echo $sum;?> ] 个</a>
    	<a class="btn btn-primary">今日提醒 [ 0 ] 个</a>
	</div>

<form class="form-inline pull-right">
	<input type="text" />
	<button class="btn btn-primary">搜索</button>
</form>

</div>

<table class="mot-table">
	<tr>
		<td>ID</td>
		<td>回访日期</td>
		<td>状态</td>
		<td>姓名</td>
		<td>电话号码</td>
		<td>手机号码</td>
		<td>Email</td>
		<td>沟通记录</td>
		<td>添加沟通记录</td>
		<td>操作</td>
		<td>用户来源</td>
	</tr>
	<?php foreach ($contacts as $one ) { ?>
	<tr>
		<td class="<?php echo $color[$one['display_color']];?>">

			<?php echo $one['id'];?>

		</td>
		
		<td>

			<a href="javascript:void(0);" class="popover-btn" data-toggle="popover" data-placement="top" data-content="<?php echo $one['event'];?>" data-title="<?php echo $one['datereminded'] ? date('Y-m-d h:i:s' , $one['datereminded']) : '' ;?>"><?php echo $one['datereminded'] ? date('Y-m-d' , $one['datereminded']) : '<span class="label">未定</span>' ;?></a>

		</td>
		
		<td>
			<strong><a href="javascript:void(0);" class="popover-btn" data-toggle="popover" data-placement="top" data-content="<?php echo $one['tagname'];?>"><?php echo $one['tag'] ? $one['tag'] : '未定';?></a></strong>
			<select class="mot-select">
				<?php foreach ($tags as $tag) { ?>
					<option value="<?php echo $tag['id'];?>"><?php echo $tag['tag'];?></option>
				<?php }?>	
			</select>

		</td>
		
		<td><a href="<?php echo site_url('marketing/connect/'.$one['id']);?>" id="<?php echo $one['id'];?>"><?php echo $one['name'];?></a></td>

		<script type="text/javascript">
		$( function () {
			
			var aboutPC = {
    			name: "<a href='<?php echo site_url('marketing/connect/'.$one['id']);?>'><?php echo $one['name'];?></a>" ,
    			company: "<a href='<?php echo site_url('marketing/view_corporation/'.$one['company_id']);?>'><?php echo $one['companyname'];?></a>" ,
    			phone: "<?php echo $one['office_phone'];?>" ,
    			mobile: "<?php echo $one['mobile']?>" ,
    			email: "<?php echo $one['email'];?>" , 
    			contact: "<?php echo $one['response'] ? $one['response'] : '什么都没写';?>", 
			};

			$('#<?php echo $one['id'];?>').hovercard({
    				showCustomCard: true, 
    				customCardJSON: aboutPC
				});
		});
		</script>

			
		<td><?php //echo $one['office_phone'];?> 
			<a href="#myModal" data-toggle="modal" rel="<?php echo $one['office_phone'];?>" idn="<?php echo $one['id'];?>" data-name="<?php echo $one['name'];?>" data-type="固定电话"><i class="icon-phone icon-2x"></i></a>
		</td>


		<td>
			 <a href="#myModal"  data-toggle="modal" rel="<?php echo $one['mobile'];?>" idn="<?php echo $one['id'];?>" data-name="<?php echo $one['name'];?>" data-type="手机"><i class="icon-mobile-phone icon-2x"></i></a>
		</td>

		<td><?php //echo $one['email'];?> <a href="javascript:void(0);"><i class="icon-envelope icon-2x"></i></a></td>
		<td><a href="javascript:void(0);"><i class="icon-file-text-alt icon-2x"></i></a></td>
		<td>
			<textarea class="mot-textarea"></textarea>
			<button class="mot-button">添加</button>
		</td>
		<td>
			<ul>
				<button class="mot-button">保存修改</button>
				<button class="mot-button">清理</button>
			</ul>
		</td>
		<td><a href="javascript:void(0);" class="popover-btn" data-toggle="popover" data-placement="top" data-content="<?php echo $one['filename'];?>" title="资料来源 <?php echo $one['filename'] ? '文件' : ( $one['user_id'] ? '网站会员' : '录入');?>" ><?php echo $one['filename'] ? cutstr($one['filename'] , 8 , '') : ( $one['user_id'] ? '网站会员' : '录入');?></a></td>
	</tr>
	<?php }?>
</table>


<?php $this->load->module( 'webkit/pagination/show' , array('offset' => $offset , 'sum' => $sum) );?>



<script>
$( function() {

	$('a[data-toggle="modal"]').on('click' , function(){

		$('#myModalLabel').text('').append( '拨打客户 ' + $(this).attr('data-name') + ' 的' + $(this).attr('data-type'));
		
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
		<h3 id="myModalLabel"></h3>
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