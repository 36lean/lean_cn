<?php
define('APPTYPEID' , 0);
define('CURSCRIPT', 'lesson');

require './source/class/class_core.php';
//设备检测class
//require './source/class/class_mobiledetect.php';

session_start();
$discuz = & discuz_core::instance();
$discuz->init();

require template('common/header');
?>

<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">1.大王大王</h4>
    <p class="list-group-item-text hide">我擦嘞</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">2.大王大王</h4>
    <p class="list-group-item-text hide">我擦嘞</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">3.大王大王</h4>
    <p class="list-group-item-text hide">我擦嘞</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">4.大王大王</h4>
    <p class="list-group-item-text hide">我擦嘞</p>
  </a>
</div>
<style>
.list-group-item.active,.list-group-item.active:hover,.list-group-item.active:focus {
  z-index:2;
  color:#ffffff;
  background-color:#369;
  border-color:#428bca;
}  
</style>






<script>
$(function(){
  //请无视我
  jQuery('.list-group-item').on('mouseover' , function(){
    jQuery(this).addClass('active');
    jQuery(this).find('p').removeClass('hide');
  });
  jQuery('.list-group-item').on('mouseout' , function(){
    jQuery(this).removeClass('active');
    jQuery(this).find('p').addClass('hide');
  });


});
</script>