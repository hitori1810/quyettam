<?php
$module_name = 'C_Hotel';
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
                'hidden' => 
                array (
                    1 => '<link rel="stylesheet" href="{sugar_getjspath file="custom/include/javascripts/Starrr/starrr.min.css"}"/>',
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
            'javascript' => '
            {sugar_getscript file="custom/modules/C_Hotel/js/detailview.js"}',
            'useTabs' => false,
            'tabDefs' => 
            array (
                'DEFAULT' => 
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => true,
        ),
        'panels' => 
        array (
            'default' => 
            array (
                0 => 
                array (
                    0 => 'name',
                    1 => 'code',
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'star',
                        'label' => 'LBL_STAR',
                        'customCode' => '{$STAR}',
                    ),
                    1 => 
                    array (
                        'name' => 'producttemplates_c_hotel_1_name',
                        'label' => 'LBL_PRODUCTTEMPLATES_C_HOTEL_1_FROM_PRODUCTTEMPLATES_TITLE',
                    ),
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'address_street',
                        'label' => 'LBL_ADDRESS_STREET',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'hotel_details',
                        'studio' => 'visible',
                        'label' => 'LBL_HOTEL_DETAILS',
                        'customCode' => '<iframe id="hotel_details_frame" srcdoc="{$fields.hotel_details.value}"  frameBorder="0"  style="width:100%; height:500px"></iframe>
                        ',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'hotel_policy',
                        'studio' => 'visible',
                        'label' => 'LBL_HOTEL_POLICY',
                        'customCode' => '<iframe id="hotel_policy_frame" srcdoc="{$fields.hotel_policy.value}"  frameBorder="0"  style="width:100%; height:500px"></iframe>
                        ',
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'contacts_c_hotel_1_name',
                    ),
                    1 => 'uploadfile',
                ),
                6 => 
                array (
                    0 => 
                    array (
                        'label' => 'LBL_CONTACT_MOBILE',
                        'customCode' => '{$CONTACT_MOBILE}',
                    ),
                    1 => 
                    array (
                        'name' => 'date_entered',
                        'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                        'label' => 'LBL_DATE_ENTERED',
                    ),
                ),
                7 => 
                array (
                    0 => 
                    array (
                        'label' => 'LBL_CONTACT_EMAIL',
                        'customCode' => '{$CONTACT_EMAIL}',
                    ),
                    1 => 
                    array (
                        'name' => 'date_modified',
                        'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        'label' => 'LBL_DATE_MODIFIED',
                    ),
                ),
                8 => 
                array (
                    0 => 
                    array (
                        'name' => 'assigned_user_name',
                        'label' => 'LBL_ASSIGNED_TO',
                    ),
                    1 => 
                    array (
                        'name' => 'team_name',
                        'displayParams' => 
                        array (
                            'display' => true,
                        ),
                    ),

                ),
                9 => 
                array (


                ),
            ),
        ),
    ),
);
