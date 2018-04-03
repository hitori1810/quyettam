<?php
$module_name = 'C_WorkLog';
$listViewDefs[$module_name] = 
array (
  'project_c_worklog_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_PROJECT_C_WORKLOG_1_FROM_PROJECT_TITLE',
    'id' => 'PROJECT_C_WORKLOG_1PROJECT_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'projecttask_c_worklog_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_PROJECTTASK_C_WORKLOG_1_FROM_PROJECTTASK_TITLE',
    'id' => 'PROJECTTASK_C_WORKLOG_1PROJECTTASK_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'apply_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_APPLY_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'spent_time' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_SPENT_TIME',
    'width' => '10%',
  ),
  'overtime' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_OVERTIME',
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
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'name' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => false,
  ),
);
