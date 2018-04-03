<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_ui_frame'] = Array(); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(1, 'get Desciption content', 'custom/include/LogicHooks/RowsHighlighter.php','RowsHighlighter', 'getlastContentForDescription'); 
$hook_array['process_record'][] = Array(1000, 'Highlight fields', 'custom/include/LogicHooks/FieldHighlighter.php','FieldHighlighter', 'highlightFields'); 
$hook_array['process_record'][] = Array(10000, 'Highlight codes', 'custom/modules/Accounts/CodeHighlighter.php','CodeHighlighter', 'highlightCode'); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Auto Increment Code', 'modules/C_ConfigID/AddCode.php','Code', 'addCode'); 
$hook_array['before_save'][] = Array(1, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 

$hook_array['after_save'] = Array();     
$hook_array['after_save'][] = Array(1, 'HandleSave', 'custom/modules/Accounts/HandleSave.php','HandleSaveAccount', 'handleSave'); 

$hook_array['before_delete'] = Array();     
$hook_array['before_delete'][] = Array(1, 'HandleSave', 'custom/modules/Accounts/HandleSave.php','HandleSaveAccount', 'beforeDelete'); 


?>