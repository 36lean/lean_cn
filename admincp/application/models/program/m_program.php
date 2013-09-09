<?php

/**
*计算数据用的model
* @access public
*
**/

class M_program extends CI_Model
{	
	private $vsay_sign;
	private $timestamp;
	private $toUser;
	private $token;

	/**
	*获取微通讯验证的Signature字符串
	* @access public
	**/
	public function get_vsay_signature( $toUser = '' , $token = '' )
	{
		$this->timestamp = time();
		$this->toUser = $toUser;
		$this->token = $token;

		$arr = array( $this->timestamp , $this->toUser , $this->token );
		sort( $arr);

		$str = implode('', $arr);

		$this->vsay_sign = strtolower( sha1( $str));

		return $this;
	}

	public function get_vsay_url( $method , $params = array())
	{

		$p = array();
		foreach ($params as $key => $value) {
			$p[] = $key.'='.$value;
		}

		$str = implode('&', $p);


		$url = 'http://180.168.172.123/vsaying/'.$method.'&'.$str.'&signature='.$this->vsay_sign.'&timestamp='.$this->timestamp.'&toUser='.$this->toUser;

		return $url;
	}
}