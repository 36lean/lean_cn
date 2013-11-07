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
    <div class="well">

    <a class="pull-left" href="<?php echo base_url()?>index.php/course/edit_course/<?php echo $course['id']?>">
        <img class="grayscale" src="<?php echo $constant['discuz_url']?>uploads/course/<?php echo $course['logo']?>" style="width:80px;height:40px;"/>
    </a>


     <h5 class="media-heading text-center">&nbsp;&nbsp;<?php echo $course['fullname']?></h5>

         <ul class="nav nav-pills">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $course['category']?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php foreach( $category as $key => $value){?>

                        <li><a href="#" rel="<?php echo $key;?>"><?php echo $value;?></a></li>

                    <?php }?>
                </ul>
            </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php echo $course['is_free'] ? '免费' : '收费'?> 
            <b class="caret"></b></a>
            
                <ul class="dropdown-menu">
                    <li><a>收费</a></li>
                    <li><a>免费</a></li>
                </ul>
            </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php echo $course['is_hidden'] ? '隐藏' : '可见'?>
            <b class="caret"></b></a>
            
                <ul class="dropdown-menu">
                    <li><a>隐藏</a></li>
                    <li><a>可见</a></li>
                </ul>
            </li>

        </ul>



        
        
       

     <p>
        <a href="<?php echo base_url()?>index.php/course/edit_course/<?php echo $course['id']?>"><i class="icon-edit"></i> 编辑</a>
        <a href="<?php echo base_url()?>index.php/course/del_course/<?php echo $course['id']?>"><i class="icon-remove"></i> 删除</a>
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
