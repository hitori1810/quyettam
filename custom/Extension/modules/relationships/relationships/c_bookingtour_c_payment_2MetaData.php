<?php
// created: 2015-05-18 16:03:05
$dictionary["c_bookingtour_c_payment_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'c_bookingtour_c_payment_2' => 
    array (
      'lhs_module' => 'C_BookingTour',
      'lhs_table' => 'c_bookingtour',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Payment',
      'rhs_table' => 'c_payment',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_bookingtour_c_payment_2_c',
      'join_key_lhs' => 'c_bookingtour_c_payment_2c_bookingtour_ida',
      'join_key_rhs' => 'c_bookingtour_c_payment_2c_payment_idb',
    ),
  ),
  'table' => 'c_bookingtour_c_payment_2_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'c_bookingtour_c_payment_2c_bookingtour_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_bookingtour_c_payment_2c_payment_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_bookingtour_c_payment_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_bookingtour_c_payment_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_bookingtour_c_payment_2c_bookingtour_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_bookingtour_c_payment_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_bookingtour_c_payment_2c_payment_idb',
      ),
    ),
  ),
);