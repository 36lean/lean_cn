<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<link rel="stylesheet" href="static/image/admincp/admincp.css" type="text/css" media="all" />
<?php shownav('client','menu_client_member');?>

<p class="xs3"><strong><?php showsubmenu('用户管理')?></strong></p>
<br />
<div class="wp bmw">
<?php showtableheader('' , 'nobottom' , 'width="100%"')?>
<?php showtablerow('' , array('class="alt"','class="alt"','class="alt"','class="alt"','class="alt"','class="alt"','class="alt"') , array('<a href="admin.php?action=client&amp;operation=member&amp;orderby=uid">用户ID</a>','<a href="admin.php?action=client&amp;operation=member&amp;orderby=username">账户名</a>','<a href="admin.php?action=client&amp;operation=member&amp;orderby=company">公司</a>','<a href="admin.php?action=client&amp;operation=member&amp;orderby=realname">姓名/用户名</a>','<a href="admin.php?action=client&amp;operation=member&amp;orderby=gender">性别','<a href="admin.php?action=client&amp;operation=member&amp;orderby=position">职位</a>','<a href="admin.php?action=client&amp;operation=member&amp;orderby=mobile">联系方式</a>','<a href="admin.php?action=client&amp;operation=member&amp;orderby=email">邮箱</a>','操作'))?><?php $flag = 0?><?php if(is_array($u)) foreach($u as $key => $value) { ?><?php $flag++?><tr>

<td class="alt"><a href="./home.php?mod=space&amp;uid=<?php echo $value['uid'];?>"><?php echo $value['uid'];?></a></td>
<td class="alt"><?php echo $value['username'];?></td>
<td class="alt"><?php echo $value['company']? $value['company']:'无'?></td> 
<td class="alt"><?php echo $value['realname']? $value['realname']:'无'?></td> 
<td class="alt"><?php echo $value['gender']?'男':'女'?></td>
<td class="alt"><?php echo $value['position']? $value['position']:'无'?></td>
<td class="alt"><?php echo $value['mobile']? $value['mobile']:'无'?></td>
<td class="alt"><?php echo $value['email']? $value['email']:'无'?></td>
<td class="alt"><a href="admin.php?action=client&amp;operation=member&amp;">开通</a></td>
</tr>
<?php } ?>
<?php showtableheader();?>

[ <a href="./admin.php?action=client&amp;operation=member&amp;page=1">首页</a> ] 
<?php if(($page > 0)) { ?>
[ <a href="./admin.php?action=client&amp;operation=member&amp;page=<?php echo($page)?>">上一页</a> ] 
<?php } ?>

[ <a href="./admin.php?action=client&amp;operation=member&amp;page=<?php echo($page+1)?>"><?php echo($page+1)?></a> ] 
[ <a href="./admin.php?action=client&amp;operation=member&amp;page=<?php echo($page+2)?>"><?php echo($page+2)?></a> ] 
[ <a href="./admin.php?action=client&amp;operation=member&amp;page=<?php echo($page+3)?>"><?php echo($page+3)?></a> ] 
[ <a href="./admin.php?action=client&amp;operation=member&amp;page=<?php echo($page+2)?>">下一页</a> ] 

</div>
