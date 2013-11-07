<p>
<div class="btn-group">
    <a href="<?php echo site_url('course/test');?>" class="btn btn-primary active">添加试题</a>
    <a href="<?php echo site_url('course/bucket');?>" class="btn btn-primary">添加试卷</a>
    <a href="<?php echo site_url('course/list_bucket');?>" class="btn btn-primary">试卷列表</a>
    <a href="<?php echo site_url('course/list_test');?>" class="btn btn-primary">试题列表</a>
</div>
</p>


<div class="well">

<h4>添加试题</h4>

<div id="select" class="box">

<div class="row-fluid">
	<div class="span6">

	<form action="" method="post">

	<?php if( $data) { ?>
	<input name="id" type="hidden" value="<?php echo $data['id'];?>" />
	<?php }?>
	<div class="control-group">
	<div class="controls">
		<label>标题</label><input name="title" id="title" type="text" value="<?php if( $data) { echo $data['title'] ; }?>" />
	</div>
	</div>

	<div class="control-group">
	<div class="controls">
		<label>描述性文字</label>
		<textarea class="span12" rows="5" name="question" id="question"><?php if( $data) { echo $data['question'] ; }?></textarea>
	</div>
	</div>
	

	<div class="control-group">
		<div class="controls">
			<label>题目</label>
			<ol>
				<li><input name="item_1" id="item_1" value="<?php if( $data) { echo $data['item_1'] ; }?>" type="text" /> <a class="label set" rel="pre_item_1">设为最佳答案</a></li>
				<li><input name="item_2" id="item_2" value="<?php if( $data) { echo $data['item_2'] ; }?>" type="text" /> <a class="label set" rel="pre_item_2">设为最佳答案</a></li>
				<li><input name="item_3" id="item_3" value="<?php if( $data) { echo $data['item_4'] ; }?>" type="text" /> <a class="label set" rel="pre_item_3">设为最佳答案</a></li>
				<li><input name="item_4" id="item_4" value="<?php if( $data) { echo $data['item_4'] ; }?>" type="text" /> <a class="label set" rel="pre_item_4">设为最佳答案</a></li>
			</ol>
		</div>
	</div>

	<div class="control-group">
	<div class="controls">
		<?php if( $data) { ?>
		<button class="btn btn-primary" name="add" value="1">修改</button>
		<?php }else {?>
		<button class="btn btn-primary" name="add" value="1">添加</button>
		<?php }?>
	</div>
	</div>

	</form>
	</div>

	<div class="span6">

	<div class="control-group">
	<div class="controls">
		<label>标题</label>
		<p class="alert alert-info" id="pre_title"><?php if( $data) { echo $data['title'] ; }?></p>
	</div>
	</div>

	<div class="control-group">
	<div class="controls">
		<label>描述性文字</label>
		<p class="alert alert-info" id="pre_question"><?php if( $data) { echo $data['question'] ; }?></p>
	</div>
	</div>
	

	<div class="control-group">
		<div class="controls">
			<label>题目</label>
			<ol>
				<li><p class="alert alert-info" id="pre_item_1"><?php if( $data) { echo $data['item_1'] ; }?></p></li>
				<li><p class="alert alert-info" id="pre_item_2"><?php if( $data) { echo $data['item_2'] ; }?></p></li>
				<li><p class="alert alert-info" id="pre_item_3"><?php if( $data) { echo $data['item_3'] ; }?></p></li>
				<li><p class="alert alert-info" id="pre_item_4"><?php if( $data) { echo $data['item_4'] ; }?></p></li>
			</ol>
		</div>
	</div>

	</div>

	</div>
</div>
</div>






<script>
$(function(){

	$('input').on( 'keyup' , function(){
		var id =  'pre_'+$(this).attr('id');
		$('#'+id).text( $(this).val());
	});
	$('textarea').on( 'keyup' , function(){
		var id =  'pre_'+$(this).attr('id');
		$('#'+id).text( $(this).val());
	});
	$('a.set').on('click',function(){

		$('input[type="hidden"]').remove();
		
		$('.alert-success').addClass('alert-info');
		$('.alert').removeClass('alert-success');

		var id = $(this).attr('rel');
		$('#'+id).removeClass('alert-info').addClass('alert-success');

		$('form').append('<input type="hidden" name="answer" value="'+id+'">');
	});


});
</script>