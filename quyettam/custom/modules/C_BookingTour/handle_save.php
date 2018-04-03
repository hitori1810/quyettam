<?php
    class BookingTour
    {
        //before_save
        function handleSave($bean, $event, $arguments) {
            //Handle for Booking Ticket's relationsip 
            if($bean->parent_type == 'Leads'){
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
                }else{
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
            }

            //Delete all relationship BookingTicket - Account, Contact
            $q1 = "DELETE FROM accounts_c_bookingtour_1_c WHERE accounts_c_bookingtour_1c_bookingtour_idb='{$bean->id}'";
            $GLOBALS['db']->query($q1);
            $q2 = "DELETE FROM contacts_c_bookingtour_1_c WHERE contacts_c_bookingtour_1c_bookingtour_idb='{$bean->id}'";
            $GLOBALS['db']->query($q2);
            //Add new Relationship
            if($bean->parent_type == 'Contacts') {
                $bean->load_relationship('contacts_c_bookingtour_1');
                $bean->contacts_c_bookingtour_1->add($bean->parent_id);
            }
            if($bean->parent_type == 'Accounts') {
                $bean->load_relationship('accounts_c_bookingtour_1');
                $bean->accounts_c_bookingtour_1->add($bean->parent_id); 
            }    
            
            //Delete old payment and relationship
            $q3 = "DELETE FROM c_payment WHERE id in (SELECT c_bookingtour_c_payment_1c_payment_idb FROM c_bookingtour_c_payment_1_c WHERE c_bookingtour_c_payment_1c_bookingtour_ida = '{$bean->id}')";
            $res = $GLOBALS['db']->query($q3);
            $q4 = "DELETE FROM c_bookingtour_c_payment_1_c WHERE c_bookingtour_c_payment_1c_bookingtour_ida = '{$bean->id}'";
            $res = $GLOBALS['db']->query($q4);
            // Add new relationship
            if($bean->payment_amount_1 > 0) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Tour_".$bean->name."_Payment_1";
                $payment->type = "Tour";
                $payment->payment_date = $bean->payment_date_1;
                $payment->payment_method = $bean->payment_method_1;
                $payment->payment_amount = $bean->payment_amount_1;
                $payment->currency = 'VND';
                $payment->ex_rate = '1';
                $payment->payment_attempt = 1;
                $payment->save();
                $bean->load_relationship('c_bookingtour_c_payment_1');
                $bean->c_bookingtour_c_payment_1->add($payment->id);
            }
            if($bean->payment_amount_2 > 0) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Tour_".$bean->name."_Payment_2";
                $payment->type = "Tour";
                $payment->payment_date = $bean->payment_date_2;
                $payment->payment_method = $bean->payment_method_2;
                $payment->payment_amount = $bean->payment_amount_2;
                $payment->currency = 'VND';
                $payment->ex_rate = '1';
                $payment->payment_attempt = 2;
                $payment->save();
                $bean->load_relationship('c_bookingtour_c_payment_1');
                $bean->c_bookingtour_c_payment_1->add($payment->id);
            }
            if(!empty($bean->full_payment_date)) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Tour_".$bean->name."_Full_Payment";
                $payment->type = "Tour";
                $payment->payment_date = $bean->full_payment_date;
                $payment->payment_method = $bean->full_payment_method;
                $payment->payment_amount = $bean->total_amount;
                if($bean->payment_amount_2 > 0) $payment->payment_amount -= $bean->payment_amount_2;
                if($bean->payment_amount_1 > 0) $payment->payment_amount -= $bean->payment_amount_1;
                $payment->currency = 'VND';
                $payment->ex_rate = '1';
                $payment->payment_attempt = 0;
                $payment->save();
                $bean->load_relationship('c_bookingtour_c_payment_1');
                $bean->c_bookingtour_c_payment_1->add($payment->id);
            }
        }
    }   
?>
