<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-05-08 10:50:07
$dictionary['Task']['fields']['description']['required']=true;
$dictionary['Task']['fields']['description']['comments']='Full text of the note';
$dictionary['Task']['fields']['description']['merge_filter']='disabled';
$dictionary['Task']['fields']['description']['calculated']=false;

 

    $dictionary["Task"]["fields"]["parent_name"] = array (
        'name' => 'parent_name',
        'vname' => 'LBL_PARENT_NAME',
        'type' => 'parent',
        'massupdate' => 0,
        'dbtype' => 'varchar',
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'len' => 100,
        'size' => '20',
        'options' => 'parent_type_display',
        'studio' => 'visible',
        'type_name' => 'parent_type',
        'id_name' => 'parent_id',
        'parent_type' => 'parent_type_display',
    );
    $dictionary["Task"]["fields"]["parent_type"] = array (
        'required' => false,
        'name' => 'parent_type',
        'vname' => 'LBL_PARENT_TYPE',
        'type' => 'parent_type',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'len' => 50,
        'size' => '20',
        'default' => '',
        'dbType' => 'varchar',
        'studio' => 'hidden',
    );
    $dictionary["Task"]["fields"]["parent_id"] = array (
        'required' => false,
        'name' => 'parent_id',
        'vname' => 'LBL_PARENT_ID',
        'type' => 'id',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'len' => 36,
        'size' => '20',
    );

?>