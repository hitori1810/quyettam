<?php
    function calDelivery($start , $end , $team_id = null, $student_id = null){
        $cr_user_id = $GLOBALS['current_user']->id;
        if(!isset($cr_user_id) && empty($cr_user_id))
            $cr_user_id = '1';
        $q_delete = "DELETE FROM c_ticketreport WHERE created_by = '$cr_user_id'";
        //Xoa Du lieu
        $result_delete = $GLOBALS['db']->query($q_delete);

        $start = $start;
        $end   = $end;
        //Insert account's ticket 
        $q1 = "
        SELECT DISTINCT IFNULL(c_ticket.id,'') ticket_id 
        ,IFNULL(c_ticket.name,'') ticket_name
        ,IFNULL(c_ticket.pax_name,'') pax_name
        ,IFNULL(c_ticket.public_fare,'') public_fare
        ,IFNULL(c_ticket.market_fare,'') market_fare
        ,IFNULL(c_ticket.commission,'')  commission
        ,IFNULL(c_ticket.net_fare,'')  net_fare
        ,IFNULL(c_ticket.discount,'') discount
        ,IFNULL(c_ticket.airport_tax,'')  airport_tax
        ,IFNULL(c_ticket.vat_amount,'') vat_amount
        ,IFNULL(c_ticket.service_charge,'') service_charge
        ,IFNULL(c_ticket.receivable,'') receivable
        ,IFNULL(c_ticket.payable,'')  payable
        ,IFNULL(c_ticket.earn,'') earn
        ,IFNULL(c_ticket.date_entered,'') date_entered
        , l2.id account_id
        ,IFNULL(c_ticket.team_id,'') team_id
        ,IFNULL(c_ticket.team_set_id,'') team_set_id
        ,IFNULL(c_ticket.assigned_user_id,'') assigned_user_id
        ,IFNULL(c_ticket.category,'') category
        ,IFNULL(c_ticket.supplier,'') supplier
        ,IFNULL(c_ticket.airline,'') airline
        ,IFNULL(c_ticket.tour,'') tour
        ,IFNULL(c_ticket.refund_code,'') refund_code
        ,IFNULL(c_ticket.routing,'')  routing
        ,IFNULL(c_ticket.membership_number,'') membership_number
        ,IFNULL(c_ticket.card_type,'') card_type
        ,IFNULL(c_ticket.booking_code,'')  booking_code
        ,IFNULL(c_ticket.dateline,'')  dateline
        ,IFNULL(c_ticket.gateway,'')  gateway
        ,IFNULL(c_ticket.class,'')  class
        ,IFNULL(c_ticket.fare_basic,'')  fare_basic
        ,IFNULL(c_ticket.commission_percent,'')  commission_percent
        ,IFNULL(c_ticket.discount_percent,'')  discount_percent
        ,IFNULL(c_ticket.vat_percent,'')  vat_percent
        ,IFNULL(c_ticket.refund_fee,'')   refund_fee
        ,IFNULL(c_ticket.refund_fee_airline,'')  refund_fee_airline
        ,IFNULL(c_ticket.repay_client,'')  repay_client
        ,IFNULL(c_ticket.airline_repay,'')  airline_repay
        ,IFNULL(c_ticket.refund_date,'')   refund_date
        ,IFNULL(c_ticket.currency,'')  currency
        ,IFNULL(c_ticket.ex_rate,'')  ex_rate
        ,IFNULL(c_ticket.booking_date,'')  booking_date
        ,IFNULL(l1.status,'') status
        ,IFNULL(c_ticket.refund_code,'') refund_code

        FROM c_ticket
        INNER JOIN  c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id=l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted=0
        INNER JOIN  c_bookingticket l1 ON l1.id=l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND l1.deleted=0
        INNER JOIN  accounts_c_bookingticket_1_c l2_1 ON l1.id=l2_1.accounts_c_bookingticket_1c_bookingticket_idb AND l2_1.deleted=0
        INNER JOIN  accounts l2 ON l2.id=l2_1.accounts_c_bookingticket_1accounts_ida AND l2.deleted=0
        WHERE (coalesce(LENGTH(l2.name),0) > 0)
        AND  c_ticket.deleted != 1 
        AND (
        c_ticket.date_entered >= '$start'
        AND c_ticket.date_entered <= '$end'
        )";

        $result_q1 = $GLOBALS['db']->query($q1);

        while($row_1 = $GLOBALS['db']->fetchByAssoc($result_q1) )
        {
            if(!empty($row_1['ticket_id'])){
                $ticketReport = BeanFactory::newBean('C_TicketReport');
                $ticketReport->ticket_id = $row_1['ticket_id'];
                $ticketReport->name = $row_1['ticket_name'];
                $ticketReport->pax_name = $row_1['pax_name'];
                $ticketReport->public_fare = $row_1['public_fare'];
                $ticketReport->market_fare = $row_1['market_fare'];
                $ticketReport->commission = $row_1['commission'];
                $ticketReport->discount = $row_1['discount'];
                $ticketReport->airport_tax = $row_1['airport_tax'];
                $ticketReport->vat_amount = $row_1['vat_amount'];
                $ticketReport->service_charge = $row_1['service_charge'];
                $ticketReport->payable = $row_1['payable'];
                $ticketReport->earn = $row_1['earn'];
                $ticketReport->date_entered = $row_1['date_entered'];
                $ticketReport->created_by = $row_1['created_by'];
                $ticketReport->account_id = $row_1['account_id'];
                $ticketReport->team_id = $row_1['team_id'];
                $ticketReport->team_set_id = $row_1['team_set_id'];
                $ticketReport->assigned_user_id = $row_1['assigned_user_id'];
                $ticketReport->category = $row_1['category'];
                $ticketReport->supplier = $row_1['supplier'];
                $ticketReport->airline = $row_1['airline'];
                $ticketReport->tour = $row_1['tour'];
                $ticketReport->refund_code = $row_1['refund_code'];
                $ticketReport->routing = $row_1['routing'];
                $ticketReport->membership_number = $row_1['membership_number'];
                $ticketReport->card_type = $row_1['card_type'];
                $ticketReport->booking_code = $row_1['booking_code'];
                $ticketReport->dateline = $row_1['dateline'];
                $ticketReport->gateway = $row_1['gateway'];
                $ticketReport->class = $row_1['class'];
                $ticketReport->fare_basic = $row_1['fare_basic'];
                $ticketReport->commission_percent = $row_1['commission_percent'];
                $ticketReport->discount_percent = $row_1['discount_percent'];
                $ticketReport->vat_percent = $row_1['vat_percent'];
                $ticketReport->refund_fee = $row_1['refund_fee'];
                $ticketReport->refund_fee_airline = $row_1['refund_fee_airline'];
                $ticketReport->repay_client = $row_1['repay_client'];
                $ticketReport->airline_repay = $row_1['airline_repay'];
                $ticketReport->refund_date = $row_1['refund_date'];
                $ticketReport->currency = $row_1['currency'];
                $ticketReport->ex_rate = $row_1['ex_rate'];
                $ticketReport->booking_date = $row_1['booking_date'];
                $ticketReport->status = $row_1['status'];
                $ticketReport->refunded = $row_1['refunded'];
                $ticketReport->refund_code = $row_1['refund_code'];
                $ticketReport->created_by = $cr_user_id;
                $ticketReport->save();
            }
        }

        //Insert booker's ticket by account
        $q2 = "
        SELECT DISTINCT IFNULL(c_ticket.id,'') ticket_id 
        ,IFNULL(c_ticket.name,'') ticket_name
        ,IFNULL(c_ticket.pax_name,'') pax_name
        ,IFNULL(c_ticket.public_fare,'') public_fare
        ,IFNULL(c_ticket.market_fare,'') market_fare
        ,IFNULL(c_ticket.commission,'')  commission
        ,IFNULL(c_ticket.net_fare,'')  net_fare
        ,IFNULL(c_ticket.discount,'') discount
        ,IFNULL(c_ticket.airport_tax,'')  airport_tax
        ,IFNULL(c_ticket.vat_amount,'') vat_amount
        ,IFNULL(c_ticket.service_charge,'') service_charge
        ,IFNULL(c_ticket.receivable,'') receivable
        ,IFNULL(c_ticket.payable,'')  payable
        ,IFNULL(c_ticket.earn,'') earn
        ,IFNULL(c_ticket.date_entered,'') date_entered
        ,IFNULL(l4.id,'')  account_id
        ,IFNULL(c_ticket.team_id,'') team_id
        ,IFNULL(c_ticket.team_set_id,'') team_set_id
        ,IFNULL(c_ticket.assigned_user_id,'') assigned_user_id
        ,IFNULL(c_ticket.category,'') category
        ,IFNULL(c_ticket.supplier,'') supplier
        ,IFNULL(c_ticket.airline,'') airline
        ,IFNULL(c_ticket.tour,'') tour
        ,IFNULL(c_ticket.refund_code,'') refund_code
        ,IFNULL(c_ticket.routing,'')  routing
        ,IFNULL(c_ticket.membership_number,'') membership_number
        ,IFNULL(c_ticket.card_type,'') card_type
        ,IFNULL(c_ticket.booking_code,'')  booking_code
        ,IFNULL(c_ticket.dateline,'')  dateline
        ,IFNULL(c_ticket.gateway,'')  gateway
        ,IFNULL(c_ticket.class,'')  class
        ,IFNULL(c_ticket.fare_basic,'')  fare_basic
        ,IFNULL(c_ticket.commission_percent,'')  commission_percent
        ,IFNULL(c_ticket.discount_percent,'')  discount_percent
        ,IFNULL(c_ticket.vat_percent,'')  vat_percent
        ,IFNULL(c_ticket.refund_fee,'')   refund_fee
        ,IFNULL(c_ticket.refund_fee_airline,'')  refund_fee_airline
        ,IFNULL(c_ticket.repay_client,'')  repay_client
        ,IFNULL(c_ticket.airline_repay,'')  airline_repay
        ,IFNULL(c_ticket.refund_date,'')   refund_date
        ,IFNULL(c_ticket.currency,'')  currency
        ,IFNULL(c_ticket.ex_rate,'')  ex_rate
        ,IFNULL(c_ticket.booking_date,'')  booking_date
        ,IFNULL(l1.status,'') status
        ,IFNULL(c_ticket.refund_code,'') refund_code

        FROM c_ticket
        INNER JOIN  c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id=l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted=0

        INNER JOIN  c_bookingticket l1 ON l1.id=l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND l1.deleted=0
        INNER JOIN  contacts_c_bookingticket_1_c l2_1 ON l1.id=l2_1.contacts_c_bookingticket_1c_bookingticket_idb AND l2_1.deleted=0

        INNER JOIN  contacts l2 ON l2.id=l2_1.contacts_c_bookingticket_1contacts_ida AND l2.deleted=0
        INNER JOIN  accounts_contacts l3 ON l2.id = l3.contact_id AND l3.deleted=0

        INNER JOIN  accounts l4 ON l4.id=l3.account_id AND l4.deleted=0

        WHERE ((((coalesce(LENGTH(l2.fullname),0) > 0)
        )  AND ((
        c_ticket.date_entered >= '$start'
        AND c_ticket.date_entered <= '$end'
        )
        ))) 
        AND  c_ticket.deleted != 1 

        ";

        $result_q2 = $GLOBALS['db']->query($q2);

        while($row_2 = $GLOBALS['db']->fetchByAssoc($result_q1) )
        {
            if(!empty($row_2['ticket_id'])){
                $ticketReport = BeanFactory::newBean('C_TicketReport');
                $ticketReport->ticket_id = $row_2['ticket_id'];
                $ticketReport->name = $row_2['ticket_name'];
                $ticketReport->pax_name = $row_2['pax_name'];
                $ticketReport->public_fare = $row_2['public_fare'];
                $ticketReport->market_fare = $row_2['market_fare'];
                $ticketReport->commission = $row_2['commission'];
                $ticketReport->discount = $row_2['discount'];
                $ticketReport->airport_tax = $row_2['airport_tax'];
                $ticketReport->vat_amount = $row_2['vat_amount'];
                $ticketReport->service_charge = $row_2['service_charge'];
                $ticketReport->payable = $row_2['payable'];
                $ticketReport->earn = $row_2['earn'];
                $ticketReport->date_entered = $row_2['date_entered'];
                $ticketReport->created_by = $row_2['created_by'];
                $ticketReport->account_id = $row_2['account_id'];
                $ticketReport->team_id = $row_2['team_id'];
                $ticketReport->team_set_id = $row_2['team_set_id'];
                $ticketReport->assigned_user_id = $row_2['assigned_user_id'];
                $ticketReport->category = $row_2['category'];
                $ticketReport->supplier = $row_2['supplier'];
                $ticketReport->airline = $row_2['airline'];
                $ticketReport->tour = $row_2['tour'];
                $ticketReport->refund_code = $row_2['refund_code'];
                $ticketReport->routing = $row_2['routing'];
                $ticketReport->membership_number = $row_2['membership_number'];
                $ticketReport->card_type = $row_2['card_type'];
                $ticketReport->booking_code = $row_2['booking_code'];
                $ticketReport->dateline = $row_2['dateline'];
                $ticketReport->gateway = $row_2['gateway'];
                $ticketReport->class = $row_2['class'];
                $ticketReport->fare_basic = $row_2['fare_basic'];
                $ticketReport->commission_percent = $row_2['commission_percent'];
                $ticketReport->discount_percent = $row_2['discount_percent'];
                $ticketReport->vat_percent = $row_2['vat_percent'];
                $ticketReport->refund_fee = $row_2['refund_fee'];
                $ticketReport->refund_fee_airline = $row_2['refund_fee_airline'];
                $ticketReport->repay_client = $row_2['repay_client'];
                $ticketReport->airline_repay = $row_2['airline_repay'];
                $ticketReport->refund_date = $row_2['refund_date'];
                $ticketReport->currency = $row_2['currency'];
                $ticketReport->ex_rate = $row_2['ex_rate'];
                $ticketReport->booking_date = $row_2['booking_date'];
                $ticketReport->status = $row_2['status'];
                $ticketReport->refunded = $row_2['refunded'];
                $ticketReport->created_by = $cr_user_id;
                $ticketReport->save();
            }
        }
    }

?>
