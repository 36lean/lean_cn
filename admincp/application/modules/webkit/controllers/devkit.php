<?php

class Webkit_devkit_module extends CI_Module
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('program/m_program','program');

	}

	public function index()
	{
		$url = $this->program->get_vsay_signature('831lean2013online','2435325uifslkfjalTalk')
							 ->register('mot02' , '13387561303')
							 ->get_vsay_url( 'queryBalance' , array( 'toUser'=>'831lean2013online'));

		var_dump( file_get_contents( $url));
	}

	//namespance : __contact_
	public function pull_dial_request( $user_id , $phone)
	{
		$url = $this->program->get_vsay_signature('831lean2013online','2435325uifslkfjalTalk')
							 ->register('__contact_'.$user_id , $phone)
							 ->get_vsay_url( 'phoneCall' , array( 'fromUser'	 => '__contact_'.$user_id , 
							 									  'toUser' 		 => '831lean2013online' , 
							 									  'infoCsrId' 	 => 1 ,
							 									)
							 );

		echo $url;

  		$ch = curl_init();
   		curl_setopt($ch, CURLOPT_URL, $url);
   		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
   		curl_setopt($ch, CURLOPT_USERAGENT, '	Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0');
   		//curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
   		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		echo $return = curl_exec($ch);
   		curl_close($ch);

   		//$return = file_get_contents( $url);
		
		if( 'CallSuccess' === $return)
		{
			$this->program->make_dial_success_log( 
				array(
					'contact_id' 	=> $user_id , 
					'caller_id' 	=> $this->_G,
					'phone'			=> $phone , 
					'timedial' 		=> time() , 
					'result'		=> 1 ,
				)
			);
		}

		$status = array(
			'RequestParameterError' => '参数错误' , 
			'DeveloperNotExiste'	=> '开发者帐号不存在' , 
			'UserNotExiste'			=> '用户未注册' ,
			'UserExiste'			=> '用户已注册' ,
			'CreatError'			=> '用户注册失败' ,
			'CallSuccess'			=> '呼叫成功' ,
			'CallError'				=> '呼叫失败,可能是账户余额不足' ,
			'SelectError'			=> '查询错误' , 
			'TelPhoneNumError'		=> '电话号码格式错误' ,
			'BUNDINGERROR'			=> '绑定失败' ,
			'CheckCodeSendSuccess'	=> '验证码已经成功发送' ,
			'BundingError'			=> '绑定失败' , 
			'BundingSuccess'		=> '绑定成功' ,
			'CheckCodeSendSuccess'	=> '验证码已经成功发送' ,
			'TelPhoneNumError'		=> '电话号码格式错误' ,
		);

		if( array_key_exists( $return , $status))
		{
			echo $status[$return];
		}
		else
		{
			echo $return;
		}
	}
}