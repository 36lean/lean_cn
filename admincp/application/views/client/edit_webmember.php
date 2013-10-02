<div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
    	<li class="active"><a href="#tab1" data-toggle="tab">基本资料</a></li>
    	<li><a href="#tab2" data-toggle="tab">会员信息</a></li>
    	<li><a href="#tab3" data-toggle="tab">联系方式</a></li>
    	<li><a href="#tab4" data-toggle="tab">教育情况</a></li>
    	<li><a href="#tab5" data-toggle="tab">工作情况</a></li>
    	<li><a href="#tab6" data-toggle="tab">个人信息</a></li>
    </ul>
    
    <div class="tab-content">
    	<div class="tab-pane active" id="tab1">

	<form class="form-horizontal" name="" action="" method="post">
		<inpu type="hidden" name="967" value="<?php echo $profile['uid'];?>">
<table class="table" id="profilelist">
	<tr>
		<th>
			用户名
		</th>
		<td>
			<strong><?php echo $profile['username'];?></strong>
		</td>

	</tr>
	<tr id="tr_realname">
		<th id="th_realname">
			真实姓名
		</th>
		<td id="td_realname">
			<input type="text" name="realname" id="realname" value="<?php echo $profile['realname'];?>" tabindex="1"/>
		</td>

	</tr>
	<tr id="tr_birthday">
		<th id="th_birthday">
			生日
		</th>
		<td id="td_birthday">
			<select name="birthyear" id="birthyear" onchange="showbirthday();"
			tabindex="1">
				<option value="">
					年
				</option>
				<?php for( $i = 1914 ; $i <= date('Y') ; $i++){?>
				<option value="<?php echo $i;?>">
					<?php echo $i;?>
				</option>
				<?php }?>

			</select>
			&nbsp;&nbsp;
			<select name="birthmonth" id="birthmonth" class="input-medium" onchange="showbirthday();"
			tabindex="1">
				<option value="">
					月
				</option>
				<?php for( $i = 1 ; $i <= 12 ; $i++){?>
				<option value="<?php echo $i;?>">
					<?php echo $i;?>
				</option>
				<?php }?>
			</select>
			&nbsp;&nbsp;
			<select name="birthday" id="birthday" class="input-medium" tabindex="1">
				<option value="">
					日
				</option>
				<?php for( $i = 1 ; $i <= 31 ; $i++){?>
				<option value="<?php echo $i;?>">
					<?php echo $i;?>
				</option>
				<?php }?>
			</select>
			<div class="rq mtn" id="showerror_birthday">
			</div>
			<p class="d">
			</p>
		</td>

	</tr>
	<tr id="tr_birthcity">
		<th id="th_birthcity">
			出生地
		</th>
		<td id="td_birthcity">
			<p id="birthdistrictbox">
				<select name="birthprovince" id="birthprovince" class="input-medium" tabindex="1">
					<option value="">
						-省份-
					</option>
					<option did="1" value="北京市">
						北京市
					</option>
					<option did="2" value="天津市">
						天津市
					</option>
					<option did="3" value="河北省">
						河北省
					</option>
					<option did="4" value="山西省">
						山西省
					</option>
					<option did="5" value="内蒙古自治区">
						内蒙古自治区
					</option>
					<option did="6" value="辽宁省">
						辽宁省
					</option>
					<option did="7" value="吉林省">
						吉林省
					</option>
					<option did="8" value="黑龙江省">
						黑龙江省
					</option>
					<option did="9" value="上海市">
						上海市
					</option>
					<option did="10" value="江苏省">
						江苏省
					</option>
					<option did="11" value="浙江省">
						浙江省
					</option>
					<option did="12" value="安徽省">
						安徽省
					</option>
					<option did="13" value="福建省">
						福建省
					</option>
					<option did="14" value="江西省">
						江西省
					</option>
					<option did="15" value="山东省">
						山东省
					</option>
					<option did="16" value="河南省">
						河南省
					</option>
					<option did="17" value="湖北省">
						湖北省
					</option>
					<option did="18" value="湖南省">
						湖南省
					</option>
					<option did="19" value="广东省">
						广东省
					</option>
					<option did="20" value="广西壮族自治区">
						广西壮族自治区
					</option>
					<option did="21" value="海南省">
						海南省
					</option>
					<option did="22" value="重庆市">
						重庆市
					</option>
					<option did="23" value="四川省">
						四川省
					</option>
					<option did="24" value="贵州省">
						贵州省
					</option>
					<option did="25" value="云南省">
						云南省
					</option>
					<option did="26" value="西藏自治区">
						西藏自治区
					</option>
					<option did="27" value="陕西省">
						陕西省
					</option>
					<option did="28" value="甘肃省">
						甘肃省
					</option>
					<option did="29" value="青海省">
						青海省
					</option>
					<option did="30" value="宁夏回族自治区">
						宁夏回族自治区
					</option>
					<option did="31" value="新疆维吾尔自治区">
						新疆维吾尔自治区
					</option>
					<option did="32" value="台湾省">
						台湾省
					</option>
					<option did="33" value="香港特别行政区">
						香港特别行政区
					</option>
					<option did="34" value="澳门特别行政区">
						澳门特别行政区
					</option>
					<option did="35" value="海外">
						海外
					</option>
					<option did="36" value="其他">
						其他
					</option>
					<option did="45052" value="钓鱼岛">
						钓鱼岛
					</option>
				</select>
				&nbsp;&nbsp;
			</p>
			<div class="rq mtn" id="showerror_birthcity">
			</div>
			<p class="d">
			</p>
		</td>

	</tr>
	<tr id="tr_residecity">
		<th id="th_residecity">
			居住地
		</th>
		<td id="td_residecity">
			<p id="residedistrictbox">
				<select name="resideprovince" id="resideprovince" class="input-medium" onchange="showdistrict('residedistrictbox', ['resideprovince', 'residecity', 'residedist', 'residecommunity'], 1, 1, 'reside')"
				tabindex="1">
					<option value="">
						-省份-
					</option>
					<option did="1" value="北京市">
						北京市
					</option>
					<option did="2" value="天津市">
						天津市
					</option>
					<option did="3" value="河北省">
						河北省
					</option>
					<option did="4" value="山西省">
						山西省
					</option>
					<option did="5" value="内蒙古自治区">
						内蒙古自治区
					</option>
					<option did="6" value="辽宁省">
						辽宁省
					</option>
					<option did="7" value="吉林省">
						吉林省
					</option>
					<option did="8" value="黑龙江省">
						黑龙江省
					</option>
					<option did="9" value="上海市">
						上海市
					</option>
					<option did="10" value="江苏省">
						江苏省
					</option>
					<option did="11" value="浙江省">
						浙江省
					</option>
					<option did="12" value="安徽省">
						安徽省
					</option>
					<option did="13" value="福建省">
						福建省
					</option>
					<option did="14" value="江西省">
						江西省
					</option>
					<option did="15" value="山东省">
						山东省
					</option>
					<option did="16" value="河南省">
						河南省
					</option>
					<option did="17" value="湖北省">
						湖北省
					</option>
					<option did="18" value="湖南省">
						湖南省
					</option>
					<option did="19" value="广东省">
						广东省
					</option>
					<option did="20" value="广西壮族自治区">
						广西壮族自治区
					</option>
					<option did="21" value="海南省">
						海南省
					</option>
					<option did="22" value="重庆市">
						重庆市
					</option>
					<option did="23" value="四川省">
						四川省
					</option>
					<option did="24" value="贵州省">
						贵州省
					</option>
					<option did="25" value="云南省">
						云南省
					</option>
					<option did="26" value="西藏自治区">
						西藏自治区
					</option>
					<option did="27" value="陕西省">
						陕西省
					</option>
					<option did="28" value="甘肃省">
						甘肃省
					</option>
					<option did="29" value="青海省">
						青海省
					</option>
					<option did="30" value="宁夏回族自治区">
						宁夏回族自治区
					</option>
					<option did="31" value="新疆维吾尔自治区">
						新疆维吾尔自治区
					</option>
					<option did="32" value="台湾省">
						台湾省
					</option>
					<option did="33" value="香港特别行政区">
						香港特别行政区
					</option>
					<option did="34" value="澳门特别行政区">
						澳门特别行政区
					</option>
					<option did="35" value="海外">
						海外
					</option>
					<option did="36" value="其他">
						其他
					</option>
				</select>
				&nbsp;&nbsp;
			</p>
			<div class="rq mtn" id="showerror_residecity">
			</div>
			<p class="d">
			</p>
		</td>

	</tr>
	<tr id="tr_bloodtype">
		<th id="th_bloodtype">
			血型
		</th>
		<td id="td_bloodtype">
			<select name="bloodtype" id="bloodtype" class="input-medium" tabindex="1">
				<option value="A">
					A
				</option>
				<option value="B">
					B
				</option>
				<option value="AB">
					AB
				</option>
				<option value="O">
					O
				</option>
				<option value="其它">
					其它
				</option>
			</select>
			<div class="rq mtn" id="showerror_bloodtype">
			</div>
			<p class="d">
			</p>
		</td>

	</tr>
	<tr id="tr_gender">
		<th id="th_gender">
			性别
		</th>
		<td id="td_gender">
			<select name="gender" id="gender" class="input-medium" tabindex="1">
				<option value="0" <?php if( $profile['gender'] == 0) {?>selected="selected"<?php }?>>
					保密
				</option>
				<option value="1" <?php if( $profile['gender'] == 1) {?>selected="selected"<?php }?>>
					男
				</option>
				<option value="2" <?php if( $profile['gender'] == 2) {?>selected="selected"<?php }?>>
					女
				</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>
			&nbsp;
		</th>
		<td colspan="2">
			<button type="submit" name="save" id="profilesubmitbtn" value="true"
			class="btn btn-primary" />
			<strong>
				保存
			</strong>
			</button>
		</td>
	</tr>
</table>
	</form>

    	</div>
    
    	<div class="tab-pane" id="tab2">

    		<table class="table table-bordered table-striped">
    			<tr>
    				<td>开通日期</td> <td><?php echo $profile['jointime'] ? date( 'Y年m月d   h : i' , $profile['jointime'] ) : '' ;?></td>
    			</tr>
    			<tr>
    				<td>到期日期</td> <td><?php echo $profile['exptime'] ? date( 'Y年m月d   h : i' , $profile['exptime'] ) : '' ;;?></td>
    			</tr>
    			<tr>
    				<td>是否年费会员</td> <td><?php echo $profile['year_pay'] ? 'true' : 'false';?></td>
    			</tr>
    			<tr>
    				<td>会员等级</td> <td><?php echo $profile['level'];?></td>
    			</tr>
    			<tr>
    				<td>czz</td> <td><?php echo $profile['czz'];?></td>
    			</tr>
    		</table>
    	</div>

    	<div class="tab-pane" id="tab3">

<table class="table" id="profilelist">
	<tr>
		<th>
			用户名
		</th>
		<td>
			<?php echo $profile['username'];?>
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr id="tr_telephone">
		<th id="th_telephone">
			固定电话
		</th>
		<td id="td_telephone">
			<input type="text" name="telephone" id="telephone" class="px" value="" tabindex="1" />
		</td>

	</tr>
	<tr id="tr_qq">
		<th id="th_qq">
			QQ
		</th>
		<td id="td_qq">
			<input type="text" name="qq" id="qq" class="px" value="" tabindex="1" />
		</td>

	</tr>
	<tr id="tr_msn">
		<th id="th_msn">
			MSN
		</th>
		<td id="td_msn">
			<input type="text" name="msn" id="msn" class="px" value="" tabindex="1" />
		</td>
	</tr>
	<tr id="tr_mobile">
		<th id="th_mobile">
			手机
		</th>
		<td id="td_mobile">
			<input type="text" name="mobile" id="mobile" class="px" value="13247162352" tabindex="1" />
		</td>
	</tr>
	<tr id="tr_field1">
		<th id="th_field1">
			联系方式
		</th>
		<td id="td_field1">
			<input type="text" name="field1" id="field1" class="px" value="" tabindex="1" />
		</td>
	</tr>
	<tr>
		<th id="th_sightml">
			Email
		</th>
		<td id="td_sightml">
			seekmas@msn.cn
		</td>

	</tr>
	<tr>
		<th>
			&nbsp;
		</th>
		<td colspan="2">
			<input type="hidden" name="profilesubmit" value="true" />
			<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true"
			class="btn btn-primary" />
			<strong>
				保存
			</strong>
			</button>

		</td>
	</tr>
</table>
    	</div>

    	<div class="tab-pane" id="tab4">
<table class="table" id="profilelist">
	<tr>
		<th>
			用户名
		</th>
		<td>
			seekmas
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr id="tr_graduateschool">
		<th id="th_graduateschool">
			毕业学校
		</th>
		<td id="td_graduateschool">
			<input type="text" name="graduateschool" id="graduateschool" class="px" value="" tabindex="1" />
		</td>

	</tr>
	<tr id="tr_education">
		<th id="th_education">
			学历
		</th>
		<td id="td_education">
			<select name="education" id="education" class="ps" tabindex="1">
				<option value="博士">
					博士
				</option>
				<option value="硕士">
					硕士
				</option>
				<option value="本科">
					本科
				</option>
				<option value="专科">
					专科
				</option>
				<option value="中学">
					中学
				</option>
				<option value="小学">
					小学
				</option>
				<option value="其它">
					其它
				</option>
			</select>

		</td>

	</tr>
	<tr>
		<th>
			&nbsp;
		</th>
		<td colspan="2">
			<input type="hidden" name="profilesubmit" value="true" />
			<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true"
			class="pn pnc" />
			<strong>
				保存
			</strong>
			</button>

		</td>
	</tr>
</table>
    	</div>

    	<div class="tab-pane" id="tab5">
<table class="table" id="profilelist">
	<tr>
		<th>
			用户名
		</th>
		<td>
			seekmas
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr id="tr_position">
		<th id="th_position">
			<span class="rq" title="必填">
				*
			</span>
			职位
		</th>
		<td id="td_position">
			<input type="text" name="position" id="position" class="px" value="无"
			tabindex="1" />
		</td>
	</tr>
	<tr id="tr_company">
		<th id="th_company">
			<span class="rq" title="必填">
				*
			</span>
			公司
		</th>
		<td id="td_company">
			<input type="text" name="company" id="company" class="px" value="无" tabindex="1"
			/>
		</td>
	</tr>
	<tr id="tr_occupation">
		<th id="th_occupation">
			职业
		</th>
		<td id="td_occupation">
			<input type="text" name="occupation" id="occupation" class="px" value=""
			tabindex="1" />
		</td>
	</tr>
	<tr>
		<th>
			&nbsp;
		</th>
		<td colspan="2">
			<input type="hidden" name="profilesubmit" value="true" />
			<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true"
			class="pn pnc" />
			<strong>
				保存
			</strong>
			</button>
		</td>
	</tr>
</table>
    	</div>

    	<div class="tab-pane" id="tab6">
<table class="table" id="profilelist">
	<tr>
		<th>
			用户名
		</th>
		<td>
			seekmas
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr id="tr_idcardtype">
		<th id="th_idcardtype">
			证件类型
		</th>
		<td id="td_idcardtype">
			<select name="idcardtype" id="idcardtype" class="ps" tabindex="1">
				<option value="身份证">
					身份证
				</option>
				<option value="护照">
					护照
				</option>
				<option value="驾驶证">
					驾驶证
				</option>
			</select>

		</td>

	</tr>
	<tr id="tr_idcard">
		<th id="th_idcard">
			证件号
		</th>
		<td id="td_idcard">
			<input type="text" name="idcard" id="idcard" class="px" value="" tabindex="1" />

		</td>

	</tr>
	<tr id="tr_address">
		<th id="th_address">
			邮寄地址
		</th>
		<td id="td_address">
			<input type="text" name="address" id="address" class="px" value="" tabindex="1" />

		</td>

	</tr>
	<tr id="tr_zipcode">
		<th id="th_zipcode">
			邮编
		</th>
		<td id="td_zipcode">
			<input type="text" name="zipcode" id="zipcode" class="px" value="" tabindex="1" />
		</td>

	</tr>
	<tr id="tr_site">
		<th id="th_site">
			个人主页
		</th>
		<td id="td_site">
			<input type="text" name="site" id="site" class="px" value="" tabindex="1"/>

		</td>

	</tr>
	<tr id="tr_bio">
		<th id="th_bio">
			自我介绍
		</th>
		<td id="td_bio">
			<textarea name="bio" id="bio" class="pt" rows="2" cols="40" tabindex="1">
			</textarea>

		</td>

	</tr>
	<tr id="tr_interest">
		<th id="th_interest">
			兴趣爱好
		</th>
		<td id="td_interest">
			<textarea name="interest" id="interest" class="pt" rows="3" cols="40"
			tabindex="1">
			</textarea>

		</td>

	</tr>
	<tr>
		<th id="th_customstatus">
			自定义头衔
		</th>
		<td id="td_customstatus">
			<input type="text" value="" name="customstatus" id="customstatus" class="px" />
		</td>
	</tr>
	<tr>
		<th id="th_timeoffset">
			时区
		</th>
		<td id="td_timeoffset">
			<select name="timeoffset">
				<option value="9999" selected="selected">
					使用系统默认
				</option>
				<option value="-12">
					(GMT -12:00) 埃尼威托克岛, 夸贾林环礁
				</option>
				<option value="-11">
					(GMT -11:00) 中途岛, 萨摩亚群岛
				</option>
				<option value="-10">
					(GMT -10:00) 夏威夷
				</option>
				<option value="-9">
					(GMT -09:00) 阿拉斯加
				</option>
				<option value="-8">
					(GMT -08:00) 太平洋时间(美国和加拿大), 提华纳
				</option>
				<option value="-7">
					(GMT -07:00) 山区时间(美国和加拿大), 亚利桑那
				</option>
				<option value="-6">
					(GMT -06:00) 中部时间(美国和加拿大), 墨西哥城
				</option>
				<option value="-5">
					(GMT -05:00) 东部时间(美国和加拿大), 波哥大, 利马, 基多
				</option>
				<option value="-4">
					(GMT -04:00) 大西洋时间(加拿大), 加拉加斯, 拉巴斯
				</option>
				<option value="-3.5">
					(GMT -03:30) 纽芬兰
				</option>
				<option value="-3">
					(GMT -03:00) 巴西利亚, 布宜诺斯艾利斯, 乔治敦, 福克兰群岛
				</option>
				<option value="-2">
					(GMT -02:00) 中大西洋, 阿森松群岛, 圣赫勒拿岛
				</option>
				<option value="-1">
					(GMT -01:00) 亚速群岛, 佛得角群岛 [格林尼治标准时间] 都柏林, 伦敦, 里斯本, 卡萨布兰卡
				</option>
				<option value="0">
					(GMT) 卡萨布兰卡，都柏林，爱丁堡，伦敦，里斯本，蒙罗维亚
				</option>
				<option value="1">
					(GMT +01:00) 柏林, 布鲁塞尔, 哥本哈根, 马德里, 巴黎, 罗马
				</option>
				<option value="2">
					(GMT +02:00) 赫尔辛基, 加里宁格勒, 南非, 华沙
				</option>
				<option value="3">
					(GMT +03:00) 巴格达, 利雅得, 莫斯科, 奈洛比
				</option>
				<option value="3.5">
					(GMT +03:30) 德黑兰
				</option>
				<option value="4">
					(GMT +04:00) 阿布扎比, 巴库, 马斯喀特, 特比利斯
				</option>
				<option value="4.5">
					(GMT +04:30) 坎布尔
				</option>
				<option value="5">
					(GMT +05:00) 叶卡特琳堡, 伊斯兰堡, 卡拉奇, 塔什干
				</option>
				<option value="5.5">
					(GMT +05:30) 孟买, 加尔各答, 马德拉斯, 新德里
				</option>
				<option value="5.75">
					(GMT +05:45) 加德满都
				</option>
				<option value="6">
					(GMT +06:00) 阿拉木图, 科伦坡, 达卡, 新西伯利亚
				</option>
				<option value="6.5">
					(GMT +06:30) 仰光
				</option>
				<option value="7">
					(GMT +07:00) 曼谷, 河内, 雅加达
				</option>
				<option value="8">
					(GMT +08:00) 北京, 香港, 帕斯, 新加坡, 台北
				</option>
				<option value="9">
					(GMT +09:00) 大阪, 札幌, 首尔, 东京, 雅库茨克
				</option>
				<option value="9.5">
					(GMT +09:30) 阿德莱德, 达尔文
				</option>
				<option value="10">
					(GMT +10:00) 堪培拉, 关岛, 墨尔本, 悉尼, 海参崴
				</option>
				<option value="11">
					(GMT +11:00) 马加丹, 新喀里多尼亚, 所罗门群岛
				</option>
				<option value="12">
					(GMT +12:00) 奥克兰, 惠灵顿, 斐济, 马绍尔群岛
				</option>
			</select>
			<p class="mtn">
				当前时间 : 2013-9-30 16:59
			</p>
			<p class="d">
				如果发现当前显示的时间与您本地时间相差几个小时，那么您需要更改自己的时区设置
			</p>
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th>
			&nbsp;
		</th>
		<td colspan="2">
			<input type="hidden" name="profilesubmit" value="true" />
			<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true"
			class="pn pnc" />
			<strong>
				保存
			</strong>
			</button>
			<span id="submit_result" class="rq">
			</span>
		</td>
	</tr>
</table>
    	</div>
    </div>

</div>









<pre>
<?php
print_r( $profile);
?>
</pre>