<?php
    require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
    include("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");  
    include("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");
    include("custom/include/ConvertMoneyString/convert_number_to_string.php");
    global $timedate, $current_user; 

    array_map('unlink', glob("custom/uploads/*"));
    $objPHPExcel = new PHPExcel();

    //Import Template
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');    
    $objPHPExcel = $objReader->load("custom/include/TemplateExcel/SaleReceipt.xlsx");

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Apollo Center");
    $objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

    //Prepare
    $customerName = $this->bean->parent_name;
    $customerAddress = $this->bean->address;
    $taxCode = $this->bean->taxcode;
    $receiptDate = $timedate->to_db_date($this->bean->invoice_date,false);
    $date = explode('-', $receiptDate);
    $day = $date[2];
    $month   = $date[1];
    $year  = $date[0];
    $receiptDate = $day."-".$month."-".$year;

    $assign = $GLOBALS['db']->getOne("SELECT DISTINCT CONCAT(IFNULL(users.last_name,''),' ',IFNULL(users.first_name,'')) users_full_name FROM users WHERE (((users.id='{$this->bean->assigned_user_id}' )))");

    if ($this->bean->full_payment_method == "Cash") $paymentMethod = "TM";
    else $paymentMethod = "CK";

    $objPHPExcel->getActiveSheet()->SetCellValue('C8', $customerName);
    $objPHPExcel->getActiveSheet()->SetCellValue('C9', $taxCode);
    $objPHPExcel->getActiveSheet()->SetCellValue('C10', $customerAddress);

    //Get Ticket Information
    $sql_tickets = " 
    SELECT distinct c_ticket.id
    FROM c_ticket
    INNER JOIN  c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id=l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted=0
    INNER JOIN  c_bookingticket l1 ON l1.id=l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND l1.deleted=0
    WHERE c_ticket.deleted=0 
    AND l1.id = '".$this->bean->id."'
    ORDER BY c_ticket.ticket_index";

    $result_tickets = $GLOBALS['db']->query($sql_tickets);
    $ticketList = array();
    while($row = $GLOBALS['db']->fetchByAssoc($result_tickets) ){
        $ticket = BeanFactory::getBean('C_Ticket', $row['id']);
        $ticketList[] = $ticket;
    }

    $totalAmount = 0;
    if (count($ticketList) <= 4) {
        for ($i = 0; $i < 4; $i++) {
            $row = 14 + $i;
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, empty($ticketList[$i]->name)? "0" : $ticketList[$i]->name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, empty($ticketList[$i]->routing)? "-" : $ticketList[$i]->routing);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, empty($ticketList[$i])? "-" : "1");
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, empty($ticketList[$i]->receivable)? "-" : format_number($ticketList[$i]->receivable,0,0));
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, empty($ticketList[$i]->receivable)? "-" : format_number($ticketList[$i]->receivable,0,0));
            $totalAmount += $ticketList[$i]->receivable;
        }     
    }
    else {
        for ($i = 0; $i < 4; $i++) {
            $row = 14 + $i;
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $i != 0? "0" : $this->bean->invoice_content);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row,  "-");
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $i != 0? "-" : "1");
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $i != 0? "-" : format_number($this->bean->total_amount_invoice,0,0));
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $i != 0? "-" : format_number($this->bean->total_amount_invoice,0,0));
            if ($i == 0) $totalAmount = $this->bean->total_amount_invoice;
        }
    }

    $objPHPExcel->getActiveSheet()->SetCellValue('F18', format_number($totalAmount,0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('F19', empty($this->bean->vat_amount)? "" : format_number($this->bean->vat_amount,0,0));
    $service_charge = (empty($this->bean->service_charge) || $this->bean->service_charge == 0 )? $this->bean->service_charge_vnd : $this->bean->service_charge;
    $objPHPExcel->getActiveSheet()->SetCellValue('F20', empty($service_charge)? "-" : format_number($service_charge,0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('G21', format_number($totalAmount,0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('D23', $paymentMethod);
    $objPHPExcel->getActiveSheet()->SetCellValue('G25', $receiptDate);

    $int = new Integer();
    $text = $int->toText($totalAmount);
    $objPHPExcel->getActiveSheet()->SetCellValue('B22', $text);
//    $objPHPExcel->getActiveSheet()->SetCellValue('F29', $assign);

    // Rename sheet
    $objPHPExcel->getActiveSheet()->setTitle($this->bean->name);

    //Lock file
    $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

    // Save Excel 2007 file
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('custom/uploads/'. 'Sale Receipt ('. $this->bean->name .').xlsx');

    //download to browser
    $file = 'custom/uploads/'. 'Sale Receipt ('. $this->bean->name .').xlsx';

    $this->bean->invoice_printed = 1;
    $this->bean->save();

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
