jQuery(function(){

	jQuery('.lesson-box').on('mouseover',function(){
		jQuery(this).addClass('lesson-box-hover');
	});

	jQuery('.lesson-box').on('mouseout',function(){
		jQuery(this).removeClass('lesson-box-hover');
	});	

	jQuery('.lesson-item').on('mouseover',function(){
		jQuery(this).addClass('lesson-item-hover');
	});

	jQuery('.lesson-item').on('mouseout',function(){
		jQuery(this).removeClass('lesson-item-hover');
	});	
});