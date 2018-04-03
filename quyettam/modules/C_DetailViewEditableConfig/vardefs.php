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

    $dictionary['C_DetailViewEditableConfig'] = array(
        'table'=>'c_detailvieweditableconfig',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'config_type' => 
            array (
                'required' => true,
                'name' => 'config_type',
                'vname' => 'LBL_CONFIG_TYPE',
                'type' => 'enum',
                'options' => 'detailview_editable_config_type_options',
                'comments' => 'Deternine wherether only some field or the whole module will be applied the config',
            ),
            'target_module' => 
            array (
                'required' => true,
                'name' => 'target_module',
                'vname' => 'LBL_TARGET_MODULE',
                'type' => 'enum',
                'function' => 'getAvailableModules',
                'comments' => 'Target module that will apply config',
            ),
            'target_fields' => 
            array (
                'required' => true,
                'name' => 'target_fields',
                'vname' => 'LBL_TARGET_FIELDS',
                'type' => 'text',
                'comments' => 'Target fields that will apply editable config in the selected module',
            ),
            'is_active' => 
            array (
                'required' => true,
                'name' => 'is_active',
                'vname' => 'LBL_IS_ACTIVE',
                'type' => 'bool',
                'comments' => 'Boolean field that idicate wherether the selected module will be applied',
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
    VardefManager::createVardef('C_DetailViewEditableConfig','C_DetailViewEditableConfig', array('basic','team_security','assignable'));