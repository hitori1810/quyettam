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

    $dictionary['C_LeavingRequest'] = array(
        'table'=>'c_leavingrequest',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'status' => 
            array (
                'required' => false,
                'name' => 'status',
                'vname' => 'LBL_STATUS',
                'type' => 'enum',                 
                'len' => 100,
                'size' => '20',
                'options' => 'leaving_status_dom',
                'studio' => 'visible',
                'dependency' => false,
            ), 
            'reason' => 
            array (
                'required' => false,
                'name' => 'reason',
                'vname' => 'LBL_REASON',
                'type' => 'enum',                 
                'len' => 100,
                'size' => '20',
                'options' => 'leaving_reason_dom',
                'studio' => 'visible',
                'dependency' => false,
            ), 
            'total_day' => array(
                'name' => 'total_day',
                'type' => 'float',
                'vname' => 'LBL_TOTAL_DATE', 
                'default' => '0',               
            ),
            //add relationship between leaving and leaving detail 
            'c_leavedetails' => array(
                'name' => 'c_leavedetails',
                'type' => 'link',
                'relationship' => 'leave_leavelines',
                'module' => 'C_LeaveDetails',
                'bean_name' => 'C_LeaveDetails',
                'source' => 'non-db',
                'vname' => 'LBL_LEAVING_DETAIL',
            ),
            'html_template' => array(
                'name' => 'html_template',
                'type' => 'varchar',
                'source' => 'non-db',
                'studio' => 'visible',
                'vname' => 'HTML_TEMPLATE',
            ), 
            'leaving_type' => 
            array (
                'required' => false,
                'name' => 'leaving_type',
                'vname' => 'LBL_LEAVING_TYPE',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'normal',
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'len' => 100,
                'size' => '20',
                'options' => 'request_type_list',
                'studio' => 'visible',
                'dbType' => 'enum',
            ),

        ),
        'relationships'=>array (
            'leave_leavelines' => array(
                'lhs_module'        => 'C_LeavingRequest',
                'lhs_table'            => 'c_leavingrequest',
                'lhs_key'            => 'id',
                'rhs_module'        => 'C_LeaveDetails',
                'rhs_table'            => 'c_leavedetails',
                'rhs_key'            => 'leaving_id',
                'relationship_type'    => 'one-to-many',
            ),
            //end

        ),
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('C_LeavingRequest','C_LeavingRequest', array('basic','team_security','assignable'));