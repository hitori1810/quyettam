<?php
$viewdefs['Contacts'] = 
array (
    'EditView' => 
    array (
        'templateMeta' => 
        array (
            'form' => 
            array (
                'hidden' => 
                array (
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
            'javascript' => '                                                           
            ',
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
                    ),
                ),
                1 => 
                array (
                    0 => 'department',
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'phone_mobile',
                        'comment' => 'Mobile phone number of the contact',
                        'label' => 'LBL_MOBILE_PHONE',
                    ),       
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'description',
                        'label' => 'LBL_DESCRIPTION',
                    ),     
                ),
            ),
        ),
    ),
);
