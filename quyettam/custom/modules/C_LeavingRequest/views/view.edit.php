<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.edit.php');
    require_once("custom/include/utils/TimeSheetHelper.php");        

    class C_LeavingRequestViewEdit extends ViewEdit{

        function C_LeavingRequestViewEdit(){
            $this->useForSubpanel = TRUE;
            parent::ViewEdit(); 
        }

        function display(){      
            if(!empty($_REQUEST['record'])) {         
                $tday = $GLOBALS['timedate']->to_db_date($GLOBALS['timedate']->now(),false);
                $thisMonth = date('m',strtotime($tday));
                $thisYear = date('Y',strtotime($tday));
                $sql = "SELECT MAX(leaving_date) FROM c_leavedetails WHERE deleted = 0 AND (leaving_id = '".$_REQUEST['record']."' OR group_key = '".$_REQUEST['record']."') ";

                $today = $GLOBALS['db']->getOne($sql);
                if($today!= '') {                                      
                    $month = substr($today,5,2);
                    $year = substr($today,0,4);
                    $j = ($thisYear - $year)*12 + $thisMonth - $month;
                    $is = "<script type='text/javascript'>                     
                    $(document).ready(function(){    
                    SUGAR.util.doWhen(
                    function() {return $('.ui-datepicker-next').length > 0;},
                    function() {";
                    if($j>0){
                        $is.= " for(i=1;i<=$j;i++){
                        $('.ui-datepicker-prev').trigger('click'); }" ;
                    } else if ($j<0) {
                        $is.= " for(i=$j;i<0;i++){
                        $('.ui-datepicker-next').trigger('click'); }" ;
                    } 
                    $is.= " });             
                    });
                    </script>
                    ";
                    echo $is;
                }
            }
            $this->assign();
            parent::display(); 
        } 


        function assign(){ 
            // if type of leave is plan, redirect to action of plan
            if($this->bean->leaving_type == 'plan'){
                if($this->bean->assigned_user_id == $GLOBALS['current_user']->id){
                    SugarApplication::redirect("index.php?module=Leaving&action=createPlans");
                } else {
                    SugarApplication::redirect("index.php?module=Leaving&action=index");
                }
            }

            //Add Css popup by MTN - 23/10/2014
            echo '<style type="text/css">@import url("custom/include/javascripts/ModalWindowEffects/css/component.css"); </style>';
            echo '<style type="text/css">@import url("custom/include/javascripts/popup/customCss.css"); </style>';

            global $app_list_strings, $mod_strings, $current_user, $db,$timedate;           
            unset($app_list_strings['type_leave_of_date']['other']);             
            unset($app_list_strings['leaving_reason_for_leave_dom']['InfantCare']);             
            unset($app_list_strings['leaving_reason_for_leave_dom']['MaternityLeave']);             
            $first_day = $current_user->get_first_day_of_week();
            $datepicker_date_format = "m/d/Y" ;
            //get tong so ngay nghi dc phep trong nam
            //$totalLeavedays = TimeSheetHelper::getAnnualsOfUser($current_user->id,date('Y'));                     
            // $totalLeftsHour = TimeSheetHelper::getTotalHourLeaving($current_user->id,date('Y'),"'AnnualLeave'");
            // $totalLeftsDay =  round($totalLeftsHour/8);              

            //end
            $script = "
            <script type='text/javascript'>
            var allow_date = new Date($end_year,$end_month-1,$end_day-1);
            jQuery(document).ready(function(){
            jQuery('#datepicker').multiDatesPicker({
            firstDay: $first_day,   
            dateFormat: 'mm/dd/yy',           
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
            var selectedDate = new Array();                         
            var date_penddings = new Array();
            var date_approvals = new Array();
            var holiday_list = new Array();
            ";
            //add holiday into calenđar
            $holiday_list = TimeSheetHelper::getHolidayDays();
            for ($i=0;$i<count($holiday_list);$i++){
                $holiday = $GLOBALS['timedate']->to_display($holiday_list[$i],'Y-m-d',$datepicker_date_format); 
                $script.= " holiday_list.push('$holiday');";
            }
            unset($holiday_list);
            //end
            /*$requestOthers = TimeSheetHelper::getOtherLeaveRequest($current_user->id,(isset($_REQUEST['record'])?$_REQUEST['record']:'')); 
            foreach($requestOthers as $pd){
            $d = $GLOBALS['timedate']->to_display($pd['date'],'Y-m-d','m/d/Y'); 
            if($pd['status']=='pending') {
            $script.= " date_penddings.push('$d');";
            } else {
            $script.= " date_approvals.push('$d');";
            }
            }
            unset($requestOthers);*/

            $script .= "             
            /*if(date_penddings.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'other_pending');
            jQuery('#datepicker').multiDatesPicker('addDates', date_penddings, 'other_pending');
            }
            if(date_approvals.length > 0 ){
            jQuery('#datepicker').multiDatesPicker('resetDates', 'other_approval');
            jQuery('#datepicker').multiDatesPicker('addDates', date_approvals, 'other_approval');
            } 
            if(publicdays.length > 0 ){
            // console.log(publicdays);
            jQuery('#datepicker').multiDatesPicker('resetDates', 'publicday');
            jQuery('#datepicker').multiDatesPicker('addDates', publicdays, 'publicday');
            } */           
            });
            </script>";

            $css = "<link rel='stylesheet' type='text/css' href='custom/modules/C_LeavingRequest/css/mdp.css'/>";
            $css .= "<link rel='stylesheet' type='text/css' href='custom/include/javascripts/Select2/select2.css' />";

            $html = '
            <form id="EditView" name="EditView" method="POST" action="index.php">
            <input type="hidden" name="module" id="module" value="C_LeavingRequest">
            <input type="hidden" name="action" id="action" value="Save">            
            <input type="hidden" name="record" id="record" value="'.$this->bean->id.'">
            <input type="hidden" id="assigned_user_name" name="assigned_user_name" value="'.$current_user->name.'" >
            <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="'.$current_user->id .'">
            <table width="99%" border="1" class="main_timesheet">
            <input type=\'hidden\' name=\'leaving_type\' value = "'.$_REQUEST['leaving_type'].'" >
            <tr>
            <td><span id="datepicker"></span>
            <br>   
            Note: <br>   ';
            
            $html .= '<span class="pendding_date">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Pending (this request)  <br>
            <span class="approval_date">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Approval (this request)  <br>
            <span class="notapproval_date">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Not Approval (this request)  <br>
            <span class="cancel_date">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Cancel (this request)  <br>
            <span class="today_c">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Today <br>  
            <span class="publics">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Public day <br>  
            <span class="other_pending">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Pending (other request) <br>         
            <span class="other_approval">&nbsp;&nbsp;X&nbsp;&nbsp;</span> Approved (other request) <br> '; 

            $html .= '<td width="80%">                                       
            <div id="lbltext"></div><br>
            <table width="100%">
            <tr> ';
            if(!(isset($_REQUEST['leaving_type']) && in_array($_REQUEST['leaving_type'], array('fullleaving','createForUser')))){
                $html .= '<th>'.$mod_strings['LBL_LEAVING_TYPE_2'].'</th>
                <th style="width:10px" class = "timeleaving"></th>
                <th style="min-width:185px">'.$mod_strings['LBL_REASONS_FOR_LEAVE'].'<font color="red">*</font></th>
                <th>'.$mod_strings['LBL_DESCRIPTION'].'</th>                                
                </tr>
                <tr>
                <td align="center"> 
                <select name="type_leave_of_date" id="type_leave_of_date" style="width:150px">
                '. get_select_options($app_list_strings['type_leave_of_date'], '') .' 
                </select>
                </td>
                <td align="center" class = "" > 
                </td>                            
                <td align="center">
                <select name="reasons_for_leave" id="reasons_for_leave" style="min-width:230px">'.get_select_options_with_id($app_list_strings['leaving_reason_for_leave_dom'],$this->bean->reasons_for_leave) .'</select>
                </td>
                <td align="center">
                <textarea name="description" id="description" cols="50" rows="2">'.$this->bean->description.'</textarea>
                </td>

                ';
            } else if($_REQUEST['leaving_type'] == 'fullleaving') {
                $html .= '<th width="30%">'.$mod_strings['LBL_TABLE_HEADER1'].'</th>
                <th style="width:10px" class = "timeleaving"></th>                 
                <th>'.$mod_strings['LBL_DESCRIPTION'].'</th> 
                <th></th>                               
                </tr>
                <tr>
                <td align="center"> 
                <table class="leaving2" id="leaving2" border="0" cellspacing="0" cellpadding="2" width="99%">
                <thead>
                <tr>
                <th width = "70%"></th>
                <th width = "30%"></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                </table></td>                
                <td align="center" class = "" >                
                </td> 
                <td align="center">
                <textarea name="description" id="description" cols="50" rows="2">'.$this->bean->description.'</textarea>
                </td>  
                <td ><div style="float:right"><input type="button" name="btnSave" id="btnSaveFull"  value="'.$mod_strings['LBL_BTN_SAVE'].'" ></div></td>                         
                ';
            } else if($_REQUEST['leaving_type'] == 'createForUser') {
                $html .= '<th>'.$mod_strings['LBL_USER_LEAVE'].'</th>
                <th style="width:10px" class = "timeleaving"></th>
                <th style="min-width:185px">'.$mod_strings['LBL_REASONS_FOR_LEAVE'].'<font color="red">*</font></th>
                <th>'.$mod_strings['LBL_DESCRIPTION'].'</th>                                
                </tr>
                <tr>
                <td align="center"> 
                <select name="user_id" id="user_id" style="width:250px">
                '. $user_option .' 
                </select>
                <select name="type_leave_of_date" id="type_leave_of_date" style="width:150px; display:none;">
                '. get_select_options($app_list_strings['type_leave_of_date'], '') .' 
                </select>
                </td>
                <td align="center" class = "" > 
                </td>                            
                <td align="center">
                <select name="reasons_for_leave" id="reasons_for_leave" style="min-width:230px">'.get_select_options_with_id($app_list_strings['leaving_reason_for_leave_dom'],$this->bean->reasons_for_leave) .'</select>
                </td>
                <td align="center">
                <textarea name="description" id="description" cols="50" rows="2">'.$this->bean->description.'</textarea>
                </td>

                ';
            }
            $html .= '           
            </tr>                        

            </table>
            <br/>
            ';
            if(!(isset($_REQUEST['leaving_type']) && in_array($_REQUEST['leaving_type'], array('fullleaving','createForUser')))){
                $html .= '<h2 class="title">'.$GLOBALS['mod_strings']['LBL_TABLE_SPAN1'].'</h2>
                <div id="added_entries" style="">
                <table class="leaving" id="leaving" border="0" cellspacing="0" cellpadding="2" width="99%">
                <thead>
                <tr>
                <th style ="width:25%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER1'].'</th>
                <th style ="width:30%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER2'].'</th>
                <th style ="width:15%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER3'].'</th>
                <th style ="width:15%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER4'].'</th>
                <th style ="width:14%"></th>  
                </tr>
                </thead>   
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                <td><input type="button" name="btnSave" id="btnSave" value="'.$mod_strings['LBL_BTN_SAVE'].'" >  </td>
                <td class = "right"><h3>Total</h3></td> <td class = "center"><b><span id = "totalHour">0 h</span></b></td><td></td><td></td>
                </tr>
                </tfoot>
                </table>
                </div> ';
            } else if (in_array($_REQUEST['leaving_type'], array('createForUser'))){
                $html .= '<h2 class="title">'.$GLOBALS['mod_strings']['LBL_TABLE_SPAN1'].'</h2>
                <div id="added_entries" style="">
                <table class="leaving" id="leaving" border="0" cellspacing="0" cellpadding="2" width="99%">
                <thead>
                <tr>
                <th style ="width:27%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER1'].'</th>
                <th style ="width:35%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER2'].'</th>
                <th style ="width:17%">'.$GLOBALS['mod_strings']['LBL_TABLE_HEADER3'].'</th>               
                <th style ="width:14%"></th>  
                </tr>
                </thead>   
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                <td><input type="button" name="btnSaveForUser" id="btnSaveForUser" value="'.$mod_strings['LBL_BTN_SAVE'].'" >  </td>
                <td class = "right"><h3>Total</h3></td> <td class = "center"><b><span id = "totalHour">0 h</span></b></td><td></td>
                </tr>
                </tfoot>
                </table>
                </div> ';
            }
            $html .= '<div id="user_list" style="width:100%;"> '.$user_list.' </div>
            <div id="result"></div>';
            if(!(isset($_REQUEST['leaving_type']) && $_REQUEST['leaving_type'] == 'fullleaving')){               
                $html.=' <div class="success message" id = "success_message">
                <img id="imgInfo" src="themes/OnlineCRM/images/high_priority-50.png" border="0" width="25" height="25">
                <div style="padding:10px 0px 0px 10px;">
                <p>Total of days for annual leave: <strong>'.$totalLeavedays.' days</strong>. Used date: <strong> '.$totalLeftsDay.' days('.$totalLeftsHour.' h)</strong>. Remaining: <strong> '.($totalLeavedays-$totalLeftsDay).' days ('.($totalLeavedays*8-$totalLeftsHour).' h) </strong></p>
                </div>
                </div>                 
                ';
            }
            $html.='</td></tr></table></form>';
            $jss = " <script type='text/javascript'>           
            $('select[name=type_leave_of_date]').select2();            
            $('select[name=user_id]').select2();            
            $('select[name=reasons_for_leave]').select2();"; 
            echo "<script type='text/javascript'>
            var status = '".($this->bean->leaving_approval!=''?$this->bean->leaving_approval:'pending')."';
            </script>
            ";
            if(!(isset($_REQUEST['leaving_type']) && in_array($_REQUEST['leaving_type'], array('fullleaving','createForUser')))){
                if(isset($_REQUEST['record']) && $_REQUEST['record']!='') { 
                    if($GLOBALS['current_user']->id == $GLOBALS['db']->getOne('SELECT assigned_user_id FROM leaving WHERE id = "'.$_REQUEST['record'].'"') || $is_plan) {
                        if($is_plan){
                            $sql =  "SELECT * FROM c_leaving_detail WHERE deleted = 0 AND group_key = '".$_REQUEST['record']."' ORDER BY leaving_date ";
                        }  else {
                            $sql = "SELECT * FROM c_leaving_detail WHERE deleted = 0 AND leaving_id = '".$_REQUEST['record']."' ORDER BY leaving_date ";
                        }
                        $rows = $GLOBALS['db']->query($sql);
                        $jss .= " $(document).ready(function(){";
                        $jss .= " $('#record').val('".$_REQUEST['record']."');";                    
                        while($row = $GLOBALS['db']->fetchByAssoc($rows)){ 
                            $d = $GLOBALS['timedate']->to_display($row['leaving_date'],'Y-m-d','m/d/Y');
                            $jss .= "addRow($('#leaving tbody'),'".$d."','".$row['leaving_type']."','".$row['status']."','".$row['id']."',false);";
                            $jss .= "jQuery('#datepicker').multiDatesPicker('addDates', '$d', '".$row['status']."');";
                        }
                        $jss.= "
                        // jQuery('#datepicker').multiDatesPicker('addDates', '11/28/2014', 'cancel');

                        });";
                    } else {
                        echo "<script type='text/javascript'>
                        alert('You can not edit this record!');
                        window.location='index.php?module=Leaving&action=index';
                        </script>
                        ";
                    }
                }
            }
            $jss .= "</script>"; 
            $this->ss->assign('SCRIPT', $script);
            $this->ss->assign('CSS', $css);
            $this->ss->assign('HTML', $html.$jss);
        }      
        function assign_maternity() {
            global $timedate;
            $ss = new Sugar_Smarty();
            $type = array(
                'InfantCare' => 'Infant Care',
                'MaternityLeave' => 'Maternity Leave',
            );
            $datas = array();
            //$datas =  
            $key = "MaternityLeave";
            if($this->bean->id == '') {
                $this->bean = new Leaving();
                $sql = "SELECT id,reasons_for_leave,leaving_approval FROM leaving WHERE deleted = 0 AND leaving_type = 'maternity' AND leaving_approval IN ('pending','approval')
                AND assigned_user_id = '".$GLOBALS['current_user']->id."' ORDER BY date_entered DESC ";
                $row = $GLOBALS['db']->fetchOne($sql);
                //neu nhu nghi sinh
                if ($row['reasons_for_leave']== 'MaternityLeave') {
                    //neu trang thai chua duyet, retrieve lai dong thong tin cu
                    if($row['leaving_approval']== 'pending'){
                        $datas['label'] = "UPDATE INFORMATION FOR MATERNITY LEAVE";                           
                        $this->bean->retrieve($row['id']);
                        $key = $this->bean->reasons_for_leave;
                        $dates = PlanHelper::getDateOfMaternityPlan($row['id']);
                        $datas['start_date'] = $timedate->to_display_date($dates['start'],false);
                        $datas['end_date'] = $timedate->to_display_date($dates['end'],false); 
                    } 
                    //neu da duyet, kiem tra co cap nhat day du thonng tin ngay sinh ngay di lam chua
                    else {
                        $slq = "SELECT date_born,date_return FROM leaving WHERE id = '".$row['id']."'";
                        $date = $GLOBALS['db']->fetchOne($slq);
                        //neu chua, lay thong tin de cap nhat
                        if($date['date_born']=='' || $date['date_return']==''){
                            $this->bean->retrieve($row['id']);
                            $key = $this->bean->reasons_for_leave;
                            $dates = PlanHelper::getDateOfMaternityPlan($row['id']);
                            $datas['label'] = "UPDATE INFORMATION FOR MATERNITY LEAVE";
                            $datas['start_date'] = $timedate->to_display_date($dates['start'],false);
                            $datas['end_date'] = $timedate->to_display_date($dates['end'],false); 
                            $datas['date_born'] = $timedate->to_display_date($dates['start'],false);
                            $datas['date_return'] = $timedate->to_display_date($dates['end'],false);
                        } else {  //neu roi, tao thong tin cham soc con
                            $key = "InfantCare";  
                            $datas['label'] = "CREATE NEW PLAN FOR INFANT CARE";                     
                            $dates = PlanHelper::getDateOfMaternityPlan('null');
                            if(strtotime($dates['start'])+86400 <= strtotime($date['date_return'])) {
                                $dates['start'] = $date['date_return'];
                            }
                            $datas['start_date'] = $timedate->to_display_date($dates['start'],false);
                            $datas['end_date'] = $timedate->to_display_date($dates['end'],false);
                        }
                    }
                } 
                //neu thong tin cuoi cung la cham soc con
                else if ($row['reasons_for_leave']=='InfantCare') { 
                    //kiem tra xem da het han hay chua
                    $slq = "SELECT date_born,date_return FROM leaving WHERE deleted = 0 
                    AND reasons_for_leave = 'MaternityLeave' AND leaving_approval = 'approval' 
                    AND assigned_user_id = '".$GLOBALS['current_user']->id."' 
                    ORDER BY date_entered DESC " ;
                    $date = $GLOBALS['db']->fetchOne($slq);
                    //neu da het han, tao thong tin xin phep nghi xin con
                    if(strtotime(date('Y-m-d')) > (strtotime($date['date_born']) + 365*86400) ) {
                        $datas['label'] = "CREATE NEW PLAN FOR MATERNITY LEAVE"; 
                        $key = "MaternityLeave";
                        $dates = PlanHelper::getDateOfMaternityPlan('null');
                        $datas['start_date'] = $timedate->to_display_date(date('Y-m-d'),false);
                        $datas['end_date'] = $timedate->to_display_date(date('Y-m-d','+6 month'),false);
                    } else {     //neu chua  
                        $datas['label'] = "CREATE NEW PLAN FOR INFANT CARE"; 
                        $key = "InfantCare";
                        $dates = PlanHelper::getDateOfMaternityPlan('null');
                        $datas['start_date'] = $timedate->to_display_date($dates['start'],false);
                        $datas['end_date'] = $timedate->to_display_date($dates['end'],false);
                    }  
                } else { //neu chua co thong tin nao => tao thong tin sinh con
                    $key = "MaternityLeave";
                    $datas['label'] = "CREATE NEW PLAN FOR MATERNITY LEAVE"; 
                    $dates = PlanHelper::getDateOfMaternityPlan('null');
                    $datas['start_date'] = $timedate->to_display_date($dates['start'],false);
                    $datas['end_date'] = $timedate->to_display_date($dates['end'],false);
                }
            } else {
                //neu la edit 
                $datas['label'] = "UPDATE MATERNITY PLAN";
                $key = $this->bean->reasons_for_leave;
                $dates = PlanHelper::getDateOfMaternityPlan($datas['id']);
                $datas['start_date'] = $timedate->to_display_date($dates['start'],false);
                $datas['end_date'] = $timedate->to_display_date($dates['end'],false);
            }
            $datas['id'] = $this->bean->id;
            $datas['status'] = $this->bean->leaving_approval!=''?$this->bean->leaving_approval:"pending";
            $datas['description'] = $this->bean->description;            
            $datas['reason_for_leave_option'] = get_select_options($type,$key);
            unset($GLOBALS['app_list_strings']['leaving_type_for_maternity']['fullday']);
            $key = $GLOBALS['db']->getOne("SELECT leaving_type FROM c_leaving_detail WHERE deleted = 0 AND leaving_id = '".$this->bean->id."'");
            $datas['leaving_type_option'] = get_select_options($GLOBALS['app_list_strings']['leaving_type_for_maternity'],$key);

            $ss->assign('datas',$datas);
            $ss->assign('MOD',$GLOBALS['mod_strings']);
            $ss->display('custom/modules/Leaving/tpls/addMaternityLeaveRequest.tpl');            
        }
        function getUserList(){
            $html = "
            <br>
            <div style = 'width:100%;height:30px'><div style = 'float: left;width:100px;height:30px'><h3>USER LIST</h3> </div><div style = 'float: left;height:30px'> (<input type='checkbox' id='checkall' value='1' /> Check all)</div></div>
            <table  width=\"99%\" cellspacing=\"0\" cellpadding=\"2\" border=\"0\" id = 'list'> ";
            $sql = "SELECT DISTINCT id,name FROM securitygroups WHERE deleted = 0 AND type_group = 'company' ";
            $listCom = $GLOBALS['db']->query($sql);
            // $listCom = array();

            while($com = $GLOBALS['db']->fetchByAssoc($listCom)) {   
                $html.= "<tr style = 'background:#abc;' height=25>";
                $html.= "<td width=30><input type='checkbox' id='".$com['id']."' class='company checkall' value='".$com['id']."' /></td>";
                $html.= "<td><label for='".$com['id']."'>".$com['name']."</label></td>";   
                $html.= "<td  style ='text-align:right'><label class = 'hide_show' val = '1' >Hide </label><img src='custom/themes/default/images/basic_search.gif'></td>";   
                $html.= "</tr><tr><td colspan=3><hr style='margin: 3px auto' ></td></tr>";
                $html.= "<tr><td></td>";
                $html.= "<td colspan=2><table  width=\"95%\" cellspacing=\"0\" cellpadding=\"2\" border=\"0\" >";
                $sql = "SELECT DISTINCT id,name FROM c_derparts WHERE deleted = 0 AND company = '".$com['id']."' ";
                $listDept = $GLOBALS['db']->query($sql);
                $html1 = "";
                while($dept = $GLOBALS['db']->fetchByAssoc($listDept)) { 
                    $html1.= "<tr style = 'background:#cba;' height=25>
                    <td width=30><input type='checkbox' id='".$dept['id']."' class='department ".$com['id']."' value='".$dept['id']."' />
                    </td> 
                    <td><label for='".$dept['id']."'>".$dept['name']." </label></td>
                    <td  style ='text-align:right'><label class = 'hide_show' val = '1' >Hide </label><img src='custom/themes/default/images/basic_search.gif'></td>
                    </tr><tr><td colspan=3><hr style='margin: 3px auto' ></td></tr>  
                    <tr><td></td>
                    <td colspan=2><table  width=\"95%\" cellspacing=\"0\" cellpadding=\"2\" border=\"0\"> ";
                    $htmlU = "";  
                    $listUser = SecurityGroupHelper::getUsersOfDepartment($dept['id']);                              
                    for($i=0; $i < count($listUser); $i++){
                        if($i%2==0){
                            $htmlU .= "<tr>";
                        }
                        $htmlU.= "<td width=30><input type='checkbox' id='".$listUser[$i]['user_id']."' name='userLists[]' class='user ".$dept['id']."' value='".$listUser[$i]['user_id']."' /></td>
                        <td ><label for='".$listUser[$i]['user_id']."'>".$listUser[$i]['user_name']." (".$listUser[$i]['user_email'].")</label></td>" ;
                        if(($i-1)%2==0){
                            $htmlU .= "</tr>";
                        } else if($i == (count($listUser)-1)){
                            $htmlU .= "<td></td><td></td></tr>";
                        }
                    }
                    $html1.= $htmlU."</table></td></tr><tr><td colspan=3><hr  ></td> ";
                }
                $html.= $html1."</table></td></tr><tr><td colspan=3><hr  ></td>";
                //$listCom[$row['id']] = $row['name'];
            }
            return $html."</table>";
        }

        function getUserOption(){
            $sql = "SELECT DISTINCT users.id AS user_id, users.cardholder_id, 
            TRIM(CONCAT(IFNULL(first_name, ''), ' ', IFNULL(last_name, '')) ) AS user_name           
            FROM users WHERE users.deleted = 0 AND users.status = 'Active' ORDER BY cardholder_id";
            $users = $GLOBALS['db']->query($sql);
            $user_array = array();
            while ($user = $GLOBALS['db']->fetchByAssoc($users)) {
                $user_array[$user['user_id']] = "[".$user['cardholder_id']."]-".$user['user_name'];
            }
            return get_select_options_with_id($user_array,$GLOBALS['current_user']->id);  
        }            
    }
?>
