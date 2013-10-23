<?php $this->load->module('home/layouts/header');?>

<ol class="breadcrumb">
  <li><a href="<?php echo site_url();?>">精企新闻</a> <span class="divider">/</span>  </li>
  <li><a href="<?php echo site_url('pills/article_list/'.$article['category']);?>"><?php echo $article['category_title'];?></a> <span class="divider">/</span>  </li>
  <li class="active"><?php echo $article['post_title'];?></li>
</ol>


<div class="container-fluid">
<div class="row-fluid">

  <div class="span9">
    
    <div class="page-header context-title">
      <h2>
        <?php echo $article['post_title'];?>
      </h2>
    </div>

    <div class="article_from">
    文章由 <strong><?php echo $article['post_author'] ? $article['post_author'] : '匿名';?></strong> 发表于 <?php echo date( 'Y年m月d日 h:i:s' , $article['post_modified']);?> 浏览 <?php echo $article['click'];?>
    </div>

    <?php echo $template['body'];?>

    <?php echo $this->load->module('home/default/get_relation_article' , array( $article['category']));?>

  </div>

  <div class="span3">

    <div class="panel panel-info">
      <div class="panel-heading">快速入口</div>


        <?php $this->load->module('home/default/categories');?> 

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