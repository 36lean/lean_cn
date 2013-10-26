<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<p><a href="user.php?ac=sub_plan"><img class="img-polaroid lazy" src="<?php echo $_G['siteurl'];?>static/mot/course_banner.gif" data-original="<?php echo $_G['siteurl'];?>static/mot/course_banner.gif" width="99%" /></a></p>

<div class="container-fluid">
  <div class="row-fluid">
    <?php if(is_array($c)) foreach($c as $key=>$course) { ?>    <div class="span4">
      <div class="lesson-box">

      <div class="page-header">
        <h3>
          <?php echo $course['fullname'];?>
          <small>
            <?php echo $cat[$course['category_id']];?>
          </small>
        </h3>
      </div>
        <div class="page-header">
          <a href="lesson.php?pages_list=<?php echo $course['id'];?>">
            <img class="lazy" width="100%" style="height:120px" src="uploads/small/<?php echo $course['logo'];?>"  data-original="uploads/small/<?php echo $course['logo'];?>"
            alt="<?php echo $course['fullname'];?>" />
          </a>
        </div>
          <p class="lead"> <?php echo cutstr( $course['summary'] , 80 , ' ... ');?> </p>
          <p class="text-center"><a class="btn btn-primary btn-large" href="lesson.php?pages_list=<?php echo $course['id'];?>">开始学习</a></p>
    </div>
  </div>

    <?php if(($key+1)%3 === 0) { ?>
    </div>
    </div>
<div class="container-fluid">
  <div class="row-fluid"><?php } ?>
    <?php } ?>

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