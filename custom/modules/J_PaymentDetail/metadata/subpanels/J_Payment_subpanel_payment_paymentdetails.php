<?php
// created: 2015-11-09 16:00:25
$subpanel_layout['list_fields'] = array (
    'payment_no' =>
    array (
        'vname' => 'LBL_PAYMENT_NO',
        'widget_class' => 'SubPanelDetailViewLink',
        'width' => '5%',
        'default' => true,
        'link' => true,
    ),
    'payment_method' =>
    array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'vname' => 'LBL_PAYMENT_METHOD',
        'width' => '6%',
        'link' => true,
    ),
//    'type' =>
//    array (
//        'type' => 'type',
//        'default' => true,
//        'studio' => 'visible',
//        'vname' => 'LBL_TYPE',
//        'width' => '6%',
//        'link' => true,
//    ),
    'before_discount' =>
    array (
        'type' => 'currency',
        'vname' => 'LBL_BEFORE_DISCOUNT',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
    ),
    'discount_amount' =>
    array (
        'type' => 'currency',
        'vname' => 'LBL_DISCOUNT_AMOUNT',
        'currency_format' => true,
        'width' => '7%',
        'default' => true,
    ),
    'sponsor_amount' =>
    array (
        'type' => 'currency',
        'vname' => 'LBL_SPONSOR_AMOUNT',
        'currency_format' => true,
        'width' => '7%',
        'default' => true,
    ),
    //    'loyalty_amount' =>
    //    array (
    //        'type' => 'currency',
    //        'vname' => 'LBL_LOYALTY_AMOUNT',
    //        'currency_format' => true,
    //        'width' => '7%',
    //        'default' => true,
    //    ),
    'payment_amount' =>
    array (
        'type' => 'currency',
        'default' => true,
        'vname' => 'LBL_PAYMENT_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
    ),
    'invoice_name' =>
    array (
        'type' => 'relate',
        'link' => true,
        'vname' => 'LBL_INVOICE_NUMBER',
        'id' => 'INVOICE_ID',
        'width' => '8%',
        'default' => true,
        'widget_class' => 'SubPanelDetailViewLink',
        'target_module' => 'J_Invoice',
        'target_record_key' => 'invoice_id',
    ),
    'payment_date' =>
    array (
        'type' => 'date',
        'default' => true,
        'studio' => 'visible',
        'vname' => 'LBL_PAYMENT_DATE',
        'width' => '10%',
    ),
    //    'sale_type' =>
    //    array (
    //        'type' => 'enum',
    //        'default' => true,
    //        'studio' => 'visible',
    //        'vname' => 'LBL_SALE_TYPE',
    //        'width' => '9%',
    //    ),
    //    'sale_type_date' =>
    //    array (
    //        'type' => 'date',
    //        'default' => true,
    //        'studio' => 'visible',
    //        'vname' => 'LBL_SALE_TYPE_DATE',
    //        'width' => '9%',
    //    ),
    'status' =>
    array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'vname' => 'LBL_STATUS',
        'width' => '7%',
    ),
    'assigned_user_name' =>
    array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'vname' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '9%',
    ),
    'custom_button' =>
    array (
        'type' => 'varchar',
        'width' => '20%',
        'default' => true,
    ),
    'team_id' =>
    array (
        'usage'=>'query_only',
    ),
    'card_type' =>
    array (
        'usage'=>'query_only',
    ),
    'bank_type' =>
    array (
        'usage'=>'query_only',
    ),
    'payment_id' =>
    array (
        'usage'=>'query_only',
    ),
    'is_release' =>
    array (
        'usage'=>'query_only',
    ),
    'invoice_number' =>
    array (
        'usage'=>'query_only',
    ),    
    'student_id' =>
    array (
        'usage'=>'query_only',
    ),
);
if (($GLOBALS['current_user']->team_type == 'Adult')){
    unset($subpanel_layout['list_fields']['loyalty_amount']);
}