<form action="" method="post">
<table class="table table-striped table-condensed">

<?php foreach ($articles as $article) { ?>

<tr>
	<td class="span1"><input name="<?php echo $article['id'];?>" type="checkbox" /></td>

	<td class="span1"><?php echo $article['id'];?></td>

	<td class="span5"><a href="<?php echo site_url('portal/edit_article/'.$article['id']);?>"><?php echo $article['post_title'];?></a></td>

	<td class="span2">

		<?php if( 1 == $article['post_status']){?>
		<span class="label label-success">已公开</span>
		<?php }else if( 2 == $article['post_status']){?>
		<span class="label label-info">已关闭</span>
		<?php } else {?>
		<span class="label">未设置</span>
		<?php }?>
	</td>

	<td class="span1">
		
		<?php if( $article['category_title']){?>

			<span class="label label-success"><?php echo $article['category_title'];?></span>
		
		<?php } else{?>
			<span class="label">未分类</span>
		<?php }?>

	</td>

	<td class="span2">
		<?php if( strlen($article['post_modified'] ) === 10) {?>
		<?php echo date('Y-m-d h:i:s' , $article['post_modified'] ) ;?>
		<?php }?>
	</td>
</tr>

<?php }?>

</table>

<script>
$( function () {

	$('#all_pick').on('click' , function() {

		$x = $('input[type="checkbox"]');

		if( $x.first().attr('checked') === 'checked'){
			$.each( $x , function(){

				$(this).removeAttr('checked');

			});
			
			$('#all_pick').attr({'value' : '全选'})	

		}else{
			
			$.each( $x , function(){

				$(this).attr({'checked' : 'checked'});

			});

			$('#all_pick').attr({'value' : '全部取消'})	
		}

	});

});
</script>
<input class="btn btn-primary" type="button" id="all_pick" name="all_pick" value="全选" />

<hr />

<div class="row">

	<div class="span3">
		<div class="control-group">
		<label><strong>删除新闻</strong></label>
		<div class="controls">
			<input class="btn btn-danger" type="submit" name="delete" value="删除" />
		</div>
		</div>

	</div>
	<div class="span3">

		<div class="control-group">
		<div class="controls">
		<label><strong>分类</strong></label>
		<select name="category">
				<option value="755">无操作</option>
				<option value="0">不分类</option>
			<?php foreach ($categories as $c) {?>
				<option value="<?php echo $c['id'];?>"><?php echo $c['category_title'];?></option>
			<?php }?>
		</select>
		</div>
		</div>

	</div>

	<div class="span3">

		<div class="control-group">
		<div class="controls">
		<label><strong>修改状态</strong></label>
		<select name="status">
			<option value="755">无操作</option>
			<option value="1">发布</option>
			<option value="2">关闭</option>
		</select>
		</div>
		</div>

	</div>

	<div class="span3">

		<div class="control-group">
			<label><strong>保存</strong></label>
		<div class="controls">

			<button class="btn btn-primary" name="operation" value="1">批量修改</button>
			
		</div>
		</div>

	</div>	
</div>

</form>


<?php $this->load->module('webkit/pagination/show' , array($offset , $sum));?>