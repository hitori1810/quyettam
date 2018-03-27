<?php
$module_name = 'C_Tour';
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
            //'javascript' => '
            //                {sugar_getscript file="custom/modules/C_Tour/js/detailview.js"}',
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
            //'includes' => 
            //                array (
            //                    0 => 
            //                    array (
            //                        'file' => 'custom/modules/C_Tour/js/detailview.js',
            //                    ),
            //                ),
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
                1 => 'producttemplates_c_tour_1_name',
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'option_tour',
                        'studio' => 'visible',
                        'label' => 'LBL_OPTION_TOUR',
                    ),
                    1 => 
                    array (
                        'name' => 'days',
                        'label' => 'LBL_DAYS',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'price_adult',
                        'label' => 'LBL_PRICE_ADULT',
                        'customCode' => '<span>{sugar_number_format var=$fields.price_adult.value} / Person</span>',
                    ),
                    1 => 
                    array (
                        'name' => 'night',
                        'label' => 'LBL_NIGHT',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'price_chd',
                        'label' => 'LBL_PRICE_CHD',
                        'customCode' => '<span>{sugar_number_format var=$fields.price_chd.value} / Child</span>',
                    ),
                    1 => 
                    array (
                        'name' => 'start_date',
                        'label' => 'LBL_START_DATE',
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'price_infant',
                        'label' => 'LBL_PRICE_INFANT',
                        'customCode' => '<span>{sugar_number_format var=$fields.price_infant.value} / Infant</span>',
                    ),
                    1 => 
                    array (
                        'name' => 'end_date',
                        'label' => 'LBL_END_DATE',
                    ),
                ),
                6 => 
                array (
                    0 => 
                    array (
                        'name' => 'tour_details',
                        'studio' => 'visible',
                        'label' => 'LBL_TOUR_DETAILS',
                        'customCode' => '<iframe id="tour_details" srcdoc="{$fields.tour_details.value}"  frameBorder="0"  style="width:100%; height:500px"></iframe>',
                    ),
                ),
                7 => 
                array (
                    0 => 
                    array (
                        'name' => 'tour_policy',
                        'studio' => 'visible',
                        'label' => 'LBL_TOUR_POLICY',
                        'customCode' => '<iframe id="tour_policy" srcdoc="{$fields.tour_policy.value}"  frameBorder="0"  style="width:100%; height:500px"></iframe>',
                    ),
                ),
                8 => 
                array (
                    0 => 
                    array (
                        'name' => 'contacts_c_tour_1_name',
                    ),
                    1 => 'uploadfile',
                ),
                9 => 
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
                10 => 
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
                11 => 
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
            ),
        ),
    ),
);
