<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    include_once("custom/include/utils/TimeSheetHelper.php");
    global $timedate;
    $worklog_ids = $_REQUEST['worklog_id'];
    $data = array();
    try{            
        $apply_date = $GLOBALS['timedate']->to_display($_REQUEST['apply_date'],$_REQUEST['date_format'],'Y-m-d'); 
        $is_new = (TimeSheetHelper::getTotalSpentTimeInDayOfUser($GLOBALS['current_user']->id,$apply_date)>0?false:true);
        for($i = 0; $i< count($worklog_ids); $i++ ){
            $thisWorkLog = new C_WorkLog();
            $thisWorkLog->retrieve($worklog_ids[$i]);
            $thisWorkLog->name = "[".$timedate->to_db_date($_REQUEST['apply_date'],false)."]-".$GLOBALS['current_user']->name;
            $thisWorkLog->project_c_worklog_1project_ida = $_REQUEST['project_id'][$i];
            $thisWorkLog->projecttask_c_worklog_1projecttask_ida = $_REQUEST['project_task_id'][$i];
            $thisWorkLog->spent_time = $_REQUEST['hour'][$i] +  $_REQUEST['minute'][$i]/60;
            $thisWorkLog->apply_date = $apply_date;
            $thisWorkLog->overtime = $_REQUEST['overtime'][$i];
            $thisWorkLog->description = $_REQUEST['description'][$i];
            $thisWorkLog->assigned_user_id = $GLOBALS['current_user']->id;
            if($_REQUEST['deleted'][$i]){
                $thisWorkLog->deleted = 1;
            } 
            $thisWorkLog->save();     
        }
        // get all data of this day
        $details = TimeSheetHelper::getWorkLogDataOfĐate($current_user->id,$apply_date);
        foreach ($details as $detail) {
            $h = floor($detail['spent_time']);
            $m = ($detail['spent_time'] - $h)*60;
            $m = ($m?$m:'00');
            $worklog = array(
                'id' => $detail['id'],
                'project_id' => $detail['project_id'],
                'project_name' => $detail['project_name'],
                'task_id' => $detail['task_id'],
                'task_name' => $detail['task_name'],
                'hour' => $h,
                'minute' => $m,
                'overtime' => $detail['overtime'],
                'description' => $detail['description'],
            );  
            $data[] = $worklog;  
        }
        //end
        $data['detail'] = count($data);
        $data['total_month'] = format_number(TimeSheetHelper::getTotalSpentTimeInMonthOfUser($GLOBALS['current_user']->id,$apply_date),2,2);
        $data['success'] = true;
        $data['alerts'] = ($is_new?'Saved successfully!':'Updated successfully!');
        $data['msg'] =  $data['alerts'] ;
    } catch (Exception $ex) {
        $data['success'] = false;
        $data['alerts'] = ' There are some errors while saving. Please refresh page and try again!';
        $data['msg'] = 'Updated successfully';
    }
    ob_clean();
    echo json_encode($data);
    die();
?>
