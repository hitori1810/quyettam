<?php

    require_once("custom/modules/C_DetailViewEditableConfig/DetailViewEditableConfigHelper.php");
    
    class C_DetailViewEditableConfigViewAjaxLoadAvailableFields extends SugarView {

        function C_DetailViewEditableConfigViewAjaxLoadAvailableFields() {
            parent::SugarView();
        }

        function display() {
            if(isset($_POST['moduleName']) && !empty($_POST['moduleName'])) {
                // Generate available field array
                $fieldList = @DetailViewEditableConfigHelper::getFieldList($_POST['moduleName']);  
                $availableFieldArr = array();
                foreach($fieldList as $fieldName => $label) {
                    $availableFieldArr[] = array(
                        'field_name' => $fieldName, 
                        'label' => $label
                    ); 
                }
                
                echo json_encode($availableFieldArr); 
            }

            parent::display();
        }

    }
?>
