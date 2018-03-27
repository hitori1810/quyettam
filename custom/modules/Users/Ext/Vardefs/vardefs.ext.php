<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-06 14:00:49
$dictionary["User"]["fields"]["project_users_1"] = array (
  'name' => 'project_users_1',
  'type' => 'link',
  'relationship' => 'project_users_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'vname' => 'LBL_PROJECT_USERS_1_FROM_PROJECT_TITLE',
  'id_name' => 'project_users_1project_ida',
);


$dictionary['User']['fields']['is_template'] = array(
    'name' => 'is_template',
    'vname' => 'LBL_IS_TEMPLATE',
    'type' => 'bool',
    'required' => false,
    'default' => '0',
    'comment' => 'Should be checked if the user is a template',
    'massupdate' => false,
);

    $dictionary["User"]["fields"]["code"] = array (
        'name' => 'code',
        'vname' => 'LBL_CODE',
        'type' => 'varchar',
        'required' => false,
        'importable' => true,
        'help' => 'Code',
        'len' => '50',
        'size' => '20',
    );
    


?>