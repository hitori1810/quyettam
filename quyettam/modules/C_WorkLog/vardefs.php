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

    $dictionary['C_WorkLog'] = array(
        'table'=>'c_worklog',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'apply_date' => array(
                'name' => 'apply_date',
                'type' => 'date',
                'vname' => 'LBL_APPLY_DATE',
                'display_default' => 'now',
            ),
            'overtime' => array(
                'name' => 'overtime',
                'vname' => 'LBL_OVERTIME',
                'type' => 'bool',
                'default' => '0',
            ),
            'spent_time' => array(
                'name' => 'spent_time',
                'vname' => 'LBL_SPENT_TIME',
                'type' => 'decimal',
                'len' => '3,2',
                'default' => '0.00',
            ), 
            'html_template' => array(
                'name' => 'html_template',
                'type' => 'varchar',
                'source' => 'non-db',
                'studio' => 'visible',
                'vname' => 'HTML_TEMPLATE',
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
    VardefManager::createVardef('C_WorkLog','C_WorkLog', array('basic','team_security','assignable'));