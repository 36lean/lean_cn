<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <?php global $constant;?>
    <title>
       <?php echo $template['title'];?> | 36lean
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- The styles -->
    <link href="<?php echo base_url('public/bootstrap-datetimepicker/css/datetimepicker.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/bootstrap/css/bootstrap-responsive.css');?>" rel="stylesheet">
    <link href='<?php echo base_url('public/font-awesome/css/font-awesome.min.css');?>' rel='stylesheet'>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('public/mot/css/mot.css');?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url('public/charisma/js/jquery-1.7.2.min.js');?>"></script>
    <script src="<?php echo base_url('public/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');?>"></script>
    <script src="//cdnjs.bootcss.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('public/tinymce/js/tinymce/tinymce.min.js');?>"></script>
    <script src="<?php echo base_url('public/ckeditor/ckeditor.js');?>"></script>
    <script src="<?php echo base_url('public/hovercard/jquery.hovercard.js');?>"></script>

    <script>
    $(function(){
        $('.datetimepicker').datetimepicker();

        tinymce.init({
            selector: ".longtext",
            plugins: [
                      "advlist autolink lists link image charmap print preview anchor",
                      "searchreplace visualblocks code fullscreen",
                      "insertdatetime media table contextmenu paste "
                    ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            autosave_ask_before_unload: false,
            max_height: 420,
            min_height: 420,
            height : 420 , 
            convert_urls : false , 
            });

            tinymce.init({
                selector: ".shorttext",
                plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste "
                    ],
                toolbar: false,
                autosave_ask_before_unload: false,
                max_height: 180,
                min_height: 180,
                height : 180 , 
                convert_urls : false , 
            });
        });

    </script>
</head>

<body style="padding:50px;font-size:12px;">
<?php
$ci = & get_instance();
if( $ci instanceof Base_Controller)
    $user = $ci->_G;
else 
    $user = $ci->session->userdata('status');
?>

<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
        <a class="brand" href="#">精益云管理系统</a>
        <ul class="nav">
            <li class="active"><a href="<?php echo base_url();?>index.php">首页</a></li>
        </ul>
        <ul class="nav pull-right">
            <li><a href="<?php echo site_url('user/logout');?>"><?php echo $user['user'];?>注销登录</a></li>
        </ul>
</div>
</div>
</div>

<?php //$this->load->module('webkit/devkit/index');?>

<?php $this->load->module('webkit/menu/top');?>
<?php $this->load->module('webkit/leftside/get_left_side');?>

<div class="container-fluid">
    <?php echo $template['body'];?>
</div>

<br/>
<hr />
<div class="container-fluid">
    <h5><small>© 2013 36lean.com</small></h5>
    <h5><small> All rights reserved.</small></h5>
</div>

</body>
</html>