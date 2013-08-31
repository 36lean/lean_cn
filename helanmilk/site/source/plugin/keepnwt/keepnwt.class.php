<?php
/**
 *	[KeepNWT(keepnwt.{modulename})] (C)2012-2099 Powered by keepnwt.
 *	Version: 1.1
 *	Date: 2012-12-16 17:19
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_keepnwt {

	public function global_footer() {
		//TODO - Insert your code here
		global $_G;
		loadcache('plugin');
		$var = $_G['cache']['plugin']['keepnwt'];
		
		$upic=$_G['setting'][ucenterurl].'/avatar.php?uid='.$_G["uid"];
		$toencode=$_G['username'].$upic.$var["accesskey"];
		try{
			if($_G['charset']=='gbk'){
				$toencode=iconv('GBK', 'UTF-8', $toencode);
			}else if($_G['charset']=='big5'){
				$toencode=iconv('BIG5', 'UTF-8', $toencode);
			}
		}catch(exception $e){
			
		}
		
		$accesskey=md5($toencode);
		$context = $context. '<script type="text/javascript" src="http://s.keepnwt.com"></script><script type="text/javascript">keepnwt.login("'.$_G['username'].'", "'.$upic.'","'.$accesskey.'")</script>';
        
        return $context;
	}

	public function global_header() {
		//TODO - Insert your code here
		global $_G;
		loadcache('plugin');
		$confirmkey = $_G['cache']['plugin']['keepnwt']['confirmkey'];
		$context="<meta property='keepnwt:webmaster' content='".$confirmkey."' />";
		return $context;	//TODO modify your return code here
	}

}

class threadplugin_keepnwt {

	public $name = 'XX';
	public $iconfile = 'icon.gif';	
	public $buttontext = 'keepnwt';	


	public function newthread($fid) {
		//TODO - Insert your code here
		
		return 'TODO:newthread';
	}


	public function newthread_submit($fid) {
		//TODO - Insert your code here
		
	}


	public function newthread_submit_end($fid, $tid) {
		//TODO - Insert your code here
		
	}


	public function editpost($fid, $tid) {
		//TODO - Insert your code here
		
		return 'TODO:editpost';
	}


	public function editpost_submit($fid, $tid) {
		//TODO - Insert your code here
		
	}


	public function editpost_submit_end($fid, $tid) {
		//TODO - Insert your code here
		
	}


	public function newreply_submit_end($fid, $tid) {
		//TODO - Insert your code here
		
	}


	public function viewthread($tid) {
		//TODO - Insert your code here
		
		return 'TODO:viewthread';
	}
}

?>
