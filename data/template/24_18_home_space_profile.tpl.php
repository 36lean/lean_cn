<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');
0
|| checktplrefresh('./template/tpl/home/space_profile.htm', './template/tpl/common/header.htm', 1380525994, '18', './data/template/24_18_home_space_profile.tpl.php', './template/tpl', 'home/space_profile')
|| checktplrefresh('./template/tpl/home/space_profile.htm', './template/tpl/home/space_profile_body.htm', 1380525994, '18', './data/template/24_18_home_space_profile.tpl.php', './template/tpl', 'home/space_profile')
|| checktplrefresh('./template/tpl/home/space_profile.htm', './template/tpl/home/space_userabout.htm', 1380525994, '18', './data/template/24_18_home_space_profile.tpl.php', './template/tpl', 'home/space_profile')
|| checktplrefresh('./template/tpl/home/space_profile.htm', './template/tpl/common/footer.htm', 1380525994, '18', './data/template/24_18_home_space_profile.tpl.php', './template/tpl', 'home/space_profile')
|| checktplrefresh('./template/tpl/home/space_profile.htm', './template/tpl/common/header_common.htm', 1380525994, '18', './data/template/24_18_home_space_profile.tpl.php', './template/tpl', 'home/space_profile')
;?>
<div class="container">
<?php if($_G['setting']['homepagestyle']) { ?>﻿<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<meta http-equiv="Cache-Control" content="max-age=7200" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 全球第一家中文精益学习平台</title>
<?php echo $_G['setting']['seohead'];?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="精益培训,精益视频,精益博客,精益生产,改善项目,精益5s,生产管理,现场管理" />
<meta name="description" content="一站式在线精益学习平台,改善在线学院主要业务是精益培训" />
<meta name="production" content="六西格玛 精益创业 精益生产 5S现场 7大浪费 看板系统  改善之路 实践问题解决 标准作业 及时制生产 价值流分析 快速切换 方针管理 " />
<meta name="author" content="36lean studio" />
<meta name="copyright" content="36lean 精益云学院" />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" />
<link href="<?php echo $_G['siteurl'];?>static/bs/css/bootstrap-responsive.min.css" rel="stylesheet" />
   	<link href="<?php echo $_G['siteurl'];?>static/mot/professional.css" rel="stylesheet" />
   	<link href="<?php echo $_G['siteurl'];?>static/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $_G['siteurl'];?>static/bs_jq_ui/css/custom-theme/jquery-ui-1.10.2.custom.css" rel="stylesheet" />
<!--<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>-->
<script src="<?php echo $_G['siteurl'];?>static/bs_jq_ui/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">jQuery(function(){jQuery.noConflict()})</script>
<script src="<?php echo $_G['siteurl'];?>static/bs_jq_ui/js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_follow.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { ?><?php $_GET['diy'] = '';?><?php } if(!isset($topic)) { ?><?php $topic = array();?><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if(widthauto()) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>




<!--[if IE 7]>
   	<link href="<?php echo $_G['siteurl'];?>static/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
<![endif]-->  	
  	<style type="text/css">
body{margin-bottom:50px;font-family: 微软雅黑;background: url( 'static/mot/bg.jpg') ;}.container-narrow{margin:0 auto;max-width:700px}.container-narrow>.jumbotron{margin:60px 0;text-align:center}.jumbotron h1{font-size:54px;line-height:1}.jumbotron .btn{font-size:21px;padding:14px 24px}.marketing{margin:60px 0}.marketing p+h4{margin-top:28px}
    </style>


  	<!--<link rel="stylesheet" type="text/css" href="<?php echo $_G['siteurl'];?>static/bsie/bootstrap/css/bootstrap-ie6.css">-->
  	<!--[if lte IE 6]>
  	<link rel="stylesheet" type="text/css" href="<?php echo $_G['siteurl'];?>static/bsie/bootstrap/css/bootstrap-ie6.css">
  	<![endif]-->
  	<!--[if lte IE 7]>
  	<link rel="stylesheet" type="text/css" href="<?php echo $_G['siteurl'];?>static/bsie/bootstrap/css/ie.css">
  	<![endif]-->
  	<script src="<?php echo $_G['siteurl'];?>static/mot/jquery.lazyload.js?v=1.8.5" type="text/javascript"></script>
  	
  	<!-- HTML5 shim, for IE6-8 support of HTML5 elements--><!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script><![endif]-->

    <script>
  	jQuery( function(){
jQuery("img").lazyload({effect : "fadeIn"});
  	});
    function ResumeError() {  
         return true;  
    }  
    window.onerror = ResumeError;
  	</script>
</head>


<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container">
    <div class="nav-collapse collapse">
<ul class="nav">
<li><a href="javascript:;"  onclick="setHomepage('<?php echo $_G['siteurl'];?>');"><i class="icon-home"></i> 设为首页</a></li>
<li><a href="<?php echo $_G['siteurl'];?>"  onclick="addFavorite(this.href, '<?php echo $navtitle;?>');return false;"><i class="icon-bookmark-empty"></i> 收藏本站</a></li>
<li><a href="<?php echo $_G['siteurl'];?>messagebox.php"><i class="icon-envelope-alt"></i> 在线咨询</a></li>
</ul>


        <form class="form-inline navbar-form pull-left" action="msearch.php" method="get" style="margin-left:53px;">
    		<div class="input-append">
    			<input name="keywords" type="text" class="span3" placeholder="输入你要找的课程"/>
    			<button name="findout" type="submit" class="btn btn-primary">搜索</button>
    		</div>
    	</form>


      	<ul class="nav pull-right">
<?php if(!$_G['uid']) { ?>
          	<li class=""><a href="member.php?mod=logging&amp;action=login">登陆</a></li>
            <li class=""><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">注册</a></li>



            <?php } else { ?>
            <li class=""><a href="user.php"><i class="icon-user"></i> <?php echo $_G['username'];?>在线</a></li>
            <li class=""><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"> 注销</a></li>
            	<?php if($_G['adminid'] == 1) { ?><li class="pull-right"><a href="admincp/index.php">管理</a></li><?php } ?>
         	
         	<?php } ?>
      	</ul>
</div>		
</div>
</div>
</div>

<div class="container content">

<div class="row" style="padding-top:40px;padding-bottom:40px;position:relative">

<div class="span4">
<a href="<?php echo $_G['siteurl'];?>"><img src="<?php echo $_G['siteurl'];?>/static/mot/logo.png" data-original="<?php echo $_G['siteurl'];?>/static/mot/logo.png" /></a>
</div>

<div class="span7" style="position:absolute;bottom:15px;right:30px;">
        <ul class="nav nav-pills pull-right">
          	<li <?php if(CURSCRIPT === 'portal' && CURMODULE !== 'aboutus') { ?>class="active"<?php } ?>><a href="portal.php"><i class="icon-home"></i> 首页</a></li>
          	<li <?php if(CURSCRIPT === 'lesson') { ?>class="active"<?php } ?>><a href="lesson.php"><i class="icon-cloud"></i> 在线课程</a></li>
          	<li <?php if(CURSCRIPT === 'knowledge') { ?>class="active"<?php } ?>><a href="reader.php"><i class="icon-globe"></i> 新闻</a></li>
          	<li <?php if($_GET['title'] === 'product') { ?>class="active"<?php } ?>><a href="read.php?title=product"><i class="icon-trophy"></i> 产品版本</a></li>
          	<li <?php if($_GET['title'] === 'aboutus') { ?>class="active"<?php } ?>><a href="read.php?title=aboutus"><i class="icon-group"></i> 关于我们</a></li>
          	<li <?php if($_GET['title'] === 'contactus') { ?>class="active"<?php } ?>><a href="read.php?title=contactus"><i class="icon-phone"></i> 联系我们</a></li>
        </ul>
     </div>
</div>

<div class="container">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { include template('common/header_diy'); } if(check_diy_perm($topic)) { ?><?php
$__STATICURL = STATICURL;$diynav = <<<EOF


<img class="img-polaroid lazy" src="{$__STATICURL}image/diy/panel-toggle.png" alt="DIY" />
<div id="diy-tg_menu" style="display: none;">
<ul>
<li><a href="javascript:saveUserdata('diy_advance_mode', '');openDiy();">简洁模式</a></li>
<li><a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();">高级模式</a></li>
</ul>
</div>

EOF;
?>
<?php } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } if(CURSCRIPT == 'forum') { ?>
<h1>改善社区<small></small></h1>



<?php if(!IS_ROBOT) { if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;">
<?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onclick="extstyle('')" title="默认"><i></i></span><?php } if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?><span class="sslct_btn" onclick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span>
<?php } ?>
</div>
<?php } ?>

<div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;">
<?php if($_G['uid']) { ?>
<ul><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<?php } elseif($_G['connectguest']) { ?>
<div class="ptm pbw hm">
请先<br /><a class="xi2" href="member.php?mod=connect"><strong>完善帐号信息</strong></a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2 xw1"><strong>绑定已有帐号</strong></a><br />后使用快捷导航
</div>
<?php } else { ?>
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a>
</div>
<?php } ?>
</div>
<?php } ?><?php echo adshow("headerbanner/wp a_h");?><div id="hd">
<div class="wp">
<div class="hdc cl"><?php $mnid = getcurrentnav();?><?php if($_G['uid']) { ?>
<!--用户信息栏跟菜单栏-->
<div align="center">
<table class="table table-bordered">
<tr>
<td>
<strong class="vwmy<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a></strong>

<?php if($_G['group']['allowinvisible']) { ?>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="切换在线状态" onclick="ajaxget(this.href, 'loginstatus');return false;"></a>
</span>
<?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?><a href="home.php?mod=spacecp">设置</a>

<span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" id="pm_ntc">消息</a>

<span class="pipe">|</span><a href="home.php?mod=space&amp;do=notice" id="myprompt">提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>

<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><span class="pipe">|</span><a href="home.php?mod=task&amp;item=doing" id="task_ntc">进行中的任务</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>

<span class="pipe">|</span><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<span class="pipe">|</span><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a>
<?php } if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>
<span class="pipe">|</span><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<span class="pipe">|</span><a href="admin.php" target="_blank">管理中心</a>
<?php } ?><?php $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?><span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu"<?php if(!$_G['setting']['bbclosed']) { ?> onmouseover="delayShow(this, showCreditmenu);" class="showmenu"<?php } ?>>积分: <?php echo $_G['member']['credits'];?></a>

<span class="pipe">|</span>用户组: <a href="home.php?mod=spacecp&amp;ac=usergroup"<?php if($upgradecredit !== 'false') { ?> id="g_upmine" onmouseover="delayShow(this, showUpgradeinfo)"<?php } ?>><?php echo $_G['group']['grouptitle'];?></a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>
</td>
</tr>
</table>
</div>
<!--用户信息栏跟菜单栏-->


<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<!--未登录-->
<p>
<strong><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<?php } elseif(!$_G['connectguest']) { include template('member/login_simple'); } else { ?>
<div id="um">
<div class="avt y"><?php echo avatar(0,small);?></div>
<p>
<strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<p>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>
<span class="pipe">|</span>用户组: <?php echo $_G['group']['grouptitle'];?>
</p>
</div>
<!--未登录-->
<?php } ?>
</div>

<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
 <li><?php echo $module['url'];?></li>
 <?php } } ?>
</ul>
<?php } ?>

<?php echo $_G['setting']['menunavs'];?>
<div id="mu" class="cl">
<?php if($_G['setting']['subnavs']) { if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
<ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
<?php echo $subnav;?>
</ul>
<?php } } } ?>
</div><?php echo adshow("subnavbanner/a_mu");?></div>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } ?>

</div>

<div class="container"><div class="content">
<div>
<div>
<div>
<?php } else { include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> &rsaquo;
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> &rsaquo;
个人资料
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="">
<!--[diy=diy1]--><div id="diy1" class=""></div><!--[/diy]-->
</div><?php include template('home/space_menu'); ?><div id="ct" class="">
<div class="">
<!--[diy=diycontenttop]--><div id="diycontenttop" class=""></div><!--[/diy]-->
<div class="">
<div class="">
<?php } ?>

<div class="container row row-fluid">
<div class="span10"><div class="">

<div class="">
<h2 class="mbn">
[ <?php echo $space['username'];?> ]
<?php if($_G['ols'][$space['uid']]) { ?>
<img src="<?php echo IMGDIR;?>/ol.gif" alt="online" title="在线" class="vm" />&nbsp;
<?php } ?>
<span class="xw0">(UID: <?php echo $space['uid'];?><?php $isfriendinfo = 'home_friend_info_'.$space['uid'].'_'.$_G[uid];?><?php if($_G[$isfriendinfo]['note']) { ?>
, <span class="xg1"><?php echo $_G[$isfriendinfo]['note'];?></span>
<?php } ?>
)</span>
</h2>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_top'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_top'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_top'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_top'];?>
<?php } ?>
<ul class="pf_l cl pbm mbm">
<?php if($_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength') && !empty($space['domain'])) { ?><?php $spaceurl = 'http://'.$space['domain'].'.'.$_G['setting']['domain']['root']['home'];?><li><em>二级域名</em><a href="<?php echo $spaceurl;?>" onclick="setCopy('<?php echo $spaceurl;?>', '空间地址复制成功');return false;"><?php echo $spaceurl;?></a></li>
<?php } if($_G['setting']['homepagestyle']) { ?>
<li><em>空间访问量</em><strong class="xi1"><?php echo $space['views'];?></strong></li>
<?php } if(in_array($_G['adminid'], array(1, 2))) { ?>
<li><em>Email</em><?php echo $space['email'];?></li>
<?php } ?>
<li><em>邮箱状态</em><?php if($space['emailstatus'] > 0) { ?>已验证<?php } else { ?>未验证<?php } ?></li>
<li><em>视频认证</em><?php if($space['videophotostatus'] > 0) { ?>已认证 <?php if($showvideophoto) { ?>&nbsp;&nbsp;(<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=videophoto" id="viewphoto" onclick="showWindow(this.id, this.href, 'get', 0)">查看认证照片</a>)<?php } } else { ?>未认证<?php } ?></li>
</ul>
<ul>
<?php if($space['spacenote']) { ?><li><em class="xg1">最新记录&nbsp;&nbsp;</em><?php echo $space['spacenote'];?></li><?php } if($space['customstatus']) { ?><li class="xg1"><em>自定义头衔&nbsp;&nbsp;</em><?php echo $space['customstatus'];?></li><?php } if($space['group']['maxsigsize'] && $space['sightml']) { ?><li><em class="xg1">个人签名&nbsp;&nbsp;</em><table><tr><td><?php echo $space['sightml'];?></td></tr></table></li><?php } ?>
</ul>
<ul class="cl bbda pbm mbm">
<li>
<em class="xg2">统计信息</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=friend&amp;view=me&amp;from=space" target="_blank">好友数 <?php echo $space['friends'];?></a>
<?php if(helper_access::check_module('doing')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space" target="_blank">记录数 <?php echo $space['doings'];?></a>
<?php } if(helper_access::check_module('blog')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me&amp;from=space" target="_blank">日志数 <?php echo $space['blogs'];?></a>
<?php } if(helper_access::check_module('album')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;view=me&amp;from=space" target="_blank">相册数 <?php echo $space['albums'];?></a>
<?php } if($_G['setting']['allowviewuserthread'] !== false) { ?>
<span class="pipe">|</span><?php $space['posts'] = $space['posts'] - $space['threads'];?><a href="<?php if(CURMODULE != 'follow') { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=thread&view=me&type=reply&from=space<?php } else { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&view=thread&type=reply<?php } ?>" target="_blank">回帖数 <?php echo $space['posts'];?></a>
<span class="pipe">|</span>
<a href="<?php if(CURMODULE != 'follow') { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=thread&view=me&type=thread&from=space<?php } else { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&view=thread<?php } ?>" target="_blank">主题数 <?php echo $space['threads'];?></a>
<?php } if(helper_access::check_module('share')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;from=space" target="_blank">分享数 <?php echo $space['sharings'];?></a>
<?php } ?>
</li>
</ul>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_middle'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_middle'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_middle'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_middle'];?>
<?php } ?>
<ul class="pf_l cl"><?php if(is_array($profiles)) foreach($profiles as $value) { ?><li><em><?php echo $value['title'];?></em><?php echo $value['value'];?></li>
<?php } ?>
</ul>
</div>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_bottom'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_bottom'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_bottom'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_bottom'];?>
<?php } if($space['medals']) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">勋章</h2>
<p class="md_ctrl">
<a href="home.php?mod=medal"><?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?><img src="<?php echo STATICURL;?>/image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" id="md_<?php echo $medal['medalid'];?>" onmouseover="showMenu({'ctrlid':this.id, 'menuid':'md_<?php echo $medal['medalid'];?>_menu', 'pos':'12!'});" />
<?php } ?>
</a>
</p>
</div><?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?><div id="md_<?php echo $medal['medalid'];?>_menu" class="tip tip_4" style="display: none;">
<div class="tip_horn"></div>
<div class="tip_c">
<h4><?php echo $medal['name'];?></h4>
<p><?php echo $medal['description'];?></p>
</div>
</div>
<?php } } if($_G['setting']['verify']['enabled']) { ?><?php $showverify = true;?><?php if(is_array($_G['setting']['verify'])) foreach($_G['setting']['verify'] as $vid => $verify) { if($verify['available']) { if($showverify) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">用户认证</h2><?php $showverify = false;?><?php } if($space['verify'.$vid] == 1) { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>" target="_blank"><?php if($verify['icon']) { ?><img src="<?php echo $verify['icon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } else { ?><?php echo $verify['title'];?><?php } ?></a>&nbsp;
<?php } elseif(!empty($verify['unverifyicon'])) { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>" target="_blank"><?php if($verify['unverifyicon']) { ?><img src="<?php echo $verify['unverifyicon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } ?></a>&nbsp;
<?php } } } if(!$showverify) { ?></div><?php } } if($count) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">管理以下版块</h2><?php if(is_array($manage_forum)) foreach($manage_forum as $key => $value) { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $key;?>" target="_blank"><?php echo $value;?></a> &nbsp;
<?php } ?>
</div>
<?php } if($groupcount) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">已加入群组</h2><?php if(is_array($usergrouplist)) foreach($usergrouplist as $key => $value) { ?><a href="forum.php?mod=group&amp;fid=<?php echo $value['fid'];?>" target="_blank"><?php echo $value['name'];?></a> &nbsp;
<?php } ?>
</div>
<?php } ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">活跃概况</h2>
<ul>
<?php if($space['adminid']) { ?><li><em class="xg1">管理组&nbsp;&nbsp;</em><span style="color:<?php echo $space['admingroup']['color'];?>"><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $space['adminid'];?>" target="_blank"><?php echo $space['admingroup']['grouptitle'];?></a></span> <?php echo $space['admingroup']['icon'];?></li><?php } ?>
<li><em class="xg1">用户组&nbsp;&nbsp;</em><span style="color:<?php echo $space['group']['color'];?>"<?php if($upgradecredit !== false) { ?> class="xi2" onmouseover="showTip(this)" tip="积分 <?php echo $space['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $space['groupid'];?>" target="_blank"><?php echo $space['group']['grouptitle'];?></a></span> <?php echo $space['group']['icon'];?> <?php if(!empty($space['groupexpiry'])) { ?>&nbsp;有效期至&nbsp;<?php echo dgmdate($space[groupexpiry], 'Y-m-d H:i');?><?php } ?></li>
<?php if($space['extgroupids']) { ?><li><em class="xg1">扩展用户组&nbsp;&nbsp;</em><?php echo $space['extgroupids'];?></li><?php } ?>
</ul>
<ul id="pbbs" class="pf_l">
<?php if($space['oltime']) { ?><li><em>在线时间</em><?php echo $space['oltime'];?> 小时</li><?php } ?>
<li><em>注册时间</em><?php echo $space['regdate'];?></li>
<li><em>最后访问</em><?php echo $space['lastvisit'];?></li>
<?php if($_G['uid'] == $space['uid'] || $_G['group']['allowviewip']) { ?>
<li><em>注册 IP</em><?php echo $space['regip'];?> - <?php echo $space['regip_loc'];?></li>
<li><em>上次访问 IP</em><?php echo $space['lastip'];?> - <?php echo $space['lastip_loc'];?></li>
<?php } if($space['lastactivity']) { ?><li><em>上次活动时间</em><?php echo $space['lastactivity'];?></li><?php } if($space['lastpost']) { ?><li><em>上次发表时间</em><?php echo $space['lastpost'];?></li><?php } if($space['lastsendmail']) { ?><li><em>上次邮件通知</em><?php echo $space['lastsendmail'];?></li><?php } ?>
<li><em>所在时区</em><?php $timeoffset = array(
		'9999' => '使用系统默认',
		'-12' => '(GMT -12:00) 埃尼威托克岛, 夸贾林环礁',
		'-11' => '(GMT -11:00) 中途岛, 萨摩亚群岛',
		'-10' => '(GMT -10:00) 夏威夷',
		'-9' => '(GMT -09:00) 阿拉斯加',
		'-8' => '(GMT -08:00) 太平洋时间(美国和加拿大), 提华纳',
		'-7' => '(GMT -07:00) 山区时间(美国和加拿大), 亚利桑那',
		'-6' => '(GMT -06:00) 中部时间(美国和加拿大), 墨西哥城',
		'-5' => '(GMT -05:00) 东部时间(美国和加拿大), 波哥大, 利马, 基多',
		'-4' => '(GMT -04:00) 大西洋时间(加拿大), 加拉加斯, 拉巴斯',
		'-3.5' => '(GMT -03:30) 纽芬兰',
		'-3' => '(GMT -03:00) 巴西利亚, 布宜诺斯艾利斯, 乔治敦, 福克兰群岛',
		'-2' => '(GMT -02:00) 中大西洋, 阿森松群岛, 圣赫勒拿岛',
		'-1' => '(GMT -01:00) 亚速群岛, 佛得角群岛 [格林尼治标准时间] 都柏林, 伦敦, 里斯本, 卡萨布兰卡',
		'0' => '(GMT) 卡萨布兰卡，都柏林，爱丁堡，伦敦，里斯本，蒙罗维亚',
		'1' => '(GMT +01:00) 柏林, 布鲁塞尔, 哥本哈根, 马德里, 巴黎, 罗马',
		'2' => '(GMT +02:00) 赫尔辛基, 加里宁格勒, 南非, 华沙',
		'3' => '(GMT +03:00) 巴格达, 利雅得, 莫斯科, 奈洛比',
		'3.5' => '(GMT +03:30) 德黑兰',
		'4' => '(GMT +04:00) 阿布扎比, 巴库, 马斯喀特, 特比利斯',
		'4.5' => '(GMT +04:30) 坎布尔',
		'5' => '(GMT +05:00) 叶卡特琳堡, 伊斯兰堡, 卡拉奇, 塔什干',
		'5.5' => '(GMT +05:30) 孟买, 加尔各答, 马德拉斯, 新德里',
		'5.75' => '(GMT +05:45) 加德满都',
		'6' => '(GMT +06:00) 阿拉木图, 科伦坡, 达卡, 新西伯利亚',
		'6.5' => '(GMT +06:30) 仰光',
		'7' => '(GMT +07:00) 曼谷, 河内, 雅加达',
		'8' => '(GMT +08:00) 北京, 香港, 帕斯, 新加坡, 台北',
		'9' => '(GMT +09:00) 大阪, 札幌, 首尔, 东京, 雅库茨克',
		'9.5' => '(GMT +09:30) 阿德莱德, 达尔文',
		'10' => '(GMT +10:00) 堪培拉, 关岛, 墨尔本, 悉尼, 海参崴',
		'11' => '(GMT +11:00) 马加丹, 新喀里多尼亚, 所罗门群岛',
		'12' => '(GMT +12:00) 奥克兰, 惠灵顿, 斐济, 马绍尔群岛');?><?php echo $timeoffset[$space['timeoffset']];?>
</li>
</ul>
</div>
<div id="psts" class="<?php if($clist) { ?>pbm mbm bbda <?php } ?>cl">
<h2 class="mbn">统计信息</h2>
<ul class="pf_l">
<li><em>已用空间</em><?php echo $space['attachsize'];?></li>
<?php if($space['buyercredit']) { ?>
<li><em>卖家信用</em><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=trade&amp;view=eccredit#sellcredit" target="_blank"><?php echo $space['buyercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/buyer/<?php echo $space['buyerrank'];?>.gif" border="0" class="vm" /></a></li>
<?php } if($space['sellercredit']) { ?>
<li><em>买家信用</em><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=trade&amp;view=eccredit#buyercredit" target="_blank"><?php echo $space['sellercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/seller/<?php echo $space['sellerrank'];?>.gif" border="0" class="vm" /></a></li>
<?php } ?>
<li><em>积分</em><?php echo $space['credits'];?></li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<li><em><?php echo $value['title'];?></em><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></li>
<?php } } ?>
</ul>
</div>
<?php if($clist) { ?>
<div class="cl">
<h2 class="mbm">违规记录</h2>
<table id="pcr" class="dt">
<tr>
<th width="15%">操作行为</th>
<th width="15%">操作时间</th>
<th>操作理由</th>
<th width="15%">操作者</th>
</tr><?php if(is_array($clist)) foreach($clist as $crime) { ?><tr>
<td>
<?php if($crime['action'] == 'crime_delpost') { ?>
删除帖子
<?php } elseif($crime['action'] == 'crime_warnpost') { ?>
警告帖子
<?php } elseif($crime['action'] == 'crime_banpost') { ?>
屏蔽帖子
<?php } elseif($crime['action'] == 'crime_banspeak') { ?>
禁止发言
<?php } elseif($crime['action'] == 'crime_banvisit') { ?>
禁止访问
<?php } elseif($crime['action'] == 'crime_banstatus') { ?>
锁定用户
<?php } elseif($crime['action'] == 'crime_avatar') { ?>
清除头像
<?php } elseif($crime['action'] == 'crime_sightml') { ?>
清除签名
<?php } elseif($crime['action'] == 'crime_customstatus') { ?>
清除自定义头衔
<?php } ?>
</td>
<td><?php echo dgmdate($crime[dateline]);?></td>
<td><?php echo $crime['reason'];?></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $crime['operatorid'];?>" target="_blank"><?php echo $crime['operator'];?></a></td>
</tr>
<?php } ?>
</table>
</div>
<?php } if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_extrainfo'])) echo $_G['setting']['pluginhooks']['space_profile_extrainfo'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_extrainfo'])) echo $_G['setting']['pluginhooks']['follow_profile_extrainfo'];?>
<?php } ?>
</div></div>

<?php if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]-->
<div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>

<div class="span2">
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo avatar($space[uid],middle);?></a><?php $encodeusername = rawurlencode($space[username]);?><table>
<tr><td>
<ul class="nav nav-tabs nav-stacked alert-block">
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a></li>
<?php if($space['self']) { if($_G['setting']['homepagestyle']) { ?>
<li><a href="home.php?mod=space&amp;do=index&amp;diy=yes">装扮空间</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="home.php?mod=space&amp;do=wall">查看留言</a></li>
<?php } ?>
<li><a href="home.php?mod=spacecp&amp;ac=avatar">编辑头像</a></li>
<li><a href="home.php?mod=spacecp&amp;ac=profile">更新资料</a></li>
<?php } else { if(helper_access::check_module('follow')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>">查看广播</a></li>
<?php } if(helper_access::check_module('follow') && $space['uid'] != $_G['uid']) { ?>
<li><?php $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $space['uid'];?>">收听TA</a>
<?php } else { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>">取消收听</a>
<?php } ?>
</li>
<?php } ?><?php require_once libfile('function/friend');$isfriend=friend_check($space[uid]);?><?php if(!$isfriend) { ?>
<li><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=addfriendhk_<?php echo $space['uid'];?>" id="a_friend_li_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">加为好友</a></li>
<?php } else { ?>
<li><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=ignorefriendhk_<?php echo $space['uid'];?>" id="a_ignore_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">解除好友</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">给我留言</a></li>
<?php } ?>
<li><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=propokehk_<?php echo $space['uid'];?>" id="a_poke_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">打个招呼</a></li>

<li><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?php echo $space['uid'];?>&amp;touid=<?php echo $space['uid'];?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?php echo $space['uid'];?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">发送消息</a></li>
<?php } ?>
</ul>
</td>
</tr>
</table>

<?php if(checkperm('allowbanuser') || checkperm('allowedituser') || $_G['adminid'] == 1) { ?>
<ul class="nav nav-tabs nav-stacked">
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<li>
<?php if(checkperm('allowbanuser')) { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } else { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } ?>
</li>
<?php } if($_G['adminid'] == 1) { ?>
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;do=search&amp;searchsubmit=1&amp;users=<?php echo $encodeusername;?>" id="umanageli" onmouseover="showMenu(this.id)" class="showmenu">内容管理</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<ul id="usermanageli_menu" class="p_pop" style="width: 80px; display:none;">
<?php if(checkperm('allowbanuser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">禁止用户</a></li>
<?php } if(checkperm('allowedituser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">编辑用户</a></li>
<?php } ?>
</ul>
<?php } if($_G['adminid'] == 1) { ?>
<ul id="umanageli_menu" class="p_pop" style="width: 80px; display:none;">
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;searchsubmit=1&amp;do=search&amp;users=<?php echo $encodeusername;?>" target="_blank">管理帖子</a></li>
<?php if(helper_access::check_module('doing')) { ?>
<li><a href="admin.php?action=doing&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理记录</a></li>
<?php } if(helper_access::check_module('blog')) { ?>
<li><a href="admin.php?action=blog&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理日志</a></li>
<?php } if(helper_access::check_module('feed')) { ?>
<li><a href="admin.php?action=feed&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理动态</a></li>
<?php } if(helper_access::check_module('album')) { ?>
<li><a href="admin.php?action=album&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理相册</a></li>
<li><a href="admin.php?action=pic&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理图片</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="admin.php?action=comment&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;authorid=<?php echo $space['uid'];?>" target="_blank">管理评论</a></li>
<?php } if(helper_access::check_module('share')) { ?>
<li><a href="admin.php?action=share&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理分享</a></li>
<?php } if(helper_access::check_module('group')) { ?>
<li><a href="admin.php?action=threads&amp;operation=group&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组主题</a></li>
<li><a href="admin.php?action=prune&amp;searchsubmit=1&amp;detail=1&amp;operation=group&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组帖子</a></li>
<?php } ?>
</ul>
<?php } } ?>
</div>
<script type="text/javascript">
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod');
if(values['type'] == 'add') {
fObj.innerHTML = '取消收听';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听TA';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid'];
}
}
</script></div>

</div>
</div>
</div>
<?php if($_G['setting']['homepagestyle']) { ?>
</div>
<div class="">

<?php } ?>
</div>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="">
<!--[diy=diy3]--><div id="diy3" class=""></div><!--[/diy]-->
</div>
<?php } ?>
</div>


<hr />

<?php if(false) { ?>
<div id="footer" class="navbar-fixed-bottom mot-block-b navbar-transparent">
<div class="container">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  
    <ul class="inline">
      <li><a href="#">已经有了账号?</a></li>
      <li><a href="#">马上注册</a></li>
      <li><a href="#">用新浪微博登陆</a></li>
    </ul>

</div>
</div>
<?php } ?>

<div class="container" style="font-size:12px;">
        <strong>&copy;36Lean 精益云学院 2009-2013</strong> 
        <ul class="pull-right nav nav-pills">
          <li style="float:right;"><a href="read.php?title=contactus">联系我们</a></li>  
          <li style="float:right;"><a href="read.php?title=aboutus">关于我们</a></li>
          <li style="float:right;"><a href="read.php?title=product"><strong>产品版本</strong></a></li>
        </ul>
</div>


<script src="<?php echo $_G['siteurl'];?>static/bs/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if IE]>
<script src=”http://html5shiv.googlecode.com/svn/trunk/html5.js”></script>
<![endif--> 
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41700814-1', '36lean.com');
  ga('send', 'pageview');
</script>
</body>
</html>