
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

						<td class="center"><?php echo $c['company_name'];?></td>

						<td class="center"><a href="<?php echo base_url();?>index.php/marketing/mailto/<?php echo $c['id'];?>"><i class="icon-envelope"></i> <?php echo $c['email'];?></a></td>

						<td class="center"><?php echo $c['office_phone'].' ';?></td>

						<td class="center"><?php echo $c['mobile'].' ';?></td>

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

<?php $this->load->module('webkit/pagination/show' , array('offset'=>$offset , 'sum'=>$sum));?>