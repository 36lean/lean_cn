<?php $this->load->module('home/layouts/header');?>


<div class="container-fluid">
<div class="row-fluid">

  <div class="span9">
    <?php echo $template['body'];?>
  </div>

  <div class="span3">


    <div class="panel panel-primary">
      <div class="panel-heading">关注我们</div>

      <div class="panel-body">
        <p><strong>关注官方微信</strong></p>
        <p class="text-center"><img src="http://www.36lean.com/static/mot/weixin_rqcode.png"></p>

        <p><strong>关注新浪微博</strong></p>

        <wb:follow-button uid="3806766242" type="red_2" width="200" height="33" ></wb:follow-button>

      </div>

    </div>

    <div class="panel panel-success">
      <div class="panel-heading">实时热门</div>

      <div class="panel-body">
        <?php $this->load->module('home/default/get_tags');?>
      </div>

    </div>

    <div class="panel panel-info">
      <div class="panel-heading">快速入口</div>


        <?php $this->load->module('home/default/categories');?> 

    </div>

      

    </div>

  </div>


  <!--
  <p class="text-center">
    <img src="http://36lean.com/static/mot/course_banner.gif" />
  </p>
  -->

  <div class="row">
    <?php $this->load->module('home/default/timeline');?>
  </div>
  
<?php $this->load->module('home/layouts/footer');?>