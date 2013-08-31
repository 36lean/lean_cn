<?php

class Client_config extends CI_Model {

	public function get_client_mapping() {
		return array(
			'name' 			=> '名字',
			'gender' 		=> '性别',
			'age' 			=> '年龄',
			'position' 		=> '职位',
			'email'     	=> '电子邮件',
			'mobile'    	=> '手机号',
			'phone'     	=> '电话',
			'fax'			=> '传真',
			'qq'			=> 'QQ号',
			'postid'    	=> '邮编',
			'website'   	=> '网址',
			'etc'           => '备注',
			'address'       => '地址',
			'cname' 		=> '企业名字',
			'cdescription' => '企业描述',
		);
	}
}