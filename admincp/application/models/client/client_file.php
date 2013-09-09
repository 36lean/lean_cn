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
}