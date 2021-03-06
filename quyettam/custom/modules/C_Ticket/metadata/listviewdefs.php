<?php
$module_name = 'C_Ticket';
$listViewDefs[$module_name] = 
array (
  'document_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DOCUMENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'pax_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PAX_NAME',
    'width' => '10%',
    'default' => true,
    'link' => true,
  ),
  'category' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY',
    'width' => '10%',
  ),
  'supplier' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUPPLIER',
    'width' => '10%',
  ),
  'tour' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOUR',
    'width' => '10%',
    'default' => true,
  ),
  'c_bookingticket_c_ticket_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_BOOKINGTICKET_C_TICKET_1_FROM_C_BOOKINGTICKET_TITLE',
    'id' => 'C_BOOKINGTICKET_C_TICKET_1C_BOOKINGTICKET_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'class' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CLASS',
    'width' => '10%',
  ),
  'gateway' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_GATEWAY',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'accounts_c_ticket_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_C_TICKET_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_C_TICKET_1ACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
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
  ),
  'airline' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AIRLINE',
    'width' => '10%',
    'default' => false,
  ),
  'routing' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ROUTING',
    'width' => '10%',
    'default' => false,
  ),
  'dateline' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_DATELINE',
    'width' => '10%',
    'default' => false,
  ),
);
