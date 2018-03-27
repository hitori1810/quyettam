<?php
$listViewDefs['Products'] = 
array (
  'serial_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
  ),
  'mft_part_num' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MFT_PART_NUM',
    'width' => '10%',
    'default' => true,
  ),
  'status' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_STATUS',
    'link' => false,
    'default' => true,
  ),
  'category_name' => 
  array (
    'type' => 'relate',
    'link' => 'product_categories_link',
    'label' => 'LBL_CATEGORY_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'cost_price' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_COST_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'discount_usdollar' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_DISCOUNT_PRICE',
    'link' => false,
    'default' => true,
    'currency_format' => true,
    'align' => 'right',
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'contact_name' => 
  array (
    'type' => 'relate',
    'link' => 'contact_link',
    'label' => 'LBL_CONTACT_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'account_name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID',
    'module' => 'Accounts',
    'link' => true,
    'default' => false,
    'ACLTag' => 'ACCOUNT',
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
    'sortable' => true,
  ),
  'quote_name' => 
  array (
    'type' => 'relate',
    'link' => 'quotes',
    'label' => 'LBL_QUOTE_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'date_support_expires' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_SUPPORT_EXPIRES',
    'link' => false,
    'default' => false,
  ),
  'date_purchased' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_DATE_PURCHASED',
    'link' => false,
    'default' => false,
  ),
  'list_usdollar' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_LIST_PRICE',
    'link' => false,
    'default' => false,
    'currency_format' => true,
    'align' => 'right',
  ),
  'quantity' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_QUANTITY',
    'link' => false,
    'default' => false,
  ),
  'type_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => false,
  ),
  'team_name' => 
  array (
    'width' => '2%',
    'label' => 'LBL_LIST_TEAM',
    'default' => false,
  ),
);
