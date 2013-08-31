<?php
/**
 * ���Ƽ�������
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
	 * ��װ��ǩ��
	 * @access private
	 * @param array $tags ��ǩ
	 * @return string ��װ��ı�ǩ�ַ���
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
	 * ��ȡ���ӵ�ַ
	 * @access private
	 * @param int $tid ����ID
	 * @return string ���ӵ�ַ
	 */
	function _getThreadUrl($tid) {
		global $_G;
		if ($_G ['setting'] ['rewritestatus'] && in_array ( 'forum_viewthread', $_G ['setting'] ['rewritestatus'] ))
			return rewriteoutput ( 'forum_viewthread', 1, $_G ['siteurl'], $tid );
		return $_G ['siteurl'] . 'forum.php?mod=viewthread&tid=' . $tid;
	}
	
	/**
	 * ��ȡ����ͼƬ
	 * @access private
	 * @param array $threadInfo ������Ϣ
	 * @return string ͼƬ��ַ
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
	 * ��ȡԶ��ͼƬ��ַ
	 * @access private
	 * @param string $content ��������
	 * @return string ͼƬ��ַ
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
	 * ��ȡ����ͼƬ��ַ
	 * @access private
	 * @param array $attachments ���Ӹ���
	 * @return string ͼƬ��ַ
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
	 * ��װͼƬ��ַ
	 * @access private
	 * @param string $url ͼƬ��ַ
	 * @return string ͼƬ��ַ
	 */
	function _buildImageThumbUrl($url) {
		if (! in_array ( strtolower ( substr ( $url, 0, 6 ) ), array ('http:/', 'https:', 'ftp://', 'rtsp:/', 'mms://' ) ) && ! preg_match ( '/^static\//', $url ) && ! preg_match ( '/^data\//', $url ))
			return 'http://' . $url;
		return $url;
	}
	
	/**
	 * ��ȡ���״̬��1��ʾ������0��ʾ�ر�
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