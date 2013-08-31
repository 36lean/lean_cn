<p>确定要删除 <strong><?php echo $info[0]['fullname'];?></strong> 吗</p>
<form name="" action="" method="post">
	<input type="hidden" name="id" value="<?php echo $info[0]['id'];?>">

	<button class="btn btn-primary" type="submit" name="sure">确定</button>
	<a class="btn btn-primary" href="<?php echo base_url();?>index.php/course/index">取消</a>
</form>