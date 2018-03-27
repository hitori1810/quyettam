<?php
 // created: 2015-09-24 09:18:49
$layout_defs["Contacts"]["subpanel_setup"]['contacts_c_tour_1'] = array (
  'order' => 100,
  'module' => 'C_Tour',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_C_TOUR_1_FROM_C_TOUR_TITLE',
  'get_subpanel_data' => 'contacts_c_tour_1',
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
