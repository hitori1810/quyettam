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

$dictionary['J_School'] = array(
	'table'=>'j_school',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
  'team_name' =>
  array (
    'name' => 'team_name',
    'db_concat_fields' =>
    array (
      0 => 'name',
      1 => 'name_2',
    ),
    'sort_on' => 'tj.name',
    'join_name' => 'tj',
    'rname' => 'name',
    'id_name' => 'team_id',
    'vname' => 'LBL_TEAMS',
    'type' => 'relate',
    'required' => false,
    'table' => 'teams',
    'isnull' => 'true',
    'module' => '',
    'link' => 'team_link',
    'massupdate' => 0,
    'dbType' => 'varchar',
    'source' => 'non-db',
    'len' => '255',
    'custom_type' => 'teamset',
    'studio' => 'visible',
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'size' => '20',
    'ext2' => '',
    'quicksearch' => 'enabled',
  ),
  'school_id' =>
  array (
    'required' => true,
    'name' => 'school_id',
    'vname' => 'LBL_SCHOOL_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '50',
    'size' => '20',
  ),
  'level' =>
  array (
    'required' => true,
    'name' => 'level',
    'vname' => 'LBL_LEVEL',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 100,
    'size' => '20',
    'options' => 'level_school_list',
    'studio' => 'visible',
    'dependency' => false,
    'default'=>' ',
  ),
  'address_address_street' =>
  array (
    'required' => false,
    'name' => 'address_address_street',
    'vname' => 'LBL_ADDRESS_STREET',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 100,
    'size' => '20',
    'group' => 'address',
  ),
  'address_address_city' =>
  array (
    'required' => false,
    'name' => 'address_address_city',
    'vname' => 'LBL_ADDRESS_CITY',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 100,
    'size' => '20',
    'group' => 'address',
  ),
  'address_address_state' =>
  array (
    'required' => false,
    'name' => 'address_address_state',
    'vname' => 'LBL_ADDRESS_STATE',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 100,
    'size' => '20',
    'group' => 'address',
  ),
  'address_address_postalcode' =>
  array (
    'required' => false,
    'name' => 'address_address_postalcode',
    'vname' => 'LBL_ADDRESS_POSTALCODE',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 20,
    'size' => '20',
    'group' => 'address',
  ),
  'address_address_country' =>
  array (
    'required' => false,
    'name' => 'address_address_country',
    'vname' => 'LBL_ADDRESS_COUNTRY',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 100,
    'size' => '20',
    'group' => 'address',
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_NAME',
    'type' => 'name',
    'link' => true,
    'dbType' => 'varchar',
    'len' => '255',
    'unified_search' => false,
    'full_text_search' =>
    array (
      'boost' => 3,
    ),
    'required' => false,
    'importable' => 'No',
    'duplicate_merge' => 'enabled',
    'merge_filter' => 'selected',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'duplicate_merge_dom_value' => '3',
    'audited' => false,
    'reportable' => true,
    'calculated' => false,
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
    VardefManager::createVardef('J_School','J_School', array('basic','assignable'));