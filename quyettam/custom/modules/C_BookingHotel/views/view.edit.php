<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class C_BookingHotelViewEdit extends ViewEdit{
    function display() {
        // echo '<link rel="stylesheet" type="text/css" href="custom/include/javascripts/alertify/alertify.css">';
        if ($_POST[isDuplicate] == 'true') {
            unset($this->bean->name);    
            unset($this->bean->id);    
        } 
        if(!isset($this->bean->id) || empty($this->bean->id)){
            //Check NEW CODE
            $this->ss->assign('NEWCODE', '<span style="color:red;font-weight:bold"> Auto - generate </span>');

        }else{
            //Check NEW CODE
            $this->ss->assign('NEWCODE', '<span style="color:red;font-weight:bold" id = "code">'.$this->bean->name.'</span>'); 
        }
        $this->ss->assign('room_type_room_options',$GLOBALS['app_list_strings']['room_type_room_list']);
        $this->ss->assign('category_room_options',$GLOBALS['app_list_strings']['category_room_list']);
        $this->ss->assign('adult_room_options',$GLOBALS['app_list_strings']['adult_room_list']);
        $this->ss->assign('children_room_options',$GLOBALS['app_list_strings']['children_room_list']);
        if(!empty($this->bean->id)&&isset($this->bean->id)){
            $this->bean->load_relationship('c_bookinghotel_c_room_1');
            $room_list = $this->bean->c_bookinghotel_c_room_1->getBeans();
            $count = 1;   
            //If Edit then Set default value for room_list
            foreach($room_list as $room){
                $this->ss->assign('room_id'.$count,$room->id);
                $this->ss->assign('room_type'.$count,$room->room_type);
                $this->ss->assign('other_type'.$count,$room->other_type);
                $this->ss->assign('category'.$count,$room->category) ;
                $this->ss->assign('other_category'.$count,$room->other_category) ;
                $this->ss->assign('adult'.$count,$room->adult);
                $this->ss->assign('children'.$count,$room->children);
                $count++;
            }
        }

        // Nếu trang được load từ Lead thì tạo customer name là Lead đó
        if ($_POST[return_module]=='Leads') {
            $this->bean->parent_type = "Leads";
            $this->bean->parent_id =   $_POST[record];
            $lead = BeanFactory::getBean('Leads', $this->bean->parent_id);
            $this->bean->parent_name =   $lead->name;
            $this->bean->taxcode =   $lead->tax_code;
            $this->bean->address = $lead->primary_address_street;
            $this->bean->email = $lead->email1;
            $this->bean->phone = $lead->phone_mobile;
        }
        elseif ($_POST[return_module]=='Accounts') {
            $this->bean->parent_type = "Accounts";
            $this->bean->parent_id =   $_POST['return_id'];
            $account = BeanFactory::getBean('Accounts', $this->bean->parent_id);
            $this->bean->parent_name =   $account->name;
            $this->bean->taxcode =   $account->tax_code;
            $this->bean->address = $account->billing_address_street;  
            $this->bean->email = $account->email1;
            $this->bean->phone = $account->phone_office;  
        }
        elseif ($_POST[return_module]=='Contacts') {
            $this->bean->parent_type = "Contacts";
            $this->bean->parent_id =   $_POST['return_id'];
            $contact = BeanFactory::getBean('Contacts', $this->bean->parent_id);
            $this->bean->taxcode =   $contact->tax_code;
            $this->bean->address = $contact->primary_address_street;
            $this->bean->email = $contact->email1;
            $this->bean->phone = $contact->phone_mobile;  
        }

        // If click create booking in hotel detail, fill hotel info
        if ($_POST["c_hotel_c_bookinghotel_1c_hotel_ida"] != "" && empty($this->bean->id)) {
            $hotel = BeanFactory::getBean("C_Hotel", $_POST["c_hotel_c_bookinghotel_1c_hotel_ida"]);
            $this->bean->hotel_code = $hotel->code; 
            $this->bean->hotel_details = $hotel->hotel_details; 
            $this->bean->hotel_policy = $hotel->hotel_policy; 
        }
        parent::display();
    }
}
?>
