<?php
class ticket
{
    //before_save
    function handleSaveTicket($bean, $event, $arguments) {
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            if ($bean->team_id == "22cf26fa-894d-7ffa-4842-55150c69d15e") {
                $bean->unit_code = '02'; 
            }

            if ($bean->assigned_user_id != $bean->user_sale_id) {
                $sale = BeanFactory::getBean('Users', $bean->user_sale_id);
                $bean->sale_email = $sale->email1;    
            }
            else $bean->sale_email = "";

            // save code of Account || gs_code of Contact to field customer_code
            $cus = BeanFactory::getBean($bean->parent_type, $bean->parent_id);
            if ($bean->parent_type == 'Accounts'){
                $bean->customer_code = $cus->code;
                $bean->gs_code = "";
            }
            elseif($_POST["customer_category"] == "EMPLOYEE"){
                $bean->customer_code = $cus->gs_code;
                $bean->gs_code = "";
            }
            else{
                $bean->customer_code = $bean->gs_code;
            }                                     
            //Handle for Booking Ticket's relationsip 
            $completeStatus = array("Ticketed", "Exchanged", "Exchanged AA-TK", "EMD-Open","EMD-Pending","EMD-Refund");
            if($bean->parent_type == 'Leads' && in_array($bean->status,$completeStatus)){
                //If customer is a Lead, convert to Contact
                $lead = BeanFactory::getBean('Leads', $bean->parent_id);
                if(empty($lead->contact_id)){
                    $ct = new Contact();

                    //Copy Lead to Contact
                    foreach ($lead->field_defs as $keyField => $aFieldName) {
                        $ct->$keyField = $lead->$keyField;   
                    }
                    $ct->date_modified = '';
                    $ct->date_entered = '';
                    $ct->id = '';
                    $ct->code='';
                    $ct->save();

                    //Apply Contact for this booking
                    $bean->parent_type = 'Contacts'; 
                    $bean->parent_name = $ct->name;
                    $bean->parent_id = $ct->id;
                }
                else{
                    //Lead is existing - Apply Contact for this booking 
                    $ct = BeanFactory::getBean('Contacts',$lead->contact_id);
                    $bean->parent_type = 'Contacts'; 
                    $bean->parent_name = $ct->name;
                    $bean->parent_id = $ct->id;  
                }
                //Update Lead
                $lead->status = 'Converted';
                $lead->contact_id = $ct->id;
                $lead->save();
            }

            //Delete all relationship BookingTicket - Account, Contact
            $queryDeleteCustomerAccount = "DELETE FROM accounts_c_bookingticket_1_c WHERE accounts_c_bookingticket_1c_bookingticket_idb='{$bean->id}'";
            $GLOBALS['db']->query($queryDeleteCustomerAccount);
            $queryDeleteCustomerContact = "DELETE FROM contacts_c_bookingticket_1_c WHERE contacts_c_bookingticket_1c_bookingticket_idb='{$bean->id}'";
            $GLOBALS['db']->query($queryDeleteCustomerContact);
            $queryDeleteCustomerLead = "DELETE FROM leads_c_bookingticket_1_c WHERE leads_c_bookingticket_1c_bookingticket_idb='{$bean->id}'";
            $GLOBALS['db']->query($queryDeleteCustomerLead);

            //Add new Relationship
            if($bean->parent_type == 'Contacts') {
                $bean->load_relationship('contacts_c_bookingticket_1');
                $bean->contacts_c_bookingticket_1->add($bean->parent_id);
            }
            else if($bean->parent_type == 'Accounts') {
                $bean->load_relationship('accounts_c_bookingticket_1');
                $bean->accounts_c_bookingticket_1->add($bean->parent_id); 
            }
            else if($bean->parent_type == 'Leads') {
                $bean->load_relationship('leads_c_bookingticket_1');
                $bean->leads_c_bookingticket_1->add($bean->parent_id); 
            }

            //Handle save for Ticket
            foreach ($_POST["ticket"] as $key => $json_tk) {

                $json_tk = html_entity_decode($json_tk);
                $ticket = json_decode($json_tk,true);

                if ($_POST["duplicateSave"] && $bean->status == "Refunded") unset($ticket['id']);

                //fix array
                $ticket = fixArrayKey($ticket);

                if (!empty($ticket['id'])) {
                    //delete all rela to this ticket
                    $queryDeleteCustomerContact = "DELETE FROM contacts_c_ticket_1_c WHERE contacts_c_ticket_1c_ticket_idb='{$ticket['id']}'";
                    $GLOBALS['db']->query($queryDeleteCustomerContact);
                    $queryDeleteContactTicket = "DELETE FROM contacts_c_ticket_2_c WHERE contacts_c_ticket_2c_ticket_idb='{$ticket['id']}'";
                    $GLOBALS['db']->query($queryDeleteContactTicket);
                    $queryDeleteCustomerAccount = "DELETE FROM accounts_c_ticket_1_c WHERE accounts_c_ticket_1c_ticket_idb='{$ticket['id']}'";
                    $GLOBALS['db']->query($queryDeleteCustomerAccount);
                    $queryDeleteCustomerLead = "DELETE FROM leads_c_ticket_1_c WHERE leads_c_ticket_1c_ticket_idb='{$ticket['id']}'";
                    $GLOBALS['db']->query($queryDeleteCustomerLead);
                }

                if ($ticket['deleted'] == "1") {      
                    if (!empty($ticket['id'])) {
                        //delete
                        $bean_ticket = BeanFactory::getBean("C_Ticket", $ticket['id']);
                        $bean_ticket->deleted = 1;

                        // delete rela bookingticket vs ticket
                        $bean_ticket->load_relationship('c_bookingticket_c_ticket_1');
                        $bean_ticket->c_bookingticket_c_ticket_1->delete($bean_ticket->id, $bean->id);
                        $bean_ticket->save();
                    } 
                }else{
                    if (!empty($ticket['id'])) 
                        $bean_ticket = BeanFactory::getBean("C_Ticket", $ticket['id']);
                    else  
                        $bean_ticket = BeanFactory::newBean("C_Ticket");
                    $ex_rate                        = unformat_number($ticket['ex_rate']);
                    $bean_ticket->category          = $bean->category;
                    $bean_ticket->sub_category      = $bean->sub_category;
                    $bean_ticket->supplier          = $bean->supplier;
                    $bean_ticket->airline           = $bean->airline;
                    $bean_ticket->tour              = $bean->tour;
                    $bean_ticket->name              = $ticket['ticket_number'];
                    $bean_ticket->routing           = $ticket['routing'];
                    $bean_ticket->pax_name          = $ticket['pax_name'];
                    $bean_ticket->membership_number = $ticket['membership_number'];
                    $bean_ticket->card_type         = $ticket['card_type'];
                    $bean_ticket->booking_code      = $ticket['booking_code'];
                    $bean_ticket->dateline          = $ticket['dateline'];
                    $bean_ticket->gateway           = $ticket['gateway'];
                    $bean_ticket->class             = $ticket['class'];
                    $bean_ticket->fare_basic        = $ticket['fare_basic'];
                    $bean_ticket->currency          = $ticket['currency_id'];
                    $bean_ticket->description       = $ticket['description'];
                    $bean_ticket->ex_rate           = format_number(unformat_number($ticket['ex_rate']),2,2);
                    $bean_ticket->public_fare       = format_number(unformat_number($ticket['public_fare'])* $ex_rate,2,2);
                    $bean_ticket->market_fare       = format_number(unformat_number($ticket['market_fare'])* $ex_rate,2,2);
                    $bean_ticket->commission_percent= format_number(unformat_number($ticket['commission_percent']),2,2);
                    $bean_ticket->commission        = format_number(unformat_number($ticket['commission'])* $ex_rate,2,2);
                    $bean_ticket->net_fare          = format_number(unformat_number($ticket['net_fare'])* $ex_rate,2,2);
                    $bean_ticket->discount_percent  = format_number(unformat_number($ticket['discount_percent']),2,2);
                    $bean_ticket->discount          = format_number(unformat_number($ticket['discount'])* $ex_rate,2,2) ;
                    $bean_ticket->airport_tax       = format_number(unformat_number($ticket['airport_tax'])* $ex_rate,2,2);
                    $bean_ticket->vat_percent       = format_number(unformat_number($ticket['vat_percent']),2,2);
                    $bean_ticket->vat_amount        = format_number(unformat_number($ticket['vat_amount'])* $ex_rate,2,2);
                    $bean_ticket->service_charge    = format_number(unformat_number($ticket['service_charge'])* $ex_rate,2,2);
                    $bean_ticket->service_charge_vnd= format_number(unformat_number($ticket['service_charge_vnd']),2,2);
                    $bean_ticket->refund_fee        = format_number(unformat_number($ticket['refund_fee'])* $ex_rate,2,2);
                    $bean_ticket->refund_fee_airline= $bean_ticket->refund_fee;
                    $bean_ticket->receivable        = format_number(unformat_number($ticket['receivable'])* $ex_rate,2,2);
                    $bean_ticket->payable           = format_number(unformat_number($ticket['payable'])* $ex_rate,2,2);
                    $bean_ticket->earn              = format_number(unformat_number($ticket['earn'])* $ex_rate,2,2);
                    $bean_ticket->booking_date      = $bean->booking_date;
                    $bean_ticket->assigned_user_id  = $bean->assigned_user_id;
                    $bean_ticket->assigned_user_name= $bean->assigned_user_name;
                    $bean_ticket->team_id           = $bean->team_id;
                    // Edit by Bui Kim Tung - 19/08/2015 
                    $bean_ticket->team_set_id       = $bean->team_set_id;
                    $bean_ticket->document_id       = $bean->internal_doc_id;
                    $bean_ticket->invoice_date       = $bean->invoice_date;
                    $bean_ticket->invoice_no       = $bean->invoice_no;
                    $bean_ticket->supplier       = $bean->supplier;
                    $bean_ticket->full_payment_date       = $bean->full_payment_date;
                    $bean_ticket->user_sale       = $bean->user_sale;
                    $bean_ticket->user_sale_id       = $bean->user_sale_id;
                    $bean_ticket->sale_email       = $bean->sale_email;
                    $bean_ticket->status       = $bean->status;
                    $bean_ticket->io_code       = $bean->io_code;
                    $bean_ticket->customer_code       = $bean->customer_code;
                    //add relationship Ticket - Booking Ticket, Contact, Account
                    $bean_ticket->c_bookingticket_c_ticket_1c_bookingticket_ida= $bean->id;
                    if ($bean->parent_type == 'Contacts'){
                        $bean_ticket->contacts_c_ticket_1contacts_ida = $bean->parent_id; 
                    }elseif ($bean->parent_type == 'Accounts'){
                        $bean_ticket->accounts_c_ticket_1accounts_ida = $bean->parent_id; 
                    }elseif ($bean->parent_type == 'Leads'){
                        $bean_ticket->leads_c_ticket_1leads_ida = $bean->parent_id; 
                    }                        
                    $bean_ticket->contacts_c_ticket_2contacts_ida =  $ticket['contacts_c_ticket_2contacts_ida'];
                    // delete old rela ticket
                    $queryDeleteTicket = "DELETE FROM c_ticket_c_ticket_1_c WHERE c_ticket_c_ticket_1c_ticket_ida='".$bean_ticket->id."'";
                    $GLOBALS['db']->query($queryDeleteTicket);
                    $bean_ticket->save();
                    // Add orginal ticket to relationship
                    if ($ticket['change_from_ticket_id'] != ""){
                        if ($bean_ticket->load_relationship('c_ticket_c_ticket_1')) $bean_ticket->c_ticket_c_ticket_1->add($ticket['change_from_ticket_id']);
                    }

                    if ($bean->status == "Refunded" || $bean->status == "EMD-Refund") {
                        $bean_ticket->refunded = 1; 
                        $bean_ticket->refund_date = $bean->refund_date;     
                    } 
                    elseif ($bean->fetched_row["status"] == "Refunded") $bean_ticket->refunded = 0; 

                    $bean_ticket->save();
                    // END : Handle save for Ticket
                }
            }
            //Delete old payment and relationship
            $q3 = "DELETE FROM c_payment WHERE id in (SELECT c_bookingticket_c_payment_1c_payment_idb FROM c_bookingticket_c_payment_1_c WHERE c_bookingticket_c_payment_1c_bookingticket_ida = '{$bean->id}')";
            $res = $GLOBALS['db']->query($q3);
            $q4 = "DELETE FROM c_bookingticket_c_payment_1c_bookingticket_ida WHERE c_bookingticket_c_payment_1c_bookingticket_ida = '{$bean->id}'";
            $res = $GLOBALS['db']->query($q4);
            // Add new relationship
            if($bean->payment_amount_1 > 0) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Ticket_".$bean->name."_Payment_1";
                $payment->type = "Ticket";
                $payment->payment_date = $bean->payment_date_1;
                $payment->payment_method = $bean->payment_method_1;
                $payment->payment_amount = $bean->payment_amount_1;
                $payment->currency = $bean->currency;
                $payment->ex_rate = $bean->ex_rate;
                $payment->payment_attempt = 1;
                $payment->save();
                $bean->load_relationship('c_bookingticket_c_payment_1');
                $bean->c_bookingticket_c_payment_1->add($payment->id);
            }
            if($bean->payment_amount_2 > 0) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Ticket_".$bean->name."_Payment_2";
                $payment->type = "Ticket";
                $payment->payment_date = $bean->payment_date_2;
                $payment->payment_method = $bean->payment_method_2;
                $payment->payment_amount = $bean->payment_amount_2;
                $payment->currency = $bean->currency;
                $payment->ex_rate = $bean->ex_rate;
                $payment->payment_attempt = 2;
                $payment->save();
                $bean->load_relationship('c_bookingticket_c_payment_1');
                $bean->c_bookingticket_c_payment_1->add($payment->id);
            }
            if(!empty($bean->full_payment_date)) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Ticket_".$bean->name."_Full_Payment";
                $payment->type = "Ticket";
                $payment->payment_date = $bean->full_payment_date;
                $payment->payment_method = $bean->full_payment_method;
                $payment->payment_amount = $bean->total_amount;
                if($bean->payment_amount_2 > 0) $payment->payment_amount -= $bean->payment_amount_2;
                if($bean->payment_amount_1 > 0) $payment->payment_amount -= $bean->payment_amount_1;
                $payment->currency = $bean->currency;
                $payment->ex_rate = $bean->ex_rate;
                $payment->payment_attempt = 0;
                $payment->save();
                $bean->load_relationship('c_bookingticket_c_payment_1');
                $bean->c_bookingticket_c_payment_1->add($payment->id);
            }    
        }
    }
    //before_delete
    function handleDelete($bean, $event, $arguments) {
        $sql_tickets = " 
        SELECT distinct c_ticket.id
        FROM c_ticket
        INNER JOIN  c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id=l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted=0
        INNER JOIN  c_bookingticket l1 ON l1.id=l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND l1.deleted=0
        WHERE c_ticket.deleted=0 
        AND l1.id = '".$bean->id."'
        ORDER BY c_ticket.ticket_index";

        $result_tickets = $GLOBALS['db']->query($sql_tickets);

        while($row = $GLOBALS['db']->fetchByAssoc($result_tickets) ){
            $ticket = BeanFactory::getBean('C_Ticket', $row['id']);
            $ticket->deleted = 1;
            $ticket->save();
        }
    }
}

function fixArrayKey($arr){
    $new_arr = array();
    if (is_array($arr)) {
        foreach ($arr as $key=>$value){
            $new_key = str_replace("focus","",$key);
            $new_key = str_replace(" ","",$new_key);

            $new_arr[$new_key] = $value;   
        }

    }
    return $new_arr;
}
?>
