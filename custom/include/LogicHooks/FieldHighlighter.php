<?php

    class FieldHighlighter {

        function highlightFields (&$bean, $event, $arguments) {
            // ProcessRecord
            
            if($_REQUEST['action'] != 'Popup'){
                // Get the enabled config for current module if any
                global $db;
                $sql = 'SELECT target_fields FROM c_fieldhighlighter WHERE target_module = "'. $bean->module_name .'" AND is_active = 1 AND deleted = 0';
                $result = $db->query($sql);
                $row = $db->fetchByAssoc($result);
                
                if(!empty($row)) {
                    // Return config that has target fields only
                    $data = html_entity_decode($row['target_fields']);
                    $data = json_decode($data, true);
                    
                    if(!empty($data)) {
                        global $current_user;
                        
                        $isPerson = isset($bean->full_name);
                        $showFullName = (isset($bean->full_name) && !empty($bean->full_name)) ? true : false;
                        $nameFormat = $current_user->getPreference('locale_name_format');
                        $nameFields = $this->convertNameFormatToFieldNames($nameFormat);
                        
                        // Apply the selected style for each field
                        foreach($data as $fieldName => $config) {
                            if(!empty($bean->$fieldName)) {
                                if($isPerson && $showFullName && isset($data['name'])) {
                                    // Wrap highlight span using begin and end fields
                                    $beginNameField = current($nameFields);
                                    $endNameField = end($nameFields);
                                    $bean->$beginNameField = '<span class="highlight_'. $data['name']['applied_style'] .'">'. $bean->$beginNameField;        
                                    $bean->$endNameField = $bean->$endNameField .'</span>';        
                                } else {
                                    $bean->$fieldName = '<span class="highlight_'. $config['applied_style'] .'">'. $bean->$fieldName .'</span>';    
                                }
                            }
                        }
                    }    
                }
            }
        } 
        
        // Util fucntion to get the field name from name format
        private function convertNameFormatToFieldNames($nameFormat) {
            $nameFormat = str_replace(array('s', ','), '', $nameFormat);
            $keys = explode(' ', $nameFormat);
            
            $fieldNames = array();
            foreach($keys as $key) {
                switch($key) {
                    case 's': 
                        $fieldNames[] = 'salutation';
                        break;
                    case 'f': 
                        $fieldNames[] = 'first_name';
                        break;
                    case 'l': 
                        $fieldNames[] = 'last_name';
                        break;
                }     
            }        
            
            return $fieldNames;
        }
        
    }
?>