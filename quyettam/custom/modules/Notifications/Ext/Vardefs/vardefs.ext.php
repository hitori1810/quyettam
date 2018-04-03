<?php 
 //WARNING: The contents of this file are auto-generated


    $dictionary['Notifications']['fields']['parent_name'] =
    array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'parent_name',
        'vname' => 'LBL_FLEX_RELATE',
        'type' => 'parent',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => 25,
        'size' => '20',
        'options' => 'parent_type_display',
        'studio' => 'visible',
        'type_name' => 'parent_type',
        'id_name' => 'parent_id',
        'parent_type' => 'record_type_display',
    );
    $dictionary['Notifications']['fields']['parent_type'] = 
    array (
        'required' => false,
        'name' => 'parent_type',
        'vname' => 'LBL_PARENT_TYPE',
        'type' => 'parent_type',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => 255,
        'size' => '20',
        'dbType' => 'varchar',
        'studio' => 'hidden',
    );
    $dictionary['Notifications']['fields']['parent_id'] = 
    array (
        'required' => false,
        'name' => 'parent_id',
        'vname' => 'LBL_PARENT_ID',
        'type' => 'id',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => 36,
        'size' => '20',
    );


?>