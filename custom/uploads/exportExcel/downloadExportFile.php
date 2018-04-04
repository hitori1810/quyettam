<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

chdir($_SERVER['DOCUMENT_ROOT']);  

require_once('/include/entryPoint.php');
require_once('/custom/include/utils/ApiHelper.php');

require_once("custom/include/PHPExcel/Classes/PHPExcel.php");
require_once("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php"); 
require_once("custom/include/_helper/convertMoneyString.php"); 

ob_clean();    

global $current_user, $timedate;
$inputFileName = dirname(__FILE__)."/".'export_payment.xlsx';

try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} 
catch(Exception $e) {
    $GLOBALS['log']->fatal("Template file not found");                          
}  

// Set document properties
$objPHPExcel->getProperties()->setCreator($current_user->name)
->setLastModifiedBy($current_user->name)
->setTitle("QuyetTam")
->setSubject("QuyetTam")
->setDescription("QuyetTam")
->setKeywords("QuyetTam")
->setCategory("QuyetTam");    

$id = $_REQUEST['record'];

$sql = "
SELECT p.id                      
, IFNULL(name, '') name
, IFNULL(p.customer, '') customer
, IFNULL(c.first_name, '') customer_name
, IFNULL(p.payment_date, '') payment_date
, IFNULL(p.payment_amount, '') payment_amount
, IFNULL(p.payment_detail, '') payment_detail
, IFNULL(p.description, '') description 
FROM j_payment p 
INNER JOIN contacts c ON c.id = p.customer AND c.deleted <> 1
WHERE p.deleted <> 1
AND p.id = '$id'";

$result = $GLOBALS['db']->query($sql);
$returnList = array();
$data = $GLOBALS['db']->fetchByAssoc($result);

$sql = "
SELECT id                  
, IFNULL(name, '') name
, IFNULL(unit, '') unit               
FROM products
WHERE deleted <> 1";      
$result = $GLOBALS['db']->query($sql);
$productOptions = array();
while($row = $GLOBALS['db']->fetchByAssoc($result)){        
    $productOptions[$row['id']] = $row;                                                    
} 

$payDetail = json_decode(html_entity_decode($data['payment_detail']), true);                                                                                
$objPHPExcel->setActiveSheetIndex(0);    
$objPHPExcel->getActiveSheet()->getCell('B7')->setValue("Tên khách hàng: ".$data['customer_name']);
$currentRow = 10;
foreach($payDetail as $key => $value){
    $objPHPExcel->getActiveSheet()->getCell('B'.$currentRow)->setValue($productOptions[$value['product']]['name']);    
    $objPHPExcel->getActiveSheet()->getCell('E'.$currentRow)->setValue($productOptions[$value['product']]['unit']);    
    $objPHPExcel->getActiveSheet()->getCell('F'.$currentRow)->setValue($value['quantity']);    
    $objPHPExcel->getActiveSheet()->getCell('G'.$currentRow)->setValue($value['unit_cost']);    
    $objPHPExcel->getActiveSheet()->getCell('H'.$currentRow)->setValue($value['payment_amount']);    
    $currentRow++;
}

$int = new Integer();
$moneyStr = $int->toText(unformat_number($data['payment_amount']));
$objPHPExcel->getActiveSheet()->getCell('A27')->setValue("Cộng thành tiền (viết bằng chữ): ".$moneyStr);


$dateParts = explode("-", $GLOBALS['timedate']->nowDbDate());
$dateStr = "Ngày ".$dateParts[2]." tháng ".$dateParts[1]." năm ".$dateParts[0];
$objPHPExcel->getActiveSheet()->getCell('F29')->setValue($dateStr);

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$section = create_guid_section(6);  
$filename = 'Payment_'.$section.'.xlsx'; 
$file = $filename; 
$objWriter->setPreCalculateFormulas(); 
$objWriter->save($file);                               

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    unlink($file);
    exit;
} 
?>