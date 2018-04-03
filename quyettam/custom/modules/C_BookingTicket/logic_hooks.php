<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(2, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 
$hook_array['before_save'][] = Array(4, 'Document ID', 'custom/modules/C_BookingTicket/custom_code_doc_id.php','Code1', 'addCode1');
//$hook_array['before_save'][] = Array(5, 'Booking ID', 'custom/modules/C_BookingTicket/custom_booking_id.php','Code2', 'addCode2');  
$hook_array['before_save'][] = Array(10, 'Handle save for ticket', 'custom/modules/C_BookingTicket/ticket.php','ticket', 'handleSaveTicket'); 
$hook_array['before_delete'] = Array(); 
$hook_array['before_delete'][] = Array(1, 'Handle delete', 'custom/modules/C_BookingTicket/ticket.php','ticket', 'handleDelete'); 
?>