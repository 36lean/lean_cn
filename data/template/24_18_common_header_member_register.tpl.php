<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/tpl/common/header.htm', './template/tpl/common/header_common.htm', 1381981101, '18', './data/template/24_18_common_header_member_register.tpl.php', './template/tpl', 'common/header_member_register')
;?>
﻿<!DOCTYPE html>
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

   	<link href="<?php echo $_G['siteurl'];?>static/mot/professional.css" rel="stylesheet" />
   	
    <link type="text/css" href="<?php echo $_G['siteurl'];?>static/bs_jq_ui/css/custom-theme/jquery-ui-1.10.2.custom.css" rel="stylesheet" />
<!--<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>-->
<script src="<?php echo $_G['siteurl'];?>static/bs_jq_ui/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">jQuery(function(){jQuery.noConflict()})</script>
<script src="<?php echo $_G['siteurl'];?>static/bs_jq_ui/js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
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

  	<link href="<?php echo $_G['siteurl'];?>static/bs/css/bootstrap.min.css" rel="stylesheet" />
  	<link href="<?php echo $_G['siteurl'];?>static/bs/css/bootstrap-responsive.min.css" rel="stylesheet" />
  	<link href="<?php echo $_G['siteurl'];?>static/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
   	<link href="<?php echo $_G['siteurl'];?>static/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
<![endif]--> 
</head>


<body>


<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container">


          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

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

<div class="container main-body">

<div class="row-fluid">

<div class="span3" align="center" style="margin-bottom:60px">
<a href="<?php echo $_G['siteurl'];?>"><img src="<?php echo $_G['siteurl'];?>/static/mot/logo.png" data-original="<?php echo $_G['siteurl'];?>/static/mot/logo.png" /></a>

</div>

<div class="span9">
        <ul class="nav nav-pills pull-right">

          	<li <?php if(CURSCRIPT === 'portal' && CURMODULE !== 'aboutus') { ?>class="active"<?php } ?>><a href="portal.php"><i class="icon-home"></i> 首页</a></li>
          	

 			<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="lesson.php">
<i class="icon-cloud"></i> 云学院 
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="lesson.php"> 云学院课程 </a></li>
<li><a href="read.php?title=product">产品版本</a></li>
</ul>
    		</li>
          	
          	<li><a href="<?php echo $_G['site_url'];?>news"><i class="icon-globe"></i> 精企新闻 </a></li>
          	
          	<li <?php if($_GET['title'] === 'aboutus') { ?>class="active"<?php } ?>><a href="read.php?title=aboutus"><i class="icon-group"></i> 关于我们 </a></li>
          	<li <?php if($_GET['title'] === 'contactus') { ?>class="active"<?php } ?>><a href="read.php?title=contactus"><i class="icon-phone"></i> 联系我们 </a></li>
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

