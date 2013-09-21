
<?php $this->load->module('webkit/pagination/show' , array($offset , $sum));?>

<table class="table table-condensed">

	<tr>
		<td class="span1">rm -f</td>
		<td class="span1">uid</td>
		<td class="span3">email</td>
		<td class="span2">username</td>
		<td class="span1">phone</td>
		<td class="span1">mobile</td>
		<td class="span2">company</td>
		<td class="span2">regdate</td>
		<td class="span1">position</td>
	</tr>


	<?php foreach ($members as $m) :?>

	<tr>
		<td><input type="checkbox" name="<?php echo $m['uid'];?>"/></td>
		<td><?php echo $m['uid'];?></td>
		<td><?php echo $m['email'];?></td>
		<td><a href="<?php echo site_url('client/edit_webmember/'.$m['uid']);?>"><?php echo $m['username'];?></a></td>
		<td><?php echo $m['telephone'];?></td>
		<td><?php echo $m['mobile'];?></td>
		<td><?php echo $m['company'];?></td>
		<td><?php echo date('Y-m-d h:i' , $m['regdate']) ;?></td>
		<td><?php echo $m['position'];?></td>		
	</tr>

	<?php endforeach ?>

</table>