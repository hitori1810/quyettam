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

$dictionary['acl_roles_users'] = array ( 

	'table' => 'acl_roles_users',

	'fields' => array (
		array (
			'name' => 'id',
			'type' => 'varchar',
			'len' => '36',
		),
		array (
			'name' => 'role_id',
			'type' => 'varchar',
			'len' => '36',
		),
		array (
			'name' => 'user_id',
			'type' => 'varchar',
			'len' => '36',
		)
      , array ('name' => 'date_modified','type' => 'datetime'),
		array (
			'name' => 'deleted',
			'type' => 'bool',
			'len' => '1',
			'default' => '0'
		),
	),
	
	'indices' => array (
		array (
			'name' => 'acl_roles_userspk',
			'type' => 'primary',
			'fields' => array ( 'id' )
		),
		array (
			'name' => 'idx_aclrole_id',
			'type' => 'index',
			'fields' => array ('role_id')
		),
		array (
			'name' => 'idx_acluser_id',
			'type' => 'index',
			'fields' => array ('user_id')
		),
		array('name' => 'idx_aclrole_user', 'type'=>'alternate_key', 'fields'=>array('role_id','user_id'))
	),
	'relationships' => array ('acl_roles_users' => array('lhs_module'=> 'ACLRoles', 'lhs_table'=> 'acl_roles', 'lhs_key' => 'id',
							  'rhs_module'=> 'Users', 'rhs_table'=> 'users', 'rhs_key' => 'id',
							  'relationship_type'=>'many-to-many',
							  'join_table'=> 'acl_roles_users', 'join_key_lhs'=>'role_id', 'join_key_rhs'=>'user_id')),
	
)
                                  
?>