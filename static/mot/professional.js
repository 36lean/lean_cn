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

  jQuery('.course_line').on('mouseover' , function(){
    jQuery(this).removeClass('course_line');
    jQuery(this).addClass('course_line_hover');
  });

  jQuery('.course_line').on('mouseout' , function(){
    jQuery(this).removeClass('course_line_hover');
    jQuery(this).addClass('course_line');
  });
  
});