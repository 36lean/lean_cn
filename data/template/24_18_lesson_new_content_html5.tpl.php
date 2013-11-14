<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script>
//window.onerror=function(){return true;}     
</script>

<div id="play_area" class="mot-block-blackboard" align="center">
<div class="container">

<script src="flowplayer/flowplayer-3.2.12.min.js" type="text/javascript"></script>
<link href="flowplayer/playful.css" rel="stylesheet" />

<p>
    <a href="" style="display:block;width:750px;height:403px" id="player"></a> 
</p>
<script>
flowplayer("player", "flowplayer/flowplayer-3.2.16.swf", {
    
    log: { level: 'debug', filter: 'org.flowplayer.captions.*' },

    clip: {
        
        <?php if($video['label_cn']) { ?>
        captionUrl: 'http://www.36lean.com/filter.php?url=http://36lean-video-sub.oss-cn-hangzhou.aliyuncs.com/GA/<?php echo $video['v_path'];?>/CH/<?php echo $video['label_cn'];?>',
        <?php } else { ?>

        captionUrl: 'http://www.36lean.com/static/mot/empty.srt', 

        <?php } ?>

        autoPlay: false,
        
        autoBuffering: true,
        
        baseUrl: '',//'<?php echo $base_url;?>', 

    },
    
    playlist: [ // playlist is an array of Clips, hence [...]
          '<?php echo $file;?>', // simple playlist entry: video
    ],


    plugins:  {
 
        // the captions plugin
        captions: {
            url: "flowplayer/flowplayer.captions-3.2.9.swf",
 
            // pointer to a content plugin (see below)
            captionTarget: 'content'
        },
 
        // configure a content plugin so that it
        // looks good for showing subtitles
        content: {
            url: "flowplayer/flowplayer.content-3.2.8.swf",
            bottom: 30,
            height:80,
            backgroundColor: 'transparent',
            backgroundGradient: 'none',
            border: 0,
            textDecoration: 'outline',
            style: {
                body: {
                    fontSize: 19,
                    fontFamily: '微软雅黑',
                    textAlign: 'center',
                    color: '#ffffff'
                }
            }
        },

        // change default skin to "tube"
        controls: {
            url: 'flowplayer/flowplayer.controls-tube-3.2.15.swf',
            playlist: true,

        }
 
    },
    canvas: {
        backgroundGradient: 'none'
    }
});
</script>


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