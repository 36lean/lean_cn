<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script>
jQuery( function() {
jQuery.ajax({
url : 'lesson.php',
type : 'GET',
data : { click_collection : 1 , id: "<?php echo $content['id'];?>", type:'p'},
dataType:'html',
});
});
</script><?php include template('common/footer'); ?>