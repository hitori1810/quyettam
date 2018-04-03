<?php
    require('custom/modules/Reports/fixLabelReport.php');
    $filter = $this->where;
    $parts = explode("AND", $filter);
    // Is not Admin, Booking date is a range
    if (count($parts) > 8){
        $start_date = get_string_between($parts[0],"'","'");
        $end_date    = get_string_between($parts[1],"'","'");
        if (strlen($parts[5]) <= 39) $team_id = "1";
        else {
            $team_parts = explode("'",$parts[5]);
            $team_id = $team_parts[1];
        }
    }
    // Is not Admin, Booking date is not empty
    else if (count($parts) == 8){
        $start_date = get_string_between($parts[0],"'","'");
        $end_date    = get_string_between($parts[0],"'","'");
        if (strlen($parts[4]) <= 39) $team_id = "1";
        else {
            $team_parts = explode("'",$parts[4]);
            $team_id = $team_parts[1];
        }
    } 
    // Is Admin, Booking date is a range
    else if (count($parts) == 6){
        $start_date = get_string_between($parts[0],"'","'");
        $end_date    = get_string_between($parts[1],"'","'");
        if (strlen($parts[5]) <= 39) $team_id = "1";
        else {
            $team_parts = explode("'",$parts[5]);
            $team_id = $team_parts[1];
        }
    }   
    // Is Admin, Booking date is not empty
    else{
        $start_date = get_string_between($parts[0],"'","'");
        $end_date    = get_string_between($parts[0],"'","'");
        if (strlen($parts[4]) <= 39) $team_id = "1";
        else {
            $team_parts = explode("'",$parts[4]);
            $team_id = $team_parts[1];
        }
    }
    fixLabel(); 
    $cr_user_id = $GLOBALS['current_user']->id;
    // Insert data for BSP channel
    if(!isset($cr_user_id) && empty($cr_user_id)) $cr_user_id = '1';
    $q_delete = "DELETE FROM c_ticketreport WHERE created_by = '$cr_user_id'";
    //Xoa Du lieu
    $result_delete = $GLOBALS['db']->query($q_delete);

    //Insert BSP ticket into TicketReport
    $sql_BSP = "
    SELECT refunded,
    SUM(ticket.receivable) receivable,
    ticket.booking_date booking_date 
    FROM c_ticket ticket
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE (ticket.airline = 'AA-IATA' OR ticket.airline = 'TK-IATA' OR ticket.airline = 'K6A-IATA')
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_BSP .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1)$sql_BSP .= " AND team.id = '$team_id'";
    $sql_BSP .= " GROUP BY refunded";
    $result_BSP = $GLOBALS['db']->query($sql_BSP);
    
    $totalReceivable = 0;
    $totalRefund = 0;
    
    $row_BSP = $GLOBALS['db']->fetchByAssoc($result_BSP);
    $ticketReport_BSP = BeanFactory::newBean('C_TicketReport');
    if ($row_BSP['refunded'] == "0") $totalReceivable = $row_BSP['receivable'];
    else $totalRefund = $row_BSP['receivable'];
    $ticketReport_BSP->channel = 'BSP';
    $ticketReport_BSP->created_by = $cr_user_id;
    $ticketReport_BSP->team_id = $team_id;
    $ticketReport_BSP->team_set_id = $team_id;
    $ticketReport_BSP->booking_date = $row_BSP['booking_date'];

    if ($row_BSP = $GLOBALS['db']->fetchByAssoc($result_BSP)) {
        if ($row_BSP['refunded'] == "0") $totalReceivable = $row_BSP['receivable'];
        else $totalRefund = $row_BSP['receivable'];    
    } 
    $ticketReport_BSP->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_BSP->save();

    //Insert TA ticket into TicketReport
    $sql_TA = "
    SELECT refunded,
    SUM(ticket.receivable) receivable, 
    ticket.booking_date booking_date
    FROM c_ticket ticket
    INNER JOIN c_bookingticket_c_ticket_1_c l1_1 
    ON ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted = 0
    INNER JOIN c_bookingticket booking 
    ON booking.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND booking.deleted = 0
    INNER JOIN accounts_c_ticket_1_c 
    ON ticket.id = accounts_c_ticket_1_c.accounts_c_ticket_1c_ticket_idb AND accounts_c_ticket_1_c.deleted = 0
    INNER JOIN accounts 
    ON accounts.id = accounts_c_ticket_1_c.accounts_c_ticket_1accounts_ida AND accounts.deleted = 0
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE accounts.category = 'TA' 
    AND (ticket.status = 'Ticketed' 
    OR ticket.status = 'Refunded'
    OR ticket.status = 'Exchanged'
    OR ticket.status = 'EMD-Open'
    OR ticket.status = 'EMD-Pending'
    OR ticket.status = 'EMD-Refund')
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_TA .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1) $sql_TA .= " AND team.id = '$team_id'";
    $sql_TA .= " GROUP BY refunded";
    $result_TA = $GLOBALS['db']->query($sql_TA);
    $row_TA = $GLOBALS['db']->fetchByAssoc($result_TA);

    $totalReceivable = 0;
    $totalRefund = 0;

    $ticketReport_TA = BeanFactory::newBean('C_TicketReport');
    $ticketReport_TA->ticket_id = $row_TA['id'];
    if ($row_TA['refunded'] == "0") $totalReceivable = $row_TA['receivable'];
    else $totalRefund = $row_TA['receivable'];
    $ticketReport_TA->channel = 'TA';
    $ticketReport_TA->created_by = $cr_user_id;
    $ticketReport_TA->team_id = $team_id;
    $ticketReport_TA->team_set_id = $team_id;
    $ticketReport_TA->booking_date = $row_TA['booking_date'];


    if ($row_TA = $GLOBALS['db']->fetchByAssoc($result_TA)) {
        if ($row_TA['refunded'] == "0") $totalReceivable = $row_TA['receivable'];
        else $totalRefund = $row_TA['receivable'];    
    } 
    $ticketReport_TA->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_TA->save();

    //Insert TO ticket into TicketReport
    $sql_TO = "
    SELECT refunded,
    SUM(ticket.receivable) receivable, 
    ticket.booking_date booking_date
    FROM c_ticket ticket
    INNER JOIN c_bookingticket_c_ticket_1_c l1_1 
    ON ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted = 0
    INNER JOIN c_bookingticket booking 
    ON booking.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND booking.deleted = 0
    INNER JOIN accounts_c_ticket_1_c 
    ON ticket.id = accounts_c_ticket_1_c.accounts_c_ticket_1c_ticket_idb AND accounts_c_ticket_1_c.deleted = 0
    INNER JOIN accounts 
    ON accounts.id = accounts_c_ticket_1_c.accounts_c_ticket_1accounts_ida AND accounts.deleted = 0
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE accounts.category = 'TO' 
    AND (ticket.status = 'Ticketed' 
    OR ticket.status = 'Refunded' 
    OR ticket.status = 'Exchanged'
    OR ticket.status = 'EMD-Open'
    OR ticket.status = 'EMD-Pending'
    OR ticket.status = 'EMD-Refund')
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_TO .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1) $sql_TO .= " AND team.id = '$team_id'";
    $sql_TO .= " GROUP BY refunded";
    $result_TO = $GLOBALS['db']->query($sql_TO);
    $row_TO = $GLOBALS['db']->fetchByAssoc($result_TO);

    $totalReceivable = 0;
    $totalRefund = 0;

    $ticketReport_TO = BeanFactory::newBean('C_TicketReport');
    $ticketReport_TO->ticket_id = $row_TO['id'];      
    if ($row_TO['refunded'] == "0") $totalReceivable = $row_TO['receivable'];
    else $totalRefund = $row_TO['receivable'];
    $ticketReport_TO->channel = 'TO';
    $ticketReport_TO->created_by = $cr_user_id;
    $ticketReport_TO->team_id = $team_id;
    $ticketReport_TO->team_set_id = $team_id;
    $ticketReport_TO->booking_date = $row_TO['booking_date'];

    if ($row_TO = $GLOBALS['db']->fetchByAssoc($result_TO)) {
        if ($row_TO['refunded'] == "0") $totalReceivable = $row_TO['receivable'];
        else $totalRefund = $row_TO['receivable'];    
    }
    $ticketReport_TO->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_TO->save();

    //Insert CA ticket into TicketReport
    $sql_CA = " 
    SELECT refunded,
    SUM(ticket.receivable) receivable, 
    ticket.booking_date booking_date
    FROM c_ticket ticket
    INNER JOIN c_bookingticket_c_ticket_1_c l1_1 
    ON ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted = 0
    INNER JOIN c_bookingticket booking 
    ON booking.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND booking.deleted = 0
    INNER JOIN accounts_c_ticket_1_c 
    ON ticket.id = accounts_c_ticket_1_c.accounts_c_ticket_1c_ticket_idb AND accounts_c_ticket_1_c.deleted = 0
    INNER JOIN accounts 
    ON accounts.id = accounts_c_ticket_1_c.accounts_c_ticket_1accounts_ida AND accounts.deleted = 0
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE (accounts.category = 'CA' OR accounts.category = 'CA_1_year')
    AND (ticket.status = 'Ticketed'   
    OR ticket.status = 'Refunded'
    OR ticket.status = 'Exchanged'
    OR ticket.status = 'EMD-Open'
    OR ticket.status = 'EMD-Pending'
    OR ticket.status = 'EMD-Refund')
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_CA .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1) $sql_CA .= " AND team.id = '$team_id'";
    $sql_CA .= " GROUP BY refunded";
    $result_CA = $GLOBALS['db']->query($sql_CA);
    
    $totalReceivable = 0;
    $totalRefund = 0;

    $row_CA = $GLOBALS['db']->fetchByAssoc($result_CA); 
    $ticketReport_CA = BeanFactory::newBean('C_TicketReport');
    $ticketReport_CA->ticket_id = $row_CA['id'];
    if ($row_CA['refunded'] == "0") $totalReceivable = $row_CA['receivable'];
    else $totalRefund = $row_CA['receivable'];
    $ticketReport_CA->channel = 'CA';
    $ticketReport_CA->created_by = $cr_user_id;
    $ticketReport_CA->team_id = $team_id;
    $ticketReport_CA->team_set_id = $team_id;
    $ticketReport_CA->booking_date = $row_CA['booking_date'];

    if ($row_CA = $GLOBALS['db']->fetchByAssoc($result_CA)) {
        if ($row_CA['refunded'] == "0") $totalReceivable = $row_CA['receivable'];
        else $totalRefund = $row_CA['receivable'];    
    }
    $ticketReport_CA->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_CA->save();

    //Insert SA ticket into TicketReport
    $sql_SA = "
    SELECT refunded,
    SUM(ticket.receivable) receivable, 
    ticket.booking_date booking_date
    FROM c_ticket ticket
    INNER JOIN c_bookingticket_c_ticket_1_c l1_1 
    ON ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted = 0
    INNER JOIN c_bookingticket booking 
    ON booking.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND booking.deleted = 0
    INNER JOIN accounts_c_ticket_1_c 
    ON ticket.id = accounts_c_ticket_1_c.accounts_c_ticket_1c_ticket_idb AND accounts_c_ticket_1_c.deleted = 0
    INNER JOIN accounts 
    ON accounts.id = accounts_c_ticket_1_c.accounts_c_ticket_1accounts_ida AND accounts.deleted = 0
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE accounts.category = 'SA' 
    AND (ticket.status = 'Ticketed' 
    OR ticket.status = 'Refunded' 
    OR ticket.status = 'Exchanged'
    OR ticket.status = 'EMD-Open'
    OR ticket.status = 'EMD-Pending'
    OR ticket.status = 'EMD-Refund')
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_SA .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1) $sql_SA .= " AND team.id = '$team_id'";
    $sql_SA .= " GROUP BY refunded";
    $result_SA = $GLOBALS['db']->query($sql_SA);
    
    $totalReceivable = 0;
    $totalRefund = 0;
    
    $row_SA = $GLOBALS['db']->fetchByAssoc($result_SA);
    $ticketReport_SA = BeanFactory::newBean('C_TicketReport');
    $ticketReport_SA->ticket_id = $row_SA['id'];      
    if ($row_SA['refunded'] == "0") $totalReceivable = $row_SA['receivable'];
    else $totalRefund = $row_SA['receivable'];
    $ticketReport_SA->channel = 'SA';
    $ticketReport_SA->created_by = $cr_user_id;
    $ticketReport_SA->team_id = $team_id;
    $ticketReport_SA->team_set_id = $team_id;
    $ticketReport_SA->booking_date = $row_SA['booking_date'];

    if ($row_SA = $GLOBALS['db']->fetchByAssoc($result_SA)) {
        if ($row_SA['refunded'] == "0") $totalReceivable = $row_SA['receivable'];
        else $totalRefund = $row_SA['receivable'];    
    }
    $ticketReport_SA->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_SA->save();

    //Insert Exchanged AA-TK ticket into TicketReport
    $sql_Exchanged_AATK = "  
    SELECT refunded,
    SUM(ticket.receivable) receivable,
    ticket.booking_date booking_date
    FROM c_ticket ticket
    INNER JOIN c_bookingticket_c_ticket_1_c l1_1 
    ON ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted = 0
    INNER JOIN c_bookingticket booking 
    ON booking.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND booking.deleted = 0
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE ticket.status = 'Exchanged AA-TK'
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_Exchanged_AATK .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1) $sql_Exchanged_AATK .= " AND team.id = '$team_id'";
    $sql_Exchanged_AATK .= " GROUP BY refunded";
    $result_Exchanged_AATK = $GLOBALS['db']->query($sql_Exchanged_AATK);
    
    $totalReceivable = 0;
    $totalRefund = 0;

    $row_Exchanged_AATK = $GLOBALS['db']->fetchByAssoc($result_Exchanged_AATK);
    $ticketReport_AATK = BeanFactory::newBean('C_TicketReport');
    $ticketReport_AATK->ticket_id = $row_Exchanged_AATK['id'];
    if ($row_Exchanged_AATK['refunded'] == "0") $totalReceivable = $row_Exchanged_AATK['receivable'];
    else $totalRefund = $row_Exchanged_AATK['receivable'];
    $ticketReport_AATK->channel = 'Exchanged AA-TK';
    $ticketReport_AATK->created_by = $cr_user_id;
    $ticketReport_AATK->team_id = $team_id;
    $ticketReport_AATK->team_set_id = $team_id;
    $ticketReport_AATK->booking_date = $row_Exchanged_AATK['booking_date'];

    if ($row_Exchanged_AATK = $GLOBALS['db']->fetchByAssoc($result_Exchanged_AATK)) {
        if ($row_Exchanged_AATK['refunded'] == "0") $totalReceivable = $row_Exchanged_AATK['receivable'];
        else $totalRefund = $row_Exchanged_AATK['receivable'];    
    }
    $ticketReport_AATK->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_AATK->save();

    //Insert FIT ticket into TicketReport
    $sql_FIT = " 
    SELECT refunded,
    SUM(ticket.receivable) receivable ,
    ticket.booking_date booking_date
    FROM c_ticket ticket
    INNER JOIN c_bookingticket_c_ticket_1_c l1_1 
    ON ticket.id = l1_1.c_bookingticket_c_ticket_1c_ticket_idb AND l1_1.deleted = 0
    INNER JOIN c_bookingticket booking 
    ON booking.id = l1_1.c_bookingticket_c_ticket_1c_bookingticket_ida AND booking.deleted = 0
    INNER JOIN contacts_c_ticket_1_c 
    ON ticket.id = contacts_c_ticket_1_c.contacts_c_ticket_1c_ticket_idb AND contacts_c_ticket_1_c.deleted = 0
    INNER JOIN contacts 
    ON contacts.id = contacts_c_ticket_1_c.contacts_c_ticket_1contacts_ida AND contacts.deleted = 0
    LEFT JOIN  teams team ON ticket.team_id=team.id AND team.deleted=0
    WHERE (ticket.status = 'Ticketed'  
    OR ticket.status = 'Refunded'
    OR ticket.status = 'Exchanged'
    OR ticket.status = 'EMD-Open'
    OR ticket.status = 'EMD-Pending'
    OR ticket.status = 'EMD-Refund')
    AND ticket.deleted <> 1";

    if(!empty($start_date) && !empty($end_date)) $sql_FIT .= " AND ticket.booking_date >= '$start_date' AND ticket.booking_date <= '$end_date'";
    if($team_id != 1) $sql_FIT .= " AND team.id = '$team_id'";
    $sql_FIT .= " GROUP BY refunded";
    $result_FIT = $GLOBALS['db']->query($sql_FIT);
    
    $totalReceivable = 0;
    $totalRefund = 0;

    $row_FIT = $GLOBALS['db']->fetchByAssoc($result_FIT);
    $ticketReport_FIT = BeanFactory::newBean('C_TicketReport');
    $ticketReport_FIT->ticket_id = $row_FIT['id'];
    if ($row_FIT['refunded'] == "0") $totalReceivable = $row_FIT['receivable'];
    else $totalRefund = $row_FIT['receivable'];
    $ticketReport_FIT->channel = 'FIT';
    $ticketReport_FIT->created_by = $cr_user_id;
    $ticketReport_FIT->team_id = $team_id;
    $ticketReport_FIT->team_set_id = $team_id;
    $ticketReport_FIT->booking_date = $row_FIT['booking_date'];

    if ($row_FIT = $GLOBALS['db']->fetchByAssoc($result_FIT))  {
        if ($row_FIT['refunded'] == "0") $totalReceivable = $row_FIT['receivable'];
        else $totalRefund = $row_FIT['receivable'];    
    }
    $ticketReport_FIT->receivable = format_number($totalReceivable - $totalRefund);
    $ticketReport_FIT->save();

    //echo "BSP: ".$sql_BSP."<br><br>";
//    echo "TO: ".$sql_TO."<br><br>";
//    echo "TA: ".$sql_TA."<br><br>";
//    echo "FIT: ".$sql_FIT."<br><br>";
//    echo "CA: ".$sql_CA."<br><br>";
//    echo "SA: ".$sql_SA."<br><br>";
//    echo "Exchanged: ".$sql_Exchanged_AATK."<br>";

    function get_string_between($string, $start, $end){
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
    }
?>
