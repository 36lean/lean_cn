<strong><span class="label label-info">约会提醒 : </span>
当前提醒队列 : 
<a href="<?php echo site_url('marketing/center');?>">
<?php
foreach ($data as $key=>$name) {
	echo $name['name'] . ' ';
	if( $key > 5)
		break;
}
?>
</a>
 .. 等人 | 


<span class="badge badge-success"><?php echo $num;?></span> 个约会即将到来
</strong>