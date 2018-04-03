<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Add Auto-Increment Code', 'modules/C_ConfigID/AutoCode.php','AutoCode', 'addCode'); 
$hook_array['before_save'][] = Array(2, 'Handle save', 'custom/modules/C_BookingTour/handle_save.php','BookingTour', 'handleSave'); 
                                                         


?>