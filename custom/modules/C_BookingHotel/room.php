<?php
    class Room{
        //Before Save
        function handleSaveRoom($bean, $event, $args) {
            if($bean->parent_type=='Leads'){
                $lead = BeanFactory::getBean('Leads',$bean->parent_id);
                if(empty($lead->contact_id)){
                    //copy lead to contact
                    $contact=new Contact();
                    foreach($lead->field_defs as $keyField=>$aFieldName){
                        $contact->$keyField=$lead->$keyField;
                    }
                    $contact->date_modified = '';
                    $contact->date_entered = '';
                    $contact->id = '';
                    $contact->code = '';
                    $contact->save();
                    $bean -> parent_type = 'Contacts';
                    $bean -> parent_id = $contact->id;
                    $bean -> parent_name = $contact->name;
                }
                else
                {
                    $contact = BeanFactory::getBean('Contacts',$lead->contact_id);
                    $bean->parent_type = 'Contacts';
                    $bean->parent_id = $contact->id;
                    $bean->parent_name = $contact->name;
                }
                //Update Lead
                $lead->status = 'Converted';
                $lead->contact_id=$contact->id;
                $lead->save();    
            }
            $q1 = "DELETE FROM accounts_c_bookinghotel_1_c WHERE accounts_c_bookinghotel_1c_bookinghotel_idb='{$bean->id}'";
            $GLOBALS['db']->query($q1);
            $q2 = "DELETE FROM contacts_c_bookinghotel_1_c WHERE contacts_c_bookinghotel_1c_bookinghotel_idb='{$bean->id}'";
            $GLOBALS['db']->query($q2);
            //Add new Relationship
            if($bean->parent_type == 'Contacts') {
                $bean->load_relationship('contacts_c_bookinghotel_1');
                $bean->contacts_c_bookinghotel_1->add($bean->parent_id);
            }
            if($bean->parent_type == 'Accounts') {
                $bean->load_relationship('accounts_c_bookinghotel_1');
                $bean->accounts_c_bookinghotel_1->add($bean->parent_id); 
            } 

            //Delete old payment and relationship
            $q3 = "DELETE FROM c_payment WHERE id in (SELECT c_bookinghotel_c_payment_1c_payment_idb FROM c_bookinghotel_c_payment_1_c WHERE c_bookinghotel_c_payment_1c_bookinghotel_ida = '{$bean->id}')";
            $res = $GLOBALS['db']->query($q3);
            $q4 = "DELETE FROM c_bookinghotel_c_payment_1_c WHERE c_bookinghotel_c_payment_1c_bookinghotel_ida = '{$bean->id}'";
            $res = $GLOBALS['db']->query($q4);
            // Add new relationship
            if($bean->payment_amount_1 > 0) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Hotel_".$bean->name."_Payment_1";
                $payment->type = "Hotel";
                $payment->payment_date = $bean->payment_date_1;
                $payment->payment_method = $bean->payment_method_1;
                $payment->payment_amount = $bean->payment_amount_1;
                $payment->currency = 'VND';
                $payment->ex_rate = '1';
                $payment->payment_attempt = 1;
                $payment->save();
                $bean->load_relationship('c_bookinghotel_c_payment_1');
                $bean->c_bookinghotel_c_payment_1->add($payment->id);
            }
            if($bean->payment_amount_2 > 0) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Hotel_".$bean->name."_Payment_2";
                $payment->type = "Hotel";
                $payment->payment_date = $bean->payment_date_2;
                $payment->payment_method = $bean->payment_method_2;
                $payment->payment_amount = $bean->payment_amount_2;
                $payment->currency = 'VND';
                $payment->ex_rate = '1';
                $payment->payment_attempt = 2;
                $payment->save();
                $bean->load_relationship('c_bookinghotel_c_payment_1');
                $bean->c_bookinghotel_c_payment_1->add($payment->id);
            }
            if(!empty($bean->full_payment_date)) {
                $payment = BeanFactory::newBean('C_Payment');
                $payment->name = "Hotel_".$bean->name."_Full_Payment";
                $payment->type = "Hotel";
                $payment->payment_date = $bean->full_payment_date;
                $payment->payment_method = $bean->full_payment_method;
                $payment->payment_amount = $bean->total_amount;
                if($bean->payment_amount_2 > 0) $payment->payment_amount -= $bean->payment_amount_2;
                if($bean->payment_amount_1 > 0) $payment->payment_amount -= $bean->payment_amount_1;
                $payment->currency = 'VND';
                $payment->ex_rate = '1';
                $payment->payment_attempt = 0;
                $payment->save();
                $bean->load_relationship('c_bookinghotel_c_payment_1');
                $bean->c_bookinghotel_c_payment_1->add($payment->id);
            } 
            
            //--End Handle Save Booking Hotel
            //Begin Save Room

            for($i = 1;$i<=4;$i++){
                if($_POST["room".$i."_deleted"]==1){
                    //Delete Room
                    if(!empty($_POST["room".$i."_id"])){
                        $bean_Room = BeanFactory::getBean('C_Room',$_POST["room".$i."_id"]);
                        $bean_Room->deleted=1;
                        $bean_Room->load_relationship('c_bookinghotel_c_room_1');
                        $bean_Room->c_bookinghotel_c_room_1->delete($bean_room->id,$bean->id);
                        $bean_Room->save();
                    }
                }
                else
                {
                    //Create Room
                    $bean_Room = BeanFactory::newBean('C_Room');
                    // If update
                    if(!empty($_POST["room".$i."_id"]))
                    {
                        $bean_Room = BeanFactory::getBean('C_Room',$_POST["room".$i."_id"]);
                    }
                    $bean_Room->room_type = $_POST["room".$i."_room_type"];
                    $bean_Room->other_type = $_POST["room".$i."_other_type"];
                    $bean_Room-> category = $_POST["room".$i."_category"];
                    $bean_Room->other_category=$_POST["room".$i."_other_category"];
                    $bean_Room->adult = $_POST["room".$i."_adult"];
                    $bean_Room->children = $_POST["room".$i."_children"];
                    $bean_Room->assigned_user_id = $bean->assigned_user_id;
                    $bean_Room->team_id = $bean-> team_id;
                    $bean_Room->team_set_id = $bean-> team_set_id;
                    $bean_Room->c_bookinghotel_c_room_1c_bookinghotel_ida = $bean->id;
                    $bean_Room->save(); 
                } 
            }
            //--End Save Room
        }
        function handleDeleteRoom($bean, $event, $args){
            $bean->load_relationship('c_bookinghotel_c_room_1');
            $rooms = $bean->c_bookinghotel_c_room_1->getBeans();
            foreach($rooms as $room){
                $room->load_relationship('c_bookinghotel_c_room_1');
                $room->c_bookinghotel_c_room_1->delete($room->id,$bean->id);
                $room->deleted = 1;
                $room->save();
            }
        }
    }
?>
