<?php
// created: 2015-02-06 22:27:48
$dictionary["c_ward_c_district"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_ward_c_district' => 
    array (
      'lhs_module' => 'C_District',
      'lhs_table' => 'c_district',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Ward',
      'rhs_table' => 'c_ward',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_ward_c_district_c',
      'join_key_lhs' => 'c_ward_c_districtc_district_ida',
      'join_key_rhs' => 'c_ward_c_districtc_ward_idb',
    ),
  ),
  'table' => 'c_ward_c_district_c',
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
      'name' => 'c_ward_c_districtc_district_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_ward_c_districtc_ward_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_ward_c_districtspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_ward_c_district_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_ward_c_districtc_district_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_ward_c_district_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_ward_c_districtc_ward_idb',
      ),
    ),
  ),
);