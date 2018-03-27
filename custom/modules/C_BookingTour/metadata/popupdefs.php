<?php
$popupMeta = array (
    'moduleMain' => 'C_BookingTour',
    'varName' => 'C_BookingTour',
    'orderBy' => 'c_bookingtour.name',
    'whereClauses' => array (
  'name' => 'c_bookingtour.name',
),
    'searchInputs' => array (
  0 => 'c_bookingtour_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'BOOKING_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BOOKING_NAME',
    'width' => '20%',
    'default' => true,
    'link' => true,
    'name' => 'booking_name',
  ),
  'C_TOUR_C_BOOKINGTOUR_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_TOUR_TITLE',
    'id' => 'C_TOUR_C_BOOKINGTOUR_1C_TOUR_IDA',
    'width' => '20%',
    'default' => true,
    'name' => 'c_tour_c_bookingtour_1_name',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
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
    'width' => '10%',
    'default' => true,
    'name' => 'parent_name',
  ),
  'PHONE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_PHONE',
    'width' => '13%',
    'default' => true,
    'name' => 'phone',
  ),
  'START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'start_date',
  ),
  'END_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'end_date',
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
  'TEAM_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
    'name' => 'team_name',
  ),
),
);
