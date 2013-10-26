<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="container" align="center">
  <div id="myCarousel" class="carousel slide">  
    
    <ol class="carousel-indicators">    
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>    
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>  <!-- Carousel items -->  


    <div class="carousel-inner">    
      <div class="active item">
        <a href="routing.php" target="_blank"><img src="static/mot/banner.jpg"  /></a>
      </div>

      <div class="item">
        <a href="routing.php" target="_blank"><img src="static/mot/banner2.jpg"  /></a>
      </div>

    </div>  <!-- Carousel nav -->  

    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>  
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
  </div>
</div>






  <div class="container-fluid">
    <div class="row-fluid">
      <div class="txt span4">
          <img src="static/mot/yun-step1.png">
            <h3>注册账号</h3>
        </div>

        <div class="txt span4">
          <img src="static/mot/yun-step2.png">
          <h3>购买课程</h3>
        </div>
        <div class="txt span4">
          <img src="static/mot/yun-step3.png">
          <h3>开始学习</h3>
        </div>
    </div>
  </div>


  <div class="alert-info text-center mot-block">
    <form action="member.php?mod=<?php echo $_G['setting']['regname'];?>" method="post" onsubmit="_submit()">
      <div class="input-append">
        <input class="input-medium" name="email" type="text" placeholder="输入您最常用的邮箱">
        <button name="findout" type="submit" class="btn btn-info">
          立即注册
        </button>
      </div>
    </form>

    <p>你只需用1分钟时间进行注册,就可以免费观看精益课程视频</p>
  </div>



    <div class="row-fluid">
      <div class="span4 view-block">
        <h3 class="text-info">
          <i class="icon-thumbs-up"></i> 学院特色
        </h3>
      <p>        
        知识的掌握和提炼重在反复复习.视频教学已经可以给您一个对知识的直观的展示，但是要记忆、掌握并融汇贯通，还需要不断的服务和测试.每一个视频课程我们都配以数个针对本课重点知识的测评考试，只有达到80%的准确率才能够完成本课程的学习.
      </p>
      </div>

      <div class="span4 view-block">
        <h3 class="text-info">
            <i class="icon-thumbs-up"></i> 账号注册
        </h3>
        <p>
          <a href="http://36lean.com/member.php?mod=enroll" class="btn btn-danger" target="_blank"> 点击注册</a> 就可以加入到我们的学院，海量的课程和资料以及特有的工具，帮助你更好的学习和工作。</p>
      </div>
      
      <div class="span4 view-block">
        <h3 class="text-info">
            <i class="icon-mobile-phone"></i> 跨平台学习
        </h3>
        <p>
          <i class="icon-plane">
          </i>
          我们的下一步工作是打造移动学习的平台，移动在线学院课程同样为高清课程，同时课程还将可以在电脑，手机，平板电脑等移动设备上观看。同时可以用投影仪放大在培训室进行观看.
        </p>
      </div>

    </div>


    <div class="row-fluid">

      <div class="span4 view-block">
        <h3 class="text-info">
            <i class="icon-heart"></i> 我们的目标
        </h3>
        <p>
        <i class="icon-check"></i>
        以互联网的模式改变传统的学习方式<br>
        <i class="icon-check"></i>
        让用户以更快、更简单、更方便、更廉价的形式学习更多的知识<br>
        <i class="icon-check"></i>
        精益求精的技术，深入浅出的讲解<br>
        <i class="icon-check"></i>
        更切合实际、不拘泥于书本<br>
        </p>
      </div>

      <div class="span4 view-block">
        <h3 class="text-info">
            <i class="icon-thumbs-up"></i> 系统性学习
        </h3>
        <p>
          我们在国外的精益研发团队将持续的开发系统性精益课程, 我们也将第一时间为大家开发中文版的系统性精益课程.
        </p>
      </div>

      <div class="span4 view-block">
        <h3 class="text-info">
            <i class="icon-mobile-phone"></i> 经验传授
        </h3>
        <p>
          <i class="icon-key">
          </i>
          授人以鱼，不如授人以渔。 我们的课程均为拥有权威技术及大量实际生产环境经验的权威讲师并且并不是单纯的讲授技术，而是传播学习方法、实际经验。让您更的学习更接近实际操作。
        </p>
      </div>

    </div>

  
  <div class="txt container-fluid">
    <h2 class="clienttip"><i class="icon-thumbs-up"></i> 数千家企业,数万名精益用户参与其中...</h2>
    <div class="row-fluid clientlist">
      <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/3m.png"></div>
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/nike.png"></div>
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/boe.png"></div>
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/toyota.png"></div>
    </div>
    <div class="row-fluid clientlist">
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/xd.png"></div>
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/hndx.png"></div>
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/tjdx.png"></div>
        <div class="span3"><img src="http://36lean.com/static/mot/clientlogo/midea.png"></div>
    </div>
  </div>


    <div class="alert-info text-center mot-block">
    <form action="member.php?mod=enroll" method="post" onsubmit="_submit()">
      <div class="input-append">
        <input class="input-medium" name="email" type="text"  placeholder="输入您的邮箱" >
        <button name="findout" type="submit" class="btn btn-danger">
          立即试听
        </button>
      </div>
    </form>
    <p>你只需用1分钟时间进行注册,就可以免费观看精益课程视频</p>
    </div>

  <?php include template('common/footer'); ?>