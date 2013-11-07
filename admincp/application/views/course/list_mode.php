<a href="<?php echo base_url();?>index.php/course/"><span class="label label-info"><i class="icon-th"></i> 详细视图</span></a>
<a href="<?php echo base_url();?>index.php/course/list_mode"><span class="label"><i class="icon-list-ul"></i> 列表视图</span></a>
<a href="<?php echo base_url();?>index.php/course/update_cache"><span class="label label-success"><i class="icon-list-ul"></i> 更新缓存</span></a>

<div class="box-content">
<form action="" method="post">
<table class="table table-striped table-bordered bootstrap-datatable datatable">
<thead>
<tr>
	<td>修改序号</td>
	<td>序号</td>
	<td>分组</td>
	<td>课程名</td>
	<td>类型</td>
	<td>状态</td>
	<td>视频</td>
	<td>中文视频</td>
	<td>英文视频</td>
</tr>
</thead>

<tbody>
<?php 

foreach ($list as $course) {
?>
<tr>
	<td><strong><input class="span1" type="text" name="<?php echo $course['id'];?>" value="<?php echo $course['sortid'];?>"></strong></td>
	<td><strong><?php echo $course['sortid'];?></strong></td>
	<td><span class="label label-info"><?php echo $category[$course['category_id']]?></span></td>
	<td><strong>
		<a href="<?php echo base_url()?>index.php/course/edit_course/<?php echo $course['id']?>"><?php echo $course['fullname']?> <i class="pull-right icon-angle-right"></i></a> 
	</strong></td>
	<td>
		<?php echo ($course['is_free']) ? '<span>免费课程</span>' : '<span>收费课程</span>'?>
	</td>
	
	<td>
		<?php echo ($course['is_hidden']) ? '<span>隐藏课程</span>' : '<span>公开课程</span>'?>
	</td>
	<td><span><?php echo $course['count']?></span></td>
	<td class="ajax_get_cn" data="<?php echo $course['id']?>"></td>
	<td class="ajax_get_en" data="<?php echo $course['id']?>"></td>
</tr>
<?php
}
?>
</tbody>
</table>

<button class="btn btn-primary btn-large" name="save" type="submit">保存设置</button>
</form>
</div>

<div id="console"></div>
<script>
$( function () {
	$('div .ajax_get_cn').each( function () {
		var $obj = $(this);
		$.ajax({ 
			type	:	"POST",
			url 	: 	"<?php echo base_url()?>index.php/ajax/get_lang_sum_by_course_id",
			data 	: 	{id : $(this).attr("data") , lang : 'cn'},
			success : function ( response) {
				$obj.append( "<span class=''>"+response+"</span>");
			},
		});
	});
	$('div .ajax_get_en').each( function () {
		var $obj = $(this);
		$.ajax({ 
			type	:	"POST",
			url 	: 	"<?php echo base_url()?>index.php/ajax/get_lang_sum_by_course_id",
			data 	: 	{id : $(this).attr("data") , lang : 'en'},
			success : function ( response) {
				$obj.append(  "<span>"+response+"</span>");
			},
		});
	});
})
</script>