<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('signup');?><?php include template('common/header'); if(!$result) { ?>

<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="icon-info-sign"></i> 未找到相关页面</div>

<div class="span6 pull-right">
<h4>最新新闻/博客推荐</h4>
<ul class="nav"><?php if(is_array($news)) foreach($news as $n) { ?><li><a href="news/pills/n/<?php echo $n['id'];?>"><?php echo $n['post_title'];?></a></li>
<?php } ?>
</ul>
<p>更多新闻 请转到<a href="news/">精企咨讯</a></p>
</div>
<?php } if($_G['username']) { ?>

<div class="row-fluid">
<div class="span6">

<form class="well" action="" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="bucket_id" value="<?php echo $result['id'];?>">
<input type="hidden" name="uid" value="<?php echo $_G['uid'];?>">

<div class="page-header">
<h4>报名考试</h4>	
</div>

<div class="control-group">
<label>试题名</label>
<div class="controls">
<input name="title" type="text" readonly="readonly" value="<?php echo $result['title'];?>" />
</div>
</div>


<div class="control-group">
<label>用户名</label>
<div class="controls">
<input name="username" type="text" readonly="readonly" value="<?php echo $_G['username'];?>" />
</div>
</div>

<div class="control-group">
<label>报名时间</label>
<div class="controls">
<input name="time" type="text" readonly="readonly" value="<?php echo date('Y-m-d h:i')?>" />
</div>
</div>

<div class="control-group">

<div class="controls">
<button class="btn btn-primary" value="1" name="join">参加考试</button>
</div>
</div>


</form>	
</div>
<div class="span6">

<ul>
<li>试题名称 : <?php echo $result['title'];?></li>
<li>试题说明 : <?php echo $result['description'];?></li>
<li>考试时间 : <?php echo $result['limittime'];?>分钟</li>
<li>试题数量 : <?php echo count( json_decode( $result['checkout_list'] , true ) )?> </li>
</ul>


</div>
</div>

<?php } else { ?>

<div class="mot-block-a">
<div class="alert alert-info"><i class="icon-info-sign"></i> 游客您好，要做测试 ，请先登陆或者注册为本站会员</div><?php include template('member/login_simple'); ?></div>

<?php } include template('common/footer'); ?>