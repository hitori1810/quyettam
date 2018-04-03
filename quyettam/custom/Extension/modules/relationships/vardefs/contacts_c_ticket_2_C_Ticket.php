<?php
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
