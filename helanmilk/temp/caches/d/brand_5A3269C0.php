<?php exit;?>a:3:{s:8:"template";a:9:{i:0;s:56:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/brand.dwt";i:1;s:70:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/page_header.lbi";i:2;s:66:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/ur_here.lbi";i:3;s:72:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/category_tree.lbi";i:4;s:66:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/history.lbi";i:5;s:73:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/recommend_best.lbi";i:6;s:69:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/goods_list.lbi";i:7;s:64:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/pages.lbi";i:8;s:70:"/www/users/helanmilk.com/themes/ecmoban_xiaomi/library/page_footer.lbi";}s:7:"expires";i:1366690933;s:8:"maketime";i:1366687333;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>牛栏_美栏商城 - 为宝宝而生</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="themes/ecmoban_xiaomi/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/common.js"></script><script type="text/javascript" src="js/global.js"></script><script type="text/javascript" src="js/compare.js"></script></head>
<body>
<link href="themes/ecmoban_xiaomi/qq/images/qq.css" rel="stylesheet" type="text/css" />
<script language='javascript' src='themes/ecmoban_xiaomi/qq/ServiceQQ.js' type='text/javascript' charset='utf-8'></script>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<div class="block header_bg">
<div class="block clearfix" style=" position:relative; height:100px; z-index:999999999 ; ">
 <div class="logo">
 <a href="index.php" name="top"><img  src="themes/ecmoban_xiaomi/images/logo.gif" /></a>
 </div>
 <div class="f_r log">
   <ul>
 
   <li id="topNav" class="clearfix">
  <script type="text/javascript" src="js/transport.js"></script><script type="text/javascript" src="js/utils.js"></script>   <font id="ECS_MEMBERZONE" style=" float:left">554fcae493e564ee0dc75bdf2ebf94camember_info|a:1:{s:4:"name";s:11:"member_info";}554fcae493e564ee0dc75bdf2ebf94ca </font>
   <div  style=" float:left; margin-top:20px; font-weight:normal;" class="buy_car_bg clearfix">
	
	<img src="themes/ecmoban_xiaomi/images/nav_cat.gif" style="float:left; padding-right:5px; padding-left:10px" /> 
	<div id="ECS_CARTINFO" style="float:left">
   <p><a href="flow.php">554fcae493e564ee0dc75bdf2ebf94cacart_info|a:1:{s:4:"name";s:9:"cart_info";}554fcae493e564ee0dc75bdf2ebf94ca</a></p>
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
            alert("请输入搜索关键词！");
            return false;
        }
    }
    
    </script>
	
	
	
	<div id="mainNav" class="clearfix" > 
  <ul class="u1" >
  <a class="a1"  href="index.php"><font style="color:#f68336">首页</font></a>
  </ul>
    <ul class="u1"  >
  <a  class="a1"  href="category.php?id=1" >荷兰美素</a>
  
  
  </ul>
   <ul class="u1"  >
  <a  class="a1"  href="category.php?id=2" >荷兰牛栏</a>
  
  
  </ul>
 </div>
</div>
<div  class="blank"></div>
 
 
</div>
  <div class="block box">
<div class="blank"></div>
 <div id="ur_here">
当前位置: <a href=".">首页</a> <code>&gt;</code> 牛栏 
</div>
</div>
<div class="blank"></div>
<div class="block clearfix">
  
  <div class="AreaL">
    
	
  <div id="category_tree">
  <div class="tit">商品分类</div>
         <dl>
     <dt><a href="category.php?id=1">荷兰美素</a></dt>
     <dd>       </dd>
       </dl>
         <dl>
     <dt><a href="category.php?id=2">荷兰牛栏</a></dt>
     <dd>       </dd>
       </dl>
     
  </div>
<div class="blank"></div>
    
    <div class="box" id='history_div'>
 <h3><span>浏览历史</span></h3>
 <div class="box_1">
 
  <div class="boxCenterList clearfix" id='history_list'>
    554fcae493e564ee0dc75bdf2ebf94cahistory|a:1:{s:4:"name";s:7:"history";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
 </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
if (document.getElementById('history_list').innerHTML.replace(/\s/g,'').length<1)
{
    document.getElementById('history_div').style.display='none';
}
else
{
    document.getElementById('history_div').style.display='block';
}
function clear_history()
{
Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
document.getElementById('history_list').innerHTML = '您已清空最近浏览过的商品';
}
</script>  </div>
  
  
  <div class="AreaR">
    <div class="box">
     <div class="box_1">
      <h3><span>牛栏</span></h3>
      <div class="boxCenterList">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
          <td bgcolor="#ffffff" width="200" align="center" valign="middle">
          <div style="width:200px; overflow:hidden;">
                    </div>
          </td>
          <td bgcolor="#ffffff">
          <br />
                        官方网站： <a href="http://" target="_blank" class="f6">http://</a><br />
                        分类浏览：<br />
            <div class="brandCategoryA">
                          <a href="brand.php?id=2" class="f6">所有分类 </a>
                          <a href="brand.php?id=2&amp;cat=2" class="f6">荷兰牛栏 (6)</a>
                          </div>  
         </td>
        </tr>
      </table>
      </div>
     </div>
    </div>
    <div class="blank5"></div>
  
   
  <div class="box">
 <div class="box_1">
  <h3>
  <span>商品列表</span>
  <form method="GET" class="sort" name="listform">
  显示方式：
  <a href="javascript:;" onClick="javascript:display_mode('list')"><img src="themes/ecmoban_xiaomi/images/display_mode_list.gif" alt=""></a>
  <a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="themes/ecmoban_xiaomi/images/display_mode_grid_act.gif" alt=""></a>
  <a href="javascript:;" onClick="javascript:display_mode('text')"><img src="themes/ecmoban_xiaomi/images/display_mode_text.gif" alt=""></a>&nbsp;&nbsp;
     
  <a href="category.php?category=0&display=grid&brand=2&price_min=&price_max=&filter_attr=&page=1&sort=goods_id&order=ASC#goods_list"><img src="themes/ecmoban_xiaomi/images/goods_id_DESC.gif" alt="按上架时间排序"></a>
  <a href="category.php?category=0&display=grid&brand=2&price_min=&price_max=&filter_attr=&page=1&sort=shop_price&order=ASC#goods_list"><img src="themes/ecmoban_xiaomi/images/shop_price_default.gif" alt="按价格排序"></a>
  <a href="category.php?category=0&display=grid&brand=2&price_min=&price_max=&filter_attr=&page=1&sort=last_update&order=DESC#goods_list"><img src="themes/ecmoban_xiaomi/images/last_update_default.gif" alt="按更新时间排序"></a>
  <input type="hidden" name="category" value="0" />
  <input type="hidden" name="display" value="grid" id="display" />
  <input type="hidden" name="brand" value="2" />
  <input type="hidden" name="price_min" value="" />
  <input type="hidden" name="price_max" value="" />
  <input type="hidden" name="filter_attr" value="" />
  <input type="hidden" name="page" value="1" />
  <input type="hidden" name="sort" value="goods_id" />
  <input type="hidden" name="order" value="DESC" />
    </form>
  </h3>
            <div class="clearfix goodsBox" style="border:none; padding:11px 0 10px 5px;">
             <div class="goodsItem_1">
           <a href="goods.php?id=14"><img src="images/no_picture.gif" alt="牛栏4段-香草..." class="goodsimg_1" /></a><br />
           <p><a href="goods.php?id=14" title="">牛栏4段-香草...</a></p>
                                  <font class="f1">￥180元</font><br />
                        <a href="javascript:addToCart(14)" ><img src="themes/ecmoban_xiaomi/images/goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:collect(14);"><img src="themes/ecmoban_xiaomi/images/shoucang.gif"></a>
        </div>
                 <div class="goodsItem_1">
           <a href="goods.php?id=13"><img src="images/no_picture.gif" alt="牛栏5段" class="goodsimg_1" /></a><br />
           <p><a href="goods.php?id=13" title="">牛栏5段</a></p>
                                  <font class="f1">￥215元</font><br />
                        <a href="javascript:addToCart(13)" ><img src="themes/ecmoban_xiaomi/images/goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:collect(13);"><img src="themes/ecmoban_xiaomi/images/shoucang.gif"></a>
        </div>
                 <div class="goodsItem_1">
           <a href="goods.php?id=12"><img src="images/no_picture.gif" alt="牛栏4段" class="goodsimg_1" /></a><br />
           <p><a href="goods.php?id=12" title="">牛栏4段</a></p>
                                  <font class="f1">￥215元</font><br />
                        <a href="javascript:addToCart(12)" ><img src="themes/ecmoban_xiaomi/images/goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:collect(12);"><img src="themes/ecmoban_xiaomi/images/shoucang.gif"></a>
        </div>
                 <div class="goodsItem_1">
           <a href="goods.php?id=11"><img src="images/no_picture.gif" alt="牛栏3段" class="goodsimg_1" /></a><br />
           <p><a href="goods.php?id=11" title="">牛栏3段</a></p>
                                  <font class="f1">￥220元</font><br />
                        <a href="javascript:addToCart(11)" ><img src="themes/ecmoban_xiaomi/images/goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:collect(11);"><img src="themes/ecmoban_xiaomi/images/shoucang.gif"></a>
        </div>
                 <div class="goodsItem_1">
           <a href="goods.php?id=10"><img src="images/no_picture.gif" alt="牛栏2段" class="goodsimg_1" /></a><br />
           <p><a href="goods.php?id=10" title="">牛栏2段</a></p>
                                  <font class="f1">￥220元</font><br />
                        <a href="javascript:addToCart(10)" ><img src="themes/ecmoban_xiaomi/images/goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:collect(10);"><img src="themes/ecmoban_xiaomi/images/shoucang.gif"></a>
        </div>
                 <div class="goodsItem_1">
           <a href="goods.php?id=9"><img src="images/no_picture.gif" alt="牛栏1段" class="goodsimg_1" /></a><br />
           <p><a href="goods.php?id=9" title="">牛栏1段</a></p>
                                  <font class="f1">￥220元</font><br />
                        <a href="javascript:addToCart(9)" ><img src="themes/ecmoban_xiaomi/images/goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:collect(9);"><img src="themes/ecmoban_xiaomi/images/shoucang.gif"></a>
        </div>
            </div>
      
 </div>
</div>
<div class="blank5"></div>
<script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script>
<script type="text/javascript">
window.onload = function()
{
  Compare.init();
  fixpng();
}
var button_compare = '';
var exist = "您已经选择了%s";
var count_limit = "最多只能选择4个商品进行对比";
var goods_type_different = "\"%s\"和已选择商品类型不同无法进行对比";
var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
</script>  
<form name="selectPageForm" action="/brand.php" method="get">
 <div id="pager" class="pagebar">
  <span class="f_l " style="margin-right:10px;">总计 <b>6</b>  个记录</span>
      
      </div>
</form>
<script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script>
  </div>  
  
</div>
<div class="block">
  <div class="blank"></div>
  <div class="blank"></div>
  <div class="blank"></div>
  <div class="blank"></div>
  
    
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
	   	  </p>
    </div>
	<!---<div style="margin:0 auto; width:200px; margin-top:34px;" title="小米为发烧而生"><img  src="themes/ecmoban_xiaomi/images/footer_img.gif" /></div> --->
	     
	   
 
    
  </div>
 
</body>
</html>
