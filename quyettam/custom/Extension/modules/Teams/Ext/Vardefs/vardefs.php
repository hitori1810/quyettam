<?php
    //Right Side (n)
    $dictionary['Team']['fields']['parent_id'] = array(
        'name' => 'parent_id',
        'vname' => 'LBL_PARENT_ID',
        'type' => 'id',
        'required'=>false,
        'reportable'=>false,
        'comment' => 'The country this Team belong to'
    );

    $dictionary['Team']['fields']['parent_name'] = array(
        'name' => 'parent_name',
        'rname' => 'name',
        'id_name' => 'parent_id',
        'vname' => 'LBL_PARENT',
        'type' => 'relate',
        'link' => 'parent_teams',
        'table' => 'teams',
        'isnull' => 'true',
        'module' => 'Teams',
        'dbType' => 'varchar',
        'len' => 'id',
        'reportable'=>true,
        'source' => 'non-db',
    );

    $dictionary['Team']['fields']['parent_teams'] = array(
        'name' => 'parent_teams',
        'type' => 'link',
        'relationship' => 'team_teams',
        'link_type' => 'one',
        'side' => 'right',
        'source' => 'non-db',
        'vname' => 'LBL_PARENT',
    );

    //Left side (1)
    $dictionary['Team']['fields']['child_teams'] = array(
        'name' => 'child_teams',
        'type' => 'link',
        'relationship' => 'team_teams',
        'source' => 'non-db',
        'vname' => 'LBL_CHILD',
    );

    $dictionary['Team']['relationships']['team_teams'] = array(
        'lhs_module' => 'Teams',
        'lhs_table' => 'teams',
        'lhs_key' => 'id',
        'rhs_module' => 'Teams',
        'rhs_table' => 'teams',
        'rhs_key' => 'parent_id',
        'relationship_type' => 'one-to-many'
    );