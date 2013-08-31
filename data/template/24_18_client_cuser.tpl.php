<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<link rel="stylesheet" href="static/image/admincp/admincp.css" type="text/css" media="all" />
<?php shownav('client','menu_client_cuser');?>

<form action="admin.php?action=client&amp;operation=cuser" method="post">

<?php showtableheader('开通订单服务' , 'nobottom' , 'width="100%"')?>
<tr>
<td>搜索订单</td> <td> <input type="text" name="trade_no" /></td>
</tr>
<tr>
<td>搜索名字</td> <td> <input type="text" name="realname" /></td>
</tr>

<tr>
<td><input class="btn" type="submit" name="find" value="搜索" /></td><td></td>
</tr>
<?php showtablefooter();?>

<?php showtableheader('' , 'nobottom' , 'width="100%"')?>
<?php if($rs) { ?>
<tr>
<td>订单详情 - <?php echo $rs['trade_no'];?></td> <td> 操作</td>
</tr>
<tr>
<td><a class="error"><?php echo $rs['usertype']==0?'个人用户':'企业用户'?></a> - <?php echo $rs['realname'];?> - <?php echo $rs['productid'];?>个月站内会员 - 金额(元):<?php echo $rs['total'];?> - <?php if($rs['blind_uid']!=0) { ?><a class="error">账户<?php echo $s['username'];?> 密码<?php echo $u['password'];?></a> <?php } ?></td> 
<td> <?php if($rs['blind_uid']==0) { ?><a href="admin.php?action=client&amp;operation=cuser&amp;live=<?php echo $rs['id'];?>">开通</a>
 <?php } else { ?><a>停用</a><?php } ?> <a href="admin.php?action=client&amp;operation=cuser&amp;detail=<?php echo $rs['id'];?>">详细</a>
</td>
</tr>
<?php } ?>
<?php showtablefooter();?>

</form>