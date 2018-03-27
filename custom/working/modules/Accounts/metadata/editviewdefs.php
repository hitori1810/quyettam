<?php
$viewdefs['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
      'maxColumns' => '2',
      'useTabs' => false,
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'syncDetailEditViews' => false,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'code',
            'label' => 'LBL_CODE',
          ),
          1 => 'business_type',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'iata_code',
          ),
          1 => 
          array (
            'name' => 'project_i_d_c',
            'label' => 'LBL_PROJECT_I_D',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'brand_name',
          ),
          1 => 
          array (
            'name' => 'mobile_phone',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'tax_code',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'dob_day',
            'label' => 'LBL_BIRTHDATE',
            'type' => 'Dob',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'category',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'bank_account_number',
            'label' => 'LBL_BANK_ACCOUNT_NUMBER',
          ),
          1 => 
          array (
            'name' => 'bank_name',
            'label' => 'LBL_BANK_NAME',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'credit_limit',
            'label' => 'LBL_CREDIT_LIMIT',
          ),
          1 => 
          array (
            'name' => 'bank_branch',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'active_date',
            'label' => 'LBL_ACTIVE_DATE',
          ),
          1 => 
          array (
            'name' => 'exp_date',
            'label' => 'LBL_EXP_DATE',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'industry',
          1 => 
          array (
            'name' => 'lead_source',
            'comment' => 'Lead source (ex: Web, print)',
            'label' => 'LBL_SOURCE',
          ),
        ),
        1 => 
        array (
          0 => 'annual_revenue',
          1 => 'employees',
        ),
        2 => 
        array (
          0 => 'sic_code',
          1 => 'ticker_symbol',
        ),
        3 => 
        array (
          0 => 'parent_name',
          1 => 'ownership',
        ),
        4 => 
        array (
          0 => 'campaign_name',
          1 => 'rating',
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 
          array (
            'name' => 'team_name',
            'displayParams' => 
            array (
              'display' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
