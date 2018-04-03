<?php 
 //WARNING: The contents of this file are auto-generated


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
  'massupdate' => 0,
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
  'massupdate' => 0,
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
  'massupdate' => 0,
);


// created: 2015-03-05 14:23:18
$dictionary["C_BookingHotel"]["fields"]["contacts_c_bookinghotel_1"] = array (
  'name' => 'contacts_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'contacts_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE',
  'id_name' => 'contacts_c_bookinghotel_1contacts_ida',
  'link-type' => 'one',
  'massupdate' => 0,
);
$dictionary["C_BookingHotel"]["fields"]["contacts_c_bookinghotel_1_name"] = array (
  'name' => 'contacts_c_bookinghotel_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGHOTEL_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_bookinghotel_1contacts_ida',
  'link' => 'contacts_c_bookinghotel_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'massupdate' => 0,
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_BookingHotel"]["fields"]["contacts_c_bookinghotel_1contacts_ida"] = array (
  'name' => 'contacts_c_bookinghotel_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGHOTEL_1_FROM_C_BOOKINGHOTEL_TITLE_ID',
  'id_name' => 'contacts_c_bookinghotel_1contacts_ida',
  'link' => 'contacts_c_bookinghotel_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-18 15:54:12
$dictionary["C_BookingHotel"]["fields"]["c_bookinghotel_c_payment_1"] = array (
  'name' => 'c_bookinghotel_c_payment_1',
  'type' => 'link',
  'relationship' => 'c_bookinghotel_c_payment_1',
  'source' => 'non-db',
  'module' => 'C_Payment',
  'bean_name' => 'C_Payment',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_PAYMENT_1_FROM_C_BOOKINGHOTEL_TITLE',
  'id_name' => 'c_bookinghotel_c_payment_1c_bookinghotel_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-09 09:16:50
$dictionary["C_BookingHotel"]["fields"]["c_bookinghotel_c_room_1"] = array (
  'name' => 'c_bookinghotel_c_room_1',
  'type' => 'link',
  'relationship' => 'c_bookinghotel_c_room_1',
  'source' => 'non-db',
  'module' => 'C_Room',
  'bean_name' => 'C_Room',
  'vname' => 'LBL_C_BOOKINGHOTEL_C_ROOM_1_FROM_C_BOOKINGHOTEL_TITLE',
  'id_name' => 'c_bookinghotel_c_room_1c_bookinghotel_ida',
  'link-type' => 'many',
  'side' => 'left',
);


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

?>