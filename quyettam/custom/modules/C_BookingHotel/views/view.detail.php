<?php
    require_once ('include/SubPanel/SubPanelTiles.php'); 
    class C_BookingHotelViewDetail extends ViewDetail{
        function display(){
            //if($this->bean->parent_type=='Contacts'){
//                $bean_Contact=BeanFactory::getBean('Contacts',$this->bean->parent_id);
//                $this->ss->assign('email',$bean_Contact->email1);
//                $this->ss->assign('phone',$bean_Contact->phone_mobile);
//                $this->ss->assign('tax_code',$bean_Contact->tax_code);
//                $this->ss->assign('address',$bean_Contact->primary_address_street);
//            }
//            if($this->bean->parent_type=='Accounts'){
//                $bean_Contact=BeanFactory::getBean('Accounts',$this->bean->parent_id);
//                $this->ss->assign('email',$bean_Contact->email1);
//                $this->ss->assign('phone',$bean_Contact->phone_office);
//                $this->ss->assign('tax_code',$bean_Contact->tax_code);
//                $this->ss->assign('address',$bean_Contact->billing_address_street);
//            }
            parent::display();
        }
        function _displaySubPanels(){ 
            $subpanel = new SubPanelTiles($this->bean, $this->module); 
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_bookinghotel_c_room_1']['top_buttons'][0]);//hiding create 
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_bookinghotel_c_room_1']['top_buttons'][1]);//hiding select 
            echo $subpanel->display(); 
        } 
    }
?>
