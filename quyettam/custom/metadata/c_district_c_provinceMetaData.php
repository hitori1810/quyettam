<?php
// created: 2015-02-06 22:27:47
$dictionary["c_district_c_province"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_district_c_province' => 
    array (
      'lhs_module' => 'C_Province',
      'lhs_table' => 'c_province',
      'lhs_key' => 'id',
      'rhs_module' => 'C_District',
      'rhs_table' => 'c_district',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_district_c_province_c',
      'join_key_lhs' => 'c_district_c_provincec_province_ida',
      'join_key_rhs' => 'c_district_c_provincec_district_idb',
    ),
  ),
  'table' => 'c_district_c_province_c',
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
      'name' => 'c_district_c_provincec_province_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_district_c_provincec_district_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_district_c_provincespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_district_c_province_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_district_c_provincec_province_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_district_c_province_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_district_c_provincec_district_idb',
      ),
    ),
  ),
);