<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="expires" content="Wed, 26 Feb 2027 08:21:57 GMT">
    <meta http-equiv="Cache-Control" content="max-age=1" />
    <?php global $constant;?>
    <title>
        36lean登录
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- The styles -->
    <link id="bs-css" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href='<?php echo base_url();?>public/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery-1.7.2.min.js"></script>
</head>

<body>

<div class="navbar">
<div class="navbar-inner">

<div class="container-fluid">
    <div class="top-nav nav-collapse">
        <a class="brand" href="#">精益云学院管理系统</a>
        <ul class="nav">
            <li class="active"><a href="<?php echo base_url();?>">首页</a></li>
        </ul>
    </div>
</div>
</div>
</div>

<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>"><i class="icon-home icon-reverse"></i> 首页</a></li>
        <?php if( $this->uri->segment(1)){?><li> <span class="divider">/</span><a href="<?php echo base_url() . 'index.php/' .$this->uri->segment(1);?>"><?php echo $constant[$this->uri->segment(1)];?></a> </li><?php }?>
        <?php if( $this->uri->segment(2)){?><li class="active"><span class="divider">/</span> <?php echo $constant[$this->uri->segment(2)];?></li><?php }?>
    </ul>
    
    <div align="center">
    <?php echo $content;?>
    </div>
</div>

<hr />
<div class="container">
    
    <h5><small>© 2013 36lean.com</small></h5>
    <h5><small> All rights reserved.</small></h5>
</div>
</body>
</html>
