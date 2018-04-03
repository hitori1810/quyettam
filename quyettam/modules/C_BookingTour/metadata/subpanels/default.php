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


$module_name='C_BookingTour';
$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
	),

	'where' => '',

	'list_fields' => array(
        'status'  => array(
            'vname' => 'LBL_STATUS',
            'width' => '5%'
        ),
		'name' => array(
	 		'vname' => 'LBL_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
	 		'width' => '10',
		),
        'parent_name' => array(
            'vname' => 'LBL_PARENT_NAME',
            'width' => '10'
        ),
        'tour_name'  => array(
            'vname' => 'LBL_TOUR_NAME',
            'width' => '15%'
        ),
        'start_date' => array(
            'vname' => 'LBL_START_DATE',
            'width' => '10%'
        ),
        'end_date'  => array(
            'vname' => 'LBL_END_DATE',
            'width' => '10%'
        ),
        'invoice_no' => array(
             'vname' => 'LBL_INVOICE_NO',
             'width' => '10%'
        ),
        'invoice_date' => array(
             'vname' => 'LBL_INVOICE_DATE',
             'width' => '10%'
        ),
        'total_amount' => array(
             'vname' => 'LBL_TOTAL_AMOUNT',
             'width' =>'10%'
        )
		//'date_modified'=>array(
//	 		'vname' => 'LBL_DATE_MODIFIED',
//	 		'width' => '45%',
//		),
//		'edit_button'=>array(
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