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


require_once('include/MVC/View/views/view.detail.php');

class ContactsViewDetail extends ViewDetail
{
    function _displaySubPanels(){ 
        require_once ('include/SubPanel/SubPanelTiles.php'); 
        $subpanel = new SubPanelTiles($this->bean, $this->module);
        $subpanelNameArr=array('contacts_c_bookinghotel_1','contacts_c_bookingticket_1' ,'contacts_c_bookingtour_1', 'opportunities');
        foreach($subpanelNameArr as $subpanelName){
            //     unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelName]['top_buttons'][0]);//hiding create 
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelName]['top_buttons'][1]);//hiding select 
        }
        echo $subpanel->display(); 
    } 
    /**
    * @see SugarView::display()
    *
    * We are overridding the display method to manipulate the portal information.
    * If portal is not enabled then don't show the portal fields.
    */
    public function display()
    {
        $mod_string = return_module_language('en_us', 'Contacts', true);
        $admin = new Administration();
        $admin->retrieveSettings();
        if(isset($admin->settings['portal_on']) && $admin->settings['portal_on']) {
            $this->ss->assign("PORTAL_ENABLED", true);
        }
        if ($this->bean->category != "FIT"){
            unset($this->dv->defs['panels']['lbl_contact_information'][1][1]);    
        }
        if ($this->bean->category == "EMPLOYEE"){
            $this->ss->assign("LBL_GS_CODE", $mod_string["LBL_GS_CODE"]);
            $this->ss->assign("GS_CODE", $this->bean->gs_code);
        }
        
        parent::display();
    }
}
