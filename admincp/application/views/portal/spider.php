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

<div class="span4">
	<div class="well">
	<h5>生成采集数据</h5>

	<form action="" method="post">
		<div class="controls">
			<h5>来源名称</h5>
				<select class="input-xlarge">
					<?php foreach ($sources as $source) { ?>
					<option value="<?php echo $source;?>"><?php echo $source;?></option>
					<?php }?>
				</select>
		</div>

		<div class="controls">
			<button class="btn btn-primary" name="post_rule" value="1">生成数据</button>
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