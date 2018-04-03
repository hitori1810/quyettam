<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
include_once("custom/include/_helper/junior_class_utils.php");
include_once("custom/include/_helper/junior_revenue_utils.php");

class logicClass
{
    function addClassCode(&$bean, $event, $arguments){
        $code_field = 'class_code';
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            if(empty($bean->$code_field) || $bean->fetched_row['short_course_name'] != $bean->short_course_name || $bean->fetched_row['start_date'] !== $bean->start_date){
                $rs1        = $GLOBALS['db']->query("SELECT code_prefix, team_type FROM teams WHERE id = '{$bean->team_id}'");
                $row_team   = $GLOBALS['db']->fetchByAssoc($rs1);
                $prefix  = $row_team['code_prefix'];
                $date       = new DateTime($bean->start_date);
                $table      = $bean->table_name;
                $sep        = '-';
                $kindofcourse = str_replace(' ', '', strtoupper($bean->short_course_name));
                $str_code   = $prefix . $sep . $kindofcourse . $date->format('y') . $sep;
                $first_pad  = '00000';
                $padding    = 5;
                $query      = "SELECT $code_field FROM $table WHERE ( $code_field <> '' AND $code_field IS NOT NULL) AND id <> '{$bean->id}' AND (LEFT($code_field, ".strlen($prefix).") = '".$prefix."') AND class_type <> 'Waiting Class' ORDER BY RIGHT($code_field, $padding) DESC LIMIT 1";
                $result = $GLOBALS['db']->query($query);
                if($row = $GLOBALS['db']->fetchByAssoc($result))
                    $last_code = $row[$code_field];
                else
                    $last_code = $str_code . $first_pad;      //no codes exist, generate default - PREFIX + CURRENT YEAR +  SEPARATOR + FIRST NUM


                $num        = substr($last_code, -$padding, $padding);
                $num++;
                $pads       = $padding - strlen($num);
                $new_code   = $str_code;

                //preform the lead padding 0
                for($i=0; $i < $pads; $i++)
                    $new_code .= "0";
                $new_code .= $num;

                //write to database - Logic: Before Save
                $bean->$code_field = $new_code;

                //Addition - Module Class
                if($bean->class_type == 'Waiting Class'){
                    $bean->$code_field  .= '-W';
                }
            }
        }elseif(($_POST['class_code_s'] != 'Auto-Generate') && ($bean->class_code != $_POST['class_code_s']) && ($GLOBALS['current_user']->isAdmin())){
            $bean->class_code = $_POST['class_code_s'];
        }
        if(!empty($_POST['name_s']))
            $bean->name = $_POST['name_s'];
        else
            $bean->name = substr($bean->$code_field, strpos($bean->$code_field,'-')+1);
    }

    function handleSave(&$bean, $event, $arguments){
        global $timedate;
        //Check lỗi nghiêm trọng
        if (empty($bean->id)) {
            $GLOBALS['log']->security("Serious error: DELETE SESSIONS - User ID: {$GLOBALS['current_user']->id} - Date: {$GLOBALS['timedate']->nowDate()}");
            die('Something Wrong, Please, try again !!');
        }
        if ($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            if ($bean->class_type == 'Waiting Class') {
                $bean->end_date = $bean->start_date;

            } else {
                if (empty($bean->content) || $bean->content == 'null')
                    die('Something Wrong, Please, try again !!');
                //Fix bug remove upgrade class
                if (!empty($_POST['fetched_row_j_class_j_class_1j_class_ida']) && ($bean->j_class_j_class_1j_class_ida != $_POST['fetched_row_j_class_j_class_1j_class_ida'])) {
                    $GLOBALS['db']->query("UPDATE j_class SET isupgrade = 0 WHERE id='{$_POST['fetched_row_j_class_j_class_1j_class_ida']}'");
                }

                if (!empty($bean->j_class_j_class_1j_class_ida) && $_POST['class_case'] == 'create') {
                    $isq = $GLOBALS['db']->query("SELECT isupgrade, name, class_code, class_type FROM j_class WHERE id = '{$bean->j_class_j_class_1j_class_ida}'");
                    $row = $GLOBALS['db']->fetchByAssoc($isq);
                    if ($row['isupgrade'] == '1') {
                        die('<b>' . $row['class_code'] . '</b> is upgraded. You can\'t choose this class to upgrade again !!');
                    }
                }
                //Making Session
                if ($_POST['class_case'] == 'create' || $_POST['class_case'] == 'change_startdate') {
                    $json_content = json_decode(html_entity_decode($bean->content));
                    //Delete record

                    $ss_remove = get_list_lesson_by_class($bean->id, '', '', 'VIP', '');
                    // TODO - get Quá trình học của học viên
                    if ($_POST['class_case'] == 'change_startdate') {
                        $situationArr = GetStudentsProcessInClass($bean->id);
                    }

                    if (!empty($ss_remove)) {
                        $ss_rmv = "'" . implode("','", array_keys($ss_remove)) . "'";
                        $check = $GLOBALS['db']->getOne("SELECT id FROM meetings where id IN ($ss_rmv)");
                        if (empty($check)) {
                            echo '
                            <script type="text/javascript">
                            alert(" Something Wrong, Please, try again !!");
                            location.href=\'index.php?module=J_Class&action=DetailView&record=' . $bean->id . '\';
                            </script>';
                            die();
                        };
                        $GLOBALS['db']->query("DELETE FROM meetings_contacts WHERE meeting_id IN ($ss_rmv)");
                        $GLOBALS['db']->query("DELETE FROM meetings WHERE id IN ($ss_rmv)");
                    }
                    $newSessionIds = array();
                    $index = 0;
                    //Create new record
                    foreach ($json_content->sessions as $key => $value) {
                        foreach ($value as $ss_date => $ss_value) {
                            $db_start = $ss_value->start_time;
                            $db_end = $ss_value->end_time;
                            //Calculate duration
                            $d1 = strtotime($db_start);
                            $d2 = strtotime($db_end);
                            $interval = $d2 - $d1;
                            $minutes = round($interval / 60);

                            $ss = new Meeting();
                            $ss->name = $bean->name;
                            $ss->date_start = $db_start;
                            $ss->type = 'Sugar';
                            $ss->duration_hours = floor($minutes / 60);
                            $ss->duration_minutes = floor($minutes % 60);

                            $ss->type_of_class = 'Junior';
                            $ss->meeting_type = 'Session';
                            $ss->ju_class_id = $bean->id;
                            $ss->lesson_number = $ss_value->lesson;
                            $ss->teaching_hour = $ss_value->teaching_hour;
                            $ss->delivery_hour = $ss_value->revenue_hour;
                            $ss->week_date = date('l', strtotime('+7 hour ' . $db_start));
                            $ss->update_vcal = false;

                            $ss->team_id = $bean->team_id;
                            $ss->team_set_id = $bean->team_id;
                            $ss->assigned_user_id = $bean->assigned_user_id;
                            $ss->save();
                            $newSessionIds[$index]['id'] = $ss->id;
                            $newSessionIds[$index]['hour'] = $ss->delivery_hour;
                            $newSessionIds[$index]['date'] = $ss->date_start;
                            $index++;
                        }
                    }
                    //Sap xep danh sach session
                    usort($newSessionIds, 'date_compare');
                    //Add hoc vien vao sesson moi
                    if ($_POST['class_case'] == 'change_startdate')
                        addStudentToNewSessions($situationArr, $bean->id);
                } elseif ($_POST['class_case'] == 'change_schedule') { //Incase edit
                    // save history
                    $rs = array();
                    $result = $GLOBALS['db']->getOne("SELECT history FROM j_class WHERE id='{$bean->id}' AND deleted=0");
                    if (!empty($result)) {
                        $rs = json_decode(html_entity_decode($result));
                    }
                    array_push($rs, json_decode(html_entity_decode($bean->history)));
                    $bean->history = json_encode($rs);

                    $json_content = json_decode(html_entity_decode($bean->content));
                    // TODO - get Quá trình học của học viên từ ngày change lịch đến cuối để add lại
                    $situationArr = GetStudentsProcessInClass($bean->id, $_POST['change_date_from']);

                    //Remove học viên ra khỏi lớp từ ngày đổi lịch
                    $ss_remove_stu = get_list_lesson_by_class($bean->id, $_POST['change_date_from'], '', 'VIP', '');
                    $mc_rm = array();
                    if (!empty($mc_rm))
                        $GLOBALS['db']->query("DELETE FROM meetings_contacts WHERE meeting_id IN ('" . implode("','", array_keys($ss_remove_stu)) . "')");

                    //Delete record
                    $meeting_id_rm = array();
                    foreach ($json_content->sessions_remove as $key => $session_id) {
                        $meeting_id_rm[] = $session_id;
                    }
                    if (!empty($meeting_id_rm))
                        $GLOBALS['db']->query("DELETE FROM meetings WHERE id IN ('" . implode("','", $meeting_id_rm) . "')");

                    foreach ($json_content->sessions as $key => $ss_value) {
                        $db_start = $ss_value->start_time;
                        $db_end = $ss_value->end_time;

                        //Calculate duration
                        $d1 = strtotime($db_start);
                        $d2 = strtotime($db_end);
                        $interval = $d2 - $d1;
                        $minutes = round($interval / 60);

                        if (strlen($key) == 36) //Edit Record
                            $ss = BeanFactory::getBean('Meetings', $key);
                        else
                            $ss = new Meeting(); //Create Record

                        $ss->name = $bean->name;
                        $ss->date_start = $db_start;
                        $ss->type = 'Sugar';
                        $ss->duration_hours = floor($minutes / 60);
                        $ss->duration_minutes = floor($minutes % 60);

                        $ss->type_of_class = 'Junior';
                        $ss->meeting_type = 'Session';
                        $ss->ju_class_id = $bean->id;
                        $ss->lesson_number = $ss_value->lesson;
                        $ss->teaching_hour = $ss_value->teaching_hour;
                        $ss->delivery_hour = $ss_value->revenue_hour;
                        $ss->update_vcal = false;
                        $ss->week_date = date('l', strtotime('+7 hour ' . $db_start));

                        $ss->team_id = $bean->team_id;
                        $ss->team_set_id = $bean->team_id;
                        $ss->assigned_user_id = $bean->assigned_user_id;
                        $ss->save();
                    }


                    //GET - Danh sách các buổi học sau khi đã change. TỪ ngày change đến cuối lớp
                    addStudentToNewSessions($situationArr, $bean->id, $_POST['change_date_from']);
                }
                //Update Session no & Class Start-End
                $resClass           = updateClassSession($bean->id, $bean->koc_id);
                $bean->start_date   = $resClass['start_date'];
                $bean->end_date     = $resClass['end_date'];

                $main_schedule = json_decode(html_entity_decode($bean->main_schedule), true);
                $weekday = 0;
                $hasWeekend = false;
                $isLate = false;
                foreach ($main_schedule as $key => $value) {
                    $weekday++;
                    if ($key == "Sat" || $key == "Sun") $hasWeekend = true;
                    foreach ($value as $ind => $schedule) {
                        $startTime = $schedule['start_time'];
                        if (substr($startTime, 0, 2) >= 7 || substr($startTime, 5, 2) == "pm") {
                            $isLate = true;
                            break;
                        }
                    }
                }
                if ($weekday == 1) $bean->class_time_type = '1 ls/w';
                elseif ($weekday == 2) $bean->class_time_type = '2 ls/w';
                else $bean->class_time_type = '3 ls/w';

                $bean->is_weekday = !$hasWeekend;
                $bean->is_lateshift = $isLate;

                //Update class_name
                if (!empty($bean->id)) {
                    $q10 = "UPDATE meetings SET name = '{$bean->name}' WHERE name != '{$bean->name}' AND ju_class_id='{$bean->id}' AND deleted = 0 AND meeting_type = 'Session'";
                    $GLOBALS['db']->query($q10);
                }
                //Remove Temp data
                if (!empty($json_content) && $_POST['class_case'] != 'edit') {
                    unset($json_content->html_situation);
                    unset($json_content->count_unpaid);
                    unset($json_content->sessions);
                    unset($json_content->sessions_remove);
                    $bean->content = json_encode($json_content);
                }
                if (($_POST['class_case'] == 'create' || $_POST['class_case'] == 'change_startdate') && !empty($bean->content)) {
                    $bean->content_2 = $bean->content;
                    $bean->history = '';
                }
            }
            //Custom Adult
            $team_type = getTeamType($bean->team_id);
            if ($team_type == 'Adult' && empty($bean->kind_of_course_adult)) {
                $bean->kind_of_course_adult = $bean->kind_of_course;
                $bean->kind_of_course = '';
            }
        }
        //IMPORT TASK - CLASS
        if ($_POST['module'] == 'Import') {
            $bean->level = str_replace('^', '', $bean->level);
            //Get ID Student
            $koc_id = $GLOBALS['db']->getOne("SELECT id FROM j_kindofcourse WHERE name LIKE '%{$bean->kind_of_course} - " . intval($bean->hours) . "%'");
            if (!empty($koc_id))
                $bean->koc_id = $koc_id;
            else {
                $koc_id = $GLOBALS['db']->getOne("SELECT id FROM j_kindofcourse WHERE name LIKE '%{$bean->kind_of_course}%' ORDER BY name ASC");
                if (!empty($koc_id))
                    $bean->koc_id = $koc_id;
            }

            $user_id = $GLOBALS['db']->getOne("SELECT id FROM users WHERE user_name = '{$bean->created_by}'");
            if (!empty($user_id))
                $bean->created_by = $user_id;

            $bean->modified_user_id = $bean->created_by;
            $bean->date_modified = $bean->date_entered;
            $bean->team_set_id = $bean->team_id;
            $bean->description = $bean->aims_id;

            if (strpos($bean->class_code, $bean->aims_id) === false) {
                $bean->class_code .= '-' . $bean->aims_id;
            }
        }
    }

    function handleAfterSave(&$bean, $event, $arguments){
        require_once('custom/include/_helper/myelt_api.php');
        if ($bean->class_type != 'Waiting Class') {
            // save is upgrade
            if (!empty($bean->j_class_j_class_1j_class_ida))
                $GLOBALS['db']->query("UPDATE j_class SET isupgrade = 1 WHERE id='{$bean->j_class_j_class_1j_class_ida}'");

            //Create Short Schedule
            require_once("custom/include/_helper/junior_class_utils.php");
            $sql = "UPDATE j_class SET short_schedule = '" . generateSmartSchedule($bean->id) . "' WHERE id='{$bean->id}'";
            $GLOBALS['db']->query($sql);
        }
        //Create Gradebook
        $team_type = getTeamType($bean->team_id);
        if ($team_type == 'Junior' && $_POST['class_case'] == 'create'){
            $arrGrade = $GLOBALS['app_list_strings']['gradeconfig_type_options'];
            foreach($arrGrade as $gradeType => $value){
                if(!empty($gradeType)){
                    $grade          = new J_Gradebook();
                    $grade->type    = $gradeType;
                    $grade->minitest= '';
                    $grade->j_class_j_gradebook_1j_class_ida = $bean->id;
                    $grade->date_input = $GLOBALS['timedate']->nowDbDate();

                    $grade->assigned_user_id    = $bean->assigned_user_id;
                    $grade->team_id             = $bean->team_id;
                    $grade->team_set_id         = $bean->team_id;
                    $grade->save();
                }
            }
            //Get config Process by Team
            $q1 = "SELECT id, minitest
            FROM j_gradebookconfig
            WHERE team_id = '{$bean->team_id}' AND koc_id = '{$bean->koc_id}' AND type = 'Progress' AND deleted = 0 AND minitest <> '' AND minitest IS NOT NULL
            ORDER BY CASE
            WHEN
            (minitest = ''
            OR minitest IS NULL)
            THEN
            0
            WHEN minitest = 'minitest1' THEN 1
            WHEN minitest = 'minitest2' THEN 2
            WHEN minitest = 'minitest3' THEN 3
            WHEN minitest = 'minitest4' THEN 4
            WHEN minitest = 'minitest5' THEN 5
            WHEN minitest = 'minitest6' THEN 6
            WHEN minitest = 'project1' THEN 7
            WHEN minitest = 'project2' THEN 8
            WHEN minitest = 'project3' THEN 9
            WHEN minitest = 'project4' THEN 10
            WHEN minitest = 'project5' THEN 11
            WHEN minitest = 'project6' THEN 12
            ELSE 13
            END ASC";
            $rs1 = $GLOBALS['db']->query($q1);
            while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
                $grade          = new J_Gradebook();
                $grade->type    = 'Progress';
                $grade->minitest= $row['minitest'];
                $grade->j_class_j_gradebook_1j_class_ida = $bean->id;
                $grade->date_input = $GLOBALS['timedate']->nowDbDate();

                $grade->assigned_user_id    = $bean->assigned_user_id;
                $grade->team_id             = $bean->team_id;
                $grade->team_set_id         = $bean->team_id;
                $grade->save();
            }
        }


        if ($team_type == 'Junior' && ($_POST['class_case'] == 'change_startdate' || $_POST['class_case'] == 'change_schedule')) {
            $sql_std = "SELECT
            j_class_contacts_1contacts_idb contact_id
            FROM
            j_class_contacts_1_c
            WHERE
            j_class_contacts_1j_class_ida = '{$bean->id}'
            AND deleted = 0 ";
            $rs_std = $GLOBALS['db']->query($sql_std);
            while ($row = $GLOBALS['db']->fetchByAssoc($rs_std)) {
                update_remain_last_date($row['contact_id']);
            }
        }

    }

    function checkBeforeDelete(&$bean, $event, $arguments){
        if ($_POST['module'] == $bean->module_name && $_POST['action'] == 'Delete') {
            $sqlCountSitu = "SELECT DISTINCT
            COUNT(DISTINCT j_studentsituations.id) j_studentsituations__count
            FROM
            j_studentsituations
            INNER JOIN
            j_class l1 ON j_studentsituations.ju_class_id = l1.id
            AND l1.deleted = 0
            WHERE
            ((l1.id = '{$bean->id}'))
            AND j_studentsituations.type IN ('OutStanding', 'Stopped', 'Settle', 'Enrolled', 'Moving In', 'Waiting Class')
            AND j_studentsituations.deleted = 0";
            $countSitu = $GLOBALS['db']->getOne($sqlCountSitu);
            if ($countSitu > 0) {
                echo '
                <script type="text/javascript">
                alert("Please!, Remove all situations in this class before you delete it!");
                location.href=\'index.php?module=J_Class&action=DetailView&record=' . $bean->id . '\';
                </script>';
                die();
            } else {
                if (empty($bean->id)) {
                    $GLOBALS['log']->security("Serious error: DELETE SESSIONS - User ID: {$GLOBALS['current_user']->id} - Date: {$GLOBALS['timedate']->nowDate()}");
                    echo '
                    <script type="text/javascript">
                    alert(" Something Wrong, Please, try again !!");
                    location.href=\'index.php?module=J_Class&action=DetailView&record=' . $bean->id . '\';
                    </script>';
                    die();
                }
                $ss_remove = get_list_lesson_by_class($bean->id, '', '', 'VIP', '');
                foreach ($ss_remove as $session_id => $ss) {
                    $q1 = "DELETE FROM meetings WHERE id ='$session_id'";
                    $GLOBALS['db']->query($q1);
                    $q2 = "DELETE FROM meetings_contacts WHERE meeting_id ='$session_id'";
                    $GLOBALS['db']->query($q2);
                }
                if (!empty($bean->j_class_j_class_1j_class_ida)) {
                    $GLOBALS['db']->query("UPDATE j_class SET isupgrade = 0 WHERE id='{$bean->j_class_j_class_1j_class_ida}'");
                }
            }
        } else {
            $GLOBALS['log']->security("Serious error: DELETE SESSIONS - User ID: {$GLOBALS['current_user']->id} - Date: {$GLOBALS['timedate']->nowDate()}");
            echo '
            <script type="text/javascript">
            alert(" Something Wrong, Please, try again !!");
            location.href=\'index.php?module=J_Class&action=DetailView&record=' . $bean->id . '\';
            </script>';
            die();
        }
    }

    ///to mau id va status Quyen.Cao
    function listViewColorClass(&$bean, $event, $arguments){
        global $timedate;
        $start_date = $timedate->to_db_date($bean->start_date,false);
        $end_date   = $timedate->to_db_date($bean->end_date,false);
        if ($_REQUEST['action'] == 'index' && $_REQUEST['module'] == 'J_Class') {
            //Count student
            if($bean->class_type == 'Waiting Class')
                $count = $GLOBALS['db']->getOne("SELECT DISTINCT
                    COUNT(DISTINCT contacts.id) contacts__count
                    FROM
                    contacts
                    INNER JOIN
                    j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb
                    AND l1_1.deleted = 0
                    INNER JOIN
                    j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida
                    AND l1.deleted = 0
                    WHERE
                    (((l1.id = '{$bean->id}')))
                    AND contacts.deleted = 0");
            elseif($end_date <= date('Y-m-d')){//Closed, Finish show số học viên buổi cuối
                $sql = "SELECT DISTINCT
                IFNULL(COUNT(l1.id), 0) count
                FROM
                meetings
                INNER JOIN
                meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
                AND l1_1.deleted = 0
                INNER JOIN
                contacts l1 ON l1.id = l1_1.contact_id
                AND l1.deleted = 0
                INNER JOIN
                (SELECT
                id, MAX(date_start)
                FROM
                meetings
                WHERE
                ju_class_id = '{$bean->id}'
                AND deleted = 0) ls ON ls.id = meetings.id";
                $count = $GLOBALS['db']->getOne($sql);

            }else //Planning, In Progress show số current
                $count = $GLOBALS['db']->getOne("SELECT DISTINCT
                    IFNULL(COUNT(DISTINCT l2.id), 0) l2__count
                    FROM
                    j_studentsituations
                    INNER JOIN
                    j_class l1 ON j_studentsituations.ju_class_id = l1.id
                    AND l1.deleted = 0
                    INNER JOIN
                    contacts l2 ON j_studentsituations.student_id = l2.id
                    AND l2.deleted = 0
                    WHERE
                    (((j_studentsituations.type IN ('Enrolled' , 'OutStanding',
                    'Settle',
                    'Moving In',
                    'Waiting Class'))
                    AND (l1.id = '{$bean->id}')
                    AND (j_studentsituations.start_study <= '" . date('Y-m-d') . "')
                    AND (j_studentsituations.end_study >= '" . date('Y-m-d') . "')))
                    AND j_studentsituations.deleted = 0
                GROUP BY l1.id");
            $bean->number_of_student = $count;
            if (empty($count)) $bean->number_of_student = 0;


        }
        $bean->class_code = '<span class="textbg_blue">'.$bean->class_code.'</span>';

        switch ($bean->class_type) {
            case "Normal Class":
                $bean->class_type = '<span class="textbg_green">'.$bean->class_type.'</span>';
                break;
            case "Waiting Class":
            $bean->class_type = '<span class="textbg_orange">'.$bean->class_type.'</span>';
            break;
            defaut :
            $bean->class_type = '<b>'.$bean->class_type.'</b>';
            break;
        }
        switch ($bean->status) {
            case "In Progress":
                $bean->status = '<span style="color: #115CAB;font-weight: bold;">'.$bean->status.'</span>';
                break;
            case "Planning":
                $bean->status = '<span style="color: #468931;font-weight: bold;">'.$bean->status.'</span>';
                break;
            case "Closed":
                $bean->status = '<span style="color: #272727;font-weight: bold;">'.$bean->status.'</span>';
                break;
            case "Finish":
                $bean->status = '<span style="color: #A8141B;font-weight: bold;">'.$bean->status.'</span>';
                break;
        }
    }
}

function date_compare($a, $b)
{
    $t1 = strtotime($a['date']);
    $t2 = strtotime($b['date']);
    return $t1 - $t2;
}


?>