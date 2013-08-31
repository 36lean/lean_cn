<?php
$news = C::t('amazing_news')->get_news();

$common = C::t('amazing_news')->get_common_news();

$clicks = C::t('amazing_news')->get_hightest_click_news();

require template('news/default');