<table class="table table-hover table-bordered">
<tr>
	<th></th> <th>uid</th> <th>username</th> <th>realname</th> <th>gender</th> <th>mobile</th> <th>email</th> <th>QQ</th>
</tr>
<?php
foreach ($members as $u) {
?>
<tr>
	<td><input name="<?php echo $u['uid']?>" type="checkbox" /> <a href="#">edit</a> <a>sendemail</a></td>
	<td><?php echo $u['uid'];?></td>
	<td><?php echo $u['username'];?></td>
	<td><?php echo $u['realname'];?></td>
	<td><?php echo $u['gender'];?></td>
	<td><?php echo $u['mobile'];?></td>
	<td><?php echo $u['email'];?></td>
	<td><?php echo $u['qq'];?></td>
</tr>
<?php
}
?>
</table>