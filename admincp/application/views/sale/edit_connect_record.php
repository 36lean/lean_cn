<div class="alert alert-info"><i class="icon-edit"></i> 编辑沟通记录</div>



<form name="" action="" method="post">
<input type="hidden" name="id" value="<?php echo $connect['id'];?>" />
<input type="hidden" name="client_id" value="<?php echo $connect['client_id'];?>" />

<strong>上次修改 : <?php echo date('Y年m月d日 h:i:s'  , $connect['date']) ;?></strong> 
<div class="control-group">
<div class="controls">
<textarea class="kindeditor" name="response"><?php echo $connect['response'];?></textarea>
</div>
</div>

<div class="control-group">
<div class="controls">
<button class="btn btn-success" name="save_edit" value="1">保存修改</button>
<button class="btn btn-primary" name="del_connect" value="1">删除记录</button>
</div>
</div>