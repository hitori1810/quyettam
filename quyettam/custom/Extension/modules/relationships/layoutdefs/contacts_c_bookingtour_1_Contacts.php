<?php
 // created: 2015-03-05 14:21:35
$layout_defs["Contacts"]["subpanel_setup"]['contacts_c_bookingtour_1'] = array (
  'order' => 100,
  'module' => 'C_BookingTour',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE',
  'get_subpanel_data' => 'contacts_c_bookingtour_1',
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
