<?php
/*
| -------------------------------------------------------------------------
| Hooks for login
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
class Status {

	public function session() {
		$session_id = session_start();
	}
}