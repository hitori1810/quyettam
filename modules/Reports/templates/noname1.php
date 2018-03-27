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
                //array_push($new_arr, preg_replace("/\"/","\"\"", from_html($row['cells'][$i])));
                $activeSheet->setCellValueExplicitByColumnAndRow($col_num, $row_num, from_html($row['cells'][$i]));
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
        $objWriter->save('php://output');
        exit;



    }

?>