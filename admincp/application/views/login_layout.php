<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="expires" content="Wed, 26 Feb 2027 08:21:57 GMT">
    <meta http-equiv="Cache-Control" content="max-age=2592000" />
    <?php global $constant;?>
    <title>
        精益云管理 - <?php if( $this->uri->segment(1)) echo $constant[$this->uri->segment(1)]?>
        <?php if( $this->uri->segment(2)) echo ' - '.$constant[$this->uri->segment(2)]?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <!-- The styles -->
    <link id="bs-css" href="<?php echo base_url();?>public/charisma/css/bootstrap-cerulean.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?php echo base_url();?>public/charisma/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/charisma/css/charisma-app.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/charisma/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <link href='<?php echo base_url();?>public/charisma/css/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
    <link href='<?php echo base_url();?>public/charisma/css/chosen.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/uniform.default.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/jquery.cleditor.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/opa-icons.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>public/charisma/css/uploadify.css' rel='stylesheet'>
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
    
    <div class="btn-group pull-right theme-container" >
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-tint"></i><span class="hidden-phone"> 主题</span>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" id="themes">
            <li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
            <li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
            <li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
            <li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
            <li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
            <li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
            <li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
            <li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
            <li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
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
</div>


<div class="row-fluid">
    <?php echo $content;?>
</div>

<hr />
<div class="container">
    
    <h5><small>© 2013 36lean.com</small></h5>
    <h5><small> All rights reserved.</small></h5>
</div>


 <!-- external javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <!-- jQuery UI -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery-ui-1.8.21.custom.min.js"></script>
    <!-- transition / effect library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-transition.js"></script>
    <!-- alert enhancer library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-alert.js"></script>
    <!-- modal / dialog library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-modal.js"></script>
    <!-- custom dropdown library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-dropdown.js"></script>
    <!-- scrolspy library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-scrollspy.js"></script>
    <!-- library for creating tabs -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-tab.js"></script>
    <!-- library for advanced tooltip -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-tooltip.js"></script>
    <!-- popover effect library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-popover.js"></script>
    <!-- button enhancer library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-button.js"></script>
    <!-- accordion library (optional, not used in demo) -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-collapse.js"></script>
    <!-- carousel slideshow library (optional, not used in demo) -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-carousel.js"></script>
    <!-- autocomplete library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-typeahead.js"></script>
    <!-- tour library -->
    <script src="<?php echo base_url();?>public/charisma/js/bootstrap-tour.js"></script>
    <!-- library for cookie management -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.cookie.js"></script>
    <!-- calander plugin -->
    <script src='<?php echo base_url();?>public/charisma/js/fullcalendar.min.js'></script>
    <!-- data table plugin -->
    <script src='<?php echo base_url();?>public/charisma/js/jquery.dataTables.min.js'></script>

    <!-- chart libraries start -->
    <script src="<?php echo base_url();?>public/charisma/js/excanvas.js"></script>
    <script src="<?php echo base_url();?>public/charisma/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url();?>public/charisma/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url();?>public/charisma/js/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>public/charisma/js/jquery.flot.resize.min.js"></script>
    <!-- chart libraries end -->

    <!-- select or dropdown enhancer -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.chosen.min.js"></script>
    <!-- checkbox, radio, and file input styler -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.uniform.min.js"></script>
    <!-- plugin for gallery image view -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.colorbox.min.js"></script>
    <!-- rich text editor library -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.cleditor.min.js"></script>
    <!-- notification plugin -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.noty.js"></script>
    <!-- file manager library -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.elfinder.min.js"></script>
    <!-- star rating plugin -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.raty.min.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.uploadify-3.1.min.js"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="<?php echo base_url();?>public/charisma/js/jquery.history.js"></script>
    <!-- application script for Charisma demo -->
    <script src="<?php echo base_url();?>public/charisma/js/charisma.js"></script>

</body>
</html>
