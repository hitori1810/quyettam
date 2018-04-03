<?php

    class C_DetailViewEditableConfigViewAjaxLoadConfig extends SugarView {

        function C_DetailViewEditableConfigViewAjaxLoadConfig() {
            parent::SugarView();
        }

        function display() { 
            if(isset($_POST['moduleName']) && !empty($_POST['moduleName'])) {
                // Get config that is active
                $data = new C_DetailViewEditableConfig();
                $data->retrieve_by_string_fields(
                    array(
                        'target_module' => $_POST['moduleName'],
                        'is_active' => 1
                    )
                );
                
                $config = array(
                    'configType' => $data->config_type,
                    'targetFields' => json_decode(html_entity_decode($data->target_fields)),           
                );    
                
                echo json_encode($config); 
            }

            parent::display();
        }

    }
?>
