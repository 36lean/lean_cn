<?php

class Webkit_pick_module extends CI_Module
{
	public function phpquery()
	{	

		$url = $this->input->post('url') ? $this->input->post('url') : 'http://www.baidu.com/s?wd=php%E9%87%87%E9%9B%86%E5%B7%A5%E5%85%B7&rsv_spt=1&issp=1&rsv_bp=0&ie=utf-8&tn=baiduhome_pg&rsv_sug3=5&rsv_sug=0&rsv_sug4=1085&rsv_sug1=2';

		echo '<pre>';

		$file = file_get_contents( $url);
		$demo = phpQuery::newDocumentHTML( $file , 'utf-8');
		//$a = pq('h1.title');
		//var_dump( $a->html());

		$e = pq('a');
		foreach ($e as $li) {

			//echo $li->html();
			$z = pq( $li);
			$href = $z->attr('href');

			//$href = preg_replace('=^[http]|[https]://=', '', $href);
				
			//$href = preg_replace('|\/\/|', '/', $href);

			preg_match_all('/\//', $href , $match);


			if( count( $match[0]) < 3)
				continue;

			printf('%s <br/>' , $href) ;
		}

		echo '</pre>';
	}
}