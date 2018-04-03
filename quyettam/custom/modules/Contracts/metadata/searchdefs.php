<?php
$searchdefs['Contracts'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
      2 => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'reference_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_REFERENCE_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'reference_code',
      ),
      'account_name' => 
      array (
        'name' => 'account_name',
        'default' => true,
        'width' => '10%',
      ),
      'opportunity_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_OPPORTUNITY_NAME',
        'id' => 'OPPORTUNITY_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'opportunity_name',
      ),
      'start_date' => 
      array (
        'name' => 'start_date',
        'default' => true,
        'width' => '10%',
      ),
      'end_date' => 
      array (
        'name' => 'end_date',
        'default' => true,
        'width' => '10%',
      ),
      'total_contract_value' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_TOTAL_CONTRACT_VALUE',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'total_contract_value',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'studio' => 
        array (
          'portaleditview' => false,
        ),
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'studio' => 
        array (
          'portaleditview' => false,
        ),
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'company_signed_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_COMPANY_SIGNED_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'company_signed_date',
      ),
      'customer_signed_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CUSTOMER_SIGNED_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'customer_signed_date',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'type',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'modified_user_id' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'modified_user_id',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
