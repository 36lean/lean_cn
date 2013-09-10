<?php

class Client_file extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function save_file()
	{
		if( $_FILES['file']['size'] > 0)
		{

			if( !is_dir('uploads/excel/'))
				mkdir('uploads/excel/');


			preg_match('/[.].+/', $_FILES['file']['name'] , $match);

			if( empty( $match))
			{
				return false;
			}

			$file = md5( microtime()).$match[0];

			$filepath =  'uploads/excel/'.$file;

			chmod( 'c:/xampp/tmp/' , 0777 );
			move_uploaded_file( $_FILES['file']['tmp_name'] , $filepath );

			$md5 = md5_file( $filepath);

			if( $this->db->select('id')->from('admin_uploads')->where( array('md5'=>$md5))->get()->num_rows())
			{
				unlink( $filepath);
				return false;
			}

			$new = array(
					'filename'		=> trim($_FILES['file']['name']) , 
					'file'			=> $file ,
					'type'			=> $match[0] ,
					'size'			=> $_FILES['file']['size'] ,  
					'md5'			=> $md5 , 
					'createdtime' 	=> time() ,
					);

			$this->db->insert('admin_uploads' , $new);

		}
	}

	public function get_file_list()
	{
		return $this->db->get('admin_uploads')->result_array();
	}

	public function map_to_database()
	{

		$conf = array();

		$conf['file_id'] = intval( $this->input->post('file_id'));
		$conf['file_name'] = $this->input->post('file');
		$conf['batch'] = intval( $this->input->post('batch'));
		unset($_POST['batch']);unset( $_POST['file_id']);unset( $_POST['file']);

		foreach ($_POST as $key => $value) 
		{
			if( preg_match('/^(c_).+/', $value))
			{
				$value = preg_replace('/^(c_)/', '', $value);
				$conf['company'][ $value] = $key;
			}
			else
			{
				$conf['contact'][$value]=$key;
			}
		}

		$data = readexcel( 'uploads/excel/'.$conf['file_name']);

		unset( $data[0]);

		$result = array_filter( $data , function( $tmp){
			$t = array_unique( $tmp);
			if( count( $t)===1 && !$t[0])
				return false;
			return true;
		});

		$size = intval( count( $result) /  $conf['batch']) + 1;

		$x = array_chunk($result,$size);

		foreach ($x as $key => $value) {
			file_put_contents('data/excel/'.($key+1).'.json', json_encode( $value));
		}

		$conf['date'] = date('Y-m-d h:i:s');


		
		file_put_contents('data/cache/config.conf', json_encode( $conf));
	}

	public function to_database()
	{	
		//分配给...
		$assign_to = intval( $this->input->post('assign_to'));
		unset( $_POST['assign_to']);
		//获取映射字段的数目

		$conf = json_decode( file_get_contents('data/cache/config.conf') , true);

		$size = count( $conf['contact']) + count( $conf['company']);

		$i = 0;

		$inner_count = 0;

		foreach ($_POST as $key => $value) {
			if( preg_match('/[_]'.$i.'$/', $key))
			{
				if( preg_match('/^(c_)/', $key))
				{
					$key = preg_replace('/^(c_)/', '', $key);
					$key = preg_replace('/(_'.$i.')$/', '', $key);

					$company [$key] = $value;
				}
				else
				{
					$key = preg_replace('/(_'.$i.')$/', '', $key);
					$contact[$key] = $value;
				}
				$inner_count++;

				if( $size === $inner_count)
				{

					$contact['assign_to'] = $assign_to;

					$contact['modified_date'] = time();

					$contact['from_file_id'] = $conf['file_id'];

					$company['timecreated'] = time();

					$company['created_userid'] = $this->_G['uid'];				
						
					$dup_check = $this->db->select('id,name')
							 			  ->from('admin_company')
							 			  ->order_by('id' , 'desc')
							 		      ->limit(1)
							 			  ->get()->row_array();


					if( !empty( $dup_check) && $dup_check['name'] === trim( $company['name']))
					{
						$contact['company_id'] = $dup_check['id'];
					}else
					{
						$this->db->insert('admin_company' , $company);
						$contact['company_id'] = $this->db->insert_id();
					}

					$this->db->insert('admin_contacts' , $contact);
					$inner_count = 0;
					$i++;
				}

			}



		}
	}
}