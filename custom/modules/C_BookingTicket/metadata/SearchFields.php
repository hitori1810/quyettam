<?php
// created: 2015-05-15 10:52:07
$searchFields['C_BookingTicket'] = array (
  'internal_doc_id' => 
  array (
    'query_type' => 'default',
  ),
  'taxcode' => 
  array (
    'query_type' => 'default',
  ),
  'tcc_code' => 
  array (
    'query_type' => 'default',
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
    'vname' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
  ),
  'assigned_user_id' => 
  array (
    'query_type' => 'default',
  ),
  'favorites_only' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT sugarfavorites.record_id FROM sugarfavorites 
			                    WHERE sugarfavorites.deleted=0 
			                        and sugarfavorites.module = \'C_BookingTicket\'
			                        and sugarfavorites.assigned_user_id = \'{0}\'',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_booking_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_booking_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_booking_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_invoice_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_invoice_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_invoice_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_payment_date_1' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_payment_date_1' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_payment_date_1' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_payment_amount_1' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_amount_1' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_amount_1' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_date_2' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_payment_date_2' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_payment_date_2' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_payment_amount_2' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_amount_2' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_amount_2' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_full_payment_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_full_payment_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_full_payment_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_total_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_total_profit' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_profit' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_profit' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_plan' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_plan' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_plan' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_total_purchase' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_purchase' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_purchase' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_accountant_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_accountant_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_accountant_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_ex_rate' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_ex_rate' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_ex_rate' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_inspected_payment_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_inspected_payment_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_inspected_payment_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_total_amount_invoice' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_amount_invoice' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_amount_invoice' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
);