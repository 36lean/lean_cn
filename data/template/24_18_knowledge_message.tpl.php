<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('message');?><?php include template('knowledge/header'); ?><div class="page-header">
    <h3><small>未读消息</small></h3>
</div>

<form action="" method="post">
<table class="table table-hover table-condensed table-bordered">
<tr><th>标记为已读</th><th>消息内容</th> <th>清理</th></tr><?php if(is_array($noclose)) foreach($noclose as $n) { ?><tr>
<td><input name="<?php echo $n['id'];?>" value="1" type="checkbox" /></td> 
<td><small><a href="<?php echo $n['url'];?>"><?php echo $n['message'];?></a></small></td>
<td><small><a href="knowledge.php?mod=message&amp;rm=<?php echo $n['id'];?>">删</a></small></td>
</tr>
<?php } ?>
</table>

<button name="close" class="btn" type="submit">已读</button>
</form>

<div class="page-header">
    <h3><small>已读消息</small></h3>
</div>

<table class="table table-hover table-condensed table-bordered">
<tr><th>消息内容</th> <th>清理</th></tr><?php if(is_array($close)) foreach($close as $c) { ?><tr>
<td><small><a href="<?php echo $c['url'];?>"><?php echo $c['message'];?></a></small></td>
<td><small><a href="knowledge.php?mod=message&amp;rm=<?php echo $c['id'];?>">删</a></small></td>
</tr>
<?php } ?>
</table><?php include template('knowledge/footer'); ?>