<?php
require_once("custom/include/PHPExcel/Classes/PHPExcel.php");

global $timedate, $current_user;

$fi = new FilesystemIterator("custom/uploads/ReportAttendance", FilesystemIterator::SKIP_DOTS);
if(iterator_count($fi) > 5)
    array_map('unlink', glob("custom/uploads/ReportAttendance/*"));


$objPHPExcel = new PHPExcel();

//get Template
$templateUrl = "custom/include/TemplateExcel/ReportAttendance2.xlsx";

//Import Template
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($templateUrl);

// Set properties
$objPHPExcel->getProperties()->setCreator("Atlantic Center");
$objPHPExcel->getProperties()->setLastModifiedBy("Atlantic Center");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");


//get Class data
$class  = BeanFactory::getBean('J_Class', $_REQUEST['record']);
$from   = $_REQUEST['from'];
$to     = $_REQUEST['to'];
$arr_week = array();
for($i = $from; $i <= $to; $i++)
    $arr_week[] = 'W'.$i;


//get teacher data
$sqlTeacher = "SELECT teacher_id,
teacher_id
FROM meetings
WHERE ju_class_id = '{$class->id}'
AND deleted <> 1
AND session_status <> 'Cancelled'
AND teacher_id <> ''
AND week_no IN ('".implode("','",$arr_week)."')";
$teacherId  = $GLOBALS['db']->getOne($sqlTeacher);
if(!empty($teacherId)){
    $teacher    = BeanFactory::getBean("C_Teachers", $teacherId);
    $teacherName= $teacher->first_name . $teacher->last_name;
}


//get table data
$data = array();
$lessonArr = array();
$scheduleArr = array();
$sqlLesson = "SELECT lesson_number,
id,
DATE_FORMAT(date_start + INTERVAL 420 MINUTE, '%Y-%m-%d') day_schedule_time,
week_no
FROM meetings
WHERE deleted <> 1
AND session_status <> 'Cancelled'
AND ju_class_id = '{$class->id}'
AND week_no IN ('".implode("','",$arr_week)."')
ORDER BY CAST(lesson_number AS UNSIGNED)";
$resLesson = $GLOBALS['db']->query($sqlLesson);
$ss_arr = array();
while($lesson = $GLOBALS['db']->fetchByAssoc($resLesson)){
    $lessonArr[$lesson['week_no']][] = array(
        'lesson'            => $lesson['lesson_number'],
        'day_schedule_time' => $lesson['day_schedule_time'],
        'week_no'           => $lesson['week_no'],
        'date'              => date('d/m',strtotime($lesson['day_schedule_time'])),
    );
    $ss_arr[] = $lesson['id'];
}

$sqlStudents = "SELECT DISTINCT IFNULL(contacts.id,'') student_ids,
IFNULL(contacts.contact_id,'') student_id,
IFNULL(contacts.full_student_name,'') name,
contacts.first_name first_name,
contacts.last_name last_name,
IFNULL(contacts.nick_name,'') nick_name,
IFNULL(contacts.birthdate,'') birthdate,
IFNULL(contacts.gender,'') gender,
IFNULL(MIN(l2.start_study), '') situation_start_study
FROM contacts
INNER JOIN meetings_contacts l1_1 ON contacts.id=l1_1.contact_id AND l1_1.deleted=0
INNER JOIN meetings l1 ON l1.id=l1_1.meeting_id AND l1.deleted=0
INNER JOIN j_studentsituations l2 ON l2.id=l1_1.situation_id AND l2.deleted=0
WHERE contacts.deleted = 0
AND l1.id IN ('".implode("','",$ss_arr)."')
GROUP BY student_ids
UNION
SELECT DISTINCT IFNULL(l.id,'') student_ids,
'' student_id,
IFNULL(l.full_lead_name,'') name,
l.first_name first_name,
l.last_name last_name,
IFNULL(l.nick_name,'') nick_name,
IFNULL(l.birthdate,'') birthdate,
IFNULL(l.gender,'') gender,
IFNULL(MIN(ss.start_study), '') situation_start_study
FROM leads l
INNER JOIN meetings_leads ml ON l.id=ml.lead_id AND l.deleted=0
INNER JOIN meetings m ON m.id=ml.meeting_id AND m.deleted=0
INNER JOIN j_studentsituations ss ON ss.lead_id = l.id AND ss.deleted=0 and ss.ju_class_id = m.ju_class_id
WHERE l.deleted = 0
AND ml.meeting_id IN ('".implode("','",$ss_arr)."')
GROUP BY student_ids
ORDER BY first_name, last_name";
$resStudents = $GLOBALS['db']->query($sqlStudents);
while($student = $GLOBALS['db']->fetchByAssoc($resStudents)){
    if(!is_array($data[$student["student_ids"]]))
        $data[$student["student_ids"]] = array(
            'student_id'        => $student['student_id'],
            'student_name'      => $student['name'],
            'dob'               => $timedate->to_display_date($student['birthdate'],false),
            'gender'            => $student['gender'],
            'join_date'         => $timedate->to_display_date($student['situation_start_study'],false),
            'nick_name'         => $student['nick_name'],
        );

}
$scheduleStr = "Schedule: ";
foreach($scheduleArr as $key => $value){
    if($scheduleStr != "Schedule: ") $scheduleStr .= "/";
    $scheduleStr .= $value;
}

$sheet = $objPHPExcel->getActiveSheet();
//Set Value
$sheet->SetCellValue('C4',$class->class_code);
$sheet->SetCellValue('C5',$teacherName);
$sheet->SetCellValue('C6',$class->start_date);
$sheet->SetCellValue('D6',$class->end_date);
$sheet->SetCellValue('C7',$scheduleStr);
$sheet->SetCellValue('C8','');

//Print Column
$countLesson = 0;
$week_ = '';
$colBegin   = '';
$colFinish  = '';
foreach($lessonArr as $key => $week){
    foreach($week as $value){
        $colIndexStart = 6 + $countLesson;
        if(empty($colBegin)) $colBegin = $colIndexStart;
        $colStart   = PHPExcel_Cell::stringFromColumnIndex($colIndexStart);
        $colEnd     = PHPExcel_Cell::stringFromColumnIndex($colIndexStart + (count($week) - 1) );

        $sheet->SetCellValue($colStart.'9', $value['lesson']);
        if($week_ != $value['week_no']){
            $sheet->mergeCells($colStart.'10:'.$colEnd.'10');
            $sheet->SetCellValue($colStart.'10', $value['week_no']);
            //Set Style
            $sheet->duplicateStyle($sheet->getStyle('G10'), $colStart.'10:'.$colEnd.'10');
            $week_ = $value['week_no'];
        }
        $sheet->SetCellValue($colStart.'11', $value['date']);
        //Set Style
        $sheet->duplicateStyle($sheet->getStyle('G11'), $colStart.'11');
        $sheet->duplicateStyle($sheet->getStyle('G9'), $colStart.'9');
        $countLesson++;

        $index = 1;
        foreach($data as $key => $student_info){
            $row = 11 + $index;
            $data[$key]['attendance'][$value['day_schedule_time']]['lesson']            = $value['lesson'];
            $data[$key]['attendance'][$value['day_schedule_time']]['col']               = $colStart.$row;
            $data[$key]['attendance'][$value['day_schedule_time']]['day_schedule_time'] = $value['day_schedule_time'];
            $index++;
        }
    }
}

//Set Style
$style = array('alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    ),
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
);

$colIndexStart  = 6 + $countLesson;
$colStart       = PHPExcel_Cell::stringFromColumnIndex($colIndexStart);
$sheet->mergeCells($colStart.'10:'.$colStart.'11');
$sheet->SetCellValue($colStart.'10', "Attd %");
$sheet->getStyle($colStart.'10:'.$colStart.'11')->applyFromArray($style);

$colIndexStart = 6 + $countLesson + 1;
$colStart = PHPExcel_Cell::stringFromColumnIndex($colIndexStart);
$sheet->mergeCells($colStart.'10:'.$colStart.'11');
$sheet->SetCellValue($colStart.'10', "Abs.(#)");
$sheet->getStyle($colStart.'10:'.$colStart.'11')->applyFromArray($style);

if(empty($colFinish)) $colFinish = $colIndexStart;

$q1 = "SELECT DISTINCT
IFNULL(l3.id, '') student_id,
DATE_FORMAT(l1.date_start + INTERVAL 420 MINUTE,
'%Y-%m-%d') day_schedule_time,
SUM(IFNULL(IFNULL(c_attendance.absent_for_hour, 0) / 1,
IFNULL(c_attendance.absent_for_hour, 0))) sum_absent_for_hour,
COUNT(*) count_att
FROM
c_attendance
INNER JOIN
meetings l1 ON c_attendance.meeting_id = l1.id
AND l1.deleted = 0
INNER JOIN
j_class l2 ON l1.ju_class_id = l2.id
AND l2.deleted = 0
INNER JOIN
contacts l3 ON c_attendance.student_id = l3.id
AND l3.deleted = 0
WHERE
(((l1.session_status <> 'Cancelled')
AND (l2.id = '{$class->id}') AND ((c_attendance.attended LIKE 'on' OR c_attendance.attended = '1'))))
AND c_attendance.deleted = 0
GROUP BY l3.id , DATE_FORMAT(l1.date_start + INTERVAL 420 MINUTE,
'%Y-%m-%d')
ORDER BY l3.id ASC , l1.date_start ASC";
$rs = $GLOBALS['db']->query($q1);
while($row1 = $GLOBALS['db']->fetchByAssoc($rs)){
    $data[$row1['student_id']]['attendance'][$row1['day_schedule_time']]['sum_absent_for_hour'] = $row1['sum_absent_for_hour'];
}
foreach($data as $key => $value){
    $row = 11 + $countLesson;
    $data[$key]['att'][$colStart.$row] = '';
}

//Print Student
$index = 1;
foreach($data as $key => $value){
    $row = 11 + $index;
    $sheet->SetCellValue('A'.$row, $index);
    $sheet->SetCellValue('B'.$row, $value['student_id']);
    $sheet->SetCellValue('C'.$row, $value['student_name']);
    $sheet->SetCellValue('D'.$row, $value['nick_name']);
    $sheet->SetCellValue('E'.$row, $value['gender']);
    $sheet->SetCellValue('F'.$row, $value['join_date']);
    $index++;
    $sheet->duplicateStyle($sheet->getStyle('A12:F12'), 'A'.$row.':F'.$row);
    foreach($value['attendance'] as $key => $attendance){
        if(!empty($attendance['sum_absent_for_hour'])) $sum = format_number($attendance['sum_absent_for_hour'],2,2);
        else $sum = '';
        $sheet->SetCellValue($attendance['col'], $sum);
        $sheet->duplicateStyle($sheet->getStyle('G12'), $attendance['col']);
    }
}

//Print sign row
$row = $index + 16;
$sheet->getStyle('B'.$row)->getFont()->setBold(true);
$sheet->getStyle('E'.$row)->getFont()->setBold(true);
$sheet->getStyle('H'.$row)->getFont()->setBold(true);
$sheet->SetCellValue('B'.$row, "Prepared");
$sheet->SetCellValue('E'.$row, "Checked");
$sheet->SetCellValue('H'.$row, "Approval");
$row = $row + 5;
$sheet->SetCellValue('B'.$row, "NOTE: Please send students whose names are not on register to EC.");



// Save Excel 2007 file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$section = create_guid_section(6);
$file = 'custom/uploads/ReportAttendance/ReportAttendance-'.$section.'.xlsx';
ob_end_clean();
$objWriter->save($file);
//download to browser
if (file_exists($file)) {
    ob_end_clean();
    header('Content-Description: File Transfer');
    //header('Content-type: application/vnd.ms-excel');
    //    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    unlink($file);
    exit;
}
