<?php
 // created: 2015-03-24 09:12:26
$layout_defs["Accounts"]["subpanel_setup"]['accounts_c_bookingticket_1'] = array (
  'order' => 100,
  'module' => 'C_BookingTicket',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'get_subpanel_data' => 'accounts_c_bookingticket_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
