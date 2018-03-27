<?php
    $module_name = 'C_Tour';
    $listViewDefs[$module_name] = 
    array (
        'code' => 
        array (
            'type' => 'varchar',
            'label' => 'LBL_CODE',
            'width' => '10%',
            'link' => true,
            'default' => true,
        ),
        'name' => 
        array (
            'width' => '22%',
            'label' => 'LBL_NAME',
            'default' => true,
            'link' => true,
        ),
        'option_tour' => 
        array (
            'type' => 'enum',
            'default' => true,
            'studio' => 'visible',
            'label' => 'LBL_OPTION_TOUR',
            'width' => '10%',
        ),
        'start_date' => 
        array (
            'type' => 'date',
            'label' => 'LBL_START_DATE',
            'width' => '10%',
            'default' => true,
        ),
        'end_date' => 
        array (
            'type' => 'date',
            'label' => 'LBL_END_DATE',
            'width' => '10%',
            'default' => true,
        ),
        'contact_name' => 
        array (
            'type' => 'varchar',
            'label' => 'LBL_CONTACT_NAME',
            'width' => '10%',
            'default' => true,
        ),
        'contact_phone' => 
        array (
            'type' => 'phone',
            'label' => 'LBL_CONTACT_PHONE',
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
            'default' => true,
        ),
    );
