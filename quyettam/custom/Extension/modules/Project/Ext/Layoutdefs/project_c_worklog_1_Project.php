<?php
 // created: 2015-02-05 03:10:52
$layout_defs["Project"]["subpanel_setup"]['project_c_worklog_1'] = array (
  'order' => 100,
  'module' => 'C_WorkLog',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECT_C_WORKLOG_1_FROM_C_WORKLOG_TITLE',
  'get_subpanel_data' => 'project_c_worklog_1',
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
