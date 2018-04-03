<?php
$module_name = 'C_BookingTicket';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'internal_doc_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INTERNAL_DOC_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'internal_doc_id',
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
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status',
      ),
      'internal_doc_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INTERNAL_DOC_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'internal_doc_id',
      ),
      'serial_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_no',
      ),
      'invoice_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INVOICE_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_no',
      ),
      'booking_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_BOOKING_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'booking_date',
      ),
      'invoice_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INVOICE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_date',
      ),
      'full_payment_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_FULL_PAYMENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'full_payment_date',
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
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'booking_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_BOOKING_TYPE',
        'width' => '10%',
        'name' => 'booking_type',
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
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'width' => '10%',
        'default' => true,
        'name' => 'current_user_only',
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
