<?php
// created: 2015-03-05 14:11:22
$dictionary["c_tour_c_bookingtour_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'c_tour_c_bookingtour_1' => 
    array (
      'lhs_module' => 'C_Tour',
      'lhs_table' => 'c_tour',
      'lhs_key' => 'id',
      'rhs_module' => 'C_BookingTour',
      'rhs_table' => 'c_bookingtour',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_tour_c_bookingtour_1_c',
      'join_key_lhs' => 'c_tour_c_bookingtour_1c_tour_ida',
      'join_key_rhs' => 'c_tour_c_bookingtour_1c_bookingtour_idb',
    ),
  ),
  'table' => 'c_tour_c_bookingtour_1_c',
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
      'name' => 'c_tour_c_bookingtour_1c_tour_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_tour_c_bookingtour_1c_bookingtour_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_tour_c_bookingtour_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_tour_c_bookingtour_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_tour_c_bookingtour_1c_tour_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_tour_c_bookingtour_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_tour_c_bookingtour_1c_bookingtour_idb',
      ),
    ),
  ),
);