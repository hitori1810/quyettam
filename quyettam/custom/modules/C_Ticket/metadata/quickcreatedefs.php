<?php
$module_name = 'C_Ticket';
$viewdefs[$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/C_Ticket/js/quickcreate.js',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'pax_name',
            'label' => 'LBL_PAX_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'c_bookingticket_c_ticket_1_name',
            'label' => 'LBL_C_BOOKINGTICKET_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'airline',
            'label' => 'LBL_AIRLINE',
          ),
          1 => 
          array (
            'name' => 'supplier',
            'studio' => 'visible',
            'label' => 'LBL_SUPPLIER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'booking_code',
            'label' => 'LBL_BOOKING_CODE',
          ),
          1 => 
          array (
            'name' => 'tour',
            'label' => 'LBL_TOUR',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'class',
            'studio' => 'visible',
            'label' => 'LBL_CLASS',
          ),
          1 => 
          array (
            'name' => 'routing',
            'label' => 'LBL_ROUTING',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'fare_basic',
            'label' => 'LBL_FARE_BASIC',
          ),
          1 => 
          array (
            'name' => 'gateway',
            'label' => 'LBL_GATEWAY',
          ),
        ),
      ),
    ),
  ),
);
