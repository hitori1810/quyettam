<?php
// created: 2018-03-30 10:30:30
$searchFields['Products'] = array (
  'name' => 
  array (
    'query_type' => 'default',
  ),
  'contact_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'contacts.first_name',
      1 => 'contacts.last_name',
    ),
    'force_unifiedsearch' => true,
  ),
  'status' => 
  array (
    'query_type' => 'default',
    'options' => 'product_status_dom',
    'template_var' => 'STATUS_OPTIONS',
    'options_add_blank' => true,
  ),
  'type_id' => 
  array (
    'query_type' => 'default',
    'options' => 'product_type_dom',
    'template_var' => 'TYPE_OPTIONS',
  ),
  'category_id' => 
  array (
    'query_type' => 'default',
    'options' => 'products_cat_dom',
    'template_var' => 'CATEGORY_OPTIONS',
  ),
  'manufacturer_id' => 
  array (
    'query_type' => 'default',
    'options' => 'manufacturer_dom',
    'template_var' => 'MANUFACTURER_OPTIONS',
  ),
  'mft_part_num' => 
  array (
    'query_type' => 'default',
  ),
  'vendor_part_num' => 
  array (
    'query_type' => 'default',
  ),
  'tax_class' => 
  array (
    'query_type' => 'default',
    'options' => 'tax_class_dom',
    'template_var' => 'TAX_CLASS_OPTIONS',
    'options_add_blank' => true,
  ),
  'date_available' => 
  array (
    'query_type' => 'default',
  ),
  'support_term' => 
  array (
    'query_type' => 'default',
  ),
  'favorites_only' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT sugarfavorites.record_id FROM sugarfavorites 
			                    WHERE sugarfavorites.deleted=0 
			                        and sugarfavorites.module = \'Products\'
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
  'range_unit_cost' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_unit_cost' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_unit_cost' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
);