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
	private $sign;
	private $base = 'http://vsaying.talkage.com/vsaying/';

	/**
	*获取微通讯验证的Signature字符串
	* @access public
	**/
	public function get_vsay_signature( $toUser = '' , $token = '' )
	{
  		
   		$this->timestamp =  time(). intval(1000*microtime());

		$this->toUser = $toUser;
		$this->token = $token;

		$arr = array( $this->timestamp , $this->toUser , $this->token );

		sort( $arr);

		$str = implode('', $arr);

		$this->vsay_sign = strtolower( sha1( $str));

		$this->sign = '&signature='.$this->vsay_sign.'&timestamp='.$this->timestamp.'&toUser='.$this->toUser;

		return $this;
	}

	public function register( $user , $phone)
	{
		$register_url = $this->base.'isExiste?fromUser='.$user.$this->sign;

		if( 'UserExiste' === file_get_contents($register_url))
		{
			echo '已经注册了';
		}else
		{
			echo '还没有注册';
		}
	}

	public function get_vsay_url( $method , $params = array())
	{

		$p = array();
		foreach ($params as $key => $value) {
			$p[] = $key.'='.$value;
		}

		$str = implode('&', $p);

		$url = $this->base.$method.'?'.$str.$this->sign;
		
		return htmlspecialchars_decode( $url);
	}
}