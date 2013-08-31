<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: acountinfo.php 18582 2010-07-17 11:12:11Z 呀呀个呸 $
 */

define('IN_DISCUZ', TRUE);

$smsapi = "api.chanyoo.cn";
$charset = "utf8";
$username = $_GET['username'];
$password = $_GET['password'];

$url = "http://".$smsapi."/".$charset."/interface/user_info.aspx?username=".urlencode($username)."&password=".urlencode($password)."";

require_once('smstong.func.php');

$ret = httprequest($url);

$xml = simplexml_load_string($ret);

$uid = intval($xml->result);

if ($uid > 0)
{
	$result = $xml->result;
	$user_balance = $xml->user_balance;
	$user_amount = $xml->user_amount;
	$sms_left = $xml->sms_left;
	$sms_send = $xml->sms_send;
	$sms_receive = $xml->sms_receive;
	$expired_date = $xml->expired_date;
	$user_point = $xml->user_point;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Copyright" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>帐号信息</title>
<style>
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {margin: 0;padding: 0;border: 0;outline: 0;font-size: 100%;background: transparent;}
ol, ul {list-style: none;}
body{ background:#FFF; margin:0 20px;}
body,table,td{ font-size:12px; color:#666;}
table{ border-collapse:collapse; border-spacing: 0;}
td{ border-top:1px dotted #DEEFFB; padding:5px; font-size:14px}
.title{color:#0099CC; font-weight:700; height:25px; text-align:left; padding:5px; background:#e5f1fb}
a{ color:#f8505c; text-decoration:none;}
.btn{ padding:5px; display:block; width:200px; background:#e5f1fb; text-align:center; height:20px; line-height:20px; text-decoration:none; color:#666; border: 1px solid #c7e1f6; margin-left:80px; font-size:14px; cursor:pointer;}
</style>
</head>
<body>

<?php
if($uid > 0){
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="2" class="title">帐号信息</th>
  </tr>
  <tr>
    <td width="13%" align="right"><strong>当前帐号：</strong></td>
    <td width="87%"><?php echo $_GET['username'] ?></td>
  </tr>
  <tr>
    <td align="right"><strong>剩余条数：</strong></td>
    <td><?php echo $sms_left ?> 条</td>
  </tr>
  <tr>
    <td width="13%" align="right"><strong>已发条数：</strong></td>
    <td width="87%"><?php echo $sms_send ?> 条</td>
  </tr>
  <tr>
    <td width="13%" align="right"><strong>帐号积分：</strong></td>
    <td width="87%"><?php echo $user_point ?> <span class="result"><a href="http://bbs.chanyoo.cn/plugin.php?id=auction" target="_blank" title="开源软件增值服务平台充值消费1元对应1积分，例如某用户充值消费10元对应积10分，充值消费12.30元对应积12分，充值消费12.80元对应积12分，不足1元的不计积分，累积充值消费积分可以到积分商城兑换奖品，不能跟其它优惠活动同时叠加，欢迎大家踊跃充值消费积分兑换奖品！">点击此处积分兑换奖品</a></span></td>
  </tr>
  <tr>
    <td align="right"><strong>联系方式：</strong></td>
    <td>如有任何问题请联系QQ：320266361，320266362，320266363，320266364，320266365 工作时间：周一至周五9：00~18：00，周六周日节假日休息。
	</td>
  </tr>

   <tr>
    <td align="right"><strong>奖励短信：</strong></td>
    <td>安装插件注册平台帐号免费赠送10条测试短信，页面右上角分享到腾讯微博，QQ空间，朋友网，新浪微博各得10条短信，评五星赠送10条一共50条短信，安装插件开启评五星并分享后联系我们核实发放短信。
	</td>
  </tr>

  <tr>
    <td align="right"><strong>内容保证：</strong></td>
    <td>新注册用户都是审核通道，可供测试使用速度可能稍慢，系统是没有问题的。如需正式使用调整到快速应用类通道请登录系统到帐号信息页面下载<a href="http://s1.chanyoo.cn/guarantee.doc" target="_blank">信息内容保证书</a>，下载此信息内容保证书打印出用笔填写后签字盖章（网站备案是单位性质的单位负责人签字[正楷清晰可认]并盖公章[合同专用章无效]，网站备案性质是个人的签字[正楷清晰可认]并按手印，同时附带签字人身份证正反复印件上面写“与原件一致，仅用于内容保证”），然后发电子扫描件给我们！多个网站使用的打印多份填写，我们存档备案即可调整到快速应用类通道一般是5到10秒即收。
	</td>
  </tr>

  <tr>
    <td align="right"><strong>免责声明：</strong></td>
    <td>凡使用本插件发送的各种骚扰，诈骗，恐吓，色情等违法短信均与本插件开发方无关，使用者须对发送的短信内容承担全部法律责任。如果发现违反以上规定的，冻结开源软件增值服务平台帐号并没收帐号余额，情节严重的短信记录存档并报送相关执法部门依法处理。
	</td>
  </tr>

  <tr>
    <td align="right"><strong><br />购买短信：</strong></td>
    <td><span class="result"><br /><a href="http://www.chanyoo.cn/mod_static-view-sc_id-1111115.html" target="_blank" title="通过在线充值的方式购买短信条数：在新打开的页面中选择您要充值的短信条数，根据提示完成在线支付操作，之后刷新本帐号信息页面剩余条数就会加上您充值购买的短信条数，目前支持支付宝，财付通，以及各个常用的网银在线充值。">点击此处在线购买短信</a></span></td>
  </tr>

  <tr>
    <td align="right"><strong><br />免费短信：</strong></td>
    <td><span class="result"><br /><a href="http://app.offer99.com/?pid=z3f0c289df9b385b90383dbdefdbe461&userid=<?php echo $uid ?>&order=time_delay&asc_desc=asc" target="_blank" title="通过完成广告任务获取免费短信条数：请先登录开源软件增值服务平台到短信管理-短信提醒里面设置自己的真实手机号，然后在新打开的页面选择即时认证的广告，按照提示完成广告，当广告商审核通过后会给你的帐号加短信并发送提醒到您设置的手机号上。">点击此处获取免费短信</a></span></td>
  </tr>
  
</table>

<?php } else { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="2" class="title">帐号信息</th>
  </tr>
  <tr>
    <td width="13%" align="right"><strong>当前帐号：</strong></td>
    <td width="87%"><?php echo $_GET['username'] ?></td>
  </tr>
  <tr>
    <td width="13%" align="right"><strong>返回信息：</strong></td>
    <td width="87%"><?php echo $xml->message ?></td>
  </tr>
</table>

<?php } ?>

</body>
</html>
