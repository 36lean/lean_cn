<?php 
global $constant;
$language = muti_language();
?>

<div class="container-fluid">
  <div class="row-fluid">
    <span class="label label-info">编辑课程 <?php echo $course[0]['fullname']?></span> 
    <a href="<?php echo $constant['discuz_url'];?>lesson.php?pages_list=<?php echo $course[0]['id'];?>"><span class="label label-info">查看课程</span></a>
  </div>
</div>


<form name="_course_edit" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="course_id" value="<?php echo $course[0]['id']?>">
<input type="hidden" name="old_logo" value="<?php echo $course[0]['logo']?>">

<div class="container-fluid">
    <div class="row-fluid">


        <div class="span6">
        <table class="table table-bordered table-condensed">
            <tr>
                <td width="20%">课程名称</td> 
                <td width="80%"><input name="fullname" type="text" value="<?php echo $course[0]['fullname']?>" /> </td>
            </tr>
        
            <tr>
                <td>分类</td>
                <td>
                    <select name="category_id">
                        <?php foreach ($category as $item) {?>
                        <option value="<?php echo $item['id']?>" <?php if( $course[0]['category_id'] == $item['id']){?> selected="selected"<?php }?>><?php echo $item['category']?></option>
                        <?php }?>
                    </select>
                </td>
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
        </table>
        
        </div>
        
        <div class="span6">
        <table class="table table-bordered table-condensed">
            <tr>
                <td>封面</td><td><img src="<?php echo $constant['discuz_url']?>uploads/course/<?php echo $course[0]['logo']?>" width="180px"> <input name="photo" type="file" /></td>
          </tr>
                
            <tr>
                <td>内容</td>
                <td><textarea name="summary" class="span12" rows=5><?php echo $course[0]['summary']?></textarea></td>
            </tr>
        </table>
        
        </div>
    
        <div class="span12"><input class="btn btn-primary" type="submit" name="done" value="更新" /></div>
        
    
    </div>
</div>

</form>
<hr/>


<span class="label label-info">批量添加课程章节：1.上传课程Excel2007版文件 -> 2. 查看生成课程预览  ->  3.从缓存添加课程小节内容</span>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<table class="table table-condensed">
    <tr>
        <td>
            1.上传Excel文件： <input class="input-file uniform_on" id="info" name="info" type="file">	
        </td>
        <td>				 
            <button name="preview" type="submit" class="btn btn-success">2 . 生成预览</button>
        </td>
        <td>
        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/course/edit_course/<?php echo $course[0]['id'];?>/generate">3 . 从缓存生成课程</a>
        </td>
    </tr>
</table>
</form>


<hr/>
<span class="label label-info">编辑本节的章节(页面)</span>


<form action="" method="post">
<table class="table table-bordered table-condensed">
<tr>
	<td>选择</td>
	<td>序号</td> 
	<td>封面</td> 
    <td>标题</td> 
    <td>视频文件</td> 
    <td>路径</td> 
    <td>字幕zh</td> 
    <td>字幕tw</td> 
    <td>字幕en</td> 
    <td>语音</td> 
    <td>时长</td>  
    <td>操作</td>
</tr>

<form action="" method="post" enctype="multipart/form-data">
<tr>
	<td></td>
	<td><input class="span1"      name="" type="text" value="" /> </td>
	<td><input class="span1" 		name="image_file" type="file" style="width:40px;" /></td>
	<td><input class="span1"      name="title" type="text" value="" /> </td>
	<td><input class="span1"      name="v_file" type="text" value="" /></td>
	<td><input class="span1"      name="v_path" type="text" value="" /></td>
	<td><input class="span1"      name="label_cn" type="text" value="" /></td>
	<td><input class="span1"      name="label_tw" type="text" value="" /></td>
	<td><input class="span1"      name="label_en" type="text" value="" /></td>
	
	<td>
		<select class="span1" name="v_voice">
		<?php foreach ($language as $key => $value) { ?>
			<option value="<?php echo $key;?>"><?php echo $value;?></option>
		<?php }?>
		</select>
	</td>
	<td><input class="span1"      name="v_time" type="text" value="" /></td>

	<td><input class="btn btn-small" name="add_page" type="submit" value="添加" /></td>
</tr>
</form>
<?php global $constant;?>
<?php foreach ($pages as $page) {
?>

<tr>
	<td>
		<input name="<?php echo $page['id'];?>_check" checked="checked" type="checkbox" />
	</td>

	<td><input class="span1" name="<?php echo $page['id'];?>_sortid" value="<?php echo $page['sort_id'];?>" type="text"></td>

	<td>
	<a href="<?php echo $constant['discuz_url']?>lesson.php?page_content=<?php echo $page['pid']?>" target="blank">
		<?php if( file_exists( $constant['uploads_path'] . '/page/'. $page['image_file'] )) {?>
		<img class="img-polaroid" width="100px" src="<?php echo $constant['discuz_url'] .  'uploads/page/' .$page['image_file'];?>" />
		<?php }else {?>
		<img class="img-polaroid" width="100px" src="<?php echo $config['videourl'] . $page['v_path'] .  '/PNG/' .$page['image_file'];?>" />
		<?php }?>
	</a>
	</td>
	<td class="<?php echo $page['id'];?>_title"><input class="span1" name="<?php echo $page['id'];?>_title" type="text" value="<?php echo $page['v_name'] ?>" /> </td>
	<td class="<?php echo $page['id'];?>_file"><input class="span1" name="<?php echo $page['id'];?>_file" type="text" value="<?php echo $page['v_file']?>" /></td>
	<td class="<?php echo $page['id'];?>_path"><input class="span1" name="<?php echo $page['id'];?>_path" type="text" value="<?php echo $page['v_path']?>" /></td>
	<td class="<?php echo $page['id'];?>_cn"><input class="span1" name="<?php echo $page['id'];?>_cn" type="text" value="<?php echo $page['label_cn']?>" /></td>
	<td class="<?php echo $page['id'];?>_tw"><input class="span1" name="<?php echo $page['id'];?>_tw" type="text" value="<?php echo $page['label_tw']?>" /></td>
	<td class="<?php echo $page['id'];?>_en"><input class="span1" name="<?php echo $page['id'];?>_en" type="text" value="<?php echo $page['label_en']?>" /></td>
	<td class="<?php echo $page['id'];?>_voice">

		<select class="span1" name="<?php echo $page['id'];?>_voice">
		<?php foreach ($language as $key => $value) { ?>
			<option <?php if ($page['v_voice'] == $key){?>selected="selected"<?php }?> value="<?php echo $key;?>"><?php echo $value;?></option>
		<?php }?>
		</select>
	</td>
	<td class="<?php echo $page['id'];?>_time"><input class="span1" name="<?php echo $page['id'];?>_time" type="text" value="<?php echo $page['v_time']?>" /></td>
	<td>
		<button class="btn btn-mini btn-primary fixedup" type="button" rel="<?php echo $page['id'];?>">保存</button>
		<a href="<?php echo base_url();?>index.php/course/edit_page/<?php echo $page['pid'];?>"><span class="label">更多</span></a>
		<a href="<?php echo base_url();?>index.php/course/delete_page/<?php echo $page['pid'];?>"><span class="label">删除</span></a>
	</td>
</tr>
<?php
}
?>
</table>
<button type="submit" name="update_all" class="btn btn-primary" value="1">更新全部</button>

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
<p>Date: <input type="text" id="datepicker" /></p>
<?php }?>



<script>
	$(function() {
		

		$('button.fixedup').on('click',function(){

			var id = $(this).attr('rel');

			var title = $('.'+id+'_title').find('input').val();
			var file  = $('.'+id+'_file').find('input').val();
			var path  = $('.'+id+'_path').find('input').val();
			var cn = $('.'+id+'_cn').find('input').val();
			var tw = $('.'+id+'_tw').find('input').val();
			var en = $('.'+id+'_en').find('input').val();
			var time = $('.'+id+'_time').find('input').val();
			var voice =  $('.'+id+'_voice').find('select').val();

			$.ajax({

				url : "<?php echo site_url('course/ajax_update');?>" , 
				type : "POST" , 
				data : { 'id' : id , 'v_name' : title , 'v_file' : file , 'v_path' : path , 'label_cn' : cn , 'label_tw' : tw , 'label_en' : en , 'v_time' : time , 'v_voice' : voice} , 
				success : function( data) {

					if( data === '1')
						alert(' [ '+title+' ] 更新成功');

				} , 

			});
		});
	});
</script>