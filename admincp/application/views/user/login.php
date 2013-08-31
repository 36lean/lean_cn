<div class="container-fluid">
	<div class="row-fluid">
		<div class="well span8 center login-box">
			<?php if( $code === 404){?>
			<div class="alert alert-error">
				<i class="icon-info-sign"></i> 密码错误
			</div>
			<?php }elseif( $code === 500) {?>
			<div class="alert alert-info">
				<i class="icon-info-sign"></i> 表单来源错误
			</div>
			<?php }else {?>
			<div class="alert alert-info">
				<i class="icon-info-sign"></i> Please login with your Username and Password.
			</div>			
			<?php }?>
			
			<form class="form-horizontal" action="" method="post">
			<input name="hash" type="hidden" value="<?php echo random_string('alnum', 16);?>">
			<fieldset>
				<div class="input-prepend" title="Username" data-rel="tooltip">
					<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="" />
				</div>
				
				<div class="clearfix"></div>
				<div class="input-prepend" title="Password" data-rel="tooltip">
					<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="" />
				</div>
				<div class="clearfix"></div>
				<p class="center span3">
					<button name="login" type="submit" class="btn btn-primary">登陆</button>
				</p>
			</fieldset>
			</form>
		</div><!--/span-->
	</div><!--/row-->		
</div><!--/.fluid-container-->