<?php
 // created: 2015-02-06 14:00:49
$layout_defs["Project"]["subpanel_setup"]['project_users_1'] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'ForProject',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECT_USERS_1_FROM_USERS_TITLE',
  'get_subpanel_data' => 'project_users_1',
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
