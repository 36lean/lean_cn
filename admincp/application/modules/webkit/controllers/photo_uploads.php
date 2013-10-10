<?php

class Webkit_photo_uploads_module extends CI_Module 
{
	public function uploads()
	{
		$this->load->view('photo_uploads');

	}

	public function handle()
	{

		$file = array();

		if( $_FILES['Filedata']['error'] === 0)
		{

			$re = preg_split('/(\.)/', $_FILES['Filedata']['name']);

			if( !in_array( $re[1], array('png' , 'jpeg' , 'jpg' , 'bmp' , 'ico' , 'gif')))
			{
				echo 'file type error : '.$re[1];
				return ;
			}

			$file ['size'] = $_FILES['Filedata']['size'];
			$file ['name'] = date('Ymdhis') . ( microtime() * 1000000 ) . '.' . $re[1];
			$file ['timecreated'] = time();

			move_uploaded_file( $_FILES['Filedata']['tmp_name'], 'uploads/photos/'.$file['name']);

			$file['token'] = md5_file( 'uploads/photos/'.$file['name'] );

			$this->db->insert('admin_uploads_photos' , $file);

			echo base_url('uploads/photos/'.$file['name']);

		}else
		{
			echo 'uploads error : '.$_FILES['Filedata']['error'];
		}
	}
}