<?php
$viewdefs['Leads'] =
array (
    'DetailView' =>
    array (
        'templateMeta' =>
        array (
            'form' =>
            array (
                'buttons' =>
                array (
                    0 => 'EDIT',
                    1 => 'DUPLICATE',
                    2 => 'DELETE',
                    3 =>
                    array (
                        'customCode' => '{$btn_convert_2}',
                    ),
//                    4 =>
//                    array (
//                        'customCode' => '{$send_survey}',
//                    ),
//                    5 =>
//                    array (
//                        'customCode' => '{$send_poll}',
//                    ),
                ),
                'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
            {sugar_getscript file="custom/modules/Leads/js/addToPT.js"}
            {sugar_getscript file="modules/Leads/Lead.js"}
            ',
            'tabDefs' =>
            array (
                'LBL_CONTACT_INFORMATION' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PANEL_COMPANY' =>
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
            'lbl_contact_information' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'name',
                        'label' => 'LBL_NAME',
                    ),
                    1 => 'birthdate',
                ),
                1 =>
                array (
                    0 => 'gender',
                    1 =>  ''
                ),
                2 =>
                array (
                    0 => 'email1',
                    1 =>
                    array (
                        'name' => 'primary_address_street',
                        'label' => 'LBL_PRIMARY_ADDRESS',
                        'type' => 'address',
                        'displayParams' =>
                        array (
                            'key' => 'primary',
                        ),
                    ),
                ),
                3 =>
                array (
                    0 => 'phone_mobile',
                    1 =>
                    array (
                        'name' => 'facebook',
                        'comment' => 'URL of website for the company',
                        'label' => 'LBL_FACEBOOK',
                    ),
                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'j_school_leads_1_name',
                    ),
                    1 =>
                    array (
                        'name' => 'grade',
                        'studio' => 'visible',
                        'label' => 'LBL_GRADE',
                    ),
                ),
                6 =>
                array (
                    0 => 'description',
                    1 => 'do_not_call',
                ),
                7 =>
                array (
                    1 =>
                    array (
                        'name' => 'alt_address_street',
                        'label' => 'LBL_ALTERNATE_ADDRESS',
                        'type' => 'address',
                        'displayParams' =>
                        array (
                            'key' => 'alt',
                        ),
                    ),
                    0 => ''
                ),
            ),
            'lbl_panel_company' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'guardian_name',
                        'label' => 'LBL_GUARDIAN_NAME',
                    ),
                    1 => 'other_mobile',
                ),
                1 =>array (
                    0 => '',
                    1 => 'email_parent_1',
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'guardian_name_2',
                        'comment' => '',
                        'label' => 'LBL_GUARDIAN_NAME_2',
                    ),
                    1 =>
                    array (
                        'name' => 'phone_other',
                        'comment' => 'Other phone number for the contact',
                        'label' => 'LBL_OTHER_PHONE',
                    ),
                ),
                3 =>array (
                    0 => '',
                    1 => 'email_parent_2',
                ),
            ),
            'lbl_panel_assignment' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'lead_source',
                    ),
                    1 =>
                    array (
                        'name' => 'status',
                        'customCode' => '{if $fields.status.value == "New"}
                        <span class="textbg_green"><b>{$fields.status.value}<b></span>

                        {elseif $fields.status.value == "Assigned"}
                        <span class="textbg_bluelight"><b>{$fields.status.value}<b></span>

                        {elseif $fields.status.value == "In Process"}
                        <span class="textbg_blue"><b>{$fields.status.value}<b></span>

                        {elseif $fields.status.value == "Converted"}
                        <span class="textbg_red"><b>{$fields.status.value}<b></span>

                        {elseif $fields.status.value == "PT/Demo"}
                        <span class="textbg_violet"><b>{$fields.status.value}<b></span>

                        {elseif $fields.status.value == "Recycled"}
                        <span class="textbg_orange"><b>{$fields.status.value}<b></span>

                        {elseif $fields.status.value == "Dead"}
                        <span class="textbg_black"><b>{$fields.status.value}<b></span>

                        {else}
                        <span><b>{$fields.status.value}<b></span>
                        {/if}',
                    ),
                ),
                1 =>
                array (
                    0 => 'lead_source_description',
                    1 =>
                    array (
                        'name' => 'campaign_name',
                        'label' => 'LBL_CAMPAIGN',
                    ),
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'prefer_level',
                       'customCode' => '{$fields.prefer_level.value} {if !empty($fields.last_pt_result.value)} &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<b>{$MOD.LBL_LAST_PT_RESULT}:</b> {$fields.last_pt_result.value}{/if}',
                    ),
                    1 =>
                    array (
                        'name' => 'potential',
                        'studio' => 'visible',
                        'label' => 'LBL_POTENTIAL',
                        'customCode' => '{$potentialQ}',
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'assigned_user_name',
                        'customCode' => '{$assigned_user_idQ}',
                    ),
                    1 =>
                    array (
                        'name' => 'date_entered',
                        'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                        'label' => 'LBL_DATE_ENTERED',
                    ),
                ),
                4 =>
                array (
                    0 => 'team_name',
                    1 =>
                    array (
                        'name' => 'date_modified',
                        'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        'label' => 'LBL_DATE_MODIFIED',
                    ),
                ),


            ),
        ),
    ),
);
