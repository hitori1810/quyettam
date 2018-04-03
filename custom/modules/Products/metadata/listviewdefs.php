<?php
$listViewDefs['Products'] = 
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
    'type' => 'varchar',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'unit' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_UNIT',
    'width' => '10%',
    'default' => true,
  ),
  'unit_cost' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_UNIT_COST',
    'currency_format' => true,
    'width' => '10%',
  ),
);
