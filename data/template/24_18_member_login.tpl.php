<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/tpl/member/login.htm', './template/default/common/seccheck.htm', 1384248485, '18', './data/template/24_18_member_login.tpl.php', './template/tpl', 'member/login')
;?><?php include template('common/header'); ?><?php $loginhash = 'L'.random(4);?><?php if(empty($_GET['infloat'])) { ?>
<div id="ct">
<div class="nfl" id="main_succeed" style="display: none">
<div class="f_c altw">
<div class="alert_right">
<p id="succeedmessage"></p>
<p id="succeedlocation" class="alert_btnleft"></p>
<p class="alert_btnleft"><a id="succeedmessage_href">如果您的浏览器没有自动跳转，请点击此链接</a></p>
</div>
</div>
</div>

<div class="page-header" align="center" id="main_message">	
<h2>登录</h2>
<span class=""><?php if(!empty($_G['setting']['pluginhooks']['logging_side_top'])) echo $_G['setting']['pluginhooks']['logging_side_top'];?></span>
</div>

<?php } ?>


<div class="row" id="main_messaqge_<?php echo $loginhash;?>">
<div id="layer_login_<?php echo $loginhash;?>">
<div class="span2"></div>
<div class="span7">
<h3 class="flb">
<em id="returnmessage_<?php echo $loginhash;?>">
<?php if(!empty($_GET['infloat'])) { if(!empty($_GET['guestmessage'])) { ?>您需要先登录才能继续本操作<?php } elseif($auth) { ?>请补充下面的登录信息<?php } else { ?>用户登录<?php } } ?>
</em>
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>', 0, 1);" title="关闭">关闭</a><?php } ?></span>
</h3>
<?php if(!empty($_G['setting']['pluginhooks']['logging_top'])) echo $_G['setting']['pluginhooks']['logging_top'];?>
<form class="inline" method="post" autocomplete="off" name="login" id="loginform_<?php echo $loginhash;?>" class="cl" onsubmit="<?php if($this->setting['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>pwdclear = 1;ajaxpost('loginform_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes<?php if(!empty($_GET['handlekey'])) { ?>&amp;handlekey=<?php echo $_GET['handlekey'];?><?php } if(isset($_GET['frommessage'])) { ?>&amp;frommessage<?php } ?>&amp;loginhash=<?php echo $loginhash;?>">

<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<?php if($auth) { ?>
<input type="hidden" name="auth" value="<?php echo $auth;?>" />
<?php } ?>

<table class="table table-noborder">
<?php if($invite) { ?>

<tr>
<th>推荐人</th>
<td><a href="home.php?mod=space&amp;uid=<?php echo $invite['uid'];?>" target="_blank"><?php echo $invite['username'];?></a></td>
</tr>

<?php } if(!$auth) { ?>

<tr>
<th>
<?php if($this->setting['autoidselect']) { ?><label for="username_<?php echo $loginhash;?>">帐号:</label><?php } else { ?>
<span class="login_slct">
<select name="loginfield" width="95" id="loginfield_<?php echo $loginhash;?>">
<option value="username">用户名</option>
<?php if(getglobal('setting/uidlogin')) { ?>
<option value="uid">UID</option>
<?php } ?>
<option value="email">Email</option>
</select>
</span>
<?php } ?>
</th>
<td><input type="text" name="username" id="username_<?php echo $loginhash;?>" autocomplete="off" size="30" tabindex="1" value="<?php echo $username;?>" />
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a></td>
</tr>


<tr>
<th><label for="password3_<?php echo $loginhash;?>">密码:</label></th>
<td><input type="password" id="password3_<?php echo $loginhash;?>" name="password" onfocus="clearpwd()" size="30" tabindex="1" /> 
<a href="javascript:;" onclick="display('layer_login_<?php echo $loginhash;?>');display('layer_lostpw_<?php echo $loginhash;?>');" title="找回密码">找回密码</a></td>
</tr>

<?php } if(empty($_GET['auth']) || $questionexist) { if(false) { ?>
<tr>
<th>安全提问:</th>
<td><select id="loginquestionid_<?php echo $loginhash;?>" width="213" name="questionid"<?php if(!$questionexist) { ?> onchange="if($('loginquestionid_<?php echo $loginhash;?>').value > 0) {$('loginanswer_row_<?php echo $loginhash;?>').style.display='';} else {$('loginanswer_row_<?php echo $loginhash;?>').style.display='none';}"<?php } ?>>
<option value="0"><?php if($questionexist) { ?>安全提问<?php } else { ?>安全提问(未设置请忽略)<?php } ?></option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">您其中一位老师的名字</option>
<option value="5">您个人计算机的型号</option>
<option value="6">您最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select></td>
</tr>

<tr id="loginanswer_row_<?php echo $loginhash;?>" <?php if(!$questionexist) { ?> style="display:none"<?php } ?>>
<th>答案:</th>
<td><input type="text" name="answer" id="loginanswer_<?php echo $loginhash;?>" autocomplete="off" size="30" class="px p_fre" tabindex="1" /></td>
</tr>
<?php } } if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<tr><th><sec>: </th><td><sec><br /><sec></td></tr>
EOF;
?><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } } ?>

<?php if(!empty($_G['setting']['pluginhooks']['logging_input'])) echo $_G['setting']['pluginhooks']['logging_input'];?>

<?php if(false) { ?>
<tr>
<th></th>
<td><label class="checkbox" for="cookietime_<?php echo $loginhash;?>"><input type="checkbox" class="pc" name="cookietime" id="cookietime_<?php echo $loginhash;?>" tabindex="1" value="2592000" <?php echo $cookietimecheck;?> /> 自动登录</label></td>
</tr>
<?php } ?>

<tr>
<th>&nbsp;</th>
<td>
<button class="btn btn-success btn-small" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>登录</strong></button>

<?php if($this->setting['sitemessage']['login'] && empty($_GET['infloat'])) { ?><a href="javascript:;" id="custominfo_login_<?php echo $loginhash;?>" class="y">&nbsp;<img src="<?php echo IMGDIR;?>/info_small.gif" alt="帮助" class="vm" /></a><?php } if(false) { if(!$this->setting['bbclosed'] && empty($_GET['infloat'])) { ?><a href="javascript:;" onclick="ajaxget('member.php?mod=clearcookies&formhash=<?php echo FORMHASH;?>', 'returnmessage_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>');return false;" title="清除痕迹" class="y">清除痕迹</a>
<?php } } ?>

<a href="weibo.php" title="新浪微博登录"><img src="<?php echo $_G['siteurl'];?>static/mot/weibo_login_small.png" /></a>



</td>
</tr>

<?php if(!empty($_G['setting']['pluginhooks']['logging_method'])) { ?>
<div class="rfm bw0 <?php if(empty($_GET['infloat'])) { ?> mbw<?php } ?>">
<hr class="l" />
<table>
<tr>
<th>快捷登录:</th>
<td><?php if(!empty($_G['setting']['pluginhooks']['logging_method'])) echo $_G['setting']['pluginhooks']['logging_method'];?></td>
</tr>
</table>
<?php } ?>
</table>

</form>
</div>

<div class="span3">
    <div class="list-group">
    	<a class="list-group-item" href="javascript:;" onclick="display('layer_login_<?php echo $loginhash;?>');display('layer_lostpw_<?php echo $loginhash;?>');" title="找回密码">
    	<h4 class="list-group-item-heading">找回密码</h4>
    	<p class="list-group-item-text">如果不记得帐户名 点击这里 输入你的邮箱试试</p>
    	</a>

    	<a href="member.php?mod=logging&amp;action=login" class="list-group-item active">登陆  <i class="icon-ok"></i> </a>
  				<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="list-group-item">正在注册</a>

</div>
</div>
</div>
</div>



<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } ?>




<div id="layer_lostpw_<?php echo $loginhash;?>" style="display: none;">



<div class="row-fluid">

<div class="span2"></div>

<div class="span4">

<h3>
找回密码
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a><?php } ?></span>
</h3>


<p class="lead">输入我的邮箱</p>
<form method="post" autocomplete="off" id="lostpwform_<?php echo $loginhash;?>" class="cl" onsubmit="ajaxpost('lostpwform_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">

<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="lostpwform" />

<div class="control-group">
<div class="controls">
<label for="lostpw_email">Email:</label>
<input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" class="input-large" />
</div>
</div>


<div class="control-group">
<div class="controls">
<button class="btn btn-primary" type="submit" name="lostpwsubmit" value="true" tabindex="100"><span>发送找回密码的邮件</span></button>
</div>
</div>

</form>
</div>

<div class="span3">

<div class="">
<blockquote>
<h3>欢迎回来 !</h3>

<ol>
<li>输入您的邮箱</li> 
<li>我们将发送链接到您的邮箱</li> 
<li>请注意查收邮件</li>
</ol>
</blockquote>
</div>

</div>

<div class="span3">
    <div class="list-group">
    	<a class="list-group-item active" href="javascript:;" onclick="display('layer_login_<?php echo $loginhash;?>');display('layer_lostpw_<?php echo $loginhash;?>');" title="找回密码">
    	<h4 class="list-group-item-heading">找回密码 <i class="icon-ok"></i> </h4>
    	<p class="list-group-item-text">如果不记得帐户名 点击这里 输入你的邮箱试试</p>
    	</a>

    	<a href="member.php?mod=logging&amp;action=login" class="list-group-item">登陆</a>
  				<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="list-group-item">正在注册</a>
</div>
</div>
</div>
</div>

<div id="layer_message_<?php echo $loginhash;?>"<?php if(empty($_GET['infloat'])) { ?> class="f_c blr nfl"<?php } ?> style="display: none;">
<h3 class="flb" id="layer_header_<?php echo $loginhash;?>">
<?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?>
<em>用户登录</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a></span>
<?php } ?>
</h3>
<div class="c"><div class="alert_right">
<div id="messageleft_<?php echo $loginhash;?>"></div>
<p class="alert_btnleft" id="messageright_<?php echo $loginhash;?>"></p>
</div>
</div>

<script type="text/javascript" reload="1">
<?php if(!isset($_GET['viewlostpw'])) { ?>
var pwdclear = 0;
function initinput_login() {
document.body.focus();
<?php if(!$auth) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
$('loginform_<?php echo $loginhash;?>').username.focus();
}
<?php if(!$this->setting['autoidselect']) { ?>
simulateSelect('loginfield_<?php echo $loginhash;?>');
<?php } } ?>
}
initinput_login();
<?php if($this->setting['sitemessage']['login']) { ?>
showPrompt('custominfo_login_<?php echo $loginhash;?>', 'mouseover', '<?php echo trim($this->setting['sitemessage']['login'][array_rand($this->setting['sitemessage']['login'])]); ?>', <?php echo $this->setting['sitemessage']['time'];?>);
<?php } ?>

function clearpwd() {
if(pwdclear) {
$('password3_<?php echo $loginhash;?>').value = '';
}
pwdclear = 0;
}
<?php } else { ?>
display('layer_login_<?php echo $loginhash;?>');
display('layer_lostpw_<?php echo $loginhash;?>');
$('lostpw_email').focus();
<?php } ?>
</script><?php updatesession();?><?php if(empty($_GET['infloat'])) { ?>
</div></div>
<?php } include template('common/footer'); ?>