<div class="row-fluid span12">
<div class="input-append input-prepend span12">
<form class="form-inline" action="" method="post">
	<span class="add-on">采集的页面</span>
    <input name="url" class="span12" id="appendedInputButton" type="text">
    <button type="submit" name="url_read" class="btn" type="button">Go!</button>
</form>
</div>
</div>


<div class="control-group">
	<label class="control-label" for="textarea2">
		Textarea WYSIWYG
	</label>
	<div class="controls">
		<textarea class="cleditor" id="textarea2" rows="3">
			<?php echo isset($content['contenttext']) ? $content['contenttext'] : '';?>
		</textarea>
	</div>
</div>

<?php if( isset( $content['link'])) {?>
<p>URL</p>
<?php foreach ($content['link'] as $link) {
?>
	<p><a href="<?php echo $link;?>"><?php echo $link;?></a></p>
<?
}
}?>