<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_controller'] = array(
                                'class'    => 'LoginHook',
                                'function' => 'login_check',
                                'filename' => 'Hooks.class.php',
                                'filepath' => 'hooks',
                                'params'   => array('pre_controller')
                                );
$hook['post_controller_constructor'] = array(
                                'class'    => 'LoginHook',
                                'function' => 'login_check',
                                'filename' => 'Hooks.class.php',
                                'filepath' => 'hooks',
                                'params'   => array('post_controller_constructor')
                                );
$hook['post_controller'] = array(
                                'class'    => 'LoginHook',
                                'function' => 'login_check',
                                'filename' => 'Hooks.class.php',
                                'filepath' => 'hooks',
                                'params'   => array('post_controller')
                                );
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */