<?php
    if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

    class LeadLogicHooks {

        public function handleSaveOpportunity(&$bean, $event, $arguments){
            // after save
            // Check if we can update the opportunity
            if($bean->create_opportunity == 1) {
                $opp = new Opportunity();

                if(!empty($bean->first_opportunity_id)) {
                    // Opportunity is exist
                    $opp->retrieve($bean->first_opportunity_id);
                    // UPDATE
                    if($opp->sales_stage != 'Closed Won' && !empty($_REQUEST['record'])){
                        $this->saveOpportunity($opp, false, $bean); 
                    }
                    elseif($opp->sales_stage != 'Closed Won' && !empty($_REQUEST['first_opportunity_id']) && $_REQUEST['opp_sales_stage'] != 'Closed Won' ){
                        $this->saveOpportunity($opp, false, $bean);
                    }
                } else {
                    // SAVE Opportunity is not exist
                    $this->saveOpportunity($opp, true, $bean);
                }   
            }
        }

        private function saveOpportunity($opportunity, $isNew, $bean) {
            global $app_list_strings;
            // Assign data  
            if(!empty($bean->opp_name)){
                if($isNew){
                    $opportunity_id = create_guid();
                    $opportunity->id = $opportunity_id;
                    $opportunity->new_with_id =true;
                    $query = 'UPDATE leads SET first_opportunity_id = "'.$opportunity_id.'" WHERE id = "'. $bean->id .'"';
                    $GLOBALS['db']->query($query);
                }
                $opportunity->name              = $bean->opp_name;
                $opportunity->opportunity_type  = 'New Business';

                $opportunity->amount            = $bean->opp_amount;
                $opportunity->currency_id       = $bean->currency_id;

                $opportunity->sales_stage       = $bean->opp_sales_stage;   
                $opportunity->probability       = $app_list_strings['sales_probability_dom'][$bean->opp_sales_stage];

                $opportunity->description       = $bean->opp_description;
                $opportunity->date_closed       = $_POST['opp_date_closed'];
                $opportunity->lead_source       = $bean->lead_source;
                $opportunity->assigned_user_id  = $bean->assigned_user_id;

                $opportunity->parent_option                 = 'Leads';
                $opportunity->leads_opportunities_1_name    = $bean->name; 
                $opportunity->leads_opportunities_1leads_ida = $bean->id;
                $opportunity->auto_convert_lead = 1;  
                //if($isNew) {
                // save first_opportunity_id to retrieve later

                // Create relationship between Leads-Opportunity (1st time)
                /*$opportunity->load_relationship('leads_opportunities_1');
                $opportunity->leads_opportunities_1->add($bean->id);
                $opportunity->save();  */   
                //}   
                $opportunity->save(); 

            }


        }

        function updateDOB(&$bean, $event, $arguments) {
            if($bean->birthday) {
                $bean->birthday = substr($bean->birthday,0,10);
                $dob = explode('/',$bean->birthday);
                if(!empty($dob)) {
                    $bean->dob_day = $dob[0];
                    $bean->dob_month = $dob[1];
                    $bean->dob_year = $dob[2];
                    $bean->dob_date = "{$bean->dob_year}-{$bean->dob_month}-{$bean->dob_day}";
                }

            }
        }
    }

?>
