<?php
    class HandleSaveContact {
        //before_save
        function beforeSave($bean, $event, $arguments) {
            $bean->fullname = $bean->salutation." ".$bean->first_name." ".$bean->last_name;
            //Add team global to team set
            $bean->load_relationship('teams');
            $bean->teams->add("1"); 
        }  
        function updateDOB(&$bean, $event, $arguments) {
            if($bean->birthday) {
                $bean->birthday = substr($bean->birthday,0,10);
                $dob = explode('/',$bean->birthday);
                if(!empty($dob)) {
                    $bean->dob_day = $dob[0];
                    $bean->dob_month = $dob[1];
                    $bean->dob_year = $dob[2];
                    $bean->dob_date = "{$bean->dob_year}-{$bean->dob_month}-{$bean->dob_day}";
                }
            }
        }          
    }


?>