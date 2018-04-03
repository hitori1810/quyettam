<?php

    class DetailViewEditableConfigHelper {

        // Field name, types and sources that will not be used to check for dupplication
        static $excludeSources = array('non-db');
        static $excludeTypes = array('id');
        static $excludeFields = array(
            'webtolead_email1', 'webtolead_email2', 'webtolead_email_opt_out', 'webtolead_invalid_email',
            'primary_address_district', 'primary_address_street_2', 'primary_address_street_3',
            'alt_address_district', 'alt_address_street_2', 'alt_address_street_3', 
            'billing_address_street_2', 'billing_address_street_3', 'billing_address_street_4',
            'shipping_address_street_2', 'shipping_address_street_3', 'shipping_address_street_4',
            'email_opt_out', 'invalid_email', 'email_addresses_non_primary', 'email1', 'email2'
            // ADD MORE FIELDS HERE
        );
        
        // Get field list array: field_name => field_label
        public function getFieldList($moduleName) {
            global $beanList, $dictionary;
            
            // Available fields
            $beanName = $beanList[$moduleName];
            $fieldList = $dictionary[$beanName]['fields'];  
            $fieldListArr = array();
            foreach ($fieldList as $fieldName => $fieldDef) {
                if(!in_array($fieldDef['name'], self::$excludeFields) && !in_array($fieldDef['type'], self::$excludeTypes)) {
                    $label = self::getLabel($moduleName, $fieldName);
                    
                    if(isset($fieldDef['source']) && in_array($fieldDef['source'], $excludeSources))
                        $label = '';    // Don't get the field that is in the exclude sources list
                    
                    if(!empty($label))  // Don't get the empty label
                        $fieldListArr[$fieldName] = $label;
                }
            }
            
            return $fieldListArr;
        }
        
        // Get label of any fields in any modules
        public function getLabel($moduleName, $fieldName) {
            global $dictionary, $current_language, $beanList, $app_strings;
            $modStrings = return_module_language($current_language, $moduleName, true);
            $beanName = $beanList[$moduleName];
            $fieldList = $dictionary[$beanName]['fields'];
            $fieldDefs = $fieldList[$fieldName];
            
            // Use friendly field label if it is defined
            $label = '';
            if (isset($fieldDefs['vname'])) {
                $label = $fieldDefs['vname'];
                
                // If the label is in the mod strings then get it
                if (isset($modStrings[$fieldDefs['vname']]))
                    $label = $modStrings[$fieldDefs['vname']];
                // Otherwise, search it in app strings
                else if(isset($app_strings[$fieldDefs['vname']]))
                    $label = $app_strings[$fieldDefs['vname']];
                    
                $label = str_replace(':', '', $label);  // Remove colon from the label if any
            }
            
            return $label;    
        }
    }
?>
