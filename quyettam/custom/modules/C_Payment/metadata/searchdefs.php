<?php
$module_name = 'C_Payment';
$searchdefs[$module_name] = 
array (
    'layout' => 
    array (
        'basic_search' => 
        array (
            'name' => 
            array (
                'name' => 'name',
                'default' => true,
                'width' => '10%',
            ),  
        ),
        'advanced_search' => 
        array (
            0 => 'name',
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
