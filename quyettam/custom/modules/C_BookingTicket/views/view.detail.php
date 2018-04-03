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


require_once('include/MVC/View/views/view.detail.php');

class C_BookingTicketViewDetail extends ViewDetail {

    /**
    * display
    * Override the display method to support customization for the buttons that display
    * a popup and allow you to copy the account's address into the selected contacts.
    * The custom_code_billing and custom_code_shipping Smarty variables are found in
    * include/SugarFields/Fields/Address/DetailView.tpl (default).  If it's a English U.S.
    * locale then it'll use file include/SugarFields/Fields/Address/en_us.DetailView.tpl.
    */
    function display(){
        // assign detail table of tickets
        $html.= "<table id='celebs' cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>";
        $html.= "<tbody>";
        $html.= "<thead>";        
        $html.= "<tr>";                    
        $html.= "<th width='15px'></th>";
        $html.= "<th style='text-align: center; width:120px;'>".translate('LBL_NAME','C_Ticket')."</th>";          
        $html.= "<th style='text-align: center; width:120px;'>".translate('LBL_PAX_NAME','C_Ticket')."</th>";          
        $html.= "<th style='text-align: center;'>".translate('LBL_CURRENCY','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_EX_RATE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_PUBLIC_FARE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_MARKET_FARE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_COMMISSION','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_NET_FARE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_DISCOUNT','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_AIRPORT_TAX','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_VAT_AMOUNT','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_SERVICE_CHARGE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_SERVICE_CHARGE_VND','C_Ticket')."</th>";
        if($this->bean->status == 'Refunded')
            $html.= "<th style='text-align: center;'>".translate('LBL_REFUND_FEE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_RECEIVABLE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_PAYABLE','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;'>".translate('LBL_EARN','C_Ticket')."</th>";
        $html.= "<th style='text-align: center;' ></th>";
        $html.= "</tr>";            
        $html.= "</thead>";   
        $index  = 0;

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

            $index++;
            $ex_rate = $ticket->ex_rate;
            // format cunrency fields
            (!empty($ticket->vat_percent)        && $ticket->vat_percent != 0)           ? $ticket->vat_percent         = format_number($ticket->vat_percent,2,2)           : $ticket->vat_percent = '';
            (!empty($ticket->discount_percent)   && $ticket->discount_percent != 0)      ? $ticket->discount_percent    = format_number($ticket->discount_percent,2,2)      : $ticket->discount_percent = '';
            (!empty($ticket->commission_percent) && $ticket->commission_percent != 0)    ? $ticket->commission_percent  = format_number($ticket->commission_percent,2,2)    : $ticket->commission_percent = '';
            (!empty($ticket->public_fare)        && $ticket->public_fare != 0)           ? $ticket->public_fare         = format_number($ticket->public_fare/$ex_rate)      : $ticket->public_fare = '';
            (!empty($ticket->market_fare)        && $ticket->market_fare != 0)           ? $ticket->market_fare         = format_number($ticket->market_fare/$ex_rate)      : $ticket->market_fare = '';
            (!empty($ticket->commission)         && $ticket->commission != 0)            ? $ticket->commission          = format_number($ticket->commission/$ex_rate)       : $ticket->commission = '';
            (!empty($ticket->net_fare)           && $ticket->net_fare != 0)              ? $ticket->net_fare            = format_number($ticket->net_fare/$ex_rate)         : $ticket->net_fare = '';
            (!empty($ticket->discount)           && $ticket->discount != 0)              ? $ticket->discount            = format_number($ticket->discount/$ex_rate)         : $ticket->discount = '';
            (!empty($ticket->airport_tax)        && $ticket->airport_tax != 0)           ? $ticket->airport_tax         = format_number($ticket->airport_tax/$ex_rate)      : $ticket->airport_tax = '';
            (!empty($ticket->vat_amount)         && $ticket->vat_amount != 0)            ? $ticket->vat_amount          = format_number($ticket->vat_amount/$ex_rate)       : $ticket->vat_amount = '';
            (!empty($ticket->service_charge)     && $ticket->service_charge != 0)        ? $ticket->service_charge      = format_number($ticket->service_charge/$ex_rate)   : $ticket->service_charge = '';
            (!empty($ticket->service_charge_vnd) && $ticket->service_charge_vnd != 0)    ? $ticket->service_charge_vnd  = format_number($ticket->service_charge_vnd)        : $ticket->service_charge_vnd = '';
            (!empty($ticket->refund_fee)         && $ticket->refund_fee != 0)            ? $ticket->refund_fee          = format_number($ticket->refund_fee/$ex_rate)       : $ticket->refund_fee = '';
            (!empty($ticket->receivable)         && $ticket->receivable != 0)            ? $ticket->receivable          = format_number($ticket->receivable/$ex_rate)       : $ticket->receivable = '';
            (!empty($ticket->payable)            && $ticket->payable != 0)               ? $ticket->payable             = format_number($ticket->payable/$ex_rate)          : $ticket->payable = '';
            (!empty($ticket->earn)               && $ticket->earn != 0)                  ? $ticket->earn                = format_number($ticket->earn/$ex_rate)             : $ticket->earn = '';

            if ($index % 2 == 0) 
                $html.= "<tr id=".$ticket->id." height='32px' class='oddListRowS1'>";
            else 
                $html.= "<tr id=".$ticket->id." height='32px' class='evenListRowS1'>";
            //$html.= "<tr id=".$ticket->id." height='32px'>";
            $html.= "<td width='15px' style='text-align: center;'>".$index."</td>";

            $html.= "<td style='text-align: center;'><a href='index.php?module=C_Ticket&amp;action=DetailView&amp;record=".$ticket->id."'>".$ticket->name."</a></td>";
            $html.= "<td>".$ticket->pax_name."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: center;'>".$ticket->currency."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".format_number($ticket->ex_rate)."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->public_fare."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->market_fare."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->commission."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->net_fare."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->discount."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->airport_tax."</td>";                                                                                                                               
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->vat_amount."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->service_charge."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->service_charge_vnd."</td>";
            if($this->bean->status == 'Refunded')
                $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->refund_fee."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket ->receivable."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->payable."</td>";
            $html.= "<td style='padding-left: 5px;padding-right: 5px; text-align: right;'>".$ticket->earn."</td>";
            if ($ticket->c_ticket_c_ticket_1c_ticket_ida != ""){
                $changeToTicket = BeanFactory::getBean('C_Ticket',$ticket->c_ticket_c_ticket_1c_ticket_ida);
                $linkToNewTicket = '<a style="" href="index.php?module=C_Ticket&return_module=C_Ticket&action=DetailView&record='.$changeToTicket->id.'">'.$changeToTicket->name.'</a>';
                $html.= "<td style='text-align: center;'><label style='color: #F00; font-weight:bold;'> Changed: </label>".$linkToNewTicket."</td>";
            }
            elseif ($ticket->refunded == "0"){
                //                    $html.= "<td style='text-align: center;'><input title='Refund".$index."' class='button' type='button' name='refund_".$index."' value='Refund' id='refund_".$index."' style='margin: 2px;' onclick='window.location = \"index.php?module=C_Ticket&return_module=C_BookingTicket&action=EditView&record=".$ticket->id."&return_action=DetailView&return_id=".$this->bean->id."&refunded=1\";'/></td>";
                $html.= "<td style='text-align: center;'></td>";
            }
            elseif ($ticket->refunded == "1"){
                $html.= "<td style='text-align: center;'><label style='color: #F00; font-weight:bold;'>Refunded</label></td>";
            }

            $html.= "</tr>";
        } 
        $html.= "</tbody>";
        $html.= "</table>";   

        $lang = return_module_language($GLOBALS['current_language'], 'C_BookingTicket');

        // format curency fields and assign

        $html.= '<div><label style="background-color: #eee;color: #888;padding: 7px;">'.$lang['LBL_TOTAL_AMOUNT'].': </label>
        <span style="padding-left: 0.5%; display: inline-block;width:25%" name="total_amount" id="total_amount">'.format_number($this->bean->total_amount).'</span>
        <label style="background-color: #eee;color: #888;padding: 7px;">'.$lang['LBL_TOTAL_PURCHASE'].': </label>
        <span style="padding-left: 0.5%; display: inline-block;width:23%;" name="total_purchase" id="total_purchase">'.format_number($this->bean->total_purchase).'</span>
        <label style="background-color: #eee;color: #888;padding: 7px;">'.$lang['LBL_TOTAL_PROFIT'].': </label>
        <span style="padding-left: 0.5%; display: inline-block;width:%" name="total_profit" id="total_profit">'.format_number($this->bean->total_profit).'</span></div>'; 

        //Bo sung 2 button export
        $bt_export = '';
        $exportAvailableStatusArray = array("Ticketed","Exchanged","Exchanged AA-TK","Refunded","EMD-Refund");
        if (in_array($this->bean->status,$exportAvailableStatusArray)){
            $bt_export.='<ul class="clickMenu fancymenu SugarActionMenu">
            <li class="sugar_action_button"><a style="">Download PDF</a>
            <ul class="subnav" style="display:none;">
            <li><a id="receipt_voucher">Phiếu thu nội bộ</a></li>
            <li><a id="sale_receipt">Phiếu thu thuế</a></li>
            <li><a id="invoice_voucher">Hóa đơn GTGT</a></li>
            </ul>
            <span class="ab" style=""></span>
            </li>
            </ul>';
        }
        
        //Button refund
        $btn_refund = "";
        $available_status = array ("Ticketed","Exchanged","Exchanged AA-TK");
        if (in_array($this->bean->status,$available_status)) {
            $btn_refund = '<input title="Refund" class="button" onclick="var _form = document.getElementById(\'formDetailView\'); _form.return_module.value=\'C_BookingTicket\'; _form.return_action.value=\'DetailView\'; _form.isDuplicate.value=true; _form.action.value=\'EditView\'; _form.duplicateType.value=\'Refund\'; _form.return_id.value=\''.$this->bean->id.'\';SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Refund" value="Refund">';
        }

        if ($this->bean->gs_code != "") $gs_code_label = translate('LBL_GS_CODE','C_BookingTicket').":";
        else $gs_code_label = "";
        
        if ($this->bean->parent_type != "Accounts") unset($this->dv->defs['panels']['default'][5]);
        if ($this->bean->status != "Refunded" && $this->bean->status != "EMD-Refund"){
            unset($this->dv->defs['panels']['default'][1][2]["name"]);    
            $this->dv->defs['panels']['default'][1][2]["hideLabel"] = "true";
        } 
        
        //Assign to detailView
        $this->ss->assign("ticket_count", $index);
        $this->ss->assign("table_tickets", $html);
        $this->ss->assign("BUTTONEXPORT", $bt_export);
        $this->ss->assign("IO_CODE", $this->bean->io_code);
        $this->ss->assign("BUTTON_REFUND", $btn_refund);
        $this->ss->assign("GS_CODE_LABEL", $gs_code_label);

        parent::display();
    } 	
}

?>