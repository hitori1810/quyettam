<?php
 // created: 2015-03-24 09:10:32
$layout_defs["Contacts"]["subpanel_setup"]['contacts_c_bookingticket_1'] = array (
  'order' => 100,
  'module' => 'C_BookingTicket',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'get_subpanel_data' => 'contacts_c_bookingticket_1',
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
