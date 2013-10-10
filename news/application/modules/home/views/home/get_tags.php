<?php foreach ($tags as $key => $value) {
	if( $key % 2 === 0)
	{
		echo ' <span class="label label-info">'.$value['tagname'].'</span> ';
	}else if( $key % 3 === 0)
	{
		echo ' <span class="label label-success">'.$value['tagname'].'</span> ';
	}else if( $key % 5 === 0)
	{
		echo ' <span class="label label-important">'.$value['tagname'].'</span> ';
	}else if( $key % 7 === 0)
	{
		echo ' <span class="label label-success">'.$value['tagname'].'</span> ';
	}else if( $key % 11 === 0)
	{
		echo ' <span class="label label-warning">'.$value['tagname'].'</span> ';
	}else
	{
		echo ' <span class="label">'.$value['tagname'].'</span> ';
	}
}?>