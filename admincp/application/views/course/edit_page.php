<div class="container-fluid">

<?php 
$language = muti_language();

if( isset($status))
if( 2 === $status) {
?>
<div class="alert alert-info">更新成功<a href="#" class="close" data-dismiss="alert">&times;</a></div>
<?php }else {?>
<div class="alert alert-info">更新失败<a href="#" class="close" data-dismiss="alert">&times;</a></div>
<?php }?>
<h5> - 正在编辑 <?=$page['title']?> - 创建日期 <?=date('Y/m/d' , $page['timecreated'])?> <a href="<?=base_url()?>index.php/course/edit_course/<?=$course['id']?>">返回上一页</a> </h5>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="page_id" value="<?php echo $page['pid']?>">
	<input type="hidden" name="video_id" value="<?php echo $page['id']?>">
	<input type="hidden" name="old_image" value="<?php echo $page['image_file']?>">
<span class="label label-info">编辑课程信息</span>

<table class="table table-condensed table-condensed" width="100%">

	<tr class="success">
		<td><strong>标题</strong></td>
		<td>序号</td>
	</tr>
	<tr>
		<td>
			<input name="title" class="span6" type="text" value="<?php echo $page['title']?>">
		</td>
		<td>
			<input name="sort_id" type="text" value="<?php echo $page['sort_id']?>">
		</td>
	</tr>

	<tr class="success">
		<td><strong>阅读材料内容</strong></td>
		<td></td>
	</tr>
	<tr>
		<td><textarea class="kindeditor" name="contents"><?php echo $page['contents']?></textarea></td>
		<td></td>
	</tr>
</table>


<table class="table table-condensed" width="100%">
	<tr class="success"><td width="50%"><strong>视频文件</strong></td><td width="50%"><strong>所属课程</strong></td></tr>
	<tr>
		<td><input name="v_file" type="text" value="<?php echo $page['v_file']?>" /></td>
		<td><a href="<?=base_url()?>index.php/course/edit_course/<?=$course['id']?>"><?php echo $course['fullname']?></td>
	</tr>

	<tr class="success"><td><strong>视频名称</strong></td><td><strong>视频路径</strong></td></tr>	
	<tr>
		<td><input name="v_name" type="text" value="<?php echo $page['v_name']?>" /></td>
		<td><input name="v_path" type="text" value="<?php echo $page['v_path']?>" /></td>
	</tr>

	<tr class="success"><td><strong>字幕1语言</strong></td><td><strong>字幕1文件</strong></td></tr>
	<tr>
		<td>
			中文简体
		</td>
		<td><input name="label_cn" type="text" value="<?php echo $page['label_cn']?>" /></td>
	</tr>

	<tr class="success"><td><strong>字幕2语言</strong></td><td><strong>字幕2文件</strong></td></tr>
	<tr>
		<td>
			繁体中文
		</td>
		<td><input name="label_tw" type="text" value="<?php echo $page['label_tw']?>" /></td>
	</tr>

	<tr class="success"><td><strong>字幕3语言</strong></td><td><strong>字幕3文件</strong></td></tr>
	<tr>
		<td>
			英文
		</td>
		<td><input name="label_en" type="text" value="<?php echo $page['label_en']?>" /></td>
	</tr>	

	<tr class="success">
		<td><strong>视频语音</strong></td><td><strong>视频时间</strong></td>
	</tr>

	<tr>
		<td>
			<select name="v_voice">
			<?php foreach ($language as $key => $value) { ?>

				<option <?php if( $page['v_voice'] == $key){?>selected="selected"<?php }?> value="<?php echo $key;?>"><?php echo $value;?></option>

			<?php }?>
			</select>
		</td>
		<td><input name="v_time" type="text" value="<?php echo $page['v_time']?>" /></td>
	</tr>

	<tr class="success">
		<td>中文介绍</td><td>英文介绍</td>
	</tr>

	<tr>
		<td><textarea name="cn_intro" class="span6" rows=5><?php echo $page['cn_intro']?></textarea></td>
		<td><textarea name="en_intro" class="span6" rows=5><?php echo $page['en_intro']?></textarea></td>
	</tr>
</table>
</div>

<div class="container-fluid"><div class="row-fluid">
<div class="span6">
<!--
<div class="input-prepend">
	<span class="add-on">上传封面</span>
	<input name="image_file" type="file" />
</div>
-->
</div>

<div class="span6">
	<img class="img-polaroid" src="<?php echo $config['videourl'] . $page['v_path']?>/PNG/<?php echo $page['image_file']?>" width="60%" />
</div>
</div>
</div>

<p><input class="btn btn-success" name="save" type="submit" value="保存" /></p>
</form>