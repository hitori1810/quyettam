<?php

    require_once("custom/modules/C_DetailViewEditableConfig/DetailViewEditableConfigHelper.php");
    
    class C_DetailViewEditableConfigViewDetail extends ViewDetail {

        function C_DetailViewEditableConfigViewDetail() {
            parent::ViewDetail();
        }

        function display() {
            $moduleName = $this->bean->target_module;
            $targetFields = json_decode(html_entity_decode($this->bean->target_fields));
            
            // Get label for each fields
            $fields = '<ul>';
            foreach($targetFields as $fieldName) {
                $fields .= '<li>'. DetailViewEditableConfigHelper::getLabel($moduleName, $fieldName) .'</li>';   
            }
            $fields .= '</ul>'; 
            
            $this->bean->target_fields = $fields;

            parent::display();
        }

    }
?>
