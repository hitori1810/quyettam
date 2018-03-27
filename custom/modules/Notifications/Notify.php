<?php
    /**
    * Create to process Notification
    * @author   Hai Nguyen
    */
    class Notify{
        /**
        * Function get All Active not done
        * 
        */
        function getEmailCallMeetingTaskNotification(){
            $now = date('Y-m-d H:i:s');
            $query = "SELECT id , NAME, 'Calls' AS module_name  FROM calls WHERE date_start < '".$now."' AND deleted = 0 AND STATUS ='Planned'   AND assigned_user_id = '".$GLOBALS['current_user']->id."' AND id NOT IN(SELECT parent_id FROM notifications WHERE is_read ='0' AND parent_type='Calls')  
            UNION ALL
            SELECT id , NAME, 'Meetings' AS module_name  FROM meetings WHERE date_start < '".$now."' AND deleted = 0 AND STATUS ='Planned'  AND assigned_user_id = '".$GLOBALS['current_user']->id."' AND id NOT IN(SELECT parent_id FROM notifications WHERE is_read ='0' AND parent_type='Meetings')  
            UNION ALL 
            SELECT id , NAME, 'Tasks' AS module_name  FROM tasks WHERE deleted = 0 AND STATUS IN(\"Not Started\",\"In Progress\")  AND assigned_user_id = '".$GLOBALS['current_user']->id."' AND id NOT IN(SELECT parent_id FROM notifications WHERE is_read ='0' AND parent_type='Tasks')  
            UNION ALL
            SELECT id , NAME, 'Cases' AS module_name  FROM cases WHERE deleted = 0 AND STATUS IN(\"New\",\"Assigned\")  AND assigned_user_id = '".$GLOBALS['current_user']->id."' AND id NOT IN(SELECT parent_id FROM notifications WHERE is_read ='0' AND parent_type='Cases')  
            UNION ALL 
            SELECT id, NAME, 'Emails' AS module_name FROM emails WHERE deleted = 0 AND STATUS = 'unread'  AND assigned_user_id = '".$GLOBALS['current_user']->id."' ORDER BY module_name";

            $result = $GLOBALS['db']->query($query);
            $data = array();
            if($GLOBALS['db']->getRowCount($result)>0){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        
       /**
       * Function get All new notify
       * @author Hai Nguyen  
       */
        function getNewNotify(){
            $query = "SELECT
            id, 
            parent_type,
            parent_id 
            FROM
            notifications 
            WHERE deleted = 0 
            AND assigned_user_id = '".$GLOBALS['current_user']->id."' 
            AND is_read = '0' 
            ORDER BY parent_type DESC";
            $result = $GLOBALS['db']->query($query);
            $data = array();
            if($GLOBALS['db']->getRowCount($result)>0){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $object = $GLOBALS['beanList'][$row['parent_type']];
                    if ($object == 'aCase') $object = 'aCase';
                    $bean = new $object();
                    $table = $bean->table_name;
                    if($table == 'calls' || $table == 'meetings'){
                        $where = " AND status = 'Planned'";
                    }
                    elseif($table =='tasks'){
                        $where = " AND status = 'Not Started'";
                    }
                    elseif($table=='cases'){
                        $where = " AND status ='New'";
                    }
                    $select = "SELECT NAME FROM ".$table." WHERE deleted =0 AND id ='".$row['parent_id']."' ".$where;
                    $result1 = $GLOBALS['db']->query($select);
                    if($GLOBALS['db']->getRowCount($result1)>0) {
                        $row1 = $GLOBALS['db']->fetchByAssoc($result1); 
                        $data[] = array('notify_id' => $row['id'], 'module_name' => $row['parent_type'] ,'record_id' => $row['parent_id'],'record_name' => $row1['NAME']);   
                    }
                }
            }
            return $data;
        }
        
        /**
        * function get account birthday, contact birthday
        * 
        */
        function getAccountContactBirthday(){
            $year = date('Y');
            $query = "SELECT id, NAME ,'Accounts' module_name
            FROM
            accounts 
            WHERE deleted = 0 
            AND DATEDIFF(STR_TO_DATE(DATE_FORMAT(birthdate, '".$year."-%m-%d'), '%Y-%m-%d'), NOW()) <7
           -- AND DATEDIFF(DATE(CONCAT(YEAR(NOW()), '-', select_month_dob, '-', select_day_dob)), DATE(NOW())) <=  7 
           -- AND DATEDIFF(DATE(CONCAT(YEAR(NOW()), '-', month_dob, '-', day_dob) ), DATE(NOW())) >0 
            AND DATEDIFF(STR_TO_DATE(DATE_FORMAT(birthdate, '".$year."-%m-%d'), '%Y-%m-%d'), NOW()) >=0
            AND assigned_user_id = '".$GLOBALS['current_user']->id."'
            UNION ALL
            SELECT id, CONCAT(IFNULL(first_name,''),' ',IFNULL(last_name,'')) NAME, 'Contacts' module_name
            FROM
            contacts 
            WHERE deleted = 0 
            AND DATEDIFF(STR_TO_DATE(DATE_FORMAT(birthdate, '".$year."-%m-%d'), '%Y-%m-%d'), NOW()) <7 
            AND DATEDIFF(STR_TO_DATE(DATE_FORMAT(birthdate, '".$year."-%m-%d'), '%Y-%m-%d'), NOW()) >=0
            AND assigned_user_id = '".$GLOBALS['current_user']->id."' ";

            $result = $GLOBALS['db']->query($query);
            $data = array();
            if($GLOBALS['db']->getRowCount($result)>0){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $data[] = $row;
                }
            }
            return $data;
        }      
    }
?>