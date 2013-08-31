<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i> 邮件模板列表</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>邮件模板名</th>
								  <th>创建日期</th>
								  <th>是否跟踪</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php foreach ($list as $template) {
						  	?>
							<tr>
								<td><?php echo $template['mail_title']?></td>
								<td class="center"><?php echo date('Y/m/d' , $template['created_date'])?></td>
								<td class="center"><?php echo $template['mail_spy'] ? 'on' : 'off'?></td>
								<td class="center">
									<span class="label label-success">Using</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="<?php echo base_url();?>index.php/mailer/template_view/<?php echo $template['id'];?>">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
									<a class="btn btn-info" href="<?php echo base_url();?>index.php/mailer/template_edit/<?php echo $template['id'];?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" href="<?php echo base_url();?>index.php/mailer/template_del/<?php echo $template['id'];?>">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
							<?php
							}?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->