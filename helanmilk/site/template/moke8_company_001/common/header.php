<?php echo '魔客吧出品-www.moke8.com';exit;?>
<!--{subtemplate common/header_common}-->
	<meta name="application-name" content="$_G['setting']['bbname']" />
	<meta name="msapplication-tooltip" content="$_G['setting']['bbname']" />
	<!--{if $_G['setting']['portalstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][1]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G[siteurl].'portal.php'};icon-uri={$_G[siteurl]}{IMGDIR}/portal.ico" /><!--{/if}-->
	<meta name="msapplication-task" content="name=$_G['setting']['navs'][2]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G[siteurl].'forum.php'};icon-uri={$_G[siteurl]}{IMGDIR}/bbs.ico" />
	<!--{if $_G['setting']['groupstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][3]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G[siteurl].'group.php'};icon-uri={$_G[siteurl]}{IMGDIR}/group.ico" /><!--{/if}-->
	<!--{if helper_access::check_module('feed')}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][4]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G[siteurl].'home.php'};icon-uri={$_G[siteurl]}{IMGDIR}/home.ico" /><!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' && $_G['setting']['archiver']}-->
		<link rel="archives" title="$_G['setting']['bbname']" href="{$_G[siteurl]}archiver/" />
	<!--{/if}-->
	<!--{if !empty($rsshead)}-->$rsshead<!--{/if}-->
	<!--{if widthauto()}-->
		<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_{STYLEID}_widthauto.css?{VERHASH}" />
		<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
	<!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' || $_G['basescript'] == 'group'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'home' || $_G['basescript'] == 'userapp'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'portal'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
   
     <!--[if lt IE 9]>
      <link rel="stylesheet" href="template/moke8_company_001/moke8/css/IE.css" />
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <!--[if lte IE 8]>
      <script type="text/javascript" src="template/moke8_company_001/moke8/js/IE.js"></script>
      <![endif]-->
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
	<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_{STYLEID}_css_diy.css?{VERHASH}" />
	<!--{/if}-->
    <link rel="stylesheet" type="text/css" href="template/moke8_company_001/moke8/css/_style.css" />
    <link rel="stylesheet" type="text/css" href="template/moke8_company_001/moke8/css/_mobile.css" />
    <link rel="stylesheet" type="text/css" href="template/moke8_company_001/moke8/css/primary-blue.css" />
    <!--{csstemplate}-->
</head>

<body id="nv_{$_G[basescript]}" class="pg_{CURMODULE}{if $_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)} {$cat['bodycss']}{/if}" onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent"></div><div id="ajaxwaitid"></div>
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<!--{template common/header_diy}-->
    <!--{else}-->
         <script type="text/javascript" src="template/moke8_company_001/moke8/js/jquery-1.7.2.min.js"></script>
	<!--{/if}-->
    <script type="text/javascript">
  jq = jQuery.noConflict();
//以后jquery中的$都用jq代替即可。
jq(function(){});
</script>
	<!--{if check_diy_perm($topic)}-->
		<!--{block diynav}-->
			
			<div id="diy-tg_menu" style="display: none;">
				<ul>
					<li><a href="javascript:saveUserdata('diy_advance_mode', '');openDiy();" class="xi2">{lang header_diy_mode_simple}</a></li>
					<li><a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" class="xi2">{lang header_diy_mode_adv}</a></li>
				</ul>
			</div>
		<!--{/block}-->
	<!--{/if}-->
	<!--{if CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)}-->
		$diynav
	<!--{/if}-->
	<!--{if empty($topic) || $topic['useheader']}-->
		<!--{if $_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')}-->
			<div class="xi1 bm bm_c">
			    {lang your_mobile_browser}<a href="{$_G['siteurl']}forum.php?mobile=yes">{lang go_to_mobile}</a> <span class="xg1">|</span> <a href="$_G['setting']['mobile']['nomobileurl']">{lang to_be_continue}</a>
			</div>
		<!--{/if}-->

		 <!-- START Top-Toolbar -->
      <aside class="top-aside clearfix">
      <!--{hook/global_cpnav_top}-->
         <div class="center-wrap">
            <div class="one_half">
               <div class="sidebar-widget">
                  <ul class="custom-menu">
                     <!--{loop $_G['setting']['topnavs'][0] $nav}-->
						<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li>$nav[code]</li><!--{/if}-->
					<!--{/loop}-->
					<!--{hook/global_cpnav_extra1}-->
                  </ul>
               </div>
            </div>
            <!-- END top-toolbar-left -->
            <div class="one_half">
               <div class="sidebar-widget">
                  <ul class="social_icons">
                  <!--{hook/global_cpnav_extra2}-->
                  <!--{if $_G['uid']}-->
					
						
							<li><strong class="vwmy{if $_G['setting']['connect']['allow'] && $_G[member][conisbind]} qq{/if}"><a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}">{$_G[member][username]}</a></strong></li>
							
							<!--{hook/global_usernav_extra1}-->
							<li><!--{hook/global_usernav_extra4}--><a href="home.php?mod=spacecp">{lang setup}</a></li>
							<li><a href="home.php?mod=space&do=pm" id="pm_ntc"{if $_G[member][newpm]} class="new"{/if}>{lang pm_center}</a></li>
							<li><a href="home.php?mod=space&do=notice" id="myprompt"{if $_G[member][newprompt]} class="new"{/if}>{lang remind}<!--{if $_G[member][newprompt]}-->($_G[member][newprompt])<!--{/if}--></a><span id="myprompt_check"></span>
							<!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}--><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a><!--{/if}--></li>
							<!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
								<li><a href="portal.php?mod=portalcp"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a></li>
							<!--{/if}-->
							<!--{if $_G['uid'] && $_G['group']['radminid'] > 1}-->
								<li><a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a></li>
							<!--{/if}-->
							<!--{if $_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']}-->
								<li><a href="admin.php?frames=yes&action=cloud&operation=applist" target="_blank">{lang cloudcp}</a></li>
							<!--{/if}-->
							<!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
								<li><a href="admin.php" target="_blank">{lang admincp}</a></li>
							<!--{/if}-->
							<!--{hook/global_usernav_extra2}-->
							<li><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></li>
						<li><a href="javascript:openDiy();" title="{lang open_diy}" onMouseOver="showMenu(this.id)">DIY</a></li>
							<!--{hook/global_usernav_extra3}-->
							<!--{eval $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;}-->
							
						
					
					<!--{elseif !empty($_G['cookie']['loginuser'])}-->
					
						<li><strong><a id="loginuser" class="noborder"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a></strong></li>
						<li><a href="member.php?mod=logging&action=login" onClick="showWindow('login', this.href)">{lang activation}</a></li>
						<li><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></li>
					
					<!--{elseif !$_G[connectguest]}-->
                        <li><a rel="nofollow" href="member.php?mod=logging&action=login">{lang login}</a></li>
						<li><a href="member.php?mod={$_G[setting][regname]}">$_G['setting']['reglinkname']</a></li>
					<!--{else}-->
					
						
						
							<li><strong class="vwmy qq">{$_G[member][username]}</strong></li>
							<!--{hook/global_usernav_extra1}-->
							<li><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
						
							<li><a href="home.php?mod=spacecp&ac=credit&showcredit=1">{lang credits}: 0</a>
							<li>{lang usergroup}: $_G[group][grouptitle]
						</p>
					</div>
					<!--{/if}-->
					<!--{loop $_G['setting']['topnavs'][1] $nav}-->
						<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li>$nav[code]</li><!--{/if}-->
					<!--{/loop}-->
					
					<!--{if !empty($_G['style']['extstyle'])}--><li><a id="sslct" href="javascript:;" onMouseOver="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">{lang changestyle}</a></li><!--{/if}-->
					<!--{if check_diy_perm($topic)}-->
						$diynav
					<!--{/if}-->
                    
                  </ul>
               </div>
            </div>
            <!-- END top-toolbar-right -->
         </div>
         <!-- END center-wrap -->
         <div class="top-aside-shadow"></div>
   </aside>
      <!-- END Top-Toolbar -->

		<!--{if !IS_ROBOT}-->
			<!--{if !empty($_G['style']['extstyle'])}-->
				<div id="sslct_menu" class="cl p_pop" style="display: none;">
					<!--{if !$_G[style][defaultextstyle]}--><span class="sslct_btn" onClick="extstyle('')" title="{lang default}"><i></i></span><!--{/if}-->
					<!--{loop $_G['style']['extstyle'] $extstyle}-->
						<span class="sslct_btn" onClick="extstyle('$extstyle[0]')" title="$extstyle[1]"><i style='background:$extstyle[2]'></i></span>
					<!--{/loop}-->
				</div>
			<!--{/if}-->

				<div id="qmenu_menu" class="p_pop {if !$_G['uid']}blk{/if}" style="display: none;">
					<!--{if $_G['uid']}-->
					<ul>
						<!--{loop $_G['setting']['mynavs'] $nav}-->
							<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->
								<li>$nav[code]</li>
							<!--{/if}-->
						<!--{/loop}-->
					</ul>
					<!--{elseif $_G[connectguest]}-->
						<div class="ptm pbw hm">
							{lang connect_fill_profile_to_visit}
						</div>
					<!--{else}-->
						<div class="ptm pbw hm">
							{lang my_nav_login}
						</div>
					<!--{/if}-->
				</div>
		<!--{/if}-->

		<!--{ad/headerbanner/wp a_h}-->
		 <!-- START Header -->
         <!--{if !IS_ROBOT}-->
			<!--{if $_G['uid'] && !empty($_G['style']['extstyle'])}-->
				<div id="sslct_menu" class="cl p_pop" style="display: none;">
					<!--{if !$_G[style][defaultextstyle]}--><span class="sslct_btn" onClick="extstyle('')" title="{lang default}"><i></i></span><!--{/if}-->
					<!--{loop $_G['style']['extstyle'] $extstyle}-->
						<span class="sslct_btn" onClick="extstyle('$extstyle[0]')" title="$extstyle[1]"><i style='background:$extstyle[2]'></i></span>
					<!--{/loop}-->
				</div>
			<!--{/if}-->

				<div id="qmenu_menu" class="p_pop {if !$_G['uid']}blk{/if}" style="display: none;">
					<!--{if $_G['uid']}-->
					<ul>
						<!--{loop $_G['setting']['mynavs'] $nav}-->
							<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->
								<li>$nav[code]</li>
							<!--{/if}-->
						<!--{/loop}-->
					</ul>
					<!--{elseif $_G[connectguest]}-->
						<div class="ptm pbw hm">
							{lang connect_fill_profile_to_visit}
						</div>
					<!--{else}-->
						<div class="ptm pbw hm">
							{lang my_nav_login}
						</div>
					<!--{/if}-->
				</div>
		<!--{/if}-->

		<!--{ad/headerbanner/wp a_h}-->
      <header>
      
         <div class="center-wrap">
         <!--{eval $mnid = getcurrentnav();}-->
            <div class="companyIdentity">
              <!--{if !isset($_G['setting']['navlogos'][$mnid])}--><a href="./" title="$_G['setting']['bbname']">{$_G['style']['boardlogo']}</a><!--{else}-->$_G['setting']['navlogos'][$mnid]<!--{/if}-->            </div>
            <!-- END companyIdentity -->
            
            
            
            
            <!-- START Main Navigation -->
            <nav>
               <ul>
               <!--{loop $_G['setting']['navs'] $nav}-->
							<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li {if $mnid == $nav[navid]}class="current-menu-item" {/if}$nav[nav]></li>
                 
                            <!--{/if}-->
                            
                           
						<!--{/loop}-->
                
                
               </ul>
            </nav>
            <!-- END Main Navigation -->
            
         </div>
         <!-- END center-wrap -->
   </header>
      <!-- END Header -->
      
		<!--{hook/global_header}-->
	<!--{/if}-->

<div class="wp" id="wp">