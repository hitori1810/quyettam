<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will
// be automatically rebuilt in the future.
 $hook_version = 1;
$hook_array = Array();
// position, file, function
$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(1, 'Save Relationship', 'custom/modules/Leads/logicLead.php','logicLead', 'saveRelationship');
$hook_array['before_save'][] = Array(2, 'Sugar Notifications', 'custom/modules/Leads/logicLead.php','logicLead', 'notify_lead');
$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'Color Status', 'custom/modules/Leads/logicLead.php','logicLead', 'listviewcolor');
$hook_array['process_record'][] = Array(2, 'get Desciption content', 'custom/include/LogicHooks/RowsHighlighter.php','RowsHighlighter', 'getlastContentForDescription');
$hook_array['after_ui_frame'] = Array();
$hook_array['after_ui_frame'][] = Array(1001, 'Include javascript files for Survey', 'modules/bc_survey/addSurveyJsInSupportModules.php','addSurveyJsInSupportModules', 'getSurveyScripts');
$hook_array['after_save'] = Array();
$hook_array['after_delete'] = Array();
$hook_array['before_delete'] = Array();



?>