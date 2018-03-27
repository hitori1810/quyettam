<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    
    class DetailViewEditableConfigLogicHooks {
        
        function showFriendlyModuleName(&$bean, $event, $arguments){
            // ProcessRecord
            
            if(!empty($bean->target_module)) {
                global $app_list_strings;
                $bean->target_module = $app_list_strings['moduleList'][$bean->target_module];
            }
        } 
        
        function showFriendlyFieldName(&$bean, $event, $arguments){
            // ProcessRecord
            
            if(!empty($bean->target_fields)) {
                require_once("custom/modules/C_DetailViewEditableConfig/DetailViewEditableConfigHelper.php");
                $moduleName = $bean->target_module;
                $targetFields = json_decode(html_entity_decode($bean->target_fields));
                
                // Get label for each fields
                $fields = array();
                foreach($targetFields as $fieldName) {
                    $fields[] = DetailViewEditableConfigHelper::getLabel($moduleName, $fieldName);   
                } 
                
                $bean->target_fields = join(', ', $fields);   
            }
        }
        
        function preventEditOrDeleteDefaultConfig(&$bean, $event, $arguments) {
            // ProcessRecord

            if($bean->target_module == 'C_DetailViewEditableConfig') {
                // Don't allow to edit or delete default config record
                $bean->name .= '<img src="themes/default/images/blank.gif" onload="var row = $(this).closest(\'tr\'); row.find(\'td:nth(0) .checkbox\').remove(); row.find(\'td:nth(2) a\').remove();">';
            }
        }
    }
?>
