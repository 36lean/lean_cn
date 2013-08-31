<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once '../Classes/PHPExcel/IOFactory.php';

$data = PHPExcel_IOFactory::load("Test.xls");

$objWriter = PHPExcel_IOFactory::createWriter($data,'Excel2007');

$row = $objWriter->getSheet(0);

echo $row;
exit;

$excel = $objWriter->getPHPExcel();

$ite = $excel->getWorksheetIterator();

print_r( get_class_methods( $ite));

print_r( $ite->current());
/*
foreach( $excel->getWorksheetIterator() as $SheetIterator){
	print_r( get_class_methods( $SheetIterator));

}
*/