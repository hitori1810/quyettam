<?php
$viewdefs['Leads'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
          1 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
          2 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
          3 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
          4 => '<link rel="stylesheet" type="text/css" href="custom/include/javascripts/Select2/select2.css">',
        ),
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
      'javascript' => '       
             {sugar_getscript file="custom/include/javascripts/SSO.js"}
             {sugar_getscript file="custom/include/javascripts/Sample.js"}
            {sugar_getscript file="custom/modules/Leads/js/EditView.js"}
            {sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}',
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'code',
            'label' => 'LBL_CODE',
            'customCode' => '{$NEWID}',
          ),
          1 => 'category',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'label' => 'LBL_NAME',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;
                        <input name="last_name" style="width:120px !important"  id="last_name" size="15" maxlength="25" type="text" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" value="{$fields.last_name.value}">&nbsp;
                        <input name="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important"  id="first_name" size="15" maxlength="25" type="text" value="{$fields.first_name.value}">
                        ',
          ),
          1 => 
          array (
            'name' => 'fit_category',
            'customLabel' => '{$MOD.LBL_FIT_CATEGORY}',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pax_name',
            'label' => 'LBL_PAX_NAME',
          ),
          1 => 
          array (
            'name' => 'gs_code',
            'customLabel' => '<label id="lbl_gs_code">{$MOD.LBL_GS_CODE}:</label>',
          ),
        ),
        3 => 
        array (
          0 => 'department',
          1 => 'website',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'type' => 'varchar',
            'validateDependency' => false,
            'customCode' => '<input name="account_name" id="EditView_account_name" {if ($fields.converted.value == 1)}disabled="true"{/if} size="30" maxlength="255" type="text" value="{$fields.account_name.value}">',
          ),
          1 => 'status',
        ),
        5 => 
        array (
          0 => 'title',
          1 => 'phone_mobile',
        ),
        6 => 
        array (
          0 => 'lead_source',
          1 => 'phone_work',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'rating',
            'label' => 'LBL_RATING',
          ),
          1 => 
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        8 => 
        array (
          0 => 'email1',
          1 => 'phone_fax',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'dob_day',
            'label' => 'LBL_BIRTHDATE',
            'type' => 'Dob',
          ),
          1 => 
          array (
            'name' => 'passport',
            'label' => 'LBL_PASSPORT',
          ),
        ),
       10 => array(
            0 => 'gender',
            1 => '',
        ),
       11 =>  
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
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'status_description',
          ),
          1 => 
          array (
            'name' => 'lead_source_description',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'airline',
            'label' => 'LBL_AIRLINE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 'refered_by',
          1 => 
          array (
            'name' => 'seat_type',
            'label' => 'LBL_SEAT_TYPE',
          ),
        ),
        3 => 
        array (
          0 => 'campaign_name',
          1 => 
          array (
            'name' => 'working_date',
            'label' => 'LBL_WORKING_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<textarea id="description" name="description" rows="4" cols="60" title="{$MOD.LBL_DESCRIPTION}" tabindex="0" db-data="">{$fields.description.value}</textarea>',
          ),
          1 => 
          array (
            'name' => 'favorites',
            'studio' => 'visible',
            'label' => 'LBL_FAVORITES',
          ),
        ),
        5 => 
        array (
          0 => 'do_not_call',
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'document_type',
            'label' => 'LBL_DOCUMENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'document_number',
            'label' => 'LBL_DOCUMENT_NUMBER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'nationality',
            'label' => 'LBL_NATIONALITY',
          ),
          1 => 
          array (
            'name' => 'issuing_country',
            'label' => 'LBL_ISSUING_COUNTRY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'card_holder',
            'label' => 'LBL_CARD_HOLDER',
          ),
          1 => 
          array (
            'name' => 'membership_number',
            'label' => 'LBL_MEMBERSHIP_NUMBER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'facebook_id',
            'label' => 'LBL_FACEBOOK_ID',
          ),
          1 => 
          array (
            'name' => 'google_id',
            'label' => 'LBL_GOOGLE_ID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ibe_id',
            'label' => 'LBL_IBE_ID',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
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
