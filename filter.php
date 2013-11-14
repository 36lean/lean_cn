<?php
//define encoding
define ('UTF32_BIG_ENDIAN_BOM'   , chr(0x00) . chr(0x00) . chr(0xFE) . chr(0xFF));
define ('UTF32_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE) . chr(0x00) . chr(0x00));
define ('UTF16_BIG_ENDIAN_BOM'   , chr(0xFE) . chr(0xFF));
define ('UTF16_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE));
define ('UTF8_BOM'               , chr(0xEF) . chr(0xBB) . chr(0xBF));
//discuz core
$_req = trim($_GET['url']);
header("Content-Type: text/plain;charset=utf-8");

if( !preg_match('/.srt$/', $_req) )
exit;

$url = $_req;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_USERAGENT, '	Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0');
   		//curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$return = @curl_exec($ch);
curl_close($ch);




$p = xml_parser_create();
xml_parse_into_struct($p,  $return , $vals, $index);
xml_parser_free($p);

if( isset( $vals) && is_array( $vals))
if( 'AccessDenied' === $vals[1]['value'] || 'NoSuchKey' ===  $vals[1]['value'] )
{

	echo file_get_contents('static/mot/empty.srt');
	exit;

}
	
if( 'UTF-16LE' === detect_utf_encoding( $_req)){
	
	echo iconv('UTF-16', 'UTF-8', file_get_contents( $_req));

}else {

	echo file_get_contents( $_req);

}

function detect_utf_encoding($filename) {

	$text = file_get_contents($filename);
	$first2 = substr($text, 0, 2);
	$first3 = substr($text, 0, 3);
	$first4 = substr($text, 0, 3);

	if ($first3 == UTF8_BOM) 
		return 'UTF-8';
	elseif ($first4 == UTF32_BIG_ENDIAN_BOM) 
		return 'UTF-32BE';
	elseif ($first4 == UTF32_LITTLE_ENDIAN_BOM) 
		return 'UTF-32LE';
	elseif ($first2 == UTF16_BIG_ENDIAN_BOM) 
		return 'UTF-16BE';
	elseif ($first2 == UTF16_LITTLE_ENDIAN_BOM) 
		return 'UTF-16LE';
}

?>