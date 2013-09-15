<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>
  .feature-right { margin-bottom: 40px; } 
  .feature{ margin-bottom: 40px;}
  .banner { margin-left:70px;} 
  .quickenter {margin-top:48px;} 
  .home-sign { text-align:center; padding:40px 40px 50px 40px;} 
  .home-sign input { height:34px;}
</style>
<link href="<?php echo $_G['siteurl'];?>static/videojs/video-js.small.css" rel="stylesheet" type="text/css">
<script src="<?php echo $_G['siteurl'];?>static/videojs/video.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
  videojs.options.flash.swf = "<?php echo $_G['siteurl'];?>/static/videojs/video-js.swf";
  var Player = videojs("_video_player");
}
</script>

<div class="container">
  <a href="routing.php">
    <img src="<?php echo $_G['siteurl'];?>static/mot/banner.jpg" data-original="<?php echo $_G['siteurl'];?>static/mot/banner.jpg" />
  </a>
  <hr>
  <div class="span11 home-sign">
    <form class="navbar-form" action="member.php?mod=<?php echo $_G['setting']['regname'];?>" method="post" onsubmit="_submit()">
      <div class="input-append">
        <label>
          在此输入您的邮箱可立即加入我们.
        </label>
        <input class="span4" name="email" type="text" placeholder="输入您最常用的邮箱">
        <button name="findout" type="submit" class="btn btn-info btn-large">
          立即注册
        </button>
      </div>
    </form>
  </div>
  <hr>
  <div class="span8 pull-left">
    <div class="row">
      <div class="span4 feature">
        <h3 class="text-info">
          <i class="icon-thumbs-up"></i> 观看课程
          <small><a href="lesson.php">更多<i class="icon-double-angle-right"></i></a></small>
        </h3>
      <p>        
        <video id="example_video_1" class="video-js vjs-default-skin" controls preload width="100%" height="170" poster="http://oss.aliyuncs.com/36lean/GA/CN/5S/PNG/5S-01.png"
      data-setup="{}">
        <source src="http://36lean.oss.aliyuncs.com/GA/CN/5S/5S-01.mp4?response-content-type=video/mp4" type='video/mp4' />
      </video>
      </p>
      </div>

      <div class="span4 feature-right">
        <h3 class="text-info">
            <i class="icon-thumbs-up"></i> 学院特色
        </h3>
        <p>
          <i class="icon-retweet">
          </i>
          知识的掌握和提炼重在反复复习.视频教学已经可以给您一个对知识的直观的展示，但是要记忆、掌握并融汇贯通，还需要不断的服务和测试.每一个视频课程我们都配以数个针对本课重点知识的测评考试，只有达到80%的准确率才能够完成本课程的学习.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="span4 feature">
        <h3 class="text-info">
            <i class="icon-mobile-phone"></i> 跨平台学习
        </h3>
        <p>
          <i class="icon-plane">
          </i>
          我们的下一步工作是打造移动学习的平台，移动在线学院课程同样为高清课程，同时课程还将可以在电脑，手机，平板电脑等移动设备上观看。同时可以用投影仪放大在培训室进行观看.
        </p>
      </div>
      <div class="span4 feature-right">
        <h3 class="text-info">
            <i class="icon-heart"></i> 加入我们
        </h3>
        <p>
          <i class="icon-pencil">
          </i>
          只要进行免费的简单的
          <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">
            注册
          </a>
          ，就可以加入到我们的学院，海量的课程和资料以及特有的工具，帮助你更好的工作。
        </p>
      </div>
    </div>
    <div class="row">
      <div class="span4 feature">
        <h3 class="text-info">
            <i class="icon-thumbs-up"></i> 我们的目标
        </h3>
        <p>
          <i class="icon-check">
          </i>
          以互联网的模式改变传统的行业
          <br>
          <i class="icon-check">
          </i>
          让用户以更快、更简单、更方便、更廉价的形式学习更多的知识
          <br>
          <i class="icon-check">
          </i>
          精益求精的技术，深入浅出的讲解
          <br>
          <i class="icon-check">
          </i>
          更切合实际、不拘泥于书本
          <br>
        </p>
      </div>
      <div class="span4 feature-right">
        <h3 class="text-info">
            <i class="icon-mobile-phone"></i> 跨平台学习
        </h3>
        <p>
          <i class="icon-key">
          </i>
          授人以鱼，不如授人以渔。 我们的课程均为拥有权威技术及大量实际生产环境经验的权威讲师并且并不是单纯的讲授技术，而是传播学习方法、实际经验。让您更的学习更接近实际操作。
        </p>
      </div>
    </div>
  </div>
  <div class="span3 banner">
    <a href="read.php?title=product">
      <img src="<?php echo $_G['siteurl'];?>static/mot/quickenter.jpg" data-original="<?php echo $_G['siteurl'];?>static/mot/quickenter.jpg" class="quickenter">
    </a>
    <hr/>
    <form>
      <fieldset>
        <legend>
          订阅新闻报
        </legend>
        <input type="text" placeholder="输入您的邮箱">
        <button type="submit" class="btn pull-right">
          订阅
        </button>
      </fieldset>
    </form>
  </div>
</div>
<hr>
<div class="clientlist">
  <h3 class="text-info">
    我们的客户
  </h3>
  <img src="<?php echo $_G['siteurl'];?>static/mot/clientlist.jpg" data-original="<?php echo $_G['siteurl'];?>static/mot/clientlist.jpg" class="quickenter">
</div>
<div>
  <?php include template('common/footer'); ?>