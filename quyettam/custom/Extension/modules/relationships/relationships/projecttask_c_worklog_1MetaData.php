<?php
// created: 2015-02-04 14:39:39
$dictionary["projecttask_c_worklog_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'projecttask_c_worklog_1' => 
    array (
      'lhs_module' => 'ProjectTask',
      'lhs_table' => 'project_task',
      'lhs_key' => 'id',
      'rhs_module' => 'C_WorkLog',
      'rhs_table' => 'c_worklog',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'projecttask_c_worklog_1_c',
      'join_key_lhs' => 'projecttask_c_worklog_1projecttask_ida',
      'join_key_rhs' => 'projecttask_c_worklog_1c_worklog_idb',
    ),
  ),
  'table' => 'projecttask_c_worklog_1_c',
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
      'name' => 'projecttask_c_worklog_1projecttask_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'projecttask_c_worklog_1c_worklog_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'projecttask_c_worklog_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'projecttask_c_worklog_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'projecttask_c_worklog_1projecttask_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'projecttask_c_worklog_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'projecttask_c_worklog_1c_worklog_idb',
      ),
    ),
  ),
);