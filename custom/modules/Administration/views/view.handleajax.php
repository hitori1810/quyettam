<?php
switch ($_POST['type']) {
    case 'ajaxSaveGeneralConfig':
        echo ajaxSaveGeneralConfig();
        break;   
}    

function ajaxSaveGeneralConfig(){      
    $admin = new Administration();  
    $admin->retrieveSettings();
    $admin->saveSetting('wellspring', 'default_mapping_parent', $_POST['default_mapping_parent']); 
    $admin->saveSetting('wellspring', 'default_mapping_lead', $_POST['default_mapping_lead']); 
    $admin->saveSetting('wellspring', 'default_mapping_prospect', $_POST['default_mapping_prospect']);

    return json_encode(array(
        "success" => 1,              
    ));
}
?>
