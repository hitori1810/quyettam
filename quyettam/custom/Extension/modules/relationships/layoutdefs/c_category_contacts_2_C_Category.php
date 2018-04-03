<?php
 // created: 2015-03-20 18:05:16
$layout_defs["C_Category"]["subpanel_setup"]['c_category_contacts_2'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_CATEGORY_CONTACTS_2_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'c_category_contacts_2',
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
