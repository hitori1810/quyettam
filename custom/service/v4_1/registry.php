<?php
    if(!defined('sugarEntry'))define('sugarEntry', true);

    require_once('service/v4_1/registry.php');

    class registry_v4_1_custom extends registry_v4_1 {


        protected function registerFunction() {
            parent::registerFunction();                            
            $this->serviceClass->registerFunction(
                'getCustomerBookingOppByNumberphone',   // Method name 
                array('session'=>'xsd:string', 'phone_number'=>'xsd:string'), // Input types 
                array('return'=>'xsd:Array')   // Output types
            );
            $this->serviceClass->registerFunction(
                'check_session',   // Method name 
                array('session'=>'xsd:string', 'phone_number'=>'xsd:string'), // Input types 
                array('return'=>'xsd:Array')   // Output types
            );
        }
}