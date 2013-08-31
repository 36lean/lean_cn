	<form class="inline" action="" post="get">
	<div class="control-group">
	<label class="control-label" for="appendedInputButton">添加一个标签到标签库</label>
	 	<div class="controls">
			<div class="input-append">
				<input name="tag" type="text" placeholder="重要的客户" /><button name="add" type="submit" class="btn">添加</button>
			</div>
		</div>
	</div>

<?php foreach ($tags as $tag) {
?>
<span class="alert alert-info"><?php echo $tag;?></span>
<?php
}?>
