<?php
$popupMeta = array (
    'moduleMain' => 'C_BookingTicket',
    'varName' => 'C_BookingTicket',
    'orderBy' => 'C_bookingticket.name',
    'whereClauses' => array (
  'name' => 'C_bookingticket.name',
),
    'searchInputs' => array (
  0 => 'C_bookingticket_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'INTERNAL_DOC_ID' => 
  array (
    'width' => '10%',
    'label' => 'LBL_INTERNAL_DOC_ID',
    'default' => true,
    'link' => true,
    'name' => 'internal_doc_id',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'status',
  ),
  'PARENT_NAME' => 
  array (
    'type' => 'parent',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_NAME',
    'link' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
    'width' => '15%',
    'default' => true,
    'customCode' => '<a href="index.php?module=C_BookingTicket&return_module=C_BookingTicket&action=DetailView&record={$ID}">{$PARENT_NAME}&nbsp;</a>',
    'name' => 'parent_name',
  ),
  'BOOKING_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_BOOKING_DATE',
    'width' => '10%',
    'default' => true,
    'sort_order' => 'desc',
    'name' => 'booking_date',
  ),
  'TOTAL_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_TOTAL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'total_amount',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
  'TEAM_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TEAM',
    'default' => true,
    'name' => 'team_name',
  ),
),
);
