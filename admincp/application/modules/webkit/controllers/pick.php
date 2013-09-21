<?php

class Webkit_pick_module extends CI_Module
{
	public function phpquery()
	{	

		$url = $this->input->post('url') ? $this->input->post('url') : 'http://www.csdn.net/article/2013-09-18/2816976-in-app-search-of-wandoujia';

		echo '<pre>';

		$file = file_get_contents( $url);
		$demo = phpQuery::newDocumentHTML( $file , 'utf-8');
		$a = pq('h1.title');
		var_dump( $a->html());

		$e = pq('a');
		foreach ($e as $li) {

			//echo $li->html();
			$z = pq( $li);
			$href = $z->attr('href');

			$href = preg_replace('=^[http]|[https]://=', '', $href);
				
			$href = preg_replace('|\/\/|', '/', $href);

			preg_match_all('/\//', $href , $match);


			if( count( $match[0]) < 3)
				continue;

			printf('%s <br/>' , $href) ;
		}

		echo '</pre>';
	}
}