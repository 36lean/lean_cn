<?php $this->load->module('home/layouts/header');?>

<ul class="breadcrumb">
  <li><a href="<?php echo site_url();?>">精企新闻</a> <span class="divider">/</span> </li>
  <li><a href="<?php echo site_url('pills/article_list/'.$category['id']);?>"><?php echo $category['category_title'];?></a></li>
</ul>


<div class="container-fluid">
<div class="row-fluid">

  <div class="span9">
    <div  style="padding-left:30px;padding-right:30px;">
      <?php echo $template['body'];?>
    </div>
  </div>

  <div class="span3">

    <div class="panel panel-success">
      <div class="panel-heading">实时热门</div>

      <div class="panel-body">
        <?php ;?>
      </div>
    </div>


    <div class="panel panel-primary">
      <div class="panel-heading">关注我们</div>

      <div class="panel-body">
        <p><strong>关注官方微信</strong></p>
        <p class="text-center"><img src="http://www.36lean.com/static/mot/weixin_rqcode.png"></p>

        <p><strong>关注新浪微博</strong></p>

        <wb:follow-button uid="3806766242" type="red_2" width="200" height="33" ></wb:follow-button>

      </div>

    </div>

    </div>

  </div>
</div>

<?php $this->load->module('home/layouts/footer');?>