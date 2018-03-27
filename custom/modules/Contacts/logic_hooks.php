<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Auto Increment Code', 'modules/C_ConfigID/AddCode.php','Code', 'addCode'); 
$hook_array['before_save'][] = Array(2, 'generate dob', 'custom/modules/Contacts/HandleSave.php','HandleSaveContact', 'updateDOB'); 

$hook_array['before_save'][] = Array(3, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 
$hook_array['before_save'][] = Array(5, 'Save Team', 'custom/modules/Contacts/HandleSave.php','HandleSaveContact', 'beforeSave'); 
$hook_array['before_save'][] = Array(101, 'Add Auto-Increment Code', 'modules/C_ConfigID/AutoCode.php','AutoCode', 'addCode'); 

$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(1, 'get Desciption content', 'custom/include/LogicHooks/RowsHighlighter.php','RowsHighlighter', 'getlastContentForDescription'); 
$hook_array['process_record'][] = Array(10, 'Transfrom relationship_type to dropdown', 'custom/modules/Contacts/TransformDropdown.php','DropdownTransformer', 'transformDropdown'); 
$hook_array['process_record'][] = Array(10000, 'Highlight codes', 'custom/modules/Accounts/CodeHighlighter.php','CodeHighlighter', 'highlightCode'); 



?>