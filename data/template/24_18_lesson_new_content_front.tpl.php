<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
</div>

<script src="<?php echo $_G['siteurl'];?>static/mot/jquery.pin.min.js" type="text/javascript"></script>
<script>
jQuery( function() {
jQuery.ajax({
url : 'lesson.php',
type : 'GET',
data : { click_collection : 1 , id: "<?php echo $content['id'];?>", type:'p'},
dataType:'html',
});
});
</script>

<div class="container">
<p class="text-left">
<a href="lesson.php"><i class="icon-home"></i> Lean学院</a> <span class="divider">/</span> 
<a href="lesson.php?pages_list=<?php echo $course_info['id'];?>"><i class="icon-book"></i> <?php echo $course_info['fullname'];?></a> <span class="divider">/</span> 
<a href="lesson.php?page_content=<?php echo $content['id'];?>"><i class="icon-file"></i> <?php echo $content['title'];?></a>
</p>
</div>

<div class="container">
<h4><i class="icon-facetime-video"></i> 课程</h4>
<hr/>
</div>