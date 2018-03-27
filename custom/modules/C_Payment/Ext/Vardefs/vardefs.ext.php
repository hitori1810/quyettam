<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-05-18 15:54:12
$dictionary["C_Payment"]["fields"]["c_bookinghotel_c_payment_1"] = array (
  'name' => 'c_bookinghotel_c_payment_1',
  'type' => 'link',
  'relationship' => 'c_bookinghotel_c_payment_1',
  'source' => 'non-db',
  'module' => 'C_BookingHotel',
  'bean_name' => 'C_BookingHotel',
  'side' => 'right',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_PAYMENT_1_FROM_C_PAYMENT_TITLE',
  'id_name' => 'c_bookinghotel_c_payment_1c_bookinghotel_ida',
  'link-type' => 'one',
);
$dictionary["C_Payment"]["fields"]["c_bookinghotel_c_payment_1_name"] = array (
  'name' => 'c_bookinghotel_c_payment_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_PAYMENT_1_FROM_C_BOOKINGHOTEL_TITLE',
  'save' => true,
  'id_name' => 'c_bookinghotel_c_payment_1c_bookinghotel_ida',
  'link' => 'c_bookinghotel_c_payment_1',
  'table' => 'c_bookinghotel',
  'module' => 'C_BookingHotel',
  'rname' => 'name',
);
$dictionary["C_Payment"]["fields"]["c_bookinghotel_c_payment_1c_bookinghotel_ida"] = array (
  'name' => 'c_bookinghotel_c_payment_1c_bookinghotel_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_PAYMENT_1_FROM_C_PAYMENT_TITLE_ID',
  'id_name' => 'c_bookinghotel_c_payment_1c_bookinghotel_ida',
  'link' => 'c_bookinghotel_c_payment_1',
  'table' => 'c_bookinghotel',
  'module' => 'C_BookingHotel',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-18 15:52:14
$dictionary["C_Payment"]["fields"]["c_bookingticket_c_payment_1"] = array (
  'name' => 'c_bookingticket_c_payment_1',
  'type' => 'link',
  'relationship' => 'c_bookingticket_c_payment_1',
  'source' => 'non-db',
  'module' => 'C_BookingTicket',
  'bean_name' => 'C_BookingTicket',
  'side' => 'right',
  'vname' => 'LBL_C_BOOKINGTICKET_C_PAYMENT_1_FROM_C_PAYMENT_TITLE',
  'id_name' => 'c_bookingticket_c_payment_1c_bookingticket_ida',
  'link-type' => 'one',
);
$dictionary["C_Payment"]["fields"]["c_bookingticket_c_payment_1_name"] = array (
  'name' => 'c_bookingticket_c_payment_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTICKET_C_PAYMENT_1_FROM_C_BOOKINGTICKET_TITLE',
  'save' => true,
  'id_name' => 'c_bookingticket_c_payment_1c_bookingticket_ida',
  'link' => 'c_bookingticket_c_payment_1',
  'table' => 'c_bookingticket',
  'module' => 'C_BookingTicket',
  'rname' => 'name',
);
$dictionary["C_Payment"]["fields"]["c_bookingticket_c_payment_1c_bookingticket_ida"] = array (
  'name' => 'c_bookingticket_c_payment_1c_bookingticket_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTICKET_C_PAYMENT_1_FROM_C_PAYMENT_TITLE_ID',
  'id_name' => 'c_bookingticket_c_payment_1c_bookingticket_ida',
  'link' => 'c_bookingticket_c_payment_1',
  'table' => 'c_bookingticket',
  'module' => 'C_BookingTicket',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-18 16:01:45
$dictionary["C_Payment"]["fields"]["c_bookingtour_c_payment_1"] = array (
  'name' => 'c_bookingtour_c_payment_1',
  'type' => 'link',
  'relationship' => 'c_bookingtour_c_payment_1',
  'source' => 'non-db',
  'module' => 'C_BookingTour',
  'bean_name' => 'C_BookingTour',
  'side' => 'right',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_1_FROM_C_PAYMENT_TITLE',
  'id_name' => 'c_bookingtour_c_payment_1c_bookingtour_ida',
  'link-type' => 'one',
);
$dictionary["C_Payment"]["fields"]["c_bookingtour_c_payment_1_name"] = array (
  'name' => 'c_bookingtour_c_payment_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_1_FROM_C_BOOKINGTOUR_TITLE',
  'save' => true,
  'id_name' => 'c_bookingtour_c_payment_1c_bookingtour_ida',
  'link' => 'c_bookingtour_c_payment_1',
  'table' => 'c_bookingtour',
  'module' => 'C_BookingTour',
  'rname' => 'name',
);
$dictionary["C_Payment"]["fields"]["c_bookingtour_c_payment_1c_bookingtour_ida"] = array (
  'name' => 'c_bookingtour_c_payment_1c_bookingtour_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_1_FROM_C_PAYMENT_TITLE_ID',
  'id_name' => 'c_bookingtour_c_payment_1c_bookingtour_ida',
  'link' => 'c_bookingtour_c_payment_1',
  'table' => 'c_bookingtour',
  'module' => 'C_BookingTour',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

?>