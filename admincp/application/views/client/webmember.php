<form class="form-inline" action="" method="post">

		<label>关键字正则</label>
			<input name="preg_str" type="text" />

		<label>筛选字段</label>

			<select name="column">
				<option value="email">email</option>
				<option value="username">username</option>
				<option value="position">position</option>
				<option value="email">email</option>
			</select>

		<button class="btn btn-primary" name="filter" value="1">筛选</button>
</form>

<hr/>
<div class="page-header">
	<h4><?php echo $title;?></h4>
</div>

<form class="form-inline" action="" method="post">
<table class="table table-condensed">

	<tr>
		<td class="span1">Action</td>
		<td class="span1">ID</td>
		<td class="span1">Email</td>
		<td class="span2">用户名</td>
		<!--<td class="span1">电话</td>-->
		<!--<td class="span1">手机</td>-->
		<td class="span2">公司</td>
		<td class="span1">职位</td>
		<td class="span1">负责人</td>
		<td class="span1">注册日期</td>
		
	</tr>


	<?php foreach ($members as $m) :?>

	<tr>
		<td><input type="checkbox" name="<?php echo $m['uid'];?>"/></td>
		<td><?php echo $m['uid'];?></td>
		<td><?php echo $m['email'];?></td>
		<td><a href="<?php echo site_url('client/edit_webmember/'.$m['uid']);?>"><?php echo $m['username'];?></a></td>
		<!--<td><?php echo $m['telephone'];?></td>-->
		<!--<td><?php echo $m['mobile'];?></td>-->
		<td><?php echo $m['company'];?></td>
		<td><?php echo $m['position'];?></td>	
		<td><span class="label label-success"><?php echo $m['salesman'];?></span></td>	
		<td><?php echo date('Y-m-d h' , $m['regdate']) ;?></td>
			
	</tr>

	<?php endforeach ?>

</table>



<input class="btn btn-primary" type="submit" name="clear" value="清理" />
<input class="btn btn-primary" type="button" id="all_pick" name="all_pick" value="全选" />
<input class="btn btn-primary" type="submit" name="arrange" value="分配给销售" />
<select name="assign_to">
	<?php foreach ($master as $m) {?>
	<option value="<?php echo $m['uid'];?>"><?php echo $m['username'];?> - <?php echo $m['role_name'];?></option>
	<?php }?>
</select>



</form>


<?php $this->load->module('webkit/pagination/show' , array($offset , $sum));?>


<script>
$( function () {

	$('#all_pick').on('click' , function() {

		$x = $('input[type="checkbox"]');

		if( $x.first().attr('checked') === 'checked'){
			$.each( $x , function(){

				$(this).removeAttr('checked');

			});
			
			$('#all_pick').attr({'value' : '全选'})	

		}else{
			
			$.each( $x , function(){

				$(this).attr({'checked' : 'checked'});

			});

			$('#all_pick').attr({'value' : '全部取消'})	
		}

	});

});
</script>