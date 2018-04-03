<?php
    require_once('include/entryPoint.php');

    class SugarAPIFunction { 

        function __construct() {
            global $current_user;
            $current_user->getSystemUser();
        }

        function callAPIsearchCustomerByEmail($_data){
            $customerObjects = array("Contact","Lead");
            $customerModules = array("Contacts","Leads");
            $customerTables = array("contacts","leads");
            for($i = 0; $i < count($customerObjects); $i++) {
                $sql = "SELECT object.id, '{$customerObjects[$i]}' as module 
                FROM {$customerTables[$i]} object
                INNER JOIN email_addr_bean_rel eo ON eo.bean_id = object.id AND eo.deleted = 0 
                AND eo.bean_module = '{$customerModules[$i]}'
                INNER JOIN email_addresses email ON email.deleted = 0 AND email.id = eo.email_address_id 
                AND email.email_address like '{$_data['params']['q']}'
                WHERE object.deleted = 0
                ";
                $customerInfo = $GLOBALS['db']->fetchOne($sql);
                if($customerInfo['id']) break;
            }  
            if(!$customerInfo['id']) {
                $result = array(
                    'success' => false,
                    'data' => array(
                        'customerType' => '',
                        'cumtomerInfo' => array(),
                    ), 
                );  
            } else {
                $customer = new $customerInfo['module'];
                $customer->retrieve($customerInfo['id']); 

                $fields = explode(",",$_data['params']['fields']);
                $fields = array_merge($fields,
                    array(
                        'id',
                        'date_modified',
                    )
                );
                $result = array(
                    'success' => true,
                    'data' => array(
                        'customerType' => $customerModules[array_search($customerInfo['module'],$customerObjects)],
                        'cumtomerInfo' => $customer->toFieldsArray($fields),
                    ),
                );

            }
            return $result;  
        }

        function callAPIsearchCustomerByEmailAndIBEId($_data){
            $customerObjects = array("Contact","Lead");
            $customerModules = array("Contacts","Leads");
            $customerTables = array("contacts","leads");

            for($i = 0; $i < count($customerObjects); $i++) {
                $sql = "SELECT object.id, '{$customerObjects[$i]}' as module, object.fit_category  
                FROM {$customerTables[$i]} object
                INNER JOIN email_addr_bean_rel eo ON eo.bean_id = object.id AND eo.deleted = 0 
                AND eo.bean_module = '{$customerModules[$i]}'
                INNER JOIN email_addresses email ON email.deleted = 0 AND email.id = eo.email_address_id 
                AND email.email_address like '{$_data['params']['q1']}'
                WHERE object.deleted = 0 AND object.ibe_id = '{$_data['params']['q2']}'
                ";
                $customerInfo = $GLOBALS['db']->fetchOne($sql);
                if($customerInfo['id']) break;
            }  

            if(!$customerInfo['id']) {
                $result = array(
                    'success' => false,
                    'data' => array(
                        'customerType' => '',
                        'cumtomerInfo' => array(),
                    ), 
                );  
            } else {
                $customer = new $customerInfo['module'];
                $customer->retrieve($customerInfo['id']); 

                $fields = explode(",",$_data['params']['fields']);
                $fields = array_merge($fields,
                    array(
                        'id',
                        'date_modified',
                    )
                );                
                $result = array(
                    'success' => true,
                    'data' => array(
                        'customerType' => $customerModules[array_search($customerInfo['module'],$customerObjects)],
                        'cumtomerInfo' => array_merge($customer->toFieldsArray($fields),array('catagory' => $customerInfo['fit_category'])),
                    ),
                );

            }
            return $result;  
        }

        function callAPIcreateNewCustomer($_data) {
            $module = $_data['params']['customerType'];
            unset($_data['params']['customerType']);

            return $this->_createEntry($module, $_data['params']);
        }

        function callAPIupdateCustomer($_data) {
            $module = $_data['params']['customerType'];
            unset($_data['params']['customerType']);
            unset($_data['params']['email1']);
            unset($_data['params']['email']);
            unset($_data['params']['email2']);

            return $this->_updateEntry($module, $_data['params']);
        }

        function callAPIlogLoginSession($_data) {
            $module = "C_Session";
            return $this->_createEntry($module, $_data['params']);
        }

        function callAPIgetBookingOfCustomer($_data) {
            $booking_links = array(
                'Leads' => 'leads_c_bookingticket_1',
                'Contacts' => 'contacts_c_bookingticket_1',
                'Accounts' => 'accounts_c_bookingticket_1',
            );
            $module =  $_data['params']['customerType'];
            $customerID =  $_data['params']['customerId'];
            $link =  $booking_links[$module];  
            return $this->_getLinkOfBean($module,$customerID,$link); 
        }

        function callAPIgetCustomerInfo($_data) {
            $customerObjects = array("Contact","Lead");
            $customerModules = array("Contacts","Leads");
            $customerTables = array("contacts","leads");
            $params =  $_data['params'];
            for($i = 0; $i < count($customerObjects); $i++) {
                $sql = "SELECT object.id, '{$customerObjects[$i]}' as module  
                FROM {$customerTables[$i]} object
                INNER JOIN email_addr_bean_rel eo ON eo.bean_id = object.id AND eo.deleted = 0 
                AND eo.bean_module = '{$customerModules[$i]}'
                INNER JOIN email_addresses email ON email.deleted = 0 AND email.id = eo.email_address_id 
                AND email.email_address like '{$params['email1']}'
                WHERE object.deleted = 0 AND object.ibe_id = '{$params['ibe_id']}'
                ";
                $customerInfo = $GLOBALS['db']->fetchOne($sql);
                if($customerInfo['id']) break;
            }  
            unset($params['id']);
            
            if(!$customerInfo['id']) {              
                $data = $this->_createEntry('Leads', $params);
                if($data['success']) {
                    $result = array(
                        'success' => true,
                        'data' => array(
                            'customerType' => 'Leads',
                            'cumtomerInfo' => $data['data'],
                        ), 
                    );
                } else {
                    $result = array(
                        'success' => false,
                        'data' => $data['data'], 
                    );
                }

            } else {
                unset($params['email1']);
                unset($params['email2']);
                unset($params['email']);
                $customer = new $customerInfo['module'];
                $customer->retrieve($customerInfo['id']);
                $object = $customerModules[array_search($customerInfo['module'],$customerObjects)];
                $params['id'] = $customerInfo['id']; 
                $data =  $this->_updateEntry($object, $params);
                if($data['success']) {
                    $result = array(
                        'success' => true,
                        'data' => array(
                            'customerType' => $object,
                            'cumtomerInfo' => $data['data'],
                        ), 
                    );
                } else {
                    $result = array(
                        'success' => false,
                        'data' => $data['data'], 
                    );
                }  
            }
            return $result;  
        }

        private function _createEntry($module, $param) {
            $result = array();
            try{ 
                $bean = BeanFactory::getBean($module);
                $bean->fromArray($param);            

                if($bean->save()) {
                    $bean->retrieve($bean->id);
                    $result = array(
                        'success' => true,
                        'data' => $bean->toFieldsArray(),
                    );                   
                } else {
                    $result = array(
                        'success' => false,
                        'data' => array(
                            "error" => "create_error",
                            'error_message' => 'fail when create new '.$module,
                        ),
                    ); 
                }
            } catch (Exception $e) {
                $result = array(
                    'success' => false,
                    'data' => $e,
                );            
            } 
            return $result;   
        } 

        private function _updateEntry($module, $param) {
            $result = array();
            try{ 
                $bean = BeanFactory::getBean($module);                  
                $bean->retrieve($param['id']);
                unset($param['id']);
                if($bean->id) {
                    $bean->fromArray($param); 
                    $bean->save();           
                }

                if($bean->id) {
                    $bean->retrieve($bean->id);
                    $result = array(
                        'success' => true,
                        'data' => $bean->toFieldsArray(),
                    );                   
                } else {
                    $result = array(
                        'success' => false,
                        'data' => array(
                            "error" => "invalid_parameter",
                            'error_message' => 'fail when update '.$module,
                        ),
                    ); 
                }
            } catch (Exception $e) {
                $result = array(
                    'success' => false,
                    'data' => $e,
                );            
            } 
            return $result;   
        } 

        private function _getLinkOfBean($module, $id, $link) {
            $result = array();
            try{ 
                $bean = BeanFactory::getBean($module, $id);                 

                if($bean->id) {
                    if($bean->load_relationship($link)) {
                        $link_beans = $bean->$link->getBeans();
                        if($link_beans) { 
                            $result = array(
                                'success' => true,
                                'data' => array(),
                            );
                            foreach($link_beans as $key => $link_bean) {
                                $result['data'][] = $link_bean->toFieldsArray(array(),true, false); 
                            }
                        } else {
                            $result = array(
                                'success' => false,
                                'data' => array(
                                    "error" => "not_found_link_data",
                                    'error_message' => "no data of this link in module '{$module}' ",
                                ),
                            );
                        }
                    } else {
                        $result = array(
                            'success' => false,
                            'data' => array(
                                "error" => "not_found_link",
                                'error_message' => "can not load this link in module '{$module}' ",
                            ),
                        );
                    }                                 
                } else {
                    $result = array(
                        'success' => false,
                        'data' => array(
                            "error" => "not_found_bean",
                            'error_message' => "not found this record in module '{$module}' ",
                        ),
                    ); 
                }               
            } catch (Exception $e) {
                $result = array(
                    'success' => false,
                    'data' => $e,
                );            
            } 
            return $result;
        }
    }  
?>
