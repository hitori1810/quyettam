<?php
    $module_name = 'C_BookingTicket';
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
                        3 => 
                        array (
                            'customCode' => '{$BUTTON_REFUND}',
                        ),
                        4 => 
                        array (
                            'customCode' => '{$BUTTONEXPORT}',
                        ),
                    ),
                    'hidden' => 
                    array (
                        1 => '<link rel="stylesheet" type="text/css" href="custom/modules/C_BookingTicket/tpl/css/table_nd.css">',
                        2 => '<input type="hidden" name="ticket_count" id="ticket_count" value="{$ticket_count}">',
                        3 => '<input type="hidden" name="duplicateType" id="duplicate_type" value="">',
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
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'DEFAULT' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_EDITVIEW_PANEL1' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_OTHER' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => true,
                'includes' => 
                array (
                    0 => 
                    array (
                        'file' => 'custom/modules/C_BookingTicket/js/detailview.js',
                    ),
                ),
            ),
            'panels' => 
            array (
                'default' => 
                array (
                    0 => 
                    array (
                        0 => 'status',
                        1 => 'name',
                        2 => 'booking_date',
                    ),
                    1 =>  
                    array (
                        0 => 'payment_status',
                        1 => 
                        array (
                            'name' =>'gs_code',
                            'customLabel' => '{$GS_CODE_LABEL}',
                            'customCode' => '{$fields.gs_code.value}'
                        ),
                        2 =>
                        array (
                            'name' => 'refund_date',
                        ) 
                    ), 
                    2 => 
                    array (
                        0 => 'serial_no',
                        1 => 'invoice_no',
                        2 => 'invoice_date',

                    ),
                    3 => 
                    array (
                        0 => 'internal_doc_id',
                        1 => 'invoice_content',
                        2 => 'total_amount_invoice',
                    ),
                    4 => 
                    array (
                        0 => 'parent_name',
                        1 => 'company',
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    5 => 
                    array (
                        0 => array (
                            'name' => 'contacts_c_bookingticket_2_name',
                        ),
                        1 => array (
                            'hideLabel' => true,
                        ),
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'address',
                            'label' => 'LBL_ADDRESS',
                        ),
                        1 => 'taxcode',
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'opportunities_c_bookingticket_1_name',
                            'label' => 'LBL_OPPORTUNITY',
                        ),
                        1 => 
                        array (
                            'name' => 'booking_type',
                            'studio' => 'visible',
                            'label' => 'LBL_BOOKING_TYPE',
                        ),
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                        ),
                        1 => 
                        array (
                            'name' => 'io_code',
                        ),
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'user_sale',
                        ),
                        1 => array (        
                            'name' => 'tcc_code',
                        ),
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    10 => 
                    array (
                        0 => 'description',
                        1 => array (
                            'name' => 'inspected_payment_date',
                        ),
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                    11 => 
                    array (
                        0 => 'payment_date_1',
                        1 => 'payment_amount_1',
                        2 => 'payment_method_1'
                    ),
                    12 => 
                    array (
                        0 => 'payment_date_2',
                        1 => 'payment_amount_2',
                        2 => 'payment_method_2'
                    ),
                    13 => 
                    array (
                        0 => 
                        array (
                            'name' => 'full_payment_date',
                        ),
                        1 => 'full_payment_method',
                        2 => array (
                            'hideLabel' => true,
                        ),
                    ),
                ),
                'lbl_editview_panel1' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'ticket_info',
                            'customCode' => '{$table_tickets}',
                            'hideLabel' => true,
                        ),
                    ),
                ),
                'lbl_other' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                            'label' => 'LBL_ASSIGNED_TO',
                        ),
                        1 => 
                        array (
                            'name' => 'date_modified',
                            'label' => 'LBL_DATE_MODIFIED',
                            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        ),
                    ),
                    1 => 
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
