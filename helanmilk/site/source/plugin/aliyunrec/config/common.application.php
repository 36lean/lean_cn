<?php
/**
 * Ӧ��������id�����ļ�
 * ��ʽ��
 * $aliyunRecApplications['����'] = 'id';
 * ���Ϳ���Ϊfixed��float������fixed����̶�λ��float�����������������ʽid֮����,(Ӣ�Ķ���)�������̶�λֻ������һ��id��
 * 
 * ���磺
 * $aliyunRecApplications ['fixed'] = '9999';
 * $aliyunRecApplications ['float'] = '8888,7777';
 * ��ʾ����˼����һ��idΪ9999�Ĺ̶�λ��ʽ������id�ֱ�Ϊ8888,7777�ĸ�����ʽ��
 * 
 * ���û��ĳһ���͵���ʽ����ֵ��''����
 * ���磺
 * $aliyunRecApplications ['fixed'] = '9999';
 * $aliyunRecApplications ['float'] = '';
 * ��ʾ����˼����һ��idΪ9999�Ĺ̶�λ��ʽ��û�и�����ʽ��
 * 
 * $aliyunRecApplications ['fixed'] = '';
 * $aliyunRecApplications ['float'] = '8888';
 * ��ʾ����˼��û�й̶�λ��ʽ����һ��idΪ8888�ĸ�����ʽ��
 * 
 * $aliyunRecApplications ['fixed'] = '';
 * $aliyunRecApplications ['float'] = '8888,7777';
 * ��ʾ����˼��û�й̶�λ��ʽ��������id�ֱ�Ϊ8888,7777�ĸ�����ʽ��
 * 
 * @createtime 2012-09-26
 */

! defined ( 'ALIYUNREC' ) && exit ( 'Forbidden' );

$aliyunRecApplications = array ();
$aliyunRecApplications ['fixed'] = '0'; //�̶�λ�Ƽ�
$aliyunRecApplications ['float'] = ''; //�����Ƽ�

return $aliyunRecApplications;