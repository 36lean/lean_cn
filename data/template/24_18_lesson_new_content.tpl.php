<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div id="play_area" class="mot-block-blackboard" align="center">
<div class="container">

    	<link href="<?php echo $_G['siteurl'];?>static/videojs/video-js.css" rel="stylesheet" type="text/css">
    	<script src="<?php echo $_G['siteurl'];?>static/videojs/video.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
videojs.options.flash.swf = "<?php echo $_G['siteurl'];?>/static/videojs/video-js.swf";
var Player = videojs("_video_player");
var Lang = Array();
Lang[0] = '简体中文';
Lang[1] = '繁体中文';
Lang[2] = '英文';
var isMobile = {
    				Android: function() {  
        				return navigator.userAgent.match(/Android/i) ? true : false;  
   					},  
    				BlackBerry: function() {  
        				return navigator.userAgent.match(/BlackBerry/i) ? true : false;  
    				},  
    				iOS: function() {  
        				return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;  
    				},  
    				Windows: function() {  
        				return navigator.userAgent.match(/IEMobile/i) ? true : false;  
    				},  
    				any: function() {  
       					return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());  
    				}  
};  
    			if( isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS())
    				var ismobile = true;
jQuery.ajax({
type: 'POST',
url : 'lesson.php?dataajax=1',
data: 'pageid=<?php echo $content['id'];?>',
success: function( result){
result = eval('('+result+')')

if( ismobile)
Player.src( { type: "video/mp4", src: result['video_mb']});
else
Player.src( { type: "video/mp4", src: result['video_pc']});
}
});
    		});
</script>

   	<video id="_video_player" class="video-js vjs-default-skin" controls preload="none" width="100%" height="529"  poster="<?php if(file_exists( 'uploads/page/'.$video['image_file'])) { ?><?php echo $_G['siteurl'];?>uploads/page/<?php echo $video['image_file'];?><?php } else { ?><?php echo $config['videourl'];?><?php echo $video['v_path'];?>/PNG/<?php echo $video['image_file'];?><?php } ?>" data-setup="{}">

<?php if(file_get_contents( $config['videourl'] . $video['v_path'] . '/SRT/CH/' . $video['label_cn'])) { ?>
    	<track kind="captions" src="filter.php?url=<?php echo $config['videourl'];?><?php echo $video['v_path'];?>/SRT/CH/<?php echo $video['label_cn'];?>?response-content-type=text/plain&amp;response-content-encoding=utf-8" srclang="zh" label="简体中文" default />
<?php } if(file_get_contents( $config['videourl'] . $video['v_path'] . '/SRT/TW/' . $video['label_tw'])) { ?>
    	<track kind="captions" src="filter.php?url=<?php echo $config['videourl'];?><?php echo $video['v_path'];?>/SRT/TW/<?php echo $video['label_tw'];?>?response-content-type=text/plain&amp;response-content-encoding=utf-8" srclang="zh" label="繁体中文" />
<?php } if(file_get_contents( $config['videourl'] . $video['v_path'] . '/SRT/EN/' . $video['label_en'])) { ?>
    	<track kind="captions" src="filter.php?url=<?php echo $config['videourl'];?><?php echo $video['v_path'];?>/SRT/EN/<?php echo $video['label_en'];?>?response-content-type=text/plain&amp;response-content-encoding=utf-8" srclang="en" label="英文/English" />
    	<?php } ?>
 	</video>
</div>
</div>

<div class="container">
 		<div class="alert alert-error">
 			<div class="text-right"><h4><i class="icon-info-sign"></i> 提示 点击CC打开/切换字幕语言 <i class="icon-hand-up"></i></h4></div>
 		</div>
 	</div>

<div class="container">
<h4><i class="icon-file-alt"></i> 阅读材料</h4>
<hr/>
<blockquote>
<?php echo $content['contents'];?>
</blockquote>
</div>

<div>