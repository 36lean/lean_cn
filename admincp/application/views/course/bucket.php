<p>
<div class="btn-group">
    <a href="<?php echo site_url('course/test');?>" class="btn btn-primary">添加试题</a>
    <a href="<?php echo site_url('course/bucket');?>" class="btn btn-primary active">添加试卷</a>
    <a href="<?php echo site_url('course/list_bucket');?>" class="btn btn-primary">试卷列表</a>
    <a href="<?php echo site_url('course/list_test');?>" class="btn btn-primary">试题列表</a>
</div>
</p>

<div class="row-fluid">


<div class="span6">

<?php if( isset( $data['title'])) {?>
<h4>编辑试卷</h4>

<?php }?>

<form action="" method="post">

<?php if( isset( $data['id'])) {?>
<input type="hidden" name="id" value="<?php echo $data['id'];?>">
<?php }?>

	<div class="control-group">
		<label>试题名</label>
		<div class="controls">
			<input name="title" type="text" value="<?php if( isset($data['title'])) { echo $data['title'] ; }?>" />
		</div>
	</div>

	<div class="control-group">
		<label>限制时间 (/分钟)</label>
		<div class="controls">
			<input name="limittime" type="text" value="<?php if( isset($data['limittime'])) { echo $data['limittime'] ; }?>" />
		</div>
	</div>

	<div class="control-group">
		<label>说明性文字</label>
		<div class="controls">
			<textarea name="description" class="span12" rows="3"><?php if( isset($data['description'])) { echo $data['description'] ; }?></textarea>
		</div>
	</div>

	<div class="well">
		<label>题目列表</label>
		<ul id="saved" class="nav">
<?php 
if( isset( $data['checkout_list']) ) {
foreach (  $data ['checkout_list'] as $key => $item) { ?>

	<li rel="<?php echo $item['id'];?>"><a href="javascript:void(0);"><?php echo $item['id'];?> . <?php echo $item['title'];?></a></li>
	<input type="hidden" name="<?php echo $item['id'];?>" value="1" />
	
<?php }
}?>			
		</ul>

	</div>

	<div class="control-group">
		<div class="controls">
			<?php if( isset( $data['id'])) {?>
				<button class="btn btn-primary" type="submit" value="1">编辑试卷</button>
			<?php }else{?>
				<button class="btn btn-primary" type="submit" value="1">添加试卷</button>
			<?php }?>
		</div>
	</div>
</form>
</div>

<div class="span6">
<ul id="pre" class="nav">
<?php foreach (  $list as $key => $item) { ?>

	<li rel="<?php echo $item['id'];?>"><a href="javascript:void(0);"><?php echo $item['id'];?> . <?php echo $item['title'];?></a></li>


<?php }?>
</ul>
</div>

</div>



<script>
$(function(){

	$('ul#pre > li').live('click' , function(){
			
		var id = $(this).attr('rel');

		$('ul#saved').append( '<li rel="'+id+'">'+$(this).html()+'</li>');

		$(this).remove();

		$('form').append('<input type="hidden" name="'+id+'" value="1">');

	});

	$('ul#saved > li').live( 'click' , function(){
		var id = $(this).attr('rel');

		$('ul#pre').append( '<li rel="'+id+'">'+$(this).html()+'</li>');

		$(this).remove();

		//$('form').append('<input type="hidden" name="'+id+'" value="1">');

		$('input[name="'+id+'"]').remove();

	});
});
</script>