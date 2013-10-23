<?php

class Home_layouts_module extends CI_Module
{
	public function header()
	{

		if( !file_exists( '../cache/common/header.html'))
		{
			echo 'Header Cache Not Found . generate root/cache/common/header.html first';

			exit;
		}

		$cache = file_get_contents('./../cache/common/header.html');
		echo $cache;

	}

	public function footer()
	{
		if( !file_exists( '../cache/common/footer.html'))
		{
			echo 'Header Cache Not Found . generate root/cache/common/footer.html first';
			exit;
		}
		$cache = file_get_contents('./../cache/common/footer.html');
		
		echo $cache;
	}
}