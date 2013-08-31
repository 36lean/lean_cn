<?php

if( isset( $_REQUEST['posts'])) 
{
	$content = array('contenttitle' 	=> trim( $_REQUEST['content_title']),
					 'contentinfo'   	=> cutstr( trim( $_REQUEST['content_body']) , 300),
					 'contentbody'  	=> trim( $_REQUEST['content_body']),
					 'banner'           => trim( $_REQUEST['banner']),
					 'timecreated'   	=> time(),
					 'category'      	=> 0,
	);

	C::t('amazing_news')->insert_news( $content);
}


require template('news/post');