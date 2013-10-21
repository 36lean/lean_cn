<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('register');
0
|| checktplrefresh('./template/tpl/member/register.htm', './template/default/common/seccheck.htm', 1381981101, '18', './data/template/24_18_member_register.tpl.php', './template/tpl', 'member/register')
;?><?php include template('common/header'); ?><div id="xxx"></div>
<script>
jQuery( function (){
jQuery('#user_profile').hide();

jQuery('#registerformsubmit').hide();

jQuery('#<?php echo $this->setting['reginput']['email'];?>').focus();

//jQuery('#next_step').attr({'disabled' : 'disabled'});

jQuery('input').keyup( function(){

});


jQuery('#<?php echo $this->setting['reginput']['username'];?>').keyup( function() {

var username =  jQuery(this).val();

if( username.length < 3) {
jQuery('#_username').html('<span class="label label-important"><i class="icon-remove"></i> 用户名长度过短,至少要包括3个字符</span>');

}else {
jQuery.post('<?php echo $_G['siteurl'];?>/request.php' , { _username : username} , function( response) {
if( response === '1') {
jQuery('#_username').html('<span class="label label-important"><i class="icon-remove"></i>  对不起 这个用户名已经存在 请更换</span>');	
jQuery(this).attr({'data-bool' : 0});
}	
else {
jQuery(this).attr({'data-bool' : 1});
jQuery('#_username').html('<span class="label label-success"><i class="icon-ok"></i></span>');

}
});			
}
});

jQuery('#<?php echo $this->setting['reginput']['password'];?>').blur( function(){

var password = jQuery(this).val();
if( password.length < 6) {
jQuery('#_password').html('<span class="label label-important"><i class="icon-remove"></i> 密码长度至少为6</span>');
jQuery(this).attr({'data-bool' : false});	
}else {
jQuery('#_password').html('<span class="label label-success"><i class="icon-ok"></i></span>');
jQuery(this).attr({'data-bool' : true});
}
});

jQuery('#<?php echo $this->setting['reginput']['password2'];?>').blur( function(){

var password2 = jQuery(this).val();
if( password2.length < 6) {
jQuery('#_password2').html('<span class="label label-important"><i class="icon-remove"></i> 密码长度至少为6</span>');
jQuery(this).attr({'data-bool' : false});	
}else if( password2 !== jQuery('#<?php echo $this->setting['reginput']['password'];?>').val()) {
jQuery('#_password2').html('<span class="label label-important"><i class="icon-remove"></i> 两次输入的密码不一样</span>');
jQuery(this).attr({'data-bool' : false});	
}else {
jQuery('#_password2').html('<span class="label label-success"><i class="icon-ok"></i></span>');
jQuery(this).attr({'data-bool' : true});
}
});

jQuery('#<?php echo $this->setting['reginput']['email'];?>').blur( function () {

var box = jQuery(this);
var email = jQuery(this).val();
var preg = /^\S+[@]\S+[.]\S+$/;
if( preg.test(email) === true) {
jQuery.post('<?php echo $_G['siteurl'];?>/request.php' , { _email : email} , function( response) {
if( '1' === response) {
box.next().html('<span class="label label-important"><i class="icon-remove"></i> 此邮箱已经被注册了 请尝试别的邮箱 </span> <a href="http://reg.email.163.com/unireg/call.do?cmd=register.entrance&amp;from=163mail_right" target="blank"><span class="label label-info"><i class="icon-info-sign"></i> 申请一个163邮箱</span></a>');
jQuery(this).attr({'data-bool' : false});
}else {
box.next().html('<span class="label label-success"><i class="icon-ok"></i></span>');
jQuery(this).attr({'data-bool' : true});		
}
});
}else {
jQuery('#_email').html('<span class="label label-important"><i class="icon-remove"></i> 电子邮件格式不对 例如:example@163.com</span>');
jQuery(this).attr({'data-bool' : true});
}
});

jQuery('#mobile').blur( function () {

var mobile = jQuery(this).val();

var preg = /^[1][0-9].{9}$/;

if( true === preg.test( mobile)) {

jQuery.post('<?php echo $_G['siteurl'];?>/request.php' , { _mobile : mobile} , function( response) {

if( '1' === response) {
jQuery('#mobile').next().html('<span class="label label-important"><i class="icon-remove"> 非法的手机号格式</i> 此手机号已经被使用');
jQuery('button').attr({'disabled':'disabled'});
}else {
jQuery('#mobile').next().html('<span class="label label-success"><i class="icon-ok"></i></span>');
jQuery('button').removeAttr('disabled');						
}				
});

}else {
jQuery(this).next().html('<span class="label label-important"><i class="icon-remove"></i> 手机号格式不对 例如:18702739465</span>');
jQuery('button').attr({'disabled':'disabled'});				
}
});

jQuery('#realname,#company,#position').blur( function() {
if( jQuery(this).val().length > 1) {
jQuery(this).next().html('<span class="label label-success"><i class="icon-ok"></i></span>');
}
});

jQuery('#next_step').click( function() {

jQuery('#user_account').delay('500').hide('slow');

jQuery('#user_profile').delay('500').show('slow');

jQuery('#registerformsubmit').delay('500').show('slow');
});
});

var flag_check = function () {
alert( flag);
};
</script>
<div id="main_succeed" style="display: none">
<div class="hero-unit" aling="center">
<div class="alert_right">
<p id="succeedmessage"></p>
<p id="succeedlocation" class="alert_btnleft"></p>
<p class="alert_btnleft"><a id="succeedmessage_href">如果您的浏览器没有自动跳转，请点击此链接</a></p>
</div>
</div>
</div>

<div class="" id="main_message">
<div id="layer_reginfo_t" class="page-header text-center">
<h2><i class="icon-pencil"></i> 
<?php if($_GET['action'] != 'activation') { ?>
<?php echo $this->setting['reglinkname'];?>
<?php } else { ?>
您的帐号需要激活
<?php } ?>
</h2>

<small>
<?php if(!empty($_G['setting']['pluginhooks']['register_side_top'])) echo $_G['setting']['pluginhooks']['register_side_top'];?>
<?php if($_GET['action'] == 'activation') { ?>
放弃激活，现在<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a>
<?php } else { ?>
<a href="member.php?mod=logging&amp;action=login&amp;referer=<?php echo rawurlencode($dreferer); ?>" onclick="showWindow('login', this.href);return false;" class="xi2">已有帐号？现在登录</a>
<?php } ?>
</small>

</div>



<p id="returnmessage4"></p>

<?php if($this->showregisterform) { ?>
<form class="form-inline" method="post" autocomplete="off" name="register" id="registerform" enctype="multipart/form-data" action="member.php?mod=<?php echo $regname;?>">
 
<div id="layer_reg" class="bm_c">
<input type="hidden" name="regsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo $dreferer;?>" />
<input type="hidden" name="activationauth" value="<?php if($_GET['action'] == 'activation') { ?><?php echo $activationauth;?><?php } ?>" />
<?php if($_G['setting']['sendregisterurl']) { ?>
<input type="hidden" name="hash" value="<?php echo $_GET['hash'];?>" />
<?php } ?>
<div class="">
<div id="reginfo_a">
<?php if(!empty($_G['setting']['pluginhooks']['register_top'])) echo $_G['setting']['pluginhooks']['register_top'];?>

<?php if($sendurl) { ?>
<script>
jQuery( function() {
jQuery('#registerformsubmit').show();
});
</script>
<table class="table" id="email_check">

<tr>
<th><label for="<?php echo $this->setting['reginput']['email'];?>">Email:</label></th>
<td>
<input type="text" id="<?php echo $this->setting['reginput']['email'];?>" name="<?php echo $this->setting['reginput']['email'];?>" autocomplete="off" size="25" tabindex="1" required />
<span id="_email" class="help-inline"></span>
<br /><em id="emailmore"></em>
<input type="hidden" name="handlekey" value="sendregister"/>
</td>
</tr>

<tr>
<th>&nbsp;</th>
<td class="tipwide">
注册需要验证邮箱，请务必填写正确的邮箱，提交后请及时查收邮件。<br />您可能需要等待几分钟才能收到邮件，如果收件箱没有，请检查一下垃圾邮件箱。
</td>
</tr>

<script type="text/javascript">
function succeedhandle_sendregister(url, msg, values) {
showDialog(msg, 'notice');
}
</script>
</table>
<?php } else { ?>
<table class="table">
<?php if($invite) { if($invite['uid']) { ?>

<tr>
<th>推荐人:</th>
<td><a href="home.php?mod=space&amp;uid=<?php echo $invite['uid'];?>" target="_blank"><?php echo $invite['username'];?></a></td>
</tr>

<?php } else { ?>

<tr>
<th><label for="invitecode">邀请码:</label></th>
<td><?php echo $_GET['invitecode'];?><input class="input-large" type="hidden" id="invitecode" name="invitecode" value="<?php echo $_GET['invitecode'];?>" /></td>
</tr><?php $invitecode = 1;?><?php } } if(empty($invite) && $this->setting['regstatus'] == 2 && !$invitestatus) { ?>

<tr>
<th><label for="invitecode">邀请码:</label></th>
<td><input type="text" id="invitecode" name="invitecode" autocomplete="off" size="25" onblur="checkinvite()" tabindex="1" required /><?php if($this->setting['inviteconfig']['buyinvitecode'] && $this->setting['inviteconfig']['invitecodeprice'] && ($this->setting['ec_tenpay_bargainor'] || $this->setting['ec_tenpay_opentrans_chnid'] || $this->setting['ec_account'])) { ?><p><a href="misc.php?mod=buyinvitecode" target="_blank" class="xi2">还没有邀请码？点击此处获取</a></p><?php } ?></td>
<td class="tipcol"><i id="tip_invitecode" class="p_tip"><?php if($this->setting['inviteconfig']['invitecodeprompt']) { ?><?php echo $this->setting['inviteconfig']['invitecodeprompt'];?><?php } ?></i><kbd id="chk_invitecode" class="p_chk"></kbd></td>
</tr><?php $invitecode = 1;?><?php } ?>
</table>



<?php if($_GET['action'] != 'activation') { ?>
<div id="user_account">

<h2><small>账户信息</small></h2>

<dl class="dl-horizontal control-group">
<dt><label class="control-label" for="<?php echo $this->setting['reginput']['email'];?>">Email</label></dt>
<dd class="controls">

<input class="" type="text" id="<?php echo $this->setting['reginput']['email'];?>" name="email" autocomplete="off" tabindex="1" value="<?php echo $_POST['email'];?>" placeholder="邮件" data-bool=0 />

<span id="_email" class="help-inline"></span>
<br />
<em id="emailmore" style="float:left;margin-left:-20px;"></em>

</dd>

</dl>

<dl class="dl-horizontal control-group">
<dt>
<label class="control-label" for="<?php echo $this->setting['reginput']['username'];?>">用户名</label>
</dt>
<dd class="controls">
<input class="" type="text" id="<?php echo $this->setting['reginput']['username'];?>" name="username" tabindex="1" autocomplete="off" size="25" maxlength="15" placeholder="账号" data-bool=0 />

<span id="_username" class="help-inline"></span>

<dd/>
</dl>

<dl class="dl-horizontal control-group">
<dt><label class="control-label" for="<?php echo $this->setting['reginput']['password'];?>">密码</label></dt>
<dd class="controls">
<input class="" type="password" id="<?php echo $this->setting['reginput']['password'];?>" name="password" autocomplete="off"  size="25" maxlength="15" tabindex="1" required placeholder="密码" data-bool=0 />
<span id="_password" class="help-inline"></span>
</dd>
</dl>

<dl class="dl-horizontal control-group">
<dt><label class="control-label" for="<?php echo $this->setting['reginput']['password2'];?>">确认密码</label></dt>
<dd class="controls">
<input class="" type="password" id="<?php echo $this->setting['reginput']['password2'];?>" name="password2" autocomplete="off" size="25" maxlength="15" tabindex="1" value="" required placeholder="再次输入密码" data-bool=0 />
<span id="_password2" class="help-inline"></span>
</dd>
</dl>


<dl class="dl-horizontal margin-top control-group">
<dt></dt>
<dd><button id="next_step" type="button" class="btn btn-success btn-large span2">下一步</button></dd>
</dl>
</div>
<?php } if($_GET['action'] == 'activation') { ?>

<tr>
<th>用户名:</th>
<td><strong><?php echo $username;?></strong></td>
</tr>

<?php } if($this->setting['regverify'] == 2) { ?>

<tr>
<th><label for="regmessage">注册原因:</label></th>
<td><input class="input-large" id="regmessage" name="regmessage" autocomplete="off" size="25" tabindex="1" required /></td>
<td class="tipcol"><i id="tip_regmessage" class="p_tip">您填写的注册原因会被当作申请注册的重要参考依据，请认真填写。</i></td>
</tr>

<?php } if(empty($invite) && $this->setting['regstatus'] == 3) { ?>

<tr>
<th><label for="invitecode">邀请码:</label></th>
<td><input class="input-large" type="text" name="invitecode" autocomplete="off" size="25" id="invitecode"<?php if($this->setting['regstatus'] == 2) { ?> onblur="checkinvite()"<?php } ?> tabindex="1" /></td>
</tr><?php $invitecode = 1;?><?php } ?>

<div id="user_profile">
<h2><small>用户资料</small></h2><?php if(is_array($_G['cache']['fields_register'])) foreach($_G['cache']['fields_register'] as $field) { if($htmls[$field['fieldid']]) { if($field['required']) { } ?>

<dl class="dl-horizontal control-group">
<dt><label class="control-label" for="<?php echo $field['fieldid'];?>"><?php echo $field['title'];?></label></dt>
<dd class="controls"><?php echo str_replace('px' , 'input-large' , $htmls[$field['fieldid']])?><span class="help-inline"></span>
</dd>
</dl>
<?php } } ?>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['register_input'])) echo $_G['setting']['pluginhooks']['register_input'];?>

<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF

<div class="">
<table>
<tr><th>
<sec>: 
</th><td>
<sec><br /><sec>
</td></tr>
</table>
</div>

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

</div>

</div>

</div>

<div id="layer_reginfo_b">
<dl class="dl-horizontal margin-top control-group">
<dt>
</dt>
<dd>
<span id="reginfo_a_btn">
<?php if($_GET['action'] != 'activation') { ?><em>&nbsp;</em><?php } ?>

<button class="btn btn-success btn-large span2" id="registerformsubmit" type="submit" name="regsubmit" value="true" tabindex="1"><strong><?php if($_GET['action'] == 'activation') { ?>激活<?php } else { ?>提交<?php } ?></strong>

</button>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($bbrules) { ?>

<label class="checkbox" for="agreebbrule">
<input type="checkbox" name="agreebbrule" value="<?php echo $bbrulehash;?>" id="agreebbrule" checked="checked" />同意<a href="javascript:;" onclick="showBBRule()">网站服务条款</a>
</label>
<?php } ?>
</span>
</dd>
<?php if($this->setting['sitemessage']['register']) { ?>
<a href="javascript:;" id="custominfo_register" class="y">
<img src="<?php echo IMGDIR;?>/info_small.gif" alt="帮助" />
</a>
<?php } ?>
</dl>


<?php if(!empty($_G['setting']['pluginhooks']['register_logging_method'])) { ?>
<div class="rfm bw0 <?php if(empty($_GET['infloat'])) { ?> mbw<?php } ?>">
<hr class="l" />
<table>
<tr>
<th>快捷登录:</th>
<td><?php if(!empty($_G['setting']['pluginhooks']['register_logging_method'])) echo $_G['setting']['pluginhooks']['register_logging_method'];?></td>
</tr>
</table>
</div>
<?php } ?>
</div>
</form>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['register_bottom'])) echo $_G['setting']['pluginhooks']['register_bottom'];?>
</div>
<div id="layer_regmessage" style="display: none">
<div class="c"><div class="alert_right">
<div id="messageleft1"></div>
<p class="alert_btnleft" id="messageright1"></p>
</div>
</div>

<div id="layer_bbrule" style="display: none">
<div class="c" style="width:700px;height:350px;overflow:auto"><?php echo $bbrulestxt;?></div>
<p class="fsb pns cl hm">
<button class="pn pnc" onclick="$('agreebbrule').checked = true;hideMenu('fwin_dialog', 'dialog');<?php if($this->setting['sitemessage']['register'] && ($bbrules && $bbrulesforce)) { ?>showRegprompt();<?php } ?>"><span>同意</span></button>
<button class="pn" onclick="location.href='<?php echo $_G['siteurl'];?>'"><span>不同意</span></button>
</p>
</div>



</div><?php updatesession();?><?php include template('common/footer'); ?>