<form action="" method="post">
<p>将勾选的用户 : </p>
<button class="btn btn-primary">加入垃圾注册黑名单</button>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>
							选择
						</th>
						<th>
							用户名
						</th>
						<th>
							Email
						</th>
						<th>
							职位
						</th>
						<th>
							注册日期
						</th>
						<th>
							最后登录
						</th>

					</tr>
				</thead>
				<tbody>
				<?php foreach ($members as $member) {
				?>
					<tr>
						<td>
							<input name="<?php echo $member['uid'];?>" type="checkbox" />
						</td>
						<td class="center">
							<?php echo $member['username'];?>
						</td>
						<td>
							<?php echo $member['email'];?>
						</td>
						<td class="center">
							<?php echo $member['position'];?>
						</td>
						<td class="center">
							<?php echo date('Y/m/d h:i' , $member['regdate']);?>
						</td>
						<td class="center">
							<?php echo $member['lastlogintime'] ? date('Y/m/d h:i' , $member['lastlogintime']) : '暂无数据';?>
						</td>

					</tr>
				<?php
				}?>
				</tbody>
			</table>
		</div>
	</div>


<div class="box-content">
	<p>总记录数: <?php echo $sum;?> 当前页: <?php echo $page;?> 每页记录数: <?php echo $offset;?> 当前页记录数: <?php echo $current;?></p>

	<?php 
		if( $page < 3)
			$page = 3;
	?>
    <div class="pagination pagination-centered">
       	<ul>
           	<li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page-1;?>">&laquo;</a></li>
           	<?php if( $page >=3){?>
            <li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page-2;?>"><?php echo $page-2;?></a></li>
            <?php }?>
            <?php if( $page >=2){?>
            <li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page-1;?>"><?php echo $page-1;?></a></li>
			<?php }?>
            <li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page;?>"><?php echo $page;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page+1;?>"><?php echo $page+1;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page+2;?>"><?php echo $page+2;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/client/dispatch_member/<?php echo $page+1;?>">&raquo;</a></li>
        </ul>
    </div>	

</div>
	<!--/span-->
</div>
<!--/row-->
</form>