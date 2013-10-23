<?php
require_once FCPATH.'/vendor/phpquery/phpquery.php';

class M_portal extends CI_Model
{
	public function save_rule()
	{
		$rule_title = trim( $this->input->post('rule_name'));
		unset( $_POST['rule_name']);

		$filter = array();

		foreach ($_POST as $key => $value) {
			$filter[$key] = trim( $value);
		}

		file_put_contents( 'data/spider/'.$rule_title.'.json', json_encode( $filter));
	}

	public function save_source()
	{

		$source_title = trim( $this->input->post('source_name'));

		$link = explode('<>' , trim( $this->input->post('page_url')));

		$result = array('match' => trim( $this->input->post('list')) , 'rule_name'=>$this->input->post('rule_name') , 'link' => $link );

		file_put_contents( 'data/spider_source/'.$source_title.'.json', json_encode( $result));

	}

	public function get_test_data( $rule , $info , $debug = FALSE )
	{

		$data = array();

		foreach ($info['link'] as $link) {

			$html = file_get_contents( $link);

			phpQuery::newDocumentHTML( $html , 'utf-8');

			$page_links = pq( $info['match'] );

			foreach ($page_links as $li) {

				$z = pq( $li);
			
				$href = $z->attr('href');

				

				if( preg_match('/^([\.]|[\/])/', $href)){

					$href = str_replace('../../', '', $href);

					$href = 'http://firehare.blog.51cto.com/blog/'.$href;
				}

				//$href = preg_replace('=^[http]|[https]://=', '', $href);

				$result [] = array( 'title' => $z->text() , 'url' => $href);
			}
		}

		foreach ($result as $page) {
			
			$html = file_get_contents( $page['url']);
			
			phpQuery::newDocumentHTML( $html , 'utf-8');


			foreach ($rule as $key => $value) {

				if( !$value)
					continue;
				$staff = pq( $value);
				$data[$key] =  $staff->html();
			}	

			$data['post_modified'] = date('Y-m-d h:i:s');
			//$data['post_date']     = date('Y-m-d h:i:s');

			//var_dump( $data);

			if( $this->db->select('id')->from('attach_posts')->where( array('post_content' => $data['post_content']))->get()->num_rows() === 0 )
			{

				if( $debug)
					return $data; 
				$this->db->insert( 'attach_posts' , $data);
			}
		}
	}

	public function copy()
	{

		$file = file_get_contents( $this->input->post('page_url'));
		
		$demo = phpQuery::newDocumentHTML( $file , 'utf-8');

		$data = pq( $rule );

		foreach ($data as $li) {

			$z = pq( $li);
			
			$href = $z->attr('href');

			$href = preg_replace('=^[http]|[https]://=', '', $href);
				
			$href = preg_replace('|\/\/|', '/', $href);

			preg_match_all('/\//', $href , $match);

			$result [] = array( 'title' => $z->text() , 'content' => $href);
		}

		//var_dump( $result);
	}

	public function get_file_ergodic( $path)
	{
		if( !is_dir( $path))
			return false;

		$f = opendir( $path);

		$result = array();

		while( $file = readdir( $f))
		{
			if( preg_match('/^\.|\.\.$/', $file))
				continue;
			$result[] = $file;
		}

		return $result;
	}

	public function seo_updates()
	{
		if( $this->input->post('seo_updates'))
		{
			unset( $_POST['seo_updates']);
			$id = intval( $this->input->post('id'));
			unset( $_POST['id']);

			foreach ($_POST as $key => $value) {
				$_POST[$key] = trim( $value);
			}

			$this->db->where( array('id'=>$id))->update('attach_seo' , $_POST);

			redirect('portal/seo');
		}
	}

	public function eg_filter()
	{

		var_dump( $_POST);

		$mode = trim( $this->input->post('preg'));

		$column = $this->input->post('column');

		$data = $this->db->select( 'id,'.$column)
						 ->from( 'attach_posts')
						 ->get()
						 ->result_array();

		echo '<pre>';

		foreach ($data as $text) {
				
			preg_match( '/'.$mode .'/i', $text[$column] , $match);

			if( count( $match ) ){
				echo $text['id'];
				var_dump( $match);
			}

		}
		echo '</pre>';

	}
}