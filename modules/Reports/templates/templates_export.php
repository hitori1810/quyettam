<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/export_utils.php');
require_once("custom/include/PHPExcel/Classes/PHPExcel.php");

function template_handle_export(&$reporter)
{
    ini_set('zlib.output_compression', 'Off');
    $reporter->plain_text_output = true;
    //disable paging so we get all results in one pass
    $reporter->enable_paging = false;
    $reporter->run_query();
    $reporter->_load_currency();
    $header_arr = array();
    $header_row = $reporter->get_header_row();

    /**
    * added by Hoc Bui 
    * 22/10/2012
    * 
    * @var PHPExcel
    */

    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("OnlineCRM")
    ->setLastModifiedBy("OnlineCRM")
    ->setTitle($filename)
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");


    // Add export data
    $activeSheet = $objPHPExcel->setActiveSheetIndex(0);

    $row_num = 1;
    $col_num = 0;
    $content = '';
    foreach ($header_row as $cell)
    {
        //array_push($header_arr, $cell);

        $activeSheet->setCellValueExplicitByColumnAndRow($col_num, $row_num, $cell);
        $activeSheet->getStyleByColumnAndRow($col_num,$row_num)->getFont()->setBold(true);
        $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
        $col_num++;

    }
    $row_num++;  
    /*$header = implode("\"".getDelimiter() ."\"",array_values($header_arr));
    $header = "\"" .$header;
    $header .= "\"\r\n";
    $content .= $header;*/


    while (( $row = $reporter->get_next_row('result', 'display_columns', false, true) ) != 0 )
    {
        $new_arr = array();
        $col_num = 0;

        for($i=0;$i < count($row['cells']);$i++)
        {
            //Edit by Bui Kim Tung - Report import Greesoft: unformat currency field
            //For file import GS - VNS
            if ($reporter->saved_report_id == "d2dcc74d-d71c-849e-9e30-55949fec179a") {
                $rate = $row['cells'][20];
                if ($i > 19 && $i < 26) {
                    $row['cells'][$i] = unformat_number($row['cells'][$i]);
                    if ($i != 20) $row['cells'][$i] = $row['cells'][$i]/ unformat_number($rate);
                    $row['cells'][$i] = str_replace(".",",",$row['cells'][$i]);
                    if ($row['cells'][19] != "VND" && !strpos($row['cells'][$i],",") && $i != 20) $row['cells'][$i] = $row['cells'][$i].",00";
                }
                $type = PHPExcel_Cell_DataType::TYPE_STRING;
                $activeSheet->getCellByColumnAndRow($col_num, $row_num)->setValueExplicit(from_html($row['cells'][$i]), $type);
                $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );

            }
            //For file import GS - UNDP
            elseif ($reporter->saved_report_id == "36f00deb-4e76-845f-2176-561f2730d127") {
                $rate = $row['cells'][18];
                if ($i > 17 && $i < 23) {
                    $row['cells'][$i] = unformat_number($row['cells'][$i]);
                    if ($i != 18 && $i != 22) $row['cells'][$i] = $row['cells'][$i]/ unformat_number($rate);
                    $row['cells'][$i] = str_replace(".",",",$row['cells'][$i]);
                    if ($row['cells'][17] != "VND" && !strpos($row['cells'][$i],",") && $i != 18 && $i != 22) $row['cells'][$i] = $row['cells'][$i].",00";
                }
                elseif($i == 16) $row['cells'][$i] = "02";
                $type = PHPExcel_Cell_DataType::TYPE_STRING;
                $activeSheet->getCellByColumnAndRow($col_num, $row_num)->setValueExplicit(from_html($row['cells'][$i]), $type);
                $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
            }
            //For file import GS - other airline
            elseif ($reporter->saved_report_id == "f342e60b-1e03-bccb-90be-5566861b2afc") {
                $rate = $row['cells'][20];
                if ($i > 19 && $i < 31) {
                    $row['cells'][$i] = unformat_number($row['cells'][$i]);
                    if ($i != 20 && $i != 23 && $i != 26 ) $row['cells'][$i] = $row['cells'][$i]/ unformat_number($rate);
                    $row['cells'][$i] = str_replace(".",",",$row['cells'][$i]);
                    if ($row['cells'][19] != "VND" && !strpos($row['cells'][$i],",")   && $i != 20 && $i != 23 && $i != 26) $row['cells'][$i] = $row['cells'][$i].",00";
                }
                $type = PHPExcel_Cell_DataType::TYPE_STRING;
                $activeSheet->getCellByColumnAndRow($col_num, $row_num)->setValueExplicit(from_html($row['cells'][$i]), $type);
                $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
            }
            //For file import GS - Refund
            elseif ($reporter->saved_report_id == "1cc832a7-e503-7079-c34a-55e419e1ed57") {
                $rate = $row['cells'][15];
                if ($i > 14 && $i < 27) {
                    $row['cells'][$i] = unformat_number($row['cells'][$i]);
                    if ($i != 15 && $i != 18 && $i != 21) $row['cells'][$i] = $row['cells'][$i]/ unformat_number($rate);
                    $isInt = is_int($row['cells'][$i]);
                    $row['cells'][$i] = str_replace(".",",",$row['cells'][$i]);
                    if ($row['cells'][14] != "VND" && !strpos($row['cells'][$i],",") && $i != 15 && $i != 18 && $i != 21) $row['cells'][$i] = $row['cells'][$i].",00";
                }
                $type = PHPExcel_Cell_DataType::TYPE_STRING;
                $activeSheet->getCellByColumnAndRow($col_num, $row_num)->setValueExplicit(from_html($row['cells'][$i]), $type);
                $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
            }
            // For report T01 - Báo cáo vé bán
            elseif ($reporter->saved_report_id == "ce879266-5ac7-f3b1-efb7-55b1c7472ce6" || $reporter->saved_report_id == "4cfb0fc5-3b52-35dd-2b67-55d582f69f76") {
                $rate = $row['cells'][22];
                if (($i > 6 && $i < 18) || $i == 22) {
                    $row['cells'][$i] = unformat_number($row['cells'][$i]);
                    $activeSheet->getCellByColumnAndRow($col_num, $row_num)->setValueExplicit(from_html($row['cells'][$i]), PHPExcel_Cell_DataType::TYPE_NUMERIC);
                    $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode('0');
                }
                // Format string for "Ticket No" coloumn
                elseif ($i == 1) {
                    $type = PHPExcel_Cell_DataType::TYPE_STRING;
                    $activeSheet->getCellByColumnAndRow($col_num, $row_num)->setValueExplicit(from_html($row['cells'][$i]), $type);
                    $activeSheet->getStyleByColumnAndRow($col_num, $row_num)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );
                }
                else {
                    $activeSheet->setCellValueExplicitByColumnAndRow($col_num, $row_num, from_html($row['cells'][$i]));  
                }


            }
            else {
                $activeSheet->setCellValueExplicitByColumnAndRow($col_num, $row_num, from_html($row['cells'][$i]));  
            }
            //--- End edit by Bui Kim Tung
            $col_num++;
        }
        $row_num++;

        /*$line = implode("\"".getDelimiter() ."\"",$new_arr);
        $line = "\"" .$line;
        $line .= "\"\r\n";

        $content .= $line;*/
    }
    /*global $locale;

    ob_clean();
    header("Pragma: cache");
    header("Content-type: application/octet-stream; charset=".$locale->getExportCharset());
    header("Content-Disposition: attachment; filename={$_REQUEST['module']}.csv");
    header("Content-transfer-encoding: binary");
    header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header( "Last-Modified: " . TimeDate::httpTime() );
    header( "Cache-Control: post-check=0, pre-check=0", false );
    header("Content-Length: ".mb_strlen($GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset())));
    print $GLOBALS['locale']->translateCharset($content, 'UTF-8', $locale->getExportCharset());*/


    // Rename worksheet
    if(PHPExcel_Shared_String::CountCharacters($reporter->name) > 31)
        $reporter->name = substr($reporter->name,0,31);//max character per sheetname
    //       $objPHPExcel->getActiveSheet()->setTitle($reporter->name);

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$reporter->name.'.xls"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    ob_end_clean();
    $objWriter->save('php://output');
    exit;



}

?>