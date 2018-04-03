<?php
$viewdefs['Contacts'] = 
array (
    'QuickCreate' => 
    array (
        'templateMeta' => 
        array (
            'form' => 
            array (
                'hidden' => 
                array (
                    0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
                    1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
                    2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
                    3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
                    4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
                    5 => '{if !empty($smarty.request.contact_id)}<input type="hidden" name="reports_to_id" value="{$smarty.request.contact_id}">{/if}',
                    6 => '{if !empty($smarty.request.contact_name)}<input type="hidden" name="report_to_name" value="{$smarty.request.contact_name}">{/if}',
                    7 => '<input type="hidden" name="account_cetegory" id="account_cetegory">',
                ),
            ),
            'maxColumns' => '2',
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
            'javascript' => '{sugar_getscript file="custom/modules/Contacts/js/QuickCreate.js"}',
            'useTabs' => false,
            'tabDefs' => 
            array (
                'DEFAULT' => 
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
        ),
        'panels' => 
        array (
            'default' => 
            array (
                0 => 
                array (
                    0 => 
                    array (
                        'name' => 'full_name',
                        'studio' => 
                        array (
                            'listview' => false,
                        ),
                        'label' => 'LBL_NAME',
                        'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}
                        &nbsp;<input name="last_name" style="width:120px !important"  id="last_name" size="15" maxlength="25" type="text" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" value="{$fields.last_name.value}">
                        &nbsp;<input name="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important"  id="first_name" size="15" maxlength="25" type="text" value="{$fields.first_name.value}">',
                    ),
                    1 => 
                    array (
                        'name' => 'account_name',
                    ),
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'title',
                    ),
                    1 => 
                    array (
                        'name' => 'phone_work',
                    ),
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'phone_fax',
                    ),
                    1 => 
                    array (
                        'name' => 'phone_mobile',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'do_not_call',
                    ),
                    1 => 
                    array (
                        'name' => 'category',
                        'label' => 'LBL_CATEGORY',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'lead_source',
                    ),
                    1 => 
                    array (
                        'name' => 'fit_category',
                        'customLabel' => '{$MOD.LBL_FIT_CATEGORY}'
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'email1',
                    ),
                    1 => 
                    array (

                    ),
                ),
                6 => 
                array (
                    0 => 
                    array (
                        'name' => 'assigned_user_name',
                    ),
                    1 => 
                    array (
                        'name' => 'team_name',
                    ),
                ),
            ),
        ),
    ),
);
