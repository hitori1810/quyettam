<?php
// created: 2015-05-16 16:35:34
$dictionary["C_BookingHotel"]["fields"]["opportunities_c_bookinghotel_1"] = array (
  'name' => 'opportunities_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE',
  'id_name' => 'opportunities_c_bookinghotel_1opportunities_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingHotel"]["fields"]["opportunities_c_bookinghotel_1_name"] = array (
  'name' => 'opportunities_c_bookinghotel_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGHOTEL_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_c_bookinghotel_1opportunities_ida',
  'link' => 'opportunities_c_bookinghotel_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["C_BookingHotel"]["fields"]["opportunities_c_bookinghotel_1opportunities_ida"] = array (
  'name' => 'opportunities_c_bookinghotel_1opportunities_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE_ID',
  'id_name' => 'opportunities_c_bookinghotel_1opportunities_ida',
  'link' => 'opportunities_c_bookinghotel_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
