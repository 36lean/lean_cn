<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('sub_newsfeed');?><?php include template('user/header'); ?><ul class="breadcrumb">
<li><a href="user.php">用户中心</a> <span class="divider">/</span></li>
    <li>学习 <span class="divider">/</span></li>
    <li><a href="user.php?ac=sub_newsfeed">推送消息</a></li>
</ul>

<div class="container-fluid"><?php if(is_array($news)) foreach($news as $n) { ?><blockquote><?php echo avatar( $n['uid'],'small');?><small><?php echo date('Y/m/d h:i:s' , $n['createddate'])?></small>
    	<p><?php echo $n['padtext']?></p>
    	<small class="text-center">来自 <cite title="Source Title"><?php echo $n['username'];?></cite> 
    </blockquote>
<?php } ?>
</div><?php include template('user/footer'); ?>