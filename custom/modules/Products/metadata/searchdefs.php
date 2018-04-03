<?php
$searchdefs['Products'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'unit' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_UNIT',
        'width' => '10%',
        'default' => true,
        'name' => 'unit',
      ),
      'unit_cost' => 
      array (
        'type' => 'currency',
        'default' => true,
        'label' => 'LBL_UNIT_COST',
        'currency_format' => true,
        'width' => '10%',
        'name' => 'unit_cost',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 'tax_class',
      2 => 'status',
      3 => 'manufacturer_id',
      4 => 'category_id',
      5 => 
      array (
        'name' => 'contact_name',
        'label' => 'LBL_CONTACT_NAME',
        'type' => 'name',
      ),
      6 => 'mft_part_num',
      7 => 'type_id',
      8 => 'support_term',
      9 => 'website',
      10 => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
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
