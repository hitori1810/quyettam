<?php
    /*********************************************************************************
    * By installing or using this file, you are confirming on behalf of the entity
    * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
    * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
    * http://www.sugarcrm.com/master-subscription-agreement
    *
    * If Company is not bound by the MSA, then by installing or using this file
    * you are agreeing unconditionally that Company will be bound by the MSA and
    * certifying that you have authority to bind Company accordingly.
    *
    * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
    ********************************************************************************/

    $viewdefs['Users']['EditView'] = array(
        'templateMeta' => array('maxColumns' => '2', 
            'widths' => array(
                array('label' => '10', 'field' => '30'), 
                array('label' => '10', 'field' => '30')
            ),
            'form' => array(
                'headerTpl'=>'custom/modules/Users/tpls/EditViewHeader.tpl',
                'footerTpl'=>'modules/Users/tpls/EditViewFooter.tpl',
            ),
            'includes'=> array(
                array('file'=>'custom/include/javascripts/PictureEditor/jquery-1.7.1.min.js'),
                array('file'=>'custom/modules/Users/js/EditView.js'),
                array('file'=>'custom/include/javascripts/PictureEditor/jquery-ui.js'),
                array('file'=>'custom/include/javascripts/PictureEditor/jquery.cropzoom.js'),
                array('file'=>'custom/include/javascripts/PictureEditor/dhtmlxscheduler.js'),
                array('file'=>'custom/include/javascripts/PictureEditor/PictureEditor.js'),
                array('file'=>'custom/include/javascripts/PictureEditor/common.js'),
            ),
        ),
        'panels' => array (
            'LBL_USER_INFORMATION' => array (
                array(
                    array(
                        'name'=>'user_name',
                        'displayParams' => array('required'=>true),
                    ),
                    'first_name'
                ),
                array(array(
                    'name' => 'status',
                    'displayParams' => array('required'=>true),
                    ),
                    'last_name'),
                array(
                    array ('name' => 'code',
                    'customCode' => '<input type="text" name="code" id="code" size="10" maxlength="20" value="{$fields.code.value}" title="{$MOD.LBL_CODE}" >',
                    ),
                    array(
                    'name'=>'UserType',
                    'customCode'=>'{if $IS_ADMIN}{$USER_TYPE_DROPDOWN}{else}{$USER_TYPE_READONLY}{/if}<input type="hidden" name="user_template_id" value="{$USER_TEMPLATE_ID}" />',
                    ),
                ),
                array(array(
                    'name' => 'picture',
                    'customCode' => '{include file="custom/modules/Users/tpls/AvatarEdit.tpl"}',
                    ),
                ),
            ),
            'LBL_EMPLOYEE_INFORMATION' => array(
                array('employee_status',
                    'show_on_employees'),
                array('title',
                    'phone_work'),
                array('department',
                    'phone_mobile'),
                array('reports_to_name',
                    'phone_other'),
                array('','phone_fax'),
                array('','phone_home'),
                array('messenger_type','messenger_id'),
                array('address_street','address_city'),
                array('address_state','address_postalcode'),
                array('address_country'),
                array('description'),
            ),
        ),
    );
