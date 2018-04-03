<?php
$module_name = 'C_WorkLog';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'apply_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_APPLY_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'apply_date',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'favorites_only' => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'apply_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_APPLY_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'apply_date',
      ),
      'spent_time' => 
      array (
        'type' => 'decimal',
        'default' => true,
        'label' => 'LBL_SPENT_TIME',
        'width' => '10%',
        'name' => 'spent_time',
      ),
      'overtime' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OVERTIME',
        'width' => '10%',
        'name' => 'overtime',
      ),
      'project_c_worklog_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_PROJECT_C_WORKLOG_1_FROM_PROJECT_TITLE',
        'id' => 'PROJECT_C_WORKLOG_1PROJECT_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'project_c_worklog_1_name',
      ),
      'projecttask_c_worklog_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_PROJECTTASK_C_WORKLOG_1_FROM_PROJECTTASK_TITLE',
        'id' => 'PROJECTTASK_C_WORKLOG_1PROJECTTASK_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'projecttask_c_worklog_1_name',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
