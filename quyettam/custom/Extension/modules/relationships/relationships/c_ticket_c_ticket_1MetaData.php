<?php
// created: 2015-07-29 09:50:02
$dictionary["c_ticket_c_ticket_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'c_ticket_c_ticket_1' => 
    array (
      'lhs_module' => 'C_Ticket',
      'lhs_table' => 'c_ticket',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Ticket',
      'rhs_table' => 'c_ticket',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_ticket_c_ticket_1_c',
      'join_key_lhs' => 'c_ticket_c_ticket_1c_ticket_ida',
      'join_key_rhs' => 'c_ticket_c_ticket_1c_ticket_idb',
    ),
  ),
  'table' => 'c_ticket_c_ticket_1_c',
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
      'name' => 'c_ticket_c_ticket_1c_ticket_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_ticket_c_ticket_1c_ticket_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_ticket_c_ticket_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_ticket_c_ticket_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_ticket_c_ticket_1c_ticket_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_ticket_c_ticket_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_ticket_c_ticket_1c_ticket_idb',
      ),
    ),
  ),
);