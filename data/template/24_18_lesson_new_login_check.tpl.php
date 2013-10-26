<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('new_login_check');?><?php include template('common/header'); include template('lesson/new_content_front'); ?>    <!-- Button to trigger modal -->
    <a href="#myModal" role="button" data-toggle="modal"></a>
     
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    
    <h3 id="myModalLabel">账户登陆异常</h3>
    </div>
    <div class="modal-body">
    <p>账户登录异常，非常抱歉，我们检测到您的账户在其它地方登录，请尝试重新登录</p>
    <p> [提醒：为了保证账户能正常观看，请勿将账户共享给其他人] </p>
    </div>
    <div class="modal-footer">
    <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" class="btn btn-primary">注销并重新登陆</a>
    </div>
    </div>

    <script>
    jQuery(function(){
    	jQuery('#myModal').modal({
    		keyboard: false , 
    		backdrop: false , 
    		show: true , 
    	});
    });
    </script><?php include template('lesson/new_content_footer'); ?>