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

    $dictionary['C_LeaveDetails'] = array(
        'table'=>'c_leavedetails',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'leaving_date' => 
            array (
                'required' => false,
                'name' => 'leaving_date',
                'vname' => 'LBL_LEAVING_DATE',               
                'type' => 'date',
                'massupdate' => 0,                 
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,     
                'studio' => 'visible',
            ),
            'leaving_time' => 
            array (
                'required' => false,
                'name' => 'leaving_time',
                'vname' => 'LBL_LEAVING_TYPE_DETAIL',
                'type' => 'enum',                    
                'len' => 100,
                'size' => '20',
                'options' => 'type_leave_of_date',  
            ), 
            'status' => 
            array (
                'required' => false,
                'name' => 'status',
                'vname' => 'LBL_STATUS',
                'type' => 'enum',                 
                'len' => 100,
                'size' => '20',
                'options' => 'leaving_detail_status_dom',
                'studio' => 'visible',
                'dependency' => false,
            ), 
            'total_hour' => array(
                'name' => 'total_hour',
                'type' => 'float',
                'vname' => 'LBL_TOTAL_HOUR', 
                'default' => '0',               
            ),
            'total_day' => array(
                'name' => 'total_day',
                'type' => 'float',
                'vname' => 'LBL_TOTAL_DATE', 
                'default' => '0',               
            ),
            //add relationship between leaving and leaving detail
            'leaving_name' => array(
                'required'  => false,
                'source'    => 'non-db',
                'name'      => 'leaving_name',
                'vname'     => 'LBL_LEAVING_NAME',
                'type'      => 'relate',
                'rname'     => 'name',
                'id_name'   => 'leaving_id',
                'join_name' => 'c_leavingrequest',
                'link'      => 'c_leavingrequest',
                'table'     => 'c_leavingrequest',
                'isnull'    => 'true',
                'module'    => 'C_LeavingRequest',
            ), 
            'leaving_id' => array(
                'name'              => 'leaving_id',
                'rname'             => 'id',
                'vname'             => 'LBL_LEAVING_ID',
                'type'              => 'id',
                'table'             => 'c_leavingrequest',
                'isnull'            => 'true',
                'module'            => 'C_LeavingRequest',
                'dbType'            => 'id',
                'reportable'        => false,
                'massupdate'        => false,
                'duplicate_merge'   => 'disabled',
            ), 
            'c_leavingrequest' => array(
                'name'          => 'c_leavingrequest',
                'type'          => 'link',
                'relationship'  => 'leave_leavelines',
                'module'        => 'C_LeavingRequest',
                'bean_name'     => 'C_LeavingRequest',
                'source'        => 'non-db',
                'vname'         => 'LBL_LEAVING_REQUEST',
            ),
            //end 
            'group_key' => array(
                'name' => 'group_key',
                'type' => 'varchar',
                'len' => '50',
                'vname' => 'LBL_GROUP_KEY',
                'default' => '',
            ),

            'week' => array(
                'name' => 'week_of_date',
                'type' => 'varchar',
                'vname' => 'LBL_WEEK',
                'len' => '50',
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
    VardefManager::createVardef('C_LeaveDetails','C_LeaveDetails', array('basic','team_security','assignable'));