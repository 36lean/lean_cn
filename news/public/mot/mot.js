$(function(){
    $('.dropdown-toggle').dropdown()

    $('div.mot-info').on('mouseover' , function() {
      $(this).addClass('mot-info-hover');
    });

    $('div.mot-info').on('mouseout' , function() {
      $(this).removeClass('mot-info-hover');
    });

    $('div.left-info').on('mouseover' , function() {
    	$(this).addClass('left-info-hover');
    });

    $('div.left-info').on('mouseout' , function(){
    	$(this).removeClass('left-info-hover');
    });

    $('a.label').on('mouseover' , function(){
        $(this).removeClass('label-info');
        $(this).addClass('label-success');
    });

    $('a.label').on('mouseout' , function(){
        $(this).removeClass('label-success');
        $(this).addClass('label-info');
    });
});

