<div class="row-fluid">
	<form class="form-inline" action="" method="get">
		<input name="key" type="text" />
		<select name="field">
			<option value="name">客户名字</option>
			<option value="corporation_name">公司</option>
			<option value="tag">标签</option>
			<option value="email">电子邮件</option>
			<option value="phone">电话</option>
			<option value="mobile">手机号</option>
		</select>
		<button name="search" class="btn btn-primary" name="submit" type="submit" value=1>搜索</button>
	</form>
</div>

<div class="row-fluid">
	<div class="box span12">

		<div class="box-content" style="font-size:12px;">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th class="span2">标签</th>
						<th class="span1">客户</th>
						<th class="span3">公司</th>
						<th class="span1">电话</th>
						<th class="span1">手机号</th>
						<th class="span1">电邮</th>
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

						<td class="center"><?php echo $c['tag'];?></td>
						
						<td class="center"><a href="<?php echo base_url();?>index.php/marketing/connect/<?php echo $c['id'];?>" target="blank"><i class="icon-user"></i> <?php echo $c['name'];?></a></td>

						<td class="center"><?php echo $c['comp_name'];?></td>

						<td class="center"><?php echo $c['phone'].' ';?></td>

						<td class="center"><?php echo $c['mobile'].' ';?></td>

						<td class="center"><a href="<?php echo base_url();?>index.php/marketing/mailto/<?php echo $c['id'];?>"><i class="icon-envelope"></i> <?php echo $c['email'];?></a></td>

						<td class="center"><?php echo $c['username'].' ';?></td>

						<td class="center"><?php echo $c['file_name'].' ';?></td>

						<td class="center">
							<a href="<?php echo base_url();?>index.php/client/throw_profile/<?php echo $c['id'];?>" target="blank">
								<i class="icon-remove icon-white">
								</i> 
								废纸篓
							</a>
						</td>
					</tr>
					<?php
					}?>
				</tbody>
			</table>
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
<div class="row-fluid">
<div class="box-content">
	<p>总记录数: <?php echo $sum;?> 当前页: <?php echo $page;?> 每页记录数: <?php echo $offset;?> 当前页记录数: <?php echo $current;?></p>

	<?php 
		if( $page < 3)
			$page = 3;
	?>
    <div class="pagination pagination-centered">
       	<ul>
           	<li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page-1;?>">&laquo;</a></li>
           	<?php if( $page >=3){?>
            <li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page-2;?>"><?php echo $page-2;?></a></li>
            <?php }?>
            <?php if( $page >=2){?>
            <li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page-1;?>"><?php echo $page-1;?></a></li>
			<?php }?>
            <li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page;?>"><?php echo $page;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page+1;?>"><?php echo $page+1;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page+2;?>"><?php echo $page+2;?></a></li>
            <li><a href="<?php echo base_url();?>index.php/marketing/index/<?php echo $page+1;?>">&raquo;</a></li>
        </ul>


    </div>	

</div>
</div>