<?php
$module_name = 'J_Payment';
$viewdefs[$module_name] = 
array (
    'EditView' => 
    array (
        'templateMeta' => 
        array (
            'maxColumns' => '2',
            'javascript' => '{sugar_getscript file="custom/modules/J_Payment/js/EditView.js"}
            {sugar_getscript file="custom/include/javascripts/DynamicTable/DynamicTable.js"}                                                                              
            <link rel="stylesheet" type="text/css" href="{sugar_getjspath file="custom/include/javascripts/DynamicTable/DynamicTable.css"}" >
            <link rel="stylesheet" type="text/css" href="{sugar_getjspath file="custom/modules/J_Payment/css/EditView.css"}" >',
            'useTabs' => false,
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
        ),
        'panels' => 
        array (
            'default' => 
            array (
                0 => 
                array (
                    0 => 'customer',                
                ),  
                1 => 
                array (
                    0 => array(
                        'name' => 'payment_detail',
                        'customCode' => '{include file="custom/modules/J_Payment/tpls/PaymentDetail.tpl"}',
                    ),   
                ),
                2 => 
                array (
                    0 => array ( 
                        'name' => 'payment_date'    
                    ),
                    1 => array ( 
                        'name' => 'payment_amount', 
                        'customCode' => '
                            <label id="lbl_payment_amount" name="lbl_payment_amount">{$fields.payment_amount.value}</label>
                            <input type="hidden" id="payment_amount" name="payment_amount" value="{$fields.payment_amount.value}"/>
                        '   
                    ),
                ),
                3 => 
                array (
                    0 => 'description',
                ),
            ),
        ),
    ),
);
