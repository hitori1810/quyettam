<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

$dictionary['Product'] = array('table' => 'products','audited'=>true,
    'comment' => 'The user (not Admin)) view of a Product definition; an instance of a product'
    ,'fields' => array (
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


    )
    , 'indices' => array (
        array('name' =>'idx_products', 'type'=>'index', 'fields'=>array('name','deleted')),
        array('name' =>'idx_user_dateclosed_timestamp', 'type'=>'index', 'fields' => array('id', 'assigned_user_id', 'date_closed_timestamp'))
    )

    , 'relationships' => array (
        'product_notes' => array('lhs_module'=> 'Products', 'lhs_table'=> 'products', 'lhs_key' => 'id',
            'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
            'relationship_type'=>'one-to-many','relationship_role_column'=>'parent_type',
            'relationship_role_column_value'=>'Products')
        ,'products_accounts' =>
        array('lhs_module'=> 'Accounts', 'lhs_table'=> 'accounts', 'lhs_key' => 'id',
            'rhs_module'=> 'Products', 'rhs_table'=> 'products', 'rhs_key' => 'account_id',
            'relationship_type'=>'one-to-many')
        ,'product_categories' =>
        array('lhs_module'=> 'ProductCategories', 'lhs_table'=> 'product_categories', 'lhs_key' => 'id',
            'rhs_module'=> 'Products', 'rhs_table'=> 'products', 'rhs_key' => 'category_id',
            'relationship_type'=>'one-to-many')
        ,'product_types' =>
        array('lhs_module'=> 'ProductTypes', 'lhs_table'=> 'product_types', 'lhs_key' => 'id',
            'rhs_module'=> 'Products', 'rhs_table'=> 'products', 'rhs_key' => 'type_id',
            'relationship_type'=>'one-to-many')
        ,'products_modified_user' =>
        array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
            'rhs_module'=> 'Products', 'rhs_table'=> 'products', 'rhs_key' => 'modified_user_id',
            'relationship_type'=>'one-to-many')

        ,'products_created_by' =>
        array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
            'rhs_module'=> 'Products', 'rhs_table'=> 'products', 'rhs_key' => 'created_by',
            'relationship_type'=>'one-to-many')

        ,'products_worksheet' =>
        array('lhs_module'=> 'Products', 'lhs_table'=> 'products', 'lhs_key' => 'id',
            'rhs_module'=> 'Worksheet', 'rhs_table'=> 'worksheet', 'rhs_key' => 'related_id',
            'relationship_type'=>'one-to-many'),
    )
);

VardefManager::createVardef('Products','Product', array('default',
    'team_security',
));
?>
