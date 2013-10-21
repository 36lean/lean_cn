<script src="<?php echo base_url('public/uploadify/jquery.uploadify.min.js');?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/uploadify/uploadify.css');?>">


<script src="<?php echo base_url('public/zclip/zeroclipboard.jquery.min.js');?>" type="text/javascript"></script>

<h4>上传图片</h4>

<form>
	<div id="queue"></div>
	<input id="file_upload" name="file_upload" type="file" multiple="true">
</form>

<div class="tips">

</div>


<script type="text/javascript">

	<?php $timestamp = time();?>

	$(function() {
		$('#file_upload').uploadify({

		  'swf'      : '<?php echo base_url('public/uploadify/uploadify.swf');?>',
		  'uploader' : '<?php echo site_url('module/webkit/photo_uploads/handle/');?>' ,

		  'onUploadSuccess' : function ( file, data, response )  {

		  	$('.tips').append('<p><img id="append" src="'+data+'" width="300px" data-clipboard-text="'+data+'" /></p>');
			
			$('#append').zeroclipboard({
				text: $('#append').attr('src'),
				hand: true,
				sizeMethod: 'outer'
			});

		  },

		  'onUploadError' : function ( file, errorCode, errorMsg ) {
		  	$('.tips').append('<div class="alert alert-error">上传失败 请联系开发者 errorCode : '+errorCode+' errorMsg : '+errorMsg+'</div>');
		  } ,
		});

	});
</script>