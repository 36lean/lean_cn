<?php

$id = intval( $_GET['id']);

$category_info = C::t('amazing_topic')->get_topic_by_id( $id);

$article_list = C::t('amazing_news')->get_list_by_category( $id);

require template( 'news/category');