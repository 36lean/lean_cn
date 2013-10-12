<?php
/** Error reporting */
error_reporting(E_ALL);

/** PHPExcel */
include FCPATH.'vendor/Excel/excel/PHPExcel.php';
include FCPATH.'vendor/Excel/excel/PHPExcel/Writer/Excel5.php';


function download(  $column , $datalist) {
// Create new PHPExcel object

$objPHPExcel = new PHPExcel();

// Set properties

$objPHPExcel->getProperties()->setCreator("Michael");
$objPHPExcel->getProperties()->setLastModifiedBy("MOT");
$objPHPExcel->getProperties()->setTitle("36lean email list");
$objPHPExcel->getProperties()->setSubject("Emails");
$objPHPExcel->getProperties()->setDescription("Array to Excel");

// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$basic = 'A';
foreach ($column as $c) {

    $objPHPExcel->getActiveSheet()->SetCellValue( $basic.'1', $c);
    
    $basic ++ ;
}

$max_length = count( $datalist) - 1;

for ($count = 0; $count <= $max_length; $count++) { 

    $basic = 65;

    var_dump( $datalist[$count]);

    foreach ($datalist[$count] as $key => $d) {

        $basic = chr( $basic);

        $objPHPExcel->getActiveSheet()->SetCellValue( $basic.($count+2) , $d);

        $basic = ord( $basic) + 1;
    }

    $basic = 65;
}


//$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');

// Rename sheet

$objPHPExcel->getActiveSheet()->setTitle('Simple');

        
// Save Excel 2007 file
$fhandle = opendir('data/download/');

while($file = readdir( $fhandle))
{
    if( is_file( 'data/download/'.$file))
    {
        unlink( 'data/download/'.$file);
    }
}

$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
$filename = 'data/download/'.md5(time()).'.xls';
$objWriter->save($filename);

return base_url( $filename);
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Cache-Control: max-age=0');

}
