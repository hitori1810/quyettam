<?php
    $module_name = 'C_BookingTour';
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
//                {sugar_getscript file="custom/modules/C_BookingTour/js/detailview.js"}',
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
//                        'file' => 'custom/modules/C_BookingTour/js/detailview.js',
//                    ),
//                ),
            ),
            'panels' => 
            array (
                'default' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'status',
                            'studio' => 'visible',
                            'label' => 'LBL_STATUS',
                        ),
                        1 => 'name',
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'booking_name',
                            'label' => 'LBL_BOOKING_NAME',
                        ),
                        1 => 
                        array (
                            'name' => 'booking_date',
                            'label' => 'LBL_BOOKING_DATE',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                            'name' => 'parent_name',
                        ),
                        1 => 'email',
                    ),
                    3 => 
                    array (
                        0 => 'address',
                        1 => 'phone',
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_tour_c_bookingtour_1_name',
                            'label' => 'LBL_TOUR_NAME',
                        ),
                        1 => 
                        array (
                            'name' => 'deadline',
                            'label' => 'LBL_DEADLINE',
                        ),
                    ),
                    
                    5 => 
                    array (
                        0 => 
                        array (
                            'name' => 'tour_code',
                        ),
                        1 => 
                        array (
                            'hideLabel' => true,
                        ),
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'start_date',
                            'label' => 'LBL_START_DATE',
                        ),
                        1 => 
                        array (
                            'name' => 'end_date',
                            'label' => 'LBL_END_DATE',
                        ),
                    ),
                    
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'price_adult',
                            'customCode' => '
                            <span style="display: inline-block;width:25%" name="price_adult" id="price_adult">{$price_adult}</span>
                            <label style="background-color: #eee;color: #888;padding: 7px;">{$MOD.LBL_PRICE_CHD}: </label>
                            <span style="padding-left: 0.5%;display: inline-block;width:25%" name="price_chd" id="price_chd">{$price_chd}</span>
                            <label style="background-color: #eee;color: #888;padding: 7px;">{$MOD.LBL_PRICE_INFANT}: </label>
                            <span style="padding-left: 0.5%;display: inline-block;width:25%" name="price_infant" id="price_infant">{$price_infant}</span>
                            ',
                        ),
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'adult',
                            'customCode' => '
                            <span style="display: inline-block;width:25%" name="adult" id="adult">{$fields.adult.value}</span>
                            <label style="background-color: #eee;color: #888;padding: 7px;padding-left: 2%;">{$MOD.LBL_CHILDREN}: </label>
                            <span style="padding-left: 0.5%;display: inline-block;width:25%" name="children" id="children">{$fields.children.value}</span>
                            <label style="background-color: #eee;color: #888;padding: 7px;padding-left: 3.5%;">{$MOD.LBL_INFANT}: </label>
                            <span style="padding-left: 0.5%;display: inline-block;width:25%" name="infant" id="infant">{$fields.infant.value}</span>
                            ',
                        ),
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'penalty_percent',
                            'label' => 'LBL_PENALTY_PERCENT',
                        ),
                        1 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    10 => 
                    array (
                        0 => 
                        array (
                            'name' => 'discount_percent',
                            'label' => 'LBL_DISCOUNT_PERCENT',
                        ),
                        1 => 
                        array (
                            'name' => 'invoice_no',
                            'label' => 'LBL_INVOICE_NO',
                        ),
                    ),
                    11 => 
                    array (
                        0 => 
                        array (
                            'name' => 'prepay_amount',
                            'label' => 'LBL_PREPAY_AMOUNT',
                        ),
                        1 => 
                        array (
                            'name' => 'invoice_serial_no',
                            'label' => 'LBL_INVOICE_SERIAL_NO',
                        ),
                    ),
                    12 => 
                    array (
                        0 => 
                        array (
                            'name' => 'total_amount',
                            'label' => 'LBL_TOTAL_AMOUNT',
                        ),
                        1 => 
                        array (
                            'name' => 'invoice_date',
                            'label' => 'LBL_INVOICE_DATE',
                        ),
                    ),
                    13 => 
                    array (
                        0 => 'payment_date_1', 
                        1 => 'payment_date_2',
                    ),
                    14 => 
                    array (
                        0 => 'payment_amount_1',
                        1 => 'payment_amount_2',
                    ),
                    15 => 
                    array (
                        0 => 'payment_method_1',
                        1 => 'payment_method_2'
                    ),

                    16 => 
                    array (
                        0 => 
                        array (
                            'name' => 'full_payment_date',
                        ),
                        1 => 'full_payment_method',
                    ),
                    17 => 
                    array (
                        0 => 
                        array (
                            'name' => 'tour_details',
                            'studio' => 'visible',
                            'label' => 'LBL_TOUR_DETAILS',
                            'customCode' => '<iframe  srcdoc="{$fields.tour_details.value}"  frameBorder="0" style="width:100%; height:500px"></iframe>',
                        ),
                    ),
                    18 => 
                    array (
                        0 => 
                        array (
                            'name' => 'tour_policy',
                            'studio' => 'visible',
                            'label' => 'LBL_TOUR_POLICY',
                            'customCode' => '<iframe  srcdoc="{$fields.tour_policy.value}"  frameBorder="0" style="width:100%; height:500px"></iframe>',
                        ),
                    ),
                    19 => 
                    array (
                        0 => 'description',
                    ),
                    20 => 
                    array (
                        0 => 
                        array (
                            'name' => 'opportunities_c_bookingtour_1_name',
                            'label' => 'LBL_OPPORTUNITY',
                        ),

                    ),
                    21 => 
                    array (
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                        ),
                        1 => 'uploadfile',
                    ),
                    22 => 
                    array (
                        0 => 'user_manager',
                        1 => 
                        array (
                            'name' => 'date_modified',
                            'label' => 'LBL_DATE_MODIFIED',
                            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        ),
                    ),
                    23 => 
                    array (
                        0 => 'team_name',
                        1 => 
                        array (
                            'name' => 'date_entered',
                            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                        ),
                    ),
                ),
            ),
        ),
    );
