<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<p align="center"><a href="user.php?ac=sub_plan"><img class="img-polaroid lazy" src="<?php echo $_G['siteurl'];?>static/mot/course_banner.gif" data-original="<?php echo $_G['siteurl'];?>static/mot/course_banner.gif" /></a></p>
<div class="container-fluid">
  <div class="row-fluid">


<div class="span3">
  
      <ul class="nav nav-tabs nav-stacked">
          <li class="active"><a href="lesson.php?page_content=1"><h4><i class="icon-list">&nbsp;</i>课程分类</h4></a></li>
            <li><a href="lesson.php?page_content=1"><small><strong>全部课程</strong></small></a></li>
            <li><a href="lesson.php?page_content=2"><small><strong>免费课程</strong></small></a></li>
            <li><a href="lesson.php?page_content=3"><small><strong>精益基础[英语中文]</strong></small></a></li>
            <li><a href="lesson.php?page_content=4"><small><strong>精益基础[中文语音]</strong></small></a></li>
      </ul>
</div>

<div class="span9">
  <?php if(is_array($c)) foreach($c as $key=>$course) { ?>    <div class="course_line">
    <div class="row-fluid">
      
        <div class="span4">
          <img class="http://www.36lean.com/uploads/small/<?php echo $course['logo'];?>" alt="<?php echo $course['fullname'];?>" data-original="http://www.36lean.com/uploads/small/<?php echo $course['logo'];?>" />
        </div>
        
        <div class="span1"></div>
                    
        <div class="span7">
          <h4><?php echo $course['fullname'];?>&nbsp;<small><?php echo $cat[$course['category_id']];?></small></h4>
          <p class="active"><?php echo cutstr( $course['summary'] , 80 , ' ... ');?></p>
          <a href="lesson.php?pages_list=<?php echo $course['id'];?>" class="btn btn-small btn-danger pull-right">点击开始学习»</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>


</div>

</div>

    <div class="span12 pagination" align="center">
      <?php if(isset($_GET['category'])) { ?>
              <ul>
                <li><a href="lesson.php?category=<?php echo $_GET['category'];?>&amp;page=<?php echo $page-1?>">&laquo;</a></li>
                <li class="active"><a href="lesson.php?category=<?php echo $_GET['category'];?>&amp;page=<?php echo $page?>"><?php echo $page?></a></li>
                <li><a href="lesson.php?category=<?php echo $_GET['category'];?>&amp;page=<?php echo $page+1?>"><?php echo $page+1?></a></li>
                <li><a href="lesson.php?category=<?php echo $_GET['category'];?>&amp;page=<?php echo $page+2?>"><?php echo $page+2?></a></li>
                <li><a href="lesson.php?category=<?php echo $_GET['category'];?>&amp;page=<?php echo $page+1?>">&raquo;</a></li>
              </ul>
      <?php } else { ?>
              <ul>

                <?php if($page-2>0) { ?><li><a href="lesson.php?page=<?php echo $page-1?>">&laquo;</a></li><?php } ?>
                <?php if($page-4>0) { ?><li><a href="lesson.php?page=<?php echo $page-2?>"><?php echo $page-4?></a></li><?php } ?>
                <?php if($page-3>0) { ?><li><a href="lesson.php?page=<?php echo $page-1?>"><?php echo $page-3?></a></li><?php } ?>                
                <?php if($page-2>0) { ?><li><a href="lesson.php?page=<?php echo $page-2?>"><?php echo $page-2?></a></li><?php } ?>
                <?php if($page-1>0) { ?><li><a href="lesson.php?page=<?php echo $page-1?>"><?php echo $page-1?></a></li><?php } ?>
                <li class="active"><a href="lesson.php?page=<?php echo $page?>"><?php echo $page?></a></li>
                <?php if($page+1<=$all_pages) { ?><li><a href="lesson.php?page=<?php echo $page+1?>"><?php echo $page+1?></a></li><?php } ?>
                <?php if($page+2<=$all_pages) { ?><li><a href="lesson.php?page=<?php echo $page+2?>"><?php echo $page+2?></a></li><?php } ?>
                <?php if($page+3<=$all_pages) { ?><li><a href="lesson.php?page=<?php echo $page+3?>"><?php echo $page+3?></a></li><?php } ?>
                <?php if($page+4<=$all_pages) { ?><li><a href="lesson.php?page=<?php echo $page+4?>"><?php echo $page+4?></a></li><?php } ?>
                <?php if($page+4<=$all_pages) { ?><li><a href="lesson.php?page=<?php echo $page+1?>">&raquo;</a></li><?php } ?>
              </ul>
      <?php } ?>
    </div>