<?php
    $module_name = 'C_BookingHotel';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                    'enctype' => 'multipart/form-data',
                    'hidden' => 
                    array (
                        1 => '<link rel="stylesheet" href="{sugar_getjspath file="custom/include/javascripts/CKEditor/editor.css"}"/>',
                        2 => '<input type="hidden" id="account_phone" name="account_phone"></input>',
                        3 => '<input type="hidden" id="account_address" name="account_address"></input>',
                        4 => '<input type="hidden" id="details" name="details"></input>',
                        5 => '<input type="hidden" id="policy" name="policy"></input>',
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
                {sugar_getscript file="custom/modules/C_BookingHotel/js/editview.js"}
                {sugar_getscript file="custom/include/javascripts/CKEditor/ckeditor.js"}',
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'DEFAULT' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => false,
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
                            'required' => false,
                            'customCode' => '{$NEWCODE}',
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
                        0 => 
                        array (
                            'name' => 'hotel_booking_code',
                            'label' => 'LBL_HOTEL_BOOKING_CODE',
                        ),
                        1 => 
                        array ( 
                            'name' => 'deadline',
                            'label' => 'LBL_DEADLINE',
                        ),
                    ),

                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'parent_name',
                            'label' => 'LBL_PARENT_NAME',
                            'studio' => 'visible',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => 
                        array (
                            'hideLabel' => true,
                            'customCode' => '{include file="custom/modules/C_BookingHotel/tpl/customer_info.tpl"}',
                        ),
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
                        ),
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'room_list',
                            'hideLabel' => true,
                            'customCode' => '{include file="custom/modules/C_BookingHotel/tpl/room_detail.tpl"}',
                        ),
                    ),
                    10 => 
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
                    11 => 
                    array (
                        0 => 
                        array (
                            'name' => 'total_amount',
                            'label' => 'LBL_TOTAL_AMOUNT',
                            'customCode' => '<input type="text" name="total_amount" id="total_amount" size="30" maxlength="26" value="{sugar_number_format var=$fields.total_amount.value}" title="{$MOD.LBL_TOTAL_AMOUNT}" tabindex="0" class="currency" style="text-align: right;">'
                        ),
                        1 => 
                        array (
                            'name' => 'payment_method',
                        ),
                    ),
                    12 => 
                    array (
                        0 => 
                        array (
                            'hideLabel' => true,
                            'customCode' => '{include file="custom/modules/C_BookingHotel/tpl/payment_info.tpl"}',
                        ),
                        
                        
                    ),
                    13 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_hotel_c_bookinghotel_1_name',
                            'label' => 'LBL_HOTEL',
                            'studio' => 'visible',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => 
                        array (
                            'name' => 'breakfast',
                            'studio' => 'visible',
                            'label' => 'LBL_BREAKFAST',
                        ),
                    ),
                    14 => 
                    array (
                        0 => array (
                            'name' => 'hotel_code',
                            'customCode' => '<input type="hidden" name="hotel_code" id="hotel_code" value="{$fields.hotel_code.value}" ><label style="color:red;font-weight:bold" name="hotel_code_lbl" id="hotel_code_lbl"></label>'
                        ),
                        1 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    15 => 
                    array (
                        0 => 
                        array (
                            'name' => 'hotel_details',
                            'customCode' => '<textarea class="ckeditor" cols="20" id="hotel_details" name="hotel_details" rows="20">{$fields.hotel_details.value}</textarea>',
                        ),
                    ),
                    16=> 
                    array (
                        0 => 
                        array (
                            'name' => 'hotel_policy',
                            'customCode' => '<textarea class="ckeditor" cols="20" id="hotel_policy" name="hotel_policy" rows="20">{$fields.hotel_policy.value}</textarea>',
                        ),
                    ),
                    17 => 
                    array (
                        0 => 
                        array (
                            'name' => 'remark',
                            'studio' => 'visible',
                            'label' => 'LBL_REMARK',
                        ),
                    ),
                    18=> 
                    array (
                        0 => 
                        array (
                            'name' => 'opportunities_c_bookinghotel_1_name',
                            'label' => 'LBL_OPPORTUNITY'
                        ),
                    ),
                    19=> 
                    array (
                        0 => 
                        array (
                            'name' => 'user_sale',
                        ),
                        1 => 'uploadfile',
                    ),
                    20 => 
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
