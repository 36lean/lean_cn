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

		if( isset( $company['id']) && $company['id'] > 0)
		{
			$contact['company_id'] = $company['id'];

		}else if( $company['name'] )
		{
			$company['timecreated'] = time();
			$this->db->insert('admin_company' , $company);
			$this->db->last_query();
			$contact['company_id'] = $this->db->insert_id();

		}else
		{
			$contact['company_id'] = 0;
		}

		/*
		if( ! $contact['name'])
			return $this->response(array('response' => 'Empty Contact\'s Name') , 200 );
		*/

		$contact['modified_date'] = time();
		if( $contact['name'] )
		{
			
			$this->db->insert('admin_contacts' , $contact);

			$contact_id = $this->db->insert_id();
		}else{

			$contact_id = 0;
		}

		return $this->response( array( array('company_id'=> $contact['company_id'] , 'contact_id' => $contact_id) ) , 200);

	}

	public function update_user_post()
	{

		$params = array();
		foreach ($_POST as $key => $value) {
			
			$key = preg_replace('/^\_/', '', $key);

			$params[$key] = trim( $value);

		}
		$id = intval( $params['id']);
		unset( $params['id']);
		if( $this->db->where( array('id'=>$id))->update('admin_contacts' , $params) )
			$this->response( array('response' => 'Successed') , 200);
		else
			$this->response( array('response' => 'Failed') , 200);
	}

	public function query_ucenter_member_post()
	{
		$username = trim( $_POST['username'] );

		$user = $this->db->select('uid,username,email,regdate,lastlogintime')
				 		 ->from('ucenter_members')
				 		 ->or_where( array('username' => $username))
				 		 ->or_like( array('email' => $username))
				 		 ->or_where( array('uid' => $username))
				 	     ->get()->result_array();

		$this->response( $user  , 200 );
	}

	public function user_bind_post()
	{
		$user_id = intval( $_POST['user_id'] );
		$contact_id = intval( $_POST['contact_id']);

		if( $user_id && $contact_id === FALSE)
		{
			$this->response( array('response' => 'error') , 400);
			exit;
		}

		$this->db->where( array('id'=>$contact_id))
				 ->update( 'admin_contacts' , array('user_id' => $user_id));

		$this->response( array('response' => 'Successed') , 200);
	}

	public function get_member_profile_post()
	{
		if( isset( $_POST['uid']))
		{
			$uid = intval( $_POST['uid'] );

			$profile = $this->db->select('uc.lastlogintime,uc.regdate,p.uid,p.realname,p.telephone,p.mobile,p.company,p.occupation,p.qq,p.site,m.email,m.username,v.jointime,v.exptime')
				 			->from( 'common_member_profile p')
				 			->join( 'common_member m' , 'm.uid = p.uid' )
				 			->join( 'dsu_vip v' , 'v.uid = p.uid' , 'left')
				 			->join( 'ucenter_members uc' , 'uc.uid = p.uid')
				 			->where( array('p.uid'=>$uid))
				 			->get()->row_array();
			$profile['today'] = time();

			$this->response( $profile , 200 );

		}else if( isset( $_POST['username']))
		{
			$username = trim( $_POST['username']);

			$profile = $this->db->select('uc.lastlogintime,uc.regdate,p.uid,p.realname,p.telephone,p.mobile,p.company,p.occupation,p.qq,p.site,m.email,m.username,v.jointime,v.exptime')
				 			->from( 'common_member_profile p')
				 			->join( 'common_member m' , 'm.uid = p.uid' )
				 			->join( 'dsu_vip v' , 'v.uid = p.uid' , 'left')
				 			->join( 'ucenter_members uc' , 'uc.uid = p.uid')
				 			->where( array('uc.username'=>$username))
				 			->get()->row_array();
			$profile['today'] = time();

			$this->response( $profile , 200 );
		}

	}

	public function update_ucenter_member_post()
	{


		$uid = intval( $_POST['uid'] );
		if( $this->db->select('uid')->from('ucenter_members')->get()->num_rows() === 0)
			return $this->response( array('response' => 'User Not Exist') , 400);

		if( $_POST['jointime'] || $_POST['exptime'] )
		{
			if( $this->db->where( array('uid' => $uid ))->from('dsu_vip')->get()->num_rows() )
			{
				$this->db->where( array('uid' => $uid))->update('dsu_vip' , array('exptime' => strtotime( trim( $_POST['exptime']) ) , 'jointime' => strtotime( trim( $_POST['jointime']) ) ));

			}else
			{
				$this->db->insert( 'dsu_vip' , array( 'uid' => $uid ,
													  'exptime' 	=> strtotime( trim( $_POST['exptime']) ) , 
													  'jointime'    => strtotime( trim( $_POST['jointime'])) , 
													  'year_pay'    => 0 ,
													  'level'       => 1 ,
													  'czz'         => 50 , 
													  'oldgroup'    => 17 ,
													 )  
				);

			}
		}

		$this->db->where( array('uid'=>$uid))->update( 'common_member' , array( 'email' => trim( $_POST['email']) ));
		$this->db->where( array('uid'=>$uid))->update( 'ucenter_members' , array( 'email' => trim( $_POST['email']) ));

		$this->db->where( array('uid'=>$uid))->update( 'common_member_profile' , array(
				'realname' => trim( $_POST['realname']) , 
				'telephone' => trim( $_POST['telephone']) , 
				'mobile' => trim( $_POST['mobile']) , 
				'company' => trim( $_POST['company']) , 
				'occupation' => trim( $_POST['occupation']) , 
				'qq' => intval( $_POST['qq']) , 
				'site' => trim( $_POST['site']) , 
			)
		);

		$this->response( array('response' => 'Successed') , 200 ) ;
		
	}

	public function update_company_post()
	{
		$id = intval( $_POST['id']);
		if( $id === 0)
			return $this->response( array('response' => 'Invaild Company Id') , 400 ) ;
		else if( $this->db->select('id')->from('admin_company')->where( array('id'=>$id))->get()->num_rows() === 0 )
			return $this->response( array('response' => 'Company Not Exist') , 400 ) ;
		else
		{
			unset( $_POST['id']);

			foreach ($_POST as $key => $value) {
				$_POST[$key] = trim( $value);
			}

			$_POST['timeupdated'] = time() ;

			if( $this->db->where( array('id'=>$id))->update('admin_company' , $_POST) )
				return $this->response( array('response' => 'Successed') , 200);
			else
				return $this->response( array('response' => 'Failed') , 200);
		}
	}

	public function find_contact_post()
	{
		$keyword = trim( $_POST['keyword']);

		if( $keyword === '')
			return $this->response( array('response'=> 'Invaild Keyword') , 200 );

		$result = $this->db->select('c.id , c.name , c.email , c.job , u.username as master')
				 		   ->from('admin_contacts c')
				 		   ->join('admin_users u' , 'u.uid = c.assign_to' , 'left')
				 		   ->like( array('c.name' => $keyword))
				 		   ->get()->result_array();
		$this->response( $result , 200);
	}

	public function bind_contact_company_post()
	{
		$contact_id = intval( $_POST['contact_id']);
		$company_id = intval( $_POST['company_id']);

		if( $this->db->where( array('id' => $contact_id))->update( 'admin_contacts' , array('company_id'=>$company_id)) )
		{

			$this->response( array('response' => 'Successed') , 200);

		}else
		{
			$this->response( array('response' => 'Failed') , 200);
		}

	}

}