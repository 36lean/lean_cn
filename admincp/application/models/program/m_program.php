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
			//echo 'UserExiste';
			return $this;
		}
		else
		{	
			$register = $this->base . 'createUser?fromUser='.$user.'&phoneNumber='.$phone.$this->sign;

			echo file_get_contents( $register);

			return $this;
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

	public function make_dial_success_log( $data)
	{
		$this->db->insert('admin_dial' , $data);
	}

	public function update_start_time( $user_id)
	{
		$ci = & get_instance();

		$result = $this->db->select('id')
				 		   ->from('admin_dial')
				 		   ->where( array('caller_id'=>$user_id))
				 		   ->order_by('id' , 'desc')
				 		   ->get()
				 		   ->row_array();

		if( $result)
		{
			$this->db->where( array('id'=>$result['id']))->update('admin_dial' , array('starttime'=>time()));
			echo 1;
		}
		else
		{
			echo -1;
		}
	}

	public function update_end_time( $user_id)
	{
		$ci = & get_instance();

		$result = $this->db->select('id')
				 		   ->from('admin_dial')
				 		   ->where( array('caller_id'=>$user_id))
				 		   ->order_by('id' , 'desc')
				 		   ->get()
				 		   ->row_array();

		if( $result)
		{
			$this->db->where( array('id'=>$result['id']))->update('admin_dial' , array('endtime'=>time()));
			echo 1;
		}
		else
		{
			echo -1;
		}
	}	

	public function give_up( $user_id)
	{
		$ci = & get_instance();

		$result = $this->db->select('id')
				 		   ->from('admin_dial')
				 		   ->where( array('caller_id'=>$user_id ))
				 		   ->order_by('id' , 'desc')
				 		   ->get()
				 		   ->row_array();

		if( $result)
		{
			$this->db->where( array('id'=>$result['id']))->update('admin_dial' , array('result'=>-1));
			echo 1;
		}
		else
		{
			echo -1;
		}		
	}

}