<?php
/**
 * 云推荐插件入口
 * @createtime 2012-12-15
 */
if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}

define ( 'ALIYUNREC', dirname ( __FILE__ ) );
require_once ALIYUNREC . '/common/aliyunrec.common.proxy.service.php';

class plugin_aliyunrec {
	
	function global_header() {
		global $postlist;
		if (CURMODULE != 'viewthread' || ! $this->_getAliyunRecState () || ! isset ( $postlist ))
			return;
		reset ( $postlist );
		$threadInfo = current ( $postlist );
		list ( $tags, $url, $thumb ) = array ($this->_buildTags ( $threadInfo ['tags'] ), $this->_getThreadUrl ( $threadInfo ['tid'] ), $this->_getThumb ( $threadInfo ) );
		return AliyunRec_Common_Proxy_Service::getRecommendOptions ( $threadInfo ['subject'], $thumb, $url, $tags );
	}
	
	function global_footer() {
		if (CURMODULE != 'viewthread' || ! $this->_getAliyunRecState ())
			return;
		return AliyunRec_Common_Proxy_Service::getSendTemplate () . AliyunRec_Common_Proxy_Service::getApplicationUrls ();
	}
	
	/**
	 * 组装标签串
	 * @access private
	 * @param array $tags 标签
	 * @return string 组装后的标签字符串
	 */
	function _buildTags($tags) {
		if (! is_array ( $tags ) || count ( $tags ) < 1)
			return '';
		foreach ( $tags as $value ) {
			list ( , $tag ) = $value;
			$tagString .= ($tagString ? ',' : '') . $tag;
		}
		return $tagString;
	}
	
	/**
	 * 获取帖子地址
	 * @access private
	 * @param int $tid 帖子ID
	 * @return string 帖子地址
	 */
	function _getThreadUrl($tid) {
		global $_G;
		if ($_G ['setting'] ['rewritestatus'] && in_array ( 'forum_viewthread', $_G ['setting'] ['rewritestatus'] ))
			return rewriteoutput ( 'forum_viewthread', 1, $_G ['siteurl'], $tid );
		return $_G ['siteurl'] . 'forum.php?mod=viewthread&tid=' . $tid;
	}
	
	/**
	 * 获取帖子图片
	 * @access private
	 * @param array $threadInfo 帖子信息
	 * @return string 图片地址
	 */
	function _getThumb($threadInfo) {
		global $postarr;
		reset ( $postarr );
		$content = current ( $postarr );
		$content = $content ['message'];
		if (strpos ( $content, '[/img]' ) !== false)
			return $this->_getImgThumb ( $content );
		return (is_array ( $threadInfo ['attachments'] ) && count ( $threadInfo ['attachments'] ) > 0) ? $this->_getAttachThumb ( $threadInfo ['attachments'] ) : '';
	}
	
	/**
	 * 获取远程图片地址
	 * @access private
	 * @param string $content 帖子内容
	 * @return string 图片地址
	 */
	function _getImgThumb($content) {
		$url = '';
		preg_match ( "/\[img\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies", $content, $match );
		(is_array ( $match ) && count ( $match ) > 0) && $url = $match [1];
		if ($url)
			return $this->_buildImageThumbUrl ( $url );
		preg_match ( "/\[img=(\d{1,4})[x|\,](\d{1,4})\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies", $content, $match );
		(is_array ( $match ) && count ( $match ) > 0) && $url = $match [3];
		return $url ? $this->_buildImageThumbUrl ( $url ) : '';
	}
	
	/**
	 * 获取附件图片地址
	 * @access private
	 * @param array $attachments 帖子附件
	 * @return string 图片地址
	 */
	function _getAttachThumb($attachments) {
		global $_G;
		$image = array ();
		foreach ( $attachments as $attachment ) {
			if (! $attachment ['isimage'])
				continue;
			$image = $attachment;
			break;
		}
		return (count ( $image ) > 0) ? ($_G ['siteurl'] . $image ['url'] . $image ['attachment']) : '';
	}
	
	/**
	 * 组装图片地址
	 * @access private
	 * @param string $url 图片地址
	 * @return string 图片地址
	 */
	function _buildImageThumbUrl($url) {
		if (! in_array ( strtolower ( substr ( $url, 0, 6 ) ), array ('http:/', 'https:', 'ftp://', 'rtsp:/', 'mms://' ) ) && ! preg_match ( '/^static\//', $url ) && ! preg_match ( '/^data\//', $url ))
			return 'http://' . $url;
		return $url;
	}
	
	/**
	 * 获取插件状态，1表示开启，0表示关闭
	 * @access private
	 * @return int
	 */
	function _getAliyunRecState() {
		global $_G;
		return intval ( $_G ['cache'] ['plugin'] ['aliyunrec'] ['cfg_aliyunrec_state'] );
	}
}

class plugin_aliyunrec_forum extends plugin_aliyunrec {
	
	function viewthread_postbottom_output() {
		if (CURMODULE != 'viewthread' || ! $this->_getAliyunRecState ())
			return array ();
		$aliyunRecommendDcId = AliyunRec_Common_Proxy_Service::getFixedApplicationIds ();
		return array ("<div id=\"$aliyunRecommendDcId\"></div>" );
	}
}