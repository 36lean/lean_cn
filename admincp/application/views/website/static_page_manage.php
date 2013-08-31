<?php global $constant;?>
<table class="table table-striped table-bordered bootstrap-datatable datatable">

	<thead>
		<tr>
			<td>ID</td>
			<td>路径</td>
			<td>名字</td>
			<td>失效期</td>
			<td>修改</td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($pages as $p) {
		?>
		<tr>
			<td><?php echo $p['id'];?></td>
			<td><?php echo $p['path'];?></td>
			<td><?php echo $p['pagename'];?></td>
			<td><?php echo date('Y/m/d' , $p['timeup']);?></td>
			<td>
				<a href="<?php echo $constant['discuz_url']?>read.php?title=<?php echo $p['path']?>"><i class="icon-eye-open"></i> 预览</a>
				<a href="<?php echo base_url();?>index.php/website/static_page_edit/<?php echo $p['id'];?>"><i class="icon-edit"></i> 编辑</a> 
				<a href="<?php echo base_url();?>index.php/website/static_page_del/<?php echo $p['id'];?>"><i class="icon-remove"></i> 删除</a>
			</td>
		</tr>
		<?php
		}?>
	</tbody>

</table>