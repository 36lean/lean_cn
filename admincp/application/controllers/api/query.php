<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Query extends REST_Controller
{

	public function company_exist_get()
	{	

		$name = trim( str_replace('/[^a-zA-Z0-9\_\.\s]/', '', $_GET['company_name']) );

		$list = $this->db->select('id,name')->from('admin_company')->like( array('name'=>$name))->get()->result_array();

		if( empty( $list))
			$list[0] = array('id' => 0 , 'name' => '暂无同名公司,可以使用');

		$this->response( array( 'response'=>$list ), 200);
	}

}