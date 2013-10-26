<?php
echo count_str('干SS然后爆OK哥菊花');
function count_str($str)
{ 
 	preg_match_all('/[a-zA-Z0-9\x{4e00}-\x{9fa5}]{1}/u', $str , $match);
 	return count( $match[0]);
}
?>