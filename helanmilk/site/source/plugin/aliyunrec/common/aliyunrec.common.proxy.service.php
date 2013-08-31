<?php
/**
 * �ṩ�������Ƽ�������������ܡ�
 * �� aliyunrec.common.general.service.php, aliyunrec.common.config.service.php����ĳ��ڡ�
 * @createtime 2012-10-11
 */

! defined ( 'ALIYUNREC' ) && exit ( 'Forbidden' );
require_once ALIYUNREC . '/config/common.const.php';
require_once ALIYUNREC . '/common/aliyunrec.common.general.service.php';

class AliyunRec_Common_Proxy_Service {
	
	/**
	 * ��ȡ���͵�JSģ��
	 * @return string
	 */
	function getSendTemplate() {
		$sendTemplate = AliyunRec_Common_Config_Service::getConfig ( 'template.send' );
		return $sendTemplate ? $sendTemplate : '';
	}
	
	/**
	 * ��ȡ��Ӧ�õ�JS��ַ
	 * @return string
	 */
	function getApplicationUrls() {
		return AliyunRec_Common_General_Service::getApplicationUrls ();
	}
	
	/**
	 * ��ȡ�̶�λ��ID����
	 * @return array()
	 */
	function getFixedApplicationIds() {
		return AliyunRec_Common_Config_Service::getFixedApplicationIds ();
	}
	
	/**
	 * ��ȡ����ҳ�ı�ǩ
	 * @param string $title ����
	 * @param string $thumb ����ͼ
	 * @param string $url ���µ�ַ
	 * @param string $tags ���±�ǩ
	 * @return string
	 */
	function getRecommendOptions($title, $thumb = '', $url = '', $tags = '') {
		return AliyunRec_Common_General_Service::getRecommendOptions ( $title, $thumb, $url, $tags );
	}
	
	/**
	 * ��ȡ���԰�
	 * @return array
	 */
	function getLocalLanguage() {
		$language = AliyunRec_Common_Config_Service::getConfig ( 'common.language' );
		return is_array ( $language ) ? $language : array ();
	}
}