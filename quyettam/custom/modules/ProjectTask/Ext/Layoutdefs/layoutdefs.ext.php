<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-02-04 14:39:39
$layout_defs["ProjectTask"]["subpanel_setup"]['projecttask_c_worklog_1'] = array (
  'order' => 100,
  'module' => 'C_WorkLog',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECTTASK_C_WORKLOG_1_FROM_C_WORKLOG_TITLE',
  'get_subpanel_data' => 'projecttask_c_worklog_1',
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


 // created: 2015-02-03 12:31:14
$layout_defs["ProjectTask"]["subpanel_setup"]['projecttask_project_1'] = array (
  'order' => 100,
  'module' => 'Project',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECTTASK_PROJECT_1_FROM_PROJECT_TITLE',
  'get_subpanel_data' => 'projecttask_project_1',
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

?>