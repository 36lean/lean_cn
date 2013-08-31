<?php

$id = intval( $_REQUEST['id']);

if( isset( $_POST['post_comment'])) {
	$comment = array(
		'article_id' => intval( $_POST['n']),
		'uid'        => $_G['uid'],
		'comment'    => strip_tags( trim( $_POST['comment'])),
		'timecreated'=> time(),
	);

	$status = C::t('amazing_news_comment')->add_comment( $comment);
}

$news = C::t('amazing_news')->get_a_news( $id);

$comments = C::t('amazing_news_comment')->get_comments_by_article_id( $id);

require template('news/article');