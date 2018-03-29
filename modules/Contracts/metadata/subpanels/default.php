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



$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Contracts','mode'=>'MultiSelect'),
	),

	'where' => '',



	'list_fields' => array(
	'contract_id' =>
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CONTRACT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'module' => 'Contacts',
    'width' => '15%',
    'default' => true,
  ),
  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_LIST_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'total_contract_value' =>
  array (
    'type' => 'currency',
    'vname' => 'LBL_TOTAL_CONTRACT_VALUE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'amount_per_student' =>
  array (
    'type' => 'currency',
    'vname' => 'LBL_AMOUNT_PER_STUDENT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'study_duration' =>
  array (
    'type' => 'decimal',
    'vname' => 'LBL_STUDY_DURATION',
    'width' => '10%',
    'default' => true,
  ),
  'customer_signed_date' =>
  array (
    'type' => 'date',
    'vname' => 'LBL_CUSTOMER_SIGNED_DATE',
    'width' => '10%',
    'default' => true,
  ),
      'team_name' =>
    array (
        'width' => '10%',
        'vname' => 'LBL_TEAM',
        'widget_class' => 'SubPanelDetailViewLink',
        'default' => true,
    ),
  'currency_id' =>
  array (
    'name' => 'currency_id',
    'usage' => 'query_only',
  ),
	),
);
?>
