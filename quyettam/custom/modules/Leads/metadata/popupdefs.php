<?php
$popupMeta = array (
    'moduleMain' => 'Lead',
    'varName' => 'LEAD',
    'orderBy' => 'last_name, first_name',
    'whereClauses' => array (
  'first_name' => 'leads.first_name',
  'last_name' => 'leads.last_name',
  'lead_source' => 'leads.lead_source',
  'status' => 'leads.status',
  'account_name' => 'leads.account_name',
  'assigned_user_id' => 'leads.assigned_user_id',
  'email' => 'leads.email',
  'phone_mobile' => 'leads.phone_mobile',
  'phone_work' => 'leads.phone_work',
  'phone_other' => 'leads.phone_other',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'lead_source',
  3 => 'status',
  4 => 'account_name',
  5 => 'assigned_user_id',
  6 => 'email',
  7 => 'phone_mobile',
  8 => 'phone_work',
  9 => 'phone_other',
    ),
'create' => array (
  'formBase' => 'LeadFormBase.php',
  'formBaseClass' => 'LeadFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'LeadSave',
  ),
  'createButton' => 'LNK_NEW_LEAD',
),
    'searchdefs' => array (
  'first_name' => 
  array (
    'name' => 'first_name',
    'width' => '10%',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'phone_mobile' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'name' => 'phone_mobile',
  ),
  'phone_work' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_OFFICE_PHONE',
    'width' => '10%',
    'name' => 'phone_work',
  ),
  'phone_other' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_OTHER_PHONE',
    'width' => '10%',
    'name' => 'phone_other',
  ),
  'account_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ACCOUNT_NAME',
    'width' => '10%',
    'name' => 'account_name',
  ),
  'lead_source' => 
  array (
    'name' => 'lead_source',
    'width' => '10%',
  ),
  'status' => 
  array (
    'name' => 'status',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '30%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
    'name' => 'name',
  ),
  'ACCOUNT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ACCOUNT_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'account_name',
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
    'name' => 'status',
  ),
  'LEAD_SOURCE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LEAD_SOURCE',
    'default' => true,
    'name' => 'lead_source',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'CATEGORY' => 
  array (
    'usage' => 'query_only'
  ),
),
);
