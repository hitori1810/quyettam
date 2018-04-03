<?php
$searchdefs['Products'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'serial_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_number',
      ),
      'cost_price' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_COST_PRICE',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'cost_price',
      ),
      'list_price' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_LIST_PRICE',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'list_price',
      ),
      'category_id' => 
      array (
        'name' => 'category_id',
        'default' => true,
        'width' => '10%',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
