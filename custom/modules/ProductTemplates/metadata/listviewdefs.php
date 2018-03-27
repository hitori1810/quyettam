<?php
$listViewDefs['ProductTemplates'] = 
array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
  ),
  'category_name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_CATEGORY',
    'link' => false,
    'sortable' => true,
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
  'list_price' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LIST_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'discount_price' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DISCOUNT_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'currency' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENCY',
    'width' => '10%',
    'default' => true,
  ),
);
