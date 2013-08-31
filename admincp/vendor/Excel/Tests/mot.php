<?php
require_once '../excel/PHPExcel/IOFactory.php';
set_time_limit(0);

$filePath = 'Test.xls';  
$PHPReader = new PHPExcel_Reader_Excel2007();
         if(!$PHPReader->canRead($filePath)){   
             $PHPReader = new PHPExcel_Reader_Excel5();   
                   if(!$PHPReader->canRead($filePath)){         
                        echo 'no Excel';  
                         return ;   
                       }  
          }  
$PHPExcel = $PHPReader->load($filePath);  

$currentSheet = $PHPExcel->getSheet(0);  /**取得一共有多少列*/ 

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

echo '<pre>';
print_r( $all);
echo '</pre>';


function getascii( $ch) {
  if( strlen( $ch) == 1)
    return ord( $ch)-65;
  return ord($ch[1])-38;
}