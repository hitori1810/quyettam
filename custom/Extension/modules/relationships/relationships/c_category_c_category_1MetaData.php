<?php
// created: 2015-03-20 18:01:47
$dictionary["c_category_c_category_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'c_category_c_category_1' => 
    array (
      'lhs_module' => 'C_Category',
      'lhs_table' => 'c_category',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Category',
      'rhs_table' => 'c_category',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_category_c_category_1_c',
      'join_key_lhs' => 'c_category_c_category_1c_category_ida',
      'join_key_rhs' => 'c_category_c_category_1c_category_idb',
    ),
  ),
  'table' => 'c_category_c_category_1_c',
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
      'name' => 'c_category_c_category_1c_category_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_category_c_category_1c_category_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_category_c_category_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_category_c_category_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_category_c_category_1c_category_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_category_c_category_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_category_c_category_1c_category_idb',
      ),
    ),
  ),
);