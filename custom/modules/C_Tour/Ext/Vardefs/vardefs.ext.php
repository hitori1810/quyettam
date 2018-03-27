<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-09-24 09:18:49
$dictionary["C_Tour"]["fields"]["contacts_c_tour_1"] = array (
  'name' => 'contacts_c_tour_1',
  'type' => 'link',
  'relationship' => 'contacts_c_tour_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_TOUR_1_FROM_C_TOUR_TITLE',
  'id_name' => 'contacts_c_tour_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Tour"]["fields"]["contacts_c_tour_1_name"] = array (
  'name' => 'contacts_c_tour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_TOUR_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_tour_1contacts_ida',
  'link' => 'contacts_c_tour_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Tour"]["fields"]["contacts_c_tour_1contacts_ida"] = array (
  'name' => 'contacts_c_tour_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_TOUR_1_FROM_C_TOUR_TITLE_ID',
  'id_name' => 'contacts_c_tour_1contacts_ida',
  'link' => 'contacts_c_tour_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-03-05 14:11:22
$dictionary["C_Tour"]["fields"]["c_tour_c_bookingtour_1"] = array (
  'name' => 'c_tour_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'c_tour_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'C_BookingTour',
  'bean_name' => 'C_BookingTour',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_TOUR_TITLE',
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-05-04 10:34:26
$dictionary["C_Tour"]["fields"]["producttemplates_c_tour_1"] = array (
  'name' => 'producttemplates_c_tour_1',
  'type' => 'link',
  'relationship' => 'producttemplates_c_tour_1',
  'source' => 'non-db',
  'module' => 'ProductTemplates',
  'bean_name' => 'ProductTemplate',
  'side' => 'right',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_TOUR_1_FROM_C_TOUR_TITLE',
  'id_name' => 'producttemplates_c_tour_1producttemplates_ida',
  'link-type' => 'one',
);
$dictionary["C_Tour"]["fields"]["producttemplates_c_tour_1_name"] = array (
  'name' => 'producttemplates_c_tour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_TOUR_1_FROM_PRODUCTTEMPLATES_TITLE',
  'save' => true,
  'id_name' => 'producttemplates_c_tour_1producttemplates_ida',
  'link' => 'producttemplates_c_tour_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'name',
);
$dictionary["C_Tour"]["fields"]["producttemplates_c_tour_1producttemplates_ida"] = array (
  'name' => 'producttemplates_c_tour_1producttemplates_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_TOUR_1_FROM_C_TOUR_TITLE_ID',
  'id_name' => 'producttemplates_c_tour_1producttemplates_ida',
  'link' => 'producttemplates_c_tour_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


    $module = 'C_Tour';
$dictionary[$module]['fields']['email1'] = array(
    'name'        => 'email1',
    'vname'        => 'LBL_EMAIL',
    'group'=>'email1',
    'type'        => 'varchar',
    'function'    => array(
    'name'        => 'getEmailAddressWidget',
       'returns'    => 'html'
    ),
    'source'    => 'non-db',
    'studio' => array('editField' => true),
    );

$dictionary[$module]['fields']['email_addresses_primary'] = array(
    'name' => 'email_addresses_primary',
    'type' => 'link',
    'relationship' => strtolower($module).'_email_addresses_primary',
    'source' => 'non-db',
    'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
    'duplicate_merge' => 'disabled',
    );

$dictionary[$module]['fields']['email_addresses'] = array (
    'name' => 'email_addresses',
    'type' => 'link',
    'relationship' => strtolower($module).'_email_addresses',
    'source' => 'non-db',
    'vname' => 'LBL_EMAIL_ADDRESSES',
    'reportable'=>false,
    'unified_search' => true,
    'rel_fields' => array('primary_address' => array('type'=>'bool')),
    );

$dictionary[$module]['relationships'][strtolower($module).'_email_addresses'] = array(
    'lhs_module'=> $module,
    'lhs_table'=> strtolower($module),
    'lhs_key' => 'id',
    'rhs_module'=> 'EmailAddresses',
    'rhs_table'=> 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type'=>'many-to-many',
    'join_table'=> 'email_addr_bean_rel',
    'join_key_lhs'=>'bean_id',
    'join_key_rhs'=>'email_address_id',
    'relationship_role_column'=>'bean_module',
    'relationship_role_column_value'=>$module
    );

$dictionary[$module]['relationships'][strtolower($module).'_email_addresses_primary'] = array(
    'lhs_module'=> $module,
    'lhs_table' => strtolower($module),
    'lhs_key' => 'id',
    'rhs_module' => 'EmailAddresses',
    'rhs_table' => 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type'=>'many-to-many',
    'join_table'=> 'email_addr_bean_rel',
    'join_key_lhs'=>'bean_id',
    'join_key_rhs'=>'email_address_id',
    'relationship_role_column'=>'primary_address',
    'relationship_role_column_value'=>'1'
    );
    

?>