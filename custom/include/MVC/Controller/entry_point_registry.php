<?php

$entry_point_registry['getCallStatus'] = array('file' => 'custom/modules/Asterisk/include/getCallStatus.php', 'auth' => true);

    $entry_point_registry['ajaxLoadItems'] = array('file' => 'custom/include/utils/AjaxLoadItems.php' , 'auth' => '1');
    $entry_point_registry['ajaxChangeDate'] = array('file' => 'custom/modules/Opportunities/ajaxChangeDate.php' , 'auth' => '1');
    $entry_point_registry['getRelateField'] = array('file' => 'custom/include/utils/getRelateField.php' , 'auth' => '1');

    $entry_point_registry['AutoCreateGradeBook'] = array('file' => 'custom/modules/C_Gradebook/cron_auto_create.php' , 'auth' => '1');

    $entry_point_registry['Monitor'] = array('file' => 'custom/modules/C_Attendance/attendanceMonitor.php' , 'auth' => '1');
    $entry_point_registry['AjaxMonitor'] = array('file' => 'custom/modules/C_Attendance/ajax_post_code.php' , 'auth' => '1');

    $entry_point_registry['Calculate_expire_date'] = array('file' => 'custom/modules/C_Classes/cron_expire_date.php' , 'auth' => '1');
    $entry_point_registry['updateClosedClass'] = array('file' => 'custom/modules/C_Classes/cron_closedate.php' , 'auth' => '1');

    $entry_point_registry['SendingData'] = array('file' => 'custom/include/utils/SendingData.php' , 'auth' => '0');
    $entry_point_registry['quickEditAdmin'] = array('file' => 'custom/include/utils/quickEditAdmin.php' , 'auth' => '1');
                
    $entry_point_registry['GetJSLanguage'] = array('file' => 'custom/include/utils/GetJSLanguage.php' , 'auth' => false);

    $entry_point_registry['getAvatar'] = array('file' => 'getAvatar.php', 'auth' => false);
    $entry_point_registry['api'] = array('file' => 'api/api.php', 'auth' => false);
    $entry_point_registry['downloadExportFile'] = array('file' => 'custom/uploads/exportExcel/downloadExportFile.php', 'auth' => false);
?>
