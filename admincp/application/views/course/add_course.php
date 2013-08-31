<form name="" action="" method="post" enctype="multipart/form-data">
<h4><i class="icon-check"></i> 课程信息</h4>
<dl class="dl-horizontal">
	<dt>课程名字</dt>
	<dd><input name="fullname" class="span8" type="text" /></dd>

	<dt>课程分类</dt>
	<dd>
		<select name="category_id" class="span8" >
			<?php foreach ($category as $cate) {
				echo '<option value="'.$cate['id'].'">'.$cate['category'].'</option>';
			}?>
		</select>
	</dd>

	<dt>课程介绍 ( 简短版 )</dt>
	<dd><input name="shortname" class="span8" type="text" /></dd>

	<dt>课程介绍 ( 详细版 )</dt>
	<dd><input name="summary" class="span8" type="text" /></dd>

	<dt>课程类型</dt>
	<dd>
		<label class="radio"><input name="is_free" value="1" type="radio" /><span class="label label-important">免费</span></label> 
		<label class="radio"><input name="is_free" value="0" type="radio" /><span class="label label-info">收费</span></label>
	</dd>

	<dt>课程状态</dt>
	<dd>
		<label class="radio"><input name="is_hidden" value="1" type="radio" /><span class="label">隐藏</span></label> 
		<label class="radio"><input name="is_hidden" value="0" type="radio" /><span class="label label-inverse">公开</span></label>		
	</dd>
</dl>

<dl class="dl-horizontal">
	<dt>上传封面</dt>
	<dd><input name="logo" type="file" /></dd>
</dl>
	
<dl class="dl-horizontal">
	<dt></dt>
	<dd><button name="build" class="btn btn-success" type="submit"><i class="icon-legal"></i> 创建课程</button></dd>
</dl>


</form>