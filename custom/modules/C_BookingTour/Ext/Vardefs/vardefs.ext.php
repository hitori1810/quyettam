<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-03-05 14:16:16
$dictionary["C_BookingTour"]["fields"]["accounts_c_bookingtour_1"] = array (
  'name' => 'accounts_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'accounts_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE',
  'id_name' => 'accounts_c_bookingtour_1accounts_ida',
  'link-type' => 'one',
  'massupdate' => 0,
);
$dictionary["C_BookingTour"]["fields"]["accounts_c_bookingtour_1_name"] = array (
  'name' => 'accounts_c_bookingtour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTOUR_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c_bookingtour_1accounts_ida',
  'link' => 'accounts_c_bookingtour_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
  'massupdate' => 0,
);
$dictionary["C_BookingTour"]["fields"]["accounts_c_bookingtour_1accounts_ida"] = array (
  'name' => 'accounts_c_bookingtour_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE_ID',
  'id_name' => 'accounts_c_bookingtour_1accounts_ida',
  'link' => 'accounts_c_bookingtour_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-03-05 14:21:35
$dictionary["C_BookingTour"]["fields"]["contacts_c_bookingtour_1"] = array (
  'name' => 'contacts_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'contacts_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE',
  'id_name' => 'contacts_c_bookingtour_1contacts_ida',
  'link-type' => 'one',
  'massupdate' => 0,
);
$dictionary["C_BookingTour"]["fields"]["contacts_c_bookingtour_1_name"] = array (
  'name' => 'contacts_c_bookingtour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTOUR_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_bookingtour_1contacts_ida',
  'link' => 'contacts_c_bookingtour_1',
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
$dictionary["C_BookingTour"]["fields"]["contacts_c_bookingtour_1contacts_ida"] = array (
  'name' => 'contacts_c_bookingtour_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE_ID',
  'id_name' => 'contacts_c_bookingtour_1contacts_ida',
  'link' => 'contacts_c_bookingtour_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-18 16:01:45
$dictionary["C_BookingTour"]["fields"]["c_bookingtour_c_payment_1"] = array (
  'name' => 'c_bookingtour_c_payment_1',
  'type' => 'link',
  'relationship' => 'c_bookingtour_c_payment_1',
  'source' => 'non-db',
  'module' => 'C_Payment',
  'bean_name' => 'C_Payment',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_1_FROM_C_BOOKINGTOUR_TITLE',
  'id_name' => 'c_bookingtour_c_payment_1c_bookingtour_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-05 14:11:22
$dictionary["C_BookingTour"]["fields"]["c_tour_c_bookingtour_1"] = array (
  'name' => 'c_tour_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'c_tour_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'C_Tour',
  'bean_name' => 'C_Tour',
  'side' => 'right',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE',
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingTour"]["fields"]["c_tour_c_bookingtour_1_name"] = array (
  'name' => 'c_tour_c_bookingtour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_TOUR_TITLE',
  'save' => true,
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link' => 'c_tour_c_bookingtour_1',
  'table' => 'c_tour',
  'module' => 'C_Tour',
  'rname' => 'name',
);
$dictionary["C_BookingTour"]["fields"]["c_tour_c_bookingtour_1c_tour_ida"] = array (
  'name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE_ID',
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link' => 'c_tour_c_bookingtour_1',
  'table' => 'c_tour',
  'module' => 'C_Tour',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-16 16:39:46
$dictionary["C_BookingTour"]["fields"]["opportunities_c_bookingtour_1"] = array (
  'name' => 'opportunities_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE',
  'id_name' => 'opportunities_c_bookingtour_1opportunities_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingTour"]["fields"]["opportunities_c_bookingtour_1_name"] = array (
  'name' => 'opportunities_c_bookingtour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTOUR_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_c_bookingtour_1opportunities_ida',
  'link' => 'opportunities_c_bookingtour_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["C_BookingTour"]["fields"]["opportunities_c_bookingtour_1opportunities_ida"] = array (
  'name' => 'opportunities_c_bookingtour_1opportunities_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE_ID',
  'id_name' => 'opportunities_c_bookingtour_1opportunities_ida',
  'link' => 'opportunities_c_bookingtour_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2015-03-05 14:34:52

 
?>