<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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


    $module_name='C_Ticket';
    $subpanel_layout = array(
        'top_buttons' => array(
            array('widget_class' => 'SubPanelTopCreateButton'),
            array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
        ),

        'where' => '',

        'list_fields' => array(
            'name'=>array(
                'vname' => 'LBL_NAME',
                'widget_class' => 'SubPanelDetailViewLink',
                'width' => '10%',
            ),
            'pax_name'  => array(
                'vname'  => 'LBL_PAX_NAME',
                'widget_class' => 'SubPanelDetailViewLink',
                'width'  => '10%'
            ),
            'category'  => array(
                'vname' => 'LBL_CATEGORY',
                'width' => '10%'
            ),
            'supplier' => array(
                'vname' => 'LBL_SUPPLIER',
                'width' =>'10%'
            ),
            'airline' => array(
                'vname' =>'LBL_AIRLINE',
                'width' => '10%'
            ),
            'tour'  => array(
                'vname'  => 'LBL_TOUR',
                'width'  => '10%'
            ),
            'booking_code' => array(
                'vname' => 'LBL_BOOKING_CODE',
                'width' => '10%'
            ),
            'dateline' => array(
                'vname' => 'LBL_DATELINE',
                'width' => '10%'
            ),
            'routing'   => array(
                'vname' => 'LBL_ROUTING',
                'width'  => '10%'
            ),
            'class' => array(
                'vname' => 'LBL_CLASS',
                'width'  => '10%'
            ),
            'gateway' => array(
                'vname' =>'LBL_GATEWAY',
                'width' => '10%'
            ),
            // 'date_modified'=>array(
            //             'vname' => 'LBL_DATE_MODIFIED',
            //             'width' => '15%',
            //        ),
            //'edit_button'=>array(
            //            'vname' => 'LBL_EDIT_BUTTON',
            //			'widget_class' => 'SubPanelEditButton',
            //		 	'module' => $module_name,
            //	 		'width' => '4%',
            //		),
            //		'remove_button'=>array(
            //            'vname' => 'LBL_REMOVE',
            //			'widget_class' => 'SubPanelRemoveButton',
            //		 	'module' => $module_name,
            //			'width' => '5%',
            //		),
        ),
    );

?>