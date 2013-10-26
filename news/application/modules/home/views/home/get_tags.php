<?php foreach ($tags as $key => $value) {
	if( $key % 2 === 0)
	{
		echo ' <a href="'.site_url('pills/tag/'.$value['tagname']).'"><span class="label label-info mot-tag">'.$value['tagname'].'</span></a> ';
	}else if( $key % 3 === 0)
	{
		echo ' <a href="'.site_url('pills/tag/'.$value['tagname']).'"><span class="label label-success mot-tag">'.$value['tagname'].'</span></a> ';
	}else if( $key % 5 === 0)
	{
		echo ' <a href="'.site_url('pills/tag/'.$value['tagname']).'"><span class="label label-important mot-tag">'.$value['tagname'].'</span></a> ';
	}else if( $key % 7 === 0)
	{
		echo ' <a href="'.site_url('pills/tag/'.$value['tagname']).'"><span class="label label-success mot-tag">'.$value['tagname'].'</span></a> ';
	}else if( $key % 11 === 0)
	{
		echo ' <a href="'.site_url('pills/tag/'.$value['tagname']).'"><span class="label label-warning mot-tag">'.$value['tagname'].'</span></a> ';
	}else
	{
		echo ' <a href="'.site_url('pills/tag/'.$value['tagname']).'"><span class="label mot-tag">'.$value['tagname'].'</span></a> ';
	}
}?>