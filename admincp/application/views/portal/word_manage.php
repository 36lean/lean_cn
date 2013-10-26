<div class="btn-toolbar">
    <div class="btn-group">
    
    <a class="btn btn-primary active" href="<?php echo site_url('portal/word_manage');?>">候选的关键字</a>
    <a class="btn btn-primary" href="<?php echo site_url('portal/word_active');?>">激活的关键字</a>

    </div>
</div>

<div class="page-header">
	<h4>备用关键字库 <small>单击激活关键字</small></h4>
</div>
<?php foreach ($word as $value) { ?>
	
	<a class="key" href="javascript:void(0);" rel="<?php echo $value['id'];?>"><span class="label"><?php echo $value['value'];?></span></a>

<?php }?>

<script>
$(function(){

	$('a.key').on( 'click' , function(){

		var id = $(this).attr('rel');

		var value = $(this).text();

		$obj = $(this).find('span');

		$.ajax({
			url : "<?php echo site_url('portal/change_keyword_status');?>" , 
			data : { 'id' : id ,  'value' : value } ,
			type : 'POST' , 
			success: function( data ){

				if( data === '1')
				{
					$obj.addClass('label-success');
				}else
				{
					$obj.removeClass('label-success');
				}

			} , 
		});

	});

});
</script>