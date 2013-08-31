<?php 
global $constant;
?>

<span class="label label-info">编辑课程 <?php echo $course[0]['fullname']?></span>

<a href="<?php echo $constant['discuz_url'];?>lesson.php?pages_list=<?php echo $course[0]['id'];?>"><span class="label label-info">查看课程</span></a>

<form class="form_hori" name="_course_edit" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="course_id" value="<?php echo $course[0]['id']?>">
<input type="hidden" name="old_logo" value="<?php echo $course[0]['logo']?>">
<table class="table table-bordered table-condensed">
<tr>
	<td width="20%">课程名称</td> 
	<td width="80%"><input name="fullname" type="text" value="<?php echo $course[0]['fullname']?>" /> </td>
</tr>
<tr>
	<td>封面</td><td><img src="<?php echo $constant['discuz_url']?>uploads/course/<?php echo $course[0]['logo']?>" width="180px"> <input name="photo" type="file" /></td>
</tr>
<tr>
	<td>内容</td>
	<td><textarea name="summary" class="span12" rows=10><?php echo $course[0]['summary']?></textarea></td>
</tr>

<tr>
	<td>是否免费</td>
	<td>
		<label class="radio">
			<input name="is_free" type="radio" value=1 <?php if( $course[0]['is_free']){?> checked="checked"<?php }?>>免费
		</label>
		<label class="radio">
			<input name="is_free" type="radio" value=0 <?php if( !$course[0]['is_free']){?> checked="checked"<?php }?>>收费
		</label>

	</td>
</tr>

<tr>
	<td>是否隐藏</td>
	<td>
		<label class="radio">
			<input name="is_hidden" type="radio" value=1 <?php if( $course[0]['is_hidden']){?> checked="checked"<?php }?>>隐藏
		</label>
		<label class="radio">
			<input name="is_hidden" type="radio" value=0 <?php if( !$course[0]['is_hidden']){?> checked="checked"<?php }?>>公开
		</label>
	</td>
</tr>

<tr><td>分类</td>
	<td>
		<select name="category_id">
			<?php foreach ($category as $item) {?>
			<option value="<?php echo $item['id']?>" <?php if( $course[0]['category_id'] == $item['id']){?> selected="selected"<?php }?>><?php echo $item['category']?></option>
			<?php }?>
		</select>
	</td>
</tr>

<tr>
	<td>更新</td>
	<td>
		<input class="btn" type="submit" name="done" value="更新" />
	</td>
</tr>

</table>
</form>

<span class="label label-success">New! 生成课程内容</span>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="control-group">
		<label class="control-label" for="info">课程信息excel文件</label>
		<div class="controls">
		<input class="input-file uniform_on" id="info" name="info" type="file">					 
		<p class="help-block">上传一个文件</p>
		</div>
	</div>
	<button name="preview" type="submit" class="btn btn-success">生成预览</button>
	<a href="<?php echo base_url();?>index.php/course/edit_course/<?php echo $course[0]['id'];?>/generate">从缓存生成课程</a>
</form>

</form>

<hr/>
<span class="label label-info">编辑本节的章节(页面)</span>
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-condensed">

<tr>
	<td>封面</td> <td>标题</td> <td>视频文件</td> <td>路径</td> <td>字幕cn</td> <td>字幕tw</td> <td>字幕en</td>  <td>操作</td>
</tr>
<tr>
	<td><input class="input-small" 		name="image_file" type="file" /></td>
	<td><input class="input-small"      name="title" type="text" value="" /> </td>
	<td><input class="input-small"      name="v_file" type="text" value="" /></td>
	<td><input class="input-small"      name="v_path" type="text" value="" /></td>
	<td><input class="input-small"      name="label_cn" type="text" value="" /></td>
	<td><input class="input-small"      name="label_tw" type="text" value="" /></td>
	<td><input class="input-small"      name="label_en" type="text" value="" /></td>
	<td><input class="btn btn-small" name="add_page" type="submit" value="添加" /></td>
</tr>
</table>

<table class="table table-bordered table-condensed">
<tr>
	<td>封面</td> <td>标题</td> <td>视频文件</td> <td>路径</td> <td>字幕zh</td> <td>字幕tw</td> <td>字幕en</td>  <td>操作</td>
</tr>
<?php global $constant;?>
<?php foreach ($pages as $page) {
?>

<tr>
	<td>
	<a href="<?php echo $constant['discuz_url']?>lesson.php?page_content=<?php echo $page['pid']?>" target="blank">
		<?php if( file_exists( $constant['uploads_path'] . '/page/'. $page['image_file'] )) {?>
		<img class="img-polaroid" width="100px" src="<?php echo $constant['discuz_url'] .  'uploads/page/' .$page['image_file'];?>" />
		<?php }else {?>
		<img class="img-polaroid" width="100px" src="<?php echo $config['videourl'] . $page['v_path'] .  '/PNG/' .$page['image_file'];?>" />
		<?php }?>
	</a>
	</td>
	<td><input class="input-small" type="text" value="<?php echo $page['title'] ?>" /> </td>
	<td><input class="input-small" type="text" value="<?php echo $page['v_file']?>" /></td>
	<td><input class="input-small" type="text" value="<?php echo $page['v_path']?>" /></td>
	<td><input class="input-small" type="text" value="<?php echo $page['label_cn']?>" /></td>
	<td><input class="input-small" type="text" value="<?php echo $page['label_tw']?>" /></td>
	<td><input class="input-small" type="text" value="<?php echo $page['label_en']?>" /></td>
	<td>
		<?php if (false){?><button class="btn"><span class="label label-info">保存</span></button><?php }?>
		<a href="<?php echo base_url();?>index.php/course/edit_page/<?php echo $page['pid'];?>"><span class="label">修改</span></a>
		<a href="<?php echo base_url();?>index.php/course/delete_page/<?php echo $page['pid'];?>"><span class="label">删除</span></a>
	</td>
</tr>
<?php
}
?>
</table>
</form>

<?php if(false){?>
<span class="label label-info">编辑课程附加信息</span>
<dl class="dl-horizontal">
	<dt>类型</dt>
	<dd>
		<select>
			<option>学习指南</option>
			<option>学习路线</option>
		</select>
	</dd>
</dl>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
</script>

<p>Date: <input type="text" id="datepicker" /></p>
<?php }?>