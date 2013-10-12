<div class="container-fluid">
	<div class="row-fluid">
	<form class="form-inline" action="" method="post">
		<input name="key" type="text" />
		<select name="field">
			<option value="name">客户名字</option>
			<option value="c_name">公司</option>
			<option value="tag">标签</option>
			<option value="email">电子邮件</option>
			<option value="office_phone">电话</option>
			<option value="mobile">手机号</option>
		</select>
		<button name="search" class="btn btn-primary" name="submit" type="submit" value=1>搜索</button>
	</form>
	</div>
</div>

<div class="container-fluid">
	<div class="row-fluid">
		<form class="form-inline" action="" method="post">
		<div class="" style="font-size:12px;">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th class="span1"></th>
						<th class="span1">标签</th>
						<th class="span2">客户</th>
						<th class="span4">公司</th>
						<th class="span1">电话</th>
						<th class="span1">手机号</th>
						<th class="span3">电邮</th>
						<th class="span1">负责人</th>
						<th class="span2">文件</th>
						<th class="span1">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$current = count( $client);

					foreach ($client as $c) {
					?>
					<tr>
						<td class="span1"><input type="checkbox" name="<?php echo $c['id'];?>"></td>

						<td class="center"><?php echo $c['tag'];?></td>
						
						<td class="center"><a href="<?php echo site_url('client/edit_contact/'.$c['id']);?>" target="blank"><i class="icon-user"></i> <?php echo $c['name'];?></a></td>

						<td class="center"><?php echo $c['company_name'];?></td>

						<td class="center"><?php echo $c['office_phone'];?></td>

						<td class="center"><?php echo $c['mobile'];?></td>

						<td class="center"><a href="<?php echo base_url();?>index.php/marketing/mailto/<?php echo $c['id'];?>"> <?php echo $c['email'];?></a></td>

						<td class="center"><?php echo $c['salesman'];?></td>

						<td class="center"><small><?php echo $c['filename'];?></small></td>

						<td class="center">
							<a href="<?php echo base_url();?>index.php/client/throw_profile/<?php echo $c['id'];?>" target="blank">
								<i class="icon-remove icon-white">
								</i>
							</a>
						</td>
					</tr>
					<?php
					}?>
				</tbody>
			</table>
		</div>

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

		<input class="btn btn-primary" type="button" id="all_pick" name="all_pick" value="全选" />
		
		<select name="salesman">
			<?php foreach ($salesmans as $salesman) { ?>
				<option value="<?php echo $salesman['uid'];?>"><?php echo $salesman['username'];?></option>
			<?php }?>
		</select>


		<button class="btn btn-primary" type="submit" name="switch_salesman" value="1">修改销售人员</button>
		</form>
	</div>
</div>



<?php 
$this->load->module('webkit/pagination/show' , array($offset , $sum));
?>