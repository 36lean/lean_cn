<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<link rel="stylesheet" href="static/image/admincp/admincp.css" type="text/css" media="all" />
<link rel="stylesheet" href="template/default/common/common.css" type="text/css" media="all" />

<form action="admin.php?action=client&amp;operation=receipt" method="post">
<div class="xi1"> [ 筛选] 
<select name="receipt_status" onchange="javascript:document.forms[0].submit();">
<option value=<?php echo ALL;?> <?php echo $status==ALL?'selected=selected':''?>>全部</option>
<option value=<?php echo ALREADY;?> <?php echo $status==ALREADY?'selected=selected':''?>>已开发票</option>
<option value=<?php echo NOTRECEIPT;?> <?php echo $status==NOTRECEIPT?'selected=selected':''?>>未开发票</option>
<option value=<?php echo WAITRECEIPT;?> <?php echo $status==WAITRECEIPT?'selected=selected':''?>>等待开票</option>
</select>

搜索范围:名字/订单号/电话/公司<input type="text" name="condition" />
<input class="btn" type="submit" name="search_receipt" value="搜索" />

 [ <a href="admin.php?action=client&amp;operation=receipt&amp;new=1">添加发票</a> ] 
</div>
</form>

<?php showtableheader('' , 'nobottom' , 'width="100%"')?>
<?php showtablerow('' , array('class="alt"','class="alt"','class="alt"','class="alt"','class="alt"','class="alt"','class="alt"') , array('发票订单','发票类型','用户类型','姓名/用户名','发票抬头','发票金额','开票时间','状态' , '操作'))?><?php if(is_array($all_receipt)) foreach($all_receipt as $rec) { ?><tr>

<td class="alt"><?php echo $rec['trade_no'];?></td> 
<td class="alt"><?php echo $rec['rec_type'] ? '增值税专用发票' : '普通发票'?></td> 
<td class="alt"><?php echo $rec['usertype']==0?'个人用户':'企业用户'?></td> 
<td class="alt"><?php echo $rec['realname'];?></td>
<td class="alt"><?php echo $rec['corp_name'];?></td>
<td class="alt"><?php echo $rec['rec_fee'];?></td>
<td class="alt"><?php echo $rec['rec_date'];?></td>
<td class="alt"><?php echo $_receipt[$rec['status']];?></td>

<td class="alt"><a href="admin.php?action=client&amp;operation=receipt&amp;edit=<?php echo $rec['id'];?>">编辑</a>
<a>打印合同</a> <a href="admin.php?action=client&amp;operation=receipt&amp;setlive=<?php echo $rec['id'];?>">开发票</a></td>

</tr>
<?php } ?>
<?php showtableheader();?>

[ <a href="./admin.php?action=client&amp;operation=receipt&amp;page=1">首页</a> ] 
<?php if(($page > 0)) { ?>
[ <a href="./admin.php?action=client&amp;operation=receipt&amp;page=<?php echo($page)?>">上一页</a> ] 
<?php } ?>

[ <a href="./admin.php?action=client&amp;operation=receipt&amp;page=<?php echo($page+1)?>"><?php echo($page+1)?></a> ] 
[ <a href="./admin.php?action=client&amp;operation=receipt&amp;page=<?php echo($page+2)?>"><?php echo($page+2)?></a> ] 
[ <a href="./admin.php?action=client&amp;operation=receipt&amp;page=<?php echo($page+3)?>"><?php echo($page+3)?></a> ] 
[ <a href="./admin.php?action=client&amp;operation=receipt&amp;page=<?php echo($page+2)?>">下一页</a> ] 

</div>