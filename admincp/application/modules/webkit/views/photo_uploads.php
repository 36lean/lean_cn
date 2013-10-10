<script src="<?php echo base_url('public/uploadify/jquery.uploadify.min.js');?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/uploadify/uploadify.css');?>">


<script src="<?php echo base_url('public/zclip/jquery.zclip.min.js');?>" type="text/javascript"></script>

<h4>上传图片</h4>

<form>
	<div id="queue"></div>
	<input id="file_upload" name="file_upload" type="file" multiple="true">
</form>

<div class="tips">

</div>

<a id="copy-button" href="#">Copy</a>


<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadify({

		  'swf'      : '<?php echo base_url('public/uploadify/uploadify.swf');?>',
		  'uploader' : '<?php echo site_url('module/webkit/photo_uploads/handle/');?>' ,

		  'onUploadSuccess' : function ( file, data, response )  {

		  	$('.tips').append(data);
		  	

		  },

		  'onUploadError' : function ( file, errorCode, errorMsg ) {

		  	$('.tips').append('<div class="alert alert-error">上传失败 请联系开发者 errorCode : '+errorCode+' errorMsg : '+errorMsg+'</div>');
		  
		  } ,

		});



			$('#copy-button').zclip({	
				path:'<?php echo base_url('public/zclip/ZeroClipboard.swf');?>',
				copy:$('p.tips').text()
			});


	});
</script>