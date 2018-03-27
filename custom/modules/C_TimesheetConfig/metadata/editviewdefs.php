<?php
    $module_name = 'C_TimesheetConfig';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'includes' => 
                array (                    
                    0 => 
                    array (
                        'file' => 'custom/include/javascripts/Select2/select2.min.js',
                    ), 
                    1 => 
                    array (
                        'file' => 'custom/include/javascripts/Select2/select2.css',
                    ),
                    2  => 
                    array (
                         'file' => 'custom/modules/C_TimesheetConfig/js/EditView.js',
                    ),     
                ),
                'maxColumns' => '2',
                'widths' => 
                array (
                    0 => 
                    array (
                        'label' => '22',
                        'field' => '22',
                    ),
                    1 => 
                    array (
                        'label' => '22',
                        'field' => '22',
                    ),
                ),
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'LBL_EDITVIEW_PANEL1' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_EDITVIEW_PANEL2' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
            ),
            'panels' => 
            array (
                'lbl_editview_panel1' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'daily_reminder',
                            'studio' => 'visible',
                            'label' => 'LBL_DAILY_REMINDER',
                        ),
                        1 => 
                        array (
                            'name' => 'weekly_reminder',
                            'studio' => 'visible',
                            'label' => 'LBL_WEEKLY_REMINDER',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'missing_reminder',
                            'studio' => 'visible',
                            'label' => 'LBL_MISSING_REMINDER',
                        ),
                        1 =>  '',
                    ),
                ),
                'lbl_editview_panel2' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'timework_template',
                            'studio' => 'visible',
                            'customCode' => '{$TIMEWORK_TABLE}',
                            'hideLabel' => true,
                        ),
                    ),
                ),
            ),
        ),
    );
