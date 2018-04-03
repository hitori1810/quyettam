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

$dictionary['C_Room'] = array(
	'table'=>'c_room',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
  'room_type' => 
  array (
    'required' => false,
    'name' => 'room_type',
    'vname' => 'LBL_ROOM_TYPE',
    'type' => 'enum',
    'massupdate' => '1',
    'default' => 'Other',
    'no_default' => false,
    'comments' => '',
    'help' => 'Room Type',
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
    'options' => 'room_type_room_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'other_type' => 
  array (
    'required' => false,
    'name' => 'other_type',
    'vname' => 'LBL_OTHER_TYPE',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => 'Other Type',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '255',
    'size' => '20',
  ),
  'category' => 
  array (
    'required' => false,
    'name' => 'category',
    'vname' => 'LBL_CATEGORY',
    'type' => 'enum',
    'massupdate' => '1',
    'default' => 'Other',
    'no_default' => false,
    'comments' => '',
    'help' => 'Category',
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
    'options' => 'category_room_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'other_category' => 
  array (
    'required' => false,
    'name' => 'other_category',
    'vname' => 'LBL_OTHER_CATEGORY',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => 'Other Category',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '255',
    'size' => '20',
  ),
  'adult' => 
  array (
    'required' => false,
    'name' => 'adult',
    'vname' => 'LBL_ADULT',
    'type' => 'enum',
    'massupdate' => '1',
    'default' => '0',
    'no_default' => false,
    'comments' => '',
    'help' => 'Adult',
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
    'options' => 'adult_room_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'children' => 
  array (
    'required' => false,
    'name' => 'children',
    'vname' => 'LBL_CHILDREN',
    'type' => 'enum',
    'massupdate' => '1',
    'default' => '0',
    'no_default' => false,
    'comments' => '',
    'help' => 'Children',
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
    'options' => 'children_room_list',
    'studio' => 'visible',
    'dependency' => false,
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
VardefManager::createVardef('C_Room','C_Room', array('basic','team_security','assignable'));