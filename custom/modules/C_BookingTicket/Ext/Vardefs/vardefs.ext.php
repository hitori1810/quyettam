<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-03-24 09:12:26
$dictionary["C_BookingTicket"]["fields"]["accounts_c_bookingticket_1"] = array (
  'name' => 'accounts_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'accounts_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'id_name' => 'accounts_c_bookingticket_1accounts_ida',
  'link-type' => 'one',
  'massupdate' => 0,
);
$dictionary["C_BookingTicket"]["fields"]["accounts_c_bookingticket_1_name"] = array (
  'name' => 'accounts_c_bookingticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c_bookingticket_1accounts_ida',
  'link' => 'accounts_c_bookingticket_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
  'massupdate' => 0,
);
$dictionary["C_BookingTicket"]["fields"]["accounts_c_bookingticket_1accounts_ida"] = array (
  'name' => 'accounts_c_bookingticket_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE_ID',
  'id_name' => 'accounts_c_bookingticket_1accounts_ida',
  'link' => 'accounts_c_bookingticket_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-03-24 09:10:32
$dictionary["C_BookingTicket"]["fields"]["contacts_c_bookingticket_1"] = array (
  'name' => 'contacts_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'contacts_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'id_name' => 'contacts_c_bookingticket_1contacts_ida',
  'link-type' => 'one',
  'massupdate' => 0,
);
$dictionary["C_BookingTicket"]["fields"]["contacts_c_bookingticket_1_name"] = array (
  'name' => 'contacts_c_bookingticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACT',
  'save' => true,
  'id_name' => 'contacts_c_bookingticket_1contacts_ida',
  'link' => 'contacts_c_bookingticket_1',
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
$dictionary["C_BookingTicket"]["fields"]["contacts_c_bookingticket_1contacts_ida"] = array (
  'name' => 'contacts_c_bookingticket_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE_ID',
  'id_name' => 'contacts_c_bookingticket_1contacts_ida',
  'link' => 'contacts_c_bookingticket_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-09-21 11:01:59
$dictionary["C_BookingTicket"]["fields"]["contacts_c_bookingticket_2"] = array (
  'name' => 'contacts_c_bookingticket_2',
  'type' => 'link',
  'relationship' => 'contacts_c_bookingticket_2',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTICKET_2_FROM_C_BOOKINGTICKET_TITLE',
  'id_name' => 'contacts_c_bookingticket_2contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingTicket"]["fields"]["contacts_c_bookingticket_2_name"] = array (
  'name' => 'contacts_c_bookingticket_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTICKET_2_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_bookingticket_2contacts_ida',
  'link' => 'contacts_c_bookingticket_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_BookingTicket"]["fields"]["contacts_c_bookingticket_2contacts_ida"] = array (
  'name' => 'contacts_c_bookingticket_2contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_BOOKINGTICKET_2_FROM_C_BOOKINGTICKET_TITLE_ID',
  'id_name' => 'contacts_c_bookingticket_2contacts_ida',
  'link' => 'contacts_c_bookingticket_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-18 15:52:14
$dictionary["C_BookingTicket"]["fields"]["c_bookingticket_c_payment_1"] = array (
  'name' => 'c_bookingticket_c_payment_1',
  'type' => 'link',
  'relationship' => 'c_bookingticket_c_payment_1',
  'source' => 'non-db',
  'module' => 'C_Payment',
  'bean_name' => 'C_Payment',
  'vname' => 'LBL_C_BOOKINGTICKET_C_PAYMENT_1_FROM_C_BOOKINGTICKET_TITLE',
  'id_name' => 'c_bookingticket_c_payment_1c_bookingticket_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-10 10:09:20
$dictionary["C_BookingTicket"]["fields"]["c_bookingticket_c_ticket_1"] = array (
  'name' => 'c_bookingticket_c_ticket_1',
  'type' => 'link',
  'relationship' => 'c_bookingticket_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'vname' => 'LBL_C_BOOKINGTICKET_C_TICKET_1_FROM_C_TICKET_TITLE',
  'id_name' => 'c_bookingticket_c_ticket_1c_bookingticket_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-10-01 11:50:07
$dictionary["C_BookingTicket"]["fields"]["leads_c_bookingticket_1"] = array (
  'name' => 'leads_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'leads_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'side' => 'right',
  'vname' => 'LBL_LEADS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'id_name' => 'leads_c_bookingticket_1leads_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingTicket"]["fields"]["leads_c_bookingticket_1_name"] = array (
  'name' => 'leads_c_bookingticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_C_BOOKINGTICKET_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_c_bookingticket_1leads_ida',
  'link' => 'leads_c_bookingticket_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_BookingTicket"]["fields"]["leads_c_bookingticket_1leads_ida"] = array (
  'name' => 'leads_c_bookingticket_1leads_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE_ID',
  'id_name' => 'leads_c_bookingticket_1leads_ida',
  'link' => 'leads_c_bookingticket_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-16 16:24:10
$dictionary["C_BookingTicket"]["fields"]["opportunities_c_bookingticket_1"] = array (
  'name' => 'opportunities_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'id_name' => 'opportunities_c_bookingticket_1opportunities_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingTicket"]["fields"]["opportunities_c_bookingticket_1_name"] = array (
  'name' => 'opportunities_c_bookingticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTICKET_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_c_bookingticket_1opportunities_ida',
  'link' => 'opportunities_c_bookingticket_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["C_BookingTicket"]["fields"]["opportunities_c_bookingticket_1opportunities_ida"] = array (
  'name' => 'opportunities_c_bookingticket_1opportunities_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE_ID',
  'id_name' => 'opportunities_c_bookingticket_1opportunities_ida',
  'link' => 'opportunities_c_bookingticket_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2016-08-31 15:38:31
$dictionary['C_BookingTicket']['fields']['date_in_c']['labelValue']='date in';
$dictionary['C_BookingTicket']['fields']['date_in_c']['enforced']='';
$dictionary['C_BookingTicket']['fields']['date_in_c']['dependency']='';

 

 // created: 2016-08-31 15:37:24
$dictionary['C_BookingTicket']['fields']['date_out_c']['labelValue']='date out';
$dictionary['C_BookingTicket']['fields']['date_out_c']['enforced']='';
$dictionary['C_BookingTicket']['fields']['date_out_c']['dependency']='';

 
?>