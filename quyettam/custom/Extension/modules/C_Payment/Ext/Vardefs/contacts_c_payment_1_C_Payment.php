<?php
// created: 2018-03-28 09:03:18
$dictionary["C_Payment"]["fields"]["contacts_c_payment_1"] = array (
  'name' => 'contacts_c_payment_1',
  'type' => 'link',
  'relationship' => 'contacts_c_payment_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_PAYMENT_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_payment_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Payment"]["fields"]["contacts_c_payment_1_name"] = array (
  'name' => 'contacts_c_payment_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_PAYMENT_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_payment_1contacts_ida',
  'link' => 'contacts_c_payment_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Payment"]["fields"]["contacts_c_payment_1contacts_ida"] = array (
  'name' => 'contacts_c_payment_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_PAYMENT_1_FROM_C_PAYMENT_TITLE_ID',
  'id_name' => 'contacts_c_payment_1contacts_ida',
  'link' => 'contacts_c_payment_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
