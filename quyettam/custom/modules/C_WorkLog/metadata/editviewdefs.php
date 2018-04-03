<?php
    $module_name = 'C_WorkLog';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                    'buttons' => 
                    array (
                        0 => 
                        array (
                            'customCode' => '',
                        ),
                        1 => 
                        array (
                            'customCode' => '',
                        ),
                    ),
                ),
                'includes' => 
                array (
                    0 => 
                    array (
                        'file' => 'custom/include/javascripts/jquery-ui-1.8.19.custom.min.js',
                    ),
                    1 => 
                    array (
                        'file' => 'custom/modules/C_WorkLog/js/jquery-ui.multidatespicker.js',
                    ),
                    2 => 
                    array (
                        'file' => 'custom/include/javascripts/Select2/select2.min.js',
                    ),
                    3 => 
                    array (
                        'file' => 'custom/modules/C_WorkLog/js/EditView.js',
                    ),     
                ),
                'maxColumns' => '1',
                'widths' => 
                array (
                    0 => 
                    array (
                        'label' => '0',
                        'field' => '100',
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
                            'name' => 'html_template',
                            'studio' => 'visible',
                            'customCode' => '{$SCRIPT}{$CSS}{$HTML}',
                            'label' => 'HTML_TEMPLATE',
                            'hideLabel' => true,
                        ),
                    ),
                ),
            ),
        ),
    );
