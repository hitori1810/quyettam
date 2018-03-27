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


class LeadsViewDetail extends ViewDetail{
    public function __construct(){
        parent::ViewDetail();
        $this->useForSubpanel = true;
        $this->useModuleQuickCreateTemplate = true;
    }

    function display(){
        $mod_string = return_module_language('en_us', 'Leads', true);
        $this->showOpportunityInfo();
        if ($this->bean->category != "FIT"){
            unset($this->dv->defs['panels']['LBL_CONTACT_INFORMATION'][2][1]);    
        }
        if ($this->bean->category == "EMPLOYEE"){
            $this->ss->assign("LBL_GS_CODE", $mod_string["LBL_GS_CODE"]);
            $this->ss->assign("GS_CODE", $this->bean->gs_code);
        }
        parent::display();
    }

    private function showOpportunityInfo(){
        if($this->bean->create_opportunity == 1){  

            if(!empty($this->bean->first_opportunity_id)) {
                $opp = new Opportunity();
                $opp->retrieve($this->bean->first_opportunity_id);   

                $this->bean->opp_name               = $opp->name;
                $this->bean->opp_amount             = $opp->amount;
                $this->bean->opp_type               = $opp->opportunity_type;
                $this->bean->opp_sales_stage        = $opp->sales_stage ;
                $this->bean->opp_description        = $opp->description;
                $this->bean->opp_date_closed        = $opp->date_closed;

            }
        }
    }

    /**
    * Replaces all the buttons on the subpanels
    */
    function _displaySubPanels(){
        require_once ('include/SubPanel/SubPanelTiles.php');
        $subpanel = new SubPanelTiles($this->bean, $this->module);
        if($this->bean->status == 'Converted'){
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads_opportunities_1']['top_buttons'][0]);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads_opportunities_1']['top_buttons'][1]);  
        }
        echo $subpanel->display();
    }

}
?>
