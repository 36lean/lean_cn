<span class="label label-info">预览</span>
<a href="<?php echo base_url();?>index.php/course/edit_course/<?php echo $course_id;?>">返回</a>
<table class="table">
<?php
unset( $data['course']);
foreach ( $data as $info) {
?>
<tr>
	<?php foreach ($info as $text) {
	?>
		<td><?php echo $text;?></td>
	<?php
	}?>
</tr>
<?php
}
?>
</table>