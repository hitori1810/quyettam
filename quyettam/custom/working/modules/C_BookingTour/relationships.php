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

$relationships = array (
  'c_bookingtour_assigned_user' => 
  array (
    'id' => '19767cb0-be10-d6fd-3a6a-5559aa12fc7e',
    'relationship_name' => 'c_bookingtour_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'accounts_c_bookingtour_1' => 
  array (
    'id' => '1f5506bf-bb52-78af-f425-5559aa5ce858',
    'relationship_name' => 'accounts_c_bookingtour_1',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'id',
    'join_table' => 'accounts_c_bookingtour_1_c',
    'join_key_lhs' => 'accounts_c_bookingtour_1accounts_ida',
    'join_key_rhs' => 'accounts_c_bookingtour_1c_bookingtour_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'contacts_c_bookingtour_1' => 
  array (
    'id' => '42074420-fff8-5dab-8c82-5559aacddae7',
    'relationship_name' => 'contacts_c_bookingtour_1',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'id',
    'join_table' => 'contacts_c_bookingtour_1_c',
    'join_key_lhs' => 'contacts_c_bookingtour_1contacts_ida',
    'join_key_rhs' => 'contacts_c_bookingtour_1c_bookingtour_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'c_bookingtour_c_payment_1' => 
  array (
    'id' => '89875a7c-8837-424b-feae-5559aaed3a97',
    'relationship_name' => 'c_bookingtour_c_payment_1',
    'lhs_module' => 'C_BookingTour',
    'lhs_table' => 'c_bookingtour',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payment',
    'rhs_table' => 'c_payment',
    'rhs_key' => 'id',
    'join_table' => 'c_bookingtour_c_payment_1_c',
    'join_key_lhs' => 'c_bookingtour_c_payment_1c_bookingtour_ida',
    'join_key_rhs' => 'c_bookingtour_c_payment_1c_payment_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'c_tour_c_bookingtour_1' => 
  array (
    'id' => 'a13fb379-8d28-5dbe-9c34-5559aa2704ea',
    'relationship_name' => 'c_tour_c_bookingtour_1',
    'lhs_module' => 'C_Tour',
    'lhs_table' => 'c_tour',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'id',
    'join_table' => 'c_tour_c_bookingtour_1_c',
    'join_key_lhs' => 'c_tour_c_bookingtour_1c_tour_ida',
    'join_key_rhs' => 'c_tour_c_bookingtour_1c_bookingtour_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'c_bookingtour_modified_user' => 
  array (
    'id' => 'c57b8803-fe6c-be48-cd84-5559aa5095d6',
    'relationship_name' => 'c_bookingtour_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'opportunities_c_bookingtour_1' => 
  array (
    'id' => 'c6f200b8-a0cb-87ec-9971-5559aa6a4f37',
    'relationship_name' => 'opportunities_c_bookingtour_1',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'id',
    'join_table' => 'opportunities_c_bookingtour_1_c',
    'join_key_lhs' => 'opportunities_c_bookingtour_1opportunities_ida',
    'join_key_rhs' => 'opportunities_c_bookingtour_1c_bookingtour_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'c_bookingtour_created_by' => 
  array (
    'id' => 'cc5faf79-6790-33f4-0c5e-5559aa028bc2',
    'relationship_name' => 'c_bookingtour_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTour',
    'rhs_table' => 'c_bookingtour',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'c_bookingtour_c_payment_2' => 
  array (
    'rhs_label' => 'Payment',
    'lhs_label' => 'Booking Tour',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'C_BookingTour',
    'rhs_module' => 'C_Payment',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'c_bookingtour_c_payment_2',
  ),
);