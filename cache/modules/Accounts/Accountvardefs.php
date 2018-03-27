<?php 
 $GLOBALS["dictionary"]["Account"]=array (
  'table' => 'accounts',
  'audited' => true,
  'unified_search' => true,
  'full_text_search' => true,
  'unified_search_default_enabled' => true,
  'duplicate_merge' => true,
  'comment' => 'Accounts are organizations or entities that are the target of selling, support, and marketing activities, or have already purchased products or services',
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
      'type' => 'name',
      'dbType' => 'varchar',
      'vname' => 'LBL_NAME',
      'len' => 150,
      'comment' => 'Name of the Company',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'audited' => true,
      'required' => true,
      'importable' => 'required',
      'merge_filter' => 'selected',
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
      'rows' => '4',
      'cols' => '60',
      'comments' => 'Full text of the note',
      'merge_filter' => 'disabled',
      'calculated' => false,
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
      'relationship' => 'accounts_created_by',
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
      'relationship' => 'accounts_modified_user',
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
      'relationship' => 'accounts_assigned_user',
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
      'relationship' => 'accounts_team',
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
      'relationship' => 'accounts_team_count_relationship',
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
      'relationship' => 'accounts_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'account_type' => 
    array (
      'name' => 'account_type',
      'vname' => 'LBL_TYPE',
      'type' => 'enum',
      'options' => 'account_type_dom',
      'len' => 50,
      'comment' => 'The Company is of this type',
    ),
    'industry' => 
    array (
      'name' => 'industry',
      'vname' => 'LBL_INDUSTRY',
      'type' => 'enum',
      'options' => 'industry_dom',
      'len' => 50,
      'comment' => 'The company belongs in this industry',
      'merge_filter' => 'enabled',
    ),
    'annual_revenue' => 
    array (
      'name' => 'annual_revenue',
      'vname' => 'LBL_ANNUAL_REVENUE',
      'type' => 'varchar',
      'len' => 100,
      'comment' => 'Annual revenue for this company',
      'merge_filter' => 'enabled',
    ),
    'phone_fax' => 
    array (
      'name' => 'phone_fax',
      'vname' => 'LBL_FAX',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'The fax phone number of this company',
    ),
    'billing_address_street' => 
    array (
      'name' => 'billing_address_street',
      'vname' => 'LBL_BILLING_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'comment' => 'The street address used for billing address',
      'group' => 'billing_address',
      'merge_filter' => 'enabled',
    ),
    'billing_address_street_2' => 
    array (
      'name' => 'billing_address_street_2',
      'vname' => 'LBL_BILLING_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'billing_address_street_3' => 
    array (
      'name' => 'billing_address_street_3',
      'vname' => 'LBL_BILLING_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'billing_address_street_4' => 
    array (
      'name' => 'billing_address_street_4',
      'vname' => 'LBL_BILLING_ADDRESS_STREET_4',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'billing_address_city' => 
    array (
      'name' => 'billing_address_city',
      'vname' => 'LBL_BILLING_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'comment' => 'The city used for billing address',
      'group' => 'billing_address',
      'merge_filter' => 'enabled',
    ),
    'billing_address_state' => 
    array (
      'name' => 'billing_address_state',
      'vname' => 'LBL_BILLING_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'billing_address',
      'comment' => 'The state used for billing address',
      'merge_filter' => 'enabled',
    ),
    'billing_address_postalcode' => 
    array (
      'name' => 'billing_address_postalcode',
      'vname' => 'LBL_BILLING_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'billing_address',
      'comment' => 'The postal code used for billing address',
      'merge_filter' => 'enabled',
    ),
    'billing_address_country' => 
    array (
      'name' => 'billing_address_country',
      'vname' => 'LBL_BILLING_ADDRESS_COUNTRY',
      'type' => 'enum',
      'group' => 'billing_address',
      'comment' => 'The country used for the billing address',
      'merge_filter' => 'enabled',
      'options' => 'countries_list_dom',
      'len' => '50',
    ),
    'rating' => 
    array (
      'name' => 'rating',
      'vname' => 'LBL_RATING',
      'type' => 'varchar',
      'len' => 100,
      'comment' => 'An arbitrary rating for this company for use in comparisons with others',
    ),
    'phone_office' => 
    array (
      'name' => 'phone_office',
      'vname' => 'LBL_PHONE_OFFICE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'audited' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'The office phone number',
      'merge_filter' => 'enabled',
    ),
    'phone_alternate' => 
    array (
      'name' => 'phone_alternate',
      'vname' => 'LBL_PHONE_ALT',
      'type' => 'phone',
      'group' => 'phone_office',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'An alternate phone number',
      'merge_filter' => 'enabled',
    ),
    'website' => 
    array (
      'name' => 'website',
      'vname' => 'LBL_WEBSITE',
      'type' => 'url',
      'dbType' => 'varchar',
      'len' => 255,
      'comment' => 'URL of website for the company',
    ),
    'ownership' => 
    array (
      'name' => 'ownership',
      'vname' => 'LBL_OWNERSHIP',
      'type' => 'varchar',
      'len' => 100,
      'comment' => '',
    ),
    'employees' => 
    array (
      'name' => 'employees',
      'vname' => 'LBL_EMPLOYEES',
      'type' => 'varchar',
      'len' => 10,
      'comment' => 'Number of employees, varchar to accomodate for both number (100) or range (50-100)',
    ),
    'ticker_symbol' => 
    array (
      'name' => 'ticker_symbol',
      'vname' => 'LBL_TICKER_SYMBOL',
      'type' => 'varchar',
      'len' => 10,
      'comment' => 'The stock trading (ticker) symbol for the company',
      'merge_filter' => 'enabled',
    ),
    'shipping_address_street' => 
    array (
      'name' => 'shipping_address_street',
      'vname' => 'LBL_SHIPPING_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => 150,
      'group' => 'shipping_address',
      'comment' => 'The street address used for for shipping purposes',
      'merge_filter' => 'enabled',
    ),
    'shipping_address_street_2' => 
    array (
      'name' => 'shipping_address_street_2',
      'vname' => 'LBL_SHIPPING_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => 150,
      'source' => 'non-db',
    ),
    'shipping_address_street_3' => 
    array (
      'name' => 'shipping_address_street_3',
      'vname' => 'LBL_SHIPPING_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => 150,
      'source' => 'non-db',
    ),
    'shipping_address_street_4' => 
    array (
      'name' => 'shipping_address_street_4',
      'vname' => 'LBL_SHIPPING_ADDRESS_STREET_4',
      'type' => 'varchar',
      'len' => 150,
      'source' => 'non-db',
    ),
    'shipping_address_city' => 
    array (
      'name' => 'shipping_address_city',
      'vname' => 'LBL_SHIPPING_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => 100,
      'group' => 'shipping_address',
      'comment' => 'The city used for the shipping address',
      'merge_filter' => 'enabled',
    ),
    'shipping_address_state' => 
    array (
      'name' => 'shipping_address_state',
      'vname' => 'LBL_SHIPPING_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => 100,
      'group' => 'shipping_address',
      'comment' => 'The state used for the shipping address',
      'merge_filter' => 'enabled',
    ),
    'shipping_address_postalcode' => 
    array (
      'name' => 'shipping_address_postalcode',
      'vname' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => 20,
      'group' => 'shipping_address',
      'comment' => 'The zip code used for the shipping address',
      'merge_filter' => 'enabled',
    ),
    'shipping_address_country' => 
    array (
      'name' => 'shipping_address_country',
      'vname' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
      'type' => 'enum',
      'group' => 'billing_address',
      'comment' => 'The country used for the billing address',
      'merge_filter' => 'enabled',
      'options' => 'countries_list_dom',
      'len' => '50',
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
    'email_addresses_primary' => 
    array (
      'name' => 'email_addresses_primary',
      'type' => 'link',
      'relationship' => 'accounts_email_addresses_primary',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
      'duplicate_merge' => 'disabled',
      'studio' => 
      array (
        'formula' => false,
      ),
    ),
    'email_addresses' => 
    array (
      'name' => 'email_addresses',
      'type' => 'link',
      'relationship' => 'accounts_email_addresses',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESSES',
      'reportable' => false,
      'unified_search' => true,
      'rel_fields' => 
      array (
        'primary_address' => 
        array (
          'type' => 'bool',
        ),
      ),
      'studio' => 
      array (
        'formula' => false,
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
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_ACCOUNT_ID',
      'type' => 'id',
      'required' => false,
      'reportable' => false,
      'audited' => true,
      'comment' => 'Account ID of the parent of this account',
    ),
    'sic_code' => 
    array (
      'name' => 'sic_code',
      'vname' => 'LBL_SIC_CODE',
      'type' => 'varchar',
      'len' => 10,
      'comment' => 'SIC code of the account',
      'merge_filter' => 'enabled',
    ),
    'parent_name' => 
    array (
      'name' => 'parent_name',
      'rname' => 'name',
      'id_name' => 'parent_id',
      'vname' => 'LBL_MEMBER_OF',
      'type' => 'relate',
      'isnull' => 'true',
      'module' => 'Accounts',
      'table' => 'accounts',
      'massupdate' => false,
      'source' => 'non-db',
      'len' => 36,
      'link' => 'member_of',
      'unified_search' => true,
      'importable' => 'true',
    ),
    'members' => 
    array (
      'name' => 'members',
      'type' => 'link',
      'relationship' => 'member_accounts',
      'module' => 'Accounts',
      'bean_name' => 'Account',
      'source' => 'non-db',
      'vname' => 'LBL_MEMBERS',
    ),
    'member_of' => 
    array (
      'name' => 'member_of',
      'type' => 'link',
      'relationship' => 'member_accounts',
      'module' => 'Accounts',
      'bean_name' => 'Account',
      'link_type' => 'one',
      'source' => 'non-db',
      'vname' => 'LBL_MEMBER_OF',
      'side' => 'right',
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
    'invalid_email' => 
    array (
      'name' => 'invalid_email',
      'vname' => 'LBL_INVALID_EMAIL',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'cases' => 
    array (
      'name' => 'cases',
      'type' => 'link',
      'relationship' => 'account_cases',
      'module' => 'Cases',
      'bean_name' => 'aCase',
      'source' => 'non-db',
      'vname' => 'LBL_CASES',
    ),
    'tasks' => 
    array (
      'name' => 'tasks',
      'type' => 'link',
      'relationship' => 'account_tasks',
      'module' => 'Tasks',
      'bean_name' => 'Task',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'account_notes',
      'module' => 'Notes',
      'bean_name' => 'Note',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'meetings' => 
    array (
      'name' => 'meetings',
      'type' => 'link',
      'relationship' => 'account_meetings',
      'module' => 'Meetings',
      'bean_name' => 'Meeting',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'account_calls',
      'module' => 'Calls',
      'bean_name' => 'Call',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'emails' => 
    array (
      'name' => 'emails',
      'type' => 'link',
      'relationship' => 'emails_accounts_rel',
      'module' => 'Emails',
      'bean_name' => 'Email',
      'source' => 'non-db',
      'vname' => 'LBL_EMAILS',
      'studio' => 
      array (
        'formula' => false,
      ),
      'unified_search' => true,
    ),
    'documents' => 
    array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_accounts',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
    ),
    'bugs' => 
    array (
      'name' => 'bugs',
      'type' => 'link',
      'relationship' => 'accounts_bugs',
      'module' => 'Bugs',
      'bean_name' => 'Bug',
      'source' => 'non-db',
      'vname' => 'LBL_BUGS',
    ),
    'contacts' => 
    array (
      'name' => 'contacts',
      'type' => 'link',
      'relationship' => 'accounts_contacts',
      'module' => 'Contacts',
      'bean_name' => 'Contact',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACTS',
    ),
    'opportunities' => 
    array (
      'name' => 'opportunities',
      'type' => 'link',
      'relationship' => 'accounts_opportunities',
      'module' => 'Opportunities',
      'bean_name' => 'Opportunity',
      'source' => 'non-db',
      'vname' => 'LBL_OPPORTUNITY',
    ),
    'quotes' => 
    array (
      'name' => 'quotes',
      'type' => 'link',
      'relationship' => 'quotes_billto_accounts',
      'source' => 'non-db',
      'module' => 'Quotes',
      'bean_name' => 'Quote',
      'ignore_role' => true,
      'vname' => 'LBL_QUOTES',
    ),
    'quotes_shipto' => 
    array (
      'name' => 'quotes_shipto',
      'type' => 'link',
      'relationship' => 'quotes_shipto_accounts',
      'module' => 'Quotes',
      'bean_name' => 'Quote',
      'source' => 'non-db',
      'vname' => 'LBL_QUOTES_SHIP_TO',
    ),
    'project' => 
    array (
      'name' => 'project',
      'type' => 'link',
      'relationship' => 'projects_accounts',
      'module' => 'Project',
      'bean_name' => 'Project',
      'source' => 'non-db',
      'vname' => 'LBL_PROJECTS',
    ),
    'leads' => 
    array (
      'name' => 'leads',
      'type' => 'link',
      'relationship' => 'account_leads',
      'module' => 'Leads',
      'bean_name' => 'Lead',
      'source' => 'non-db',
      'vname' => 'LBL_LEADS',
    ),
    'campaigns' => 
    array (
      'name' => 'campaigns',
      'type' => 'link',
      'relationship' => 'account_campaign_log',
      'module' => 'CampaignLog',
      'bean_name' => 'CampaignLog',
      'source' => 'non-db',
      'vname' => 'LBL_CAMPAIGNLOG',
      'studio' => 
      array (
        'formula' => false,
      ),
    ),
    'campaign_accounts' => 
    array (
      'name' => 'campaign_accounts',
      'type' => 'link',
      'vname' => 'LBL_CAMPAIGNS',
      'relationship' => 'campaign_accounts',
      'source' => 'non-db',
    ),
    'products' => 
    array (
      'name' => 'products',
      'type' => 'link',
      'link_file' => 'modules/Products/AccountLink.php',
      'link_class' => 'AccountLink',
      'relationship' => 'products_accounts',
      'source' => 'non-db',
      'vname' => 'LBL_PRODUCTS',
    ),
    'contracts' => 
    array (
      'name' => 'contracts',
      'type' => 'link',
      'relationship' => 'account_contracts',
      'source' => 'non-db',
      'vname' => 'LBL_CONTRACTS',
    ),
    'campaign_id' => 
    array (
      'name' => 'campaign_id',
      'comment' => 'Campaign that generated Account',
      'vname' => 'LBL_CAMPAIGN_ID',
      'rname' => 'id',
      'id_name' => 'campaign_id',
      'type' => 'id',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'reportable' => false,
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'campaign_name' => 
    array (
      'name' => 'campaign_name',
      'rname' => 'name',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'campaigns',
      'id_name' => 'campaign_id',
      'link' => 'campaign_accounts',
      'module' => 'Campaigns',
      'duplicate_merge' => 'disabled',
      'comment' => 'The first campaign name for Account (Meta-data only)',
    ),
    'prospect_lists' => 
    array (
      'name' => 'prospect_lists',
      'type' => 'link',
      'relationship' => 'prospect_list_accounts',
      'module' => 'ProspectLists',
      'source' => 'non-db',
      'vname' => 'LBL_PROSPECT_LIST',
    ),
    'accounts_campaigns_1' => 
    array (
      'name' => 'accounts_campaigns_1',
      'type' => 'link',
      'relationship' => 'accounts_campaigns_1',
      'source' => 'non-db',
      'module' => 'Campaigns',
      'bean_name' => 'Campaign',
      'vname' => 'LBL_ACCOUNTS_CAMPAIGNS_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_campaigns_1accounts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'accounts_c_bookinghotel_1' => 
    array (
      'name' => 'accounts_c_bookinghotel_1',
      'type' => 'link',
      'relationship' => 'accounts_c_bookinghotel_1',
      'source' => 'non-db',
      'module' => 'C_BookingHotel',
      'bean_name' => 'C_BookingHotel',
      'vname' => 'LBL_ACCOUNTS_C_BOOKINGHOTEL_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_c_bookinghotel_1accounts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'accounts_c_bookingticket_1' => 
    array (
      'name' => 'accounts_c_bookingticket_1',
      'type' => 'link',
      'relationship' => 'accounts_c_bookingticket_1',
      'source' => 'non-db',
      'module' => 'C_BookingTicket',
      'bean_name' => 'C_BookingTicket',
      'vname' => 'LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_c_bookingticket_1accounts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'accounts_c_bookingtour_1' => 
    array (
      'name' => 'accounts_c_bookingtour_1',
      'type' => 'link',
      'relationship' => 'accounts_c_bookingtour_1',
      'source' => 'non-db',
      'module' => 'C_BookingTour',
      'bean_name' => 'C_BookingTour',
      'vname' => 'LBL_ACCOUNTS_C_BOOKINGTOUR_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_c_bookingtour_1accounts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'accounts_c_ticketreport_1' => 
    array (
      'name' => 'accounts_c_ticketreport_1',
      'type' => 'link',
      'relationship' => 'accounts_c_ticketreport_1',
      'source' => 'non-db',
      'module' => 'C_TicketReport',
      'bean_name' => 'C_TicketReport',
      'vname' => 'LBL_ACCOUNTS_C_TICKETREPORT_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_c_ticketreport_1accounts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'accounts_c_ticket_1' => 
    array (
      'name' => 'accounts_c_ticket_1',
      'type' => 'link',
      'relationship' => 'accounts_c_ticket_1',
      'source' => 'non-db',
      'module' => 'C_Ticket',
      'bean_name' => 'C_Ticket',
      'vname' => 'LBL_ACCOUNTS_C_TICKET_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_c_ticket_1accounts_ida',
      'link-type' => 'many',
      'side' => 'left',
    ),
    'project_i_d_c' => 
    array (
      'labelValue' => 'Project ID',
      'enforced' => '',
      'dependency' => '',
    ),
    'short_name' => 
    array (
      'name' => 'short_name',
      'vname' => 'LBL_SHORT_NAME',
      'type' => 'varchar',
      'len' => 150,
      'unified_search' => true,
    ),
    'tax_code' => 
    array (
      'name' => 'tax_code',
      'vname' => 'LBL_TAX_CODE',
      'type' => 'varchar',
      'len' => 50,
      'unified_search' => true,
    ),
    'mobile_phone' => 
    array (
      'name' => 'mobile_phone',
      'vname' => 'LBL_MOBILE_PHONE',
      'type' => 'varchar',
      'len' => 50,
      'unified_search' => true,
    ),
    'bank_name' => 
    array (
      'name' => 'bank_name',
      'vname' => 'LBL_BANK_NAME',
      'type' => 'enum',
      'options' => 'bank_name_options',
    ),
    'bank_account_number' => 
    array (
      'name' => 'bank_account_number',
      'vname' => 'LBL_BANK_ACCOUNT_NUMBER',
      'type' => 'varchar',
    ),
    'bank_account_holder' => 
    array (
      'name' => 'bank_account_holder',
      'vname' => 'LBL_BANK_ACCOUNT_HOLDER',
      'type' => 'varchar',
    ),
    'bank_branch' => 
    array (
      'name' => 'bank_branch',
      'vname' => 'LBL_BANK_BRANCH',
      'type' => 'varchar',
    ),
    'dob_day' => 
    array (
      'required' => false,
      'name' => 'dob_day',
      'vname' => 'LBL_DAY',
      'type' => 'enum',
      'len' => 10,
      'key' => 'dob',
      'options' => 'day_options',
    ),
    'dob_month' => 
    array (
      'required' => false,
      'name' => 'dob_month',
      'vname' => 'LBL_MONTH',
      'type' => 'enum',
      'len' => 10,
      'key' => 'dob',
      'options' => 'month_options',
    ),
    'dob_year' => 
    array (
      'name' => 'dob_year',
      'vname' => 'LBL_YEAR',
      'type' => 'int',
      'dbType' => 'varchar',
      'len' => 5,
      'key' => 'dob',
      'enable_range_search' => true,
      'options' => 'numeric_range_search_dom',
    ),
    'dob_date' => 
    array (
      'name' => 'dob_date',
      'vname' => 'LBL_BIRTHDATE',
      'massupdate' => false,
      'type' => 'date',
      'key' => 'dob',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'target_list_id' => 
    array (
      'name' => 'target_list_id',
      'vname' => 'LBL_TARGET_LIST',
      'type' => 'enum',
      'source' => 'non-db',
      'function' => 'getTargetList',
      'studio' => 'visible',
    ),
    'business_type' => 
    array (
      'required' => false,
      'name' => 'business_type',
      'vname' => 'LBL_BUSINESS_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => 'organization',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'reportable' => true,
      'len' => '50',
      'size' => '20',
      'options' => 'business_type_options',
    ),
    'credit_limit' => 
    array (
      'required' => false,
      'name' => 'credit_limit',
      'vname' => 'LBL_CREDIT_LIMIT',
      'type' => 'currency',
      'help' => 'Credit Limit',
      'importable' => 'true',
      'len' => 26,
      'size' => '20',
      'enable_range_search' => false,
      'precision' => 2,
    ),
    'active_date' => 
    array (
      'name' => 'active_date',
      'vname' => 'LBL_ACTIVE_DATE',
      'type' => 'date',
      'display_default' => 'now',
    ),
    'exp_date' => 
    array (
      'name' => 'exp_date',
      'vname' => 'LBL_EXP_DATE',
      'type' => 'date',
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
    'brand_name' => 
    array (
      'name' => 'brand_name',
      'vname' => 'LBL_BRAND_NAME',
      'type' => 'varchar',
      'help' => 'Brand Name',
      'unified_search' => true,
      'len' => '255',
      'size' => '20',
    ),
    'lead_source' => 
    array (
      'name' => 'lead_source',
      'vname' => 'LBL_SOURCE',
      'type' => 'enum',
      'options' => 'lead_source_dom',
      'len' => '100',
      'audited' => true,
      'comment' => 'Lead source (ex: Web, print)',
      'merge_filter' => 'enabled',
    ),
    'category' => 
    array (
      'name' => 'category',
      'vname' => 'LBL_CATEGORY',
      'type' => 'enum',
      'options' => 'category_account_options',
      'len' => '40',
      'audited' => true,
      'merge_filter' => 'enabled',
      'default' => 'FIT',
    ),
    'account_ticketreports' => 
    array (
      'name' => 'account_ticketreports',
      'type' => 'link',
      'relationship' => 'account_ticketreports',
      'module' => 'C_TicketReport',
      'bean_name' => 'C_TicketReport',
      'source' => 'non-db',
      'vname' => 'LBL_TICKETREPORTS',
    ),
    'iata_code' => 
    array (
      'name' => 'iata_code',
      'vname' => 'LBL_IATA_CODE',
      'type' => 'varchar',
      'help' => '',
      'len' => '255',
      'size' => '20',
      'unified_search' => true,
    ),
  ),
  'name_format_map' => 
  array (
    'l' => 'name',
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'accountspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_accounts' => 
    array (
      'name' => 'idx_accounts_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_accnt_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'id',
        1 => 'deleted',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_accnt_name_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_accnt_assigned_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'assigned_user_id',
      ),
    ),
    3 => 
    array (
      'name' => 'idx_accnt_parent_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'parent_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'accounts_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'accounts_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'accounts_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'accounts_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'accounts_teams' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'accounts_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'accounts_email_addresses' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'bean_module',
      'relationship_role_column_value' => 'Accounts',
    ),
    'accounts_email_addresses_primary' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
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
    'member_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
    ),
    'account_cases' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Cases',
      'rhs_table' => 'cases',
      'rhs_key' => 'account_id',
      'relationship_type' => 'one-to-many',
    ),
    'account_tasks' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Accounts',
    ),
    'account_notes' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Accounts',
    ),
    'account_meetings' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Accounts',
    ),
    'account_calls' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Accounts',
    ),
    'account_emails' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Accounts',
    ),
    'account_leads' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'account_id',
      'relationship_type' => 'one-to-many',
    ),
    'account_campaign_log' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'CampaignLog',
      'rhs_table' => 'campaign_log',
      'rhs_key' => 'target_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'target_type',
      'relationship_role_column_value' => 'Accounts',
    ),
    'account_ticketreports' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'C_TicketReport',
      'rhs_table' => 'c_ticketreport',
      'rhs_key' => 'account_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'visibility' => 
  array (
    'TeamSecurity' => true,
  ),
  'templates' => 
  array (
    'company' => 'company',
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