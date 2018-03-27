<?php
$module_name = 'C_Session';
$viewdefs[$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'parent_name',
            'studio' => true,
            'label' => 'LBL_PARENT_NAME',
          ),
          1 => 
          array (
            'name' => 'parent_type',
            'studio' => 'true',
            'label' => 'LBL_PARENT_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'customer_phone',
            'label' => 'LBL_PHONE',
          ),
          1 => 
          array (
            'name' => 'customer_email',
            'label' => 'LBL_EMAIL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'operating_system',
            'label' => 'LBL_OPERATING_SYSTEM',
          ),
          1 => 
          array (
            'name' => 'screen_resolution',
            'label' => 'LBL_SREEN_RESOLUTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'browser',
            'label' => 'LBL_BROWSER',
          ),
          1 => 
          array (
            'name' => 'session_starttime',
            'label' => 'LBL_SESSION_STARTTIME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'method',
            'label' => 'LBL_METHOD',
          ),
          1 => 
          array (
            'name' => 'device',
            'label' => 'LBL_DEVICE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'city',
            'label' => 'LBL_CITY',
          ),
          1 => 
          array (
            'name' => 'country',
            'label' => 'LBL_COUNTRY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'page',
            'label' => 'LBL_PAGE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'lead_name',
            'label' => 'LBL_LEAD_NAME',
          ),
          1 => 
          array (
            'name' => 'contact_name',
            'label' => 'LBL_CONTACT_NAME',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
