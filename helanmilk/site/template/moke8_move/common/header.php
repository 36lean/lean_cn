<?php echo 'www.moke8.com';exit;?>
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
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
	<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_{STYLEID}_css_diy.css?{VERHASH}" />
	<!--{/if}-->
</head>

<body id="nv_{$_G[basescript]}" class="pg_{CURMODULE}{if $_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)} {$cat['bodycss']}{/if}" onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent"></div><div id="ajaxwaitid"></div>
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<!--{template common/header_diy}-->
	<!--{/if}-->
	<!--{if check_diy_perm($topic)}-->
		<!--{block diynav}-->
			<a id="diy-tg" href="javascript:openDiy();" title="{lang open_diy}" class="xi1 xw1" onMouseOver="showMenu(this.id)"><img src="{STATICURL}image/diy/panel-toggle.png" alt="DIY" /></a>
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
		<!--{eval $mnid = getcurrentnav();}-->
        <div class="clearfix margin-10 header cl" id="header-full">
		
			<div class="clearfix" id="header-wrap-bg">
		        <div class="left" id="logo">
                   <!--{if !isset($_G['setting']['navlogos'][$mnid])}--><a href="{if $_G['setting']['domain']['app']['default']}http://{$_G['setting']['domain']['app']['default']}/{else}./{/if}" title="$_G['setting']['bbname']">{$_G['style']['boardlogo']}</a><!--{else}-->$_G['setting']['navlogos'][$mnid]<!--{/if}-->
                </div>  <!-- End Logo -->	

				<div class="menu-menu-container" id="navigation">
                <ul class="clearfix no-mobile" id="menu" style="display: block;">
                 <!--{loop $_G['setting']['navs'] $nav}-->
							<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li class="menu-item menu-item-type-post_type menu-item-object-page {if $mnid == $nav[navid]}current-menu-item page_item current_page_item{/if}" $nav[nav]></li><!--{/if}-->
						<!--{/loop}-->
              

</ul></div> <!-- End Navigation -->
				<div class="clear"></div>
			</div>
       
</div>
		<!--{hook/global_header}-->
	<!--{/if}-->

	<div id="wp" class="wp">
   <!--{ad/subnavbanner/a_mu}-->
				<!--{subtemplate common/pubsearchform}-->
    <div class="categorys_list clearfix cl y"><div class="background_animate filters_controller left">
<span class="normal_bg"></span><span class="alt_bg opacity_none"></span></div>
<div class="left filters_lists">

 <!--{if $_G['uid']}-->
					
						
							<strong class="vwmy{if $_G['setting']['connect']['allow'] && $_G[member][conisbind]} qq{/if}"><a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}">{$_G[member][username]}</a></strong>
							
							<!--{hook/global_usernav_extra1}-->
							<!--{hook/global_usernav_extra4}--><a href="home.php?mod=spacecp">{lang setup}</a>
							<a href="home.php?mod=space&do=pm" id="pm_ntc"{if $_G[member][newpm]} class="new"{/if}>{lang pm_center}</a>
							<a href="home.php?mod=space&do=notice" id="myprompt"{if $_G[member][newprompt]} class="new"{/if}>{lang remind}<!--{if $_G[member][newprompt]}-->($_G[member][newprompt])<!--{/if}--></a>
							<!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}--><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a><!--{/if}-->
							<!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
								<a href="portal.php?mod=portalcp"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a>
							<!--{/if}-->
							<!--{if $_G['uid'] && $_G['group']['radminid'] > 1}-->
								<a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a>
							<!--{/if}-->
							<!--{if $_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']}-->
								<a href="admin.php?frames=yes&action=cloud&operation=applist" target="_blank">{lang cloudcp}</a>
							<!--{/if}-->
							<!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
								<a href="admin.php" target="_blank">{lang admincp}</a>
							<!--{/if}-->
							<!--{hook/global_usernav_extra2}-->
							<a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
						    <a href="javascript:openDiy();" title="{lang open_diy}" onMouseOver="showMenu(this.id)">DIY</a>
							<!--{hook/global_usernav_extra3}-->
							<!--{eval $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;}-->
							
						
					
					<!--{elseif !empty($_G['cookie']['loginuser'])}-->
					
						<strong><a id="loginuser" class="noborder"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a></strong>
						<a href="member.php?mod=logging&action=login" onClick="showWindow('login', this.href)">{lang activation}</a>
						<a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
					
					<!--{elseif !$_G[connectguest]}-->
                       
                        <a rel="nofollow" href="member.php?mod=logging&action=login">{lang login}</a>
						<a href="member.php?mod={$_G[setting][regname]}">$_G['setting']['reglinkname']</a>
                       
                        
					<!--{else}-->
					
						
						
							<strong class="vwmy qq">{$_G[member][username]}</strong>
							<!--{hook/global_usernav_extra1}-->
							<a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
						
							<a href="home.php?mod=spacecp&ac=credit&showcredit=1">{lang credits}: 0</a>
							{lang usergroup}: $_G[group][grouptitle]
						
					<!--{/if}-->
                    <!--{if empty($_G['disabledwidthauto']) && $_G['setting']['switchwidthauto']}-->
						<a href="javascript:;" onClick="widthauto(this)"><!--{if widthauto()}-->{lang switch_narrow}<!--{else}-->{lang switch_wide}<!--{/if}--></a>
					<!--{/if}-->
					<!--{if $_G['uid'] && !empty($_G['style']['extstyle'])}--><a id="sslct" href="javascript:;" onMouseOver="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">{lang changestyle}</a><!--{/if}-->
</div></div>
