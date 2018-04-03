<?php
$module_name = 'C_Session';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'parent_name' => 
  array (
    'type' => 'parent',
    'studio' => true,
    'label' => 'LBL_PARENT_NAME',
    'link' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
    'width' => '10%',
    'default' => true,
  ),
  'parent_type' => 
  array (
    'type' => 'parent_type',
    'default' => true,
    'studio' => 'true',
    'label' => 'LBL_PARENT_TYPE',
    'width' => '10%',
  ),
  'customer_email' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => true,
  ),
  'customer_phone' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'country' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COUNTRY',
    'width' => '10%',
    'default' => true,
  ),
  'city' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY',
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
  'page' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PAGE',
    'width' => '10%',
    'default' => false,
  ),
  'screen_resolution' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SREEN_RESOLUTION',
    'width' => '10%',
    'default' => false,
  ),
  'browser' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BROWSER',
    'width' => '10%',
    'default' => false,
  ),
  'method' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_METHOD',
    'width' => '10%',
    'default' => false,
  ),
  'device' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEVICE',
    'width' => '10%',
    'default' => false,
  ),
  'session_starttime' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_SESSION_STARTTIME',
    'width' => '10%',
    'default' => false,
  ),
  'operating_system' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OPERATING_SYSTEM',
    'width' => '10%',
    'default' => false,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => false,
  ),
);
