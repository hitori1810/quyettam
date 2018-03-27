<?php
$module_name = 'C_Room';
$listViewDefs[$module_name] = 
array (
  'room_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ROOM_TYPE',
    'width' => '10%',
  ),
  'other_type' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OTHER_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'category' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY',
    'width' => '10%',
  ),
  'other_category' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OTHER_CATEGORY',
    'width' => '10%',
    'default' => true,
  ),
  'adult' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADULT',
    'width' => '10%',
  ),
  'children' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHILDREN',
    'width' => '10%',
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => false,
  ),
);
