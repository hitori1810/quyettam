<?php
    $module_name = 'C_BookingHotel';
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
//                {sugar_getscript file="custom/modules/C_BookingHotel/js/detailview.js"}', 
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
//                        'file' => 'custom/modules/C_BookingHotel/js/detailview.js',
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
                        1 => 
                        array (
                            'name' => 'name',
                        ), 
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'booking_name',
                        ),
                        1 => 
                        array (
                            'name' => 'booking_date',
                            'label' => 'LBL_BOOKING_DATE',
                        ), 
                    ),
                    2 => 
                    array (
                        0 => 'hotel_booking_code',
                        1 => '',  
                    ),
                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'parent_name',
                            'studio' => 'visible',
                            'label' => 'LBL_PARENT_NAME',
                        ),
                        1 => 'email', 
                    ),
                    4 => 
                    array (
                        0 => 'address',
                        1 => 'phone', 
                    ),
                    5 => 
                    array (

                        0 => 
                        array (
                            'name' => 'deadline',
                            'label' => 'LBL_DEADLINE',
                        ),
                        1 => '', 
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'check_in_date',
                            'label' => 'LBL_CHECK_IN_DATE',
                        ),
                        1 => 
                        array (
                            'name' => 'invoice_no',
                            'label' => 'LBL_INVOICE_NO',
                        ),   
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'check_out_date',
                            'label' => 'LBL_CHECK_OUT_DATE',
                        ),
                        1 => 
                        array (
                            'name' => 'invoice_serial_no',
                            'label' => 'LBL_INVOICE_SERIAL_NO',
                        ),   
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'room',
                            'studio' => 'visible',
                            'label' => 'LBL_ROOMS',
                        ),
                        1 => '',
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'prepay_amount',
                            'label' => 'LBL_PREPAY_AMOUNT',
                        ),
                        1 => 
                        array (
                            'name' => 'invoice_date',
                            'label' => 'LBL_INVOICE_DATE',
                        ),   
                    ),
                    10 => 
                    array (
                        0 => 
                        array (
                            'name' => 'total_amount',
                            'label' => 'LBL_TOTAL_AMOUNT',
                        ),
                        1 => 
                        array (
                            'name' => 'payment_method',
                        ),  
                    ),
                    11 => 
                    array (
                        0 => 'payment_date_1', 
                        1 => 'payment_date_2',
                    ),
                    12 => 
                    array (
                        0 => 'payment_amount_1',
                        1 => 'payment_amount_2',
                    ),
                    13 => 
                    array (
                        0 => 'payment_method_1',
                        1 => 'payment_method_2'
                    ),

                    14 => 
                    array (
                        0 => 
                        array (
                            'name' => 'full_payment_date',
                        ),
                        1 => 'full_payment_method',
                    ),
                    15 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_hotel_c_bookinghotel_1_name',
                        ),
                        1 => 
                        array (
                            'name' => 'breakfast',
                            'studio' => 'visible',
                            'label' => 'LBL_BREAKFAST',
                        ),   
                    ),
                    16 => 
                    array (
                        0 => array (
                            'name' => 'hotel_code',
                        ),
                        1 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    17 => 
                    array (
                        0 => 
                        array (
                            'name' => 'hotel_details',
                            'studio' => 'visible',
                            'customCode' => '<iframe srcdoc="{$fields.hotel_details.value}" frameBorder="0"  style = "width:100%; height:500px;"></iframe>',
                            'label' => 'LBL_HOTEL_DETAILS',
                        ),     
                    ),
                    18 => 
                    array (
                        0 => 
                        array (
                            'name' => 'hotel_policy',
                            'studio' => 'visible',
                            'customCode' => '<iframe srcdoc="{$fields.hotel_policy.value}"  frameBorder="0" style = "width:100%; height:500px;"></iframe>',
                            'label' => 'LBL_HOTEL_POLICY',
                        ),  
                    ),
                    19 => 
                    array (
                        0 => 
                        array (
                            'name' => 'remark',
                            'studio' => 'visible',
                            'label' => 'LBL_REMARK',
                        ), 
                    ),
                    20 => 
                    array (
                        0 => 
                        array (
                            'name' => 'opportunities_c_bookinghotel_1_name',
                            'label' => 'LBL_OPPORTUNITY',
                        ),  
                    ),
                    21 => 
                    array (
                        0 => 
                        array (
                            'name' => 'user_sale',
                            'label' => 'LBL_USER_SALE',
                        ),
                        1 => 'uploadfile',  
                    ),
                    22 => 
                    array (
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                            'label' => 'LBL_ASSIGNED_TO',
                        ),
                        1 => 
                        array (
                            'name' => 'date_modified',
                            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                            'label' => 'LBL_DATE_MODIFIED',
                        ),   
                    ),
                    23 => 
                    array (
                        0 => 
                        array (
                            'name' => 'team_name',
                            'displayParams' => 
                            array (
                                'display' => true,
                            ),
                        ),
                        1 => 
                        array (
                            'name' => 'date_entered',
                            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                            'label' => 'LBL_DATE_ENTERED',
                        ), 
                    ),
                ),
            ),
        ),
    );
