<?php
    $viewdefs['Opportunities'] = 
    array (
        'QuickCreate' => 
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
                'javascript' => '{$PROBABILITY_SCRIPT}
                {sugar_getscript file="custom/modules/Opportunities/Javascript/EditView.js"}',
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
                'DEFAULT' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'name',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => 
                        array (
                            'name' => 'producttemplates_opportunities_1_name',
                            'label' => 'LBL_PRODUCTTEMPLATES_OPPORTUNITIES_1_FROM_PRODUCTTEMPLATES_TITLE',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'parent_name',
                            'studio' => 'visible',
                            'label' => 'LBL_PARENT_NAME',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => 'amount',
                    ),
                    2 => 
                    array (
                        0 => 'date_closed',
                        1 => 
                        array (
                            'name' => 'won_amount',
                            'customLabel' => '{$MOD.LBL_WON_AMOUNT}:<span class="required">*</span>',
                        ),
                    ),
                    3 => 
                    array (
                        0 => 'sales_stage',
                        1 => 
                        array (
                            'name' => 'currency_id',
                        ),
                    ),
                    4 => 
                    array (
                        0 => 'probability',
                        1 => 'lead_source',
                    ),
                    5 => 
                    array (
                        0 => 'next_step',
                        1 => 
                        array (
                            'name' => 'campaign_name',
                            'label' => 'LBL_CAMPAIGN',
                        ),
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'description',
                            'comment' => 'Full text of the note',
                            'label' => 'LBL_DESCRIPTION',
                        ),
                        1 => 
                        array (
                            'name' => 'opportunity_type',
                        ),
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                        ),
                        1 => 
                        array (
                            'name' => 'team_name',
                        ),
                    ),
                ),
            ),
        ),
    );
