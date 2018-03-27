<?php
    /**
    * Create By Hai Nguyen
    */
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    require_once("custom/modules/Opportunities/LeadActivity.php");
    class OpportunityLogicHooks{
        /**
        * Update Relationship Accounts And Leads
        * 
        * @param mixed $bean
        * @param mixed $event
        * @param mixed $arguments
        */
        function SaveRelate($bean, $event, $arguments){
            // Delete Relationship With Leads
            if($bean->leads_opportunities_1leads_ida != '' && !is_object($bean->leads_opportunities_1leads_ida)){
                $relate_values = array(
                    'leads_opportunities_1leads_ida' => $bean->leads_opportunities_1leads_ida,
                    'leads_opportunities_1opportunities_idb' => $bean->id,
                );
                $data_values = array(
                    'deleted' => '1',
                );
                $bean->set_relationship('leads_opportunities_1_c',$relate_values,true,true,$data_values);
                $bean->leads_opportunities_1leads_ida = '';
                $bean->leads_opportunities_1_name = '';
            }
            // End
            // Delete Relationship With Accounts
            if($bean->account_id != ''){
                $relate_values = array(
                    'account_id' => $bean->account_id,
                    'opportunity_id' => $bean->id,
                );
                $data_values = array(
                    'deleted' => '1',
                );
                $bean->set_relationship('accounts_opportunities',$relate_values,true,true,$data_values);
                $bean->account_id = '';
                $bean->account_name = '';
            }
            // End
            //            if($_POST['return_module'] != 'Accounts'){
            switch($bean->parent_type){
                case 'Accounts':{
                    // Create Relationship With Accounts
                    if($bean->parent_id != ''){
                        $bean->account_id = $bean->parent_id;
                        $bean->account_name = $bean->parent_name;
                        $relate_values = array(
                            'account_id' => $bean->parent_id,
                            'opportunity_id' => $bean->id,
                        );
                        $bean->set_relationship('accounts_opportunities',$relate_values,false,true);
                    }
                }
                break;
                case 'Leads':{
                    // Create Relationship With Leads
                    if($bean->parent_id != ''){
                        $bean->leads_opportunities_1leads_ida = $bean->parent_id;
                        $bean->leads_opportunities_1_name = $bean->parent_name;
                        $relate_values = array(
                            'leads_opportunities_1leads_ida' => $bean->parent_id,
                            'leads_opportunities_1opportunities_idb' => $bean->id,
                        );
                        $bean->set_relationship('leads_opportunities_1_c',$relate_values,false,true);
                    } 
                }
                break;
                //                }
            }
        }

        function convertLead(&$bean,$event, $arguments){
            if($bean->auto_convert_lead == 1){
                if($bean->parent_option == 'Leads' && $bean->leads_opportunities_1leads_ida != '' && $bean->sales_stage == 'Closed Won'){
                    // Get Lead
                    $lead = new Lead();
                    $lead->retrieve($bean->leads_opportunities_1leads_ida);
                    $lead->status = 'Converted';
                    $lead->opportunity_id = $bean->id;
                    // Create Account
                    $account = new Account();
                    //if($lead->business_type != 'organization'){
//                        $account->name = $lead->name;
//                    }else{
//                        $account->name = $lead->account_name;
//                    }
                    
                    $account->name = $lead->account_name;                      
                    $account->business_type = $lead->business_type;
                    $account->phone_mobile = $lead->phone_mobile;
                    $account->phone_office = $lead->phone_work;
                    $account->phone_fax = $lead->phone_fax;
                    // $account->nick_chat = $lead->nick_chat;
                    $account->website = $lead->website;
                    // $account->$account = $lead->$account;
                    $account->billing_address_country = $lead->primary_address_country;
                    $account->billing_address_city = $lead->primary_address_city;
                    $account->billing_address_district = $lead->primary_address_district;
                    $account->billing_address_street = $lead->primary_address_street;
                    $account->billing_address_street2 = $lead->primary_address_street2;
                    $account->billing_address_state = $lead->primary_address_state;
                    $account->shipping_address_country = $lead->alt_address_country;
                    $account->shipping_address_city = $lead->alt_address_city;
                    $account->shipping_address_district = $lead->alt_address_district;
                    $account->shipping_address_street = $lead->alt_address_street;
                    $account->shipping_address_street2 = $lead->alt_address_street2;
                    $account->shipping_address_state = $lead->alt_address_state;
                    $account->lead_source = $lead->lead_source;
                    $account->campaign_name = $lead->campaign_name;
                    $account->campaign_id = $lead->campaign_id;
                    $account->account_type = 'Customer';
                    // Ca nhan
                    $account->dob_day = $lead->dob_day;
                    $account->dob_month = $lead->dob_month;
                    $account->dob_year = $lead->dob_year;
                    // To chuc
                    $account->short_name = $lead->short_name;
                    $account->industry = $lead->industry;
                    $account->tax_code = $lead->tax_code;
                    //                    $account->ticker_symbol = $lead->ticker_symbol;
                    // $account->sic_code = $lead->sic_code;
                    //                    $account->employees = $lead->employees;

                    $account->bank_name = $lead->bank_name;
                    $account->bank_branch = $lead->bank_branch;
                    $account->bank_account_number = $lead->bank_account_number;
                    $account->bank_account_holder = $lead->bank_account_holder;

                    $account->email1 = $lead->email1;
                    $account->email2 = $lead->email2;
                    $account->description = $lead->description;
                    $account->assigned_user_id = $lead->assigned_user_id;
                    $account->billing_address_state         = $lead->primary_address_state;
                    $account->mobile_phone    = $lead->phone_mobile;
                    $account->ownership    = $lead->ownership;
                    $account->save();     
                    // Set Opportunity
                    $bean->parent_option = 'Accounts';


                    $bean->account_id = $account->id;
                    $bean->account_name = $account->name;
                    // Create Contact
                    $contact = new Contact();
                    if($lead->contact_id != ''){
                        $contact->retrieve($lead->contact_id);
                    }
                    $contact->salutation = $lead->salutation;
                    $contact->first_name = $lead->first_name;
                    $contact->last_name = $lead->last_name;
                    $contact->phone_work = $lead->phone_work;
                    $contact->phone_fax     = $lead->phone_fax;
                    $contact->phone_mobile  = $lead->phone_mobile;
                    $contact->title         = $lead->title;
                    $contact->department    = $lead->department;
                    $contact->account_name  = $account->name;
                    $contact->account_id    = $account->id;
                    $contact->primary_address_state = $lead->primary_address_state;
                    $contact->description = $lead->description;
                    $contact->lead_source = $lead->lead_source;
                    $contact->do_not_call = $lead->do_not_call;
                    $contact->assigned_user_id = $lead->assigned_user_id; 
                    $contact->dob_day = $lead->dob_day;
                    $contact->dob_month = $lead->dob_month;
                    $contact->dob_year = $lead->dob_year;
                    $contact->email1 = $lead->email1;
                    $contact->email2 = $lead->email2;
                    $contact->campaign_name = $lead->campaign_name;
                    $contact->campaign_id = $lead->campaign_id;
                    $contact->key_contacts = 'normal';
                    $contact->primary_address_country = $lead->primary_address_country;
                    $contact->primary_address_city = $lead->primary_address_city;
                    $contact->primary_address_district = $lead->primary_address_district;
                    $contact->primary_address_street = $lead->primary_address_street;
                    $contact->primary_address_street2 = $lead->primary_address_street2;
                    $contact->alt_address_country = $lead->alt_address_country;
                    $contact->alt_address_city = $lead->alt_address_city;
                    $contact->alt_address_district = $lead->alt_address_district;
                    $contact->alt_address_street = $lead->alt_address_street;
                    $contact->alt_address_state = $lead->alt_address_state;
                    $contact->save();
                    // Move Relationship
                    // Delete Relationship With Leads
                    if($bean->leads_opportunities_1leads_ida != ''  && !is_object($bean->leads_opportunities_1leads_ida)){
                        $relate_values = array(
                            'leads_opportunities_1leads_ida' => $bean->leads_opportunities_1leads_ida,
                            'leads_opportunities_1opportunities_idb' => $bean->id,
                        );
                        $data_values = array(
                            'deleted' => '1',
                        );
                        $bean->set_relationship('leads_opportunities_1_c',$relate_values,true,true,$data_values);
                        $bean->leads_opportunities_1leads_ida = '';
                        $bean->leads_opportunities_1_name = '';
                    }
                    // End
                    // Create Relationship With Accounts
                    if($account->id != ''){
                        $bean->account_id = $account->id;
                        $bean->account_name = $bean->parent_name;
                        $relate_values = array(
                            'account_id' => $bean->parent_id,
                            'opportunity_id' => $bean->id,
                        );
                        $bean->set_relationship('accounts_opportunities',$relate_values,false,true);
                    }
                    // End
                    // Create Relationship With Contact
                    if($contact->id != ''){
                        $bean->contact_id = $contact->id;
                        $relate_values = array(
                            'contact_id' => $bean->contact_id,
                            'opportunity_id' => $bean->id,
                        );
                        $bean->set_relationship('opportunities_contacts',$relate_values,false,true);
                    }
                    // End
                    // Create Relationship Of Accounts With Leads
                    if($account->id != ''){
                        $lead->account_id = $account->id;
                        $lead->account_name = $account->name;
                    }
                    // End
                    // Create Relationship Of Contact With Leads
                    if($contact->id != ''){
                        $lead->contact_id = $contact->id;
                        $lead->contact_name = $contact->name;
                    }
                    // End
                    // End Move
                    // if update opp then update opp sales stage equal "Closed Won"

                    $GLOBALS['db']->query('UPDATE opportunities SET sales_stage = "Closed Won" WHERE id="'.$bean->id.'"');

                    // check relationship between account and oppp
                    $query = "SELECT id FROM accounts_opportunities WHERE opportunity_id = '{$bean->id}' AND account_id = '{$account->id}' AND deleted =0";
                    $result = $GLOBALS['db']->query($query);
                    if($GLOBALS['db']->getRowCount($result) == 0){
                        $id = create_guid();
                        $insert = "INSERT INTO accounts_opportunities
                        (id,
                        opportunity_id,
                        account_id,
                        date_modified,
                        deleted)
                        VALUES ('{$id}',
                        '{$bean->id}',
                        '{$account->id}',
                        NOW(),
                        '0');";
                        $GLOBALS['db']->query($insert);
                    }

                    $lead->save();
                    // move or copy activities
                   // handleActivities($lead,$account);
                    //handleActivities($lead,$contact);
                    //handleActivities($lead,$bean);
                }
            }
        }

        function autoRefresh($bean, $event, $arguments){
            $post = $_POST; 
        }
    }
?>
