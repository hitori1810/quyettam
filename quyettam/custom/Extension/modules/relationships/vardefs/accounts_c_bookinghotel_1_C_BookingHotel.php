<?php
// created: 2015-03-05 14:18:59
$dictionary["C_BookingHotel"]["fields"]["accounts_c_bookinghotel_1"] = array (
  'name' => 'accounts_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'accounts_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE',
  'id_name' => 'accounts_c_bookinghotel_1accounts_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingHotel"]["fields"]["accounts_c_bookinghotel_1_name"] = array (
  'name' => 'accounts_c_bookinghotel_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGHOTEL_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c_bookinghotel_1accounts_ida',
  'link' => 'accounts_c_bookinghotel_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["C_BookingHotel"]["fields"]["accounts_c_bookinghotel_1accounts_ida"] = array (
  'name' => 'accounts_c_bookinghotel_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE_ID',
  'id_name' => 'accounts_c_bookinghotel_1accounts_ida',
  'link' => 'accounts_c_bookinghotel_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
