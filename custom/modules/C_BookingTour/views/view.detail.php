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


    require_once('include/MVC/View/views/view.detail.php');

    class C_BookingTourViewDetail extends ViewDetail {

        /**
        * display
        * Override the display method to support customization for the buttons that display
        * a popup and allow you to copy the account's address into the selected contacts.
        * The custom_code_billing and custom_code_shipping Smarty variables are found in
        * include/SugarFields/Fields/Address/DetailView.tpl (default).  If it's a English U.S.
        * locale then it'll use file include/SugarFields/Fields/Address/en_us.DetailView.tpl.
        */
        function display(){
            
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

            //format curency fields and assign to metadata
            
            $round = $GLOBALS['locale']->getPrecedentPreference('default_currency_significant_digits');
            $this->bean->price_adult = format_number( $this->bean->price_adult,$round,$round);
            $this->bean->price_chd = format_number( $this->bean->price_chd,$round,$round);
            $this->bean->price_infant = format_number( $this->bean->price_infant,$round,$round);

            $this->ss->assign("price_adult", $this->bean->price_adult);
            $this->ss->assign("price_chd", $this->bean->price_chd);
            $this->ss->assign("price_infant", $this->bean->price_infant);
            
            // echo $this->dv->display();   
            parent::display();
        } 	
    }

?>