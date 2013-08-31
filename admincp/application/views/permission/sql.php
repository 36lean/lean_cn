<form action="" method="post">
	<textarea class="span10" name="sql"></textarea>
	<p><button name="post">提交</button></p>
</form>
<?php
if( isset( $_POST['post'])) {

	$sql = array();	

	$sql = explode(';', $_POST['sql']);

	foreach ($sql as $s) {
		
		var_dump( $s);
		//var_dump( $this->db->query( $s));
	}
	
}
?>

