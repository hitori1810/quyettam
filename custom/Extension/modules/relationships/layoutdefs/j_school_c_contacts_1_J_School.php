<?php
 // created: 2015-08-05 11:53:03
$layout_defs["J_School"]["subpanel_setup"]['j_school_c_contacts_1'] = array (
  'order' => 100,
  'module' => 'C_Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_J_SCHOOL_C_CONTACTS_1_FROM_C_CONTACTS_TITLE',
  'get_subpanel_data' => 'j_school_c_contacts_1',
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
