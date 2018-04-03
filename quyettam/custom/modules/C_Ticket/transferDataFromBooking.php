<?php
    require('custom/modules/Reports/fixLabelReport.php');
    fixLabel(); 
    $sql = 'SELECT id FROM c_ticket WHERE deleted <> 1';
    $result = $GLOBALS['db']->query($sql);
    $index = 0;
    while($row = $GLOBALS['db']->fetchByAssoc($result) )
    { 
        $ticket = BeanFactory::getBean('C_Ticket', $row['id']);
        if (empty($ticket->c_bookingticket_c_ticket_1c_bookingticket_ida)) continue;
        $booking = BeanFactory::getBean('C_BookingTicket', $ticket->c_bookingticket_c_ticket_1c_bookingticket_ida);

        $ticket->unit_code = $booking->unit_code;
        $ticket->io_code = $booking->io_code;
        $ticket->document_id = $booking->internal_doc_id;
        $ticket->invoice_no = $booking->invoice_no;
        $ticket->invoice_date = $booking->invoice_date;
        $ticket->full_payment_date = $booking->full_payment_date;
        $ticket->customer_code = $booking->customer_code;
        $ticket->sale_code = $booking->sale_code;
        $ticket->ticketing_code = $booking->ticketing_code;
        $ticket->user_sale_id = $booking->user_sale_id;
        $ticket->user_sale = $booking->user_sale;
        $ticket->supplier = $booking->supplier;
        $ticket->status = $booking->status;
        $ticket->customer_code = $booking->customer_code;

        if ($booking->parent_type == 'Accounts') $ticket->accounts_c_ticket_1accounts_ida = $booking->customer_code;
        $ticket->save();
        $index++;
        echo "Saved ticket! ".$index."<br>";
    }
?>
