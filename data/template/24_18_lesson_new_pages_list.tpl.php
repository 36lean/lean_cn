<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!--<script>
jQuery( function() {
  jQuery.ajax({
    url : 'lesson.php',
    type : 'GET',
    data : { click_collection:1 , id: "<?php echo $lesson['id'];?>", type:'c'},
    dataType:'html',
  });
});
</script>
-->

<div class="container">
<p class="text-left"> 
  <a href="lesson.php"><i class="icon-home"></i> 精益云学院</a> <span class="divider">/</span> 
  <a href="lesson.php?pages_list=<?php echo $lesson['id'];?>"><i class="icon-book"></i> <?php echo $lesson['fullname'];?></a> 
</p>
</div>

<div class="page-header">
  <h2 align="center"><?php echo $lesson['fullname'];?> </h2>
</div>

<div class="row-fluid">

  <div class="span6">
  <blockquote><i class="icon-info-sign"></i> 课程介绍</blockquote>
  <p><?php echo $lesson['summary'];?></p>
  <blockquote><i class="icon-info-sign"></i> 分类</blockquote>
  <p>精益课程</p>
  </div>


  <div class="span6">
    <img class="img-polaroid lazy" src="uploads/course/<?php echo $lesson['logo'];?>" data-original="uploads/course/<?php echo $lesson['logo'];?>" style="width:80%;" />
  </div>
</div>

<hr>

<div class="container-fluid">
<div class="row-fluid">
  <div class="span4">
    <div>

            <?php if(false) { ?>
            <p align="center">
                <?php if($vip['uid']) { ?>
                  <?php if(is_array($favorite)) foreach($favorite as $f) { ?>                    <?php if($f['courseid'] == $lesson['id']) { ?><?php $flag=true?><a class="btn btn-danger btn-medium btn-block" href="lesson.php?cancel_favorite=<?php echo $lesson['id'];?>">取消选课</a><?php } ?>
                  <?php } ?>
                    <?php if(!$flag) { ?>
                    <a class="btn btn-danger btn-medium btn-block" href="lesson.php?add_favorite=<?php echo $lesson['id'];?>">选课</a>
                    <?php } ?>
                  <?php } elseif($_G['uid'] == 0 ) { ?>
                    <a href="forum.php"></a>
                  <?php } else { ?>
                    <a class="btn btn-danger btn-large btn-block" href="vip.php?action=active" target="_blank">开通会员</a>
                  <?php } ?>
            </p>
            <?php } ?>


    <?php if(!$lesson['is_hidden']) { ?>
    
    
  
    <ul class="nav nav-list well">
      <li><h4><i class="icon-list"></i> 导航</h4></li>
      <li class="nav-header"><i class="icon-align-justify"></i> 课程大纲</li>
      <?php if(is_array($pages)) foreach($pages as $p) { ?>      <li><a href="lesson.php?page_content=<?php echo $p['id'];?>"><small><strong><?php echo $p['title'];?></strong></small></a></li>
      <?php } ?>
      
      <?php if(false) { ?>
       <li class="nav-header"><i class="icon-share"></i> 相关链接</li>
       <li><a href=""><strong>关于本课程</strong></a></li>

       <li class="nav-header"><i class="icon-comments-alt"></i> 讨论专题</li>
       <li><a href=""><strong>进入专题页</strong></a></li>
       <?php } ?>
    </ul>
    
    <?php } ?>

    </div>
  </div>


<div class="span8">
  <?php if($lesson['is_hidden']) { ?>

    <div class="alert alert-info">
      很抱歉，本课程正在准备当中，即将推出。。。
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  <?php } else { ?>
            <?php if(is_array($pages)) foreach($pages as $p) { ?>            <div class="container-fluid lesson-item">
            <div class="row-fluid">
              <div class="span4 text-center">
                <a id="<?php echo $p['id'];?>" href="lesson.php?page_content=<?php echo $p['id'];?>" title="<?php echo $p['title'];?>">
                
                <?php if(file_exists( 'uploads/page/'.$p['image_file'])) { ?>
                <img class="img-polaroid lazy" id="<?php echo $p['id'];?>" src="<?php echo $_G['siteurl'];?>/uploads/page/<?php echo $p['image_file'];?>" alt="<?php echo $p['title'];?>" data-original="<?php echo $config['videourl'];?><?php echo $p['v_path'];?>/PNG/<?php echo $p['image_file'];?>" />
                <?php } else { ?>
                <img class="img-polaroid lazy" id="<?php echo $p['id'];?>" src="<?php echo $config['videourl'];?><?php echo $p['v_path'];?>/PNG/<?php echo $p['image_file'];?>" alt="<?php echo $p['title'];?>" data-original="<?php echo $config['videourl'];?><?php echo $p['v_path'];?>/PNG/<?php echo $p['image_file'];?>" />
                <?php } ?>

                </a>
              </div>

              
              <div class="span8">
                <h4>
                  <a id="<?php echo $p['id'];?>" href="lesson.php?page_content=<?php echo $p['id'];?>" title="<?php echo $p['title'];?>">
                    <?php echo $p['title'];?>
                  </a>
                </h4>
                
                <p>
                 <span class="label label-info">语音 : <?php echo $p['v_voice'] == 1 ? '英语' : '普通话'?></span>
                 <span class="label label-info">时长 : <?php echo $p['v_time'];?></span>
                </p>

                <?php echo cutstr( $p['contents'], 140 , ' .. ')?>              </div>

            </div>
            </div>
            <?php } ?>

    <?php } ?>
  </div>




</div>
</div>


