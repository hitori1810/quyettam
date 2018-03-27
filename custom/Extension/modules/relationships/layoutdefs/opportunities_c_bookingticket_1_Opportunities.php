<?php
 // created: 2015-05-16 16:24:10
$layout_defs["Opportunities"]["subpanel_setup"]['opportunities_c_bookingticket_1'] = array (
  'order' => 100,
  'module' => 'C_BookingTicket',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'get_subpanel_data' => 'opportunities_c_bookingticket_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
