<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

class C_BookingTicketViewEdit extends ViewEdit
{
    function display(){
        global $timedate;
        //User can not edit booking after 1 day form date_modifed
        $now_date   = strtotime($timedate->nowDbDate());
        $check_date = strtotime($timedate->to_db_date($this->bean->date_modified));  
        if ($now_date > $check_date && !ACLController::checkAccess('C_BookingTicket', 'import', true) && ($this->bean->status == "Ticketed" || $this->bean->status == "Exchanged" || $this->bean->status == "Exchanged AA-TK") && $_POST['duplicateType'] != "Refund"){
            echo '
            <script type="text/javascript">
            alert("You may not be authorized to edit this booking !");
            location.href=\'index.php?module=C_BookingTicket&action=DetailView&record='.$this->bean->id.'\';
            </script>'; 
            die();
        }

        if(!isset($this->bean->id) || empty($this->bean->id) || $_POST['isDuplicate'] == 'true'){
            $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold" id = "code"> Auto-generate </span>');
            $this->bean->user_sale = $this->bean->assigned_user_name;
            $this->bean->user_sale_id = $this->bean->assigned_user_id;
        }else{
            $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold" id = "code">'.$this->bean->name.'</span>'); 
        }

        if( empty($this->bean->internal_doc_id) || $_POST['isDuplicate'] == 'true'){
            $this->ss->assign('DOCID', '<span style="color:red;font-weight:bold"> Auto-generate </span>');
        }
        else{
            $this->ss->assign('DOCID', '<span style="color:red;font-weight:bold" id = "code">'.$this->bean->internal_doc_id.'</span>'); 
        }

        $duplicateType = "";

        //If refund booking, change stauts
        if ($_POST['duplicateType'] == "Refund") {
            $this->bean->status = "Refunded";    
            $this->bean->io_code = "";    
            $this->bean->full_payment_date = "";    
            $duplicateType = "Refund";
            $currentDatetimeParts = explode(" ",$timedate->now());
            $this->bean->refund_date = $currentDatetimeParts[0];
        } 
        $this->ss->assign('DUPLICATE_TYPE','$duplicateType');

        // assign list of  currencies
        $currencies = array();
        $currencies['1'] = $GLOBALS['sugar_config']['default_currency_iso4217'] ;
        $crc_html = '<select name="currency" style="width: 100px;" id="currency">';
        //if($this->bean->currency == 'VND')
//            $this->bean->ex_rate = 1;  

        foreach ($GLOBALS['app_list_strings']['currency_list'] as $key=>$value) {
            //($value == $this->bean->currency) ? $slt = 'selected' : $slt = '';
//            ($value == 'VND') ? $rate = 1 : $rate = $this->bean->ex_rate;
//            $crc_html .= '<option '.$slt.' ex_rate="'.$rate.'" value="'.$key.'">'.$value.'</option>';
            
            $crc_html .= '<option value="'.$key.'">'.$value.'</option>';
        }

        $crc_html .= '</select>';
        $this->ss->assign("crc_html", $crc_html);

//        $ex_rate = unformat_number($this->bean->ex_rate);
        $_booking_ex_rate = "1";
        $this->ss->assign('ex_rate',$_booking_ex_rate);
        $this->bean->payment_amount_1 = format_number($this->bean->payment_amount_1);
        $this->bean->payment_amount_2 = format_number($this->bean->payment_amount_2);
        $io_code_options = $GLOBALS['app_list_strings']['IO_code_list'];
        $gs_code_options = $GLOBALS['app_list_strings']['gs_code_options'];
        $asset_options = $GLOBALS['app_list_strings']['full_asset_ticket_list'];
        $supplier_options = $GLOBALS['app_list_strings']['full_supplier_ticket_list'];

        $io_code_options = fix_options($io_code_options);
        $gs_code_options = fix_options($gs_code_options);
        $asset_options = fix_options($asset_options);
        $supplier_options = fix_options($supplier_options);

        // assingn options
        $this->ss->assign("category_options", $GLOBALS['app_list_strings']['category_ticket_list']);
        $this->ss->assign("sub_category_options", $GLOBALS['app_list_strings']['sub_category_ticket_list']);
        $this->ss->assign("supplier_options", $supplier_options);
        $this->ss->assign("asset_options", $asset_options);
        $this->ss->assign("io_code_options", $io_code_options);
        $this->ss->assign("gs_code_options", $gs_code_options);
        $this->ss->assign("card_type_options", $GLOBALS['app_list_strings']['card_type_ticket_list']);
        $this->ss->assign("class_options", $GLOBALS['app_list_strings']['class_ticket_list']);

        // assign table of tickets
        $html.= "<table width='100%' class='cell-border nowrap' heigh='600px' id='celebs' style='width:100%;'>";
        $html.= "<thead>";        
        $html.= "<tr>";            
        $html.= "<th></th>";          
        $html.= "<th></th>";          
        $html.= "<th style='min-width: 80px;'>".translate('LBL_TICKET_NUMBER','C_Ticket')."</th>";          
        $html.= "<th style='min-width: 80px;'>".translate('LBL_PAX_NAME','C_Ticket')."</th>";          
        $html.= "<th>".translate('LBL_PUBLIC_FARE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_MARKET_FARE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_COMMISSION_PERCENT','C_Ticket')."</th>"; 
        $html.= "<th>".translate('LBL_COMMISSION','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_NET_FARE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_DISCOUNT_PERCENT','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_DISCOUNT','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_AIRPORT_TAX','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_VAT_PERCENT','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_VAT_AMOUNT','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_SERVICE_CHARGE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_SERVICE_CHARGE_VND','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_REFUND_FEE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_RECEIVABLE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_PAYABLE','C_Ticket')."</th>";
        $html.= "<th>".translate('LBL_EARN','C_Ticket')."</th>";
        $html.= "</tr>";            
        $html.= "</thead>";
        $html.= "<tbody>";
        
        $customer_category = ""; 
        if(!empty($this->bean->id) && isset($this->bean->id)){
            $sql_tickets = " 
            SELECT distinct c_ticket.id
            FROM c_ticket
            INNER JOIN  c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id=l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted=0
            INNER JOIN  c_bookingticket l1 ON l1.id=l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND l1.deleted=0
            WHERE c_ticket.deleted=0 
            AND l1.id = '".$this->bean->id."'
            ORDER BY c_ticket.ticket_index";

            $result_tickets = $GLOBALS['db']->query($sql_tickets);

            while($row = $GLOBALS['db']->fetchByAssoc($result_tickets) ){
                $ticket = BeanFactory::getBean('C_Ticket', $row['id']);
//                if (($this->bean->status == "Refunded" || $ticket->refunded != "1") && empty($ticket->c_ticket_c_ticket_1c_ticket_ida)) {
                if (empty($ticket->c_ticket_c_ticket_1c_ticket_ida)) {
                    $index++;
                    $ex_rate = $ticket->ex_rate;
                    // format cunrency fields
                    (!empty($ticket->vat_percent) && $ticket->vat_percent != 0) ? $ticket->vat_percent     = format_number($ticket->vat_percent,2,2) : $ticket->vat_percent = '';
                    (!empty($ticket->discount_percent) && $ticket->discount_percent != 0) ? $ticket->discount_percent     = format_number($ticket->discount_percent,2,2) : $ticket->discount_percent = '';
                    (!empty($ticket->commission_percent) && $ticket->commission_percent != 0) ? $ticket->commission_percent     = format_number($ticket->commission_percent,2,2) : $ticket->commission_percent = '';
                    (!empty($ticket->public_fare) && $ticket->public_fare != 0) ? $ticket->public_fare     = format_number($ticket->public_fare/$ex_rate) : $ticket->public_fare = '';
                    (!empty($ticket->market_fare) && $ticket->market_fare != 0) ? $ticket->market_fare     = format_number($ticket->market_fare/$ex_rate) : $ticket->market_fare = '';
                    (!empty($ticket->commission) && $ticket->commission != 0) ? $ticket->commission     = format_number($ticket->commission/$ex_rate) : $ticket->commission = '';
                    (!empty($ticket->net_fare) && $ticket->net_fare != 0) ? $ticket->net_fare     = format_number($ticket->net_fare/$ex_rate) : $ticket->net_fare = '';
                    (!empty($ticket->discount) && $ticket->discount != 0) ? $ticket->discount     = format_number($ticket->discount/$ex_rate) : $ticket->discount = '';
                    (!empty($ticket->airport_tax) && $ticket->airport_tax != 0) ? $ticket->airport_tax     = format_number($ticket->airport_tax/$ex_rate) : $ticket->airport_tax = '';
                    (!empty($ticket->vat_amount) && $ticket->vat_amount != 0) ? $ticket->vat_amount     = format_number($ticket->vat_amount/$ex_rate) : $ticket->vat_amount = '';
                    (!empty($ticket->service_charge) && $ticket->service_charge != 0) ? $ticket->service_charge     = format_number($ticket->service_charge/$ex_rate) : $ticket->service_charge = '';
                    (!empty($ticket->service_charge_vnd) && $ticket->service_charge_vnd != 0) ? $ticket->service_charge_vnd     = format_number($ticket->service_charge_vnd) : $ticket->service_charge_vnd = '';
                    (!empty($ticket->refund_fee) && $ticket->refund_fee != 0) ? $ticket->refund_fee     = format_number($ticket->refund_fee/$ex_rate) : $ticket->refund_fee = '';
                    (!empty($ticket->receivable) && $ticket->receivable != 0) ? $ticket->receivable     = format_number($ticket->receivable/$ex_rate) : $ticket->receivable = '';
                    (!empty($ticket->payable) && $ticket->payable != 0) ? $ticket->payable     = format_number($ticket->payable/$ex_rate) : $ticket->payable = '';
                    (!empty($ticket->earn) && $ticket->earn != 0) ? $ticket->earn     = format_number($ticket->earn/$ex_rate) : $ticket->earn = '';
                    // Get contact of ticket
                    $ticket->load_relationship('contacts_c_ticket_2');
                    $contacts = $ticket->contacts_c_ticket_2->getBeans();
                    // Get orginal ticket
                    $ticket->load_relationship('c_ticket_c_ticket_1');
                    $orginalTicket = reset($ticket->c_ticket_c_ticket_1->getBeans());
                    $ticket->change_from_ticket_name = $orginalTicket->name;
                    $ticket->change_from_ticket_id = $orginalTicket->id;
                    // parse ticket's fields to Json & assign to datatable
                    // Handle Duplicate
                    if($_REQUEST['isDuplicate'] == 'true' || $_POST['isDuplicate'] == 'true')
                        $ticket_id = '';  
                    else
                        $ticket_id =  $ticket->id;
                     
                    // Edit by Bui Kim Tung 28/09/2015 - for refunded booking        
                    $ticket->service_charge = ($ticket_id == "" && $this->bean->status == "Refunded") ? "" : $ticket->service_charge; 
                    $ticket->service_charge_vnd = ($ticket_id == "" && $this->bean->status == "Refunded") ? "" : $ticket->service_charge_vnd; 
                    $ticket->refund_fee = ($ticket_id == "" && $this->bean->status == "Refunded") ? "" : $ticket->refund_fee;

                    $ticket_change_from =  $GLOBALS['db']->getOne("SELECT * FROM c_ticket_c_ticket_1_c WHERE c_ticket_c_ticket_1c_ticket_ida = '$ticket->id' deleted = 0");  
                    $json = array(
                        'id'                => $ticket_id,
                        'category'          => $ticket->category,
                        'sub_category'      => $ticket->sub_category,
                        'supplier'          => $ticket->supplier,
                        'airline'           => $ticket->airline,
                        'tour'              => $ticket->tour,
                        'ticket_number'     => $ticket->name,
                        'routing'           => $ticket->routing,
                        'pax_name'          => $ticket->pax_name,
                        'membership_number' => $ticket->membership_number,
                        'card_type'         => $ticket->card_type,
                        'booking_code'      => $ticket->booking_code,
                        'dateline'          => $ticket->dateline,
                        'gateway'           => $ticket->gateway,
                        'class'             => $ticket->class,
                        'fare_basic'        => $ticket->fare_basic,
                        'currency_id'       => $ticket->currency,
                        'ex_rate'           => $ticket->ex_rate,
                        'description'       => $ticket->description,
                        'public_fare'       => $ticket->public_fare,
                        'market_fare'       => $ticket->market_fare,
                        'commission_percent'=> $ticket->commission_percent,
                        'commission'        => $ticket->commission,
                        'net_fare'          => $ticket->net_fare,
                        'discount_percent'  => $ticket->discount_percent,
                        'discount'          => $ticket->discount,
                        'airport_tax'       => $ticket->airport_tax,
                        'vat_percent'       => $ticket->vat_percent,
                        'vat_amount'        => $ticket->vat_amount,
                        'service_charge'    => $ticket->service_charge,
                        'service_charge_vnd'    => $ticket->service_charge_vnd,
                        'refund_fee'        => $ticket->refund_fee,
                        'receivable'        => $ticket->receivable,
                        'payable'           => $ticket->payable,
                        'earn'              => $ticket->earn,
                        'contacts_c_ticket_2contacts_ida' => reset($contacts)->id,
                        'contacts_c_ticket_2_name' => reset($contacts)->name,
                        'change_from_ticket_id' => $ticket->change_from_ticket_id,
                        'change_from_ticket_name' => $ticket->change_from_ticket_name,
                    );

                    //encode to Json object
                    $json = json_encode($json);                
                    $html.= "<tr>";
                    $html.= "<td class='no-border-right'></td>";
                    $html.= "<td>
                    <input type='hidden' name='ticket[]' class='ticket' value='".$json."'/>
                    <input type='hidden' name='ticket_id[]' class='ticket_id' value='".$ticket_id."'/>
                    </td>";
                    $html.= "<td>".$ticket->name."</td>";
                    $html.= "<td>".$ticket->pax_name."</td>";
                    $html.= "<td>".$ticket->public_fare."</td>";
                    $html.= "<td>".$ticket->market_fare."</td>";
                    $html.= "<td>".$ticket->commission_percent."</td>";
                    $html.= "<td>".$ticket->commission."</td>";
                    $html.= "<td>".$ticket->net_fare."</td>";
                    $html.= "<td>".$ticket->discount_percent."</td>";
                    $html.= "<td>".$ticket->discount."</td>";
                    $html.= "<td>".$ticket->airport_tax."</td>";
                    $html.= "<td>".$ticket->vat_percent."</td>";
                    $html.= "<td>".$ticket->vat_amount."</td>";
                    $html.= "<td>".$ticket->service_charge."</td>";
                    $html.= "<td>".$ticket->service_charge_vnd."</td>";
                    $html.= "<td>".$ticket->refund_fee."</td>";
                    $html.= "<td>".$ticket->receivable."</td>";
                    $html.= "<td>".$ticket->payable."</td>";
                    $html.= "<td>".$ticket->earn."</td>";
                    $html.= "</tr>";   
                }
            }
            
            //Load lại customer category
            if ($this->bean->parent_type != "Accounts"){
                 $customer_bean = BeanFactory::getBean($this->bean->parent_type, $this->bean->parent_id);
                 $customer_category = $customer_bean->category;
            }
        } 
        else {
            $html.= "<tr>";
            $html.= "<td></td>";                    
            $html.= "<td>
            <input type='hidden' name='ticket[]' class='ticket' value=''/>
            <input type='hidden' name='ticket_id[]' class='ticket_id' value=''/>
            </td>";                    
            $html.= "<td></td>";                    
            $html.= "<td></td>";                    
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>"; 
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "<td></td>";
            $html.= "</tr>";  
        }
        $html.= "</tbody>";
        $html.= "</table>";
        $this->ss->assign("table_tickets", $html);
        // Nếu trang được load từ Lead thì tạo customer name là Lead đó
        if ($_POST[return_module]=='Leads') {
            $lead = BeanFactory::getBean('Leads', $_POST['return_id']);
            // Converted lead
            if (!empty($lead->contact_id)){
                $contact = BeanFactory::getBean('Contacts', $lead->contact_id);
                // Booker
                if (!empty($contact->account_id) && $contact->category == "BOOKER") {
                    $account = BeanFactory::getBean('Accounts', $contact->account_id);
                    $this->bean->parent_type = "Accounts";
                    $customer = $account;
                    $company = $account;   
                    $this->bean->contacts_c_bookingticket_2_name = $contact->name;
                    $this->bean->contacts_c_bookingticket_2contacts_ida = $contact->id;
                }
                // FIT
                else {
                    $this->bean->parent_type = "Contacts";
                    $customer = $contact;
                    $customer_category = $contact->category;
                    if (!empty($contact->account_id)) $company = BeanFactory::getBean('Accounts', $contact->account_id);
                    else $company = $contact;
                }
            }
            // Other Lead
            else {
                $this->bean->parent_type = "Leads";
                $customer_category = $lead->category;
                $customer = $lead;
                $company = $lead;
            }
        }
        elseif ($_POST[return_module]=='Accounts') {
            $account = BeanFactory::getBean('Accounts', $_POST['return_id']);
            $this->bean->parent_type = "Accounts";
            $customer = $account;
            $company = $account;
        }
        elseif ($_POST[return_module]=='Contacts') {
            $contact = BeanFactory::getBean('Contacts', $_POST['return_id']);
            // Booker
            if (!empty($contact->account_id) && $contact->category == "BOOKER") {
                $account = BeanFactory::getBean('Accounts', $contact->account_id);
                $this->bean->parent_type = "Accounts";
                $customer = $account;
                $company = $account;
                $this->bean->contacts_c_bookingticket_2_name = $contact->name;
                $this->bean->contacts_c_bookingticket_2contacts_ida = $contact->id;
            }
            // FIT
            else {
                $this->bean->parent_type = "Contacts";
                $customer_category = $contact->category;
                $customer = $contact;
                if (!empty($contact->account_id)) $company = BeanFactory::getBean('Accounts', $contact->account_id);
                else $company = $contact;
            }
        }
        $this->ss->assign("CUSTOMER_CATEGORY", $customer_category);
        
        if (!empty($customer)){
            $this->bean->parent_name = $customer->name;
            $this->bean->parent_id = $customer->id;      
            if ($this->bean->parent_type == "Accounts") $this->bean->address = $customer->billing_address_street;
            else $this->bean->address = $customer->primary_address_street;   
        }
        if (!empty($company)){
            $this->bean->company = $company->name;
            $this->bean->taxcode = $company->tax_code;
        }

        parent::display();

        // Set customer info
        $js = '<script type="text/javascript">
        $("#parent_type").val("'.$this->bean->parent_type.'");
        $("#parent_name").val("'.$this->bean->parent_name.'");
        $("#parent_id").val("'.$this->bean->parent_id.'");
        $("#company").val("'.$this->bean->company.'");
        $("#taxcode").val("'.$this->bean->taxcode.'");
        $("#address").val("'.$this->bean->address.'");
        </script>';
        echo $js;
    }

}

function fix_options($asset_options){
    foreach ($asset_options as $key1 => $value1){
        if (is_array($value1)){
            foreach ($value1 as $key2 => $value2){
                if (is_array($value2)){  
                    foreach ($value2 as $key3 => $value3){
                        $asset_options[$key1][$key2][$key3] = $value3;   
                    } 
                }
                else {
                    $asset_options[$key1][$key2] = $value2;  
                } 
            }    
        }
        else $asset_options[$key1] = $value1;
    }
    return $asset_options;    
}