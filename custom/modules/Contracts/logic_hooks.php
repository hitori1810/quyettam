<?php
  //  //Add logic hook - 15/07/2014 - by MTN
    $hook_version = 1;
    $hook_array = Array();
    $hook_array['before_save'] = Array();
    $hook_array['before_save'][] = Array(1, 'Calculate Paid Amount', 'custom/modules/Contracts/handleContract.php','handleContract', 'beforeSaveContract');
    $hook_array['before_delete'] = Array();
    $hook_array['before_delete'][] = Array(2, 'Delete Contract', 'custom/modules/Contracts/handleContract.php','handleContract', 'deletedContract');
    $hook_array['process_record'] = Array();
    $hook_array['process_record'][] = Array(1, 'Color', 'custom/modules/Contracts/handleContract.php','handleContract', 'listviewColor');

    ?>