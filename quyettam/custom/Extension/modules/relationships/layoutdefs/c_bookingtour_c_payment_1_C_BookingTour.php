<?php
 // created: 2015-05-18 16:01:45
$layout_defs["C_BookingTour"]["subpanel_setup"]['c_bookingtour_c_payment_1'] = array (
  'order' => 100,
  'module' => 'C_Payment',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_1_FROM_C_PAYMENT_TITLE',
  'get_subpanel_data' => 'c_bookingtour_c_payment_1',
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
