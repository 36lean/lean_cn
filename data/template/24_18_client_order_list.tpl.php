<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<link rel="stylesheet" href="static/image/admincp/admincp.css" type="text/css" media="all" />
<link rel="stylesheet" href="template/default/common/common.css" type="text/css" media="all" />
<?php shownav('client','menu_client_order');?>
<form action="admin.php?action=client&amp;operation=order" method="post">
<div class="xi1"> [ 筛选] 
<select name="order_status" onchange="javascript:document.forms[0].submit();">
<option value=<?php echo ALL;?> <?php echo $status==ALL?'selected=selected':''?>>全部</option>
<option value=<?php echo NOPAYMENT;?> <?php echo $status==NOPAYMENT?'selected=selected':''?>>未支付</option>
<option value=<?php echo PENDDING;?> <?php echo $status==PENDDING?'selected=selected':''?>>处理中</option>
<option value=<?php echo RECEIPT;?> <?php echo $status==RECEIPT?'selected=selected':''?>>发票已开</option>
<option value=<?php echo NOCONFIRM;?> <?php echo $status==NOCONFIRM?'selected=selected':''?>>待确定</option>
<option value=<?php echo CANCEL;?> <?php echo $status==CANCEL?'selected=selected':''?>>取消</option>
</select>

搜索范围:订单号/手机号/联系电话/名字/公司/邮箱/工作<input type="text" name="condition" />
<input class="btn" type="submit" name="search_order" value="搜索" />

 	 [ <a href="admin.php?action=client&amp;operation=order&amp;new=1">添加客户信息与订单记录</a> ] 
</div>
</form>

<div id="ct" class="rankicn">

<table class="tdat lum wp" border="1">
<tr> <td>订单号/订单类型</td> <td>名称(预)</td> <td>联系人</td> <td>订单金额(预)</td> <td>订单时间</td> <td>状态</td> <td>操作</td>  </tr><?php if(is_array($allorder)) foreach($allorder as $key => $value) { ?><tr> <td><?php echo $value['trade_no'];?></td> <td><?php echo $value['pre_productid'];?>个月会员</td> <td><?php echo $value['realname'];?></td> <td><?php echo $value['pre_total'];?></td> <td><?php echo date('Y年m月d日 h:i:s',$value['sign_date'])?></td> <td><?php echo $_status[$value['status']];?></td> 
<td><a href="admin.php?action=client&amp;operation=order&amp;view=<?php echo $value['id'];?>">详情</a> 
<a>打印合同</a> 
<a>开发票</a> 
<a href="admin.php?action=client&amp;operation=order&amp;editorder=<?php echo $value['id'];?>">编辑</a>
</td> 
</tr>
<?php } ?>
</table>
</div>
