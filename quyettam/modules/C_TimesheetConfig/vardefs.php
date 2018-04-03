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

    $dictionary['C_TimesheetConfig'] = array(
        'table'=>'c_timesheetconfig',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'category' => array(
                'name' => 'category',
                'vname' => 'LBL_CATEGORY',
                'type' => 'varchar',
                'default' => '',
            ),
            'value' => array(
                'name' => 'value',
                'vname' => 'LBL_VALUE',
                'type' => 'varchar',
                'default' => '',
            ),
            //add field non-db for config
            //for config reminder work log
            'daily_reminder' => array(
                'name' => 'daily_reminder',
                'vname' => 'LBL_DAILY_REMINDER',
                'type' => 'bool',
                'source' => 'non-db',
                'studio' => 'visible',
            ),
            'weekly_reminder' => array(
                'name' => 'weekly_reminder',
                'vname' => 'LBL_WEEKLY_REMINDER',
                'type' => 'bool',
                'source' => 'non-db',
                'studio' => 'visible',
            ),
            'missing_reminder' => array(
                'name' => 'missing_reminder',
                'vname' => 'LBL_MISSING_REMINDER',
                'type' => 'bool',
                'source' => 'non-db',
                'studio' => 'visible',
            ),
            //for time work in week
            'timework_template' => array(
                'name' => 'timework_template',
                'vname' => 'LBL_TIMEWORK',
                'type' => 'varchar',
                'source' => 'non-db',
                'studio' => 'visible',
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
    VardefManager::createVardef('C_TimesheetConfig','C_TimesheetConfig', array('basic','team_security','assignable'));