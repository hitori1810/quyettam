<?php
// created: 2015-03-10 10:09:20
$dictionary["C_Ticket"]["fields"]["c_bookingticket_c_ticket_1"] = array (
  'name' => 'c_bookingticket_c_ticket_1',
  'type' => 'link',
  'relationship' => 'c_bookingticket_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_BookingTicket',
  'bean_name' => 'C_BookingTicket',
  'side' => 'right',
  'vname' => 'LBL_C_BOOKINGTICKET_C_TICKET_1_FROM_C_TICKET_TITLE',
  'id_name' => 'c_bookingticket_c_ticket_1c_bookingticket_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["c_bookingticket_c_ticket_1_name"] = array (
  'name' => 'c_bookingticket_c_ticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTICKET_TITLE',
  'save' => true,
  'id_name' => 'c_bookingticket_c_ticket_1c_bookingticket_ida',
  'link' => 'c_bookingticket_c_ticket_1',
  'table' => 'c_bookingticket',
  'module' => 'C_BookingTicket',
  'rname' => 'name',
);
$dictionary["C_Ticket"]["fields"]["c_bookingticket_c_ticket_1c_bookingticket_ida"] = array (
  'name' => 'c_bookingticket_c_ticket_1c_bookingticket_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTICKET_C_TICKET_1_FROM_C_TICKET_TITLE_ID',
  'id_name' => 'c_bookingticket_c_ticket_1c_bookingticket_ida',
  'link' => 'c_bookingticket_c_ticket_1',
  'table' => 'c_bookingticket',
  'module' => 'C_BookingTicket',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
