<button id="selected" class="btn btn-success">选择20个</button> 
<button id="cancel" class="btn btn-info">全部取消</button>
<script>
$(function() {
	$('#selected').click( function() {
		var t = 0;
		$('input:not(:checked)').each( function(){
			t++;
			if( t > 20)
				return false;
			$(this).attr( { "checked" : "checked"});
		})
	});

	$('#cancel').click( function() {
		window.location.href = window.location.href;
	});
});
</script>
<form class="inline" action="" method="post">
<button name="dispatch" class="btn" type="submit">分配勾选客户给销售</button>
销售人员 
<select name="salesman">
	<?php foreach ($admins as $man) {
	?>
	<option value="<?php echo $man['user_id'];?>"><?php echo $man['role_name'];?> <?php echo $man['username'];?></option>
	<?php
	}?>
</select>
<hr>
<table>
<tr valign="top"><td>
<?php
foreach ($client as $id => $c) {		
?>
<label><input name="<?php echo $c['id'];?>" type="checkbox" value="1" ><?php echo $c['name'];?> </label>
<?php

	if( ($id+1)%$offset === 0) {
		echo '</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>';
	}

}
?>
</td></tr>
</table>

</form>