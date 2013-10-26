<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('sub_plan');?><?php include template('user/header'); ?><ul class="breadcrumb">
<li><a href="user.php">用户中心</a> <span class="divider">/</span></li>
    <li>学习 <span class="divider">/</span></li>
    <li><a href="user.php?ac=sub_plan">学习计划</a></li>
</ul>

<h3><i class="icon-book"></i> 推荐给我的课程</h3><?php if(is_array($free_course)) foreach($free_course as $course) { ?><div class="row-fluid">
    <div class="page-header">
    <h4><i class="icon-coffee"></i> <?php echo $course['fullname'];?> <small><span class="label label-success">免费课程</span></small></h4>
    </div>
</div>
  <div class="row-fluid">
    <div class="row-fluid">
      <div class="span4">
        <a href="lesson.php?pages_list=<?php echo $course['id'];?>">
        <img class="img-polaroid" src="uploads/course/<?php echo $course['logo'];?>" alt="试听课程" />
        </a>
      </div>

      <div class="span2"></div>

    <div class="span6">
        <p><?php echo $course['summary'];?></p>
            <a class="btn btn-primary pull-left" href="lesson.php?pages_list=<?php echo $course['id'];?>">开始学习</a>
    </div>
    </div>
    </div>
<?php } include template('user/footer'); ?>