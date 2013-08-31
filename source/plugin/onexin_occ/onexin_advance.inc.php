<?php
/**
 * Onexin advance For Discuz!X 2.0+
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @package    onexin_advance
 * @module	   advance 
 * @date	   2012-12-05
 * @author	   King
 * @copyright  Copyright (c) 2012 Onexin Platform Inc. (http://www.onexin.com)
 */

/*
//--------------Tall us what you think!----------------------------------
*/

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$identifier = $plugin['identifier'];

if(!submitcheck('editsubmit')) {
	$operation = '';
	//shownav('plugin', $plugin['name']);
	//showsubmenuanchors($plugin['name'].' '.$plugin['version'].(!$plugin['available'] ? ' ('.$lang['plugins_unavailable'].')' : ''), $submenuitem);
	
	loadcache('pluginlanguage_script');
	$_cplang = $_G['cache']['pluginlanguage_script'][$identifier];
		
	loadcache($identifier);
	$_cpconf = (array)unserialize(stripslashes($_G['cache'][$identifier]));
	
	$conf = array(
		'isportal' => array('title'=>$_cplang['title_isportal'], 'description'=>'', 'variable'=>'isportal', 'type'=>'radio', 'value'=>$_cpconf['isportal'], 'extra'=>''),
		'usecatids' => array('title'=>$_cplang['title_usecatids'], 'description'=>$_cplang['description_usecatids'], 'variable'=>'usecatids', 'type'=>'portals', 'value'=>$_cpconf['usecatids'], 'extra'=>''),
		'nextpage_portal' => array('title'=>$_cplang['title_nextpage_portal'], 'description'=>$_cplang['description_nextpage_portal'], 'variable'=>'nextpage_portal', 'type'=>'number', 'value'=>$_cpconf['nextpage_portal'], 'extra'=>''),
	);

	if($conf) {
		showformheader("plugins&operation=config&do=$pluginid&identifier=$identifier&pmod=onexin_advance");
		showtableheader();
		showtitle($lang['plugins_config']);

		$extra = array();
		foreach($conf as $var) {
			if(strexists($var['type'], '_')) {
				continue;
			}
			$var['variable'] = 'varsnew['.$var['variable'].']';
			if($var['type'] == 'number') {
				$var['type'] = 'text';
			} elseif($var['type'] == 'portals') {
				$var['description'] = ($var['description'] ? (isset($lang[$var['description']]) ? $lang[$var['description']] : $var['description'])."\n" : '').$lang['plugins_edit_vars_multiselect_comment']."\n".$var['comment'];
				$var['value'] = is_array($var['value']) ? $var['value'] : array();
				$var['type'] = _category_selectMultiple('portal', 'varsnew[usecatids][]', true);					
				foreach($var['value'] as $v) {
					$var['type'] = str_replace('<option value="'.$v.'">', '<option value="'.$v.'" selected>', $var['type']);
				}
				$var['variable'] = $var['value'] = '';
			}
			showsetting(isset($lang[$var['title']]) ? $lang[$var['title']] : dhtmlspecialchars($var['title']), $var['variable'], $var['value'], $var['type'], '', 0, isset($lang[$var['description']]) ? $lang[$var['description']] : nl2br(dhtmlspecialchars($var['description'])), dhtmlspecialchars($var['extra']), '', true);
		}
		showsubmit('editsubmit');
		showtablefooter();
		showformfooter();
		echo implode('', $extra);
	}

} else {
		
	save_syscache($identifier, addslashes(serialize($_GET['varsnew'])));

	cpmsg('plugins_setting_succeed', 'action=plugins&operation=config&do='.$pluginid.'&identifier='.$identifier.'&pmod=onexin_advance', 'succeed');

}


function _category_selectMultiple($type, $name='catid', $shownull=true, $current='') {
	global $_G;
	if(! in_array($type, array('portal', 'blog', 'album'))) {
		return '';
	}
	loadcache($type.'category');
	$category = $_G['cache'][$type.'category'];

	$select = "<select multiple=\"multiple\" id=\"$name\" name=\"$name\" size=\"10\">";
	if($shownull) {
		$select .= '<option value="">'.lang('admincp', 'plugins_empty').'</option>';
	}
	foreach ($category as $value) {
		if($value['level'] == 0) {
			$selected = ($current && $current==$value['catid']) ? 'selected="selected"' : '';
			$select .= "<option value=\"$value[catid]\"$selected>$value[catname]</option>";
			if(!$value['children']) {
				continue;
			}
			foreach ($value['children'] as $catid) {
				$selected = ($current && $current==$catid) ? 'selected="selected"' : '';
				$select .= "<option value=\"{$category[$catid][catid]}\"$selected>-- {$category[$catid][catname]}</option>";
				if($category[$catid]['children']) {
					foreach ($category[$catid]['children'] as $catid2) {
						$selected = ($current && $current==$catid2) ? 'selected="selected"' : '';
						$select .= "<option value=\"{$category[$catid2][catid]}\"$selected>---- {$category[$catid2][catname]}</option>";
					}
				}
			}
		}
	}
	$select .= "</select>";
	return $select;
}
