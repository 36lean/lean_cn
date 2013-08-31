
<pre>
<?php
$message[0]['timecreated'] = date('Y/m/d h:i:s' , $message[0]['timecreated']) . ' 格式化日期' ;
var_dump( $message);
?>