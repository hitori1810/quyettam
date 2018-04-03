<?php
    class JsLanguageGenerator{
        
        function generateJsLanguage($event, $arguments){
            // AfterUIFrame
            $excludeModules = array('Reports', 'Administration', 'ModuleBuilder', 'Configurator', 'Import');
            $excludeActions = array('Popup', 'favorites', 'modulelistmenu', 'DynamicAction', 'CallMethodDashlet', 'CheckDeletable');
            $excludeParams = array('sugar_body_only', 'entryPoint');
            
            $hasExcludedParam = false;
            foreach($excludeParams as $i => $param) {
                if(isset($_REQUEST[$param])) {
                    $hasExcludedParam = true; 
                    break;
                }
            }
            
            // Execute the lines below only if there is nothing in the excluded arrays
            if(!in_array($_REQUEST['module'], $excludeModules) && !in_array($_REQUEST['action'], $excludeActions) && !$hasExcludedParam){
                $strJS = '<script type="text/javascript">';
                $moduleList = $GLOBALS['moduleList'];
                $current_language = $GLOBALS['current_language'] ;
                $json = getJSONobj();
                for($i=0 ;$i < count($moduleList); $i++){
                    $moduleName = $moduleList[$i];
                    if(!empty($moduleName)) {
                        $moduleLanguage = return_module_language($current_language,$moduleName,true);
                        $mod_strings_encoded = $json->encode($moduleLanguage);
                        $strJS .= "SUGAR.language.languages['$moduleName']=$mod_strings_encoded;";
                    }
                }
                $strJS .= '</script>';
                echo $strJS;
            }

        }                        
    }
?>