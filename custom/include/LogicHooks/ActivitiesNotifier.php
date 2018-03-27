<?php
    class ActivitiesNotifier{
        /**
        * function create Activities notify use when after save call/meeting/case/task
        * 
        * @param mixed $bean
        * @param mixed $event
        * @param mixed $arguments
        * @author Hai Nguyen
        */
        function createActivitiesNotify(&$bean,$event, $arguments){
            if($_REQUEST['record'] != '' || empty($_REQUEST['record'])){
                $notification = new Notifications();
                $notification->is_read = 0;
                $notification->parent_type = $bean->module_name;
                $notification->parent_id = $bean->id;
                $notification->assigned_user_id = $bean->assigned_user_id;
                $notification->name = $bean->name;
                $notification->save();
            }
        }
    }
?>
