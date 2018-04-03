<?php
$module_name = 'C_BookingHotel';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'booking_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_BOOKING_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'booking_date',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
    ),
    'advanced_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
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
        'width' => '10%',
        'default' => true,
        'name' => 'parent_name',
      ),
      'c_hotel_c_bookinghotel_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_C_HOTEL_C_BOOKINGHOTEL_1_FROM_C_HOTEL_TITLE',
        'id' => 'C_HOTEL_C_BOOKINGHOTEL_1C_HOTEL_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'c_hotel_c_bookinghotel_1_name',
      ),
      'name' => 
      array (
        'name' => 'name',
        'label' => 'LBL_BOOKING_NAME',
        'default' => true,
        'width' => '10%',
      ),
      'invoice_serial_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INVOICE_SERIAL_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_serial_no',
      ),
      'invoice_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INVOICE_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_no',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'width' => '10%',
        'default' => true,
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'booking_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_BOOKING_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'booking_date',
        'enable_range_search' => true,
        'options' => 'date_range_search_dom',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'studio' => 
        array (
          'portaleditview' => false,
        ),
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'invoice_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INVOICE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_date',
      ),
      'team_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'studio' => 
        array (
          'portallistview' => false,
          'portaldetailview' => false,
          'portaleditview' => false,
        ),
        'label' => 'LBL_TEAMS',
        'id' => 'TEAM_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'team_name',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
