<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-04-15 15:51:36
$dictionary["C_Ticket"]["fields"]["accounts_c_ticket_1"] = array (
  'name' => 'accounts_c_ticket_1',
  'type' => 'link',
  'relationship' => 'accounts_c_ticket_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_C_TICKET_1_FROM_C_TICKET_TITLE',
  'id_name' => 'accounts_c_ticket_1accounts_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["accounts_c_ticket_1_name"] = array (
  'name' => 'accounts_c_ticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_TICKET_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c_ticket_1accounts_ida',
  'link' => 'accounts_c_ticket_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["C_Ticket"]["fields"]["accounts_c_ticket_1accounts_ida"] = array (
  'name' => 'accounts_c_ticket_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_TICKET_1_FROM_C_TICKET_TITLE_ID',
  'id_name' => 'accounts_c_ticket_1accounts_ida',
  'link' => 'accounts_c_ticket_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-04-15 15:54:38
$dictionary["C_Ticket"]["fields"]["contacts_c_ticket_1"] = array (
  'name' => 'contacts_c_ticket_1',
  'type' => 'link',
  'relationship' => 'contacts_c_ticket_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_TICKET_1_FROM_C_TICKET_TITLE',
  'id_name' => 'contacts_c_ticket_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["contacts_c_ticket_1_name"] = array (
  'name' => 'contacts_c_ticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_TICKET_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_ticket_1contacts_ida',
  'link' => 'contacts_c_ticket_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Ticket"]["fields"]["contacts_c_ticket_1contacts_ida"] = array (
  'name' => 'contacts_c_ticket_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_TICKET_1_FROM_C_TICKET_TITLE_ID',
  'id_name' => 'contacts_c_ticket_1contacts_ida',
  'link' => 'contacts_c_ticket_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-21 17:28:17
$dictionary["C_Ticket"]["fields"]["contacts_c_ticket_2"] = array (
  'name' => 'contacts_c_ticket_2',
  'type' => 'link',
  'relationship' => 'contacts_c_ticket_2',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_TICKET_2_FROM_C_TICKET_TITLE',
  'id_name' => 'contacts_c_ticket_2contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["contacts_c_ticket_2_name"] = array (
  'name' => 'contacts_c_ticket_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_TICKET_2_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_ticket_2contacts_ida',
  'link' => 'contacts_c_ticket_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Ticket"]["fields"]["contacts_c_ticket_2contacts_ida"] = array (
  'name' => 'contacts_c_ticket_2contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_TICKET_2_FROM_C_TICKET_TITLE_ID',
  'id_name' => 'contacts_c_ticket_2contacts_ida',
  'link' => 'contacts_c_ticket_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


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


// created: 2015-07-29 09:50:02
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1"] = array (
  'name' => 'c_ticket_c_ticket_1',
  'type' => 'link',
  'relationship' => 'c_ticket_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_L_TITLE',
  'id_name' => 'c_ticket_c_ticket_1c_ticket_idb',
  'link-type' => 'many',
  'side' => 'left',
);
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1_right"] = array (
  'name' => 'c_ticket_c_ticket_1_right',
  'type' => 'link',
  'relationship' => 'c_ticket_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'side' => 'right',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_R_TITLE',
  'id_name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1_name"] = array (
  'name' => 'c_ticket_c_ticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_L_TITLE',
  'save' => true,
  'id_name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'link' => 'c_ticket_c_ticket_1_right',
  'table' => 'c_ticket',
  'module' => 'C_Ticket',
  'rname' => 'name',
);
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1c_ticket_ida"] = array (
  'name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_R_TITLE_ID',
  'id_name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'link' => 'c_ticket_c_ticket_1_right',
  'table' => 'c_ticket',
  'module' => 'C_Ticket',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-10-01 11:52:04
$dictionary["C_Ticket"]["fields"]["leads_c_ticket_1"] = array (
  'name' => 'leads_c_ticket_1',
  'type' => 'link',
  'relationship' => 'leads_c_ticket_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'side' => 'right',
  'vname' => 'LBL_LEADS_C_TICKET_1_FROM_C_TICKET_TITLE',
  'id_name' => 'leads_c_ticket_1leads_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["leads_c_ticket_1_name"] = array (
  'name' => 'leads_c_ticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_C_TICKET_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_c_ticket_1leads_ida',
  'link' => 'leads_c_ticket_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Ticket"]["fields"]["leads_c_ticket_1leads_ida"] = array (
  'name' => 'leads_c_ticket_1leads_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_C_TICKET_1_FROM_C_TICKET_TITLE_ID',
  'id_name' => 'leads_c_ticket_1leads_ida',
  'link' => 'leads_c_ticket_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2015-03-02 21:01:56

 

 // created: 2015-03-02 21:02:11
$dictionary['C_Ticket']['fields']['card_type']['massupdate']='1';

 

 // created: 2015-03-02 21:01:38

 

 // created: 2015-03-02 21:02:27
$dictionary['C_Ticket']['fields']['class']['massupdate']='1';

 

 // created: 2015-03-02 21:02:48

 

 // created: 2015-03-02 21:02:20
$dictionary['C_Ticket']['fields']['dateline']['massupdate']='1';

 

 // created: 2015-03-02 21:01:46

 

    $dictionary['C_Ticket']['unified_search'] = true;

    $dictionary['C_Ticket']['unified_search_default_enabled'] = true;

    $dictionary['C_Ticket']['fields']['name']['unified_search'] = true; 
    $dictionary['C_Ticket']['fields']['pax_name']['unified_search'] = true; 
    $dictionary['C_Ticket']['fields']['tour']['unified_search'] = true; 


?>