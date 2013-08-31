<link href="themes/ecmoban_xiaomi/qq/images/qq.css" rel="stylesheet" type="text/css" />
<script language='javascript' src='themes/ecmoban_xiaomi/qq/ServiceQQ.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<div class="block header_bg">
<div class="block clearfix" style=" position:relative; height:100px; z-index:999999999 ; ">
 <div class="logo">
 <a href="index.php" name="top"><img  src="themes/ecmoban_xiaomi/images/logo.gif" /></a>
 </div>
 <div class="f_r log">
   <ul>
 
   <li id="topNav" class="clearfix">
  <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js')); ?>
   <font id="ECS_MEMBERZONE" style=" float:left"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </font>
   <div  style=" float:left; margin-top:20px; font-weight:normal;" class="buy_car_bg clearfix">
	
	<img src="themes/ecmoban_xiaomi/images/nav_cat.gif" style="float:left; padding-right:5px; padding-left:10px" /> 
	<div id="ECS_CARTINFO" style="float:left">
   <p><a href="flow.php"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></a></p>
     </div> </div>
    </li>
   </ul>
 </div>
 <script type="text/javascript">
    
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    
    </script>
	
	
	
	<div id="mainNav" class="clearfix" > 
  <ul class="u1" >
  <a class="a1"  href="index.php"><font style="color:#f68336"><?php echo $this->_var['lang']['home']; ?></font></a>
  </ul>
  <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
  <ul class="u1"  >
  <a  class="a1"  href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
  
  
  </ul>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

</div>

<div  class="blank"></div>

 
 
</div>