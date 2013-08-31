<?php


class Client_excel extends CI_Model {
	//字段
	private $info = 'admin_client_info';
	//原始的用户信息
	private $row = 'admin_client_row';
	//客户信息
	private $client = 'admin_client';

	public function __construct() {
		parent::__construct();
	}


	//excel字段信息
	public function insert_row_info( $row) {
		$this->db->insert( $this->row, array('row' => $row , 'update_date' => time()));
		return $this->db->insert_id();
	}
	//excel行数据
	public function insert_row_data( $row_id , $rowdata) {
		$this->db->insert( $this->info , array('row_id' => $row_id , 'row_content' => $rowdata));
	}
	//读取所有导入的字段记录 
	public function fetch_excel_rows() {
		return $this->db->get( $this->row)->result_array();
	}

	//读取字段
	public function fetch_excel_row_by_id( $id) {
		return $this->db->where( array( 'id' => $id))->from( $this->row)->get()->result_array();
	}
	//读取json客户资料
	public function fetch_excel_row_info( $id) {
		return $this->db->select('id,row_content')
						->where( array( 'row_id' => $id))
						->from( $this->info)
						->limit(10)
						->get()->result_array();
	}

	public function import_client( $map) {
		$rule = json_decode( $map['map_rule'] , true);

		$users = $this->db->select('row_content')->from( $this->info)->where( array('row_id' => $map['info_id']))->get()->result_array();

		$success = 0;
		$duplicate = 0;
		$failure = 0;

		foreach ($users as $user) {
			
			//get user's information
			$user = json_decode( $user['row_content'] , true);

			//mapping columns
			foreach ($rule as $key => $value) {
				if( '99' === $value)
					continue;
				if( !$user[$value])
					$user[$value] = ' ';
				$u [$key] = $user[$value];
			}

			$company_id = $this->insert_company( 
									array('name' 			=> $u['cname'],
										  'description' 	=> $u['cdescription'],
										  'address'         => $u['caddress'],
										  'generate_date'   => time(),
			));
			unset( $u['cname']);unset( $u['cdescription']);unset( $u['caddress']);

			$u['company_id'] = $company_id;
			$u['created_date'] = time();
			$u['etc'] = '';
			//check duplicate data
			$exist = $this->db->select('id')->from( $this->client)->where( array('name' => $u['name'] ))->get()->num_rows();
			
			
			if( 0 === $exist) {
				if( $this->db->insert( $this->client , $u))
					$success++;
				else
					$failure++;
			}else {
					$duplicate++;
			}
		}

		return array('success' => $success , 'failure' => $failure , 'duplicate' => $duplicate);
	}

	public function insert_company( $data) {
		$company = $this->db->select('id')
				 		   ->from('admin_client_corporation')
				 		   ->where( array('name' => $data['name'] , 'address' => $data['address']))
				 		   ->get();
		

		if( 0 === $company->num_rows()) {
			$this->db->insert( 'admin_client_corporation' , $data);
			return $this->db->insert_id();
		}else {
			$re =  $company->result_array();
			return $re[0]['id'];
		}
	}

	public function number_of_import_data( $id) {
		return $this->db->select('id')
						->from( $this->info)
						->where( array('row_id' => $id))
						->get()->num_rows();

	}
}