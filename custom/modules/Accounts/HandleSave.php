<?php
    class HandleSaveAccount{
        //After Save
        function handleSave($bean, $event, $args){
            $sql = "update `accounts` SET team_id = 1, team_set_id = 1 WHERE id = '$bean->id'";
            $result = $GLOBALS['db']->query($sql);
        }
        
       function beforeDelete($bean, $event, $args) {
            /*   $sql = "update `accounts` SET team_id = 1, team_set_id = 1 WHERE id = '$bean->id'";
               
                $sql = "update `accounts` SET team_id = 1, team_set_id = 1 WHERE id = '$bean->id'";     */
        }  
    }
?>
