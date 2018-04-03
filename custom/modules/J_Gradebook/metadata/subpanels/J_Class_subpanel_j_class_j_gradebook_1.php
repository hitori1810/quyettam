<?php
// created: 2016-07-28 07:45:06
$subpanel_layout['orderBy'] = "    
ORDER BY CASE WHEN
(j_gradebook.type = '' OR j_gradebook.type IS NULL) THEN 0
WHEN j_gradebook.type = 'Progress' THEN 1
WHEN j_gradebook.type = 'Commitment' THEN 2
WHEN j_gradebook.type = 'Overall' THEN 3
ELSE 4
END ASC,
CASE WHEN
(j_gradebook.minitest = '' OR minitest IS NULL) THEN 0
WHEN j_gradebook.minitest = 'minitest1' THEN 1
WHEN j_gradebook.minitest = 'minitest2' THEN 2
WHEN j_gradebook.minitest = 'minitest3' THEN 3
WHEN j_gradebook.minitest = 'minitest4' THEN 4
WHEN j_gradebook.minitest = 'minitest5' THEN 5
WHEN j_gradebook.minitest = 'minitest6' THEN 6
WHEN j_gradebook.minitest = 'project1' THEN 7
WHEN j_gradebook.minitest = 'project2' THEN 8
WHEN j_gradebook.minitest = 'project3' THEN 9
WHEN j_gradebook.minitest = 'project4' THEN 10
WHEN j_gradebook.minitest = 'project5' THEN 11
WHEN j_gradebook.minitest = 'project6' THEN 12
ELSE 13
END ASC ";
$subpanel_layout['list_fields'] = array (
    'name' =>
    array (
        'vname' => 'LBL_NAME',
        'widget_class' => 'SubPanelDetailViewLink',
        'width' => '25%',
        'default' => true,
    ),
    'status' =>
    array (
        'type' => 'enum',
        'default' => true,
        'vname' => 'LBL_STATUS',
        'width' => '10%',
    ),
    'date_confirm' =>
    array (
        'type' => 'date',
        'vname' => 'LBL_DATE_CONFIRM',
        'width' => '10%',
        'default' => true,
    ),
    'date_input' =>
    array (
        'type' => 'date',
        'vname' => 'LBL_DATE_INPUT',
        'width' => '10%',
        'default' => true,
    ),
    'c_teachers_j_gradebook_1_name' =>
    array (
        'type' => 'relate',
        'link' => true,
        'vname' => 'LBL_C_TEACHERS_J_GRADEBOOK_1_FROM_C_TEACHERS_TITLE',
        'id' => 'C_TEACHERS_J_GRADEBOOK_1C_TEACHERS_IDA',
        'width' => '10%',
        'default' => true,
        'widget_class' => 'SubPanelDetailViewLink',
        'target_module' => 'C_Teachers',
        'target_record_key' => 'c_teachers_j_gradebook_1c_teachers_ida',
    ),

    'date_modified' =>
    array (
        'vname' => 'LBL_DATE_MODIFIED',
        'width' => '15%',
        'default' => true,
    ),
    'edit_button' =>
    array (
        'vname' => 'LBL_EDIT_BUTTON',
        'widget_class' => 'SubPanelEditButton',
        'module' => 'J_Gradebook',
        'width' => '4%',
        'default' => true,
    ),
);