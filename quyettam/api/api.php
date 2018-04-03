<?php
    if(!defined('sugarEntry'))define('sugarEntry', true);
    chdir(dirname(__FILE__).'/../');

    //ini_set("display_errors", "On");

    require_once('include/entryPoint.php');
    require_once('custom/include/utils/ApiHelper.php');
    session_start();    // Session should be started after the declaration

    try {                
        global $gInput;                   
        $input = ApiHelper::parseInput();
        $action = $input['RequestAction'];
        $gInput = $input;   

        // Other methods: check token
        $headers = getallheaders();

        if(!empty($action)) {
            switch($action) {     
                case 'GetCustomerList':
                    ApiHelper::getCustomerList();
                    break;    
                case 'GetAppListString':
                    ApiHelper::getAppListString();
                    break;      
                default:
                    setReturn(400);
            }
        }
        else {
            setReturn(400);
        }
    }
    catch(Exception $e) {
        setReturn(500, $e->getMessage());
    }
?>
