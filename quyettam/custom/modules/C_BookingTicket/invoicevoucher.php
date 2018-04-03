<?php
    require('custom/include/mpdf/mpdf.php');
    include('custom/include/ConvertMoneyString/convert_number_to_string.php');
    function format_number_export($val) {
        return str_replace(".",",",format_number($val,0,0));
    }

    class Invoice
    {
        private $customer =array();
        private $tickets = array();
        private $totalAmountTicket =0;
        private $totalAmountVat = 0;
        private $totalPayMent = 0;
        private $dayInvoice;
        private $monthInvoice;
        private $yearInvoice;
        private $moneyString;
        public $fileName;
        public $ticketing;
        public function generateInvoice(){
            $this->getData();
            $html = $this->generateCustomerDetail().$this->generateInvoiceDetail().
            '
            <div class = "total" >
            <table>
            <tr>
            <td style = " width:100px;text-align:right;font-family: arial; font-size:14px;padding-right:13px;"><i>'.format_number_export($this->totalAmountTicket).'</i></td>
            <td style = "width:70px;text-align:right;"></td>
            <td style = "width:100px;text-align:right;font-family: arial; font-size:14px;"><i>'.format_number_export($this->totalAmountVat).'</i></td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td style = "text-align:right;font-family: arial; font-size:14px;"><i>'.format_number_export($this->totalPayMent).'</i></td>
            </tr>
            </table>
            </div>
            <div class = "money_string" style = "width:100%;text-align:left;margin-left:160px;">
            <table>
            <tr><td style="font-family: arial; font-size:14px;"><i>'.$this->moneyString.'</i></td></tr>
            </table></div>
            <!--End Invoice Detail-->
            </body>
            </html>';
            return $html;
        }
        public function generateCustomerDetail(){
            $customerDetail='<html>
            <head>
            </head>
            <body>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <!-- Date-->
            <table class = "date" >
            <tr>
            <td style = "padding-left:8px;padding-top:20px; width:70px; font-family: arial; font-size:14px;"><i>'.$this->dayInvoice.'</i></td>
            <td style = "padding-left:30px;padding-top:20px; width:60px;font-family: arial; font-size:14px;"><i>'.$this->monthInvoice.'</i></td>
            <td style = "padding-left:40px;padding-top:20px;font-family: arial; font-size:14px;"><i>'.$this->yearInvoice.'</i></td>
            </tr>
            </table>
            <!--Date-->
            <!--Customer Info -->
            <table class = "customer" >
            <tr>
            <td colspan="2" style = "font-family: arial; font-size:14px;height: 30px;" >'
            .$this->customer['name'].
            '</td>
            </tr>
            <tr style = "">
            <td colspan="2" style = "font-family: arial; font-size:14px;height: 35px;">'
            .$this->customer['company'].
            '</td>
            </tr> 
            <tr style = "">
            <td colspan="2" style= "font-family: arial; font-size:14px;">'
            .$this->customer['address'].
            '</td>
            </tr>
            <tr>
            <td style = "width:350px;font-family: arial; font-size:14px;">'
            .$this->customer['payment_method'].  
            '</td>
            <td style = "font-family: arial; font-size:14px;">'
            .$this->customer['taxcode']. 
            '</td>
            </tr>
            <tr >
            <td style = "font-family: arial; font-size:14px;">'
            .$this->customer['bank_account_number'].
            '</td>
            <td style = "font-family: arial; font-size:14px;">'
            .$this->customer['bank_name'].  
            '</td>
            </tr>
            </table>
            <!--Customer Info-->';
            return $customerDetail;
        }
        public function generateInvoiceDetail() {
            $invoiceDetail='<!--Invoice Detail-->
            <div class = "invoice_detail">
            <table class = "detail"  style = "margin-left:-65px">';
            $index =1;
            foreach($this->tickets as $ticket){
                if ($ticket['routing'] != '') {
                    $invoiceDetail.='<tr>
                    <td style = "width:30px; valign:bottom;text-align:center;padding-right:5px;font-family:arial;">'
                    .$index.
                    '</td>
                    <td style = "width:250px; valign:bottom;padding-left:10px;"><p>'
                    .$ticket['name'].
                    '</p></td>
                    <td style = "width:79px; valign:bottom;font-family: arial; font-size:14px;">'
                    .'Vé'.
                    '</td>
                    <td style = "width:30px; valign:bottom;font-family: arial; font-size:14px;">'.'
                    1
                    </td>
                    <td style = "width:135px; valign:bottom;padding-right: 40px;text-align:right;font-family: arial; font-size:14px;">'
                    .format_number_export($ticket['total']).
                    '</td>
                    <td style = "width:125px; valign:bottom;padding-right: 10px;text-align:right;font-family: arial; font-size:14px;">'
                    .format_number_export($ticket['total']).
                    '</td>
                    <td style = "width:70px; valign:bottom;padding-left: 15px;text-align:center;font-family: arial; font-size:14px;">'
                    .unformat_number($ticket['vat_percent']).
                    '</td>
                    <td style = "width:140px; valign:bottom; padding-right: 25px;text-align:right;font-family: arial; font-size:14px;">'
                    .format_number_export($ticket['vat_amount']). 
                    '</td>
                    </tr>
                    <tr>
                    <td style = "width:30px; valign:bottom;text-align:center;padding-right:5px;font-family:arial;"></td>
                    <td style = "width:250px; valign:bottom;padding-left:10px;">
                    <p style="margin-top:15px">'.$ticket['routing'].'</p></td>
                    <td style = "width:79px; valign:bottom;font-family: arial; font-size:14px;"></td>
                    <td style = "width:30px; valign:bottom;font-family: arial; font-size:14px;">'.'

                    </td>
                    <td style = "width:135px; valign:bottom;padding-right: 40px;text-align:right;font-family: arial; font-size:14px;"></td>
                    <td style = "width:125px; valign:bottom;padding-right: 10px;text-align:right;font-family: arial; font-size:14px;"></td>
                    <td style = "width:70px; valign:bottom;padding-left: 15px;text-align:center;font-family: arial; font-size:14px;"></td>
                    <td style = "width:140px; valign:bottom; padding-right: 25px;text-align:right;font-family: arial; font-size:14px;"></td>
                    </tr>';    
                }
                else {
                    $invoiceDetail.='<tr>
                    <td style = "width:30px; valign:bottom;text-align:center;padding-right:5px;font-family:arial;">'
                    .$index.
                    '</td>
                    <td style = "width:250px; valign:bottom;padding-left:10px;"><p>'
                    .$ticket['name'].
                    '</p></td>
                    <td style = "width:79px; valign:bottom;font-family: arial; font-size:14px;">'
                    .'Vé'.
                    '</td>
                    <td style = "width:30px; valign:bottom;font-family: arial; font-size:14px;">'.'
                    1
                    </td>
                    <td style = "width:135px; valign:bottom;padding-right: 40px;text-align:right;font-family: arial; font-size:14px;">'
                    .format_number_export($ticket['total']).
                    '</td>
                    <td style = "width:125px; valign:bottom;padding-right: 10px;text-align:right;font-family: arial; font-size:14px;">'
                    .format_number_export($ticket['total']).
                    '</td>
                    <td style = "width:70px; valign:bottom;padding-left: 15px;text-align:center;font-family: arial; font-size:14px;">'
                    .unformat_number($ticket['vat_percent']).
                    '</td>
                    <td style = "width:140px; valign:bottom; padding-right: 25px;text-align:right;font-family: arial; font-size:14px;">'
                    .format_number_export($ticket['vat_amount']). 
                    '</td>
                    </tr>';
                }

                $index++;

            }
            $invoiceDetail.='</table></div>';
            return $invoiceDetail;
        }
        public function getData(){
            $int = new Integer();
            $id = $_GET['record'];
            if(!empty($id)){
                //Get Customer Information
                $bookingTicket = BeanFactory::getBean('C_BookingTicket',$id);
                //Get Ticketing 
                $this->ticketing = $bookingTicket->assigned_user_name;
                $this->customer = array(
                    'address' => $bookingTicket -> address,
                    'taxcode' => $bookingTicket ->taxcode
                );
                $this->customer['name'] = $bookingTicket->parent_name;
                $this->customer['company'] = $bookingTicket->company;
                if($bookingTicket->parent_type=="Accounts"){
                    $account = BeanFactory::getBean('Accounts',$bookingTicket->parent_id);
                    $this->customer['bank_account_number'] = $account->bank_account_number;
                    $this->customer['bank_name']    = $account->bank_name;
                }
                else{
                    $contact = BeanFactory::getBean('Contacts',$bookingTicket->parent_id);
                    $this->customer['bank_account_number'] = $contact->bank_account_number;
                    $this->customer['bank_name']    = $contact->bank_name;
                }
                $this->customer['payment_method'] = 'TM/CK';
                //Set filename
                $this->fileName = 'InvoiceVoucher_'.$bookingTicket->name.'.pdf';
                //Extract day, month, year Invoice
                $dateParts = explode("/",$bookingTicket->invoice_date);
                $this->dayInvoice = $dateParts[0];
                $this->monthInvoice = $dateParts[1];
                $this->yearInvoice = $dateParts[2];
                $bookingTicket -> load_relationship('c_bookingticket_c_ticket_1');
                $ticketList = $bookingTicket->c_bookingticket_c_ticket_1->getBeans();
                if(count($ticketList)<=4){
                    foreach($ticketList as $ticket){
                        if ($ticket->refunded == '1') continue;
                        if (strlen($ticket->routing) > 7) {
                            $this->tickets[] = array(
                                'name' => ($ticket->category == "DOM") ? 'Vé máy bay nội địa ('.substr($ticket->routing,0,8) : 'Vé máy bay quốc tế ('.substr($ticket->routing,0,8),
                                'routing' => substr($ticket->routing,8,strlen($ticket->routing)).')' ,
                                'number' => 1,
                                'price'  => $ticket -> receivable,
                                'total'  => $ticket -> receivable,
                                'vat_percent' => 0,
                                'vat_amount' => 0,
                            );    
                        }
                        else {
                            $this->tickets[] = array(
                                'name' => ($ticket->category == "DOM") ? 'Vé máy bay nội địa ('.$ticket->routing.')' : 'Vé máy bay quốc tế ('.$ticket->routing.')',
                                'routing' => '' ,
                                'number' => 1,
                                'price'  => $ticket -> receivable,
                                'total'  => $ticket -> receivable,
                                'vat_percent' => 0,
                                'vat_amount' => 0,
                            );
                        }
                        //Set total Amount, total AmountVat
                        $this->totalAmountTicket+= $ticket -> receivable;

                    }
                    $this->totalAmountVat= 0;
                    $this->totalPayMent = $this->totalAmountTicket;
                    $this->moneyString = $int->toText(unformat_number($this->totalPayMent)) ;
                }
                else {
                    $total_amount_split = explode(".",$bookingTicket->total_amount_invoice);
                    $this->tickets[] = array(
                        'name' => $bookingTicket->invoice_content,
                        'total'=> $total_amount_split[0],
                    );
                    $this->totalAmountTicket+= $total_amount_split[0];
                    $this->totalPayMent = $this->totalAmountTicket;
                    $this->moneyString = $int->toText(unformat_number($this->totalPayMent));
                }
            }
        }
    }
    $mpdf = new mPDF('utf-8', array(220,297));
    $mpdf->SetImportUse();
    $invoice =new Invoice();
    $html = $invoice->generateInvoice();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $fileName = $invoice->fileName; 
    $mpdf->AddPage();
    //$pagecount = $mpdf->SetSourceFile('custom/uploads/GTGT.pdf');
    //    $tplId = $mpdf->ImportPage($pagecount);
    //    $actualsize = $mpdf->UseTemplate($tplId);
    $stylesheet = file_get_contents('custom/include/css/invoice.css');
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
?>