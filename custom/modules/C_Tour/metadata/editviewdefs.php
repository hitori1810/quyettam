<?php
$module_name = 'C_Tour';
$viewdefs[$module_name] = 
array (
    'EditView' => 
    array (
        'templateMeta' => 
        array (
            'form' => 
            array (
                'enctype' => 'multipart/form-data',
                'hidden' => 
                array (
                    1 => '<link rel="stylesheet" href="{sugar_getjspath file="custom/include/javascripts/CKEditor/editor.css"}"/>',
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
            'javascript' => '
            {sugar_getscript file="custom/modules/C_Tour/js/editview.js"}',
            'useTabs' => false,
            'tabDefs' => 
            array (
                'DEFAULT' => 
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => false,
            'includes' => 
            array (
                0 => 
                array (
                    'file' => 'custom/include/javascripts/CKEditor/ckeditor.js',
                ),
            ),
        ),
        'panels' => 
        array (
            'default' => 
            array (
                0 => 
                array (
                    0 => 'name',
                    1 => array (
                        'name' => 'code',
                        'customCode' => '{$NEWCODE}',
                    ),
                ),
                1 => 'producttemplates_c_tour_1_name',
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'option_tour',
                        'studio' => 'visible',
                        'label' => 'LBL_OPTION_TOUR',
                    ),
                    1 => 
                    array (
                        'name' => 'days',
                        'label' => 'LBL_DAYS',
                        'customCode' => '<input type="text" name="days" id="days" size="5" maxlength="26" value="{$fields.days.value}" title="{$MOD.LBL_DAYS}" tabindex="0" >',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'price_adult',
                        'label' => 'LBL_PRICE_ADULT',
                        'customCode' => '<input type="text" class="currency" name="price_adult" id="price_adult" size="30" maxlength="26" value="{sugar_number_format var=$fields.price_adult.value}"> <span>/ Person</span>',
                    ),
                    1 => 
                    array (
                        'name' => 'night',
                        'label' => 'LBL_NIGHT',
                        'customCode' => '<input type="text" name="night" id="night" size="5" maxlength="26" value="{$fields.night.value}" title="{$MOD.LBL_NIGHT}" tabindex="0" >',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'price_chd',
                        'label' => 'LBL_PRICE_CHD',
                        'customCode' => '<input type="text" class="currency"  name="price_chd" id="price_chd" size="30" maxlength="26" value="{sugar_number_format var=$fields.price_chd.value}" style="text-align: right;"> <span>/ Child</span>',
                    ),
                    1 => 
                    array (
                        'name' => 'start_date',
                        'label' => 'LBL_START_DATE',
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'price_infant',
                        'label' => 'LBL_PRICE_INFANT',
                        'customCode' => '<input type="text" class="currency"  name="price_infant" id="price_infant" size="30" maxlength="26" value="{sugar_number_format var=$fields.price_infant.value}" style="text-align: right;"> <span>/ Infant</span>',
                    ),
                    1 => 
                    array (
                        'name' => 'end_date',
                        'label' => 'LBL_END_DATE',
                    ),
                ),
                6 => 
                array (
                    0 => 
                    array (
                        'name' => 'tour_details',
                        'label' => 'LBL_TOUR_DETAILS',
                        'customCode' => '<textarea class="ckeditor" cols="20" id="tour_details" name="tour_details" rows="30">{$fields.tour_details.value}</textarea>',
                    ),
                ),
                7 => 
                array (
                    0 => 
                    array (
                        'name' => 'tour_policy',
                        'label' => 'LBL_TOUR_POLICY',
                        'customCode' => '<textarea class="ckeditor" cols="20" id="tour_policy" name="tour_policy" rows="30">{$fields.tour_policy.value}</textarea>',
                    ),
                ),
                8 => 
                array (
                    0 => 
                    array (
                        'name' => 'contacts_c_tour_1_name',
                    ),
                    1 => 'uploadfile',
                ),
                9 => 
                array (
                    0 => 
                    array (
                        'hideLabel' => 'true',
                        'customCode' => '
                        <fieldset style="margin-left: 35px; width: 350px;">
                        <legend>Contact\'s info:</legend>
                        Mobile: <label id="lbl_contact_mobile"></label>
                        <input type="hidden" id="contact_mobile">{$CONTACT_MOBILE}</input> <br>
                        Email: <label id="lbl_contact_email"></label>
                        <input type="hidden" id="contact_email">{$CONTACT_EMAIL}</input> <br>
                        </fieldset>'
                    ),
                    1 => 
                    array (
                    ),
                ),
                10 => 
                array (
                    0 => 'assigned_user_name',
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
