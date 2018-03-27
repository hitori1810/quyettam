<?php
// created: 2015-02-05 03:10:52
$dictionary["C_WorkLog"]["fields"]["project_c_worklog_1"] = array (
  'name' => 'project_c_worklog_1',
  'type' => 'link',
  'relationship' => 'project_c_worklog_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'side' => 'right',
  'vname' => 'LBL_PROJECT_C_WORKLOG_1_FROM_C_WORKLOG_TITLE',
  'id_name' => 'project_c_worklog_1project_ida',
  'link-type' => 'one',
);
$dictionary["C_WorkLog"]["fields"]["project_c_worklog_1_name"] = array (
  'name' => 'project_c_worklog_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECT_C_WORKLOG_1_FROM_PROJECT_TITLE',
  'save' => true,
  'id_name' => 'project_c_worklog_1project_ida',
  'link' => 'project_c_worklog_1',
  'table' => 'project',
  'module' => 'Project',
  'rname' => 'name',
);
$dictionary["C_WorkLog"]["fields"]["project_c_worklog_1project_ida"] = array (
  'name' => 'project_c_worklog_1project_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECT_C_WORKLOG_1_FROM_C_WORKLOG_TITLE_ID',
  'id_name' => 'project_c_worklog_1project_ida',
  'link' => 'project_c_worklog_1',
  'table' => 'project',
  'module' => 'Project',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
