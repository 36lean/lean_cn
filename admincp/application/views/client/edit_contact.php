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

<div class="alert alert-info"><i class="icon-comment-alt"></i> 沟通记录</div>

<table class="table table-striped">
<?php foreach ($connect as $conn) : ?>
<tr>
	<td class="span2"><a href="<?php echo site_url('client/edit_connect_record/'.$conn['id']);?>"><i class="icon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('m-d h:s' , $conn['date']) ;?></td>
	<td class="span10">
	<?php echo $conn['response'];?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<form action="" method="post">
<input name="client_id" type="hidden" value="<?php echo $profile['id'];?>" />
<div class="control-group">
<div class="controls">
<textarea class="ckeditor" name="connect_text"></textarea>
</div>
</div>

<div class="control-group">
<div class="controls">
<button class="btn btn-success" name="add_connect" value="1">添加记录</button>
</div>
</div>
</form>

<div class="row">
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
$percent = $finish * 100 / 19 ;
?>
<p class="text-info">当前资料完整度: <?php echo sprintf("%.2f" , $percent) , '%';?></p>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo $percent;?>%;"></div>
</div>


<table class="table table-bordered">
<tr>
	<td>联系人名字</td><td><?php echo $profile['name'];?></td>
</tr>
<tr>
	<td>年龄</td><td><?php echo $profile['age'];?></td>
</tr>
<tr>
	<td>性别</td><td><?php echo $profile['gender'];?></td>
</tr>
<tr>
	<td>分类</td><td><span class="label label-success"><?php echo $profile['tag'];?></span></td>
</tr>
<tr>
	<td><a href="">所在企业</a></td><td><a href="<?php echo site_url('client/corp_information/'.$profile['company_id']);?>"><?php echo $profile['compname'],' - ',$profile['company_id'];?></td>
</tr>
<tr>
	<td>职务</td><td><?php echo $profile['position'];?></td>
</tr>
<tr>
	<td>邮箱</td><td><?php echo $profile['email'];?></td>
</tr>
<tr>
	<td>联系电话</td><td><?php echo $profile['phone'];?></td>
</tr>
<tr>
	<td>联系手机</td><td><?php echo $profile['mobile'];?></td>
</tr>
<tr>
	<td>传真</td><td><?php echo $profile['fax'];?></td>
</tr>
<tr>
	<td>QQ</td><td><?php echo $profile['qq'];?></td>
</tr>
<tr>
	<td>地址</td><td><?php echo $profile['address'];?></td>
</tr>
<tr>
	<td>邮编</td><td><?php echo $profile['postid'];?></td>
</tr>
<tr>
	<td>网站</td><td><?php echo $profile['website'];?></td>
</tr>
<tr>
	<td>创建日期</td><td><strong><?php echo date('Y年m月d日 h:i' , $profile['created_date']);?></strong></td>
</tr>
<tr>
	<td>备注信息</td><td><?php echo $profile['etc'];?></td>
</tr>
<tr>
	<td>来源</td> <td><?php if( $profile['file_name']){?>文件导入 : <strong><?php echo $profile['file_name'];?></strong><?php }else{?>录入<?php }?></td>
</tr>
</table>

</div>

<div class="span6">
<div class="alert alert-info"><i class="icon-edit"></i> 编辑</div>
<form class="form-horizontal well" action="" method="post">
<input type="hidden" name="id" value="<?php echo $profile['id'];?>">

	<div class="control-group">
		<label class="control-label">客户类型</label>
		<div class="controls">
			<select name="tags">
			<?php foreach ($tag as $t) : ?>
				<option <?php if( $t['value'] === $profile['tags']){?>selected="selected"<?php }?> value="<?php echo $t['value'];?>"><?php echo $t['name'];?></option>
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
			<select>
				<option value="">保密</option>
				<option value="1">男</option>
				<option value="0">女</option>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">职位</label>
		<div class="controls">
			<input type="text" name="position" value="<?php echo $profile['position'];?>" />
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
			<input  type="text" name="phone" value="<?php echo $profile['phone'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">传真</label>
		<div class="controls">
			<input  type="text" name="fax" value="<?php echo $profile['fax'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">QQ</label>
		<div class="controls">
			<input  type="text" name="qq" value="<?php echo $profile['qq'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">地址</label>
		<div class="controls">
			<input  type="text" name="address" value="<?php echo $profile['address'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">邮编</label>
		<div class="controls">
			<input  type="text" name="postid" value="<?php echo $profile['postid'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">网站</label>
		<div class="controls">
			<input  type="text" name="website" value="<?php echo $profile['website'];?>" />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">备注信息</label>
		<div class="controls">
			<textarea name="etc"><?php echo $profile['etc'];?></textarea>
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
