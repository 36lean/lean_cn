<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="expires" content="Wed, 26 Feb 2027 08:21:57 GMT">
    <meta http-equiv="Cache-Control" content="max-age=1" />
    <?php global $constant;?>
    <title>
        36lean
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
<?php
$ci = & get_instance();
if( $ci instanceof Base_Controller)
    $user = $ci->_G;
else 
    $user = $ci->session->userdata('status');
?>
<div class="navbar">
<div class="navbar-inner">

<div class="container-fluid">
    <div class="top-nav nav-collapse">
        <a class="brand" href="#">精益云管理系统</a>
        <ul class="nav">
            <li class="active"><a href="<?php echo base_url();?>index.php">首页</a></li>
        </ul>

        <ul class="nav pull-right">
            <li><a href="<?php echo site_url('user/logout');?>">注销登录</a></li>
        </ul>
    </div>
</div>
</div>
</div>


    <div class="container"><?php $this->load->module('webkit/menu/top');?></div>

    <div class="container"><?php $this->load->module('webkit/leftside/get_left_side');?></div>
    
    <div class="container">
        <?php echo $content;?>
    </div>


<hr />
<div class="container">
    <h5><small>© 2013 36lean.com</small></h5>
    <h5><small> All rights reserved.</small></h5>
</div>

</body>
</html>