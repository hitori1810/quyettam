<?php
    /**
    * add by Trung Nguyen: 2015.02.04 : change display editview of log works
    */
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.edit.php');
    require_once("custom/include/utils/TimeSheetHelper.php");  

    class C_WorkLogViewEdit extends ViewEdit{

        function C_WorkLogViewEdit(){
            $this->useForSubpanel = TRUE;
            parent::ViewEdit(); 
        }

        function display(){ 
            global $timedate,$current_user,$app_list_strings,$mod_strings;
            $to_day = $timedate->to_db_date($timedate->now(),false);
            $to_year = date('Y',strtotime($to_day));
            $to_month = date('m',strtotime($to_day));
            $to_date = date('d',strtotime($to_day));
            $to_rep = date('N',strtotime($to_day));           
            $first_day = $current_user->get_first_day_of_week();

            $datepicker_date_format = "m/d/Y" ;
            $script = "
            <script type='text/javascript'>               
            var to_day = new Date($to_year,".($to_month-1).",$to_date);
            jQuery(document).ready(function(){
            jQuery('#datepicker').multiDatesPicker({
            firstDay: $first_day,   
            dateFormat: 'mm/dd/yy',           
            maxDate:'".$timedate->to_display($timedate->to_db_date($timedate->now(),false),'Y-m-d',$datepicker_date_format)."',
            closeText: '".$mod_strings['LBL_DONE']."',
            prevText: '".$mod_strings['LBL_PREV']."',
            nextText: '".$mod_strings['LBL_NEXT']."',
            currentText: '".$mod_strings['LBL_TODAY']."',
            monthNames: ['".implode("','",$app_list_strings['js_month_names'])."'],
            monthNamesShort: ['".implode("','",$app_list_strings['js_month_names_short'])."'],
            dayNames: ['".implode("','",$app_list_strings['js_day_names'])."'],
            dayNamesShort: ['".implode("','",$app_list_strings['js_day_names_short'])."'],
            dayNamesMin: ['".implode("','",$app_list_strings['js_day_names_min'])."'],

            });
            var logwork_date_list = new Array();                         
            var overtime_date_list = new Array();                         
            var holiday_list = new Array();
            var leave_halfdate_list = new Array();
            var leave_fulldate_list = new Array();
            ";
            //add holiday into calenđar
            $holiday_list = TimeSheetHelper::getHolidayDays();
            for ($i=0;$i<count($holiday_list);$i++){
                $holiday = $GLOBALS['timedate']->to_display($holiday_list[$i],'Y-m-d',$datepicker_date_format); 
                $script.= " holiday_list.push('$holiday');";
            }
            unset($holiday_list);
            //add log work into calendar
            $logWorkDays = TimeSheetHelper::getWorkLogDays($current_user->id);
            foreach($logWorkDays as $date => $is_overtime) {
                $date = $GLOBALS['timedate']->to_display($date,'Y-m-d',$datepicker_date_format);
                if($is_overtime) {
                    $script.= " overtime_date_list.push('$date');";
                } else {
                    $script.= " logwork_date_list.push('$date');";
                }                
            }
            unset($logWorkDays); 
            // add leave into calendar
            $leaveDays = TimeSheetHelper::getLeavingDays($current_user->id);
            for ($i=0;$i<count($leaveDays);$i++){ 
                $date = $GLOBALS['timedate']->to_display($leaveDays[$i]['leaving_date'],'Y-m-d',$datepicker_date_format);
                if($leaveDays[$i]['days'] < 1) {
                    $script.= " leave_halfdate_list.push('$date');";
                } else {
                    $script.= " leave_fulldate_list.push('$date');";
                }                
            }
            unset($leaveDays);
            //end
            $app_list_strings['timesheet_project_list'] = TimeSheetHelper::getProjectListOfUser($current_user->id);
            //$app_list_strings['timesheet_projecttask_list'] = TimeSheetHelper::getProjectTaskListOfProject($current_user->id);
            $script .= "              
            // add holiday 
            if(holiday_list.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'holiday');
            jQuery('#datepicker').multiDatesPicker('addDates', holiday_list, 'holiday');
            } 
            if(logwork_date_list.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'logwork_date');
            jQuery('#datepicker').multiDatesPicker('addDates', logwork_date_list, 'logwork_date');
            }
            if(overtime_date_list.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'overtime_date');
            jQuery('#datepicker').multiDatesPicker('addDates', overtime_date_list, 'overtime_date');
            }
            if(leave_halfdate_list.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'leave_halfdate');
            jQuery('#datepicker').multiDatesPicker('addDates', leave_halfdate_list, 'leave_halfdate');
            }
            if(leave_fulldate_list.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'leave_fulldate');
            jQuery('#datepicker').multiDatesPicker('addDates', leave_fulldate_list, 'leave_fulldate');
            }

            });
            </script>"; 
            $css = "<link rel='stylesheet' type='text/css' href='custom/modules/C_WorkLog/css/mdp.css'/>";   
            $css .= "<link rel='stylesheet' type='text/css' href='custom/include/javascripts/Select2/select2.css'/>";   
            $html = '
            <form id="EditView" name="EditView" method="POST" action="index.php">
            <input type="hidden" name="module" id="module" value="C_WorkLog">
            <input type="hidden" name="action" id="action" value="Save">
            <input type="hidden" name="record" id="record" value="">       
            <input type="hidden" name="date_format" id="date_format" value="'.$datepicker_date_format.'">       
            <input type="hidden" id="apply_date" name="apply_date" value="'.($timedate->to_display($to_day,'Y-m-d',$datepicker_date_format)).'" size="21">               
            <input type="hidden" id="apply_date_year" value="'.(date('Y',strtotime($to_day))).'" size="21">               
            <input type="hidden" id="apply_date_month" value="'.(date('m',strtotime($to_day))).'" size="21">               
            <table width="99%" border="1" class="main_timesheet">             
            <tr>
            <td width="255">
            <span id="datepicker"></span>
            <p style="text-align:center;"><b>'.$GLOBALS['mod_strings']['LBL_TOTAL_MONTH'].': <span id="total_month">'.format_number(TimeSheetHelper::getTotalSpentTimeInMonthOfUser($current_user->id,$to_day)).'</span> '.$GLOBALS['mod_strings']['LBL_HOUR_2'].'</b></p>
            <br>  
            Note: <br />   
            <span class="logwork_date">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Added entries   <br>
            <span class="overtime_date">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Added entries (had overtime)   <br>
            <span class="today">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Today <br>  
            <span class="holiday">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Public holidays <br>  
            <span class="leave_fulldate">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Leaving days (fullday) <br>         
            <span class="leave_halfdate">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Leaving days (halfday) <br> 
            </td>
            <td style="width:5px"></td>

            <td>
            <h2 id="dis_apply_date" name="dis_apply_date"  class="highlight1">'.
            $app_list_strings['js_day_names'][$to_rep%7] . ', ' .$to_date . ' ' . $app_list_strings['js_month_names'][$to_month-1].', ' . $to_year
            .'</h2> 
            <br>
            <table width="99%">
            <tr>
            <th>'.$GLOBALS['mod_strings']['LBL_PROJECT_NAME'].'<font color="red">*</font></th>
            <th>'.$GLOBALS['mod_strings']['LBL_PROJECT_TASK'].'<font color="red">*</font></th>
            <th>'.$GLOBALS['mod_strings']['LBL_SPENT_TIME'].'<font color="red">*</font></th>
            <th>'.$GLOBALS['mod_strings']['LBL_DESCRIPTION'].'<font color="red">*</font></th>
            <th></th>
            </tr> 
            <tr>
            <td align="center"> 
            <select id="project_id" class="project_id" style="width: auto; width:94%">
            <option value ="" >-Select project- </option>
            '. get_select_options($app_list_strings['timesheet_project_list'], '') .' 
            </select>
            </td> 
            <td align="center">
            <select id="project_task_id" class="project_task_id" style="width: auto;width:94%">
            <option value ="" >-Select project task- </option>               
            </select>   
            </td>            
            <td align="center">
            <select id="hour" style="width:60px">
            '. get_select_options($app_list_strings['timesheet_hour_list'], '') .' 
            </select>             
            <select id="minute" style="width:60px">
            '. get_select_options($app_list_strings['timesheet_minutes_list'], '') .' 
            </select>
            </td>
            <td align="center">                              
            <img id="imgDescription" style="cursor: pointer;" src="custom/themes/default/images/edit_file-50.png" border="0" width="25" height="25">
            <textarea id="tmp_description" name="tmp_description" style="display:none;"></textarea>
            </td>
            <td align="center"><input type="button" class="btnAddRow" name="btnAddRow" value="Add"></td>
            </tr>
            </table>

            <div class="md-modal md-effect-1" id="modal-1" style="display:none;">
            <div class="md-content">
            <h3>Description Dialog</h3>
            <div style="height: 170px">
            <textarea id="popupDescription" name="popupDescription" placeholder="Describe somethings ..."></textarea>
            <input type="button" id="btnOKDescription" class="button_primary" value="OK"></input>
            </div>
            </div>
            </div>
            <div class="md-overlay" style="display:none;"></div>

            <br>
            <h2 class="title">'.$GLOBALS['mod_strings']['LBL_ADDED_ENTRIES'].'</h2>
            <div id="added_entries" style="">
            <table class="timesheets" id="timesheets" border="0" cellspacing="0" cellpadding="2" width="99%">
            <thead>
            <tr>
            <th style="width: 25%">'.$GLOBALS['mod_strings']['LBL_PROJECT_NAME'].'</th>
            <th style="width: 25%">'.$GLOBALS['mod_strings']['LBL_PROJECT_TASK'].'</th>
            <th style="width: 15%">'.$GLOBALS['mod_strings']['LBL_SPENT_TIME'].'</th>
            <th style="width:  9%">'.$GLOBALS['mod_strings']['LBL_OVERTIME'].'</th>
            <th style="width: 17%">'.$GLOBALS['mod_strings']['LBL_DESCRIPTION'].'</th>
            <th style="width: 09%"></th>
            </tr>
            </thead>   
            <tbody>
            </tbody>
            <tfoot>
            <tr><td colspan=6 align="right"><b>'.$GLOBALS['mod_strings']['LBL_TOTAL'].': <span id="total_day">'.format_number($total_hour_day,2,2).'</span> '.$GLOBALS['mod_strings']['LBL_HOUR_2'].'</b></td></tr>
            </tfoot>
            </table> ';
            $html .= '
            </div>         
            <input type="button" name="btnSave" class="button_blue" id="btnSave" value="Save" >
            <div id="result"></div>
            <div id="total_week">'.$waringweek.'</div>
            </td>
            </tr>
            </table>
            </form>
            '; 

            $cjs = " <script type='text/javascript'> 
            var index = 0;   
            $(document).ready(function(){           
            $('select#hour').select2();
            $('select#minute').select2(); 
            $('select#project_id').select2(); 
            $('select#project_task_id').select2(); ";
            //Trung Nguyen at 2015.02.09 : load data in default day.
            $details = TimeSheetHelper::getWorkLogDataOfĐate($current_user->id,$to_day);
            foreach ($details as $detail) {
                $h = floor($detail['spent_time']);
                $m = ($detail['spent_time'] - $h)*60;
                $m = ($m?$m:'00');
                $cjs.= "addRow('".$detail['id']."','".$detail['project_id']."','".$detail['project_name']."','".$detail['task_id']."','".$detail['task_name']."', '".$h."', '".$m."',".$detail['overtime'].", '".$detail['description']."', 0, false);";
            }
            $cjs.= "});
            </script> " ;
            $this->ss->assign('SCRIPT', $script);
            $this->ss->assign('CSS', $css);
            $this->ss->assign('HTML', $html.$cjs);
            parent::display();

            //md5('onlinecrm',true);
        }
    }
?>
