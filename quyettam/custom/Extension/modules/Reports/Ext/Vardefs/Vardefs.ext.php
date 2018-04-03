<?php
/**
* add new field for report to role, limit result, enable sort on summary with detail report
* 
* @author Hai Nguyen
*/
    $dictionary['SavedReport']['fields']['report_scope_type'] =
    array(
        'name' => 'report_scope_type',
        'vname' => 'LBL_REPORT_SCOPE_TYPE',
        'type' => 'enum',
        'options' => 'report_scope_type_dom',
    );

    $dictionary['SavedReport']['fields']['report_scope'] =
    array(
        'name' => 'report_scope',
        'vname' => 'LBL_REPORT_SCOPE',
        'type' => 'text',
        'required' => false,
        'reportable' => false,
    );

    $dictionary['SavedReport']['fields']['limit_result'] = array(
        'name'          => 'limit_result',
        'vname'         => 'LBL_LIMIT_RESULT',
        'type'          => 'int',
        'len'           => 15
    ); 
    $dictionary['SavedReport']['fields']['custom_url'] = array (
        'name' => 'custom_url',
        'vname' => 'LBL_CUSTOM_URL',
        'type' => 'varchar',
        'len'=>'255',
    );