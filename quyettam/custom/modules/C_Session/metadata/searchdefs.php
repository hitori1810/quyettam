<?php
$module_name = 'C_Session';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
      2 => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
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
        'name' => 'parent_name',
      ),
      'customer_phone' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'customer_phone',
      ),
      'customer_email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'customer_email',
      ),
      'city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'city',
      ),
      'country' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_COUNTRY',
        'width' => '10%',
        'default' => true,
        'name' => 'country',
      ),
      'screen_resolution' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SREEN_RESOLUTION',
        'width' => '10%',
        'default' => true,
        'name' => 'screen_resolution',
      ),
      'browser' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_BROWSER',
        'width' => '10%',
        'default' => true,
        'name' => 'browser',
      ),
      'operating_system' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OPERATING_SYSTEM',
        'width' => '10%',
        'default' => true,
        'name' => 'operating_system',
      ),
      'session_starttime' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_SESSION_STARTTIME',
        'width' => '10%',
        'default' => true,
        'name' => 'session_starttime',
      ),
      'method' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_METHOD',
        'width' => '10%',
        'default' => true,
        'name' => 'method',
      ),
      'device' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_DEVICE',
        'width' => '10%',
        'default' => true,
        'name' => 'device',
      ),
      'page' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PAGE',
        'width' => '10%',
        'default' => true,
        'name' => 'page',
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
