<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'Base_Controller.php';
class Finance extends Base_Controller
{

	public function index()
	{

		
		$year = array('2010' , '2011' , '2012' , '2013');

		$data = array();

		$return = array();

		foreach ($year as $y) {
			$data = json_decode( file_get_contents( 'http://www.foxapi.com/API/Finance.Lottery.ShuangSeQiu/?year='.$y.'&apiid=C8BB2517FBA5296183F8BA181B293B3C&alt=json') , true);


			foreach ($data['Infos'] as $record) {
				$return[] = $record; 
				$this->db->insert( 'admin_finance' , $record);
			}
		}

		$return = $this->db->order_by('Issue' , 'desc')->group_by('Issue')->get('admin_finance')->result_array();

		$this->template->build('finance/index' , array('data'=>$return));

	}
}