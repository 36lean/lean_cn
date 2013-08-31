
<a href="<?php echo base_url();?>index.php/website/cache_clean">清除所有缓存</a>
<table class="table">
<tr><td>缓存名</td> <td>大小</td> <td>修改日期</td> <td>最后访问</td></tr>
<?
$cache_folder = preg_replace('/admincp/', '', getcwd()).'cache/' ;

foreach ($cache_file as $cache) {
	$stat = stat( $cache_folder . $cache);
	if( $stat['size'] === 0)
		continue;
?>
<tr>
	<td><?php echo $cache;?></td>
	<td><?php echo $stat['size'];?></td>
	<td><?php echo date('Y/m/d h:i:s',$stat['mtime']);?></td>
	<td><?php echo date('Y/m/d h:i:s',$stat['atime']);?></td>
</tr>
<?php
}
?>
</table>