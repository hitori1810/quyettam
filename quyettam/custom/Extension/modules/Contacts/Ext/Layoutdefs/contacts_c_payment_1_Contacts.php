<?php
 // created: 2018-03-28 09:03:17
$layout_defs["Contacts"]["subpanel_setup"]['contacts_c_payment_1'] = array (
  'order' => 100,
  'module' => 'C_Payment',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_C_PAYMENT_1_FROM_C_PAYMENT_TITLE',
  'get_subpanel_data' => 'contacts_c_payment_1',
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
