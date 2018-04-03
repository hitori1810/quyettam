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

    $dictionary['C_HourRate'] = array(
        'table'=>'c_hourrate',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'year' => array(
                'name' => 'year',
                'vname' => 'LBL_YEAR',
                'type' => 'enum',
                'options' => 'hourrate_year_list',
                'len' => '5',
            ),
            /*'jan' => array(
                'name' => 'jan',
                'vname' => 'LBL_JAN',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'feb' => array(
                'name' => 'feb',
                'vname' => 'LBL_FEB',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'mar' => array(
                'name' => 'mar',
                'vname' => 'LBL_MAR',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'apr' => array(
                'name' => 'apr',
                'vname' => 'LBL_APR',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'may' => array(
                'name' => 'may',
                'vname' => 'LBL_MAY',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'jun' => array(
                'name' => 'jun',
                'vname' => 'LBL_JUN',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'jul' => array(
                'name' => 'jul',
                'vname' => 'LBL_JUL',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'aug' => array(
                'name' => 'aug',
                'vname' => 'LBL_AUG',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'sep' => array(
                'name' => 'sep',
                'vname' => 'LBL_SEP',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'oct' => array(
                'name' => 'oct',
                'vname' => 'LBL_OCT',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'nov' => array(
                'name' => 'nov',
                'vname' => 'LBL_NOV',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ),
            'dec' => array(
                'name' => 'dec',
                'vname' => 'LBL_DEC',
                'type' => 'decimal',
                'len' => '10,2',
                'default' => '0.00',
            ), */             
        ),
        'relationships'=>array (
        ),
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('C_HourRate','C_HourRate', array('basic','team_security','assignable'));