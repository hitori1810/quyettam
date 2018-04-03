<?php
$viewdefs['Prospects'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
      'tabDefs' => 
      array (
        'LBL_PROSPECT_INFORMATION' => 
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_prospect_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'label' => 'LBL_NAME',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="last_name" style="width:120px !important"  id="last_name" size="15" maxlength="25" type="text" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" value="{$fields.last_name.value}">&nbsp;<input name="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important"  id="first_name" size="15" maxlength="25" type="text" value="{$fields.first_name.value}">',
             
          ),
          1 => 
          array (
            'name' => 'category',
            'label' => 'LBL_CATEGORY',
          ),
        ),
        1 => 
        array (
          0 => 'department',
          1 => 'account_name',
        ),
        2 => 
        array (
          0 => 'title',
          1 => 
          array (
            'name' => 'tax_code',
            'label' => 'LBL_TAX_CODE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'comment' => 'URL of website for the company',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 'phone_mobile',
        ),
        4 => 
        array (
          0 => 'phone_fax',
          1 => 'phone_work',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'comment' => 'Status of the target',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        6 => 
        array (
          0 => 'email1',
          1 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<textarea id="description" name="description" rows="4" cols="60" title="{$MOD.LBL_DESCRIPTION}" value={$fields.description.value} tabindex="0" db-data=""></textarea>',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'dob_day',
            'vname' => 'LBL_BIRTHDAY',
            'type' => 'Dob',
          ),
          1 => 'do_not_call',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
              'copy' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'team_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
