<?php
global $constant;
global $modules;

//$ci->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

$constant = array(
	'discuz_url' => 'http://www.36lean.com/',
	'uploads_path' => '.././uploads',
	'index' => '默认页',
	'welcome' => '欢迎',
	'client' => '客户',
	'course' => '课程',
	'marketing' => '营销',
	'review' => '审核',
	'statistic' => '统计',
	'website' => '网站',
	'bugtrack' => 'Bug',
	'permission' => '权限',
	'error' => '错误',

	/*course - category*/
	'add_category' => '添加分类',
	'edit_category' => '编辑分类',
	'edit_page' => '编辑章节',
	'edit_course' => 	'编辑课程',
	'del_course' => '删除课程',
	'add_course' => '添加课程',
	'list_mode' => '列表视图',
	'server_config' => '服务器/播放器设置',



	/*client - excel*/
	'manage_excel' => '管理excel导入数据',
	'export'       => '导出',
	'corporation' => '企业',
	'add_corporation' => '添加企业资料',
	'edit_corporation' => '编辑企业资料',
	'view_all_corporation' => '企业列表',
	'find_corporation' => '查询企业资料',
	'corp_information' => '企业详细资料',
	'excel' => '导入Excel',
	'csv' => '导入CSV',
	'member' => '会员资料',
	'enter_client' => '录入用户资料',
	'create_client' =>'创建客户资料',
	'dispatch' => '分配客户',
	'dispatch_member' => '分配网站会员',
	'client_list'     => '客户列表',
	'throw_profile'   => '清理客户',
	'useless_profile' => '废纸篓',



	/*user*/
	'user' => '用户',
	'login' => '登陆',

	/*permission*/
	'per_category' => '权限类型',
	'per_user'     => '权限分配',
	'sql' => '执行SQL',


	/*mailer*/
	'mailer' => '邮件',
	'mail_template' => '模板列表',
	'mail_sender' => '邮件发送',
	'mail_configure' => '邮件设置',
	'edit_config'      => '编辑设置',
	'template_edit' => '模板编辑',
	'run_task' => '发送邮件',
	'mailto' => '给客户发送邮件',
	'send' => '发件箱',
	'receive' => '收件箱',
	'linkup' => '沟通记录',
	'reminder' => '备忘录',
	'send_information' => '邮件任务详细信息',
	'mail_program'  => '执行发送',

	/*marketing*/
	'connect' => '沟通',
	'website_member' => '网站会员',
	'send_invitation' => '邀请客户注册',
	'edit_client' => '编辑客户资料',
	'view_email' => '查看我发送的邮件',
	'client_tags'       => '客户标签',
	'message_center'   => '消息提醒中心',


	/*website*/
	'static_page_manage' => '页面管理',
	'static_page_edit'   => '页面编辑',
	'page_cache' => '网站缓存',
	'website_config' => '网站设置',

	/*review*/
	'news' => '新闻',
	'weibo' => '微博',
	'comment' => '评论',
	'question' => '问题',
	'repository' => '资料库',
	'fetch'    => '采集',


	/*error*/
	'no_permission' => '没有访问权限',
	'deny'          => '无法访问',

	/*welcome*/
	'view_suggestion' => '查看留言',
);

$modules = array_slice( $constant , 13);

?>