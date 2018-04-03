<?php
    class handleOpp{
        function SaveOpp($bean, $event, $arguments){
            //Handle for Opportunity's relationsip 
            if($bean->parent_type == 'Leads' && $bean->sales_stage == 'Closed Won'){
                $lead = BeanFactory::getBean('Leads', $bean->parent_id);
                if(empty($lead->contact_id)){
                    $ct = new Contact();

                    //Copy Lead to Contact
                    foreach ($lead->field_defs as $keyField => $aFieldName) {
                        $ct->$keyField = $lead->$keyField;   
                    }
                    $ct->date_modified = '';
                    $ct->date_entered = '';
                    $ct->id = '';
                    $ct->code = '';
                    $ct->save();

                    //Apply Contact for this booking
                    $bean->parent_type = 'Contacts'; 
                    $bean->parent_name = $ct->name;
                    $bean->parent_id = $ct->id;
                }else {
                    //Lead is existing - Apply Contact for this booking 
                    $ct = BeanFactory::getBean('Contacts',$lead->contact_id);
                    $bean->parent_type = 'Contacts'; 
                    $bean->parent_name = $ct->name;
                    $bean->parent_id = $ct->id;  
                }
                //Update Lead
                $lead->status = 'Converted';
                $lead->contact_id = $ct->id;
                $lead->save();
            }elseif($bean->parent_type == 'Leads' && $bean->sales_stage != 'Closed Won'){
                //rel defaut
                $bean->load_relationship('leads');
                $bean->leads->add($bean->parent_id);
                //rel custom
                $bean->load_relationship('leads_opportunities_1');
                $bean->leads_opportunities_1->add($bean->parent_id);
            }

            if($bean->parent_type == 'Contacts') {
                $bean->load_relationship('contacts');
                $bean->contacts->add($bean->parent_id);
            }
            
            if($bean->parent_type == 'Accounts') {
                $bean->load_relationship('accounts');
                $bean->accounts->add($bean->parent_id); 
            } 
            
              
        }
    }
?>
