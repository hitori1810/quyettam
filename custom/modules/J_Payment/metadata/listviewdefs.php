<?php
$module_name = 'J_Payment';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'customer' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CUSTOMER',
    'width' => '10%',
    'default' => true,
  ),
  'payment_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'payment_amount' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
);
