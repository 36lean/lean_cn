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
	public function insert_row_info( $file_name , $row) {
		$this->db->insert( $this->row, array('row' => $row , 'file_name' => $file_name, 'update_date' => time()));
		return $this->db->insert_id();
	}
	//excel行数据
	public function insert_row_data( $row_id , $rowdata) {
		$this->db->insert( $this->info , array('row_id' => $row_id , 'row_content' => $rowdata));
	}
	//读取所有导入的字段记录 
	public function fetch_excel_rows() {
		return $this->db->order_by('id' , 'desc')->get( $this->row)->result_array();
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
						->limit(25)
						->get()->result_array();
	}

	public function import_client( $map , $import_file_info , $corporation_column) {

		$rule = json_decode( $map['map_rule'] , true);
		//把公司信息跟客户信息分开 $company_rule为企业资料对应关系
		$company_rule = $rule['corporation'];
		//$rule即是客户资料对应关系
		unset( $rule['corporation']);

		$users = $this->db->select('row_content')->from( $this->info)->where( array('row_id' => $map['info_id']))->get()->result_array();

		$success = 0;
		$duplicate = 0;
		$failure = 0;


		foreach ($users as $user) {
			
			//get user's information
			$user = json_decode( $user['row_content'] , true);

			$x = @implode( '',$user);
			if( empty(  $x)) {
				continue;
			}
			
			//映射公司描述信息
			$description = array();
			foreach ($company_rule['description'] as $d) {
				
				$key = $corporation_column[$d];

				$description[$key] = $user[$d];
			}

			$corporation = 	array('name' 			=> $user[$company_rule['name']],
								  'description' 	=> json_encode( $description),
								  'file_id'         => $import_file_info['id'],
								  'generate_date'   => time(),
								  'etc'             => '在 '.date('Y年m月d日 h:i:s').' 添加的企业信息 , 信息来自文件 '.$import_file_info['file_name'].' 的导入',
			);
			
			//mapping columns
			foreach ($rule as $key => $value) {
				if( '99' === $value)
					continue;
				if( !$user[$value])
					$user[$value] = ' ';
				$u [$key] = $user[$value];
			}

			
			$company_id = $this->insert_company( $corporation);
			
			$u['tags'] = $_POST['tags'];
			$u['salesman_id'] = $_POST['dispatch'];
			$u['company_id'] 	= $company_id;
			$u['created_date'] 	= time();
			$u['file_id']      	= $import_file_info['id'];
			
			//check duplicate data
			$this->db->insert( $this->client , $u);
			
			
		}

		echo '<script>alert("导入成功!")</script>';

		//return array('success' => $success , 'failure' => 0 , 'duplicate' => 0);
		
	}

	public function insert_company( $data) {

		if( empty($data['name'])){
			//无任何信息的公司跳过
			return 0;
		}
		
		$company = $this->db->select('id')
				 		   ->from('admin_client_corporation')
				 		   ->where( array('name' => $data['name'] , 'description' => $data['description']))
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

	public function get_export_data()
	{
		$client = $this->db->select('email')->from('admin_client')->where('email is not null')->get()->result_array();
		$member = $this->db->select('email')->from('common_member')->where('email is not null')->get()->result_array();
		
		$x = array();
		$f = 0;
		$tmp = array_merge( $client , $member);
		foreach ($tmp as $key => $value) {
			if( !preg_match( '/^([0-9a-zA-Z\-\_\.]+)[@](([0-9a-zA-Z\-\_]+)[\.])+[a-zA-Z0-9\-\.\_]{1,10}[0-9a-zA-Z]$/i', $value['email']) )
				continue;
			$x[$f] = $value['email'];
			++$f;
		}
		$x = array( $x);
		return $x;

	}
}