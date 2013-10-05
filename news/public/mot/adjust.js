$(function(){

    var site_url = 'http://127.0.0.1/feast/';

    $('div.panel-body').mouseover( function(){
      $(this).find('small').css({'color' : '#000'});
    });
    
    $('div.panel-body').mouseout( function() {
      $(this).find('small').css({'color' : ''});
    });

    $text = $('div.panel-body').has('.mot-title');
    
    $.each($text , function(){
      
      var str = $(this).html().replace( /\@([a-zA-Z0-9\_\-\~\u4e00-\u9fa5]+)/g , '<a href="'+site_url+'users/tiktok/$1">@$1</a>');

      str = str.replace( /\#(\S+)#/g , '<a href="'+site_url+'pills/object/$1">#$1#</a>');

      $(this).html( str);

    });

    $text = $('div.panel-body').has('.mot-text');

    $.each( $text , function(){
      
      var str = $(this).find('h3 > small').html();

      if( str === undefined)
      
        return ;
      
      str = str.replace( /\@([a-zA-Z0-9\_\-\~]+)/g , '<a href="'+site_url+'users/tiktok/"$1>@$1</a>');
      
      str = str.replace(/\#(\S+)#/ , '<a href="'+site_url+'pills/object/$1">#$1#</a>');

      $(this).find('.mot-text > small').html( str);

    });

    $po = $('p.large-po.small-po');

    $.each( $po , function(){

      var str = $(this).html();

      if( str === undefined)
        
        return ;

      str = str.replace( /\@([a-zA-Z0-9\_\-\~]+)/g , '<a href="#">@$1</a>');
      
      str = str.replace(/\#(\S+)#/ , '<a href="'+site_url+'pills/object/$1">#$1#</a>');

      $(this).html( str);

    });

    $('span.label.label-info').on('mouseover' , function(){
      $(this).removeClass('label-info');
      $(this).addClass('label-success');
    });
    $('span.label.label-info').on('mouseout' , function () {
      $(this).removeClass('label-success');
      $(this).addClass('label-info');
    });

     $('span.label.label-default').on('mouseover' , function(){
      $(this).removeClass('label-default');
      $(this).addClass('label-danger');
    });
    $('span.label.label-default').on('mouseout' , function () {
      $(this).removeClass('label-danger');
      $(this).addClass('label-default');
    });   

    $('#accordion').collapse('show');
    
    $('li').on('mouseover' , function (){
      $(this).addClass('active');
    });

    $('li').on('mouseout' , function (){
      $(this).removeClass('active');
    });

    $('.panel.mot-article').on('mouseover' , function (){
      $(this).addClass('panel-hover');
    });

    $('.panel.mot-article').on('mouseout' , function (){
      $(this).removeClass('panel-hover');
    });

    $('.datetimepicker').datetimepicker();

    $('.list-group-item').on('mouseover' , function(){
      $(this).addClass('list-group-item-hover');
    });

    $('.list-group-item').on('mouseout' , function(){
      $(this).removeClass('list-group-item-hover');
    });

    $('.user_card').on('mouseover' , function(){
      $(this).popover('show');
    });

    $('.user_card').on('mouseout' , function(){
      $(this).popover('hide');
    });

    $('div.panel').mouseover( function(){
      $(this).addClass('panel-hover');
    });

    $('div.panel').mouseout( function(){
      $(this).removeClass('panel-hover');
    });

    $('a.list-group-item').on('mouseover' , function () {
      $(this).addClass('active');
    });

    $('a.list-group-item').on('mouseout' , function() {
      $(this).removeClass('active');
    });

    $('div.thumbnail').on('mouseover' , function() {
      $(this).addClass('thumbnail-hover');
    });

    $('div.thumbnail').on('mouseout' , function() {
      $(this).removeClass('thumbnail-hover');
    });
});

