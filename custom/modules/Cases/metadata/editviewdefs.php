<?php
    $viewdefs['Cases'] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
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
                    'LBL_CASE_INFORMATION' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_PANEL_ASSIGNMENT' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => false,
            ),
            'panels' => 
            array (
                'lbl_case_information' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'name',
                            'displayParams' => 
                            array (
                                'size' => 75,
                            ),
                        ),
                    ),
                    1 => 
                    array (
                        0 =>array(
                            'name' =>  'account_name',
                            //'displayParams'=> array (
//                                'required' => false,
//                            )
                        ),
                        1 => 'priority',
                    ),
                    2 => 
                    array (
                        0 => 'status',
                        1 => 'type',
                    ),
                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'description',
                            'nl2br' => true,
                        ),
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'resolution',
                            'nl2br' => true,
                        ),
                    ),
                ),
                'LBL_PANEL_ASSIGNMENT' => 
                array (
                    0 => 
                    array (
                        0 => 'assigned_user_name',
                        1 => 
                        array (
                            'name' => 'team_name',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
