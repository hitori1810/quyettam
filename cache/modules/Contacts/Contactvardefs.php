<?php 
 $GLOBALS["dictionary"]["Contact"]=array (
  'table' => 'contacts',
  'audited' => true,
  'unified_search' => true,
  'full_text_search' => true,
  'unified_search_default_enabled' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'rname' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '255',
      'db_concat_fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
      ),
      'importable' => 'false',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'studio' => 
      array (
        'portaleditview' => false,
      ),
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'studio' => 
      array (
        'portaleditview' => false,
      ),
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 4,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'contacts_created_by',
      'vname' => 'LBL_CREATED_BY_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'contacts_modified_user',
      'vname' => 'LBL_MODIFIED_BY_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'contacts_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
      'duplicate_merge' => 'enabled',
    ),
    'team_id' => 
    array (
      'name' => 'team_id',
      'vname' => 'LBL_TEAM_ID',
      'group' => 'team_name',
      'reportable' => false,
      'dbType' => 'id',
      'type' => 'team_list',
      'audited' => true,
      'comment' => 'Team ID for the account',
    ),
    'team_set_id' => 
    array (
      'name' => 'team_set_id',
      'rname' => 'id',
      'id_name' => 'team_set_id',
      'vname' => 'LBL_TEAM_SET_ID',
      'type' => 'id',
      'audited' => true,
      'studio' => 'false',
      'dbType' => 'id',
    ),
    'team_count' => 
    array (
      'name' => 'team_count',
      'rname' => 'team_count',
      'id_name' => 'team_id',
      'vname' => 'LBL_TEAMS',
      'join_name' => 'ts1',
      'table' => 'teams',
      'type' => 'relate',
      'required' => 'true',
      'isnull' => 'true',
      'module' => 'Teams',
      'link' => 'team_count_link',
      'massupdate' => false,
      'dbType' => 'int',
      'source' => 'non-db',
      'importable' => 'false',
      'reportable' => false,
      'duplicate_merge' => 'disabled',
      'studio' => 'false',
      'hideacl' => true,
    ),
    'team_name' => 
    array (
      'name' => 'team_name',
      'db_concat_fields' => 
      array (
        0 => 'name',
        1 => 'name_2',
      ),
      'sort_on' => 'tj.name',
      'join_name' => 'tj',
      'rname' => 'name',
      'id_name' => 'team_id',
      'vname' => 'LBL_TEAMS',
      'type' => 'relate',
      'required' => 'true',
      'table' => 'teams',
      'isnull' => 'true',
      'module' => 'Teams',
      'link' => 'team_link',
      'massupdate' => false,
      'dbType' => 'varchar',
      'source' => 'non-db',
      'len' => 36,
      'custom_type' => 'teamset',
      'studio' => 
      array (
        'portallistview' => false,
        'portaldetailview' => false,
        'portaleditview' => false,
      ),
    ),
    'team_link' => 
    array (
      'name' => 'team_link',
      'type' => 'link',
      'relationship' => 'contacts_team',
      'vname' => 'LBL_TEAMS_LINK',
      'link_type' => 'one',
      'module' => 'Teams',
      'bean_name' => 'Team',
      'source' => 'non-db',
      'duplicate_merge' => 'disabled',
      'studio' => 'false',
    ),
    'team_count_link' => 
    array (
      'name' => 'team_count_link',
      'type' => 'link',
      'relationship' => 'contacts_team_count_relationship',
      'link_type' => 'one',
      'module' => 'Teams',
      'bean_name' => 'TeamSet',
      'source' => 'non-db',
      'duplicate_merge' => 'disabled',
      'reportable' => false,
      'studio' => 'false',
    ),
    'teams' => 
    array (
      'name' => 'teams',
      'type' => 'link',
      'relationship' => 'contacts_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'salutation' => 
    array (
      'name' => 'salutation',
      'vname' => 'LBL_SALUTATION',
      'type' => 'enum',
      'options' => 'salutation_dom',
      'massupdate' => false,
      'len' => '255',
      'comment' => 'Contact salutation (e.g., Mr, Ms)',
    ),
    'first_name' => 
    array (
      'name' => 'first_name',
      'vname' => 'LBL_FIRST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'required' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'First name of the contact',
      'merge_filter' => 'selected',
    ),
    'last_name' => 
    array (
      'name' => 'last_name',
      'vname' => 'LBL_LAST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'Last name of the contact',
      'merge_filter' => 'selected',
      'required' => false,
      'importable' => 'required',
    ),
    'full_name' => 
    array (
      'name' => 'full_name',
      'rname' => 'full_name',
      'vname' => 'LBL_NAME',
      'type' => 'fullname',
      'fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '510',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'title' => 
    array (
      'name' => 'title',
      'vname' => 'LBL_TITLE',
      'type' => 'varchar',
      'len' => '100',
      'comment' => 'The title of the contact',
    ),
    'department' => 
    array (
      'name' => 'department',
      'vname' => 'LBL_DEPARTMENT',
      'type' => 'varchar',
      'len' => '255',
      'comment' => 'The department of the contact',
      'merge_filter' => 'enabled',
    ),
    'do_not_call' => 
    array (
      'name' => 'do_not_call',
      'vname' => 'LBL_DO_NOT_CALL',
      'type' => 'bool',
      'default' => '0',
      'audited' => false,
      'comment' => 'An indicator of whether contact can be called',
      'massupdate' => false,
    ),
    'phone_home' => 
    array (
      'name' => 'phone_home',
      'vname' => 'LBL_HOME_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Home phone number of the contact',
      'merge_filter' => 'enabled',
    ),
    'email' => 
    array (
      'name' => 'email',
      'type' => 'email',
      'query_type' => 'default',
      'source' => 'non-db',
      'operator' => 'subquery',
      'subquery' => 'SELECT eabr.bean_id FROM email_addr_bean_rel eabr JOIN email_addresses ea ON (ea.id = eabr.email_address_id) WHERE eabr.deleted=0 AND ea.email_address LIKE',
      'db_field' => 
      array (
        0 => 'id',
      ),
      'vname' => 'LBL_ANY_EMAIL',
      'studio' => 
      array (
        'visible' => false,
        'searchview' => true,
      ),
      'unified_search' => true,
    ),
    'phone_mobile' => 
    array (
      'name' => 'phone_mobile',
      'vname' => 'LBL_MOBILE_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'audited' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Mobile phone number of the contact',
      'merge_filter' => 'enabled',
    ),
    'phone_work' => 
    array (
      'name' => 'phone_work',
      'vname' => 'LBL_OFFICE_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'audited' => false,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Work phone number of the contact',
      'merge_filter' => 'enabled',
    ),
    'phone_other' => 
    array (
      'name' => 'phone_other',
      'vname' => 'LBL_OTHER_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Other phone number for the contact',
      'merge_filter' => 'enabled',
    ),
    'phone_fax' => 
    array (
      'name' => 'phone_fax',
      'vname' => 'LBL_FAX_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Contact fax number',
      'merge_filter' => 'enabled',
    ),
    'email1' => 
    array (
      'name' => 'email1',
      'vname' => 'LBL_EMAIL_ADDRESS',
      'type' => 'varchar',
      'function' => 
      array (
        'name' => 'getEmailAddressWidget',
        'returns' => 'html',
      ),
      'source' => 'non-db',
      'group' => 'email1',
      'merge_filter' => 'enabled',
      'required' => true,
      'studio' => 
      array (
        'editview' => true,
        'editField' => true,
        'searchview' => false,
        'popupsearch' => false,
      ),
      'full_text_search' => 
      array (
        'boost' => 3,
        'analyzer' => 'whitespace',
      ),
    ),
    'email2' => 
    array (
      'name' => 'email2',
      'vname' => 'LBL_OTHER_EMAIL_ADDRESS',
      'type' => 'varchar',
      'function' => 
      array (
        'name' => 'getEmailAddressWidget',
        'returns' => 'html',
      ),
      'source' => 'non-db',
      'group' => 'email2',
      'merge_filter' => 'enabled',
      'studio' => 'false',
    ),
    'invalid_email' => 
    array (
      'name' => 'invalid_email',
      'vname' => 'LBL_INVALID_EMAIL',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'email_opt_out' => 
    array (
      'name' => 'email_opt_out',
      'vname' => 'LBL_EMAIL_OPT_OUT',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'primary_address_street' => 
    array (
      'name' => 'primary_address_street',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'primary_address',
      'comment' => 'Street address for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_street_2' => 
    array (
      'name' => 'primary_address_street_2',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'primary_address_street_3' => 
    array (
      'name' => 'primary_address_street_3',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'primary_address_city' => 
    array (
      'name' => 'primary_address_city',
      'vname' => 'LBL_PRIMARY_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'City for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_state' => 
    array (
      'name' => 'primary_address_state',
      'vname' => 'LBL_PRIMARY_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'State for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_postalcode' => 
    array (
      'name' => 'primary_address_postalcode',
      'vname' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'primary_address',
      'comment' => 'Postal code for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_country' => 
    array (
      'name' => 'primary_address_country',
      'vname' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'primary_address',
      'comment' => 'Country for primary address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street' => 
    array (
      'name' => 'alt_address_street',
      'vname' => 'LBL_ALT_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'alt_address',
      'comment' => 'Street address for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street_2' => 
    array (
      'name' => 'alt_address_street_2',
      'vname' => 'LBL_ALT_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'alt_address_street_3' => 
    array (
      'name' => 'alt_address_street_3',
      'vname' => 'LBL_ALT_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'alt_address_city' => 
    array (
      'name' => 'alt_address_city',
      'vname' => 'LBL_ALT_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'City for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_state' => 
    array (
      'name' => 'alt_address_state',
      'vname' => 'LBL_ALT_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'State for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_postalcode' => 
    array (
      'name' => 'alt_address_postalcode',
      'vname' => 'LBL_ALT_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'alt_address',
      'comment' => 'Postal code for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_country' => 
    array (
      'name' => 'alt_address_country',
      'vname' => 'LBL_ALT_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'alt_address',
      'comment' => 'Country for alternate address',
      'merge_filter' => 'enabled',
    ),
    'assistant' => 
    array (
      'name' => 'assistant',
      'vname' => 'LBL_ASSISTANT',
      'type' => 'varchar',
      'len' => '150',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 2,
      ),
      'comment' => 'Name of the assistant of the contact',
      'merge_filter' => 'enabled',
    ),
    'assistant_phone' => 
    array (
      'name' => 'assistant_phone',
      'vname' => 'LBL_ASSISTANT_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'group' => 'assistant',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Phone number of the assistant of the contact',
      'merge_filter' => 'enabled',
    ),
    'email_addresses_primary' => 
    array (
      'name' => 'email_addresses_primary',
      'type' => 'link',
      'relationship' => 'contacts_email_addresses_primary',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
      'duplicate_merge' => 'disabled',
      'unified_search' => true,
    ),
    'email_addresses' => 
    array (
      'name' => 'email_addresses',
      'type' => 'link',
      'relationship' => 'contacts_email_addresses',
      'module' => 'EmailAddress',
      'bean_name' => 'EmailAddress',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESSES',
      'reportable' => false,
      'rel_fields' => 
      array (
        'primary_address' => 
        array (
          'type' => 'bool',
        ),
      ),
      'unified_search' => true,
    ),
    'email_addresses_non_primary' => 
    array (
      'name' => 'email_addresses_non_primary',
      'type' => 'email',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_NON_PRIMARY',
      'studio' => false,
      'reportable' => false,
      'massupdate' => false,
    ),
    'picture' => 
    array (
      'name' => 'picture',
      'vname' => 'LBL_PICTURE_FILE',
      'type' => 'image',
      'dbtype' => 'varchar',
      'massupdate' => false,
      'reportable' => false,
      'comment' => 'Picture file',
      'len' => '255',
      'width' => '120',
      'height' => '',
      'border' => '',
    ),
    'email_and_name1' => 
    array (
      'name' => 'email_and_name1',
      'rname' => 'email_and_name1',
      'vname' => 'LBL_NAME',
      'type' => 'varchar',
      'source' => 'non-db',
      'len' => '510',
      'importable' => 'false',
    ),
    'lead_source' => 
    array (
      'name' => 'lead_source',
      'vname' => 'LBL_LEAD_SOURCE',
      'type' => 'enum',
      'options' => 'lead_source_list',
      'len' => '255',
      'comment' => 'How did the contact come about',
      'merge_filter' => 'enabled',
      'required' => true,
      'importable' => 'required',
      'audited' => true,
      'massupdate' => true,
    ),
    'activity' => 
    array (
      'name' => 'activity',
      'vname' => 'LBL_ACTIVITY',
      'type' => 'enum',
      'options' => 'activity_source_list',
      'no_default' => false,
      'len' => '100',
      'audited' => false,
      'massupdate' => false,
      'required' => false,
    ),
    'category' => 
    array (
      'name' => 'category',
      'vname' => 'LBL_CATEGORY',
      'type' => 'enum',
      'options' => 'category_list',
      'no_default' => false,
      'len' => '100',
      'massupdate' => false,
      'required' => false,
    ),
    'birthmonth' => 
    array (
      'required' => false,
      'name' => 'birthmonth',
      'vname' => 'LBL_BIRTH_MONTH',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => 'Birth Month',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => 5,
      'size' => '20',
      'options' => 'birth_month_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'account_name' => 
    array (
      'name' => 'account_name',
      'rname' => 'name',
      'id_name' => 'account_id',
      'vname' => 'LBL_ACCOUNT_NAME',
      'join_name' => 'accounts',
      'type' => 'relate',
      'link' => 'accounts',
      'table' => 'accounts',
      'isnull' => 'true',
      'module' => 'Accounts',
      'dbType' => 'varchar',
      'len' => '255',
      'source' => 'non-db',
      'unified_search' => true,
      'massupdate' => false,
    ),
    'account_id' => 
    array (
      'name' => 'account_id',
      'rname' => 'id',
      'id_name' => 'account_id',
      'vname' => 'LBL_ACCOUNT_ID',
      'type' => 'id',
      'table' => 'accounts',
      'isnull' => 'true',
      'module' => 'Accounts',
      'dbType' => 'id',
      'reportable' => false,
      'source' => 'non-db',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
      'link' => 'accounts',
    ),
    'opportunity_role_fields' => 
    array (
      'name' => 'opportunity_role_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'opportunity_role_id',
        'contact_role' => 'opportunity_role',
      ),
      'vname' => 'LBL_ACCOUNT_NAME',
      'type' => 'relate',
      'link' => 'opportunities',
      'link_type' => 'relationship_info',
      'join_link_name' => 'opportunities_contacts',
      'source' => 'non-db',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'studio' => false,
      'massupdate' => 0,
    ),
    'opportunity_role_id' => 
    array (
      'name' => 'opportunity_role_id',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_OPPORTUNITY_ROLE_ID',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'opportunity_role' => 
    array (
      'name' => 'opportunity_role',
      'type' => 'enum',
      'source' => 'non-db',
      'vname' => 'LBL_OPPORTUNITY_ROLE',
      'options' => 'opportunity_relationship_type_dom',
      'massupdate' => false,
    ),
    'reports_to_id' => 
    array (
      'name' => 'reports_to_id',
      'vname' => 'LBL_REPORTS_TO_ID',
      'type' => 'id',
      'required' => false,
      'reportable' => false,
      'comment' => 'The contact this contact reports to',
    ),
    'report_to_name' => 
    array (
      'name' => 'report_to_name',
      'rname' => 'last_name',
      'id_name' => 'reports_to_id',
      'vname' => 'LBL_REPORTS_TO',
      'type' => 'relate',
      'link' => 'reports_to_link',
      'table' => 'contacts',
      'isnull' => 'true',
      'module' => 'Contacts',
      'dbType' => 'varchar',
      'len' => 'id',
      'reportable' => false,
      'source' => 'non-db',
      'massupdate' => 0,
    ),
    'birthdate' => 
    array (
      'name' => 'birthdate',
      'vname' => 'LBL_BIRTHDATE',
      'massupdate' => false,
      'type' => 'date',
      'comment' => 'The birthdate of the contact',
      'unified_search' => true,
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'portal_name' => 
    array (
      'name' => 'portal_name',
      'vname' => 'LBL_PORTAL_NAME',
      'type' => 'varchar',
      'len' => '255',
      'group' => 'portal',
      'comment' => 'Name as it appears in the portal',
      'studio' => 
      array (
        'portaleditview' => false,
        'portaldetailview' => false,
        'portallistview' => false,
      ),
    ),
    'portal_active' => 
    array (
      'name' => 'portal_active',
      'vname' => 'LBL_PORTAL_ACTIVE',
      'type' => 'bool',
      'default' => '1',
      'group' => 'portal',
      'comment' => 'Indicator whether this contact is a portal user',
    ),
    'is_stopped' => 
    array (
      'name' => 'is_stopped',
      'vname' => 'Is Stopped',
      'type' => 'bool',
      'default' => '0',
    ),
    'stopped_date' => 
    array (
      'name' => 'stopped_date',
      'vname' => 'Stopped Date',
      'massupdate' => false,
      'type' => 'date',
      'unified_search' => true,
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'portal_password' => 
    array (
      'name' => 'portal_password',
      'vname' => 'LBL_USER_PASSWORD',
      'type' => 'password',
      'dbType' => 'varchar',
      'len' => '255',
      'group' => 'portal',
      'reportable' => false,
      'studio' => 
      array (
        'listview' => false,
        'portaleditview' => false,
        'portaldetailview' => false,
        'portallistview' => false,
      ),
    ),
    'portal_password1' => 
    array (
      'name' => 'portal_password1',
      'vname' => 'LBL_USER_PASSWORD',
      'type' => 'varchar',
      'source' => 'non-db',
      'len' => '255',
      'group' => 'portal',
      'reportable' => false,
      'importable' => 'false',
      'studio' => 
      array (
        'listview' => false,
        'portaleditview' => false,
        'portaldetailview' => false,
        'portallistview' => false,
      ),
    ),
    'portal_app' => 
    array (
      'name' => 'portal_app',
      'vname' => 'LBL_PORTAL_APP',
      'type' => 'varchar',
      'group' => 'portal',
      'len' => '255',
      'comment' => 'Reference to the portal',
    ),
    'preferred_language' => 
    array (
      'name' => 'preferred_language',
      'type' => 'enum',
      'default' => 'en_us',
      'vname' => 'LBL_PREFERRED_LANGUAGE',
      'options' => 'available_language_dom',
      'popupHelp' => 'LBL_LANG_PREF_TOOLTIP',
      'massupdate' => false,
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'accounts_contacts',
      'link_type' => 'one',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNT',
      'duplicate_merge' => 'disabled',
    ),
    'loyalty_link' => 
    array (
      'name' => 'loyalty_link',
      'type' => 'link',
      'relationship' => 'student_loyaltys',
      'module' => 'J_Loyalty',
      'bean_name' => 'J_Loyalty',
      'source' => 'non-db',
      'vname' => 'LBL_LOYALTY',
    ),
    'membership_link' => 
    array (
      'name' => 'membership_link',
      'type' => 'link',
      'relationship' => 'student_membership',
      'module' => 'C_Memberships',
      'bean_name' => 'C_Memberships',
      'source' => 'non-db',
      'vname' => 'LBL_MEMBERSHIP',
    ),
    'payment_detail_link' => 
    array (
      'name' => 'payment_detail_link',
      'type' => 'link',
      'relationship' => 'student_paymentdetail',
      'module' => 'J_PaymentDetail',
      'bean_name' => 'J_PaymentDetail',
      'source' => 'non-db',
      'vname' => 'LBL_PAYMENTDETAIL',
    ),
    'reports_to_link' => 
    array (
      'name' => 'reports_to_link',
      'type' => 'link',
      'relationship' => 'contact_direct_reports',
      'link_type' => 'one',
      'side' => 'right',
      'source' => 'non-db',
      'vname' => 'LBL_REPORTS_TO',
    ),
    'opportunities' => 
    array (
      'name' => 'opportunities',
      'type' => 'link',
      'relationship' => 'opportunities_contacts',
      'source' => 'non-db',
      'module' => 'Opportunities',
      'bean_name' => 'Opportunity',
      'vname' => 'LBL_OPPORTUNITIES',
    ),
    'bugs' => 
    array (
      'name' => 'bugs',
      'type' => 'link',
      'relationship' => 'contacts_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_BUGS',
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'calls_contacts',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'cases' => 
    array (
      'name' => 'cases',
      'type' => 'link',
      'relationship' => 'contacts_cases',
      'source' => 'non-db',
      'vname' => 'LBL_CASES',
    ),
    'direct_reports' => 
    array (
      'name' => 'direct_reports',
      'type' => 'link',
      'relationship' => 'contact_direct_reports',
      'source' => 'non-db',
      'vname' => 'LBL_DIRECT_REPORTS',
    ),
    'emails' => 
    array (
      'name' => 'emails',
      'type' => 'link',
      'relationship' => 'emails_contacts_rel',
      'source' => 'non-db',
      'vname' => 'LBL_EMAILS',
      'unified_search' => true,
    ),
    'documents' => 
    array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_contacts',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
    ),
    'leads' => 
    array (
      'name' => 'leads',
      'type' => 'link',
      'relationship' => 'contact_leads',
      'source' => 'non-db',
      'vname' => 'LBL_LEADS',
    ),
    'products' => 
    array (
      'name' => 'products',
      'type' => 'link',
      'link_file' => 'modules/Products/AccountLink.php',
      'link_class' => 'AccountLink',
      'relationship' => 'contact_products',
      'source' => 'non-db',
      'vname' => 'LBL_PRODUCTS_TITLE',
    ),
    'contracts' => 
    array (
      'name' => 'contracts',
      'type' => 'link',
      'vname' => 'LBL_CONTRACTS',
      'relationship' => 'contracts_contacts',
      'source' => 'non-db',
      'unified_search' => true,
    ),
    'meetings' => 
    array (
      'name' => 'meetings',
      'type' => 'link',
      'relationship' => 'meetings_contacts',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'contact_notes',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'project' => 
    array (
      'name' => 'project',
      'type' => 'link',
      'relationship' => 'projects_contacts',
      'source' => 'non-db',
      'vname' => 'LBL_PROJECTS',
    ),
    'project_resource' => 
    array (
      'name' => 'project_resource',
      'type' => 'link',
      'relationship' => 'projects_contacts_resources',
      'source' => 'non-db',
      'vname' => 'LBL_PROJECTS_RESOURCES',
    ),
    'quotes' => 
    array (
      'name' => 'quotes',
      'type' => 'link',
      'relationship' => 'quotes_contacts_shipto',
      'source' => 'non-db',
      'ignore_role' => 'true',
      'module' => 'Quotes',
      'bean_name' => 'Quote',
      'vname' => 'LBL_QUOTES_SHIP_TO',
    ),
    'billing_quotes' => 
    array (
      'name' => 'billing_quotes',
      'type' => 'link',
      'relationship' => 'quotes_contacts_billto',
      'source' => 'non-db',
      'ignore_role' => 'true',
      'module' => 'Quotes',
      'bean_name' => 'Quote',
      'vname' => 'LBL_QUOTES_BILL_TO',
    ),
    'tasks' => 
    array (
      'name' => 'tasks',
      'type' => 'link',
      'relationship' => 'contact_tasks',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
    ),
    'tasks_parent' => 
    array (
      'name' => 'tasks_parent',
      'type' => 'link',
      'relationship' => 'contact_tasks_parent',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
      'reportable' => false,
    ),
    'user_sync' => 
    array (
      'name' => 'user_sync',
      'type' => 'link',
      'relationship' => 'contacts_users',
      'source' => 'non-db',
      'vname' => 'LBL_USER_SYNC',
    ),
    'campaign_id' => 
    array (
      'name' => 'campaign_id',
      'comment' => 'Campaign that generated lead',
      'vname' => 'LBL_CAMPAIGN_ID',
      'rname' => 'id',
      'id_name' => 'campaign_id',
      'type' => 'id',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'campaign_name' => 
    array (
      'name' => 'campaign_name',
      'rname' => 'name',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
      'link' => 'campaign_contacts',
      'isnull' => 'true',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'campaigns',
      'id_name' => 'campaign_id',
      'module' => 'Campaigns',
      'duplicate_merge' => 'disabled',
      'comment' => 'The first campaign name for Contact (Meta-data only)',
      'unified_search' => true,
    ),
    'campaigns' => 
    array (
      'name' => 'campaigns',
      'type' => 'link',
      'relationship' => 'contact_campaign_log',
      'module' => 'CampaignLog',
      'bean_name' => 'CampaignLog',
      'source' => 'non-db',
      'vname' => 'LBL_CAMPAIGNLOG',
    ),
    'campaign_contacts' => 
    array (
      'name' => 'campaign_contacts',
      'type' => 'link',
      'vname' => 'LBL_CAMPAIGN_CONTACT',
      'relationship' => 'campaign_contacts',
      'source' => 'non-db',
    ),
    'c_accept_status_fields' => 
    array (
      'name' => 'c_accept_status_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'accept_status_id',
        'accept_status' => 'accept_status_name',
      ),
      'vname' => 'LBL_LIST_ACCEPT_STATUS',
      'type' => 'relate',
      'link' => 'calls',
      'link_type' => 'relationship_info',
      'source' => 'non-db',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'studio' => false,
    ),
    'm_accept_status_fields' => 
    array (
      'name' => 'm_accept_status_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'accept_status_id',
        'accept_status' => 'accept_status_name',
      ),
      'vname' => 'LBL_LIST_ACCEPT_STATUS',
      'type' => 'relate',
      'link' => 'meetings',
      'link_type' => 'relationship_info',
      'source' => 'non-db',
      'importable' => 'false',
      'hideacl' => true,
      'duplicate_merge' => 'disabled',
      'studio' => false,
    ),
    'accept_status_id' => 
    array (
      'name' => 'accept_status_id',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_ACCEPT_STATUS',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'accept_status_name' => 
    array (
      'massupdate' => false,
      'name' => 'accept_status_name',
      'type' => 'enum',
      'studio' => 'false',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_ACCEPT_STATUS',
      'options' => 'dom_meeting_accept_status',
      'importable' => 'false',
    ),
    'prospect_lists' => 
    array (
      'name' => 'prospect_lists',
      'type' => 'link',
      'relationship' => 'prospect_list_contacts',
      'module' => 'ProspectLists',
      'source' => 'non-db',
      'vname' => 'LBL_PROSPECT_LIST',
    ),
    'sync_contact' => 
    array (
      'massupdate' => false,
      'name' => 'sync_contact',
      'vname' => 'LBL_SYNC_CONTACT',
      'type' => 'bool',
      'source' => 'non-db',
      'comment' => 'Synch to outlook?  (Meta-Data only)',
      'studio' => 'true',
    ),
    'contact_id' => 
    array (
      'required' => false,
      'name' => 'contact_id',
      'vname' => 'LBL_CONTACT_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => true,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => 36,
      'size' => '20',
    ),
    'user_id' => 
    array (
      'required' => false,
      'name' => 'user_id',
      'vname' => 'LBL_USER_ID',
      'type' => 'id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => 36,
      'size' => '20',
      'dbType' => 'id',
      'studio' => 'visible',
    ),
    'full_student_name' => 
    array (
      'required' => false,
      'name' => 'full_student_name',
      'vname' => 'LBL_FULL_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => '250',
      'size' => '20',
    ),
    'aims_id' => 
    array (
      'required' => false,
      'name' => 'aims_id',
      'vname' => 'LBL_AIMS_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => 'AIMS ID Int',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => '10',
      'size' => '20',
      'enable_range_search' => true,
      'options' => 'numeric_range_search_dom',
      'disable_num_format' => true,
    ),
    'occupation' => 
    array (
      'required' => false,
      'name' => 'occupation',
      'vname' => 'LBL_OCCUPATION',
      'type' => 'varchar',
      'len' => '120',
    ),
    'payments_corporate' => 
    array (
      'required' => false,
      'name' => 'payments_corporate',
      'vname' => 'LBL_PAYMENT_CORPORATE',
      'type' => 'varchar',
      'len' => '20',
    ),
    'student_type' => 
    array (
      'required' => true,
      'name' => 'student_type',
      'vname' => 'LBL_STUDENT_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '',
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
      'calculated' => false,
      'len' => 50,
      'size' => '20',
      'options' => 'type_team_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'identity_number' => 
    array (
      'required' => false,
      'name' => 'identity_number',
      'vname' => 'LBL_INDENTITY_NUMBER',
      'type' => 'varchar',
      'len' => '100',
      'size' => '20',
      'audited' => true,
    ),
    'identity_date' => 
    array (
      'name' => 'identity_date',
      'vname' => 'LBL_INDENTITY_DATE',
      'massupdate' => false,
      'type' => 'date',
      'unified_search' => false,
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'identity_location' => 
    array (
      'required' => false,
      'name' => 'identity_location',
      'vname' => 'LBL_INDENTITY_LOCATION',
      'type' => 'varchar',
      'len' => '200',
      'size' => '20',
    ),
    'place_of_birth' => 
    array (
      'required' => false,
      'name' => 'place_of_birth',
      'vname' => 'LBL_PLACE_OF_BIRTH',
      'type' => 'varchar',
      'len' => '200',
      'size' => '20',
    ),
    'height' => 
    array (
      'required' => false,
      'name' => 'height',
      'vname' => 'LBL_HEIGHT',
      'type' => 'decimal',
      'audited' => false,
      'dbType' => 'varchar',
      'len' => '20',
      'size' => '5',
      'enable_range_search' => false,
      'no_default' => true,
    ),
    'weight' => 
    array (
      'required' => false,
      'name' => 'weight',
      'vname' => 'LBL_WEIGHT',
      'type' => 'decimal',
      'audited' => false,
      'dbType' => 'varchar',
      'len' => '20',
      'size' => '5',
      'enable_range_search' => false,
      'no_default' => true,
    ),
    'graduated_year' => 
    array (
      'required' => false,
      'name' => 'graduated_year',
      'vname' => 'LBL_GRADUATED_YEAR',
      'type' => 'varchar',
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
      'len' => '100',
      'size' => '20',
      'studio' => 'visible',
    ),
    'experience_year' => 
    array (
      'required' => false,
      'name' => 'experience_year',
      'vname' => 'LBL_EXPERIENCE_YEAR',
      'type' => 'decimal',
      'audited' => false,
      'dbType' => 'varchar',
      'len' => '20',
      'size' => '5',
      'enable_range_search' => false,
      'no_default' => true,
    ),
    'facebook' => 
    array (
      'name' => 'facebook',
      'vname' => 'LBL_FACEBOOK',
      'type' => 'url',
      'dbType' => 'varchar',
      'len' => 255,
      'audited' => true,
      'comment' => 'URL of website for the company',
    ),
    'graduated_rate' => 
    array (
      'required' => false,
      'name' => 'graduated_rate',
      'vname' => 'LBL_GRADUATED_RATE',
      'type' => 'enum',
      'massupdate' => 0,
      'no_default' => false,
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => 100,
      'size' => '20',
      'options' => 'graduated_rate_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'graduated_major' => 
    array (
      'required' => false,
      'name' => 'graduated_major',
      'vname' => 'LBL_GRADUATED_MAJOR',
      'type' => 'varchar',
      'len' => '200',
      'size' => '20',
    ),
    'position' => 
    array (
      'required' => false,
      'name' => 'position',
      'vname' => 'LBL_POSITION',
      'type' => 'varchar',
      'len' => '200',
      'size' => '20',
    ),
    'branch' => 
    array (
      'name' => 'branch',
      'vname' => 'LBL_BRANCH',
      'type' => 'varchar',
      'len' => '255',
      'importable' => 'true',
    ),
    'email_parent_1' => 
    array (
      'name' => 'email_parent_1',
      'vname' => 'LBL_EMAIL_PARENT_1',
      'type' => 'varchar',
      'len' => '150',
      'importable' => 'true',
    ),
    'email_parent_2' => 
    array (
      'name' => 'email_parent_2',
      'vname' => 'LBL_EMAIL_PARENT_2',
      'type' => 'varchar',
      'len' => '150',
      'importable' => 'true',
    ),
    'last_pt_result' => 
    array (
      'name' => 'last_pt_result',
      'vname' => 'LBL_LAST_PT_RESULT',
      'type' => 'varchar',
      'len' => '150',
      'importable' => 'true',
    ),
    'bc_survey_contacts' => 
    array (
      'name' => 'bc_survey_contacts',
      'type' => 'link',
      'relationship' => 'bc_survey_contacts',
      'source' => 'non-db',
      'module' => 'bc_survey',
      'bean_name' => false,
      'vname' => 'LBL_BC_SURVEY_CONTACTS_FROM_BC_SURVEY_TITLE',
    ),
    'bc_survey_submission_contacts' => 
    array (
      'name' => 'bc_survey_submission_contacts',
      'type' => 'link',
      'relationship' => 'bc_survey_submission_contacts',
      'source' => 'non-db',
      'module' => 'bc_survey_submission',
      'bean_name' => false,
      'side' => 'right',
      'vname' => 'LBL_BC_SURVEY_SUBMISSION_CONTACTS_FROM_BC_SURVEY_SUBMISSION_TITLE',
    ),
    'contacts_c_invoices_1' => 
    array (
      'name' => 'contacts_c_invoices_1',
      'type' => 'link',
      'relationship' => 'contacts_c_invoices_1',
      'source' => 'non-db',
      'module' => 'C_Invoices',
      'bean_name' => 'C_Invoices',
      'vname' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
      'id_name' => 'contacts_c_invoices_1contacts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'contacts_c_payments_1' => 
    array (
      'name' => 'contacts_c_payments_1',
      'type' => 'link',
      'relationship' => 'contacts_c_payments_1',
      'source' => 'non-db',
      'module' => 'C_Payments',
      'bean_name' => 'C_Payments',
      'vname' => 'LBL_CONTACTS_C_PAYMENTS_1_FROM_CONTACTS_TITLE',
      'id_name' => 'contacts_c_payments_1contacts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'contacts_c_payments_2' => 
    array (
      'name' => 'contacts_c_payments_2',
      'type' => 'link',
      'relationship' => 'contacts_c_payments_2',
      'source' => 'non-db',
      'module' => 'C_Payments',
      'bean_name' => 'C_Payments',
      'vname' => 'LBL_CONTACTS_C_PAYMENTS_2_FROM_CONTACTS_TITLE',
      'id_name' => 'contacts_c_payments_2contacts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'contacts_c_refunds_1' => 
    array (
      'name' => 'contacts_c_refunds_1',
      'type' => 'link',
      'relationship' => 'contacts_c_refunds_1',
      'source' => 'non-db',
      'module' => 'C_Refunds',
      'bean_name' => 'C_Refunds',
      'vname' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
      'id_name' => 'contacts_c_refunds_1contacts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'contacts_j_feedback_1' => 
    array (
      'name' => 'contacts_j_feedback_1',
      'type' => 'link',
      'relationship' => 'contacts_j_feedback_1',
      'source' => 'non-db',
      'module' => 'J_Feedback',
      'bean_name' => 'J_Feedback',
      'vname' => 'LBL_CONTACTS_J_FEEDBACK_1_FROM_CONTACTS_TITLE',
      'id_name' => 'contacts_j_feedback_1contacts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'contacts_j_ptresult_1' => 
    array (
      'name' => 'contacts_j_ptresult_1',
      'type' => 'link',
      'relationship' => 'contacts_j_ptresult_1',
      'source' => 'non-db',
      'module' => 'J_PTResult',
      'bean_name' => 'J_PTResult',
      'vname' => 'LBL_CONTACTS_J_PTRESULT_1_FROM_CONTACTS_TITLE',
      'id_name' => 'contacts_j_ptresult_1contacts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'c_classes_contacts_1' => 
    array (
      'name' => 'c_classes_contacts_1',
      'type' => 'link',
      'relationship' => 'c_classes_contacts_1',
      'source' => 'non-db',
      'module' => 'C_Classes',
      'bean_name' => 'C_Classes',
      'vname' => 'LBL_C_CLASSES_CONTACTS_1_FROM_C_CLASSES_TITLE',
      'id_name' => 'c_classes_contacts_1c_classes_ida',
    ),
    'c_contacts_contacts_1' => 
    array (
      'name' => 'c_contacts_contacts_1',
      'type' => 'link',
      'relationship' => 'c_contacts_contacts_1',
      'source' => 'non-db',
      'module' => 'C_Contacts',
      'bean_name' => 'C_Contacts',
      'side' => 'right',
      'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE',
      'id_name' => 'c_contacts_contacts_1c_contacts_ida',
      'link-type' => 'one',
    ),
    'c_contacts_contacts_1_name' => 
    array (
      'name' => 'c_contacts_contacts_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_C_CONTACTS_TITLE',
      'save' => true,
      'id_name' => 'c_contacts_contacts_1c_contacts_ida',
      'link' => 'c_contacts_contacts_1',
      'table' => 'c_contacts',
      'module' => 'C_Contacts',
      'rname' => 'name',
    ),
    'c_contacts_contacts_1c_contacts_ida' => 
    array (
      'name' => 'c_contacts_contacts_1c_contacts_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE_ID',
      'id_name' => 'c_contacts_contacts_1c_contacts_ida',
      'link' => 'c_contacts_contacts_1',
      'table' => 'c_contacts',
      'module' => 'C_Contacts',
      'rname' => 'id',
      'reportable' => false,
      'side' => 'right',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
    ),
    'c_memberships_contacts_2' => 
    array (
      'name' => 'c_memberships_contacts_2',
      'type' => 'link',
      'relationship' => 'c_memberships_contacts_2',
      'source' => 'non-db',
      'module' => 'C_Memberships',
      'bean_name' => 'C_Memberships',
      'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE',
      'id_name' => 'c_memberships_contacts_2c_memberships_ida',
    ),
    'c_memberships_contacts_2_name' => 
    array (
      'name' => 'c_memberships_contacts_2_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE',
      'save' => true,
      'id_name' => 'c_memberships_contacts_2c_memberships_ida',
      'link' => 'c_memberships_contacts_2',
      'table' => 'c_memberships',
      'module' => 'C_Memberships',
      'rname' => 'name',
    ),
    'c_memberships_contacts_2c_memberships_ida' => 
    array (
      'name' => 'c_memberships_contacts_2c_memberships_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE_ID',
      'id_name' => 'c_memberships_contacts_2c_memberships_ida',
      'link' => 'c_memberships_contacts_2',
      'table' => 'c_memberships',
      'module' => 'C_Memberships',
      'rname' => 'id',
      'reportable' => false,
      'side' => 'left',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
    ),
    'j_class_contacts_1' => 
    array (
      'name' => 'j_class_contacts_1',
      'type' => 'link',
      'relationship' => 'j_class_contacts_1',
      'source' => 'non-db',
      'module' => 'J_Class',
      'bean_name' => 'J_Class',
      'vname' => 'LBL_J_CLASS_CONTACTS_1_FROM_J_CLASS_TITLE',
      'id_name' => 'j_class_contacts_1j_class_ida',
    ),
    'j_school_contacts_1' => 
    array (
      'name' => 'j_school_contacts_1',
      'type' => 'link',
      'relationship' => 'j_school_contacts_1',
      'source' => 'non-db',
      'module' => 'J_School',
      'bean_name' => 'J_School',
      'side' => 'right',
      'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE',
      'id_name' => 'j_school_contacts_1j_school_ida',
      'link-type' => 'one',
    ),
    'j_school_contacts_1_name' => 
    array (
      'name' => 'j_school_contacts_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE',
      'save' => true,
      'id_name' => 'j_school_contacts_1j_school_ida',
      'link' => 'j_school_contacts_1',
      'table' => 'j_school',
      'module' => 'J_School',
      'rname' => 'name',
    ),
    'j_school_contacts_1j_school_ida' => 
    array (
      'name' => 'j_school_contacts_1j_school_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE_ID',
      'id_name' => 'j_school_contacts_1j_school_ida',
      'link' => 'j_school_contacts_1',
      'table' => 'j_school',
      'module' => 'J_School',
      'rname' => 'id',
      'reportable' => false,
      'side' => 'right',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
    ),
    'leads_contacts_1' => 
    array (
      'name' => 'leads_contacts_1',
      'type' => 'link',
      'relationship' => 'leads_contacts_1',
      'source' => 'non-db',
      'module' => 'Leads',
      'bean_name' => 'Lead',
      'vname' => 'LBL_LEADS_CONTACTS_1_FROM_LEADS_TITLE',
      'id_name' => 'leads_contacts_1leads_ida',
    ),
    'code' => 
    array (
      'name' => 'code',
      'vname' => 'LBL_CODE',
      'type' => 'varchar',
      'required' => false,
      'importable' => true,
      'unified_search' => true,
      'help' => 'Code',
      'len' => '50',
      'size' => '20',
    ),
    'previous_call_relate_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'previous_call_relate_c',
      'vname' => 'LBL_RELATE_CONTACT',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => 'Tick to Relate all Previous Call with this Contact',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => '255',
      'size' => '20',
      'id' => 'Contactsprevious_call_relate_c',
      'custom_module' => 'Contacts',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'contactspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_contacts' => 
    array (
      'name' => 'idx_contacts_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_cont_last_first_phone',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'last_name',
        2 => 'first_name',
        3 => 'phone_mobile',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_contacts_del_last',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'last_name',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_cont_del_reports',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'reports_to_id',
        2 => 'last_name',
      ),
    ),
    3 => 
    array (
      'name' => 'aims_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'aims_id',
      ),
    ),
    4 => 
    array (
      'name' => 'idx_reports_to_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'reports_to_id',
      ),
    ),
    5 => 
    array (
      'name' => 'idx_del_id_user',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'id',
        2 => 'assigned_user_id',
      ),
    ),
    6 => 
    array (
      'name' => 'idx_cont_assigned',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'assigned_user_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'contacts_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'contacts_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'contacts_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'contacts_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'contacts_teams' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'contacts_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'contacts_email_addresses' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'bean_module',
      'relationship_role_column_value' => 'Contacts',
    ),
    'contacts_email_addresses_primary' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'primary_address',
      'relationship_role_column_value' => '1',
    ),
    'contact_direct_reports' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'reports_to_id',
      'relationship_type' => 'one-to-many',
    ),
    'contact_leads' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'contact_id',
      'relationship_type' => 'one-to-many',
    ),
    'contact_notes' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'contact_id',
      'relationship_type' => 'one-to-many',
    ),
    'contact_tasks' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'contact_id',
      'relationship_type' => 'one-to-many',
    ),
    'contact_tasks_parent' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Contacts',
    ),
    'contact_products' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Products',
      'rhs_table' => 'products',
      'rhs_key' => 'contact_id',
      'relationship_type' => 'one-to-many',
    ),
    'contact_campaign_log' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'CampaignLog',
      'rhs_table' => 'campaign_log',
      'rhs_key' => 'target_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'target_type',
      'relationship_role_column_value' => 'Contacts',
    ),
    'student_loyaltys' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'J_Loyalty',
      'rhs_table' => 'j_loyalty',
      'rhs_key' => 'student_id',
      'relationship_type' => 'one-to-many',
    ),
    'student_membership' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Memberships',
      'rhs_table' => 'c_memberships',
      'rhs_key' => 'student_id',
      'relationship_type' => 'one-to-many',
    ),
    'student_paymentdetail' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'J_PaymentDetail',
      'rhs_table' => 'j_paymentdetail',
      'rhs_key' => 'student_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'name_format_map' => 
  array (
    'f' => 'first_name',
    'l' => 'last_name',
    's' => 'salutation',
    't' => 'title',
  ),
  'visibility' => 
  array (
    'TeamSecurity' => true,
  ),
  'templates' => 
  array (
    'person' => 'person',
    'team_security' => 'team_security',
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'favorites' => true,
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => true,
  'acls' => 
  array (
    'SugarACLStatic' => true,
  ),
);