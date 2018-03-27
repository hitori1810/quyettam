<?php
    class SessionLogicHook {
        function updateCustomerId(&$bean, $event, $arg) {
            if($bean->name == '') {
                $bean->name = "SS".$GLOBALS['db']->getOne("SELECT count(*) FROM c_session");
            }
            if($bean->parent_type && $bean->parent_id) {                  
                if ($bean->parent_type == 'Contacts') {
                    $customer = new Contact();
                    $customer->retrieve($bean->parent_id);
                    $bean->customer_email = $customer->email1; 
                    $bean->customer_phone = $customer->phone_mobile;
                    
                    $bean->contact_id = $bean->parent_id; 
                    $bean->lead_id = ''; 
                } else if ($bean->parent_type == 'Leads') {
                    $customer = new Lead();
                    $customer->retrieve($bean->parent_id);
                    $bean->customer_email = $customer->email1; 
                    $bean->customer_phone = $customer->phone_mobile;
                    
                    $bean->lead_id = $bean->parent_id; 
                    $bean->contact_id = ''; 
                } 
            } else {
                $bean->lead_id = ''; 
                $bean->contact_id = ''; 
            }
        }
    }
?>
