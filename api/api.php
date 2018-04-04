<?php
    if(!defined('sugarEntry'))define('sugarEntry', true);
                        
    chdir(dirname(__FILE__).'/../');                            
                                            
    require_once('./include/entryPoint.php');
    require_once('./custom/include/utils/ApiHelper.php');
    session_start();    // Session should be started after the declaration

    try {                
        global $gInput;                   
        $input = ApiHelper::parseInput();                               
    
        $params = base64_decode($input['Params']); 
        $params = json_decode($params, true); 
        $action = $input['RequestAction']; 
                                         
        // Other methods: check token
        $headers = getallheaders();                                                  
        if(!empty($action)) {
            switch($action) {    
                case 'GetAppListString':
                    ApiHelper::getAppListString();
                    break;    
                case 'GetCustomerList':
                    ApiHelper::getCustomerList();
                    break;     
                case 'GetCustomerInfo':
                    ApiHelper::getCustomerInfo($params['id']);
                    break;   
                case 'GetCustomerPaymentHistory':
                    ApiHelper::getCustomerPaymentHistory($params['customerId']);
                    break;  
                case 'SaveCustomer':
                    ApiHelper::saveCustomer($params);
                    break;  
                case 'GetProductList':
                    ApiHelper::getProductList();
                    break;     
                case 'GetProductInfo':
                    ApiHelper::getProductInfo($params['id']);
                    break;  
                case 'SaveProduct':
                    ApiHelper::saveProduct($params);
                    break;  
                case 'GetPaymentList':
                    ApiHelper::getPaymentList();
                    break;     
                case 'GetPaymentInfo':
                    ApiHelper::getPaymentInfo($params['id']);
                    break;  
                case 'SavePayment':
                    ApiHelper::savePayment($params);
                    break; 
                case 'ExportPayment':
                    ApiHelper::exportPayment($params['id']);
                    break;      
                default:
                    ApiHelper::setReturn(400);
            }
        }
        else {
            ApiHelper::setReturn(400);
        }
    }
    catch(Exception $e) {
        ApiHelper::setReturn(500, $e->getMessage());
    }
?>
