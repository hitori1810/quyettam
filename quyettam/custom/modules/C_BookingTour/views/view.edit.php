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


class C_BookingTourViewEdit extends ViewEdit
{
    function display(){
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
        if (!empty($this->bean->parent_type) && !empty($this->bean->parent_id))
        {
            $parent = BeanFactory::getBean($this->bean->parent_type, $this->bean->parent_id);
            if ($this->bean->parent_type == "Accounts"){
                $email = $parent->email1;
                $phone = $parent->phone_office;
                $phone = $parent->billing_address_street;
            }
            elseif($this->bean->parent_type == "Contacts" || $this->bean->parent_type == "Leads"){
                $email = $parent->email1;
                $phone = $parent->phone_mobile;
                $address = $parent->primary_address_street;
            }

        }

        $this->ss->assign("email", $email);
        $this->ss->assign("phone", $phone);
        $this->ss->assign("address", $address);          

        // Nếu trang được load từ Lead thì tạo customer name là Lead đó
        if ($_POST[return_module]=='Leads') {
            $this->bean->parent_type = "Leads";
            $this->bean->parent_id =   $_POST[record];
            $lead = BeanFactory::getBean('Leads', $this->bean->parent_id);
            $this->bean->parent_name =   $lead->name;
            $this->bean->tax_code =   $lead->tax_code;
            $this->bean->address = $lead->primary_address_street;
            $this->bean->email = $lead->email1;
            $this->bean->phone = $lead->phone_mobile;
        }
        elseif ($_POST[return_module]=='Accounts') {
            $this->bean->parent_type = "Accounts";
            $this->bean->parent_id =   $_POST['return_id'];
            $account = BeanFactory::getBean('Accounts', $this->bean->parent_id);
            $this->bean->parent_name =   $account->name;
            $this->bean->tax_code =   $account->tax_code;
            $this->bean->address = $account->billing_address_street;  
            $this->bean->email = $account->email1;
            $this->bean->phone = $account->phone_office;  
        }
        elseif ($_POST[return_module]=='Contacts') {
            $this->bean->parent_type = "Contacts";
            $this->bean->parent_id =   $_POST['return_id'];
            $contact = BeanFactory::getBean('Contacts', $this->bean->parent_id);
            $this->bean->tax_code =   $contact->tax_code;
            $this->bean->address = $contact->primary_address_street;
            $this->bean->email = $contact->email1;
            $this->bean->phone = $contact->phone_mobile;  
        }

        // If click create booking in hotel detail, fill hotel info
        if ($_POST["c_tour_c_bookingtour_1c_tour_ida"] != "" && empty($this->bean->id)) {
            $tour = BeanFactory::getBean("C_Tour", $_POST["c_tour_c_bookingtour_1c_tour_ida"]);
            $this->bean->tour_code = $tour->code; 
            $this->bean->tour_details = $tour->tour_details; 
            $this->bean->tour_policy = $tour->tour_policy; 
        }   

        parent::display();
    }
}