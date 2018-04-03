<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'handle Import', 'custom/modules/C_Ticket/LogicHookFunctions.php','LogicHookFunction', 'handleImport'); 
$hook_array['before_save'][] = Array(10, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 
$hook_array['before_save'][] = Array(90, 'Auto Increment Code', 'modules/C_ConfigID/AddCode.php','Code', 'addCode'); 
$hook_array['before_save'][] = Array(101, 'Add Auto-Increment Code', 'modules/C_ConfigID/AutoCode.php','AutoCode', 'addCode'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'Handle refund', 'custom/modules/C_Ticket/LogicHookFunctions.php','LogicHookFunction', 'handleRefund'); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(1, 'Detect Orginal Ticket', 'custom/modules/C_Ticket/OrginalTicket.php','OrginalTicket', 'detectOrginalTicket'); 



?>