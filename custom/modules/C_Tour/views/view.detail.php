<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class C_TourViewDetail extends ViewDetail
{
    function display(){
        if (!empty($this->bean->contacts_c_tour_1contacts_ida)){
            $contact = BeanFactory::getBean('Contacts', $this->bean->contacts_c_tour_1contacts_ida);
            $this->ss->assign('CONTACT_MOBILE',$contact->phone_mobile);
            $this->ss->assign('CONTACT_EMAIL',$contact->email1);
        }

        parent::display();
    }
}