<div class="row-fluid">
	<div class="page-header" data-original-title>
		<h4>
			<i class="icon-list">
			</i>
			邮件模板列表
		</h4>
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th class="span4">
						邮件模板名
					</th>
					<th class="span2">
						创建日期
					</th>
					<th class="span2">
						是否跟踪
					</th>
					<th class="span2">
						Status
					</th>
					<th class="span2">
						Actions
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $template) { ?>
					<tr>
						<td>
							<?php echo $template[ 'mail_title']?>
						</td>
						<td class="center">
							<?php echo date( 'Y/m/d' , $template[ 'created_date'])?>
						</td>
						<td class="center">
							<?php echo $template[ 'mail_spy'] ? '<span class="label label-success">On</span>' : '<span class="label">Off</span>'?>
						</td>
						<td class="center">
							
								<?php echo $template[ 'mail_spy'] ? '<span class="label label-success">Using</span>' : '<span class="label">Disabled</span>'?>
							
						</td>
						<td class="center">
							<a class="btn btn-success btn-mini" href="<?php echo base_url();?>index.php/mailer/template_view/<?php echo $template['id'];?>">
								<i class="icon-zoom-in icon-white">
								</i>
								预览
							</a>
							<a class="btn btn-info btn-mini" href="<?php echo base_url();?>index.php/mailer/template_edit/<?php echo $template['id'];?>">
								<i class="icon-edit icon-white">
								</i>
								编辑
							</a>
							<a class="btn btn-danger btn-mini" href="<?php echo base_url();?>index.php/mailer/template_del/<?php echo $template['id'];?>">
								<i class="icon-trash icon-white">
								</i>
								删除
							</a>
						</td>
					</tr>
					<?php }?>
			</tbody>
		</table>
	</div>
</div>
<!--/span-->