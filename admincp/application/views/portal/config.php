<div class="page-header">
	<h4>文章/新闻标签</h4>
</div>
<form class="form-inline" action="" method="post">

	<input name="tag" type="text" />
	<button class="btn btn-primary" name="add_tag" value="1">Add Tag</button>

</form>

<hr/>

<?php foreach ($tags as $tag) {?>

	<span class="label label-info"><?php echo $tag['tagname'];?></span>

<?php }?>
