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
                    1 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
                    2 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
                    3 => '<input type="hidden" name="assigned_user_id_2" value="{$assigned_user_id_2}">',
                    4 => '<input type="hidden" name="birthdate_2" value="{$birthdate_2}">',
                    5 => '<input type="hidden" name="last_name_2" value="{$last_name_2}">',
                    6 => '<input type="hidden" name="first_name_2" value="{$first_name_2}">',
                    7 => '<input type="hidden" name="phone_mobile_2" value="{$phone_mobile_2}">',
                    8 => '<input type="hidden" name="is_role_mkt" id="is_role_mkt" value="{$is_role_mkt}">',
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
            'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>
            {sugar_getscript file="custom/modules/Leads/js/editview.js"}',
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
                        'name' => 'full_lead_name',
                        'customLabel' => '{$MOD.LBL_NAME} <span class="required">*</span>',
                        'customCode' => '
                        {if $fields.full_lead_name.acl > 1 || $is_lead_convert}
                        <table width="100%" style="padding:0px!important;width: 300px;">
                        <tbody><tr>
                        <td style="padding: 0px !important;" width = "60%"><input name="last_name" id="last_name" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" style="margin-right: 3px;" size="20" type="text"  value="{$fields.last_name.value}"></td>
                        <td style="padding: 0px !important;" width="40%"><input name="first_name" id="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important; margin-right: 3px;" size="15" type="text" value="{$fields.first_name.value}"></td>
                        </tr>
                        <tr><td colspan="2"><span style=" color: #A99A9A; font-style: italic;"> Bùi Vũ Thanh An | Họ: Bùi Vũ Thanh - Tên:  An </span></td></tr>
                        </tbody>
                        </table><div id = "dialogDuplicationLocated"></div>
                        {else}
                        <span id="full_lead_name">
                        {$full_lead_name}
                        </span>
                        {/if}',
                    ),
                    1 =>
                    array (
                        'name' => 'birthdate',
                        'customLabel' => '{$MOD.LBL_BIRTHDATE}',
                        'comment' => 'The birthdate of the contact',
                        'customCode' => '
                        {if $fields.birthdate.acl > 1 || $is_lead_convert}
                        <span class="dateTime"><input class="date_input" autocomplete="off" type="text" name="birthdate" id="birthdate" value="{$fields.birthdate.value}" title="{$MOD.LBL_BIRTHDATE}" tabindex="0" size="11" maxlength="10" style="width: 110px !important;"></span><img src="themes/OnlineCRM-Blue/images/jscalendar.png" alt="Enter Date" style="position:relative; top:6px; padding-left: 4px;" border="0" id="birthdate_trigger"></span>
                        {literal}
                        <script type="text/javascript">
                        Calendar.setup ({
                        inputField : "birthdate",
                        ifFormat : cal_date_format,
                        daFormat : cal_date_format,
                        button : "birthdate_trigger",
                        singleClick : true,
                        dateStr : "{$fields.birthdate.value}",
                        startWeekday: 0,
                        step : 1,
                        weekNumbers:false
                        }
                        );
                        </script>
                        {/literal}
                        {else}
                        <span id="birthdate">
                        {$fields.birthdate.value}
                        </span>
                        {/if}
                        ',
                    ),
                ),
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'gender',
                        'studio' => 'visible',
                        'label' => 'LBL_GENDER',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                    1 => '',
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'email1',
                        'studio' => 'false',
                        'label' => 'LBL_EMAIL_ADDRESS',
                    ),
                    1 =>
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
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'phone_mobile',
                        'customLabel' => '{$MOD.LBL_MOBILE_PHONE}',
                        'customCode' => '{if $fields.phone_mobile.acl > 1 || $is_lead_convert}
                        <span id="phone_mobile_span">
                        {$fields.phone_mobile.value}
                        </span>
                        {else}
                        <span id="phone_mobile_span">
                        {$phone_mobile}
                        </span>
                        {/if}',
                    ),
                    1 => 'facebook',
                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'j_school_leads_1_name',
                        'displayParams' =>
                        array (
                            'required' => false,
                        ),
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
                    0 =>
                    array (
                        'name' => 'description',
                        'displayParams' =>
                        array (
                            'rows' => 4,
                            'cols' => 55,
                        ),
                    ),
                    1 =>
                    array (
                        'name' => 'do_not_call',
                        'comment' => 'An indicator of whether contact can be called',
                        'label' => 'LBL_DO_NOT_CALL',
                    ),
                ),
                7 =>
                array (
                    0 =>
                    array (
                        'name' => 'alt_address_street',
                        'label' => 'LBL_ALTERNATE_ADDRESS',
                        'customCode' => '<textarea rows="2" cols="30" name="alt_address_street" >{$fields.alt_address_street.value}</textarea>',
                    ),
                    1 => '',
                ),
            ),
            'lbl_panel_company' =>
            array (
                0 =>
                array (
                    0 => 'guardian_name',
                    1 => 'other_mobile',
                ),
                1 =>array (
                    0 => '',
                    1 => 'email_parent_1',
                ),
                2 =>
                array (
                    0 => 'guardian_name_2',
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
                        'customCode' => '{$lead_source}',
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
                    1 => 'campaign_name',
                ),
                2 =>
                array (
                    0 => 'prefer_level',
                    1 =>
                    array (
                        'name' => 'potential',
                        'studio' => 'visible',
                        'label' => 'LBL_POTENTIAL',
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'assigned_user_name',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                    1 => 'team_name',
                ),
            ),
        ),
    ),
);
