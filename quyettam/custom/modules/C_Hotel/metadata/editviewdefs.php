<?php
$module_name = 'C_Hotel';
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
                    1 => '<link rel="stylesheet" href="{sugar_getjspath file="custom/include/javascripts/Starrr/starrr.min.css"}"/>',
                    2 => '<link rel="stylesheet" href="{sugar_getjspath file="custom/include/javascripts/CKEditor/editor.css"}"/>',
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
            {sugar_getscript file="custom/include/javascripts/Starrr/starrr.js"}
            {sugar_getscript file="custom/modules/C_Hotel/js/editview.js"}
            ',
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
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'star',
                        'label' => 'LBL_STAR',
                        'customCode' => '<div class="starrr"></div><input type="hidden" name="star" id="star" value="{$fields.star.value}">',
                    ),
                    1 => 
                    array (
                        'name' => 'producttemplates_c_hotel_1_name',
                    ),
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'address_street',
                        'label' => 'LBL_ADDRESS_STREET',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'hotel_details',
                        'studio' => 'visible',
                        'label' => 'LBL_HOTEL_DETAILS',
                        'customCode' => '<textarea class="ckeditor" cols="20" id="hotel_details" name="hotel_details" rows="30">{$fields.hotel_details.value}</textarea>',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'hotel_policy',
                        'studio' => 'visible',
                        'label' => 'LBL_HOTEL_POLICY',
                        'customCode' => '<textarea class="ckeditor" cols="20" id="hotel_policy" name="hotel_policy" rows="30" >{$fields.hotel_policy.value}</textarea>',
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'contacts_c_hotel_1_name',
                    ),
                    1 => 'uploadfile',
                ),
                6 => 
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
                    1 => '',
                ),
                7 => 
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
