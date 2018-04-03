<?php
global $db, $current_user;
class LogicHookFunction {
    //before save
    function handleImport($bean, $event, $arguments){
        if ($_REQUEST['module'] == "Import") {
            if (!empty($bean->customer_code)) {
                $sql_customer = 'SELECT id 
                FROM accounts 
                WHERE code = "'.$bean->customer_code.'"
                AND deleted <> 1
                LIMIT 1';
                $customer_code = $GLOBALS['db']->getOne($sql_customer);
                if (!empty($customer_code) && $customer_code) {
                    if ($bean->load_relationship('accounts_c_ticket_1')) $bean->accounts_c_ticket_1->add($customer_code);
                }
            }
            if (!empty($bean->sale_code)) {
                $sql_sale = 'SELECT id 
                FROM users 
                WHERE code = "'.$bean->sale_code.'"
                AND deleted <> 1
                LIMIT 1';
                $sale_code = $GLOBALS['db']->getOne($sql_sale);
                if (!empty($sale_code) && $sale_code) $bean->user_sale_id = $sale_code;
            }
            if (!empty($bean->ticketing_code)) {
                $sql_ticketing = 'SELECT id 
                FROM users 
                WHERE code = "'.$bean->ticketing_code.'"
                AND deleted <> 1
                LIMIT 1';
                $ticketing_code = $GLOBALS['db']->getOne($sql_ticketing);
                if (!empty($ticketing_code) && $ticketing_code) $bean->assigned_user_id = $ticketing_code;
            }
            $bean->status = 'Ticketed';
            $bean->team_id = $GLOBALS['current_user']->team_id;
            $bean->team_set_id = $GLOBALS['current_user']->team_set_id;
            if (isset($bean->public_fare) && $bean->currency != "VND") $bean->public_fare = $bean->public_fare / 100 * $bean->ex_rate;
            if (isset($bean->market_fare) && $bean->currency != "VND") $bean->market_fare = $bean->market_fare / 100 * $bean->ex_rate;
            if (isset($bean->commission) && $bean->currency != "VND") $bean->commission = $bean->commission / 100 * $bean->ex_rate;
            if (isset($bean->net_fare) && $bean->currency != "VND") $bean->net_fare = $bean->net_fare / 100 * $bean->ex_rate;
            if (isset($bean->discount) && $bean->currency != "VND") $bean->discount = $bean->discount / 100 * $bean->ex_rate;
            if (isset($bean->airport_tax) && $bean->currency != "VND") $bean->airport_tax = $bean->airport_tax / 100 * $bean->ex_rate;
            if (isset($bean->vat_amount) && $bean->currency != "VND") $bean->vat_amount = $bean->vat_amount / 100 * $bean->ex_rate;
            if (isset($bean->service_charge) && $bean->currency != "VND") $bean->service_charge = $bean->service_charge / 100 * $bean->ex_rate;

            $bean->receivable = $bean->market_fare - $bean->discount + $bean->airport_tax + $bean->vat_amount + $bean->service_charge;
            $bean->payable = $bean->public_fare - $bean->commission + $bean->airport_tax + $bean->vat_amount; 
            $bean->earn = $bean->receivable - $bean->payable;
        }
    }
    //after_save
    function handleRefund($bean, $event, $arguments) {
        if ($bean->refunded == 1) {
            $bookingTicket = BeanFactory::getBean('C_BookingTicket',$bean->c_bookingticket_c_ticket_1c_bookingticket_ida);
            if ($bookingTicket->load_relationship('c_bookingticket_c_ticket_1')) $ticktets = $bookingTicket->c_bookingticket_c_ticket_1->getBeans();  
            //if ($bookingTicket->status != "Refunded") {
//
//                $bookingTicket->total_amount = 0;
//                $bookingTicket->total_purchase = 0;
//                $bookingTicket->total_profit = 0;
//
//                foreach ($ticktets as $ticket) {
//                    if ($ticket->refunded != 1) {
//                        $bookingTicket->total_amount += $ticket->receivable;
//                        $bookingTicket->total_purchase += $ticket->payable;
//                        $bookingTicket->total_profit += $ticket->earn;
//                    }
//                }
//                $bookingTicket->save();    
//            }

            $totalAmount = 0;
            $totalPurchase = 0;
            $totalProfit = 0;
            foreach ($ticktets as $ticket) {
                $totalAmount += $ticket->receivable;
                $totalPurchase += $ticket->payable;
                $totalProfit += $ticket->earn;
            }
            $totalAmount = unformat_number($totalAmount);
            $totalPurchase = unformat_number($totalPurchase);
            $totalProfit = unformat_number($totalProfit);
            $sql = "UPDATE c_bookingticket
            SET
            total_amount = {$totalAmount}, 
            total_purchase = {$totalPurchase}, 
            total_profit = {$totalProfit} 
            WHERE deleted <> 1
            AND id = '{$bookingTicket->id}'";
            $result = $GLOBALS['db']->query($sql);
        }
    }
}
?>
