<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('index');?><?php include template('common/header'); ?><ul class="breadcrumb">
    <li><a href="portal.php">首页</a> <span class="divider">/</span></li>
    <li class="active">留言箱</li>
</ul>

<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="icon-smile"></i> 
    <strong>亲爱的会员</strong> 如果您有什么意见/建议可以在这里留言，网站及课程都在更新中，您宝贵的意见将会是我们开发的动力。
</div>
<?php if($status==1) { ?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> 提交成功,谢谢您的反馈与支持 </div>
<?php } elseif($status==-1) { ?><div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> 提交失败，表单来路不对 </div>
<?php } ?>

<div class="content">
<form class="" action="" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
    <fieldset>
    <legend><i class="icon-envelope"></i> 留言/意见 箱</legend>
    
    <div class="control-group">
    	<div class="controls">
    	<label class="control-label">我的称呼</label>
    	<input name="name" class="span6" type="text" placeholder="昵称或者名字" value="<?php if(isset( $_G['username'])) { ?><?php echo $_G['username'];?><?php } ?>"/>
    	<span class="help-inline"><i class="icon-info-sign"></i> 如何称呼您.</span>
    	</div>
    </div>

    <div class="control-group">
    	<div class="controls">
    	<label class="control-label">我的邮箱</label>
    	<input name="email" class="span6" type="text" placeholder="Email地址" value="<?php if(isset( $_G['email'])) { ?><?php echo $_G['email'];?><?php } ?>">
    	<span class="help-inline"><i class="icon-info-sign"></i> 如何通知你.</span>
    	</div>
    </div>

    <div class="control-group">
    	<div class="controls">
    	<label>我的留言</label>
    	<textarea name="message" class="span6" rows=8 placeholder=""></textarea>
    	<span class="help-inline"><i class="icon-info-sign"></i> 写下你要说的话.</span>
    	</div>
    </div>

<div class="control-group">
<div class="controls">
<label>反馈类型</label>
    	<label class="checkbox">
    		<input name="<?php echo TYPE_PRODIUCT;?>" type="checkbox"> 产品咨询
    	</label>

    	<label class="checkbox">
    		<input name="<?php echo TYPE_BUG;?>" type="checkbox"> 问题反馈
    	</label>

    	<label class="checkbox">
    		<input name="<?php echo TYPE_CHANGE;?>" type="checkbox"> 改进意见
    	</label>

    	<label class="checkbox">
    		<input name="<?php echo TYPE_OTHER;?>" type="checkbox"> 其它问题
    	</label>
    	</div>
    </div>

<div class="control-group">
<div class="controls">
    		<button name="post" type="submit" class="btn btn-primary">提交</button>
    	</div>
    </div>
    	
    </fieldset>
</form>
</div><?php include template('common/footer'); ?>