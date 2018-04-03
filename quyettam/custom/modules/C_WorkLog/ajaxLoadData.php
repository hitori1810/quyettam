<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    include_once("custom/include/utils/TimeSheetHelper.php");  
    //Trung Nguyen 2015.02.07 : get project task of project
    if(isset($_POST['type']) && $_POST['type'] == 'getTask' ){
        $data = array('' => '-Select Project Task-');          
        $data = array_merge($data,TimeSheetHelper::getProjectTaskListOfProject($_POST['project_id']));
        if(count($data)>1) {
            echo get_select_options_with_id($data,'');
        } else {
            echo '';
        }
        die();
    }
    //end
    if (isset($_POST['type']) && $_POST['type'] == 'getWorkLogData') {
        global $timedate;
        $apply_date = $GLOBALS['timedate']->to_display($_REQUEST['apply_date'],$_REQUEST['date_format'],'Y-m-d'); 
        $data = array();
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
        $data['detail'] = count($data);
        $data['total_month'] = format_number(TimeSheetHelper::getTotalSpentTimeInMonthOfUser($GLOBALS['current_user']->id,$apply_date),2,2);
        $data['total_day'] = format_number(TimeSheetHelper::getTotalSpentTimeInDayOfUser($GLOBALS['current_user']->id,$apply_date),2,2);
        $data['success'] = true;
        $data['msg'] =  ($data['detail']? 'Loaded successfully!':'No data of this day!');
        ob_clean();
        echo json_encode($data);
        die();
    } 
    //Trung Nguyen 2015.02.10 ajax load total month of month
    if (isset($_POST['type']) && $_POST['type'] == 'getMonthTotal') {
        global $timedate;
        $apply_date = date('Y-m-d',strtotime($_POST['click']." months ",strtotime("".$_POST['year']."-".$_POST['month']."-01")));
        $data = array();
        
        $data['total_month'] = format_number(TimeSheetHelper::getTotalSpentTimeInMonthOfUser($GLOBALS['current_user']->id,$apply_date),2,2);
        $data['month'] = date('m',strtotime($apply_date));
        $data['year'] = date('Y',strtotime($apply_date));
        $data['success'] = true;
        ob_clean();
        echo json_encode($data);
        die();
    }
?>
