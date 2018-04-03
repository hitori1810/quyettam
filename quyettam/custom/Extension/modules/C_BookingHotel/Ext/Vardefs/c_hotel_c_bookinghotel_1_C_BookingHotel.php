<?php
// created: 2015-03-05 14:13:39
$dictionary["C_BookingHotel"]["fields"]["c_hotel_c_bookinghotel_1"] = array (
  'name' => 'c_hotel_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'c_hotel_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'C_Hotel',
  'bean_name' => 'C_Hotel',
  'side' => 'right',
  'vname' => 'LBL_C_HOTEL_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE',
  'id_name' => 'c_hotel_c_bookinghotel_1c_hotel_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingHotel"]["fields"]["c_hotel_c_bookinghotel_1_name"] = array (
  'name' => 'c_hotel_c_bookinghotel_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_HOTEL_C_BOOKINGHOTEL_1_FROM_C_HOTEL_TITLE',
  'save' => true,
  'id_name' => 'c_hotel_c_bookinghotel_1c_hotel_ida',
  'link' => 'c_hotel_c_bookinghotel_1',
  'table' => 'c_hotel',
  'module' => 'C_Hotel',
  'rname' => 'name',
);
$dictionary["C_BookingHotel"]["fields"]["c_hotel_c_bookinghotel_1c_hotel_ida"] = array (
  'name' => 'c_hotel_c_bookinghotel_1c_hotel_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_HOTEL_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE_ID',
  'id_name' => 'c_hotel_c_bookinghotel_1c_hotel_ida',
  'link' => 'c_hotel_c_bookinghotel_1',
  'table' => 'c_hotel',
  'module' => 'C_Hotel',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
