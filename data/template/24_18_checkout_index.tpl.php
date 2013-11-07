<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('index');?><?php include template('common/header'); ?><h2>学习测试</h2>

<div class="row-fluid"><?php if(is_array($buckets)) foreach($buckets as $key => $bucket) { ?><?php $bucket['checkout_list'] = json_decode($bucket['checkout_list'] , true)?><div class="span3">
<div class="lesson-item">
<div class="page-header">
<h3><?php echo $bucket['title'];?></h3>
<h5><small>说明 : <?php echo $bucket['description'];?></small></h5> 
<h5><small><strong>试题数 <?php echo count($bucket['checkout_list'])?></strong></small></h5>
<h5><small>创建日期 : <?php echo $bucket['createdtime'];?></small></h5>
</div>

<a class="btn btn-block btn-success" href="checkout.php?signup=<?php echo $bucket['id'];?>">点击报名</a>
</div>
</div>

<?php if(($key + 1 ) % 4 === 0) { ?>
</div>
<div class="row-fluid">
<?php } } ?>
</div><?php include template('common/footer'); ?>