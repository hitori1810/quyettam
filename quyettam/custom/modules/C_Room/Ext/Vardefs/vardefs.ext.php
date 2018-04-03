<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-03-09 09:16:50
$dictionary["C_Room"]["fields"]["c_bookinghotel_c_room_1"] = array (
  'name' => 'c_bookinghotel_c_room_1',
  'type' => 'link',
  'relationship' => 'c_bookinghotel_c_room_1',
  'source' => 'non-db',
  'module' => 'C_BookingHotel',
  'bean_name' => 'C_BookingHotel',
  'side' => 'right',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_ROOM_1_FROM_C_ROOM_TITLE',
  'id_name' => 'c_bookinghotel_c_room_1c_bookinghotel_ida',
  'link-type' => 'one',
);
$dictionary["C_Room"]["fields"]["c_bookinghotel_c_room_1_name"] = array (
  'name' => 'c_bookinghotel_c_room_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_ROOM_1_FROM_C_BOOKINGHOTEL_TITLE',
  'save' => true,
  'id_name' => 'c_bookinghotel_c_room_1c_bookinghotel_ida',
  'link' => 'c_bookinghotel_c_room_1',
  'table' => 'c_bookinghotel',
  'module' => 'C_BookingHotel',
  'rname' => 'name',
);
$dictionary["C_Room"]["fields"]["c_bookinghotel_c_room_1c_bookinghotel_ida"] = array (
  'name' => 'c_bookinghotel_c_room_1c_bookinghotel_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_ROOM_1_FROM_C_ROOM_TITLE_ID',
  'id_name' => 'c_bookinghotel_c_room_1c_bookinghotel_ida',
  'link' => 'c_bookinghotel_c_room_1',
  'table' => 'c_bookinghotel',
  'module' => 'C_BookingHotel',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

?>