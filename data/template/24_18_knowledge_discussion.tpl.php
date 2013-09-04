<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discussion');?><?php include template('knowledge/header'); ?><ul class="breadcrumb">
    <li><a href="knowledge.php">问答社区</a> <span class="divider">/</span></li>
    <li><a href="#">最新问题</a> <span class="divider">/</span></li>
    <li class="active">
        <?php if($question['status']) { ?><i class="icon-check"></i>
        <?php } else { ?><i class="icon-check-empty"></i>
        <?php } ?>
        <?php echo cutstr( $question['title'] , 60 , ' ... ')?>    </li>
</ul>

<div class="page-header">
    <h3>
        <?php if($question['status']) { ?><i class="icon-check"></i>
        <?php } else { ?><i class="icon-check-empty"></i>
        <?php } ?>
        <?php echo $question['title'];?>
    </h3>
    
    <h5><?php if($question['uid'] === $_G['uid']) { ?>
        <small>
            <?php if($question['status'] == 0) { ?><a href="knowledge.php?mod=discussion&amp;id=<?php echo $question['id'];?>&amp;makedone=1">设置成已经解决</a> <?php } ?>
            <a href="knowledge.php?mod=covert&amp;id=<?php echo $question['id'];?>">转换成我的知识库</a>
        </small>
        <?php } ?>
    </h5>
</div>

<dl class="dl-horizontal">
<dt><i class="icon-leaf"></i> 状态</dt>
<dd><?php if($question['status']) { ?><span class="label label-success">已经解决</span><?php } else { ?><span class="label label-info">未解决</span><?php } ?></dd>

    <dt><i class="icon-time"></i> 创建日期</dt>
    <dd><?php echo date( 'Y/m/d h:i', $question['createddate'])?></dd>

    <dt><i class="icon-hand-right"></i> 点击浏览</dt>
    <dd><?php echo $question['view'];?></dd>

    <dt><i class="icon-comments-alt"></i> 讨论/回复</dt>
    <dd><?php echo $question['reply'];?></dd>
</dl>
<h5><i class="icon-list-alt"></i> 问题描述</h5>
<blockquote>
    <i class="icon-quote-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;
     <?php echo $question['content'];?> 
    &nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-quote-right"></i> 
</blockquote>

<hr />
<h2><small><i class="icon-comments-alt"></i> 参与讨论</small></h2>

<?php if(!$_G['uid']) { ?>
    <?php include template('knowledge/guest'); } else { ?>
<form action="" method="post">
<?php if($question['callme']) { ?><input name="callme" type="hidden" value="<?php echo $question['uid'];?>" /><?php } ?>

<dl class="dl-horizontal">
    <dt><?php echo avatar($_G['uid'] , 'small');?></dt>
    <dd><textarea name="discuss" class="span12" placeholder="我知道答案/我认为 ..."></textarea></dd>
    <dd><button name="reply" class="btn" type="submit">
        发送 <i class="icon-reply"></i>
        </button>
    </dd>
</dl>
</form>
<?php } ?>
<hr />

<h2><small><i class="icon-comments"></i> 讨论/回答</small></h2>

<div>

</div>

<div id="dis"><?php if(is_array($father_reply)) foreach($father_reply as $r) { ?><div class="media" style="border:1px solid #eee;padding:15px;">
    <a class="pull-left" href="#">
        <?php echo avatar($r['uid'] , 'small');?>    </a>
    <div class="media-body">
        <h6 class="media-heading">
            <?php if($r['username']) { ?>来自<?php echo $r['username'];?>的回答<?php } else { ?>来自匿名的回答<?php } ?> 
            <i class="icon-comment"></i>
        </h6>
        <p>
        <small id="tool_<?php echo $r['id'];?>">
            <!--<a href="#"><i class="icon-check"></i> 推荐</a>-->
            <?php if($_G['uid'] == $r['uid']) { ?>
                <a href="knowledge.php?mod=discussion&amp;id=<?php echo $question['id'];?>&amp;rm=<?php echo $r['id'];?>"><i class="icon-remove"></i> 删除</a>
            <?php } ?>
        </small></p>
        <blockquote><?php echo $r['content'];?></blockquote>
        <div id="<?php echo $r['id'];?>">
            
        </div>
    </div>
</div>

<script>
jQuery( function () {
    jQuery.post('knowledge.php' , { action:'get_attitude' , params: { uid : "<?php echo $_G['uid'];?>" , aid : "<?php echo $r['id'];?>" } }, function( response) {

        if( response == 1)
        {
            jQuery("#<?php echo $r['id'];?>").prepend('<small><i class="icon-thumbs-up"></i> 我赞同了这个答案</small>');
            jQuery("#tool_<?php echo $r['id'];?>").prepend('<a id="2_<?php echo $r['id'];?>" href="knowledge.php?mod=discussion&amp;id=<?php echo $question['id'];?>&amp;aid=<?php echo $r['id'];?>&amp;attitude=2"><i class="icon-thumbs-down"></i> 反对</a> ');
        }else if( response == 2) {
            jQuery("#<?php echo $r['id'];?>").prepend('<small><i class="icon-thumbs-down"></i> 我反对了这个答案</small>');
            jQuery("#tool_<?php echo $r['id'];?>").prepend('<a id="1_<?php echo $r['id'];?>" href="knowledge.php?mod=discussion&amp;id=<?php echo $question['id'];?>&amp;aid=<?php echo $r['id'];?>&amp;attitude=1"><i class="icon-thumbs-up"></i> 赞同</a>');
        }else {
            jQuery("#tool_<?php echo $r['id'];?>").prepend('<a id="1_<?php echo $r['id'];?>" href="knowledge.php?mod=discussion&amp;id=<?php echo $question['id'];?>&amp;aid=<?php echo $r['id'];?>&amp;attitude=1"><i class="icon-thumbs-up"></i> 赞同</a> <a id="2_<?php echo $r['id'];?>" href="knowledge.php?mod=discussion&amp;id=<?php echo $question['id'];?>&amp;aid=<?php echo $r['id'];?>&amp;attitude=2"><i class="icon-thumbs-down"></i> 反对</a>');
        }
    });
});
</script>

<?php } ?>
</div>


<script>
jQuery( function () {
    jQuery('.media').mouseover( function() {
        jQuery(this).css({'background':'#eee'});

    });
    jQuery('.media').mouseout( function() {
        jQuery(this).css({'background':'#fff'});
    });
});
</script>
<br /><?php include template('knowledge/footer'); ?>