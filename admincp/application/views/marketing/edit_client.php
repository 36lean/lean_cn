<?php
if( $status === Status::UPDATE_SUCCESS) {
	echo '<div class="alert alert-success"><i class="icon-info-sign"></i> 修改成功<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}else if( $status === Status::UPDATE_FAIL) {
	echo '<div class="alert alert-error"><i class="icon-info-sign"></i> 修改失败<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}else if( $status === Status::NOTHING) {
	echo '<div class="alert alert-info"><i class="icon-info-sign"></i> 正在修改<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}

if( Status::RECORD_NOT_EXIST !== $return || $this->_G['adminid'] === 1) {

	$client = $return[0];
?>


<?php
$map = $this->config->config['map'];

var_dump( $map);

?>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-edit">
				</i>
				编辑客户的资料 <a href="<?php echo base_url();?>index.php/marketing/connect/<?php echo $client['id'];?>">返回上一页</a>
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round">
					<i class="icon-chevron-up">
					</i>
				</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post">
			<input type="hidden" name="id" value="<?php echo $client['id'];?>">
				<fieldset>
				<?php foreach ($config as $key => $value) {
				?>
					<div class="control-group">
						<label class="control-label" for="prependedInput">
							<?php echo $value;?>
						</label>
						<div class="controls">
							<div class="input-prepend">
								<input id="<?php echo $key;?>" name="<?php echo $key;?>" type="text" value="<?php echo $client[$key];?>">
							</div>
							<p class="help-block">
								
							</p>
						</div>
					</div>
				<?php
				}?>
					<div class="form-actions">
						<button name="save" type="submit" class="btn btn-primary">
							Save changes
						</button>
						<a href="<?php echo base_url();?>index.php/marketing/connect/<?php echo $client_id;?>" class="btn">
							取消
						</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->

<?php
}else {
?>
<div class="alert alert-success"><i class="icon-info-sign"></i> 在我的客户清单中未发现此客户或者没有权限修改</div>
<?php
}
?>
