<?php
/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

$dictionary['J_PaymentDetail'] = array(
    'table'=>'j_paymentdetail',
    'audited'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (  
        'payement' => array(
            'required' => true,
            'name' => 'payement',
            'vname' => 'LBL_PAYMENT',
            'type' => 'enum',
            'function'=> 'getPaymentForVardef',
            'reportable'=>true,
            'audited' =>true,
            'massupdate' => false,
            'duplicate_merge' => 'enabled',
            'duplicate_merge_dom_value' => '1',
        ),
        'product' => array(
            'required' => true,
            'name' => 'product',
            'vname' => 'LBL_PRODUCT',
            'type' => 'enum',
            'function'=> 'getProductForVardef',
            'reportable'=>true,
            'audited' =>true,
            'massupdate' => false,
            'duplicate_merge' => 'enabled',
            'duplicate_merge_dom_value' => '1',
        ),    
        'unit' => array (
            'name' => 'unit',
            'vname' => 'LBL_UNIT',
            'type' => 'varchar',
            'required' => false,
            'importable' => true,
            'unified_search' => true,
            'help' => 'Code',
            'len' => '50',
            'size' => '20',
        ),  
        'quantity' => 
        array (   
            'required' => false,
            'name' => 'quantity',
            'vname' => 'LBL_QUANTITY',
            'type' => 'uint',
            'massupdate' => 0,
            'no_default' => false,
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '5',
            'size' => '20',
            'enable_range_search' => false,
            'disable_num_format' => '',
        ),
        'unit_cost' =>
        array (
            'required' => false,
            'name' => 'unit_cost',
            'vname' => 'LBL_UNIT_COST',
            'type' => 'currency',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'Payment Amount',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 13,
            'min' => 1,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
            'precision' => 2,
            'default' => '',
        ), 
        'payment_amount' =>
        array (
            'required' => false,
            'name' => 'payment_amount',
            'vname' => 'LBL_PAYMENT_AMOUNT',
            'type' => 'currency',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'Payment Amount',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 13,
            'min' => 1,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
            'precision' => 2,
            'default' => '',
        ),    
    ),
    'indices' => array (
        array(
            'name' => 'idx_payment_id',
            'type' => 'index',
            'fields'=> array('payment_id'),
        ),
    ),
    'relationships'=>array (
        //Add Relationship Payment Detail - Loyalty
        'paymentdetail_loyaltys' => array(
            'lhs_module' => 'J_PaymentDetail',
            'lhs_table' => 'j_paymentdetail',
            'lhs_key' => 'id',
            'rhs_module' => 'J_Loyalty',
            'rhs_table' => 'j_loyalty',
            'rhs_key' => 'paymentdetail_id',
            'relationship_type' => 'one-to-many'
        ),
    ),
    'optimistic_locking'=>true,
    'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('J_PaymentDetail','J_PaymentDetail', array('basic','team_security','assignable'));