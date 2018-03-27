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


    class LeadsViewEdit extends ViewEdit{
        public function __construct(){
            parent::ViewEdit();
            $this->useForSubpanel = true;
            $this->useModuleQuickCreateTemplate = true;
        }

        function display(){
            /**
            * Begin Address Field
            * @author Hai Nguyen
            */
            if ($_POST[isDuplicate] == 'true') {
                unset($this->bean->code);    
                unset($this->bean->id);    
            }
            if(!isset($this->bean->id) || empty($this->bean->id)){
                $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold"> Auto-generate </span>');
            }else{
                $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold" id = "code">'.$this->bean->code.'</span>'); 
            }
            
            echo '<script type="text/javascript"> 
            var primary_address_country = "'.$this->bean->primary_address_country.'";
            var alt_address_country = "'.$this->bean->alt_address_country.'";
            var primary_address_city = "'.$this->bean->primary_address_city.'";
            var primary_address_district = "'.$this->bean->primary_address_district.'";
            var alt_address_city = "'.$this->bean->alt_address_city.'";
            var alt_address_district = "'.$this->bean->alt_address_district.'";
            var primary_address_state = "'.$this->bean->primary_address_state.'";
            var alt_address_state = "'.$this->bean->alt_address_state.'";
            </script>';
            /**
            * End Address Field
            * 
            * @var LeadViewEdit
            */


            $this->showOpportunityInfo();

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

                echo '<script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery("#opp_name").parent().append("<input type=\'hidden\' name=\'first_opportunity_id\' value=\''.$this->bean->first_opportunity_id.'\'/>");
                });
                </script>
                ';
            }
        }
    }
?>
