<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class C_HotelViewEdit extends ViewEdit{
        function display() {
            if ($_POST[isDuplicate] == 'true') {
                unset($this->bean->code);    
                unset($this->bean->id);    
            } 
            if(!isset($this->bean->id) || empty($this->bean->id)){
                //Check NEW CODE
                $this->ss->assign('NEWCODE', '<span style="color:red;font-weight:bold"> Auto - generate </span>');

            }else{
                //Check NEW CODE
                $this->ss->assign('NEWCODE', '<span style="color:red;font-weight:bold" id = "code">'.$this->bean->code.'</span>'); 
            }
            
            if (!empty($this->bean->contacts_c_hotel_1contacts_ida)){
                $contact = BeanFactory::getBean('Contacts', $this->bean->contacts_c_hotel_1contacts_ida);
                $this->ss->assign('CONTACT_MOBILE',$contact->phone_mobile);
                $this->ss->assign('CONTACT_EMAIL',$contact->email1);
            }

            parent::display();
        }
    }
?>
