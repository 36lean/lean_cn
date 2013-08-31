<?php
global $constant;
?>
<div class="box span12">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-edit"></i> 添加</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="" method="post">
			<fieldset>
				<legend>添加一个用户组</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">分组名 </label>
					<div class="controls">
						<input name="group_name" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
						<p class="help-block">例如: 管理员, 副管理员, 课程编辑 etc </p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="date01">可以访问的一级页面</label>
					<div class="controls">
					<?php foreach ($controller as $col) {
					?>
						<label class="checkbox inline">
							<input name="c_<?php echo $col?>" type="checkbox" id="inlineCheckbox1" value=""> <?php echo $constant["$col"];?>
						</label>
					<?php
					}?>					 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="date01">可以访问的二级页面</label>
					<div class="controls">
					<table class="">
						<tr>
						 <?php 
						 $tmp = 0;
						 foreach ($modules as $key=>$mod) {
						 ?>
						<td>
						<label class="checkbox inline"><input name="m_<?php echo $key;?>" type="checkbox" id="inlineCheckbox1" value=""> 
							<?php echo $mod;?>
						</label>						 
						</td>
						 <?php
						 $tmp++;
						 if( $tmp%6 === 0)
						 	echo '</tr><tr>';
						 }?>
						</tr>
					</table>

					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="date01">操作</label>
					<div class="controls">
						<input class="btn btn-success" name="add_group" type="submit" value="添加分组" />
					</div>
				</div>
			</fieldset>

		</form>   

	</div>
</div><!--/span-->



<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>当前组别</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
									  <th class="span2">组名</th>
									  <th class="span9">可以访问的资源</th>
									  <th class="span1">Action</th>                                       
								  </tr>
							  </thead>   
							  <tbody>
							  	<?php foreach ($group as $g) {
							  	?>
							  	<tr>
									<td><span class="label label-info"><?php echo $g['name']?></span></td>
									<td class="center">
									<?php
									global $modules;
									$constant = array_merge( $constant , $modules);
									 $resource = json_decode( $g['resource']);

									 foreach ($resource as $r) {
									 	$r = preg_replace('/^(c_|m_)/', '', $r);
									 	echo '<span class="label">'.$constant[$r].'</span> ';
									 }
									?>
									</td>
									<td>
										<?php if ( $g['id'] > 1) {?>
										<span>
											<a href="<?php echo base_url();?>index.php/permission/per_category/del/<?php echo $g['id'];?>">删除</a>
										</span>
										<?php }?>
									</td>
								</tr>

							  	<?php
							  	}?>                          
							  </tbody>
						 </table>    
					</div>
				</div><!--/span-->


