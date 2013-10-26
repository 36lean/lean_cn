<?php

function form_post_refresh()
{
	redirect( $_SERVER['HTTP_REFERER']);

	exit('referer error');
}
