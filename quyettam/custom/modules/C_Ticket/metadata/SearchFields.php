<?php
// created: 2016-07-21 10:14:50
$searchFields['C_Ticket'] = array (
  'name' => 
  array (
    'query_type' => 'default',
  ),
  'pax_name' => 
  array (
    'query_type' => 'default',
  ),
  'tour' => 
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
			                        and sugarfavorites.module = \'C_Ticket\'
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
  'range_public_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_public_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_public_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_market_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_market_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_market_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_commission_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_commission_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_commission_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_commission' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_commission' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_commission' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_net_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_net_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_net_fare' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_discount_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_discount_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_discount_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_discount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_discount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_discount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_airport_tax' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_airport_tax' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_airport_tax' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_vat_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_vat_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_vat_percent' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_vat_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_vat_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_vat_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_service_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_service_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_service_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_receivable' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_receivable' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_receivable' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payable' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payable' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payable' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_earn' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_earn' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_earn' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_refund_fee' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_refund_fee' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_refund_fee' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_refund_fee_airline' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_refund_fee_airline' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_refund_fee_airline' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_repay_client' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_repay_client' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_repay_client' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_airline_repay' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_airline_repay' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_airline_repay' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_refund_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_refund_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_refund_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
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
  'range_service_charge_vnd' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_service_charge_vnd' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_service_charge_vnd' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
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
);