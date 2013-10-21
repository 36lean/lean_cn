<?php $this->load->module('webkit/photo_uploads/uploads');?>

<form action="" method="post">
	<input name="id" type="hidden" value="<?php echo $data['id'];?>" />

	<div class="row">
	<div class="span2">
	<label>位置</label>
	</div>
	<div class="span10">
		<input type="text" readonly="readonly" value="<?php echo $data['position'];?>">
	</div>
	</div>

	<div class="row">
	<div class="span2">
	<label>banner图</label>
	</div>
	<div class="span10">
		<input class="span6" name="banner" type="text" value="<?php echo $data['banner'];?>">
	</div>
	</div>

	<div class="row">
	<div class="span2">
	<label>新闻ID</label>
	</div>
	<div class="span10">
		<input name="article_id" type="text" value="<?php echo $data['article_id'];?>">
	</div>
	</div>

	<div class="row">
	<div class="span2">
	<label>搜索引擎SEO关键字</label>
	</div>
	<div class="span10">
		<textarea class="span6" name="seo_text"><?php echo $data['seo_text'];?></textarea>
	</div>
	</div>

	<div class="row">
	<div class="span2">
	<label>上次修改时间</label>
	</div>
	<div class="span10">
		<?php echo date('Y-m-d h:i' , $data['timeupdated']);?>
	</div>
	</div>

	<button class="btn btn-primary" name="seo_updates" value="1">更新</button>

</form>