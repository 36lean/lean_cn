<pre>
<?php

$text = file_get_contents('cache/list.txt');

$x = preg_split('/\s+/' , $text);

file_put_contents('cache/out.txt', json_encode( $x));

?>