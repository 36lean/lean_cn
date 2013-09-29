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

		//var_dump( file_get_contents( $url));
		$user = $this->session->userdata('user');
		var_dump( $user);
	}

	//namespance : __contact_
	public function pull_dial_request( $user_id , $phone , $userid)
	{

		$user = $this->session->userdata('user');

		if( $userid == 1265)
			$infoCsrId = 2;
		else if( $userid == 1084)
			$infoCsrId = 1;
		else
			$infoCsrId = 1;

		$url = $this->program->get_vsay_signature('831lean2013online','2435325uifslkfjalTalk')
							 ->register('c_'.$phone , $phone)
							 ->get_vsay_url( 'phoneCall' , array( 'fromUser'	 => 'c_'.$phone , 
							 									  'toUser' 		 => '831lean2013online' , 
							 									  'infoCsrId' 	 => $infoCsrId ,
							 									)
							 );


		//$url = 'http://baidu.com';
		

  		$ch = curl_init();
   		curl_setopt($ch, CURLOPT_URL, $url);
   		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
   		curl_setopt($ch, CURLOPT_USERAGENT, '	Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0');
   		//curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
   		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		echo $return = @curl_exec($ch);
   		curl_close($ch);
		
   		//$return = file_get_contents( $url);
			
		$return = trim( $return);

	

		$cur_user = $this->session->userdata('user');

		$this->program->make_dial_success_log( 
				array(
					'contact_id' 	=> $user_id , 
					'caller_id' 	=> $cur_user['uid'],
					'phone'			=> $phone , 
					'timedial' 		=> time() , 
					'response'		=> $return ,
					'result'		=> 1 ,
				)
		);

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