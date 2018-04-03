<?php
    $module_name = 'C_BookingTour';
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
                        4 => '<input type="hidden" name="discount_amount" id="discount_amount" value="{sugar_number_format var=$fields.discount_amount.value}"  >',
                        5 => '<input type="hidden" name="sub_total" id="sub_total" value="{$fields.sub_total.value}"   >',
                        6 => '<input type="hidden" name="penalty_amount" id="penalty_amount" value="{sugar_number_format var=$fields.penalty_amount.value}"  >',
                        7 => '<input type="hidden" name="policy" id="policy" value="{$fields.tour_policy.value}"  >',
                        8 => '<input type="hidden" name="details" id="details" value="{$fields.tour_details.value}"  >',
                    ),
                ),
                'maxColumns' => 2,
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
                {sugar_getscript file="custom/modules/C_BookingTour/js/editview.js"}',
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
                'includes' => 
                array (
                    0 => 
                    array (
                        'file' => 'custom/include/javascripts/CKEditor/ckeditor.js',
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
                            'studio' => 'visible',
                            'label' => 'LBL_PARENT_NAME',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => 
                        array (
                            'hideLabel' => true,
                            'customCode' => '{include file="custom/modules/C_BookingTour/tpl/customer_info.tpl"}',
                        ),
                    ),

                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_tour_c_bookingtour_1_name',
                            'label' => 'LBL_TOUR_NAME',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => 
                        array (
                            'name' => 'deadline',
                            'label' => 'LBL_DEADLINE',
                        ),
                    ),
                    4 =>
                    array (
                        0 => array(
                            'name' => 'tour_code',
                            'customCode' => '<input type="hidden" name="tour_code" id="tour_code" value="{$fields.tour_code.value}" ><label name="tour_code_lbl" id="tour_code_lbl" style="color:red;font-weight:bold"></label>'
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
                            'hideLabel' => true,
                            'customCode' => '<table width="100%">
                            <tbody>
                            <tr colspan = "6">
                            <td width = "12%"><label>{$MOD.LBL_PRICE_ADULT}: </label></td>
                            <td width = "20%"><input type="text" class="currency" name="price_adult" id="price_adult" size="30" maxlength="26" value="{sugar_number_format var=$fields.price_adult.value}" title="{$MOD.LBL_PRICE_ADULT}" tabindex="0" ></td>
                            <td width = "12%"><label style="padding: 25%;">{$MOD.LBL_PRICE_CHD}: </label></td>
                            <td width = "20%"><input type="text" class="currency" name="price_chd" id="price_chd" size="30" maxlength="26" value="{sugar_number_format var=$fields.price_chd.value}" title="{$MOD.LBL_PRICE_CHD}" tabindex="0" ></td>
                            <td width = "12%"><label style="padding: 25%;">{$MOD.LBL_PRICE_INFANT}: </label></td>
                            <td width = "25%"><input type="text" class="currency" name="price_infant" id="price_infant" size="30" maxlength="26" value="{sugar_number_format var=$fields.price_infant.value}" title="{$MOD.LBL_PRICE_INFANT}" tabindex="0" ></td>
                            </tr>
                            </tbody>
                            </table>',
                        ),
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'adult',
                            'hideLabel' => true,
                            'customCode' => '<table width="100%">
                            <tbody>
                            <tr colspan = "6">
                            <td width = "12%"><label>{$MOD.LBL_ADULT}: </label></td>
                            <td width = "20%"><input type="text" name="adult" id="adult" size="5" maxlength="26" value="{sugar_number_format var=$fields.adult.value}" title="{$MOD.LBL_ADULT}" tabindex="0" ></td>
                            <td width = "12%"><label style="padding: 25%;">{$MOD.LBL_CHILDREN}: </label></td>
                            <td width = "20%"><input type="text" name="children" id="children" size="5" maxlength="26" value="{sugar_number_format var=$fields.children.value}" title="{$MOD.LBL_CHILDREN}" tabindex="0" ></td>
                            <td width = "12%"><label style="padding: 25%;">{$MOD.LBL_INFANT}: </label></td>
                            <td width = "25%"><input type="text" name="infant" id="infant" size="5" maxlength="26" value="{sugar_number_format var=$fields.infant.value}" title="{$MOD.LBL_INFANT}" tabindex="0" ></td>
                            </tr>
                            </tbody>
                            </table>',
                        ),
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'penalty_percent',
                            'label' => 'LBL_PENALTY_PERCENT',
                            'customCode' => '<input type="text" name="penalty_percent" id="penalty_percent" size="5" maxlength="26" value="{$fields.penalty_percent.value}" title="{$MOD.LBL_PENALTY_PERCENT}" tabindex="0" >',
                        ),
                        1 => '',
                    ),
                    10 => 
                    array (
                        0 => 
                        array (
                            'name' => 'discount_percent',
                            'label' => 'LBL_DISCOUNT_PERCENT',
                            'customCode' => '<input type="text" name="discount_percent" id="discount_percent" size="5" maxlength="26" value="{$fields.discount_percent.value}" title="{$MOD.LBL_DISCOUNT_PERCENT}" tabindex="0" >',
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
                        0 => 
                        array (
                            'hideLabel' => true,
                            'customCode' => '{include file="custom/modules/C_BookingTour/tpl/payment_info.tpl"}',
                        ),
                    ),
                    14 => 
                    array (
                        0 => 
                        array (
                            'name' => 'tour_details',
                            'label' => 'LBL_TOUR_DETAILS',
                            'customCode' => '<textarea class="ckeditor" cols="20" id="tour_details" name="tour_details" rows="30">{$fields.tour_details.value}</textarea>',
                        ),
                    ),
                    15 => 
                    array (
                        0 => 
                        array (
                            'name' => 'tour_policy',
                            'label' => 'LBL_TOUR_POLICY',
                            'customCode' => '<textarea class="ckeditor" cols="20" id="tour_policy" name="tour_policy" rows="30">{$fields.tour_policy.value}</textarea>',
                        ),
                    ),
                    16 => 
                    array (
                        0 => 'description',
                    ),
                    17 => 
                    array (
                        0 => 
                        array (
                            'name' => 'opportunities_c_bookingtour_1_name',
                            'label' => 'LBL_OPPORTUNITY',
                        ),

                    ),
                    18 => 
                    array (
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                            'label' => 'LBL_ASSIGNED_TO_NAME',
                        ),
                        1 => 'uploadfile',
                    ),
                    19 => 
                    array (
                        0 => 
                        array (
                            'name' => 'user_manager',
                            'label' => 'LBL_USER_MANAGER',
                        ),
                        1 => 'team_name',
                    ),
                ),
            ),
        ),
    );
