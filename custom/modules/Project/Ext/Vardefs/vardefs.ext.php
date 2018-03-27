<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-03 12:31:14
$dictionary["Project"]["fields"]["projecttask_project_1"] = array (
  'name' => 'projecttask_project_1',
  'type' => 'link',
  'relationship' => 'projecttask_project_1',
  'source' => 'non-db',
  'module' => 'ProjectTask',
  'bean_name' => 'ProjectTask',
  'vname' => 'LBL_PROJECTTASK_PROJECT_1_FROM_PROJECTTASK_TITLE',
  'id_name' => 'projecttask_project_1projecttask_ida',
);


// created: 2015-02-05 03:10:52
$dictionary["Project"]["fields"]["project_c_worklog_1"] = array (
  'name' => 'project_c_worklog_1',
  'type' => 'link',
  'relationship' => 'project_c_worklog_1',
  'source' => 'non-db',
  'module' => 'C_WorkLog',
  'bean_name' => 'C_WorkLog',
  'vname' => 'LBL_PROJECT_C_WORKLOG_1_FROM_PROJECT_TITLE',
  'id_name' => 'project_c_worklog_1project_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-02-06 14:00:49
$dictionary["Project"]["fields"]["project_users_1"] = array (
  'name' => 'project_users_1',
  'type' => 'link',
  'relationship' => 'project_users_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_PROJECT_USERS_1_FROM_USERS_TITLE',
  'id_name' => 'project_users_1users_idb',
);

?>