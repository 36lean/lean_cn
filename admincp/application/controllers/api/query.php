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

		$name = trim( strtolower( str_replace('/[^a-zA-Z0-9\_\.\s]/', '', $_GET['company_name']) ) );

		$list = $this->db->select('id,name')->from('admin_company')->like( array('name'=>$name))->get()->result_array();

		if( empty( $list))
			$list[0] = array('id' => 0 , 'name' => '暂无同名公司,可以使用');

		$this->response( array( 'response'=>$list ), 200);
	}

	public function company_information_get()
	{
		$id = intval( $_GET['id']);

		if( $id === 0)
			$this->response( array('response' => 'id error') , 400 );

		$information = $this->db->select('*')->from('admin_company')->where( array('id'=>$id))->get()->row_array();

		$this->response(  $information , 200 );
	}
	public function register_contact_post()
	{
		foreach ($_POST as $key => $value) {
			
			if( preg_match('/^\_/', $key)){
				
				$key = ltrim( $key , '_');
				
				$company[$key] = trim( $value) ;

			}else
			{
				$contact[$key] = trim( $value );
			}				
		}

		if( ! $contact['name'])
			return $this->response(array('response' => 'Empty Contact\'s Name') , 400 );

		if( isset( $company['id']) )
		{
			$contact['company_id'] = $company['id'];

		}else if( $company['name'] )
		{
			$company['timecreated'] = time();
			$this->db->insert('admin_company' , $company);
			$contact['company_id'] = $this->db->insert_id();

		}else
		{
			$contact['company_id'] = 0;
		}

		$contact['modified_date'] = time();

		$this->db->insert('admin_contacts' , $contact);
		return $this->response( array('company_id'=> $contact['company_id'] , 'contact_id' => $this->db->insert_id()) , 200);

	}

}