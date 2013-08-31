<div class="block">
  <div class="blank"></div>
  <div class="blank"></div>
  <div class="blank"></div>
  <div class="blank"></div>
  
  <?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>
  <div id="bottomNav" >
    <div class=" clearfix" style="padding:10px 5px;">
      <?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
      <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><img style="width:88px; height:31px;" src="<?php echo $this->_var['link']['logo']; ?>" alt="<?php echo $this->_var['link']['name']; ?>" border="0" /></a>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php if ($this->_var['txt_links']): ?>
      <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
      [<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>]
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
  
  <div class="blank"></div>
  <div class="blank"></div>
  <div class="blank"></div>
    <div class="footer_top">
	<ul>
	<li><a href="#"><img src="themes/ecmoban_xiaomi/images/footer_1.gif" /></a></li>
	<li><a href="#"><img src="themes/ecmoban_xiaomi/images/footer_2.gif" /></a></li>
	<li><a href="#"><img src="themes/ecmoban_xiaomi/images/footer_3.gif" /></a></li>
	<li style="background:none;"><a href="#"><img src="themes/ecmoban_xiaomi/images/footer_4.gif" /></a></li>
	</ul>
	</div>
	
    
<div class="blank"></div>
    <div class="helpTitBg">
      <?php if ($this->_var['helps']): ?>
      <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');if (count($_from)):
    foreach ($_from AS $this->_var['help_cat']):
?>
      <dl>
        <dt><a href='<?php echo $this->_var['help_cat']['cat_id']; ?>' title="<?php echo $this->_var['help_cat']['cat_name']; ?>"><?php echo $this->_var['help_cat']['cat_name']; ?></a></dt>
        <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <dd><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a></dd>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </dl>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>
    </div>
	<div style="width:201px; float:right;">
	<ul>
	<!--- <li style="padding-top:30px;"> <img src="themes/ecmoban_xiaomi/images/footer_tel.gif" /></li> --->
	<li style="padding-top:17px;"><a href="#"><img src="themes/ecmoban_xiaomi/images/footer_kefu.gif" /></a></li>
	</ul>
	</div>
    <div class="blank"></div>
    <div class="blank"></div>
	
	</div>
	
	<div class="clearfix" style="background:#fafafa; height:174px; padding-bottom:40px;">
  <div style="width:960px; height:28px; line-height:28px; _padding-top:7px; _height:21px; margin:0 auto; text-align:center; margin-top:20px;">
      <p style="color:#999999;">© 2012-2013 美栏牧场 版权所有
	  沪ICP备:13007809
	   <?php if ($this->_var['stats_code']): ?>
	   <?php echo $this->_var['stats_code']; ?>
       <?php endif; ?>
	  </p>
    </div>
	<!---<div style="margin:0 auto; width:200px; margin-top:34px;" title="小米为发烧而生"><img  src="themes/ecmoban_xiaomi/images/footer_img.gif" /></div> --->
	     
	   
 
    
  </div>
 



