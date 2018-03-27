<?php
$module_name = 'C_BookingHotel';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'booking_name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_BOOKING_NAME',
    'default' => true,
  ),
  'c_hotel_c_bookinghotel_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_HOTEL_C_BOOKINGHOTEL_1_FROM_C_HOTEL_TITLE',
    'id' => 'C_HOTEL_C_BOOKINGHOTEL_1C_HOTEL_IDA',
    'width' => '20%',
    'default' => true,
  ),
  'parent_name' => 
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
    'width' => '25%',
    'default' => true,
  ),
  'status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'room' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ROOMS',
    'width' => '10%',
  ),
  'check_in_date' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_CHECK_IN_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'check_out_date' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_CHECK_OUT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'dateline' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DEADLINE',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
  ),
);
