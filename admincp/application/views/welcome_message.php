<!--span-->


<div class="box span3 well">
	<div class="box-header " data-original-title>
		<h4><i class="icon-user"></i> 当前信息</h4>
	</div>
	

		<div class="box-content">
			<ul class="dashboard-list">
				<li>
					<strong>账户名称 :</strong> <?php echo $user['user']?><br>
					<strong>身份类型:</strong> 
						<span class="label label-success">
							<?php if($user['adminid'] == 1) echo '管理员';else {
								echo $user['group'];
							}?>
						</span><br>                                  
					<strong>最后登陆 :</strong> <?php echo date( 'h:i:s Y/m/d ' , $login['updated_date']);?><br>			
				</li>

				<li>
					<strong>总会员数 :</strong> <?php echo $all?><br>
					<strong>今日注册 :</strong> <?php echo $today?><br>
				</li>
			</ul>
		</div>

</div><!--/span-->

<?php if( intval( $user['adminid']) === 1){?>
<div class="span8">
	<div class="well" data-original-title>
		<h4><i class="icon-envelope"></i> 网站留言箱</h4>
	</div>

	<div class="box-content">
		
	<table class="table">
		<tr>
			<td>留言类型</td>
			<td>日期</td>
			<td>名字</td>
			<td>邮件</td>
			<td>会员名</td>
			<td>内容</td>
		</tr>
		<?php foreach ($suggestion_list as $item) {
		?>
		<tr>
			<td><span class="label label-success"><?php echo $item['type'] ? $type[$item['type']] : '没有选择';?></span></td>
			<td><?php echo date('m/d h:i:s' , $item['timecreated']);?></td>
			<td><?php echo $item['name'];?></td>
			<td><?php echo $item['email'];?></td>
			<td><?php echo $item['username'];?></td>
			<td><a href="<?php echo base_url();?>index.php/welcome/view_suggestion/<?php echo $item['id']?>"><?php echo cutstr( $item['message'] , 60);?></a></td>
		</tr>
		<?php
		}?>
	</table>
	</div>
</div>
<?php }?>
