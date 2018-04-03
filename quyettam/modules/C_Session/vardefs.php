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

    $dictionary['C_Session'] = array(
        'table'=>'c_session',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'customer_email' => array(
                'name' => 'customer_email',
                'vname' => 'LBL_EMAIL',
                'type' => 'varchar', 
                'len'   => 100,
                'massupdate' => false,
            ),
            'customer_phone' => array(
                'name' => 'customer_phone',
                'vname' => 'LBL_PHONE',
                'type' => 'varchar', 
                'len'   => 100,
                'massupdate' => false,
            ),
            'operating_system' => array(
                'name' => 'operating_system',
                'vname' => 'LBL_OPERATING_SYSTEM',
                'type' => 'varchar', 
                'len'   => 50,
                'massupdate' => false,
            ),
            'screen_resolution' => array(
                'name' => 'screen_resolution',
                'vname' => 'LBL_SREEN_RESOLUTION',
                'type' => 'varchar', 
                'len'   => 50,
                'massupdate' => false,
            ),
            'browser' => array(
                'name' => 'browser',
                'vname' => 'LBL_BROWSER',
                'type' => 'varchar', 
                'len'   => 50,
                'massupdate' => false,
            ),
            'city' => array(
                'name' => 'city',
                'vname' => 'LBL_CITY',
                'type' => 'varchar', 
                'len'   => 50,
                'massupdate' => false,
            ),
            'country' => array(
                'name' => 'country',
                'vname' => 'LBL_COUNTRY',
                'type' => 'varchar', 
                'len'   => 50,
                'massupdate' => false,
            ),
            'session_starttime' => array(
                'name' => 'session_starttime',
                'vname' => 'LBL_SESSION_STARTTIME',
                'type' => 'datetime',                 
                'massupdate' => false,
            ),
            'method' => array(
                'name' => 'method',
                'vname' => 'LBL_METHOD',
                'type' => 'enum',                 
                'options' => 'session_method_options',                 
                'massupdate' => false,
            ),
            'device' => array(
                'name' => 'device',
                'vname' => 'LBL_DEVICE',
                'type' => 'enum',                 
                'options' => 'session_device_options',                 
                'massupdate' => false,
            ),
            'page' => array(
                'name' => 'page',
                'vname' => 'LBL_PAGE',
                'type' => 'varchar',                 
                'massupdate' => false,
            ),

            'parent_name' => array(
                'name' => 'parent_name',
                'vname' => 'LBL_PARENT_NAME',
                'type' => 'parent',
                'group'=>'parent_name',
                'source'=>'non-db',
                'options' => 'session_customer_type_options',
                'type_name' => 'parent_type',
                'id_name' => 'parent_id',
                'studio' => true,
                'parent_type' => 'session_customer_type_options',
            ),

            'parent_type' => array(
                'required' => false,
                'name' => 'parent_type',
                'vname' => 'LBL_PARENT_TYPE',
                'type' => 'parent_type',
                'massupdate' => 0,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => true,
                'reportable' => true,
                'len' => 255,
                'size' => '20',
                'default' => 'Contacts',
                'dbType' => 'varchar',
                'studio' => 'true',
            ),
            'parent_id' => array(
                'required' => false,
                'name' => 'parent_id',
                'vname' => 'LBL_PARENT_ID',
                'type' => 'id',
                'massupdate' => 0,
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => true,
                'len' => 36,
                'size' => '20',
            ),

            'contact_id' => array(
                'name' => 'contact_id',
                'vname' => 'LBL_CONTACT_ID',
                'type' => 'id',
                'importable' => 'true',
                'required'=>false,
                'reportable'=>false,
            ),
            'contact_name' => array(
                'name' => 'contact_name',
                'rname' => 'name',
                'id_name' => 'contact_id',
                'vname' => 'LBL_CONTACT_NAME',
                'type' => 'relate',
                'link' => 'contact_link',
                'table' => 'contacts',
                'isnull' => 'true',
                'module' => 'Contacts',
                'dbType' => 'varchar',
                'len' => 'id',
                'reportable'=>true,
                'source' => 'non-db',
                'additionalFields' => array('id' => 'contact_id'),
            ),
            'contact_link' => array(
                'name' => 'contact_link',
                'type' => 'link',
                'relationship' => 'session_contact',
                'link_type' => 'one',
                'side' => 'right',
                'source' => 'non-db',
                'vname' => 'LBL_CONTACT',
            ),

            'lead_id' => array(
                'name' => 'lead_id',
                'vname' => 'LBL_LEAD_ID',
                'type' => 'id',
                'importable' => 'true',
                'required'=>false,
                'reportable'=>false,
            ),
            'lead_name' => array(
                'name' => 'lead_name',
                'rname' => 'name',
                'id_name' => 'lead_id',
                'vname' => 'LBL_LEAD_NAME',
                'type' => 'relate',
                'link' => 'lead_link',
                'table' => 'leads',
                'isnull' => 'true',
                'module' => 'Leads',
                'dbType' => 'varchar',
                'len' => 'id',
                'reportable'=>true,
                'source' => 'non-db',
                'additionalFields' => array('id' => 'lead_id'),
            ),
            'lead_link' => array(
                'name' => 'lead_link',
                'type' => 'link',
                'relationship' => 'session_lead',
                'link_type' => 'one',
                'side' => 'right',
                'source' => 'non-db',
                'vname' => 'LBL_LEAD',
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
    VardefManager::createVardef('C_Session','C_Session', array('basic','team_security','assignable'));