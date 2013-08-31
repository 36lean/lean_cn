<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('home');?><?php include template('common/header'); ?><h1><i class="icon-globe"></i> 阅读</h1>
<hr/>

<div class="page-header">
<h3>最新内容</h3>
</div>

<div class="row"><?php if(is_array($list)) foreach($list as $title) { ?><a class="news_reader" href="reader.php/article/<?php echo $title['id'];?>">

<div class="span3" style="margin-bottom:20px;height:220px;background:url(<?php echo $title['banner'];?>);background-position: center;">

<div class="news_title">
<p class="text-center"><?php echo $title['contenttitle'];?></p>
<p class="text-right"><small class="text-right">浏览 <?php echo $title['view'];?> / <?php echo date(' Y m d ' , $title['timecreated']); ?> </small></p>
</div>

</div>
</a>
<?php } ?>
</div>

<div class="page-header">
<h3>综合资讯</h3>
</div>
<div id="cauldron" class="row"><?php if(is_array($category)) foreach($category as $cat) { ?><div id="<?php echo $cat['id'];?>" class="span4">
<ul class="nav nav-list">
<li class="nav-header"><i class="icon-hand-right"></i> <?php echo $cat['title'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right"><a href="reader.php/category/<?php echo $cat['id'];?>">更多</a></span></li><?php if(is_array($cat['article'])) foreach($cat['article'] as $a) { ?><li><a href="reader.php/article/<?php echo $a['id'];?>"><?php echo $a['contenttitle'];?></a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
</div><?php include template('common/footer'); ?>