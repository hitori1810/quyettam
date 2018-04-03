<?php
// created: 2015-02-04 14:39:39
$dictionary["C_WorkLog"]["fields"]["projecttask_c_worklog_1"] = array (
  'name' => 'projecttask_c_worklog_1',
  'type' => 'link',
  'relationship' => 'projecttask_c_worklog_1',
  'source' => 'non-db',
  'module' => 'ProjectTask',
  'bean_name' => 'ProjectTask',
  'side' => 'right',
  'vname' => 'LBL_PROJECTTASK_C_WORKLOG_1_FROM_C_WORKLOG_TITLE',
  'id_name' => 'projecttask_c_worklog_1projecttask_ida',
  'link-type' => 'one',
);
$dictionary["C_WorkLog"]["fields"]["projecttask_c_worklog_1_name"] = array (
  'name' => 'projecttask_c_worklog_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECTTASK_C_WORKLOG_1_FROM_PROJECTTASK_TITLE',
  'save' => true,
  'id_name' => 'projecttask_c_worklog_1projecttask_ida',
  'link' => 'projecttask_c_worklog_1',
  'table' => 'project_task',
  'module' => 'ProjectTask',
  'rname' => 'name',
);
$dictionary["C_WorkLog"]["fields"]["projecttask_c_worklog_1projecttask_ida"] = array (
  'name' => 'projecttask_c_worklog_1projecttask_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECTTASK_C_WORKLOG_1_FROM_C_WORKLOG_TITLE_ID',
  'id_name' => 'projecttask_c_worklog_1projecttask_ida',
  'link' => 'projecttask_c_worklog_1',
  'table' => 'project_task',
  'module' => 'ProjectTask',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
