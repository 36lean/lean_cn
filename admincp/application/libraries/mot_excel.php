<?php


class Mot_Excel {
	
	private $_e;

	public function __construct() {

	}

	public function setFile( $filePath) {
		$this->_e = new PHPExcel_Reader_Excel2007();
		chmod( $filePath , 0777);
		echo $this->_e->canRead($filePath);
        if( !$this->_e->canRead($filePath)){   
            echo 'no Excel';  
            return ;   
        }
        $this->_e->load( $filePath);
	}

	public function getOutput() {
		print_r( $this->_e);
		$currentSheet = $this->_e->getSheet(0);  /**取得一共有多少列*/ 

		$allColumn = $currentSheet->getHighestColumn();     /**取得一共有多少行*/  

		$allRow = $currentSheet->getHighestRow();

		$all = array();
		
		for( $currentRow = 1 ; $currentRow <= $allRow ; $currentRow++){

          	$flag = 0;
          	$col = array();

          	for($currentColumn='A'; getascii($currentColumn) <= getascii($allColumn) ; $currentColumn++){
             
                $address = $currentColumn.$currentRow;   

                $string = $currentSheet->getCell($address)->getValue();
                
                $col[$flag] = $string;

                $flag++;
        	} 
			$all[] = $col;
		}
		return $all;
	}

	public function getascii( $ch) {

  		if( strlen( $ch) == 1)
    		return ord( $ch)-65;
  		return ord($ch[1])-38;
	}
}



