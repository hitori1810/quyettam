<?php

    if(!defined('sugarEntry'))define('sugarEntry', true);
    require_once('service/v4_1/SugarWebServiceImplv4_1.php');    

    class SugarWebServiceImplv4_1_custom extends SugarWebServiceImplv4_1 { 
        function check_session($session){
            if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
                return array('status' => false);
            } 
            return array('status' => true);
        } 
        function getCustomerBookingOppByNumberphone($session, $phone_number) {
            global $db, $beanFiles;
            $error = new SoapError();      
            /*if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', 'Contacts', 'read', 'no_access',  $error)) {
            return array();
            }*/
            // set field
            $tickerFields = array(); //config get ticker field here 
            $hotelFields = array();  //config get hotel field here
            $oppFields = array();    //config get opp field here   
            if(empty($tickerFields)) {
                include_once($beanFiles['C_BookingTicket']);
                $focus = new C_BookingTicket();                  
                foreach($focus->field_defs as $field => $vardef) {
                    if($vardef['type'] != 'relate' || $vardef['type'] != 'link') 
                        $tickerFields[] = $field;
                } 
            }

            if(empty($hotelFields)) {
                include_once($beanFiles['C_BookingHotel']);
                $focus = new C_BookingHotel();                  
                foreach($focus->field_defs as $field => $vardef) {
                    if($vardef['type'] != 'relate' || $vardef['type'] != 'link') 
                        $hotelFields[] = $field;
                } 
            }

            if(empty($oppFields)) {
                include_once($beanFiles['Opportunity']);
                $opp = new Opportunity();                  
                foreach($opp->field_defs as $field => $vardef) {
                    if($vardef['type'] != 'relate' || $vardef['type'] != 'link') 
                        $oppFields[] = $field;
                } 
            }
            //end
            $module = "Accounts";
            $result = self::get_entry_list(
                $session,
                $module,
                " accounts.mobile_phone like '%$phone_number%' 
                OR accounts.phone_office like '%$phone_number%' ",
                "accounts.date_created DESC",
                0,
                array(
                    'id',
                    'name' 
                ),
                array(
                    array(
                        'name' => 'accounts_c_bookingticket_1',
                        'value' => $tickerFields,
                    ),
                    array(
                        'name' => 'accounts_c_bookinghotel_1',
                        'value' => $hotelFields,
                    ),
                    array(
                        'name' => 'opportunities',
                        'value' => $oppFields,
                    )  
                ),
                20,
                0,
                false
            ); 

            if(!$result['result_count']) {
                $module = "Contacts";
                $result = self::get_entry_list(
                    $session,
                    $module,
                    " contacts.phone_mobile like '%$phone_number%' 
                    OR contacts.phone_work like '%$phone_number%'
                    OR contacts.phone_other like '%$phone_number%' ",
                    "contacts.date_created DESC",
                    0,
                    array(
                        'id',
                        'first_name',
                        'last_name', 
                    ),
                    array(
                        array(
                            'name' => 'contacts_c_bookingticket_1',
                            'value' => $tickerFields,
                        ),
                        array(
                            'name' => 'contacts_c_bookinghotel_1',
                            'value' => $hotelFields,
                        ),
                        array(
                            'name' => 'opportunities',
                            'value' => $oppFields,
                        )  
                    ),
                    20,
                    0,
                    false
                );
                if(!$result['result_count']) {
                    /* if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', 'Leads', 'read', 'no_access',  $error)) {
                    return array();
                    }*/
                    $module = "Leads";
                    $result = self::get_entry_list(
                        $session,
                        $module,
                        " leads.phone_mobile like '%$phone_number%' 
                        OR leads.phone_work like '%$phone_number%'
                        OR leads.phone_other like '%$phone_number%' ",
                        "contacts.date_created DESC",
                        0,
                        array(
                            'id',
                            'first_name',
                            'last_name',
                        ),
                        array(
                            array(
                                'name' => 'leads_c_bookingticket_1',
                                'value' => $tickerFields,
                            ),                        
                            array(
                                'name' => 'leads_opportunities_1',
                                'value' => $oppFields,
                            )  
                        ),
                        20,
                        0,
                        false
                    ); 
                }
            }
            if(!$result['result_count']) {
                $data = array( );   
            }
            else {
                $entry_list =  $result['entry_list'];
                $relationship_list = $result['relationship_list'];
                for($i = 0; $i < $result['result_count']; $i++){
                    $data[$i] = array();
                    $data[$i]['customer_info'] = array();
                    $data[$i]['booking_tickers'] = array();
                    $data[$i]['booking_hotels'] = array();
                    $data[$i]['opportunities'] = array();
                    $entry = $entry_list[$i]['name_value_list'];                    
                    $relationships = $relationship_list[$i]['link_list'];                    
                    foreach($entry as $key => $param) {
                        $data[$i]['customer_info'][$key] = $param['value'];
                    }
                    $data[$i]['customer_info']['link'] = $GLOBALS['sugar_config']['site_url']."/index.php?module={$module}&action=EditView&record={$data[$i]['customer_info']['id']}&MSID={$session}";
                    foreach($relationships as $key => $relationship) {
                        if($relationship['name'] == 'contacts_c_bookingticket_1' || $relationship['name'] == 'leads_c_bookingticket_1' || $relationship['name'] == 'accounts_c_bookingticket_1')
                            $link = 'booking_tickers';
                        else if($relationship['name'] == 'opportunities' || $relationship['name'] == 'leads_opportunities_1')
                            $link = 'opportunities';
                            else  $link = "booking_hotels";
                        foreach($relationship['records'] as $k => $link_value) {
                            foreach($link_value['link_value'] as $field => $vafef) {
                                $data[$i][$link][$k][$field] = $vafef['value'] ;
                            }
                        }                       
                    }
                }
            } 
            
            return $data; 
        }      

    }
?>