<a href="<?php echo base_url();?>index.php/course/"><span class="label"><i class="icon-th"></i> 详细视图</span></a>
<a href="<?php echo base_url();?>index.php/course/list_mode"><span class="label label-info"><i class="icon-list-ul"></i> 列表视图</span></a>
<a href="<?php echo base_url();?>index.php/course/update_cache"><span class="label label-success"><i class="icon-list-ul"></i> 更新缓存</span></a>

<hr />
<div class="container-fluid">
<div class="row-fluid">
<?php
global $constant;
$f = 0;
foreach ($list as $course) {
?>
	
<div class="span4">
    <a class="pull-left" href="<?php echo base_url()?>index.php/course/edit_course/<?php echo $course['id']?>">
        <img class="grayscale" src="<?php echo $constant['discuz_url']?>uploads/course/<?php echo $course['logo']?>" style="width:120px;height:60px;"/>
    </a>
    <div class="media-body">
     <h5 class="media-heading text-center">&nbsp;&nbsp;<?php echo $course['fullname']?></h5>
     <p class="text-center">&nbsp;&nbsp;<span class="label label-info"><strong>类别</strong> <?php echo $course['category']?></span></p>
     <p class="text-center"><strong>&nbsp;&nbsp;
        <?php echo $course['is_free'] ? '<span class="label label-important">免费</span>' : '<span class="label label-info">收费</span>'?> 
        <?php echo $course['is_hidden'] ? '<span class="label label-inverse">隐藏</span>' : '<span class="label label-success">可见</span>'?>
    </strong>
    </p>
     <p class="text-center">
        <small><a href="<?php echo base_url()?>index.php/course/edit_course/<?php echo $course['id']?>"><i class="icon-edit"></i> 编辑</a></small> 
        <small><a href="<?php echo base_url()?>index.php/course/del_course/<?php echo $course['id']?>"><i class="icon-remove"></i> 删除</a></small>
     </p>
    </div>
</div>
<?php
	++$f;
	if( !($f % 3)){
		echo '</div></div><br /><div class="container-fluid"><div class="row-fluid">';
	}
}
?>
</div>
</div>
