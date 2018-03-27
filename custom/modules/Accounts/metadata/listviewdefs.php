<?php
$listViewDefs['Accounts'] = 
array (
  'code' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CODE',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
  ),
  'category' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_CATEGORY',
    'width' => '10%',
  ),
  'email1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
  ),
  'phone_office' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_PHONE',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_TEAM',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
  ),
  'billing_address_street' => 
  array (
    'width' => '15%',
    'label' => 'LBL_BILLING_ADDRESS_STREET',
    'default' => false,
  ),
  'shipping_address_street' => 
  array (
    'width' => '15%',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_MODIFIED',
    'default' => false,
  ),
  'created_by_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
  'bank_branch' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BANK_BRANCH',
    'width' => '10%',
    'default' => false,
  ),
  'phone_fax' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PHONE_FAX',
    'default' => false,
  ),
  'credit_limit' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_CREDIT_LIMIT',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
  'active_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ACTIVE_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'brand_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BRAND_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'exp_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EXP_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'bank_name' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_BANK_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'tax_code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TAX_CODE',
    'width' => '10%',
    'default' => false,
  ),
  'modified_by_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
);
