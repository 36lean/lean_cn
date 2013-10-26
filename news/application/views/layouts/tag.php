<!DOCTYPE html>
<html lang="en">
<?php
$base_url = str_replace('news/', '' , base_url());
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="max-age=7200" />
<title><?php echo $template['title'];?> - 精企网 -  全球第一家中文精益学习平台</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="keywords" content="<?php if( isset( $keywords) ) echo $keywords;?>" />
<meta name="description" content="<?php if( isset( $description) ) echo $description;?>" />


<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo base_url();?>" />
<link href="http://www.36lean.com/static/mot/professional.css" rel="stylesheet" />
<script src="http://www.36lean.com/static/bs_jq_ui/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!--<link rel="stylesheet" type="text/css" href="http://www.36lean.com/static/bsie/bootstrap/css/bootstrap-ie6.css">-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="http://www.36lean.com/static/bsie/bootstrap/css/bootstrap-ie6.css">
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="http://www.36lean.com/static/bsie/bootstrap/css/ie.css">
<![endif]-->  
<!-- HTML5 shim, for IE6-8 support of HTML5 elements--><!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script><![endif]-->
<script src="http://www.36lean.com/static/mot/jquery.lazyload.js?v=1.8.5" type="text/javascript"></script>  
   <script>
    jQuery( function(){jQuery("img").lazyload({effect : "fadeIn"});});
    function ResumeError() {  
         return true;  
    }  
    window.onerror = ResumeError;
    </script>

    <link href="<?php echo base_url('public/bootstrap2/css/bootstrap.css');?>" rel="stylesheet" />
    <link href="http://www.36lean.com/static/bs/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('public/bootstrap2/css/bootstrap-responsive.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/font/css/font-awesome.min.css');?>" rel="stylesheet" />
<!--[if IE 7]>
    <link href="<?php echo $base_url;?>/static/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
<![endif]--> 
<!--[if IE 7]>
    <link href="<?php echo $base_url;?>/static/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
<![endif]--> 
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/static/bsie/css/bootstrap-ie6.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/static/bsie/css/ie.css">
    <script src="<?php echo $base_url;?>/static/bsie/js/bootstrap-ie.js" type="text/javascript"></script>
    <![endif]-->
    <link href="<?php echo base_url('public/mot/mot.css');?>" rel="stylesheet" />
    <script src="<?php echo base_url('public/mot/mot.js');?>" type="text/javascript"></script>
</head>
<body>



<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container">


          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

    <div class="nav-collapse collapse">
      <ul class="nav">
        <li><a href="javascript:;"  onclick="setHomepage('<?php echo $base_url;?>');"><i class="icon-home"></i> 设为首页</a></li>
        <li><a href="<?php echo $base_url;?>"  onclick="addFavorite(this.href, '');return false;"><i class="icon-bookmark-empty"></i> 收藏本站</a></li>
        <li><a href="<?php echo $base_url;?>messagebox.php"><i class="icon-envelope-alt"></i> 在线咨询</a></li>
      </ul>
        
        <form class="form-inline navbar-form pull-left" action="msearch.php" method="get" style="margin-left:53px;">
        <div class="input-append">
          <input name="keywords" type="text" class="span3" placeholder="输入你要找的课程"/>
          <button name="findout" type="submit" class="btn btn-primary">搜索</button>
        </div>
      </form>
</div>
</div>
</div>
</div>

<div class="container main-body">

<p>
<a href="<?php echo $base_url;?>"><img src="http://www.36lean.com//static/mot/logo.png" data-original="http://www.36lean.com//static/mot/logo.png" /></a>
</p>

<div class="navbar">
<div class="navbar-inner">
        <ul class="nav">
            <li><a href="<?php echo $base_url;?>portal.php"><i class="icon-home"></i> 首页</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="lesson.php">
                <i class="icon-cloud"></i> 精益云学院 <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $base_url;?>lesson.php"> 云学院课程 </a></li>
                <li><a href="<?php echo $base_url;?>read.php?title=product">产品版本</a></li>
              </ul>
            </li>
              
            <!--<li><a href="<?php echo $base_url;?>news/blog"><i class="icon-globe"></i>精企资讯</a>-->

            <li class="active"><a href="<?php echo $base_url;?>news"><i class="icon-globe"></i> 精企资讯 </a></li>
            
            <!--<li><a href="<?php echo $base_url;?>store"><i class="icon-globe"></i> 精益商城</a>-->

            <li><a href="<?php echo $base_url;?>read.php?title=aboutus"><i class="icon-group"></i> 关于我们 </a></li>
            <li><a href="<?php echo $base_url;?>read.php?title=contactus"><i class="icon-phone"></i> 联系我们 </a></li>
        </ul>
        <ul class="nav pull-right">
          <li><a href="read.php?title=contactus"><i class="icon-phone"></i> 021-62128213</a></li>
        </ul>        
    </div>
</div>
<div class="container">




<ul class="breadcrumb">
  <li><a href="<?php echo $base_url;?>">首页</a> <span class="divider">/</span>  </li>
  <li><a href="<?php echo site_url();?>">精企新闻</a> <span class="divider">/</span> </li>
  <li><a href="<?php echo site_url('pills/tag/'.$tag_word);?>">关键字 : <?php echo $tag_word;?></a></li>
</ul>


<div class="container-fluid">
<div class="row-fluid">

  <div class="span8">
    <?php echo $template['body'];?>
  </div>
  <div class="span1"></div>

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

    <div class="panel panel-info">
      <div class="panel-heading">快速入口</div>


        <?php $this->load->module('home/default/categories');?> 

    </div>
    </div>

  </div>



  
</div>
<hr />
<div class="container-fluid" style="font-size:12px;">
  <div class="row-fluid">
        <strong>&copy;36Lean 精企网 2009-2013</strong> 
  </div>
</div>


<script src="http://www.36lean.com/static/bs/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if IE]>
<script src=”http://html5shiv.googlecode.com/svn/trunk/html5.js”></script>
<![endif--> 
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41700814-1', '36lean.com');
  ga('send', 'pageview');
</script>
</body>
</html>