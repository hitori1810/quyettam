<?php
$viewdefs['Contacts'] = 
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
                ),
            ),
            'maxColumns' => '2',
            'useTabs' => false,
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
            'includes' => 
            array (
                0 => 
                array (
                ),
            ),
            'tabDefs' => 
            array (
                'LBL_CONTACT_INFORMATION' => 
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),                             
        ),
        'panels' => 
        array (
            'lbl_contact_information' => 
            array (
                0 => 
                array (
                    0 => 
                    array (
                        'name' => 'first_name',
                        'comment' => 'First name of the contact',
                        'label' => 'LBL_NAME',
                    ),
                    1 => 
                    array (
                        'name' => 'code',      
                    ),
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'department',
                        'label' => 'LBL_DEPARTMENT',
                    ),
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'phone_mobile',
                        'label' => 'LBL_MOBILE_PHONE',
                    ),       
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'description',
                        'comment' => 'Full text of the note',
                        'label' => 'LBL_DESCRIPTION',
                    ),       
                ),
            ),
        ),
    ),
);
