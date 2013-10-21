<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('sub_vip');?><?php include template('user/header'); ?><ul class="breadcrumb">
    <li><a href="#">用户中心</a> <span class="divider">/</span></li>
    <li><a href="#">账户</a> <span class="divider">/</span></li>
    <li class="active">VIP信息</li>
</ul>

<div class="container-fluid mot-block-b">
<?php if($is_vip) { ?>
<h2><small><i class="icon-spinner icon-spin"></i> 会员您好 : </small></h2>
<dl class="dl-horizontal">
<dt>开通日期 : </dt> <dd><i class="icon-bell"></i> <?php echo date( 'Y-m-d ', $vip_time['jointime'])?></dd>
<dt>到期 : </dt> <dd><i class="icon-bell-alt"></i> <?php echo date( 'Y-m-d', $vip_time['exptime'])?></dd>
<dt>离到期还有 : </dt> <dd><i class="icon-time"></i> <?php echo intval( ($vip_time['exptime'] - $today)/86400)?>天</dd>
<dt>账户余额 : </dt> <dd><i class="icon-money"></i> <?php echo $my_credit;?> ￥</dd>
</dl>
<hr />
<p><a href="vip.php?action=active" class="btn btn-success"><i class="icon-ok-circle"></i> 续费会员</a></p>
<?php } else { ?>
<div class="alert alert-success">
抱歉 您还不是本站收费会员
</div>

<hr />
 <a href="vip.php?action=active" class="btn btn-success"><i class="icon-thumbs-up"></i> 开通会员</a>
<?php } ?>
</div><?php include template('user/footer'); ?>