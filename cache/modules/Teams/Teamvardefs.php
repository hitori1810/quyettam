<?php 
 $GLOBALS["dictionary"]["Team"]=array (
  'table' => 'teams',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
    ),
    'code_prefix' => 
    array (
      'name' => 'code_prefix',
      'vname' => 'LBL_PREFIX',
      'type' => 'name',
      'dbType' => 'varchar',
      'len' => '30',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_PRIMARY_TEAM_NAME',
      'type' => 'name',
      'dbType' => 'varchar',
      'len' => '128',
    ),
    'name_2' => 
    array (
      'name' => 'name_2',
      'vname' => 'LBL_NAME_2',
      'type' => 'name',
      'dbType' => 'varchar',
      'len' => '128',
      'reportable' => false,
    ),
    'associated_user_id' => 
    array (
      'name' => 'associated_user_id',
      'type' => 'id',
      'reportable' => false,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'required' => true,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'required' => true,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'reportable' => true,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'reportable' => true,
    ),
    'private' => 
    array (
      'name' => 'private',
      'vname' => 'LBL_PRIVATE',
      'type' => 'bool',
      'default' => '0',
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'reportable' => false,
      'required' => false,
    ),
    'users' => 
    array (
      'name' => 'users',
      'type' => 'link',
      'relationship' => 'team_memberships',
      'source' => 'non-db',
      'vname' => 'LBL_USERS',
    ),
    'teams_sets' => 
    array (
      'name' => 'teams_sets',
      'type' => 'link',
      'relationship' => 'team_sets_teams',
      'link_type' => 'many',
      'side' => 'right',
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'studio' => false,
      'duplicate_merge' => 'disabled',
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_ID',
      'type' => 'id',
      'required' => false,
      'reportable' => false,
      'comment' => 'The country this Team belong to',
    ),
    'parent_name' => 
    array (
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
      'reportable' => true,
      'source' => 'non-db',
    ),
    'parent_teams' => 
    array (
      'name' => 'parent_teams',
      'type' => 'link',
      'relationship' => 'team_teams',
      'link_type' => 'one',
      'side' => 'right',
      'source' => 'non-db',
      'vname' => 'LBL_PARENT',
    ),
    'child_teams' => 
    array (
      'name' => 'child_teams',
      'type' => 'link',
      'relationship' => 'team_teams',
      'source' => 'non-db',
      'vname' => 'LBL_CHILD',
    ),
  ),
  'acls' => 
  array (
    'SugarACLAdminOnly' => 
    array (
      'adminFor' => 'Users',
      'allowUserRead' => true,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'teamspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_team_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_team_del_name',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'name',
      ),
    ),
  ),
  'relationships' => 
  array (
    'team_teams' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => false,
);