<?php
 //   echo $this->query;
    $q1 = "SELECT DISTINCT
    IFNULL(l1.id, '') l1_id,
    l1.internal_doc_id l1_internal_doc_id,
    l1.invoice_date l1_invoice_date,
    IFNULL(l3.id, '') l3_id,
    l3.code l3_code,
    IFNULL(l2.id, '') l2_id,
    l2.code l2_code,
    IFNULL(c_ticket.id, '') primaryid,
    IFNULL(c_ticket.airline, '') c_ticket_airline,
    IFNULL(c_ticket.description, '') c_ticket_description,
    IFNULL(c_ticket.tour, '') c_ticket_tour,
    IFNULL(c_ticket.name, '') c_ticket_name,
    IFNULL(c_ticket.routing, '') c_ticket_routing,
    IFNULL(c_ticket.pax_name, '') c_ticket_pax_name,
    IFNULL(c_ticket.gateway, '') c_ticket_gateway,
    IFNULL(c_ticket.class, '') c_ticket_class,
    IFNULL(c_ticket.fare_basic, '') c_ticket_fare_basic,
    IFNULL(c_ticket.currency, '') c_ticket_currency,
    c_ticket.ex_rate c_ticket_ex_rate,
    IFNULL(c_ticket.currency_id, '') c_ticket_ex_rate_currency,
    c_ticket.public_fare c_ticket_public_fare,
    IFNULL(c_ticket.currency_id, '') C_TICKET_PUBLIC_FARE_C794C3F,
    c_ticket.market_fare c_ticket_market_fare,
    IFNULL(c_ticket.currency_id, '') C_TICKET_MARKET_FARE_CC7526F,
    c_ticket.commission_percent c_ticket_commission_percent,
    c_ticket.commission c_ticket_commission,
    IFNULL(c_ticket.currency_id, '') C_TICKET_COMMISSION_CU495741,
    c_ticket.discount_percent c_ticket_discount_percent,
    c_ticket.discount c_ticket_discount,
    IFNULL(c_ticket.currency_id, '') c_ticket_discount_currency,
    c_ticket.airport_tax c_ticket_airport_tax,
    IFNULL(c_ticket.currency_id, '') C_TICKET_AIRPORT_TAX_CC54907,
    c_ticket.vat_amount c_ticket_vat_amount,
    IFNULL(c_ticket.currency_id, '') C_TICKET_VAT_AMOUNT_CUFA144F,
    c_ticket.service_charge c_ticket_service_charge,
    IFNULL(c_ticket.currency_id, '') C_TICKET_SERVICE_CHARG138803,
    l1.booking_date l1_booking_date,
    IFNULL(c_ticket.supplier, '') c_ticket_supplier,
    l1.full_payment_date l1_full_payment_date,
    IFNULL(l4.id, '') l4_id,
    l4.code l4_code,
    IFNULL(l5.id, '') l5_id,
    l5.code l5_code
    FROM
    c_ticket
    LEFT JOIN
    c_bookingticket_c_ticket_1_c l1_1 ON c_ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb
    AND l1_1.deleted = 0
    LEFT JOIN
    c_bookingticket l1 ON l1.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida
    AND l1.deleted = 0
    LEFT JOIN
    users l2 ON l1.assigned_user_id = l2.id
    AND l2.deleted = 0
    LEFT JOIN
    users l3 ON l1.user_sale_id = l3.id
    AND l3.deleted = 0
    LEFT JOIN
    contacts_c_ticket_1_c l4_1 ON c_ticket.id = l4_1.contacts_c_ticket_1c_ticket_idb
    AND l4_1.deleted = 0
    LEFT JOIN
    contacts l4 ON l4.id = l4_1.contacts_c_ticket_1contacts_ida
    AND l4.deleted = 0
    LEFT JOIN
    accounts_c_ticket_1_c l5_1 ON c_ticket.id = l5_1.accounts_c_ticket_1c_ticket_idb
    AND l5_1.deleted = 0
    LEFT JOIN
    accounts l5 ON l5.id = l5_1.accounts_c_ticket_1accounts_ida
    AND l5.deleted = 0
    WHERE
    ".$this->where."
    AND c_ticket.deleted = 0";
    $rs1 = $GLOBALS['db']->query($q1);
    
    while($row1 = $GLOBALS['db']->fetchbyAssoc($rs1)){
        if(!empty($row1['l5_code']))
            $code = $row1['l5_code'];
        elseif(!empty($row1['l4_code']))
            $code = $row1['l4_code'];
        if(!empty($code)){
            $q2 = "UPDATE c_bookingticket SET customer_code='$code' WHERE id='{$row1['l1_id']}'";
            $GLOBALS['db']->query($q2);    
        }
    }
    
    

?>