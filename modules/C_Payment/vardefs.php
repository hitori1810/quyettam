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

$dictionary['C_Payment'] = array(
    'table'=>'c_payment',
    'audited'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
        'payment_date' => 
        array (
            'required' => false,
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
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => false,
        ),     
        'code' => array (
            'name' => 'code',
            'vname' => 'LBL_CODE',
            'type' => 'varchar',
            'required' => false,
            'importable' => true,
            'unified_search' => true,
            'help' => 'Code',
            'len' => '50',
            'size' => '20',
        ),      
    ),
    'relationships'=>array (
    ),
    'optimistic_locking'=>true,
    'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('C_Payment','C_Payment', array('basic','team_security','assignable'));