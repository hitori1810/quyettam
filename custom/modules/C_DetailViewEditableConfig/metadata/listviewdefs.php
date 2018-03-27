<?php
$module_name = 'C_DetailViewEditableConfig';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'target_module' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TARGET_MODULE',
    'width' => '10%',
    'default' => true,
  ),
  'target_fields' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TARGET_FIELDS',
    'width' => '10%',
    'default' => true,
  ),
  'config_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CONFIG_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'is_active' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_IS_ACTIVE',
    'width' => '10%',
    'default' => true,
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
