<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Leads push feed', 'modules/Leads/SugarFeeds/LeadFeed.php','LeadFeed', 'pushFeed'); 
$hook_array['before_save'][] = Array(2, 'generate dob', 'custom/modules/Leads/LeadLogicHooks.php','LeadLogicHooks', 'updateDOB'); 
$hook_array['before_save'][] = Array(1, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 
$hook_array['before_save'][] = Array(101, 'Add Auto-Increment Code', 'modules/C_ConfigID/AutoCode.php','AutoCode', 'addCode');  
$hook_array['before_save'][] = Array(102, 'HandleSave', 'custom/modules/Leads/handle_save.php','HandleSaveLead', 'HandleSave');  
$hook_array['after_ui_frame'] = Array(); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'Handle Save to Opportunity', 'custom/modules/Leads/LeadLogicHooks.php','LeadLogicHooks', 'handleSaveOpportunity'); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(0, 'Color Status', 'custom/modules/Leads/listview_color.php','ListviewLogicHookLead', 'listviewcolor'); 
$hook_array['process_record'][] = Array(1, 'get Desciption content', 'custom/include/LogicHooks/RowsHighlighter.php','RowsHighlighter', 'getlastContentForDescription'); 
//$hook_array['process_record'][] = Array(2, 'Highlight fields', 'custom/include/LogicHooks/FieldHighlighter.php','FieldHighlighter', 'highlightFields'); 
$hook_array['process_record'][] = Array(10000, 'Highlight codes', 'custom/modules/Accounts/CodeHighlighter.php','CodeHighlighter', 'highlightCode'); 



?>