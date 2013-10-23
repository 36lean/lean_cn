<div class="row-fluid">
<div class="span3">
	<div class="well">
	<h5>创建采集规则(参照jQuery选择器)</h5>

	<form action="" method="post">
		<div class="controls">
			<h5>规则名 <small>例如 2013_09_09_csdn_net_001</small></h5>
			<input name="rule_name" type="text" />
		</div>

		<div class="controls">
			<label>标题部分selector代码</label>
			<input name="post_title" type="text" />
		</div>

		<div class="controls">
			<label>日期部分selector代码</label>
			<input name="post_date" type="text" />
		</div>

		<div class="controls">
			<label>作者部分selector代码</label>
			<input name="post_author" type="text" />
		</div>
		
		<div class="controls">
			<label>摘要部分selector代码</label>
			<input name="post_summary" type="text" />
		</div>

		<div class="controls">
			<label>正文部分selector代码</label>
			<input name="post_content" type="text" />
		</div>

		<div class="controls">
			<button class="btn btn-primary" name="post_rule" value="1">创建规则</button>
		</div>		

	</form>
	</div>
</div>

<div class="span3">
	<div class="well">
	<h5>创建来源列表(参照jQuery选择器)</h5>

	<form action="" method="post">
		<div class="controls">
			<h5>来源名称 <small>例如 source_csdn_net_01</small></h5>
			<input name="source_name" type="text" />
		</div>
		
		<div class="controls">
			<label>列表链接selector代码</label>
			<input name="list" type="text" />
		</div>

		<div class="controls">
			<h5>页面地址 <small>多个链接 用 <> 隔开</small></h5>
			<textarea name="page_url" rows="5" placeholder="例如 : http://baidu.com<>http://360.com<>http://weibo.com"></textarea>
		</div>
		
		<div class="controls">
			<h5>选择采集规则</h5>
				<select name="rule_name">
					<?php foreach ($rules as $rule) { ?>
					<option value="<?php echo $rule;?>"><?php echo $rule;?></option>
					<?php }?>
				</select>
		</div>

		<div class="controls">
			<button class="btn btn-primary" name="post_source" value="1">创建来源</button>
		</div>

	</form>
	</div>
</div>

<div class="span3">
	<div class="well">
	<h5>生成采集数据</h5>
		<ul>
		<?php foreach ($sources as $source) : ?>
			<li><?php echo $source;?> <a href="<?php echo site_url('portal/spider_generate/'.$source);?>">生成数据</a></li>
		<?php endforeach ?>
		</ul>


	</div>
</div>

<div class="span3">
	<div class="well">
	<h5>全文过滤工具</h5>

	<form accept="" method="post">

		<div class="controls">
			<label>选择过滤的字段</label>
			<select name="column">

				<option value="post_titlelink">post_titlelink</option>
				<option value="post_author">post_author</option>
				<option value="post_summary">post_summary</option>
				<option value="post_content">post_content</option>
				<option value="post_title">post_title</option>
				<option value="post_meta">post_meta</option>


			</select>
		</div>

		<div class="controls">
			<label>关键字正则</label>
			<input name="preg" type="text" />
		</div>	

		<div class="controls">
			<label>替换为</label>
			<input name="replace" type="text" />
		</div>

		<div class="controls">
			<label></label>
			<button class="btn btn-primary" name="test" value="1">测试</button>
		</div>

	</form>

	</div>
</div>

</div>


<div class="row-fluid">

	<div class="span6">
		<div class="page-header"><h5>采集来源列表</h5></div>
		<ul>
		<?php foreach ($sources as $source) : ?>
			<li><?php echo $source;?> <a href="<?php echo site_url('portal/spider_test/'.$source);?>">测试</a></li>
		<?php endforeach ?>
		</ul>
	</div>

	<div class="span6">
		<div class="page-header"><h5>采集结果列表</h5></div>

		<ul class="nav">
		<?php foreach ($portals as $portal) : ?>
			<li><a href="<?php echo site_url('portal/view/'.$portal['id']);?>"><?php echo $portal['post_title'];?></a></li>
		<?php endforeach ?>
		</ul>
	</div>

</div>