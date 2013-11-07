<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('figureout');?><?php include template('common/header'); ?><div class="page-header">
<h4><?php echo $signup['title'];?></h4>
</div>

<form action="" method="post">

<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="id" value="<?php echo $signup['id'];?>"><?php if(is_array($checkout)) foreach($checkout as $key => $c) { ?><h5><?php echo $key+1?> . <?php echo $c['title'];?></h5>
<h5> <small><?php echo $c['question'];?></small></h5>
<hr/>

<?php if(isset( $finish_part[$c['id']])) { ?>

<input type="hidden" name="<?php echo $c['id'];?>" value="<?php echo $finish_part[$c['id']];?>" />

<?php if($finish_part[$c['id']] === $c['answer']) { ?>
<span class="label label-success">我的结果 : 正确</span>
<?php } else { ?>
<span class="label label-warning">我的结果 : 错误</span>
<?php } ?>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="1" <?php if($finish_part[$c['id']] == 1) { ?>checked="checked"<?php } ?> disabled="disabled"  type="radio" />
<?php if($c['answer'] == 1) { ?> <span class="alert alert-success">A . <?php echo $c['item_1'];?></span> <i class="icon-ok"></i>
<?php } else { ?>
A . <?php echo $c['item_1'];?>
<?php } ?>
</label>
</div>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="2" <?php if($finish_part[$c['id']] == 2) { ?> checked="checked"<?php } ?> disabled="disabled" type="radio" />
<?php if($c['answer'] == 2) { ?> <span class="alert alert-success">B . <?php echo $c['item_2'];?></span> <i class="icon-ok"></i>
<?php } else { ?>
B . <?php echo $c['item_2'];?>
<?php } ?>
</label>
</div>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="3" <?php if($finish_part[$c['id']] == 3) { ?> checked="checked"<?php } ?> disabled="disabled"  type="radio" />
<?php if($c['answer'] == 3) { ?> <span class="alert alert-success">C . <?php echo $c['item_3'];?></span> <i class="icon-ok"></i>
<?php } else { ?>
C . <?php echo $c['item_3'];?>
<?php } ?>
</label>
</div>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="4" <?php if($finish_part[$c['id']] == 4) { ?> checked="checked"<?php } ?> disabled="disabled"  type="radio" />
<?php if($c['answer'] == 4) { ?> <span class="alert alert-success">D . <?php echo $c['item_4'];?></span> <i class="icon-ok"></i>
<?php } else { ?>
D . <?php echo $c['item_4'];?>
<?php } ?>
</label>
</div>

<?php } else { ?>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="1" type="radio" />
A . <?php echo $c['item_1'];?>
</label>
</div>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="2" type="radio" />
B . <?php echo $c['item_2'];?>
</label>
</div>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="3" type="radio" />
C . <?php echo $c['item_3'];?>
</label>
</div>

<div class="controls">
<label class="radio">
<input name="<?php echo $c['id'];?>" value="4" type="radio" />
D . <?php echo $c['item_4'];?>
</label>
</div>		

<?php } } ?>

<div class="page-header">
<div class="controls">
<button class="btn btn-primary" type="submit" name="done" value="1">交卷</button>
</div>
</div>

</form><?php include template('common/footer'); ?>