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
    <script src="<?php echo base_url('public/bootstrap/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('public/tinymce/js/tinymce/tinymce.min.js');?>"></script>
    <script src="<?php echo base_url('public/ckeditor/ckeditor.js');?>"></script>
    <script src="<?php echo base_url('public/hovercard/jquery.hovercard.js');?>"></script>

    <script charset="utf-8" src="<?php echo base_url('public/kindeditor/kindeditor-all-min.js');?>"></script>
    <script charset="utf-8" src="<?php echo base_url('public/kindeditor/zh_CN.js');?>"></script>
    <script src="<?php echo base_url('public/chartjs/Chart.min.js');?>"></script>
    <script>
        KindEditor.ready(function(K) {
                window.editor = K.create('.kindeditor' , {
                    //id : 'Filedata',
                    width : '100%' , 
                    height: '500px' , 
                    uploadJson : '<?php echo base_url("kind/upload_json.php");?>',
                    allowFileManager : false ,
                    //imageUploadJson : '<?php echo site_url('module/webkit/photo_uploads/handle');?>' ,
                    dir : 'image' , 
                    urlType : 'domain' ,
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