<?php 
 $GLOBALS["dictionary"]["Lead"]=array (
  'table' => 'leads',
  'audited' => true,
  'unified_search' => true,
  'full_text_search' => true,
  'unified_search_default_enabled' => true,
  'duplicate_merge' => true,
  'comment' => 'Leads are persons of interest early in a sales cycle',
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
      'relationship' => 'leads_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'leads_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
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
      'relationship' => 'leads_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
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
      'relationship' => 'leads_team',
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
      'relationship' => 'leads_team_count_relationship',
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
      'relationship' => 'leads_teams',
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
      'len' => '100',
      'comment' => 'Department the lead belongs to',
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
      'relationship' => 'leads_email_addresses_primary',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
      'duplicate_merge' => 'disabled',
    ),
    'email_addresses' => 
    array (
      'name' => 'email_addresses',
      'type' => 'link',
      'relationship' => 'leads_email_addresses',
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
    'converted' => 
    array (
      'name' => 'converted',
      'vname' => 'LBL_CONVERTED',
      'type' => 'bool',
      'default' => '0',
      'comment' => 'Has Lead been converted to a Contact (and other Sugar objects)',
      'massupdate' => false,
    ),
    'refered_by' => 
    array (
      'name' => 'refered_by',
      'vname' => 'LBL_REFERED_BY',
      'type' => 'varchar',
      'len' => '100',
      'comment' => 'Identifies who refered the lead',
      'merge_filter' => 'enabled',
    ),
    'lead_source' => 
    array (
      'name' => 'lead_source',
      'vname' => 'LBL_LEAD_SOURCE',
      'type' => 'enum',
      'options' => 'lead_source_list',
      'no_default' => false,
      'len' => '100',
      'audited' => true,
      'comment' => 'Lead source (ex: Web, print)',
      'merge_filter' => 'enabled',
      'massupdate' => true,
      'required' => true,
      'importable' => 'true',
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
    'occupation' => 
    array (
      'required' => false,
      'name' => 'occupation',
      'vname' => 'LBL_OCCUPATION',
      'type' => 'varchar',
      'len' => '20',
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
    'lead_source_description' => 
    array (
      'name' => 'lead_source_description',
      'vname' => 'LBL_LEAD_SOURCE_DESCRIPTION',
      'type' => 'text',
      'group' => 'lead_source',
      'comment' => 'Description of the lead source',
    ),
    'utm_source' => 
    array (
      'name' => 'utm_source',
      'vname' => 'LBL_UTM_SOURCE',
      'type' => 'varchar',
      'len' => '100',
    ),
    'utm_medium' => 
    array (
      'name' => 'utm_medium',
      'vname' => 'LBL_UTM_MEDIUM',
      'type' => 'varchar',
      'len' => '100',
    ),
    'branch' => 
    array (
      'name' => 'branch',
      'vname' => 'LBL_BRANCH',
      'type' => 'varchar',
      'len' => '255',
      'importable' => 'true',
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'len' => '100',
      'options' => 'lead_status_dom',
      'audited' => true,
      'comment' => 'Status of the lead',
      'merge_filter' => 'enabled',
      'massupdate' => false,
    ),
    'status_description' => 
    array (
      'name' => 'status_description',
      'vname' => 'LBL_STATUS_DESCRIPTION',
      'type' => 'text',
      'group' => 'status',
      'comment' => 'Description of the status of the lead',
    ),
    'reports_to_id' => 
    array (
      'name' => 'reports_to_id',
      'vname' => 'LBL_REPORTS_TO_ID',
      'type' => 'id',
      'reportable' => false,
      'comment' => 'ID of Contact the Lead reports to',
    ),
    'report_to_name' => 
    array (
      'name' => 'report_to_name',
      'rname' => 'name',
      'id_name' => 'reports_to_id',
      'vname' => 'LBL_REPORTS_TO',
      'type' => 'relate',
      'table' => 'contacts',
      'isnull' => 'true',
      'module' => 'Contacts',
      'dbType' => 'varchar',
      'len' => 'id',
      'source' => 'non-db',
      'reportable' => false,
      'massupdate' => false,
    ),
    'reports_to_link' => 
    array (
      'name' => 'reports_to_link',
      'type' => 'link',
      'relationship' => 'lead_direct_reports',
      'link_type' => 'one',
      'side' => 'right',
      'source' => 'non-db',
      'vname' => 'LBL_REPORTS_TO',
      'reportable' => false,
    ),
    'reportees' => 
    array (
      'name' => 'reportees',
      'type' => 'link',
      'relationship' => 'lead_direct_reports',
      'link_type' => 'many',
      'side' => 'left',
      'source' => 'non-db',
      'vname' => 'LBL_REPORTS_TO',
      'reportable' => false,
    ),
    'contacts' => 
    array (
      'name' => 'contacts',
      'type' => 'link',
      'relationship' => 'contact_leads',
      'module' => 'Contacts',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACTS',
      'reportable' => false,
    ),
    'account_name' => 
    array (
      'required' => false,
      'name' => 'account_name',
      'vname' => 'LBL_ACCOUNT_NAME',
      'type' => 'relate',
      'rname' => 'name',
      'id_name' => 'account_id',
      'join_name' => 'accounts',
      'link' => 'accounts',
      'table' => 'accounts',
      'isnull' => 'true',
      'massupdate' => false,
      'module' => 'Accounts',
    ),
    'account_id' => 
    array (
      'name' => 'account_id',
      'type' => 'id',
      'reportable' => false,
      'vname' => 'LBL_ACCOUNT_ID',
      'comment' => 'If converted, Account ID resulting from the conversion',
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'account_leads',
      'link_type' => 'one',
      'source' => 'non-db',
      'module' => 'Accounts',
      'bean_name' => 'Accounts',
      'vname' => 'LBL_ACCOUNT',
      'duplicate_merge' => 'disabled',
    ),
    'account_description' => 
    array (
      'name' => 'account_description',
      'vname' => 'LBL_ACCOUNT_DESCRIPTION',
      'type' => 'text',
      'group' => 'account_name',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Description of lead account',
    ),
    'contact_id' => 
    array (
      'name' => 'contact_id',
      'type' => 'id',
      'reportable' => false,
      'vname' => 'LBL_CONTACT_ID',
      'comment' => 'If converted, Contact ID resulting from the conversion',
    ),
    'contact' => 
    array (
      'name' => 'contact',
      'type' => 'link',
      'link_type' => 'one',
      'relationship' => 'contact_leads',
      'source' => 'non-db',
      'vname' => 'LBL_LEADS',
      'reportable' => false,
    ),
    'opportunity_id' => 
    array (
      'name' => 'opportunity_id',
      'type' => 'id',
      'reportable' => false,
      'vname' => 'LBL_OPPORTUNITY_ID',
      'comment' => 'If converted, Opportunity ID resulting from the conversion',
    ),
    'opportunity' => 
    array (
      'name' => 'opportunity',
      'type' => 'link',
      'link_type' => 'one',
      'relationship' => 'opportunity_leads',
      'source' => 'non-db',
      'vname' => 'LBL_OPPORTUNITIES',
    ),
    'opportunity_name' => 
    array (
      'name' => 'opportunity_name',
      'vname' => 'LBL_OPPORTUNITY_NAME',
      'type' => 'varchar',
      'len' => '255',
      'comment' => 'Opportunity name associated with lead',
    ),
    'opportunity_amount' => 
    array (
      'name' => 'opportunity_amount',
      'vname' => 'LBL_OPPORTUNITY_AMOUNT',
      'type' => 'varchar',
      'group' => 'opportunity_name',
      'len' => '50',
      'comment' => 'Amount of the opportunity',
    ),
    'campaign_id' => 
    array (
      'name' => 'campaign_id',
      'type' => 'id',
      'reportable' => false,
      'vname' => 'LBL_CAMPAIGN_ID',
      'comment' => 'Campaign that generated lead',
    ),
    'campaign_name' => 
    array (
      'name' => 'campaign_name',
      'rname' => 'name',
      'id_name' => 'campaign_id',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
      'link' => 'campaign_leads',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'source' => 'non-db',
      'additionalFields' => 
      array (
        'id' => 'campaign_id',
      ),
    ),
    'campaign_leads' => 
    array (
      'name' => 'campaign_leads',
      'type' => 'link',
      'vname' => 'LBL_CAMPAIGN_LEAD',
      'relationship' => 'campaign_leads',
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
      'source' => 'non-db',
      'vname' => 'LBL_LIST_ACCEPT_STATUS',
      'options' => 'dom_meeting_accept_status',
      'importable' => 'false',
    ),
    'webtolead_email1' => 
    array (
      'name' => 'webtolead_email1',
      'vname' => 'LBL_EMAIL_ADDRESS',
      'type' => 'email',
      'len' => '100',
      'source' => 'non-db',
      'comment' => 'Main email address of lead',
      'importable' => 'false',
      'studio' => 'false',
    ),
    'webtolead_email2' => 
    array (
      'name' => 'webtolead_email2',
      'vname' => 'LBL_OTHER_EMAIL_ADDRESS',
      'type' => 'email',
      'len' => '100',
      'source' => 'non-db',
      'comment' => 'Secondary email address of lead',
      'importable' => 'false',
      'studio' => 'false',
    ),
    'webtolead_email_opt_out' => 
    array (
      'name' => 'webtolead_email_opt_out',
      'vname' => 'LBL_EMAIL_OPT_OUT',
      'type' => 'bool',
      'source' => 'non-db',
      'comment' => 'Indicator signaling if lead elects to opt out of email campaigns',
      'importable' => 'false',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'webtolead_invalid_email' => 
    array (
      'name' => 'webtolead_invalid_email',
      'vname' => 'LBL_INVALID_EMAIL',
      'type' => 'bool',
      'source' => 'non-db',
      'comment' => 'Indicator that email address for lead is invalid',
      'importable' => 'false',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'birthdate' => 
    array (
      'name' => 'birthdate',
      'vname' => 'LBL_BIRTHDATE',
      'massupdate' => false,
      'type' => 'date',
      'comment' => 'The birthdate of the contact',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'unified_search' => true,
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
    'full_lead_name' => 
    array (
      'required' => false,
      'name' => 'full_lead_name',
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
    'portal_name' => 
    array (
      'name' => 'portal_name',
      'vname' => 'LBL_PORTAL_NAME',
      'type' => 'varchar',
      'len' => '255',
      'group' => 'portal',
      'comment' => 'Portal user name when lead created via lead portal',
      'studio' => 'false',
    ),
    'portal_app' => 
    array (
      'name' => 'portal_app',
      'vname' => 'LBL_PORTAL_APP',
      'type' => 'varchar',
      'group' => 'portal',
      'len' => '255',
      'comment' => 'Portal application that resulted in created of lead',
      'studio' => 'false',
    ),
    'website' => 
    array (
      'name' => 'website',
      'vname' => 'LBL_WEBSITE',
      'type' => 'url',
      'dbType' => 'varchar',
      'len' => 255,
      'link_target' => '_blank',
      'comment' => 'URL of website for the company',
    ),
    'tasks' => 
    array (
      'name' => 'tasks',
      'type' => 'link',
      'relationship' => 'lead_tasks',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'lead_notes',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'meetings' => 
    array (
      'name' => 'meetings',
      'type' => 'link',
      'relationship' => 'meetings_leads',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'calls_leads',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'oldmeetings' => 
    array (
      'name' => 'oldmeetings',
      'type' => 'link',
      'relationship' => 'lead_meetings',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'oldcalls' => 
    array (
      'name' => 'oldcalls',
      'type' => 'link',
      'relationship' => 'lead_calls',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'emails' => 
    array (
      'name' => 'emails',
      'type' => 'link',
      'relationship' => 'emails_leads_rel',
      'source' => 'non-db',
      'unified_search' => true,
      'vname' => 'LBL_EMAILS',
    ),
    'campaigns' => 
    array (
      'name' => 'campaigns',
      'type' => 'link',
      'relationship' => 'lead_campaign_log',
      'module' => 'CampaignLog',
      'bean_name' => 'CampaignLog',
      'source' => 'non-db',
      'vname' => 'LBL_CAMPAIGNLOG',
    ),
    'prospect_lists' => 
    array (
      'name' => 'prospect_lists',
      'type' => 'link',
      'relationship' => 'prospect_list_leads',
      'module' => 'ProspectLists',
      'source' => 'non-db',
      'vname' => 'LBL_PROSPECT_LIST',
    ),
    'preferred_language' => 
    array (
      'name' => 'preferred_language',
      'type' => 'enum',
      'default' => 'en_us',
      'vname' => 'LBL_PREFERRED_LANGUAGE',
      'options' => 'available_language_dom',
      'massupdate' => false,
    ),
    'aims_id' => 
    array (
      'required' => true,
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
    'type' => 
    array (
      'name' => 'type',
      'vname' => 'LBL_TYPE',
      'massupdate' => 1,
      'type' => 'enum',
      'default' => 'Public',
      'len' => '20',
      'options' => 'student_type_list',
      'studio' => 'visible',
    ),
    'pt_score' => 
    array (
      'name' => 'pt_score',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_PT_SCORE',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'email_parent_1' => 
    array (
      'name' => 'email_parent_1',
      'vname' => 'LBL_EMAIL_PARENT_1',
      'type' => 'varchar',
      'len' => '255',
      'importable' => 'true',
    ),
    'email_parent_2' => 
    array (
      'name' => 'email_parent_2',
      'vname' => 'LBL_EMAIL_PARENT_2',
      'type' => 'varchar',
      'len' => '255',
      'importable' => 'true',
    ),
    'last_pt_result' => 
    array (
      'name' => 'last_pt_result',
      'vname' => 'LBL_LAST_PT_RESULT',
      'type' => 'varchar',
      'len' => '255',
      'importable' => 'true',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'leadspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_leads' => 
    array (
      'name' => 'idx_leads_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_lead_last_first_phone',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
        2 => 'phone_mobile',
        3 => 'deleted',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_lead_acct_name_first',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'account_name',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_lead_last_first',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
        2 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'idx_leads_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'id',
        1 => 'deleted',
      ),
    ),
    4 => 
    array (
      'name' => 'aims_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'aims_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'leads_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'leads_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'leads_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'leads_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'leads_teams' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'leads_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'leads_email_addresses' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'bean_module',
      'relationship_role_column_value' => 'Leads',
    ),
    'leads_email_addresses_primary' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
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
    'lead_direct_reports' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'reports_to_id',
      'relationship_type' => 'one-to-many',
    ),
    'lead_tasks' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Leads',
    ),
    'lead_notes' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Leads',
    ),
    'lead_meetings' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Leads',
    ),
    'lead_calls' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Leads',
    ),
    'lead_emails' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Leads',
    ),
    'lead_campaign_log' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'CampaignLog',
      'rhs_table' => 'campaign_log',
      'rhs_key' => 'target_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'target_type',
      'relationship_role_column_value' => 'Leads',
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
  'custom_fields' => false,
  'acls' => 
  array (
    'SugarACLStatic' => true,
  ),
);