<div class="box">
 
  <div class="cat_tit"> <span><a href="<?php echo $this->_var['goods_cat']['url']; ?>"  ><?php echo htmlspecialchars($this->_var['goods_cat']['name']); ?></a></span> <a  href="<?php echo $this->_var['goods_cat']['url']; ?>">更多>></a>   </div>
    <div class="goods_cat  ">
    <div class="clearfix goodsBox  " >
      <?php $_from = $this->_var['cat_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
      <div class="goodsItem ">
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a><br />
           <p><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a></p>
           <?php if ($this->_var['goods']['promote_price'] != ""): ?>
          <font class="shop_s"><?php echo $this->_var['goods']['promote_price']; ?></font>
          <?php else: ?>
          <font class="shop_s"><?php echo $this->_var['goods']['shop_price']; ?></font>
          <?php endif; ?>
        </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
 
 </div>
</div>
<div class="blank"></div>
