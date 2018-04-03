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

$dictionary['J_Payment'] = array(
    'table'=>'j_payment',
    'audited'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (     
    
        'customer' => array(
            'required' => true,
            'name' => 'customer',
            'vname' => 'LBL_CUSTOMER',
            'type' => 'enum',
            'function'=> 'getCustomerForVardef',
            'reportable'=>true,
            'audited' =>true,
            'massupdate' => false,
            'duplicate_merge' => 'enabled',
            'duplicate_merge_dom_value' => '1',
        ),  
        'payment_date' =>
        array (
            'required' => true,
            'name' => 'payment_date',
            'vname' => 'LBL_PAYMENT_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'Payment Date',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => true,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
            'display_default' => 'now',
        ), 
        'payment_amount' => array(
            'required' => false,
            'name' => 'payment_amount',
            'vname' => 'LBL_PAYMENT_AMOUNT',
            'type' => 'int',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => true,
            'reportable' => 1,
            'studio' => 'visible',
            'enable_range_search' => true,
            'size' => '20',
            'len' => 26,
            'options' => 'numeric_range_search_dom',

        ),              
        'payment_detail' => array(
            'name' => 'payment_detail',
            'vname' => 'LBL_PAYMENT_DETAIL',
            'type' => 'text',
            'massupdate' => 0,
            'comments' => 'comment',
            'help' => 'help',
            'importable' => 'false',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '1',
            'audited' => false,
        ),  
    ),
    'optimistic_locking'=>true,
    'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('J_Payment','J_Payment', array('basic','team_security','assignable'));