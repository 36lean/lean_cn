<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<p align="center"><a href="user.php?ac=sub_plan"><img class="img-polaroid lazy" src="<?php echo $_G['siteurl'];?>static/mot/course_banner.gif" data-original="<?php echo $_G['siteurl'];?>static/mot/course_banner.gif" /></a></p>
<div class="container-fluid">
  <div class="row-fluid">


<div class="span3">
  
      <ul class="nav nav-tabs nav-stacked">
          <li class="active"><a href="lesson.php?page_content=1"><h4><i class="icon-list">&nbsp;</i>课程分类</h4></a></li>
            <li><a href="lesson.php"><small><strong>全部课程</strong></small><i class="icon-angle-right pull-right"></i></a></li>
            <li><a href="lesson.php?category=0"><small><strong>免费课程</strong></small><i class="icon-angle-right pull-right"></i></a></li>
            <?php if(is_array($cat)) foreach($cat as $id => $category) { ?>            <li><a href="lesson.php?category=<?php echo $id;?>"><small><strong><?php echo $category;?></strong></small><i class="icon-angle-right pull-right"></i></a></li>
            <?php } ?>


      </ul>
</div>

<div class="span9">
  <?php if(is_array($c)) foreach($c as $key=>$course) { ?>    <div class="course_line">
    <div class="row-fluid">
      
        <div class="span4">
          <a href="lesson.php?pages_list=<?php echo $course['id'];?>">
          <img class="course_cover" src="http://www.36lean.com/uploads/small/<?php echo $course['logo'];?>" alt="<?php echo $course['fullname'];?>" data-original="http://www.36lean.com/uploads/small/<?php echo $course['logo'];?>" />
          </a>
        </div>
        
        <div class="span1"></div>
                    
        <div class="span7">
          <h3><?php echo $course['fullname'];?>&nbsp;<small><?php echo $cat[$course['category_id']];?></small></h3>
          <p class="active"><?php echo cutstr( $course['summary'] , 80 , ' ... ');?></p>
          <a href="lesson.php?pages_list=<?php echo $course['id'];?>" class="btn btn-small btn-danger pull-right">点击开始学习»</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

</div>
</div>
<script>

jQuery(function(){



});

</script>