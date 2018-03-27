<?php
    /**
    * add By Trung Nguyen at 2015.02.04: helper for function timesheet
    */
    class TimeSheetHelper {

        /**
        * get all pulic holidays 
        * @return list holidays
        * 
        * Add by Trung Nguyen 2015.02.04 
        */
        function getHolidayDays() {
            $sql = "SELECT DISTINCT holiday_date FROM c_holiday WHERE deleted = 0";
            $result = $GLOBALS['db']->query($sql);
            $data = array();
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                $data[] = $row['holiday_date']; 
            }
            return $data;           
        }

        /**
        * get all log work date of user
        * 
        * @param mixed $id_user id of user
        * @return return array work dates of user.
        * 
        * Add by Trung Nguyen 2015.02.04
        */
        function getAllDaysLogWork($userId) {
            $sql = "SELECT DISTINCT apply_date FROM c_worklog WHERE deleted = 0 AND assigned_user_id = '$userId' ";
            $result = $GLOBALS['db']->query($sql);
            $data = array();
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                $data[] = $row['apply_date']; 
            }
            return $data; 
        }

        /**
        * get all log work date had overtime of user
        * 
        * @param mixed $id_user id of user
        * @return return array work dates of user.
        * 
        * Add by Trung Nguyen 2015.02.04
        */
        function getDaysHaveOvertime($userId) {
            $sql = "SELECT DISTINCT apply_date FROM c_worklog WHERE deleted = 0 AND assigned_user_id = '$userId' AND overtime = 1 ";
            $result = $GLOBALS['db']->query($sql);
            $data = array();
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                $data[] = $row['apply_date']; 
            }
            return $data; 
        }

        /**
        * get all worklog day list of user
        * 
        * @param mixed $userId
        * 
        * Add by Trung Nguyen 2015.02.07
        */
        function getWorkLogDays($userId) {
            $sql = "SELECT apply_date, MAX(overtime) as is_overtime FROM c_worklog 
            WHERE deleted = 0 AND assigned_user_id = '$userId' AND !ISNULL(apply_date) GROUP BY apply_date ";
            $result = $GLOBALS['db']->query($sql);
            $data = array();
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                $data[$row['apply_date']] = $row['is_overtime']; 
            }
            return $data; 
        }

        /**
        * function get list leaving days of user
        * 
        * @param mixed $userId
        * 
        * Add by Trung Nguyen 2015.02.05
        */
        function getLeavingDays($userId) {
            $sql = "SELECT a.leaving_date, SUM(a.total_day) as days
            FROM c_leavedetails a 
            INNER JOIN c_leavingrequest b ON a.leaving_id = b.id
            AND a.deleted = 0 AND b.deleted = 0
            WHERE b.assigned_user_id = '$userId' AND b.status = 'confirm' AND a.status = 'approval' AND b.leaving_type != 'plan'
            GROUP BY a.leaving_date
            ORDER BY a.leaving_date";

            return $GLOBALS['db']->fetchArray($sql);
        }

        /**
        * get all project of user
        * 
        * @param mixed $userId
        * 
        * Add by Trung Nguyen 2015.02.06
        */
        function getProjectListOfUser($userId) {
            $sql = "SELECT p.id,p.name FROM project p
            INNER JOIN project_users_1_c pu ON pu.deleted = 0 AND pu.project_users_1project_ida = p.id
            INNER JOIN users u ON u.deleted = 0 AND u.id = pu.project_users_1users_idb AND u.id = '$userId'
            WHERE p.deleted = 0";

            $data = array();
            $result = $GLOBALS['db']->query($sql);
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                $data[$row['id']] = $row['name']; 
            }
            return $data; 
        }

        /**
        * get project list of project
        * 
        * @param mixed $projectId
        * 
        * Add by Trung Nguyen 2015.02.06
        */
        function getProjectTaskListOfProject($projectId) {
            $sql = "SELECT pt.id,pt.name 
            FROM project_task pt
            INNER JOIN projecttask_project_1_c ptp ON ptp.deleted = 0 AND ptp.projecttask_project_1projecttask_ida = pt.id 
            INNER JOIN project p ON ptp.projecttask_project_1project_idb = p.id AND p.deleted = 0 AND p.id = '$projectId'
            WHERE pt.deleted = 0 ";

            $data = array();
            $result = $GLOBALS['db']->query($sql);
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                $data[$row['id']] = $row['name']; 
            }
            return $data; 
        }

        /**
        * get data worklog of user in date:
        * 
        * @param mixed $userId
        * @param mixed $date
        * 
        * Add by Trung Nguyen at 2015.02.09
        */
        function getWorkLogDataOfDate($userId,$date) {
            $sql = "SELECT wl.id, wl.apply_date, wl.assigned_user_id,wl.spent_time,wl.description,wl.overtime,
            pt.id as task_id, pt.name as task_name, p.id as project_id, p.name as project_name
            FROM c_worklog wl 
            INNER JOIN projecttask_c_worklog_1_c ptwl ON ptwl.deleted = 0 AND ptwl.projecttask_c_worklog_1c_worklog_idb = wl.id
            INNER JOIN project_task pt ON pt.deleted = 0 AND pt.id = ptwl.projecttask_c_worklog_1projecttask_ida
            INNER JOIN project_c_worklog_1_c pwl ON pwl.deleted = 0 AND pwl.project_c_worklog_1c_worklog_idb = wl.id
            INNER JOIN project p ON p.deleted = 0 AND p.id = pwl.project_c_worklog_1project_ida
            WHERE wl.apply_date = '$date' AND wl.deleted = 0 AND wl.assigned_user_id = '$userId' ";
            return $GLOBALS['db']->fetchArray($sql);
        }

        /**
        * get total spent time of user in month of this date
        * 
        * @param mixed $userId
        * @param mixed $date
        * 
        * Add by Trung Nguyen at 2015.02.09
        */
        function getTotalSpentTimeInMonthOfUser($userId,$date) {
            $month = date('m',strtotime($date));
            $year = date('Y',strtotime($date));
            $sql = "SELECT SUM(spent_time) FROM c_worklog WHERE assigned_user_id = '$userId' AND deleted = 0 AND MONTH(apply_date) = $month AND YEAR(apply_date) = $year ";
            return $GLOBALS['db']->getOne($sql);
        }

        /**
        * get total spent time of user in day of this date
        * 
        * @param mixed $userId
        * @param mixed $date
        * 
        * Add by Trung Nguyen at 2015.02.09
        */
        function getTotalSpentTimeInDayOfUser($userId,$date) {            
            $sql = "SELECT SUM(spent_time) FROM c_worklog WHERE assigned_user_id = '$userId' AND deleted = 0 AND apply_date = '$date' ";
            return $GLOBALS['db']->getOne($sql);
        }

        /**
        * get annual days of user in year
        * 
        * @param mixed $userId
        * @param mixed $year
        * 
        * Add by Trung Nguyen at 2015.02.25
        */
        function getAnnualDaysOfUser($userId,$year) {        
            $sql = "SELECT annual_leave_days FROM c_leaveday WHERE assigned_user_id = '$userId' AND deleted = 0 AND year = '$year' ";
            return $GLOBALS['db']->getOne($sql)?$GLOBALS['db']->getOne($sql):0 ;
        } 

        /**
        * get total leaved day of user in year.
        * 
        * @param mixed $userId
        * @param mixed $year
        * @param array reason of leaved
        * 
        * Add by Trung Nguyen at 2015.02.25
        */

        function getTotalLeavedDaysOfUser($userId,$year,$reasons) {
            //if(!isset($reasons)) $reasons = 'AnnualLeave';
            $sql = "SELECT SUM(a.total_day)
            FROM c_leavedetails a
            INNER JOIN c_leavingrequest b ON a.leaving_id = b.id AND b.deleted = 0 AND b.status = 'confirm' AND b.leaving_type = 'normal'
            WHERE a.assigned_user_id = '$userId' AND a.deleted = 0 AND a.status = 'approval'
            AND YEAR(a.leaving_date) = '$year' ";
            if(is_array($reasons)) {
                $sql.= " AND b.reason IN ('".implode("','",$reasons)."')" ;
            } else if (gettype($reasons) == 'string' && strlen(trim($reasons))) {
                $sql.= " AND b.reason = '$reasons' " ;
            }
            $days = $GLOBALS['db']->getOne($sql);
            return $days?$days: 0;
        }

        /**
        * return array leaving date and status of orther leaving
        * 
        * @param mixed user id
        * @param mixed leaving id
        * 
        * Add by Trung Nguyen 2015.02.26
        */
        function getOtherLeavingDaysOfUser($userId,$leaveRequestId) {
            $sql = "SELECT DISTINCT a.leaving_date, a.status 
            FROM c_leavedetails a
            INNER JOIN c_leavingrequest b ON a.leaving_id = b.id AND b.deleted = 0 
            AND b.status IN ('confirm','pending')
            WHERE a.deleted = 0 AND a.status IN ('approval','pending')
            AND b.id != '$leaveRequestId' AND b.leaving_type != 'plan'";             
            return $GLOBALS['db']->fetchArray($sql);
        }

        /**
        * function check this leaving request can approval by this approver
        * 
        * @param mixed Leaving Request
        * @param mixed approver Id
        */
        function checkCanApprovalRequest($leavingRequest, $approverId) {
            //if status is not pending, can not approval
            if($leavingRequest->status != 'pending') {
                return false;
            }
            //check if don't leaving date pending for this request, needn't approval
            $sql = "SELECT count(a.id)
            FROM c_leavedetails a
            INNER JOIN c_leavingrequest b ON a.leaving_id = b.id AND b.deleted = 0 AND b.id = '$leavingRequest->id'            
            WHERE a.deleted = 0 AND a.status = 'pending' ";
            if($GLOBALS['db']->getOne($sql) <= 0) {
                return false;
            }
            // if is Admin, can approval this
            $approver = new User();
            $approver->retrieve($approverId);
            if($approver->isAdmin()) {
                return true;
            }
            // check this approver can approval this request

            //end
            return false;
        } 

        /**
        * function check this leaving request can cancel by this user
        * 
        * @param mixed Leaving Request
        * @param mixed approver Id
        */
        function checkCanCancelRequest($leavingRequest, $userId) {   
            if(!in_array($leavingRequest->status,array('pending','approval'))) {
                return false;
            }
            if($leavingRequest->assigned_user_id != $userId ){
                return false;
            }
            $today = $GLOBALS['timedate']->to_db_date($GLOBALS['timedate']->now(),false);
            //if exist old date have approval  (pending)
            $sql = "SELECT count(a.id)
            FROM c_leavedetails a
            INNER JOIN c_leavingrequest b ON a.leaving_id = b.id AND b.deleted = 0 AND b.id = '$leavingRequest->id'            
            WHERE a.deleted = 0 AND a.status IN ('pending','approval') AND a.leaving_date < '$today' ";
            if($GLOBALS['db']->getOne($sql) > 0) {
                return false;
            }
            //if not exist new date have approval (pending)
            $sql = "SELECT count(a.id)
            FROM c_leavedetails a
            INNER JOIN c_leavingrequest b ON a.leaving_id = b.id AND b.deleted = 0 AND b.id = '$leavingRequest->id'            
            WHERE a.deleted = 0 AND a.status IN ('pending','approval') AND a.leaving_date >= '$today' ";
            if($GLOBALS['db']->getOne($sql) <= 0) {
                return false;
            }
            return true;
        }        

    }
?>
