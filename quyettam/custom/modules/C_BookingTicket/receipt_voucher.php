<?php
    require('custom/include/mpdf/mpdf.php');

    function format_number_export($val) {
        return str_replace(".",",",format_number($val,0,0));
    }

    class Receipt{
        private $invoiceDate;
        private $tickets = array();
        private $creceiver;
        private $customer;
        private $market_fare;
        private $airport_tax;
        private $service_charge;
        private $discount_amount;
        private $totalAmount;
        private $documentId;
        public $fileName;
        public $airline;
        public $ticketing;
        public $team;
        public $ticket_num;
        public function generateReceipt(){
            // assign value for attributes
            $this->getData();
            $receipt_detail = "";
            foreach($this->tickets as $ticket){
                $ss_receipt_detail = new Sugar_Smarty();
                $ss_receipt_detail->assign("TICKET_NUMBER",$ticket['ticket_number']);
                $ss_receipt_detail->assign("PAX_NAME",$ticket['pax_name']);
                $ss_receipt_detail->assign("ROUTING",$ticket['routing']);
                $ss_receipt_detail->assign("MARKET_FARE",format_number_export($ticket['market_fare']));
                $ss_receipt_detail->assign("AIRPORT_TAX",format_number_export($ticket['airport_tax']));
                $ss_receipt_detail->assign("VAT_AMOUNT",format_number_export($ticket['vat_amount']));
                $ss_receipt_detail->assign("SERVICE_CHARGE",format_number_export($ticket['service_charge']));
                $ss_receipt_detail->assign("TOTAL",format_number_export($ticket['total']));
                $receipt_detail .= $ss_receipt_detail->fetch('custom/modules/C_BookingTicket/tpl/receipt_item_template.tpl'); 
            }
            $logo_link = "custom/images/gotadi_logo.png";
            $center_address = "Địa chỉ: GOTADI - 194 Nguyen Tih Minh Khai, Ward 6, District 3, HCM City, Vietnam";
            $center_phone = "TEL: +84-8-62 850 850";
            $center_email = "Call Centre: 1900 9002";
            $bookingCodeHTML = "";
            if ($this->team != "4fdc03ef-bb25-fb9f-a8f7-5513b2ca8f54") {
                switch ($this->airline) {
                    case "TK":
                        $logo_link = "custom/images/tk_logo.png";
                        $center_address = "Địa chỉ: HG TRAVEL - 194 Nguyễn Thị Minh Khai, P6 , Quận 3, Tp. HCM , Việt Nam";
                        $center_phone = "Điện thoại: +84 8 39 330 330";
                        $center_email = "Email: tktsgn.aa@hgtravel.com";
                        $bookingCodeHTML = "<td></td>
                        <td></td> 
                        <td></td> 
                        <td class='lbl_document_id'>Booking Code:</td> 
                        <td class='document_id'></td>";
                        break;
                    case "K6A":
                        $logo_link = "custom/images/k6a_logo.png";
                        $center_address = "Địa chỉ: HG AVIATION - Tầng 8, AB Tower, 76 Lê Lai, Quận 1, Tp.HCM, Việt Nam";
                        $center_phone = "Điện thoại: +84 8 39 360 360";
                        $center_email = "Email: saigon@thy.com.vn";
                        break;
                    case "AA":
                        $logo_link = "custom/images/aa_logo.png";
                        $center_address = "Địa chỉ: HG TRAVEL - 194 Nguyễn Thị Minh Khai, P6 , Quận 3, Tp. HCM , Việt Nam";
                        $center_phone = "Điện thoại: +84 8 39 330 330";
                        $center_email = "Email: tktsgn.aa@hgtravel.com";
                        break;
                    case "DB":
                        $logo_link = "custom/images/db_logo.png";
                        $center_address = "Địa chỉ: HG AVIATION - Tầng 8, AB Tower, 76 Lê Lai, Quận 1, Tp.HCM, Việt Nam";
                        $center_phone = "Điện thoại: +84 8 39 360 360";
                        $center_email = "Email: saigon@thy.com.vn";
                        break;
                    default:
                }
            }

            $ss_receip_template = new Sugar_Smarty();
            $ss_receip_template->assign("LOGO_LINK",$logo_link);
            $ss_receip_template->assign("DOCUMENT_ID",$this->documentId);
            $ss_receip_template->assign("BOOKING_CODE",$bookingCodeHTML);
            $ss_receip_template->assign("INVOICE_DATE",$this->invoiceDate);
            $ss_receip_template->assign("RECEIVER",$this->receiver);
            $ss_receip_template->assign("CUSTOMER",$this->customer);
            $ss_receip_template->assign("RECEIPT_DETAIL",$receipt_detail);
            $ss_receip_template->assign("TOTAL_AMOUNT",format_number_export($this->totalAmount));
            $ss_receip_template->assign("TICKETING",$this->ticketing);
            $ss_receip_template->assign("CENTER_ADDRESS",$center_address);
            $ss_receip_template->assign("CENTER_PHONE",$center_phone);
            $ss_receip_template->assign("CENTER_EMAIL",$center_email);
            return $ss_receip_template->fetch('custom/modules/C_BookingTicket/tpl/receipt_template.tpl'); 
        } 

        public function generateRecieptDetail(){
            $receiptDetail ='<table class = "ticket" style = "margin-top:5px">';
            foreach($this->tickets as $ticket){

                $receiptDetail.='<tr>
                <td style = "height:20.4px; width: 105px; text-align:center;">'
                .$ticket['ticket_number'].
                '</td>
                <td style = "width: 117px; text-align:center; ">'
                .$ticket['pax_name'].
                '</td>
                <td style = " width: 117px;">'
                .$ticket['routing'].
                '</td>
                <td style = " width: 85px; text-align:right;padding-right:10px;">
                '.format_number_export($ticket['market_fare']).'
                </td>
                <td style = "width: 60px; text-align:right;padding-right:10px;">
                '.format_number_export($ticket['airport_tax']).'
                </td>
                <td style = "width: 53px; text-align:right; padding-right:10px;">'
                .format_number_export($ticket['vat_amount']).
                '</td>
                <td style = "width: 60px;text-align:right;padding-right:10px;">
                '.format_number_export($ticket['service_charge']).'  
                </td>
                <td style = "width: 60px;text-align:right;padding-right:13px;">
                '.format_number_export($ticket['discount_amount']).'
                </td>
                <td style = " text-align:right;padding-right:15px">'
                .format_number_export($ticket['total']).
                '</td>
                </tr>'; 
            }
            $receiptDetail.='</table>';
            return $receiptDetail; 
        }

        //Get data from Booking Ticket, Customer, Ticket
        public function getData(){
            $id = $_GET['record'];
            if(!empty($id)){
                //Get Customer Information
                $bookingTicket = BeanFactory::getBean('C_BookingTicket',$id);
                $this->receiver = $bookingTicket->parent_name;
                $this->customer = $bookingTicket->parent_name;
                //Set filename
                $this->fileName = 'ReceiptVoucher_'.$bookingTicket->name.'.pdf';
                //Get date
                $this->invoiceDate = $bookingTicket->booking_date;
                //Get Booking Code
                $this->documentId = $bookingTicket->internal_doc_id;

                $this->team =   $bookingTicket->team_id;
                $this->ticketing =   $bookingTicket->assigned_user_name;
                $this->ticket_num = 0;

                //Get Ticket Information
                $sql_tickets = " 
                SELECT distinct c_ticket.id
                FROM c_ticket
                INNER JOIN  c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id=l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted=0
                INNER JOIN  c_bookingticket l1 ON l1.id=l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND l1.deleted=0
                WHERE c_ticket.deleted=0 
                AND l1.id = '".$id."'
                ORDER BY c_ticket.ticket_index";

                $result_tickets = $GLOBALS['db']->query($sql_tickets);
                $ticketList = array();
                while($row = $GLOBALS['db']->fetchByAssoc($result_tickets) ){
                    $ticket = BeanFactory::getBean('C_Ticket', $row['id']);
                    if(empty($this->airline)) $this->airline = $ticket->airline;

                    if ($ticket->refunded == '1' || !empty($ticket->c_ticket_c_ticket_1c_ticket_ida )) continue;
                    $this->tickets[] = array(
                        'ticket_number' => $ticket->name,
                        'pax_name' => $ticket->pax_name,
                        'routing'  => strlen($ticket->routing) < 17 ? $ticket->routing : substr($ticket->routing,0,15)."..." ,
                        'total'  => $ticket -> receivable  ,
                        'vat_percent' => $ticket->vat_percent,
                        'vat_amount' => $ticket ->vat_amount ,
                        'market_fare' => $ticket ->market_fare ,
                        'airport_tax' => $ticket ->airport_tax ,
                        'service_charge' => $ticket->service_charge == 0? $ticket->service_charge_vnd : $ticket->service_charge,
                        'discount_amount' => $ticket ->discount,
                    );
                    //Set total Amount, total AmountVat
                    $this->totalAmount+= $ticket -> receivable;
                    $this->ticket_num++;
                }
            }
        }
    } 

    $mpdf = new mPDF('','', 0, '', 7, 7, 16, 16, 9, 9, 'L');
    $mpdf->SetImportUse();
    $receipt = new Receipt();
    $html = $receipt->generateReceipt();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $fileName = $receipt->fileName; 
    //Add First page
    $mpdf->AddPage();
    $pagecount = $mpdf->SetSourceFile('custom/uploads/pdf_template/receipt_empty.pdf');
    $tplId = $mpdf->ImportPage();
    $actualsize = $mpdf->UseTemplate($tplId);
    $stylesheet = file_get_contents('custom/modules/C_BookingTicket/tpl/css/receipt_style.css');
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html,2);
    $mpdf->Output('custom/uploads/'.$fileName,'F');

    //download to browser
    $file = 'custom/uploads/'.$fileName;

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

    //delete file in sugar's folder
    unlink($file);
?>
