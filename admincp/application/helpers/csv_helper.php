<?php
require_once( FCPATH.'Excel/excel/PHPExcel/IOFactory.php');


/*
function readcsv( $file) 
{
   $file = fopen( $file , 'r');
   echo '<pre>';
   while( $row = fgetcsv( $file)) {
        print_r( $row);
   }
}
*/



function readcsv( $file) {

    echo '<pre>';
    $Reader = PHPExcel_IOFactory::createReader('CSV');
    
    $Reader->setInputEncoding('UTF-8');


    $csv = $Reader->load( $file);

    $sheet = $csv->getSheet(0);

    $allColumn  = $sheet->getHighestColumn();
    $allRow     = $sheet->getHighestRow();

    $result = array();
    for( $currentRow = 1 ; $currentRow <= $allRow ; $currentRow++)
    {
        $flag = 0;
          $col = array();
          for($currentColumn='A'; getascii($currentColumn) <= getascii($allColumn) ; $currentColumn++){
             
                $address = $currentColumn.$currentRow;   

                $string = $sheet->getCell($address)->getValue();
                
                $col[$flag] = $string;

                $flag++;

                $result [] = $col;
          } 
    }

    print_r( $result);

}


/*
function readcsv($filename)  
{  

    $row = 1;
    if(($handle = fopen($filename, "r")) !== false)   
    {  
        while(($dataSrc = fgetcsv($handle)) !== false)   
        {  
            $num = count($dataSrc);  
            for ($c=0; $c < $num; $c++)
            {  
                if($row === 1)
                {  
                    $dataName[] = mb_convert_encoding($dataSrc[$c] ,'UTF-8', 'UTF-16');
                }  
                else  
                {  
                    foreach ($dataName as $k=>$v)  
                    {  
                        if($k == $c)
                        {  
                            $data[$v] = mb_convert_encoding( $dataSrc[$c] , 'UTF-8' , 'UTF-16');

                        }  
                    }  
                }  
            }  
            if(!empty($data))  
            {  
                 $dataRtn[] = $data;  
                 unset($data);  
            }  
            $row++;  
        }  
        fclose($handle);

        echo '<pre>';
        print_r( $dataRtn);
        return $dataRtn;
    }  
}  

*/

/*
function readLine($file, $line_num, $delimiter="n")
{

    $i = 1;

    $fp = fopen( $file, 'r' );

    while ( !feof ( $fp) )
    {
        
        $buffer = stream_get_line( $fp, 1024, $delimiter );
        
        if( $i == $line_num )
        {
            
            return $buffer;
        }
        
        $i++;
        
        $buffer = '';
    }
    return false;
}
*/
