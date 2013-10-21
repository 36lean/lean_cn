<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('header');?><?php include template('common/header'); ?><div class="container-fluid">
<div class="row-fluid">

<div class="span2">
<div class="thumbnail text-center">
<a href="user.php"><?php echo avatar($_G['uid'] , 'medium');?></a>
</div>
</div>

<div class="span9">
<h1><a href="user.php"><i class="icon-home"></i> 用户中心</a></h1>
    			<small><a><?php if($_G['username']) { ?> <?php echo $_G['username'];?><?php } else { ?>游客<?php } ?>在线</a></small>
</div>
</div>

</div>
</div>
<div class="container-fluid">
<div class="row-fluid">

<div class="span3"><?php include template('user/left_side'); ?></div>

<div class="span8">
