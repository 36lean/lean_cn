<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('lesson_map');?><?php include template('common/header'); ?><ol><?php if(is_array($course)) foreach($course as $key => $c) { ?><li>
<div class="page-header">
<h5><?php echo $c['fullname'];?> <small><?php echo $c['summary'];?></small></h5>
</div>
<table class="table table-stripeds">
<tr>
<td class="span4">标题</td>
<td class="span1">语言</td>
<td class="span1">时长</td>
<td class="span6">介绍</td>
</tr><?php if(is_array($pages)) foreach($pages as $key => $p) { if($p['lessonid'] === $c['id']) { ?>

<tr>
<td><span class="label label-info"><?php echo $p['title'];?></span></td> 
<td><span class="label label-info">语言 : <?php echo $p['v_voice'] == 1 ? '英语' : '中文'?></span></td>
<td><span class="label label-info"><?php echo $p['v_time'];?></span></td>

<td><small><?php echo $p['cn_intro'];?></small></td>
</tr><?php unset( $pages[$key])?><?php } } ?>
</table>

</li>
<?php } ?>
</ol><?php include template('common/footer'); ?>