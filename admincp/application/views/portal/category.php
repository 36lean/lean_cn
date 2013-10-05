<pre>
	
	<?php var_dump( $articles);?>

</pre>



<table class="table table-striped table-condensed">

<?php foreach ($articles as $article) { ?>

<tr>
	<td class="span1"><input name="<?php echo $article['id'];?>" type="checkbox" /></td>

	<td class="span1"><?php echo $article['id'];?></td>

	<td class="span7"><a href="<?php echo site_url('portal/edit_article/'.$article['id']);?>"><?php echo $article['post_title'];?></a></td>

	<td class="span1"><?php if( $article['category_title']){?><?php echo $article['category_title'];?><?php } else{?>未分类<?php }?></td>

	<td class="span2">
		<?php if( strlen($article['post_modified'] ) === 10) {?>
		<?php echo date('Y-m-d h:i:s' , $article['post_modified'] ) ;?>
		<?php }?>
	</td>
</tr>

<?php }?>

</table>

<div class="row">
	<div class="span3">

		<div class="control-group">
		<div class="controls">
		<label><strong>分类</strong></label>
		<select name="fix_category">
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
		<select name="fix_category">
			<option value="755">无操作</option>
			<option value="1">发布</option>
			<option value="2">关闭</option>
		</select>
		</div>
		</div>

	</div>
</div>




<?php $this->load->module('webkit/pagination/show' , array($offset , $sum));?>