<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Auto Increment Code', 'modules/C_ConfigID/AddCode.php','Code', 'addCode'); 
$hook_array['before_save'][] = Array(2, 'Handle save for Room', 'custom/modules/C_BookingHotel/room.php','Room', 'handleSaveRoom'); 
$hook_array['before_save'][] = Array(1, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 
$hook_array['before_delete'] = Array(); 
$hook_array['before_delete'][] = Array(10, 'Handle delete Room', 'custom/modules/C_BookingHotel/room.php','Room', 'handleDeleteRoom'); 



?>