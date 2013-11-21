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

var color = { 1 : 'success' , 2 : 'error' , 3 : 'warning' , 4 : 'info' };

$( function () {
	
	$('.popover-btn').popover({'html' : true});

	$('.switch_color').on('click' , function(){
			
		var c = $(this).attr('data-write');

		var id = $(this).attr('rel');

		c++ ;

		if( c > 4)
			c = 0;

		$(this).attr({'data-write' : c});

		$(this).attr({'class' : 'switch_color '+ color[c]});

		$.ajax( {

			url : "<?php echo site_url('sale/change_color');?>" , 
			type : "POST" ,
			data : { 'color' : c  , 'id' : id} , 

		});
	});

	$('.mot-select').on('change' , function () {
		var id = $(this).attr('data-source');
		var tag_id = $(this).attr('value');
		$.ajax({
			url : '<?php echo site_url('sale/update_tag');?>/'+id+'/'+tag_id , 
			type : 'GET' , 
			success : function(data) {
				if( data === '911')
					{ 
						//$('.page-header').after('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>客户状态修改失败 !</div>');
					}
				else{ 
					data = eval( '(' + data + ')');

					//$('.page-header').after('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>客户 <strong>'+data.name+'</strong> 状态修改成功 !</div>');
				}
			},
			complete : function (event,request, settings) {
				//$('.mot-small').text('').append('请求完成 返回'+request);
			},

		});
	});

	$('.contact-clean').on( 'click' , function() {

		var id = $(this).attr('rel');

		$object = $(this).parent().parent();

		$.ajax( {
			url : "<?php echo site_url('sale/clean_contact');?>" ,
			type : "POST" , 
			data : { "id" : id } ,
			success : function( data) {

				if( data == '1')
				{
					$object.remove();

					//$('.page-header').after('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>客户清理成功 !</div>');
				}else
				{
					//$('.page-header').after('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>客户清理失败 !</div>');
				}

			} ,

		} );
	});

	$('.mot-button[rel="add"]').on( 'click' , function (){

		$textarea = $(this).prev('textarea');

		var id = $textarea.attr('data-textarea');

		var text = $textarea.val();

		$.ajax( {
			
			url : "<?php echo site_url('sale/add_contact');?>" , 

			type : 'POST' ,

			data : { 'id' : id , 'text' : text}  ,

			success : function( data) {

				if( data === '911')
				{
					//$('.page-header').after('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>客户沟通记录添加失败 !</div>');
				}else
				{
					data = eval( '(' + data + ')');

					//$('.page-header').after( '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>客户<strong>'+data.name+'</strong>的沟通记录添加成功!</div>');					
				}


			} , 
			complete : function (event,request, settings) {
				//$('.mot-small').text('').append('请求完成 返回'+request);
			},

		});

	});

    $('.datetimepicker').on( 'change' , function() {

    		var date 		= $(this).val();
    		var contact_id 	= $(this).attr('rel');

            $.ajax({
                url: "<?php echo site_url('sale/add_remind');?>" ,
                data: {'contact_id' : contact_id , 'date' : date },
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                },
                success: function ( data ) {

                	//if( data )
                   	//$('.page-header').after( '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>回访时间添加成功!</div>');	
                },
                complete: function () {

                }
            });

    });

    $('.log').on( 'mouseover' , function() {

    	$(this).attr({'data-content':''});

    	var id = $(this).attr('data');

    	$this = $(this);

    	$.ajax( {
    		url : "<?php echo site_url('sale/get_contacts_log');?>" ,
    		data : { 'id' : id } , 
    		type : 'POST' , 
    		dataType: 'json' , 
    		success : function ( data ) {
    			if( data != '911'){
    				str = '';
    				for (var i = 0; i <  data.length ; i++) {
    					str += '<div class="alert alert-info"><span class="badge badge-info">'+data[i].date+'</span><br/>'+data[i].response+'</div>';	
    				};    	

    				$this.attr({ 'data-content' : str});

    			}else
    			{
    				//$('.page-header').after('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>暂时没有沟通记录!</div>');
    			}
    		} ,
    		complete : function () {

    		} ,
    	});
    });
});
</script>

<div style="margin:20px;">

    <div class="btn-group">
    	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    		状态
    	<span class="caret"></span>
    	</a>
    	<ul class="dropdown-menu">
    		<li><a href="<?php echo site_url('sale/set_condition/default');?>">所有客户</a></li>
    		<?php foreach ($tags as $tag) { ?>
    			<li><a href="<?php echo site_url('sale/set_condition/'.$tag['id']);?>"><?php echo $tag['tag'];?> - <?php echo $tag['name'];?></a></li>
    		<?php }?>
    	</ul>
    </div>

    <div class="btn-group">
    	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    	排列
    	<span class="caret"></span>
    	</a>
    	<ul class="dropdown-menu">
    		<li><a href="<?php echo site_url('sale/set_condition/default');?>">默认</a></li>
    		<li><a href="<?php echo site_url('sale/set_condition/timecreated');?>">添加时间</a></li>
    		<li><a href="<?php echo site_url('sale/set_condition/userid');?>">ID号</a></li>
    	</ul>
    </div>

	<form class="form-inline pull-right" action="" method="post">
		<input type="text" name="key" />
		<button class="btn btn-primary" name="contact_search" value="1">搜索</button>
		<span class="help-block">会在一页列出所有符合条件的结果</span>
	</form>

</div>

<br/>

<table class="mot-table">
	<tr>
		<td class="span1">ID</td>
		<td class="span1">回访日期</td>
		<td class="span1">状态</td>
		<td class="span1">姓名</td>
		<td class="span1">电话号码</td>
		<td class="span1">手机号码</td>
		<td class="span1">Email</td>
		<td class="span2">沟通记录</td>
		<td class="span1">添加沟通记录</td>
		<td class="span1">操作</td>
		<td class="span1">用户来源</td>
		<td class="span1">备注</td>
		<td class="span1">删除记录</td>
	</tr>
	<?php foreach ($contacts as $one ) { ?>
	<tr data-modal="<?php echo $one['id'];?>">

		<td class="switch_color <?php echo $color[$one['display_color']];?>" data-write="<?php echo $one['display_color'];?>" rel="<?php echo $one['id'];?>">
			<?php echo $one['id'];?>
		</td>
		
		<td>
			<input class="datetimepicker" rel="<?php echo $one['id'];?>" type="text" value="<?php echo date( 'Y-m-d h:i:s' , $one['datereminded'] );?>" />
		</td>
		
		<td>

			<select class="mot-select" data-source="<?php echo $one['id'];?>">
				<option value="">选择状态</option>
				<?php foreach ($tags as $tag) { ?>
					<option value="<?php echo $tag['id'];?>" <?php if( $tag['id'] == $one['tag_id'] ){?>selected="selected"<?php }?>><?php echo $tag['tag'];?></option>
				<?php }?>	
			</select>

		</td>
		
		<td>
			<a href="<?php echo site_url('sale/contact/'.$one['id']);?>" id="<?php echo $one['id'];?>"><?php echo $one['name'] ? $one['name'] : $one['id'];?></a>
		</td>

		<script type="text/javascript">
		$( function () {
			
			var aboutPC = {
    			name: "<a href='<?php echo site_url('sale/contact/'.$one['id']);?>'><?php echo $one['name'];?></a>" ,
    			status :  "<?php echo $one['tag'] . ' - ' . $one['tagname'];?>" , 
    			gender : "<?php if( $one['gender'] == 1){echo '男';}else if( $one['gender'] == 2) {echo '女';}else{echo '保密';}?>" , 
    			company: "<a href='<?php echo site_url('sale/view_corporation/'.$one['company_id']);?>'><?php echo $one['companyname'];?></a>" ,
    			job: "<?php echo $one['job']?>",
    			phone: "<?php echo $one['office_phone'];?>" ,
    			mobile: "<?php echo $one['mobile']?>" ,
    			email: "<?php echo $one['email'];?>" , 
    			account: "<?php echo $one['username']? $one['username'] : '还不是网站会员' ;?>" ,
			};

			$('#<?php echo $one['id'];?>').hovercard({
    				showCustomCard: true, 
    				customCardJSON: aboutPC
				});
		});
		</script>

			
		<td><?php //echo $one['office_phone'];?> 
			<a href="#myModal" data-toggle="modal" rel="<?php echo $one['office_phone'];?>" idn="<?php echo $one['id'];?>" data-name="<?php echo $one['name'];?>" data-type="固定电话"><i class="icon-phone icon-2x"></i></a>
			<br/><?php echo $one['office_phone'];?> 
		</td>


		<td>
			 <a href="#myModal"  data-toggle="modal" rel="<?php echo $one['mobile'];?>" idn="<?php echo $one['id'];?>" data-name="<?php echo $one['name'];?>" data-type="手机"><i class="icon-mobile-phone icon-2x"></i></a>
			 <br/><?php echo $one['mobile'];?>
		</td>

		<td><a href="mailto:<?php echo $one['email'];?>"><i class="icon-envelope icon-2x"></i></a></td>

		<td>
			<a href="javascript:void(0);" class="popover-btn log" data="<?php echo $one['id'];?>" data-toggle="popover" data-placement="bottom" title="沟通记录">
			<i class="icon-file-text-alt icon-2x"></i>
			</a>
		</td>
		
		<td>
			<textarea class="mot-textarea" data-textarea="<?php echo $one['id'];?>"></textarea>
			<button class="mot-button" rel="add">添加</button>
		</td>
		<td>
				<button class="mot-button contact-clean" rel="<?php echo $one['id'];?>">清理</button>
		</td>
		<td><a href="javascript:void(0);" class="popover-btn" data-toggle="popover" data-placement="top" data-content="<?php echo $one['filename'];?>" title="资料来源 <?php echo $one['filename'] ? '文件' : ( $one['user_id'] ? '网站会员' : '录入');?>" ><?php echo $one['filename'] ? cutstr($one['filename'] , 8 , '') : ( $one['user_id'] ? '网站会员' : '录入');?></a></td>
		<td><?php echo $one['event'];?></td>
		<td class="span1"><a href="<?php echo site_url('sale/remove_remind/'.$one['event_id']);?>"><i class="icon-remove"></i></a></td>
	</tr>
	<?php }?>
</table>


<?php $this->load->module( 'webkit/pagination/show' , array('offset' => $offset , 'sum' => $sum) );?>


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



<script>
	$( function() {

	$('a[data-toggle="modal"]:not(".log")').on('click' , function(){

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

<script>
$( function(){
	$('.tooltips').tooltip();
});
</script>