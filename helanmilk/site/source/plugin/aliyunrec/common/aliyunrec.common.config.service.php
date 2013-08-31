<?php
/**
 * ��ȡ������Ϣ
 * @createtime 2012-09-27
 */

! defined ( 'ALIYUNREC' ) && exit ( 'Forbidden' );

class AliyunRec_Common_Config_Service {
	
	/**
	 * ��ȡJS��ַģ��
	 * @return string
	 */
	function getUrlTemplate() {
		return ALIYUNREC_DOMAIN;
	}
	
	/**
	 * ��ȡ�̶�λ��ID����
	 * @return array()
	 */
	function getFixedApplicationIds() {
		$applications = AliyunRec_Common_Config_Service::getConfig ( 'common.application' );
		$fixedRecommendIds = isset ( $applications ['fixed'] ) ? $applications ['fixed'] : '';
		$tmp = explode ( ',', $fixedRecommendIds );
		$fixedId = (is_array ( $tmp ) && count ( $tmp ) > 0) ? intval ( $tmp [0] ) : 0;
		return 'aliyun_cnzz_tui_' . $fixedId;
	}
	
	/**
	 * ��ȡconfigĿ¼�������ļ�����
	 * @param string $configName �ļ����� ��template.send
	 * @return mixed
	 */
	function getConfig($configName) {
		$configName = strtolower ( $configName );
		if (str_replace ( array ('://', "\0", '..' ), '', $configName ) != $configName)
			return false;
		$filePath = ALIYUNREC . '/config/' . $configName . '.php';
		if (! file_exists ( $filePath ))
			return false;
		return include $filePath;
	}
}