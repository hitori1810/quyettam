<?php
$popupMeta = array (
    'moduleMain' => 'ProductTemplates',
    'varName' => 'ProductTemplate',
    'orderBy' => 'product_templates.name',
    'whereClauses' => array (
  'name' => 'product_templates.name',
  'category_name' => 'producttemplates.category_name',
  'code' => 'producttemplates.code',
),
    'searchInputs' => array (
  0 => 'name',
  1 => 'category_name',
  2 => 'code',
),
    'searchdefs' => array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'category_name' => 
  array (
    'name' => 'category_name',
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
    'name' => 'code',
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'CATEGORY_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_CATEGORY',
    'sortable' => true,
    'default' => true,
    'name' => 'category_name',
  ),
  'COST_PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_COST_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'cost_price',
  ),
  'LIST_PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LIST_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'list_price',
  ),
  'DISCOUNT_PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DISCOUNT_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'discount_price',
  ),
),
);
