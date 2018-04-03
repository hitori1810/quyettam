<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-09-24 09:16:14
$dictionary["C_Hotel"]["fields"]["contacts_c_hotel_1"] = array (
  'name' => 'contacts_c_hotel_1',
  'type' => 'link',
  'relationship' => 'contacts_c_hotel_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_HOTEL_1_FROM_C_HOTEL_TITLE',
  'id_name' => 'contacts_c_hotel_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Hotel"]["fields"]["contacts_c_hotel_1_name"] = array (
  'name' => 'contacts_c_hotel_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_HOTEL_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_hotel_1contacts_ida',
  'link' => 'contacts_c_hotel_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Hotel"]["fields"]["contacts_c_hotel_1contacts_ida"] = array (
  'name' => 'contacts_c_hotel_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_HOTEL_1_FROM_C_HOTEL_TITLE_ID',
  'id_name' => 'contacts_c_hotel_1contacts_ida',
  'link' => 'contacts_c_hotel_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-03-05 14:13:39
$dictionary["C_Hotel"]["fields"]["c_hotel_c_bookinghotel_1"] = array (
  'name' => 'c_hotel_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'c_hotel_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'C_BookingHotel',
  'bean_name' => 'C_BookingHotel',
  'vname' => 'LBL_C_HOTEL_C_BOOKINGHOTEL_1_FROM_C_HOTEL_TITLE',
  'id_name' => 'c_hotel_c_bookinghotel_1c_hotel_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-05-04 10:32:36
$dictionary["C_Hotel"]["fields"]["producttemplates_c_hotel_1"] = array (
  'name' => 'producttemplates_c_hotel_1',
  'type' => 'link',
  'relationship' => 'producttemplates_c_hotel_1',
  'source' => 'non-db',
  'module' => 'ProductTemplates',
  'bean_name' => 'ProductTemplate',
  'side' => 'right',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_HOTEL_1_FROM_C_HOTEL_TITLE',
  'id_name' => 'producttemplates_c_hotel_1producttemplates_ida',
  'link-type' => 'one',
);
$dictionary["C_Hotel"]["fields"]["producttemplates_c_hotel_1_name"] = array (
  'name' => 'producttemplates_c_hotel_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_HOTEL_1_FROM_PRODUCTTEMPLATES_TITLE',
  'save' => true,
  'id_name' => 'producttemplates_c_hotel_1producttemplates_ida',
  'link' => 'producttemplates_c_hotel_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'name',
);
$dictionary["C_Hotel"]["fields"]["producttemplates_c_hotel_1producttemplates_ida"] = array (
  'name' => 'producttemplates_c_hotel_1producttemplates_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_HOTEL_1_FROM_C_HOTEL_TITLE_ID',
  'id_name' => 'producttemplates_c_hotel_1producttemplates_ida',
  'link' => 'producttemplates_c_hotel_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2015-03-03 10:11:38
$dictionary['C_Hotel']['fields']['name']['help']='Hotel Name';
$dictionary['C_Hotel']['fields']['name']['unified_search']=false;
$dictionary['C_Hotel']['fields']['name']['calculated']=false;
$dictionary['C_Hotel']['fields']['name']['importable']='true';

 
?>