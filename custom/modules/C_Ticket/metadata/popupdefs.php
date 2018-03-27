<?php
$popupMeta = array (
    'moduleMain' => 'C_Ticket',
    'varName' => 'C_Ticket',
    'orderBy' => 'c_ticket.date_entered',
    'whereClauses' => array (
  'name' => 'c_ticket.name',
),
    'searchInputs' => array (
  0 => 'c_ticket_number',
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
  'PAX_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PAX_NAME',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'pax_name',
  ),
  'TOUR' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOUR',
    'width' => '10%',
    'default' => true,
    'name' => 'tour',
  ),
  'CATEGORY' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY',
    'width' => '10%',
    'name' => 'category',
  ),
  'SUPPLIER' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUPPLIER',
    'width' => '10%',
    'name' => 'supplier',
  ),
  'C_BOOKINGTICKET_C_TICKET_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_BOOKINGTICKET_C_TICKET_1_FROM_C_BOOKINGTICKET_TITLE',
    'id' => 'C_BOOKINGTICKET_C_TICKET_1C_BOOKINGTICKET_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'c_bookingticket_c_ticket_1_name',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
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
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
),
);
