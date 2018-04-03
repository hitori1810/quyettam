<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    require_once('include/MVC/View/views/view.edit.php');
    require_once("custom/include/utils/TimeSheetHelper.php"); 

    class C_TimesheetConfigViewEdit extends ViewEdit {

        function C_TimesheetConfigViewEdit() {
            parent::ViewEdit();
        }

        function display() {
            global $mod_strings;   
            $css = "<link rel='stylesheet' type='text/css' href='custom/modules/C_TimesheetConfig/css/Config.css'/>";   
            $css .= "<link rel='stylesheet' type='text/css' href='custom/include/javascripts/Select2/select2.css'/>";
            echo $css;
            $this->ss->assign('TIMEWORK_TABLE',$this->getTimeWorkTable());
            parent::display();
        }

        /**
        * Function generate tabel template for time work in week
        * 
        */
        function getTimeWorkTable() {  
            global $app_list_strings, $mod_strings;
            $app_list_strings['timesheet_hour_start_list'] = array('' => '');
            for($i=6; $i <= 9; $i++) {
                $app_list_strings['timesheet_hour_start_list']['0'.$i.':00'] = '0'.$i.':00';
                $app_list_strings['timesheet_hour_start_list']['0'.$i.':15'] = '0'.$i.':15';
                $app_list_strings['timesheet_hour_start_list']['0'.$i.':30'] = '0'.$i.':30';
                $app_list_strings['timesheet_hour_start_list']['0'.$i.':45'] = '0'.$i.':45';
            }
            $app_list_strings['timesheet_hour_end_list'] = array();
            for($i=16; $i <= 19; $i++) {
                $app_list_strings['timesheet_hour_end_list'][$i.':00'] = $i.':00';
                $app_list_strings['timesheet_hour_end_list'][$i.':15'] = $i.':15';
                $app_list_strings['timesheet_hour_end_list'][$i.':30'] = $i.':30';
                $app_list_strings['timesheet_hour_end_list'][$i.':45'] = $i.':45';
            }
            $table = "
            <style type='text/css'>
            
            </style>

            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\" border=\"1\" class='timework_table' >";
            $table .= "<thead>
            <tr>
            <th width = '16%' ></th> ";
            for($i=2; $i <=7; $i++) {
                $table .= "<th width = '14%'>".$app_list_strings['dom_cal_day_long'][$i]."</th>";
            } 
            $table .= "</tr>
            </thead>
            <tbody>
            <tr>
            <td align='center' class = 'th_class' ><b>".$mod_strings['LBL_START_TIME']."</b></td>
            ";
            for($i = 1; $i < 7; $i++) {
                // $time = 
                $table .= "<td align='center'> 
                <select style='width: 80px;' class = 'start_time' >".get_select_options_with_id($app_list_strings['timesheet_hour_start_list'],'')."</select>
                </td>";
            } 
            $table .= "</tr>
            <tr><td align='center' class = 'th_class' ><b>".$mod_strings['LBL_END_TIME']."</b></td>";
            for($i = 1; $i < 7; $i++) {
                $table .= "<td align='center'> 
                <select style='width: 80px;' class = 'end_time'>".get_select_options_with_id($app_list_strings['timesheet_hour_end_list'],'')."</select>
                </td>";
            } 
            $table .= "</tr>
            <tr><td align='center' class = 'th_class' ><b>".$mod_strings['LBL_WORKING_HOUR']."</b></td>";
            for($i = 1; $i < 7; $i++) {
                $table .= "<td align='center'><input style='width: 70px; text-align:center' value = '8' /></td>";
            } 
            $table .= "</tr>
            </tbody>
            ";

            $table .= "</table>" ;
            return $table;
        }
    }
?>
