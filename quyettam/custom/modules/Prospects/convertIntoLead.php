<?php
    class convertIntoLeadC {
        function convertIntoLeadF(&$bean, $event, $arguments) {
            if($bean->status == 'Converted'){
                if (isset($bean->converted) && $bean->converted != 1  && empty($bean->lead_id)) {
                    $bean->converted = 1;
                    $lead = new Lead();
                    foreach ($lead->field_defs as $keyField => $aFieldName) {
                        $lead->$keyField = $bean->$keyField;
                    }
                    $lead->id = '';
                    $lead->status = 'Assigned';
                    $lead->save();
                    $bean->lead_id = $lead->id;
                    $bean->save();
                }    
            }

        }  
    }

?>
