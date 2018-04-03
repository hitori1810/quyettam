<?php
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
