<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('sub_changepassword');?><?php include template('user/header'); if($status == 1) { ?>

<div class="alert alert-error">
修改的不是当前用户 修改失败
</div>

<?php } elseif($status == 2) { ?>

<div class="alert alert-error">
两次输入的新密码不一致 修改失败
</div>

<?php } elseif($status == 3) { ?>

<div class="alert alert-error">
用户密码错误 修改失败
</div>

<?php } elseif($status == 4) { ?>

<div class="alert alert-success">
新密码修改成功
</div>

<?php } ?>



<div class="page-header">
<h3>修改密码</h3>
</div>


<p>当前账户 : <strong><?php echo $_G['username'];?></strong></p>

<form action="" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<div class="control-group">

<label class="control-label" for="inputPassword">旧密码</label>

<div class="controls">
<input name="old" id="inputPassword" type="text" />
</div>

</div>

<div class="control-group">

<label class="control-label" for="inputPassword1">新密码</label>

<div class="controls">
<input name="new1" id="inputPassword1" type="text" />
</div>

</div>


<div class="control-group">

<label class="control-label" for="inputPassword2">确认新密码</label>

<div class="controls">
<input name="new2" id="inputPassword2" type="text" />
</div>

</div>

<button class="btn btn-primary" name="submit_change" value="1">修改密码</button>

</form><?php include template('user/footer'); ?>