<div class="page-header">
	<h4>上传Excel文件 <small>上传扩展名为xls的97-2000的excel</small></h4>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<div class="control-group">
		<div class="controls">
			<input name="file" type="file" />
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button class="btn btn-primary" name="upload_file" value="1">上传</button>
		</div>
	</div>	
</form>

<table class="table table-bordered table-striped table-condensed">
	
	<tr>
		<td>id</td>
		<td>filename</td>
		<td>type</td>
		<td>size</td>
		<td>created time</td>
		<td>md5</td>
		<td>import</td>
	</tr>

	<?php foreach ($list as $file) : ?>
	<tr>
		<td><?php echo $file['id'];?></td>
		<td><?php echo $file['filename'];?></td>
		<td><?php echo strtoupper( str_replace('.', '', $file['type']));?></td>
		<td><?php echo $file['size'];?></td>
		<td><?php echo date('Y/m/d h:i:s' , $file['createdtime']);?></td>
		<td><?php echo $file['md5'];?></td>
		<td><a href="<?php echo site_url('client/turntodb/'.$file['md5']);?>">导入</a></td>
	</tr>
	<?php endforeach ?>
</table>


